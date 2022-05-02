<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
    public function courses (Request $request) {
        $teacher = Professor::findOrfail($request->teacher_id);
        return response($teacher->courses)
            ->header('Access-Control-Allow-Origin', '*');
    } 
}
