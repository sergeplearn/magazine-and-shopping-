<?php

namespace App\Http\Controllers;

use App\Rules\TimeBetween;
use App\timeinterval;
use Illuminate\Http\Request;

class TimeintervalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(timeinterval::class, 'timeinterval');
    }


    public function index()
    {
        $times = timeinterval::paginate(5);

        return view('mdmagazine.time.index',['times'=>$times]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

     $timeinterval = new timeinterval();
        return view('mdmagazine.time.create',compact('timeinterval'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->user()->timeintervals()->create($this->validatingtimeinterval($request));
        return redirect()->route('timeinterval.create');
    }

    public function edit(timeinterval $timeinterval)
    {
        return view('mdmagazine.time.edit',compact('timeinterval'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\timeinterval  $timeinterval
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, timeinterval $timeinterval)
    {

        $timeinterval->update($this->validatingtimeinterval($request));
        return redirect()->route('timeinterval.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\timeinterval  $timeinterval
     * @return \Illuminate\Http\Response
     */
    public function destroy(timeinterval $timeinterval)
    {
        $timeinterval->delete();
        return redirect()->route('timeinterval.index');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function validatingtimeinterval(Request $request)
    {
        return $request->validate([
            'start_time' => ['required',new TimeBetween()],
            'end_time'  => ['required',new TimeBetween()],
            'status'  => ['required'],

        ]);
    }
}
