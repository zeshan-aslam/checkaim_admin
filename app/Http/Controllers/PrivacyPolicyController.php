<?php
// app/Http/Controllers/PrivacyPolicyController.php

namespace App\Http\Controllers;

use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        // $policies = PrivacyPolicy::latest()->paginate(10);
        return view('Terms&Conditions.PrivacyPolicy.index');
    }

    public function create()
    {
        return view('Terms&Conditions.PrivacyPolicy.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
        ]);
        $insert=PrivacyPolicy::create([
           'heading'=> $request->heading,
           'text' => $request->text,
        ]);
        return redirect('/PrivacyPolicy')->with('message','Successfully data Stored');

        // return redirect()->route('PrivacyPolicy.index')
        //     ->with('success', 'Privacy Policy created successfully.');
    }

    public function show()
    {
        $shows = PrivacyPolicy::all();
        return view('Terms&Conditions.PrivacyPolicy.index', compact('shows'));
    }

    public function edit($id)
    {
        $policy_edit = PrivacyPolicy::find($id);
        return view('Terms&Conditions.PrivacyPolicy.edit', compact('policy_edit'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'content' => 'required',
        // ]);
        $policy = PrivacyPolicy::find($id);
        $policy->heading = $request->input('heading');
        $policy->text = $request->input('text');
        $policy->update();
// dd($policy);
        return redirect('/PrivacyPolicy')
            ->with('success', 'Privacy Policy updated successfully.');
    }

    public function destroy($id)
    {
        $policy = PrivacyPolicy::find($id);
        $policy->delete();

        return redirect()->back()
            ->with('success', 'Privacy Policy deleted successfully.');
    }
}
