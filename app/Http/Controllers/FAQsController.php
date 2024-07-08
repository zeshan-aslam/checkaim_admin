<?php

namespace App\Http\Controllers;

use App\Models\FAQs;
use Illuminate\Http\Request;

class FAQsController extends Controller
{
    public function index()
    {

        return view('Terms&Conditions.FAQs.index');
    }

    public function create()
    {
        return view('Terms&Conditions.FAQs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
        ]); 
        $insert=FAQs::create([
           'heading'=> $request->heading,
           'text' => $request->text,
        ]);
        return redirect('/FAQs')->with('message','Successfully data Stored');

    }

    public function show()
    {
        $shows = FAQs::all();
        return view('Terms&Conditions.FAQs.index', compact('shows'));
    }

    public function edit($id)
    {
        $policy_edit = FAQs::find($id);
        return view('Terms&Conditions.FAQs.edit', compact('policy_edit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
             'heading' => 'required',
         ]);
        $policy = FAQs::find($id);
        $policy->heading = $request->input('heading');
        $policy->text = $request->input('text');
        $policy->update();

        return redirect('/FAQs')
            ->with('message', 'Data updated successfully.');
    }

    public function destroy($id)
    {
        $policy = FAQs::find($id);
        $policy->delete();

        return redirect()->back()
            ->with('message', 'Data deleted successfully.');
    }
}
