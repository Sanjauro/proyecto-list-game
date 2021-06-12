<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ratin;
use App\Models\Userlist;
use Illuminate\Http\Request;
use App\Models\Videogame;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $videogames_published = Videogame::where('published_at', '<=', date("Y/m/d"))->orderBy('published_at', 'desc')->take(6)->get();
        $videogames_next = Videogame::where('published_at', '>', date("Y/m/d"))->orderBy('published_at', 'desc')->take(6)->get();
        return view('welcome', compact('videogames_published', 'videogames_next'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'date',
        ]);

        DB::table('videogames')->insert([
            'name' => $request->name,
            'cover' => $request->cover,
            'price' => $request->price,
            'published_at' => $request->date,
            'description' => $request->description,
        ]);

        $idGame = Videogame::where('name', $request->name)->take(1)->get();

        foreach ($request->categories as $category) {
            DB::table('category_videogame')->insert([
                'videogame_id' => $idGame[0]->id,
                'category_id' => $category,
            ]);
        }
        return redirect('/add')->with('added', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $purchased = null;
        $videogame = Videogame::where('name', '=', $name)->get();
        $ratins = Ratin::where('videogame_id', '=', $videogame[0]->id)->get();

        $listed = Userlist::where('user_id', Auth::id())->where('videogame_id', $videogame[0]->id)->exists();

        if (session('purchased'))
            $purchased = session('purchased');

        return view('videogame', compact('videogame', 'ratins', 'purchased', 'listed'));
    }

    public function search(Request $request)
    {
        if (request('category'))
            $videogames_search = Category::where('name', request('category'))->firstOrFail()->videogames;
        else {
            $search = $request->buscador;
            $videogames_search = Videogame::where('name', 'like', '%' . $search . '%')->get();
        }
        return view('search', compact('videogames_search'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $categories = Category::all();
        $videogame = Videogame::where('name', $name)->get();
        $videogameCategories = DB::table('category_videogame')->where('videogame_id',$videogame[0]->id)->get();
        return view('add', compact('videogame', 'categories','videogameCategories'));
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
        if (request('delete')) {
            DB::table('videogames')->where('name', $request->name)->delete();
            return redirect('/add')->with('deleted', true);
        } else {
            DB::table('videogames')->where('name', $request->name)->update([
                'cover' => $request->cover,
                'price' => $request->price,
                'published_at' => $request->date,
                'description' => $request->description,
            ]);

            $idGame = Videogame::where('name', $request->name)->take(1)->get();

            DB::table('category_videogame')->where('videogame_id',$idGame[0]->id)->delete();

            foreach ($request->categories as $category) {
                DB::table('category_videogame')->insert([
                    'videogame_id' => $idGame[0]->id,
                    'category_id' => $category,
                ]);
            }

            return redirect('/videojuegos/' . $request->name)->with('updated', true);
        }
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

    public function purchase(Request $request)
    {
        if (Auth::user()) {

            DB::table('purchases')->insert([
                'videogame_id' => $request->id,
                'user_id' => Auth::id(),
                'price' => $request->price,
                'platform' => $request->format,
            ]);

            return redirect(route('videogames.show', $request->name))->with('purchased', true);
        } else {
            return redirect('/login');
        }
    }
}
