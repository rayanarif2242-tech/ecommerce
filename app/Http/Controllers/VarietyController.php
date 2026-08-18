<?php

namespace App\Http\Controllers;

use App\Models\Variety;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VarietyController extends Controller
{
    public function index()
    {
        $varieties = Variety::latest()->get();
        return view('admin.variety.index', compact('varieties'));
    }

    public function create()
    {
        return view('admin.variety.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:varieties',
            'description'=>'nullable'
        ]);

        Variety::create([
            'variety_id'=>Str::uuid(),
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status ?? 1,
        ]);

        return redirect()->route('variety.index')
            ->with('success','Variety Added Successfully');
    }

    public function edit(Variety $variety)
    {
        return view('admin.variety.edit',compact('variety'));
    }

    public function update(Request $request, Variety $variety)
    {
        $request->validate([
            'name'=>'required|unique:varieties,name,'.$variety->id,
        ]);

        $variety->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
        ]);

        return redirect()->route('variety.index')
            ->with('success','Variety Updated Successfully');
    }

    public function destroy(Variety $variety)
    {
        $variety->delete();

        return redirect()->route('variety.index')
            ->with('success','Variety Deleted Successfully');
    }
}