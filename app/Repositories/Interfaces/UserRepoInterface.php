<?php

namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;
use App\Models\User;


interface UserRepoInterface{
    public function SaveUser(Request $request);

    public function loginCheck(Request $request);


}




?>