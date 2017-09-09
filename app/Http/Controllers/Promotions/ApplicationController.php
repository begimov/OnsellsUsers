<?php

namespace App\Http\Controllers\Promotions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Promotions\Promotion;
use App\Models\Promotions\Application;
use Illuminate\Support\Facades\Auth;
use App\Events\Promotions\ApplicationCreated;
use App\Http\Requests\Promotions\StoreApplicationRequest;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StoreApplicationRequest $request, Promotion $promotion)
    {
        $user = Auth::user();
        $phone = $request->phone;

        if ($user->phone !== $phone) {
            $user->phone = $phone;
            $user->save();
        }

        $exisitngApplication = $user->applicationOfPromotion($promotion->id);

        if (!count($exisitngApplication)) {
            $application = new Application();
            $application->user()->associate($user);
            $application->promotion()->associate($promotion);
            $application->save();

            event(new ApplicationCreated($application));
        }

        return redirect()->route('promotion.show', [
            'id' => $promotion->id
        ])->with('status', 'Заявка получена. Можно воспользоваться скидкой.');
    }
}
