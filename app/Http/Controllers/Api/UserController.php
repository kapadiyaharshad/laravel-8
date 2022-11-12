<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function index(){
        $users = User::with('roles')->orderByDesc('users.id')->get();
        if (count($users) > 0) {
            return response()->json([
                'status' => 200,
                'users' => $users
            ], 200);
        }
        else{
            return response()->json([
                'status' => 400,
                'users' => []
            ], 400);
        }
    }
    public function store(UserStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $roles = $request->role_id;
            $user = new User();
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $save = $user->save();
            if ($save) {
                $user->roles()->attach($roles);
                DB::commit();
                return response()->json([
                    'status' => 200,
                    'message' => "User added successfully."
                ], 200);
            }
        } catch (\Exception $e) {
            DB::rollback();
           
        }
    }
}
