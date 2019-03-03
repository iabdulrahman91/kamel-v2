<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use App\Listing;
use App\Rules\not_same_user;
use App\RentRequest;
use Illuminate\Http\Request;
use mysql_xdevapi\Result;

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
        $result = [];
        foreach ($rentRequests as $r) {
            $listing = Listing::find($r->listing_id);
            $item = [
                'item' => $listing->item,
                'renter' => auth()->user($r->user_id)->fname,
                'owner' => $listing->user->fname,
                'start' => $r->start,
                'end' => $r->end,
                'cost' => $r->price

            ];

            array_push($result, $item);

        }
//      dd($result);
        return view('rentRequest.index', compact('result'));
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
     * @param  \Illuminate\Http\Request $request
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
            'start' => 'required|date|after_or_equal:today|after_or_equal:' . $listing->start,
            'end' => 'required|date|after:start|before_or_equal:' . $listing->end,
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

        if (!$result) {
            $error = [
                'rentRequest_id' => 'request is already made'
            ];
            return redirect()->back()->withErrors($error)->withInput();
        }
        return redirect('/rentRequests');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RentRequest $rentRequest
     * @return \Illuminate\Http\Response
     */
    public function show(RentRequest $rentRequest)
    {
        //
        return view('rentRequest.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RentRequest $rentRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(RentRequest $rentRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\RentRequest $rentRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RentRequest $rentRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RentRequest $rentRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(RentRequest $rentRequest)
    {
        //
    }

    public function received()
    {
        // find all listings belong to the user
        $mylistings = auth()->user()->listings()->get();
        //find request for user's listing
        $received = RentRequest::whereIn('listing_id', $mylistings)->get();
        // prepare result
        $result = [];
        foreach ($received as $r) {
            array_push($result, [
                'requester_id' => $r->user_id,
                'requester_name' => User::find($r->user_id)->fname,
                'item' => $r->listing->item,
                'start' => $r->start,
                'end' => $r->end,
                'price' => $r->price

            ]);
        }
        return view('rentRequest.received', compact('result'));
    }
}
