<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::latest()->paginate(10);

        return view('type.index', compact('types'));
    }

    public function create()
    {
        return view('type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Type::create([
            'name' => $request->name,
        ]);

        return redirect()->route('type.index');
    }

    public function edit(Type $type)
    {
        return view('type.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $type->update([
            'name' => $request->name,
        ]);

        return redirect()->route('type.index');
    }

    public function destroy(Type $type)
    {
        $type->delete();

        return back();
    }
}
