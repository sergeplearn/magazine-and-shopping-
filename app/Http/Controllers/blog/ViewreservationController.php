<?php

namespace App\Http\Controllers\blog;

use App\event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewreservationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $events = event::search(request('search'))->paginate(8);
        return view('mdmagazine.reservation.view.index',compact('events'));
    }
}
