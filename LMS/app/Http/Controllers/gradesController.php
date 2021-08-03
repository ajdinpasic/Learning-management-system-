<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class gradesController extends Controller
{
    public function index(Request $request)
    {
        //$courses = $request->user()->course()->select('name')->get();
        //$grades = DB::table('grades')->where('user_id', '=', $request->user()->id)->groupBy('course_id')->sum('grade');

        /* $grades = DB::table('grades')
            ->join('courses', 'grades.course_id', '=', 'courses.id')
            ->where('grades.user_id', '=', $request->user()->id)
            ->sum('grades.grade'); */

        //$grades = Grade::selectRaw('sum(grade) AS sum')->where('user_id', '=', $request->user()->id)->groupBy('course_id')->get();

        $grades = [];
        $id = $request->user()->id;
        $query = DB::select("SELECT courses.id,courses.name,sum(grades.grade) AS sum FROM courses JOIN grades ON courses.id = grades.course_id WHERE courses.user_id='$id' GROUP BY (grades.course_id)");
        //dd(gettype($query[0]->id));
        if (!is_null($query)) {
            for ($i = 0; $i < count($query); $i++) {
                $course_id = $query[$i]->id;
                $grades[$i] = DB::select("SELECT grades.title as title, grades.grade AS grade,courses.name AS course FROM grades JOIN courses ON grades.course_id = courses.id WHERE (courses.id = '$course_id' AND  grades.course_id = '$course_id')");
            }
            //return view('layouts.grades', ["query" => $query, "grades" => $grades]);
        } else {
            $query = [];
            $grades = [];
        }
        return view('layouts.grades', ["query" => $query, "grades" => $grades]);


        //$grades = json_encode(($grades));

        //dd(gettype($grades[0][0]->grade));

        /*
        for ($i = 0; $i < count($grades); $i++) {
            for ($j = 0; $j < count($grades[$i]); $j++) {
                print_r($grades[$i][$j]->grade . "    ");
            }
        } */

        /*
        for ($i = 0; $i < count(($grades)); $i++) {
            for ($j = 0; $j <= count(($grades[$i])); $j++) {
                print_r($grades[$i][$j]);
            }
        } */
    }
}
