<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
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
        // GET /listings

        return view('listing.index')->with('listings', Listing::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // GET /listings/create
        return view('listing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // POST /listings
        try {
            $startDate = Carbon::parse(request('start'))->format('Y-m-d');
            $endDate = Carbon::parse(request('end'))->format('Y-m-d');
        } catch (\Exception $er) {
            $error = [
                'start' => 'invalid format',
                'end' => 'invalid format'
            ];
            return redirect()->back()->withErrors($error)->withInput();
        }


        // validate
        $this->validate(request(), [
            'item' => 'required',
            'location' => 'required',
            'price' => 'required|numeric|min:0',
            'start' => 'required|date|after_or_equal:today',
            'end' => 'required|date|after:start',
        ]);

        // store
        auth()->user()->addListing(
            new Listing([
                'item' => request('item'),
                'location' => request('location'),
                'price' => request('price'),
                'start' => $startDate,
                'end' => $endDate

            ])
        );
        // redirect
        return redirect('/listings');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        // GET /listings/id
        return view('listing.show')->with('listing', $listing);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        // GET /listings/id/edit
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        // PATCH /listings/id
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Listing $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        // DELETE /listings/id
    }
}
