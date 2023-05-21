<?php

namespace App\Http\Controllers;

use App\Models\Teams;
use Illuminate\Http\Request;
use App\Models\Players;
use Illuminate\Support\Facades\Storage;


class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Teams::paginate(10);
        return view('teams.index', compact('teams')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("teams.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $imagePath = 'teams/download.png';
        

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('teams', 'public');
        } 

        $team = new teams();
        $team->name = $request ->name;
        $team->image = $imagePath;
        $team->save();

        session()->flash('success', 'Nuevo equipo creado.');

        return redirect('/teams');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teams $team)
    {
        $players = Players::all();
        return view('teams.show', compact('team'), compact('players'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teams $team)
    {
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teams $team)
    {
        $request->validate([
            'name' => ['required'],
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = 'teams/download.png';

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('teams', 'public');
        }

        $team->name = $request->name;
        $team->image = $imagePath;
        $team->save();

        session()->flash('success', 'Equipo editado correctamente.');

        return redirect()->route('teams.show', $team);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teams $team)
    {
        $team->delete();

        session()->flash('success', 'Equipo eliminado correctamente.');
        return redirect()->route('teams.index');
    }
}
