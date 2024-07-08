<?php

namespace App\Http\Controllers;

use App\Models\TermsConditions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TermsConditionsController extends Controller
{
    public function index()
    {
        // $policies = PrivacyPolicy::latest()->paginate(10);
        return view('Terms&Conditions.TermsConditions.index');
    }

    public function create()
    {
        return view('Terms&Conditions.TermsConditions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required',
        ]);
        $insert=TermsConditions::create([
           'heading'=> $request->heading,
           'text' => $request->text,
        ]);
        return redirect('/TermsConditions')->with('message','Successfully data Stored');

        // return redirect()->route('PrivacyPolicy.index')
        //     ->with('success', 'Privacy Policy created successfully.');
    }

    public function show()
    {
        $shows = TermsConditions::all();
        return view('Terms&Conditions.TermsConditions.index', compact('shows'));
    }

    public function edit($id)
    {
        $policy_edit = TermsConditions::find($id);
        return view('Terms&Conditions.TermsConditions.edit', compact('policy_edit'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'content' => 'required',
        // ]);
        $policy = TermsConditions::find($id);
        $policy->heading = $request->input('heading');
        $policy->text = $request->input('text');
        $policy->update();
// dd($policy);
        return redirect('/TermsConditions')
            ->with('success', 'Privacy Policy updated successfully.');
    }

    public function destroy($id)
    {
        $policy = TermsConditions::find($id);
        $policy->delete();

        return redirect()->back()
            ->with('success', 'Privacy Policy deleted successfully.');
    }
}
