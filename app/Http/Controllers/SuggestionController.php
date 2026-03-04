<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suggestion;

class SuggestionController extends Controller
{
    public function form()
    {
        return view('suggest.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'plant_name' => 'required',
            'description' => 'required'
        ]);

        Suggestion::create([
            'name' => $request->name,
            'plant_name' => $request->plant_name,
            'description' => $request->description,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Terima kasih atas sarannya!');
    }
}
