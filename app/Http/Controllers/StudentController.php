<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use App\Models\Student; 



class StudentController extends Controller
{
    public function createStudent(Request $request)
    {

        $hashedpassword = hash::make($request->input('password'));
        $inserted = DB::table('students')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $hashedpassword,
        ]);
    
        // Check if insertion was successful
        if ($inserted) {
            return redirect('/api/list-student')->with('message', 'done');
        } else {
            return response()->json(['message' => 'Failed to create student'], 500);
        }

        dd($inserted);
    }

    public function listStudent()
{
    // Get all students from the database
    $students = DB::table('students')->select('id', 'name', 'email')->get();

    // Get the count of students
    $studentCount = $students->count();

    // Extract just the names of the students
    $usernames = $students->pluck('name');

    // Extracts Id also
    // $student = $students->pluck('id');

    // Pass the student names and count to the view
    return view('student-list', [
        'usernames' => $usernames,
        'studentCount' => $studentCount,
        // 'student' => $student,
    ]);

    // dd($students);
}


public function showUpdateForm($id)
    {
        // Retrieve the student based on the provided ID
        $student = Student::findOrFail($id);

        // Pass the student data to the view
        return view('update-student', ['student' => $student]);
    }

    public function updateStudent(Request $request, $id)
{
    // Retrieve the student based on the provided ID
    $student = Student::findOrFail($id);

    // Update the student's information
    $student->name = $request->input('name');
    $student->email = $request->input('email');
    $student->save();

    // Redirect back to the list of students or show a success message
    // Redirecting back to the list of students might look like this:
    return redirect('/api/list-student')->with('message', 'Student updated successfully');
}

    


    public function deleteStudent()
{
    $deleted = DB::delete('delete from users where id = ?', [1]);

    dd($deleted);
}

    public function form()
{
    return view('student-manager');
}

}
