<?php
namespace App\Traits;

trait AjaxPaginationResponse {

    public function ajaxNextPageResponse($promotions)
    {
        $view = view('layouts.components.partials._promotioncard',compact('promotions'))->render();
        return response()->json(['html'=>$view]);
    }
}
