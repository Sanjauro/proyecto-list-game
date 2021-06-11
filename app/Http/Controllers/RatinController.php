<?php

namespace App\Http\Controllers;

use App\Models\Ratin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'title-review' => 'required',
            'text-review' => 'required',
        ]);

        Ratin::create([
        "videogame_id" => request("idGame"),
        "user_id" => Auth::id(),
        "score" => request("scoreGame"),
        "title" => request("title-review"),
        "review" => request("text-review") ]);

        return redirect(route('home.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Ratin::where('videogame_id',request('idGame'))
        ->where('user_id', Auth::id())
        ->update(['title' => request('title-review'),
        'review' => request('text-review')]);

        return redirect(route('home.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
