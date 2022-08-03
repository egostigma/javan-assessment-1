<?php

namespace App\Http\Controllers;

use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $family_members = FamilyMember::where("parent_id", null)->withCount("children")->get();

        return view('pages.index', compact("family_members"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $family_members = FamilyMember::get();

        return view('pages.create', compact("family_members"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->requestValidation($request);

        $family_member = new FamilyMember();
        $family_member->name = request()->name;
        $family_member->gender = request()->gender;
        $family_member->parent_id = request()->parent_id;
        $family_member->save();

        $message = "$family_member->name " . __('successfully created.');

        return redirect()
            ->route('family-member.index')
            ->with('status', 'success')
            ->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FamilyMember  $member
     * @return \Illuminate\Http\Response
     */
    public function show(FamilyMember $member)
    {
        $family_members = FamilyMember::get();

        return view('pages.show', compact("member", "family_members"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FamilyMember  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(FamilyMember $member)
    {
        $family_members = FamilyMember::where("id", "!=", $member->id)->get();

        return view('pages.edit', compact("member", "family_members"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FamilyMember  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FamilyMember $member)
    {
        $this->requestValidation($request);

        $member->name = request()->name;
        $member->gender = request()->gender;
        $member->parent_id = request()->parent_id;
        $member->save();

        $message = "$member->name " . __('successfully updated.');

        return redirect()
            ->route('family-member.index')
            ->with('status', 'success')
            ->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FamilyMember  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(FamilyMember $member)
    {
        foreach ($member->children as $child) {
            $child->parent_id = null;
            $child->save();
        }

        $member->delete();

        $message = "$member->name " . __('successfully deleted.');

        return redirect()
            ->route('family-member.index')
            ->with('status', 'success')
            ->with('message', $message);
    }

    private function requestValidation(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'gender' => 'required|in:m,f',
            'parent_id' => !!$request->parent_id ? 'exists:family_members,id' : '',
        ]);
    }
}
