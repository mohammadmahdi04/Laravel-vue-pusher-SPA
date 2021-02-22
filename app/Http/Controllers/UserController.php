<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function generateToken()
    {
        return md5(date("D M j G:i:s T Y") . microtime());
    }
    public function login(Request $request)
    {
        $query =  User::where('email',$request->email);
//            ->where('password',Hash::make($request->password));
        if (empty($query->first())){
            return response('No User');
        }
        $query->update(['remember_token'=>$this->generateToken()]);
        $user = $query->get(['name','email','remember_token'])->first();
        return  [
            'email' => $user->email,
            'token' =>$user->remember_token,
        ];
        return new UserResource($user);
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' =>'required|confirmed'
        ]);
        if ($validator->fails()) {
            return $validator->getMessageBag()->toArray();
        }return $validator->validated();
    }
}
