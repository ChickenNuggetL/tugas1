<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::latest()->paginate(9);
        return view('promotions.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('promotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->storeAs('public/promotions', $imageName);

        Promotion::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'promotions/' . $imageName,
        ]);

        return redirect()->route('promotions.index')
            ->with('success', 'Promotion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        return view('promotions.show', compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        return view('promotions.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($promotion->image) {
                Storage::delete('public/' . $promotion->image);
            }
            
            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->storeAs('public/promotions', $imageName);
            $data['image'] = 'promotions/' . $imageName;
        }

        $promotion->update($data);

        return redirect()->route('promotions.index')
            ->with('success', 'Promotion updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        // Delete image
        if ($promotion->image) {
            Storage::delete('public/' . $promotion->image);
        }
        
        $promotion->delete();

        return redirect()->route('promotions.index')
            ->with('success', 'Promotion deleted successfully.');
    }
}