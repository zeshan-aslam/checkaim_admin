<?php

namespace App\Http\Controllers;

use App\Models\section3_card;
use App\Models\section3_main;
use Illuminate\Http\Request;

class Section3Controller extends Controller
{
    public function getsection3content()
    {
        
        $data = section3_main::get();
        return response()->json(['data'=>$data]);
    }
    public function insertsection3(Request $request)
    {
      $validated = $request->validate([
        'btm_text' => 'required',
        'heading' => 'required',
        'text' => 'required',
        'btm_hl_text' => 'required',
      ]);
      $data = section3_main::create([
        'heading' => $request->heading,
        'text' => $request->text,
        'bottom_text' =>  $request->btm_text,
        'bottom_highlight_text' => $request->btm_hl_text
      ]);
      return redirect()->route('section3.section3content')->with('msg', 'Section3 Data is Successfully Added.');
    }
    public function section3singledata(Request $request)
    {
      $data =section3_main::where('id', $request->id)->first();
      return response()->json($data);
    }
    public function updatesection3data(Request $request)
    {
      // return $request->all();
      $users = section3_main::where('id', $request->id)
        ->update([
          'heading' => $request->heading,
          'text' => $request->text, 'bottom_text' => $request->btm_text, 'bottom_highlight_text' => $request->btm_hl_text
        ]);
      return response()->json($users);
    }
    public function section3Changestatus(Request $request)
    {
      $status = section3_main::where('id', '!=', $request->id)->update(['status' => 'suspend']);
      $status = section3_main::where('id', '=', $request->id)->update(['status' => 'active']);
      return response()->json($status);
    }
    
    public function deletesection3(Request $request)
    {
        $data = section3_main::destroy($request->id);
        return response()->json(['data'=>$data]);
    }
    ///////////////////////////////////................SECTION_3_CARD...........////////////////////////////////////////
    public function get_section3_card_content()
    {
          $data= section3_card::get();
          return response()->json(['data'=>$data]);
    } 
    public function insert_section3_card_content(Request $request)
    {
      $validated = $request->validate([
        'main_heading' => 'required',
        'heading' => 'required',
        'text' => 'required',
        'list_text' => 'required',
      ]);
      $data = section3_card::create([
        'heading' => $request->heading,
        'text' => $request->text,
        'main_heading' =>  $request->main_heading,
        'list_text' => $request->list_text
      ]);
      return redirect()->route('section3.section3content')->with('msg', 'Section3 Card Data is Successfully Added.');
    }
    public function delete_section3_card_content(Request $request)
    {
          $data= section3_card::destroy($request->id);
          return response()->json(['data'=>$data]);
    } 
    public function single_section3_card_content(Request $request)
    {
      $data =section3_card::where('id', $request->id)->first();
      return response()->json($data);
    }
    public function update_section3_card_content(Request $request)
    {
      // return $request->all();
      $users = section3_card::where('id', $request->id)
        ->update([
          'heading' => $request->heading,
          'text' => $request->text, 'main_heading' => $request->main_heading, 'list_text' => $request->list_text
        ]);
      return response()->json($users);
    }
   /////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}
