<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Listing;
use App\RentRequest;
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
        return view('booking.index')->with('active', Booking::get());
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
            $r->deletedBy = ($r->id == $rentRequest->id) ? "booking" : "owner";
            $rentRequest->user->updateRequest($r);
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
        $rentRequest->user->addBooking($booking);

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
