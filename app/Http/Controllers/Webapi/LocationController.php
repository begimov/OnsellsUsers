<?php

namespace App\Http\Controllers\Webapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Location;
use App\Http\Requests\Promotions\SearchLocationRequest;

class LocationController extends Controller
{
    public function index(SearchLocationRequest $request)
    {
        $searchQuery = $request->searchQuery;
        $lat = $request->lat;
        $lng = $request->lng;
        $radius = $request->radius;
        $category = $request->category;
        $searchRadius = $radius + $radius/(5/($radius/800));
        // \DB::enableQueryLog();
        if ($category < 1) {
            $locations = Location::distance($searchRadius,"{$lat},{$lng}")
                ->whereHas('promotion', function ($query) use ($category, $searchQuery){
                    $query->where('active', 1)
                    ->where('company', 'like', "%{$searchQuery}%")
                    ->orWhere('promotionname', 'like', "%{$searchQuery}%")
                    ->orWhere('promotiondesc', 'like', "%{$searchQuery}%");
                })->with('promotion')->with('promotion.category')->take(100)->get();
        } else {
            $locations = Location::distance($searchRadius,"{$lat},{$lng}")
            ->whereHas('promotion', function ($query) use ($category){
                $query->where('active', 1)->where('category_id', $category);
            })->with('promotion')->with('promotion.category')->take(100)->get();
        }
        // dd(\DB::getQueryLog());
        return $locations->toArray();
    }
}
