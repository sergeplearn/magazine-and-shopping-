<?php

namespace App\Http\Controllers\blog;

use App\event;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $reservations = event::search(request('search'))->paginate(5);
        return view('mdmagazine.reservation.index',compact('reservations'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->authorize('create',event::class);

        $event = new event();
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeekday();


       return view('mdmagazine.reservation.create',compact('max_date','min_date','event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservationRequest $request)
    {
        if (event::where('timeinterval_id',$request->timeinterval_id)->where('date',$request->date)->count() > 0)
        {
            if(!Auth::user() || Auth::user()->role === 'user')
            {
                return redirect('/reservat')->with('taken','sorry the time and date was taken');
            }

            return redirect()->route('event.create')->with('taken','sorry the time and date was taken');
        }

       $event = event::create($request->validated());
      // event(new BokkingReservationEvent($event));
       if(!Auth::user() || Auth::user()->role === 'user')
       {
           return redirect()->route('reservation.thanks');
       }

       return redirect()->route('event.index')->with('created','message');
    }
    public function edit(event $event)
    {
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeekday();
        return view('mdmagazine.reservation.edit',compact('max_date','min_date','event'));

    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(ReservationRequest $request, event $event)
    {
        $this->authorize('update', $event);

        $event->update($request->validated());
        return redirect()->route('event.index')->with('created','message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(event $event)
    {$this->authorize('delete', $event);
        $event->delete();
        $event->unsearchable();
        return redirect()->route('event.index')->with('deleted','message');
    }


}
