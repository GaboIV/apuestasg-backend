<?php

namespace App\Http\Controllers\Admin;

use App\Payment;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class PaymentController extends ApiController
{
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'desc')
                        ->with('player', 'bank', 'account.bank')
        				->paginate();

        return $this->successResponse($payments, 200);
    }

    public function changeStatus($paymentId, Request $request)
    {
        $data = $request->only(['status']);

        $payment = Payment::whereId($paymentId)->first();

        switch ($payment->status) {
            case '1':
                return $this->errorResponse("El pago ya fue aprobado anteriormente", 409);
                break;

            case '2':
                return $this->errorResponse("El pago ya fue rechazado anteriormente", 409);
                break;
        }

        switch ($data['status']) {
            case '1':
                $player = $payment->player;

                $player->update([
                    "available" => $player->available + $payment->amount
                ]);
                break;

            case '2':
                // Send mail of rejected
                break;

            default:
                return $this->errorResponse("Tipo de estado inválido", 409);
                break;
        }

        $payment->update([
            'status' => $data['status']
        ]);

        return $this->successResponse($payment, 200);
    }
}
