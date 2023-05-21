<?php

namespace App\Http\Controllers;

use App\Models\Tournaments;
use Illuminate\Http\Request;
use App\Models\Teams;

class TournamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tournaments = Tournaments::paginate(10);
        return view('tournaments.index', compact('tournaments')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Teams::all();
        return view("tournaments.create", compact("teams"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'teams' => ['nullable'],
        ]);
    
        $tournament = new tournaments();
        $tournament->name = $request ->name;
        $tournament->user_id = auth()->id();
        $tournament->save();

        $teams = array_slice(($request->input('teams')), 1);
        
        if(!is_null($teams) and count($teams) > 1){
            $tournament->teams()->attach($teams);
        }
        

        session()->flash('success', 'Nuevo torneo creado.');

        return redirect('/tournaments');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tournaments $tournament)
    {
        $teams = Teams::all();
        return view('tournaments.show', compact('tournament'), compact("teams"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tournaments $tournament)
    {
        $teams = Teams::all();
        return view('tournaments.edit', compact('tournament'), compact("teams"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tournaments $tournament)
    {
        $request->validate([
            'name' => ['required'],
        ]);

        $teams = $request->input('teams');

        $tournament->name = $request->name;
        

        if(!empty($teams)){
            $request->validate([
                'teams' => ['no_null_values'],
            ]);
            $tournament->teams()->sync($teams);
        }

        $tournament->save();

        return redirect()->route('tournaments.show', $tournament);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tournaments $tournament)
    {
        $tournament->delete();
        return redirect()->route('tournaments.index');
    }
}
