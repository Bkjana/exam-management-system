<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsMail;
use App\Repositories\Interfaces\UserRepoInterface;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    private UserRepoInterface $userRepoInterface;

    public function __construct(UserRepoInterface $userRepoInterface)
    {
        $this->userRepoInterface = $userRepoInterface;
    }

    function index()
    {
        return view("index");
    }

    function login()
    {
        return view('login');
    }

    function loginCheck(Request $request)
    {
        $request->validate([
            'emailormobile' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

        $user = $this->userRepoInterface->loginCheck($request);
        if (count($user) >= 1) {
            if ($user[0]->role == 'admin') {
                session()->put('admin', $user[0]);
                return redirect("/admin");
            } else if ($user[0]->role == 'teacher') {
                session()->put('teacher', $user[0]);
                return redirect('/teacher');
            } else {
                session()->put('student', $user[0]);
                return redirect('/student');
            }
        } else {
            return view("login", ['loginerror' => 'Credential Not Meet']);
        }
    }

    function register()
    {
        return view("register");
    }
    function registerSave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email|unique:users',
            'mobile' => 'required',
            'address' => 'required',
            'role' => 'required',
            'password' => 'required',
            'retype_password' => 'required | same:password'
        ]);

        if ($_POST['role'] == 'teacher') {
            $request->validate([
                'file' => 'required|mimes:pdf|max:2048',
                'subject' => 'required'
            ]);
        }
        $this->userRepoInterface->SaveUser($request);
        return redirect("/");
    }

    function contact(Request $request)
    {
        // $request->validate([
        //     'contact_name'=>'required',
        //     'contact_email'=>'required|email',
        //     'contact_subject'=>'required',
        //     'contact_message'=>'required',
        // ]);
        // extract($_POST);
        // Mail::send('emails.contact_email', ['name' => $contact_name, 'email' => $contact_email, 'subject' => $contact_subject, 'message' => $contact_message, ], function ($message) {

        //     $message->to('joydipmanna81202@gmail.com')->subject('Subject of the message!');
        // });



        $request->validate([
            'contact_name' => 'required',
            'contact_email' => 'required|email',
            'contact_subject' => 'required',
            'contact_message' => 'required',
        ]);

        $contact_name = $request->input('contact_name');
        $contact_email = $request->input('contact_email');
        $contact_subject = $request->input('contact_subject');
        $contact_message = $request->input('contact_message');

        // Mail::send('emails.contact_email', [
        //     'name' => $contact_name,
        //     'email' => $contact_email,
        //     'subject' => $contact_subject,
        //     'content' => $contact_message,
        // ], function ($message) {
        //     $message->to('bbbjana2021@gmail.com')->subject('Subject of the message!');
        // });

        Mail::to('bbbjana2021@gmail.com')->send(new ContactUsMail($contact_name,$contact_email,$contact_subject,$contact_message));
         return redirect("/");
    }





    function studentQualification(Request $request){
        
        $instituteName = $request->input('institute_name');
        $boardName=$request->input('board_name');
        $passingYear=$request->input('passing_year');
        $percentage=$request->input('percentage');

        $arr = array($instituteName, $boardName, $passingYear, $percentage);

        echo json_encode($arr);

        // print_r($instituteName);
        // print_r($boardName);
        // print_r($passingYear);
        // print_r($percentage);
    }




}