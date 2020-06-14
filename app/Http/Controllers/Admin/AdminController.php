<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Changelog;
use App\Country;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class AdminController extends ApiController {
    public function loadCategories() {
        $categories = Category::orderBy('name', 'asc')
        					  ->get();

        return $this->successResponse([
            'categories' => $categories
        ], 200);
    }

    public function loadCountries() {
        $countries = Country::orderBy('name', 'asc')
        					  ->get();

        return $this->successResponse([
            'countries' => $countries
        ], 200);
    }

    public function loadUpdatesLeagues() {
        $updates = Category::with("leagues")
                            ->get();

        return $this->successResponse([
            'updates' => $updates
        ], 200);
    }

    public function getChangelog() {
        $changelog = Changelog::orderBy('created_at', 'desc')
        ->get();

        return $this->successResponse([
            'changelogs' => $changelog
        ], 200);
    }

    public function updateCountry(Request $request, $id) {
        $data = $request->all();

        $country = Country::whereId($id)
                   ->update($data);

        return $this->successResponse([
            'status' => 'success'
        ], 200);
    }
}
