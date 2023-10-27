<?php

namespace App\Http\Controllers;

use App\event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserReservationController extends Controller
{
    public function create()
    {
        $event = new event();
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeekday();
        return view('mdmagazine.reservation.view.create',compact('min_date','max_date','event'));
    }

    public function thank()
    {
        return view('mdmagazine.reservation.view.thank');
    }
}
