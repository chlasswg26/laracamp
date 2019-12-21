<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function index(){

        $students = Student::paginate(5);
        return view('welcome', compact('students'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $rules = [
            'firstname' => 'required|max:20',
            'lastname' => 'required|max:25',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ];

        $ruleMessages = [
            'required' => 'Bidang isian :attribute dibutuhkan!',
            'max' => 'Bidang isian :attribute terlalu panjang, maksimal :max Karakter!',
            'numeric' => 'Bidang isian :attribute harus mengandung angka!',
            'email' => 'Bidang isian :attribute menggunakan format E-Mail!'
        ];

        $this->validate($request, $rules, $ruleMessages);

        $student = new Student;
            $student->first_name = $request->firstname;
            $student->last_name = $request->lastname;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->save();

            return redirect(route('home'))->with('pesanSukses', 'Student Successfully Added!');
    }

    public function edit($id){
        $student = Student::find($id);
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id){
        $rules = [
            'firstname' => 'required|max:20',
            'lastname' => 'required|max:25',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ];

        $ruleMessages = [
            'required' => 'Bidang isian :attribute dibutuhkan!',
            'max' => 'Bidang isian :attribute terlalu panjang, maksimal :max Karakter!',
            'numeric' => 'Bidang isian :attribute harus mengandung angka!',
            'email' => 'Bidang isian :attribute menggunakan format E-Mail!'
        ];

        $this->validate($request, $rules, $ruleMessages);

        $student = Student::find($id);
            $student->first_name = $request->firstname;
            $student->last_name = $request->lastname;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->save();

            return redirect(route('home'))->with('pesanSukses', 'Student Successfully Updated!');
    }

    public function delete($id){
        Student::find($id)->delete();
        return redirect(route('home'))->with('pesanSukses', 'Student Successfully Deleted!');
    }
}
