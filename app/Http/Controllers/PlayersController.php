<?php

namespace App\Http\Controllers;

use App\Models\Players;
use Illuminate\Http\Request;
use App\Models\Teams;

class PlayersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Players::with('team')->paginate(10);
        return view('players.index', compact('players')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Teams::all();
        return view('players.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'team_id' => ['required'],
            'gender' => ['required'],
            'date' => ['required']
        ]);
    
        $player = new Players();
        $player->name = $request ->name;
        $player->team_id = $request ->team_id;
        $player->gender = $request -> gender;
        $player ->date = $request -> date;
        $player->save();

        session()->flash('success', 'Nuevo jugador agregado.');

        return redirect('/players');
    }

    /**
     * Display the specified resource.
     */
    public function show(Players $player)
    {
        return view('players.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Players $player)
    {
        $teams = Teams::all();
        return view('players.edit', compact('player'), compact('teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Players $player)
    {
        $request->validate([
            'name' => ['required'],
            'team_id' => ['required'],
            'gender' => ['required'],
            'date' => ['required']
        ]);

        $player->name = $request->name;
        $player->team_id = $request->team_id;
        $player->gender = $request->gender;
        $player->date = $request->date;
        $player->save();
        return redirect()->route('players.show', $player);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Players $player)
    {
        $player->delete();
        return redirect()->route('players.index');
    }
}
