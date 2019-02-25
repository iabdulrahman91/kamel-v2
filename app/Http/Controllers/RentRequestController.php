<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Listing;
use App\Rules\not_same_user;
use App\RentRequest;
use Illuminate\Http\Request;

class RentRequestController extends Controller
{

      public function __construct()
        {
            $this->middleware('auth');
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // GET /rentRequests/
      $rentRequests = RentRequest::where('user_id', auth()->id())->get();
      return view('rentRequest.index', compact('rentRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // GET /rentRequests/create
      $listing = Listing::find(request('id'));
      return view('rentRequest.create', compact('listing'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // POST /rentRequests

        // validate requets
        try {
            $startDate = Carbon::parse(request('start'));
            $endDate = Carbon::parse(request('end'));
        } catch (\Exception $er) {
            $error = [
                'start' => 'invalid format',
                'end' => 'invalid format'
            ];
            return redirect()->back()->withErrors($error)->withInput();
        }

        $listing = Listing::find(request('listing_id'));

        $this->validate(request(), [
            'start'   => 'required|date|after_or_equal:today|after_or_equal:'.$listing->start,
            'end' => 'required|date|after:start|before_or_equal:'.$listing->end,
            'listing_id' => ['required', new not_same_user($listing)]

        ]);

        // calculate cost
        $days = $endDate->diffInDays($startDate);
        $cost = $days * $listing->price;

        // request save from user model
        $result = auth()->user()->addRentRequest(
            new RentRequest([
                'listing_id' => $listing->id,
                'start' => $startDate->format('Y-m-d'),
                'end' => $endDate->format('Y-m-d'),
                'price' => $cost
            ])
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RentRequest  $rentRequest
     * @return \Illuminate\Http\Response
     */
    public function show(RentRequest $rentRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RentRequest  $rentRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(RentRequest $rentRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RentRequest  $rentRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RentRequest $rentRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RentRequest  $rentRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(RentRequest $rentRequest)
    {
        //
    }
}
