<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;
class UserController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {  
        $user = new User([
            'firstName' => $request->firstName,
            'lastName'=> $request->lastName,
            'username' => $request->username,
            'password'=>Hash::make($request->password),
            
        ]);
       
        $user->save(); 
        if($user){
            $responce['status'] = true;
             $responce['message'] = 'added successfully';
         }
       return  $responce;
       
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
       	
         $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        try {
            if (auth()->attempt($credentials)) {
                $user = auth()->user();
                
                    $token = $user->createToken($request->email)->accessToken;
                        return response()->json([
                            'token' => $token,
                            'message' => 'Account Logged In.',
                        ], 200);
                
            } else throw new \Exception("Email & password not matched.");
        } catch (\Exception $err) {
            return response()->json([
                'message' => $err->getMessage()
            ], 422);
        }
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        $result= User::all();
        return response()->json($result);
    }
    /**
     * Update the authenticated User
     *
     * @return [json] user object
     */

     public function update(Request $request)
    {
        $id = $request->id;
        $array = [
             'firstName' => $request->firstName,
            'lastName'=> $request->lastName,
            'username' => $request->username,
            'password'=>Hash::make($request->password),
            
             ];
       $user=User::where('id',$id)
            ->update($array);
        if($user){
            $responce['status'] = true;
             $responce['message'] = 'added successfully';
         }
       return  $responce;
    }
}