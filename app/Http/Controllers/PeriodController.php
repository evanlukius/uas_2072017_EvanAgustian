<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index() {
        $periods = Period::all();
        return view('periods.index', compact('periods'));
    }

    public function create() {
        return view('periods.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:30|unique:periods,name',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'active' => 'sometimes|boolean',
        ]);

        Period::create([
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'active' => $request->has('active'),
        ]);

        return redirect()->route('periods.index')->with('success', 'Period added successfully!');
    }
}
