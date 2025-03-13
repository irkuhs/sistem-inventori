<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Item;

class ItemController extends Controller
{
    public function create()
    {
        $types = Type::all();
        $colors = Color::all();

        return view('item.create', compact('types', 'colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'color' => 'required',
            'quantity' => 'required|integer',
        ]);

        Item::create([
            'name' => $request->name,
            'type_id' => $request->type,
            'color_id' => $request->color,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('home');
    }

    public function edit(Item $item)
    {
        $types = Type::all();
        $colors = Color::all();

        return view('item.edit', compact('item', 'types', 'colors'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'color' => 'required',
            'quantity' => 'required|integer',
        ]);

        $item->update([
            'name' => $request->name,
            'type_id' => $request->type,
            'color_id' => $request->color,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('home');
    }

    public function show(Item $item)
    {
        return view('item.show', compact('item'));
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()->route('home');
    }
}
