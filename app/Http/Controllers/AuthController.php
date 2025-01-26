<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * login an existing resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'            => 'required|email',
            'password'         => 'required',
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        try {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
                $user = User::where('email', $request->email)->first();
                if (!$user) return $this->sendError('User not found!', []);

                if (Hash::check($request->password, $user->password)) {
                    $data['user']  = $user;
                    $data['token'] = $user->createToken($user->name)->accessToken;
                    return $this->sendResponse('User login successfully.', $data);
                } else {
                    return $this->sendError('Wrong username or password', []);
                }
            } 
            
        } catch (\Throwable $e) {
            return $this->sendError('Failed! ', $e->getMessage());
        }
        
    }
    
    /**
     * register a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'             => 'required',
            'email'            => 'required|email|unique:users',
            'password'         => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        try {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $user = User::create($input);
            $data['email'] =  $user->email;
            return $this->sendResponse('Success Register User! Please Login.', $data);
            
        } catch (\Throwable $e) {
            return $this->sendError('Failed! ', $e->getMessage());
        }
    }
    
    public function logout(Request $request)
    {
        $request->user()->token()->revoke(); 
        return $this->sendResponse('Successfully logged out', []);
    }

}
