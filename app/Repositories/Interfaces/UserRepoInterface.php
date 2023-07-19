<?php

namespace App\Repositories\Interfaces;
use Illuminate\Http\Request;



interface UserRepoInterface{
    public function SaveUser(Request $request);

    public function loginCheck(Request $request);


}




?>