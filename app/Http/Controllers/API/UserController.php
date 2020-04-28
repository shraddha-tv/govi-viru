<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
use Validator;

use App\User; 
use App\Http\Resources\Farmer as FarmerResource; 

class UserController extends Controller 
{
    public $successStatus = 200;
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['phoneNo' => request('phoneNo'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            // dd($user->createToken('MyApp'));
            $data = [
                'grant_type' => 'password',
                'client_id' => env('CLIENT_ID', ''),
                'client_secret' => env('CLIENT_SECRET', ''),
                'username' => request('phoneNo'),
                'password' => request('password'),
            ];
        
            $requests = Request::create('/oauth/token', 'POST', $data);
            $response = app()->handle($requests);
            $rData = json_decode($response->getContent());   

            return response()->json([
                "status"=>0,
                "auth"=> $rData->access_token,
                "refresh"=> $rData->refresh_token,
            ], $this->successStatus); 
        } 
        else{ 
            return response()->json(['status'=>1], 401); 
        } 
    }
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'address' => 'required', 
            'lat' => 'required', 
            'long' => 'required', 
            'phoneNo' => 'required|unique:users', 
            'whatsappNo' => 'required', 
            'role' => 'required', 
            'password' => 'required',
        ]);

        if ($validator->fails()) { 
            $errors = $validator->errors();
            if ($errors->has('phoneNo')) {
                return response()->json(['status'=>1,"message"=>"Phone no already exists"], 401); 
            }
            return response()->json(['status'=>1,'message'=>$validator->errors()], 401);            
        }

        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 

        $user = User::create($input); 
        
        // $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        // $success['name'] =  $user->name;

    return response()->json(["status"=> 0, "message"=> "success"], 200); 

    }
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this->successStatus); 
    } 

    /** 
     * Get User in Given Phone Number
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function getUser(Request $request) 
    { 
        $phoneNo = $request->phoneNo;

        $user = User::where('phoneNo',$phoneNo)->first(); 

        return response()->json(new FarmerResource($user), $this->successStatus); 
    } 

    /** 
     * Register Farmers
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function farmerRegister(Request $request)
    { 
        $request->validate([ 
            'name' => 'required', 
            'address' => 'required', 
            'lat' => 'required', 
            'long' => 'required', 
            'phoneNo' => 'required|unique:users', 
            'whatsappNo' => 'required',
        ]);

        $request['password'] = bcrypt('password'); 
        $request['role'] = 1; 
        $user = new FarmerResource(User::create($request->all()));

        return response()->json($user, $this->successStatus); 
    } 
}