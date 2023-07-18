<?php

namespace App\Repositories;
use Illuminate\Http\Request;

use App\Repositories\Interfaces\UserRepoInterface;
use App\Models\User;

class UserRepository implements UserRepoInterface
{
   public function SaveUser(Request $request) {
        $user = new User;
        $user->name=$_POST['name'];
        $user->email=$_POST['email'];
        $user->mobile=$_POST['mobile'];
        $user->address=$_POST['address'];
        $user->role=$_POST['role'];
        $user->password= $_POST['password'];
        $user->save();
        if($_POST['role']=='teacher'){
            $file_name=$user->id.".pdf";
            $file = $request->file('file');
            $file->storeAs('pdfs', $file_name,'public');
        }
    }

    function loginCheck(Request $request) {
        $emailormobile=$_POST['emailormobile'];
        $password=$_POST['password'];
        $role=$_POST['role'];
        if (str_contains($emailormobile,'@')) {
            $user=User::where('email','=',$emailormobile)
                        ->where('password','=',$password)
                        ->where('role','=',$role)
                        ->get();
            // echo $user;
        }else{
            $user=User::where('mobile','=',$emailormobile)
                        ->where('password','=',$password)
                        ->where('role','=',$role)
                        ->get();
            // echo $user;
        }
        return $user;

    }
}



?>