<?php

namespace App\Http\Controllers;

use App\Models\Problems;
use App\Models\TestCases;
use Illuminate\Http\Request;

class ProblemsController extends Controller
{
    public function index()
    {
        $problems = Problems::latest()->with('testCases')->get();
        return  response()->json($problems);
    }

    public function create(Request $request)
    {
        $problem = new Problems();
        $problem->category_id = $request->category_id;
        $problem->title = $request->title;
        $problem->description = $request->description;
        $problem->score = $request->score;
        $problem->save();
        //$testCases = json_decode($request->testCase, true);
        $testCases = $request->testCase;
        foreach ($testCases as $key => $data){
            $testCase = new TestCases();
            $testCase->problem_id = $problem->id;
            $testCase->input = $data['input'];
            $testCase->output = $data['output'];
            $testCase->save();
        }

        return response()->json(['status' => 'success'],200);
    }

    public function show($id)
    {
        $problem = Problems::find($id);
        return response()->json($problem);
    }

    public function update(Request $request)
    {
        $problem = Problems::find($request->id);;
        $problem->title = $request->title;
        $problem->description = $request->description;
        $problem->score = $request->score;
        $problem->save();

        return response()->json(['status' => 'success'],200);
    }

    public function destroy($id)
    {
        $problem = Problems::find($id);
        if ($problem){
            $problem->delete();
        }
        return response()->json(['status' => 'success'],200);
    }
}
