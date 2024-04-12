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
            return redirect('/api/my-form')->with('message', 'done');
        } else {
            return response()->json(['message' => 'Failed to create student'], 500);
        }

        dd($inserted);
    }

    public function listStudent()
    {
        $user = DB::select('select * from users');
        $usernames = collect($user)->pluck('name');
        dd($usernames);

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
