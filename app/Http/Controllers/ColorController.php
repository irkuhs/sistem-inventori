<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::paginate(10);

        return view('color.index', compact('colors'));
    }

    public function create()
    {
        return view('color.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Color::create([
            'name' => $request->name,
        ]);

        return redirect()->route('color.index');
    }

    public function edit(Color $color)
    {
        return view('color.edit', compact('color'));
    }

    public function update(Request $request, Color $color)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $color->update([
            'name' => $request->name,
        ]);

        return redirect()->route('color.index');
    }

    public function destroy(Color $color)
    {
        $color->delete();

        return back();
    }
}
