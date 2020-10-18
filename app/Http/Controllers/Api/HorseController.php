<?php

namespace App\Http\Controllers\Api;

use App\Career;
use App\Haras;
use App\Horse;
use App\Http\Controllers\ApiController;
use App\Jockey;
use App\Racecourse;
use App\Stud;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class HorseController extends ApiController {
    public function getHorses() {
        $criterios = explode(" ", request()->criterio);
        
        $horses = Horse::where(function($query) use($criterios){
                    if (request()->criterio != 'todos') {
                        foreach($criterios as $keyword) {
                            $query->orWhere('name', 'LIKE', "%$keyword%");
                        }
                    }                    
                })
                ->orderBy('name', 'asc')
                ->whereBreed('')
                ->paginate(50);

        return $this->successResponse([
            'status' => 'correcto',
            'horses' => $horses,
            'time' => date("Y-m-d H:i:s")
        ], 200);
    }

    public function update(Request $request, $id) {
        $data = $request->all();

        $horse = Horse::whereId($id)->first();

        $horse->update($data);

        $horse = Horse::whereId($id)->first();

        return $this->successResponse([
            'status' => 'success',
            'horse' => $horse
        ], 200);
    }

    public function getMadrillasUi() {
        $horses = Horse::orderBy('name', 'asc')
                    ->whereBreed('C')
                    ->without('father')
                    ->without('mother')
                    ->without('haras')
                    ->whereSex('M')
                    ->get();

        return $this->successResponse([
            'status' => 'correcto',
            'madrillasui' => $horses,
            'time' => date("Y-m-d H:i:s")
        ], 200);
    }

    public function addMadrilla(Request $request) {
        $data = $request->all();

        $horse = Horse::whereBreed('C')
                    ->without('father')
                    ->without('mother')
                    ->without('haras')
                    ->whereSex('M')
                    ->whereName($data['name'])
                    ->first();

        if ($horse) {
            return $this->errorResponse("Ya existe una yegua madre con este nombre", 409); 
        }

        $horse_last = Horse::whereBreed('C')
                    ->without('father')
                    ->without('mother')
                    ->without('haras')
                    ->whereSex('M')
                    ->orderBy('id', 'desc')
                    ->first();

        if ($horse_last) {
            $codigo_ult_mad = $horse_last->code;
            $solo_n_c_u_m = $codigo_ult_mad[3].$codigo_ult_mad[4].$codigo_ult_mad[5];
            $nuevo_s_c_u_m = $solo_n_c_u_m + 1;

            if ($nuevo_s_c_u_m < 10) {
                $nuevo_s_c_u_m = "00".$nuevo_s_c_u_m;
            } elseif ($nuevo_s_c_u_m < 100) {
                $nuevo_s_c_u_m = "0".$nuevo_s_c_u_m;
            }

            $data['code'] = $codigo_ult_mad[0].$codigo_ult_mad[1].$codigo_ult_mad[2].$nuevo_s_c_u_m;
        } else {
            $data['code'] = "MAD001";
        }

        $data['sex'] = "M";
        $data['breed'] = "C";

        $madre_a = Horse::create($data);

        $status = "success";
        $mstatus = "Yegua madre agregada correctamente";

        $update = Horse::whereId($data['horse']['id'])
        ->update([
            "mother_id" => $madre_a->id
        ]);

        $status2 = "success";
        $mstatus2 = "Se actualizó la yegua madre del ejemplar ".$data['horse']['name'];

        $result = array(
            "status" => $status,
            "mstatus" => $mstatus,
            "status2" => $status2,
            "mstatus2" => $mstatus2,
            "madre" => $madre_a
        );

        return $this->successResponse($result, 200);
    }

    public function addPadrillo(Request $request) {
        $data = $request->all();

        $horse = Horse::whereBreed('C')
                    ->without('father')
                    ->without('mother')
                    ->without('haras')
                    ->whereSex('F')
                    ->whereName($data['name'])
                    ->first();

        if ($horse) {
            return $this->errorResponse("Ya existe un padrillo con este nombre", 409); 
        }

        $horse_last = Horse::whereBreed('C')
                    ->without('father')
                    ->without('mother')
                    ->without('haras')
                    ->whereSex('F')
                    ->orderBy('id', 'desc')
                    ->first();

        if ($horse_last) {
            $codigo_ult_mad = $horse_last->code;
            $solo_n_c_u_m = $codigo_ult_mad[3].$codigo_ult_mad[4].$codigo_ult_mad[5];
            $nuevo_s_c_u_m = $solo_n_c_u_m + 1;

            if ($nuevo_s_c_u_m < 10) {
                $nuevo_s_c_u_m = "00".$nuevo_s_c_u_m;
            } elseif ($nuevo_s_c_u_m < 100) {
                $nuevo_s_c_u_m = "0".$nuevo_s_c_u_m;
            }

            $data['code'] = $codigo_ult_mad[0].$codigo_ult_mad[1].$codigo_ult_mad[2].$nuevo_s_c_u_m;
        } else {
            $data['code'] = "PAD001";
        }

        $data['sex'] = "F";
        $data['breed'] = "C";

        $padre_a = Horse::create($data);

        $status = "success";
        $mstatus = "Padrillo agregado correctamente";

        $update = Horse::whereId($data['horse']['id'])
        ->update([
            "father_id" => $padre_a->id
        ]);

        $status2 = "success";
        $mstatus2 = "Se actualizó el padrillo del ejemplar ".$data['horse']['name'];

        $result = array(
            "status" => $status,
            "mstatus" => $mstatus,
            "status2" => $status2,
            "mstatus2" => $mstatus2,
            "padre" => $padre_a
        );

        return $this->successResponse($result, 200);
    }

    public function getPadrillosUi() {
        $horses = Horse::orderBy('name', 'asc')
                    ->whereBreed('C')
                    ->whereSex('F')
                    ->without('father')
                    ->without('mother')
                    ->without('haras')
                    ->get();

        return $this->successResponse([
            'status' => 'correcto',
            'padrillosui' => $horses,
            'time' => date("Y-m-d H:i:s")
        ], 200);
    }
}
