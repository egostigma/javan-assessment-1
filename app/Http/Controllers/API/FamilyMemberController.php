<?php

namespace App\Http\Controllers\API;

use App\Models\FamilyMember;
use Illuminate\Http\Request;

class FamilyMemberController extends APIController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $func = function () {
            $family_members = FamilyMember::with("offsprings")
                ->when(request("query"), function ($query) {
                    $query->where("name", "like", "%" . request("query") . "%");
                })
                ->when(request("gender"), function ($query) {
                    $query->where("gender", request("gender"));
                })
                ->where("parent_id", null)
                ->paginate(request("perPage") ?? 10);

            $this->data = $family_members;
        };

        return $this->callFunction($func);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $func = function () {
            $this->requestValidation();

            $family_member = new FamilyMember();
            $family_member->name = request()->name;
            $family_member->gender = request()->gender;
            $family_member->parent_id = request()->parent_id;
            $family_member->save();

            $message = "$family_member->name " . __('successfully created.');

            array_push($this->messages, $message);

            $this->data = $family_member;
        };

        return $this->callFunction($func);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $func = function () use ($id) {
            $member = FamilyMember::findOrFail($id);
            $this->data = $member;
        };

        return $this->callFunction($func);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function parentSiblings($id)
    {
        $func = function () use ($id) {
            $member = FamilyMember::where("parent_id", "!=", null)->findOrFail($id);
            $parent = FamilyMember::findOrFail($member->parent_id);
            $parent_siblings = FamilyMember::where("parent_id", $parent->parent_id)
                ->where("id", "!=", $parent->id)
                ->when(request("query"), function ($query) {
                    $query->where("name", "like", "%" . request("query") . "%");
                })
                ->when(request("gender"), function ($query) {
                    $query->where("gender", request("gender"));
                })
                ->paginate(request("perPage") ?? 10);

            $this->data = $parent_siblings;
        };

        return $this->callFunction($func);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function cousins($id)
    {
        $func = function () use ($id) {
            $member = FamilyMember::where("parent_id", "!=", null)->findOrFail($id);
            $parent = FamilyMember::findOrFail($member->parent_id);
            $parent_siblings = FamilyMember::where("parent_id", $parent->parent_id)
                ->where("id", "!=", $parent->id)
                ->get();

            $cousins = FamilyMember::whereIn("parent_id", $parent_siblings->pluck("id"))
                ->when(request("query"), function ($query) {
                    $query->where("name", "like", "%" . request("query") . "%");
                })
                ->when(request("gender"), function ($query) {
                    $query->where("gender", request("gender"));
                })
                ->paginate(request("perPage") ?? 10);

            $this->data = $cousins;
        };

        return $this->callFunction($func);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function children($id)
    {
        $func = function () use ($id) {
            $member = FamilyMember::findOrFail($id);
            $children = FamilyMember::where("parent_id", $member->id)
                ->when(request("query"), function ($query) {
                    $query->where("name", "like", "%" . request("query") . "%");
                })
                ->when(request("gender"), function ($query) {
                    $query->where("gender", request("gender"));
                })
                ->paginate(request("perPage") ?? 10);

            $this->data = $children;
        };

        return $this->callFunction($func);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function grandChildren($id)
    {
        $func = function () use ($id) {
            $member = FamilyMember::findOrFail($id);
            $grand_children = FamilyMember::whereIn("parent_id", $member->children->pluck("id"))
                ->when(request("query"), function ($query) {
                    $query->where("name", "like", "%" . request("query") . "%");
                })
                ->when(request("gender"), function ($query) {
                    $query->where("gender", request("gender"));
                })
                ->paginate(request("perPage") ?? 10);

            $this->data = $grand_children;
        };

        return $this->callFunction($func);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $func = function () use ($id) {
            $this->requestValidation();

            $member = FamilyMember::findOrFail($id);
            $member->name = request()->name;
            $member->gender = request()->gender;
            $member->parent_id = request()->parent_id;
            $member->save();

            $message = "$member->name " . __('successfully updated.');

            array_push($this->messages, $message);

            $this->data = $member;
        };

        return $this->callFunction($func);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $func = function () use ($id) {
            $member = FamilyMember::findOrFail($id);
            $member->delete();

            $message = "$member->name " . __('successfully deleted.');

            array_push($this->messages, $message);

            $this->data = $member;
        };

        return $this->callFunction($func);
    }

    private function requestValidation() {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'gender' => 'required|in:m,f',
            'parent_id' => !!request()->parent_id ? 'exists:family_members,id' : '',
        ]);
    }
}
