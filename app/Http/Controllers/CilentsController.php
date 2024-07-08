<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CilentsController extends Controller
{
    public function cilents()
    {
        $dataToShow=array();
        $cilents =DB::table('av_users')->where('type',3)->get();
        $av_meta=array();
        foreach($cilents as $cilent){
            $data =DB::table('av_usermeta')->where('user_id',$cilent->id)->get();
            $av_meta['id']=$cilent->id;
            foreach($data as $row){
                $av_meta[$row->user_key]=$row->user_meta;
            }

            $dataToShow[]=$av_meta;
        }
        // dd($dataToShow);
        // return $dataToShow;
        return view('admin.cilents',compact('dataToShow'));
        
    }
    public function single_cilent($id)
    {  
        $single_view=array();
        $single_cilents =DB::table('av_usermeta')->where('user_id',$id)->get();
        foreach($single_cilents as $single)
        {
          $single_view[$single->user_key]=$single->user_meta;
        }
        // dd($single_view);
        return view('admin.single_cilents',compact('single_view'));
    }
    public function delete_cilent($id)
    {  
        $delete_cilents=DB::table('av_usermeta')->where('user_id',$id)->delete();
        $delete_cilent=DB::table('av_users')->where('id',$id)->delete();
        
        // dd($single_view);
        return redirect()->back();
    }

    public function statusChange(Request $request)
    { 
        $cilents_status  = DB::table('av_usermeta')->where('user_id',$request->id)
        ->where('user_key','av_campaign_status')->update(['user_meta' => $request->status]);
        return response()->json("status changed");
		//return 'api called';
      // return 'api called-'.$request->id.'-'.$request->status;
    }
}
