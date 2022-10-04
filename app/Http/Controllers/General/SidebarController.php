<?php

namespace App\Http\Controllers\General;

use App\Country;
use App\Category;
use App\Helpers\Functions;
use App\Http\Controllers\ApiController;
use Illuminate\Database\Eloquent\Builder;

class SidebarController extends ApiController
{
    public function __construct() 
    {
        $this->middleware('guest');
    }

    public function getLeagues() 
    {
        $categories = Category::whereHas('leagues', function (Builder $queryA) {
            $queryA->whereHas('games', function (Builder $queryB) {
                $queryB->where('start', '>=', date("Y-m-d H:i:s"));
            });
        })->with(['leagues' => function ($queryA) {
            $queryA->whereHas('games', function (Builder $queryB) {
                $queryB->where('start', '>=', date("Y-m-d H:i:s"));
            })->with(['country' => function ($queryC) {
                $queryC->select('id', 'name', 'image_link');
            }])->select('id', 'name', 'category_id', 'country_id');
        }])->get(['id', 'name', 'image']);

        $categories = $categories->toArray();

        foreach ($categories as $key => &$category) {
            $category['countries'] = [];
            foreach ($category['leagues'] as $key => $league) {
                $country_search = Functions::objArrayKeySearch($category['countries'], "name", $league['country']['name']);

                if ($country_search === false) {
                    $category['countries'][] = [
                        "name" => $league['country']['name'],
                        "image" => $league['country']['image_link'],
                        "leagues" => [$league]
                    ];
                } else {
                    $category['countries'][$country_search]['leagues'][] = $league;                
                }
            }
            unset($category['leagues']);
            ksort($category['countries']);
        }

        return $this->successResponse([
            'categories' => $categories
        ], 200);
    }
}
