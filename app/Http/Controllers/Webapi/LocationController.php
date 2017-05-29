<?php

namespace App\Http\Controllers\Webapi;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Location;

class LocationController extends Controller
{
  public function index(Request $request)
  {
      // TODO: Validation for lat and lng
      $lat = $request->lat;
      $lng = $request->lng;
      $radius = $request->radius;
      // \DB::enableQueryLog();
      $locations = Location::distance($radius + $radius/(5/($radius/800)),"{$lat},{$lng}")->whereHas('promotion', function ($query) {
          $query->where('active', 1);
      })->with('promotion')->take(100)->get();
      // dd(\DB::getQueryLog());
      return $locations->toArray();
  }
}
