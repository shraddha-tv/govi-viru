<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Model\Vegetable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Vegetable as VegetableResource; 
class VegetableController extends Controller
{
    /**
     * Get Vegetable List
     * 
     */
    public function index(){
        $list =  VegetableResource::collection(Vegetable::all());
        return response()->json($list, 200); 
    }

    /**
     * Add New Vegetable
     * 
     */
    public function store(){

    }

    /**
     * Get Vegetable Details
     * 
     */
    public function show(){

    }

    /**
     * Update Vegetable
     * 
     */
    public function update(){

    }

    /**
     * Delete Vegetable
     * 
     */
    public function destroy(){

    }

    /**
     * Create Vegetable List
     * 
     */
    public function createVegeList(Request $request){

        try{

            $farmer = User::findOrFail($request->farmerId);
            
            $farmer->vegetables()->createMany($request->vegset);
            
            return response()->json(["status"=> 0, "message"=> "success"], 200); 
        }catch(\Exception $e){
            return response()->json(["status"=> 1, "message"=> $e->getMessage()], 401); 
        }
    }
}
