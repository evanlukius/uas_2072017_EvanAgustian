<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Period;
use App\Models\Student;
use App\Models\StudentPlacement;

class DashboardController extends Controller
{
    public function index() 
    {
        $user = auth()->user();
        $activePeriod = Period::where('active', 1)->first();
        $totalStudents = Student::count();
        $studentsInPeriod = StudentPlacement::where('period_id', optional($activePeriod)->id)->count();

        return view('dashboard', compact('user', 'activePeriod', 'totalStudents', 'studentsInPeriod'));
    }
}
