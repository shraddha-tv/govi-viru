<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Role;
use App\Http\Resources\Role as RoleResource; 


class RoleController extends Controller
{
  /**
   * Get all the Item with Pagination
   * @method GET
   */
  public function index()
  {
    return RoleResource::collection(Role::paginate());
  }
  /**
   * Get all the Item with Pagination
   * @method GET
   */
  public function store(Request $request)
  {
    try {

      $request->validate([
        "name" => "required"
      ]);

      $Role = Role::create($request->all());

      return response()->json(["message" => "Successfully Create Role"], 200);
    } catch (\Exception $e) {
      return response()->json(["message" => $e->getMessage()], 200);
    }
  }
  /**
   * Get all the Item with Pagination
   * @method GET
   */
  public function show()
  {
  }
  /**
   * Get all the Item with Pagination
   * @method GET
   */
  public function update(Request $request,$id)
  {
    try {

      $request->validate([
        "name" => "required",
        "state" => "required",
      ]);
     
      $Role = Role::findOrFail($id);
      $Role ->update($request->all());

      return response()->json(["message" => "Successfully Update Role"], 200);
    } catch (\Exception $e) {
      return response()->json(["message" => $e->getMessage()], 200);
    }
  }
  /**
   * Get all the Item with Pagination
   * @method GET
   */
  public function destroy($id)
  {
    try {

      $Role = Role::findOrFail($id);
      $Role->delete();

      return response()->json(["message" => "Successfully Delete Role"], 200);
    } catch (\Exception $e) {
      return response()->json(["message" => $e->getMessage()], 200);
    }
  }

  public function activeRole(){
    return Role::where('state','active')->get(['id','name']);
  }
}
