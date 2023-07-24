<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepoInterface;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserRepoInterface $userRepoInterface;

    public function __construct(UserRepoInterface $userRepoInterface) {
        $this->userRepoInterface = $userRepoInterface;
    }

    function index() {
        return view("index");
    }

    function login(){
        return view('login');
    }

    function loginCheck(Request $request) {
        $request->validate([
            'emailormobile'=>'required',
            'role'=>'required',
            'password'=>'required',
        ]);

        $user=$this->userRepoInterface->loginCheck($request);
        if(count($user)>=1){
            if($user[0]->role=='admin'){
                session()->put('admin',$user[0]);
                return redirect("/admin");
            }
            else if($user[0]->role=='teacher'){
                session()->put('teacher',$user[0]);
                return redirect('/teacher');
            }
            else{
                session()->put('student',$user[0]);
                return redirect('/student');
            }
        }else{
            return view("login",['loginerror'=>'Credential Not Meet']);
        }
    }

    function register() {
        return view("register");
    }
    function registerSave(Request $request) {
        $request->validate([
            'name'=>'required',
            'email'=>'required | email|unique:users',
            'mobile'=>'required',
            'address'=>'required',
            'role'=>'required',
            'password'=>'required',
            'retype_password'=>'required | same:password'
        ]);
        
        if($_POST['role']=='teacher'){
            $request->validate([
                'file' => 'required|mimes:pdf|max:2048',
                'subject' => 'required'
            ]);
        }
        $this->userRepoInterface->SaveUser($request);
        return redirect("/");
    }
}
