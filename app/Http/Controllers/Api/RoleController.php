<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all('id', 'name');
        if (count($roles) > 0) {
            return response()->json([
                'status' => 200,
                'roles' => $roles
            ], 200);
        }
        else{
            return response()->json([
                'status' => 400,
                'roles' => []
            ], 400);
        }
    }
}
