<?php

namespace App\Http\Controllers;

use App\timeinterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $time = DB::table('timeintervals')
            ->join('events', 'timeintervals.id', '!=', 'events.timeinterval_id')

            ->select('timeintervals.id','events.date')

            ->get();
        dd($time);
    }
}
