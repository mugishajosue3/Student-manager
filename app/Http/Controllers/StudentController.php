<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User; 



class StudentController extends Controller
{
    public function createStudent(Request $request)
    {
        $inserted = DB::table('students')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
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
    $students = DB::table('students')->get();

    // Get the count of students
    $studentCount = $students->count();

    // Extract just the names of the students
    $usernames = $students->pluck('name');

    // Pass the student names and count to the view
    return view('student-list', [
        'usernames' => $usernames,
        'studentCount' => $studentCount,
    ]);
}


    public function updateStudent()
    {
        $user = DB::update('update users set name = ? where id = ?', ['Joshua', 12]);

        dd($user);

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
