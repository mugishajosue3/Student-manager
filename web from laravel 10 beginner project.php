<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
   // fetch all users 
//    $users = DB::select("select * from users");
//  
     $users = DB::table('users')->get();

//    create new users
//    $user = DB::insert('insert into users (name,email,password) values (?,?,?)',[
//      'Joshua',
//      'joshua1@gmail.com',
//      'password',
//    ]);

// $users = DB:: table('users')->insert([f
//     'name'  => 'sssssSarthak',
//     'email' => 'sssssarthak@gmail.com',
//     'password' => 'password',
// ]);

$users = User::create([
        'name'  => 'sssssSarthak',
        'email' => 'sssssarthak@gmail.com',
        'password' => 'password',
    ]);
   

// $user = User::where('id', 1)->first();
// $user->update([
//         'name'  => 'sssssSarthak',
//         'email' => 'sssssarthak@gmail.com',
//         'password' => 'password',
//     ]);

// $users = DB::table('users')->where('id', 1)->update(['email' => 'abcadefg@gmail.com']);
//    $user = DB::update("update users set email=? where id=?", [
//     'abcdbind@gmail.com',
//     '4'
//    ]);

 // to delete a user
//  $users = DB::insert("insert into users (name,email,password) values (?,?,?) ",[
//    'joshua',
//    'joshua@gmail.com',
//    'almost there not giving up'
//  ]);

   dd($users);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


});