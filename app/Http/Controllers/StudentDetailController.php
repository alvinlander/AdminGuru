<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\StudentDetail;
use App\Http\Requests\StudentDetailRequest;

class StudentDetailController extends Controller
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
    public function create(Request $request)
    {
        $data = Student::where('user_id',$request->user()->id)->pluck('nama','id');
        return view('pages.studentdetails.create')->with([
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentDetailRequest $request)
    {
        $data = $request->all();
        $ipa = $request->ipa;
        $ips = $request->ips;
        $matematika = $request->matematika;
        $total = $ipa+$ips+$matematika;
        StudentDetail::create($data);
        $nilai = Student::findorFail($request->student_id);
        $nilai->update(['nilai_total'=>$total]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = StudentDetail::with('students')->findorFail($id);
        return view('pages.studentdetails.edit')->with([
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
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'ipa'=>'required|integer',
            'ips'=>'required|integer',
            'matematika'=>'required|integer'
        ]);
        $ipa = $request->ipa;
        $ips = $request->ips;
        $matematika = $request->matematika;
        $total = $ipa+$ips+$matematika;
        $detail = StudentDetail::findorFail($id);
        $detail->update($data);
        Student::findorFail($detail->student_id)->update(['nilai_total'=>$total]);
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
        //
    }
}
