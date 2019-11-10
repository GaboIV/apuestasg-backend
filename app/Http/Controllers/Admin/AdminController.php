<?php

namespace App\Http\Controllers\Admin;

use App\Category;
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
}
