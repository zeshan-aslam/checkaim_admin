<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\ImageStore;
use App\Models\header;
use App\Models\headerMenu;
use App\Models\sectio2_slider;
use App\Models\section1;
use Illuminate\Support\Facades\DB;

class EditcontentController extends Controller
{
  public function getheader()
  {
    return view('editContent.header.header');
  }
  public function section2content()
  {
    return view('editContent.section2.section2content');
  }

  public function getheaderData()
  {
    $data = header::get();
    return response()->json(['data' => $data]);
  }
  public function delete(Request $request)
  {
    $data = header::destroy($request->id);
    return $data;
  }
  public function insertheader(Request $request)
  {
    $validated = $request->validate([
      'img' => 'required|image|mimes:png|max:2048',
      'login' => 'required',
      'signup' => 'required',
    ]);
    $imageName = $request->file('img');
    $pathName = 'testimg/';
    $image = ImageStore::image($imageName, $pathName);
    $data = header::create([
      'logo' => $image,
      'login' => $request->login,
      'signup' =>  $request->signup,
    ]);
    return redirect()->route('header.getheader')->with('msg', 'Header Data is Successfully Added.');
  }
  public function getsingleData(Request $request)
  {
    $data = header::where('id', $request->id)->first();
    return response()->json($data);
  }
  public function  updateData(Request $request)
  {
    $pathName = 'testimg/';
    $checkimage = $request->hasFile('file');
    $img = $request->file('file');
    //filter query based on image file exist on not
    $users = header::where('id', $request->id);
    if ($checkimage) {
      $image = ImageStore::image($img, $pathName);
      $users->update(['logo' => $image, 'login' => $request->login, 'signup' => $request->signup]);
      $msg = 1;
      return response()->json($msg);
    } else {

      $users = header::where('id', $request->id)
        ->update([
          'login' => $request->login,
          'signup' => $request->signup
        ]);
      return response()->json($users);
    }
  }
  public function changeStatus(Request $request)
  {
    // return $request->id;
    $status = header::where('id', '!=', $request->id)->update(['status' => 'suspend']);
    $status = header::where('id', '=', $request->id)->update(['status' => 'active']);
    return response()->json($status);
  }
  //.............................Header Menu Function......................................  
  public function getMenuData()
  {
    $data = headerMenu::get();
    return response()->json(['data' => $data]);
  }
  public function insertMenu(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required',
      'link' => 'required',
      'modal' => 'required'
    ]);
    $data = headerMenu::create([
      'menu_name' => $request->name,
      'menu_link' => $request->link, 'link_modal' => $request->modal
    ]);
    return redirect()->route('header.getheader')->with('msg', 'Header Menu is Successfully Added.');
  }
  public function menudelete(Request $request)
  {
    $data = headerMenu::destroy($request->id);
    return $data;
  }
  public  function getMenusingleData(Request $request)
  {
    $data = headerMenu::where('id', $request->id)->first();
    return response()->json($data);
  }
  public function updateMenuData(Request $request)
  {
    $users = headerMenu::where('id', $request->id);
    $users->update(['menu_name' => $request->menu_name, 'menu_link' => $request->menu_link, 'link_modal' => $request->link_modal]);
    return response()->json($users);
  }

  //...............................................Section1..................................................................................
  public function getcontent()
  {
    return view('editContent.section1.content');
  }
  public function insertsection1(Request $request)
  {
    $validated = $request->validate([
      'v_link' => 'required',
      'heading' => 'required',
      'text' => 'required',
      'btn_text' => 'required',
    ]);
    $data = section1::create([
      'heading' => $request->heading,
      'text' => $request->text,
      'button' =>  $request->btn_text,
      'link' => $request->v_link
    ]);
    return redirect()->route('section1.getcontent')->with('msg', 'Section1 Data is Successfully Added.');
  }
  public function getsection1()
  {
    $data = section1::get();
    return response()->json(['data' => $data]);
  }
  public function deletesection1(Request $request)
  {
    $data = section1::destroy($request->id);
    return $data;
  }
  public function section1Changestatus(Request $request)
  {
    $status = section1::where('id', '!=', $request->id)->update(['status' => 'suspend']);
    $status = section1::where('id', '=', $request->id)->update(['status' => 'active']);
    return response()->json($status);
  }
  public function getsingleContent(Request $request)
  {
    $data = section1::where('id', $request->id)->first();
    return response()->json($data);
  }
  public function updatesection1content(Request $request)
  {
    // return $request->all();
    $users = section1::where('id', $request->id)
      ->update([
        'heading' => $request->heading,
        'text' => $request->text, 'button' => $request->button, 'link' => $request->link
      ]);
    return response()->json($users);
  }
  //...............................................Section2..................................................................................
  public function getsection2()
  {
    $data = DB::table('checkaim_section2')->get();
    return response()->json(['data' => $data]);
  }
  public function insertsection2(Request $request)
  {

    $validated = $request->validate([
      'img' => 'required',
      'heading' => 'required',
      'text' => 'required',
      'title' => 'required',
    ]);
    $imageName = $request->file('img');
    $pathName = 'testimg/';
    $image = ImageStore::image($imageName, $pathName);
    $data = DB::table('checkaim_section2')->insert([
      'heading' => $request->heading,
      'text' => $request->text,
      'title' =>  $request->title,
      'logo' => $image
    ]);

    return redirect()->route('section2.section2content')->with('msg', 'Section2 Data is Successfully Added.');
  }
  public function deletesection2(Request $request)
  {
    $data = DB::table('checkaim_section2')->where('id', $request->id)->delete();
    return $data;
  }
  public function section2Changestatus(Request $request)
  {
    $status = DB::table('checkaim_section2')->where('id', '!=', $request->id)->update(['status' => 'suspend']);
    $status = DB::table('checkaim_section2')->where('id', '=', $request->id)->update(['status' => 'active']);
    return response()->json($status);
  }
  public function getsingleContent2(Request $request)
  {
    $data = DB::table('checkaim_section2')->where('id', $request->id)->first();
    return response()->json($data);
  }
  public function updatesection2content(Request $request)
  {
    // return $request->all();
    $pathName = 'testimg/';
    $checkimage = $request->hasFile('file');
    $img = $request->file('file');
    //filter query based on image file exist on not
    $users = DB::table('checkaim_section2')->where('id', $request->id);
    if ($checkimage) {
      $image = ImageStore::image($img, $pathName);
      $users->update(['logo' => $image, 'heading' => $request->heading,
      'text' => $request->text,'title' => $request->title]);
      $msg = 1;
      return response()->json($msg);
    } else {

      $users =DB::table('checkaim_section2')->where('id', $request->id)
        ->update([
          'heading' => $request->heading,
          'text' => $request->text,
          'title' => $request->title
        ]);
      return response()->json($users);
    }

  }
  //....                              Section2 Slider content                         .........

  public function getsection2slider()
  {
    $data =sectio2_slider::get();
    return response()->json(['data' => $data]);
  }
  public function insertsection2slider(Request $request)
  {
    $validated = $request->validate([
      'address' => 'required',
      'heading' => 'required',
      'text' => 'required',
      'url' => 'required',
    ]);
    $data = sectio2_slider::create([
      'heading' => $request->heading,
      'text' => $request->text,
      'address' =>  $request->address,
      'url' => $request->url
    ]);
    return redirect()->route('section2.section2content')->with('msg', 'Section2 Slider Data is Successfully Added.');
  }
  public function getsinglesectionslider(Request $request)
  {
    $data =sectio2_slider::where('id', $request->id)->first();
    return response()->json($data);
  }
  public function updatesection2slider(Request $request)
  {
    // return $request->all();
    $users = sectio2_slider::where('id', $request->id)
      ->update([
        'heading' => $request->heading,
        'text' => $request->text, 'address' => $request->address, 'url' => $request->url
      ]);
    return response()->json($users);
  }
  public function deletesection2slider(Request $request)
  {
    $data = sectio2_slider::destroy($request->id);
    return $data;
  }
  
}
