<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\StudInsert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\userInfo;
use DB;
use Illuminate\Http\Request;

class UserinfoController extends Controller
{
    //
    public function index(){
        return view('UserInfo.index');
    }

    public function createuser(){
        return view('UserInfo.createuser');
    }

    public function saveuser(Request $request){

        $data= $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'id_number' => 'required',
            'contact_number'=> 'required',
            'email'=>'required',
            'dob'=> 'required',
            'language'=>'required',
            'interests'=>'required'

        ]);
        
        $newUserInfo = userInfo::create($data);
        return redirect(route('userInfo.createuser.php'));
    }
}
