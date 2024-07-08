<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class adminUserController extends Controller
{
    public function index()
    {
        $admin_user=DB::table('admin_user')->get();
        return response()->json(['data'=>$admin_user]);
    }
    public function create(Request $request)
    {
        $isExist =User::where('email',$request->email)->exists();
             
            if(!$isExist)
            {
                $user=User::create([
                    'name' => $request->name,
                    'email' =>  $request->email,
                    'password' => Hash::make($request->password),
                   
                ]);
                $admin_user=DB::table('admin_user')->insert([
                    'name' => $request->name,
                    'username' =>  $request->email,
                    'password' => $request->password,
                    'user_id'  => $user->id
        
                ]);
                return redirect()->back()->with('msg', 'New Admin Created Successfully.');
            }else
            {
                return redirect()->back()->with('msg', 'Email Already Exist');
            }
    }
}
