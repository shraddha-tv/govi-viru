<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Model\Vegetable;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Vegetable as VegetableResource; 
use App\Http\Resources\VegetableList as VegetableListResource; 
class VegetableController extends Controller
{
    /**
     * Get Vegetable List
     * 
     */
    public function index(){
        return VegetableListResource::collection(Vegetable::paginate());
    }

    /**
     * Add New Vegetable
     * 
     */
    public function store(Request $request){
        try{

            $request->validate([
              "farmerId" => "required",
              "vegId" => "required",
              "grade" => "required",
              "rate" => "required",
              "quantity" => "required",
            ]);

            $vegetable = Vegetable::create($request->all());
            
            return response()->json(["message"=>"Successfully Create Vegetable"], 200); 
          }catch(\Exception $e){
              return response()->json(["message"=>$e->getMessage()], 200); 
          }
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
    public function update(Request $request, $id){
      try{
        $request->validate([
          "farmerId" => "required",
          "vegId" => "required",
          "grade" => "required",
          "rate" => "required",
          "quantity" => "required",
        ]);

        $vegetable = Vegetable::findOrFail($id);
        $vegetable->update($request->all());
        
        return response()->json(["message"=>"Successfully Update Vegetable"], 200); 
      }catch(\Exception $e){
          return response()->json(["message"=>$e->getMessage()], 200); 
      }
    }

    /**
     * Delete Vegetable
     * 
     */
    public function destroy($id){
      try{
 
        $vagetable = Vegetable::findOrFail($id);
        $vagetable->delete();
        
        return response()->json(["message"=>"Successfully Delete Vegetable"], 200); 
      }catch(\Exception $e){
          return response()->json(["message"=>$e->getMessage()], 200); 
      }
    }

    /**
     * Delete Vegetable
     * 
     */
    public function getVegetable(){
        $list =  VegetableResource::collection(Vegetable::all());
        return response()->json($list, 200); 
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
