<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Listing;
use App\RentRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('booking.index')->with('active', auth()->user()->sentBookings()->where('active', true)->get());
    }

    public function received()
    {
        //
        return view('booking.received')->with('active', auth()->user()->receivedBookings()->where('active', true)->get());
    }

    public function currentSent()
    {
        //
        return view('booking.currentSent')->with('active', auth()->user()->sentBookings()->where([
            ['active', true],
            ['start', '<=', Carbon::today()],
            ['end', '>=', Carbon::today()]
        ])->get());
    }

    public function currentReceived()
    {
        //
        return view('booking.currentReceived')->with('active', auth()->user()->receivedBookings()->where([
            ['active', true],
            ['start', '<=', Carbon::today()],
            ['end', '>=', Carbon::today()]
        ])->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // get all requests belongs to the the listing
        $rentRequest = RentRequest::find(request('rentRequest_id'));
        $allRequests = $rentRequest->listing->rentRequests;

        // reject all requests and update the request to be deactivated and deletedBy = "booking"
        foreach ($allRequests as $r) {
            $r->active = false;
            $r->deletedBy = ($r->id == $rentRequest->id) ? "1" : $r->owner->id;
            $rentRequest->owner->updateRequest($r);
        }
        // get copy of the request
        $booking = new Booking([
            'id' => $rentRequest->id,
            'user_id' => $rentRequest->user_id,
            'listing_id' => $rentRequest->listing_id,
            'start' => $rentRequest->start,
            'end' => $rentRequest->end,
            'price' => $rentRequest->price,
        ]);

        // save it in the booking by the requester
        $rentRequest->owner->addBooking($booking);

        return redirect('/bookings');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
