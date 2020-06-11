<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Student;
use App\StudentDetail;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('assets/students','public');
        $data['user_id'] = $request->user()->id;
        $data['nilai_total'] = 0;
        Student::create($data);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Student::with('details')->findorFail($id);
        // return response()->json($data);
        return view('pages.students.show')->with([
            'data'=>$data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Student::findorFail($id);
        return view('pages.students.edit')->with([
            'data'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $data = $request->all();
        $data['foto'] = $request->file('foto')->store('assets/students','public');
        Student::find($id)->update($data);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Student::findorFail($id);
        $item->delete();
        StudentDetail::where('student_id',$id)->delete();
        return redirect()->route('home');
    }
    public function getrank(Request $request){
        $data = Student::orderBy('nilai_total','DESC')->where('user_id',$request->user()->id)
        ->get();
        return view('pages.students.rank')->with([
            'data'=>$data
        ]);
    }
}
