<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\repositories\ProjectRepository;
use Illuminate\Http\Request;
use DB;
class UsersController extends Controller
{

    public function index(Request $request)
    {
        
        if ($request->has('search')) {
            DB::enableQueryLog();
            $usersList = DB::table('users');

            if(isset($request->name)){
                $usersList->where('name', 'LIKE', '%' . $request->name. '%');
            }

            if(isset($request->email)){
                $usersList->where('email', 'LIKE', '%' . $request->email. '%');
            }

            $usersList = $usersList->get();
           
            return response()->json([
                'success' => true,
                'message' => 'Users List',
                'data'    => $usersList
            ]);
        }else{
            $usersList = DB::table('users')->get();
            return response()->json([
                'success' => true,
                'message' => 'Getting All Data',
                'data'    => $usersList
            ]);
        }
    }

   
}