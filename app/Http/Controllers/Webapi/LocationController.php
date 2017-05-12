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
      // \DB::enableQueryLog();
      $locations = Location::distance(10000,"{$lat},{$lng}")->with('promotion')->take(100)->get();
      // dd(\DB::getQueryLog());
      return $locations->toArray();
  }
}
