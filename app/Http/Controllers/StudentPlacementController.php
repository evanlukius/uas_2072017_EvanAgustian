<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentPlacement;
use App\Models\Student;
use App\Models\Period;

class StudentPlacementController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('period_id');
        $periods = Period::all();

        $placements = StudentPlacement::when($filter && $filter != 'all', function ($query) use ($filter) {
            return $query->where('period_id', $filter);
        })->with(['student', 'period'])->get();

        return view('studentplacements.index', compact('placements', 'periods'));
    }

    public function create()
{
    $periods = \App\Models\Period::all();
    $students = \App\Models\Student::all();
    return view('studentplacements.create', compact('periods', 'students'));
}

    public function store(Request $request)
    {
        $request->validate([
            'period_id' => 'required|exists:periods,id',
            'student_nims' => 'required|array',
            'class' => 'required|max:5'
        ]);

        foreach ($request->student_nims as $student_nim) {
            StudentPlacement::create([
                'period_id' => $request->period_id,
                'student_nim' => $student_nim,
                'class' => $request->class
            ]);
        }

        return redirect()->route('placements.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
