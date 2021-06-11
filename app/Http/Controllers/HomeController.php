<?php

namespace App\Http\Controllers;

use App\Models\Ratin;
use App\Models\UserList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $listGames = UserList::where('user_id', Auth::id())->with('videogame')->orderBy('videogame_id')->get();

        $type = DB::select('SHOW COLUMNS FROM user_lists WHERE Field = "status"')[0]->Type;
        
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $statuses = array();
        foreach (explode(',', $matches[1]) as $value) {
            $statuses[] = trim($value, "'");
        }

        $ratins = Ratin::where('user_id', Auth::id())->orderBy('videogame_id')->get();

        return view('home', compact('listGames', 'statuses','ratins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserList::create(['user_id' => Auth::id(), "videogame_id" => $request->videogame_id]);
        return redirect(route('home.index'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'change-score' => 'integer|between:0,10',
            'change-status' => 'in:Jugando,Abandonado,Planeado,Completado,Inactivo',
        ]);

        if (request("change-status"))
            DB::table('user_lists')->where('user_id', Auth::id())->where('videogame_id', request("idGame"))->update(['status' => request("change-status")]);
        else
            DB::table('user_lists')->where('user_id', Auth::id())->where('videogame_id', request("idGame"))->update(['score' => request("change-score")]);
        return redirect(route('home.index'));
    }

    public function destroy(Request $request)
    {
        DB::table('user_lists')->where('user_id', Auth::id())->where('videogame_id', request("idGame"))->delete();
        DB::table('ratins')->where('user_id', Auth::id())->where('videogame_id', request("idGame"))->delete();
        return redirect(route('home.index'));
    }
}
