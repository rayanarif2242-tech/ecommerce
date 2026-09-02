<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billboard;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BillboardController extends Controller
{
    /**
     * Display all billboards.
     */
    public function index(Request $request)
    {
        $query = Billboard::query();

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('uuid', 'like', "%{$search}%");
            });
        }

        $billboards = $query->latest()->paginate(10);

        return view('admin.billboards.index', compact('billboards'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.billboards.create');
    }

    /**
     * Store billboard.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Billboard::create([
            'uuid' => (string) Str::uuid(),
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('admin.billboards.index')
            ->with('success', 'Billboard created successfully.');
    }

    /**
     * Display billboard.
     */
    public function show(Billboard $billboard)
    {
        return view('admin.billboards.show', compact('billboard'));
    }

    /**
     * Show edit form.
     */
    public function edit(Billboard $billboard)
    {
        return view('admin.billboards.edit', compact('billboard'));
    }

    /**
     * Update billboard.
     */
    public function update(Request $request, Billboard $billboard)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $billboard->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()
            ->route('admin.billboards.index')
            ->with('success', 'Billboard updated successfully.');
    }

    /**
     * Delete billboard.
     */
    public function destroy(Billboard $billboard)
    {
        $billboard->delete();

        return redirect()
            ->route('admin.billboards.index')
            ->with('success', 'Billboard deleted successfully.');
    }
}