<?php

namespace App\Http\Controllers;

use App\Grade;
use Illuminate\Http\Request;
use App\Student;
use App\Board;
use App\StudentBoard\CSMStudentBoardHandler;
use App\StudentBoard\CSMBStudentBoardHandler;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students', [
          'students' => Student::all(),
          'boards' => Board::all(),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->grades)){
            $grades = [];
            $gradeValues = explode(',', $request->grades);
            foreach ($gradeValues as $value){
                $grades[] = new Grade(['grade' => $value]);
            }
        }

        $student = new Student();
        $student->name =  $request->name;
        $student->board()->associate(Board::find($request->board));
        $student->save();
        $student->grades()->saveMany($grades);


        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        if($student->board->type == 'csm'){
            $handler = new CSMStudentBoardHandler();
        }
        elseif ($student->board->type == 'csmb'){
            $handler = new CSMBStudentBoardHandler();
        }
        $result = $handler->handle($student);
        return response($result, 200)->header('Content-Type', 'application/' . $handler->getFormat());
    }
}
