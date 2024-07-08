<?php
// app/Http/Controllers/PrivacyPolicyController.php

namespace App\Http\Controllers;

use App\Models\GDPRLegislation;
use Illuminate\Http\Request;

class GDPRLegislationController extends Controller
{
    public function index()
    {
        // $policies = PrivacyPolicy::latest()->paginate(10);
        return view('Terms&Conditions.GDPRLegislation.index');
    }

    public function create()
    {
        return view('Terms&Conditions.GDPRLegislation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        $insert=GDPRLegislation::create([
           'title'=> $request->title,
           'text' => $request->text,
        ]);
        return redirect('/GDPRLegislation')->with('message','Successfully data Stored');
    }

    public function show()
    {
        $shows = GDPRLegislation::all();
        return view('Terms&Conditions.GDPRLegislation.index', compact('shows'));
    }

    public function edit($id)
    {
        $policy_edit = GDPRLegislation::find($id);
        return view('Terms&Conditions.GDPRLegislation.edit', compact('policy_edit'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'content' => 'required',
        // ]);
        $policy = GDPRLegislation::find($id);
        $policy->title = $request->input('title');
        $policy->text = $request->input('text');
        $policy->update();
// dd($policy);
        return redirect('/GDPRLegislation')
            ->with('success', 'Privacy Policy updated successfully.');
    }

    public function destroy($id)
    {
        $policy = GDPRLegislation::find($id);
        $policy->delete();

        return redirect()->back()
            ->with('success', 'Privacy Policy deleted successfully.');
    }
}
