<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // Public portfolio page
    public function publicIndex()
    {
        $portfolioItems = PortfolioItem::all();
        return view('portfolio.index', compact('portfolioItems'));
    }

    // Admin dashboard
    public function index()
    {
        $portfolioItems = PortfolioItem::all();
        return view('admin.dashboard', compact('portfolioItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:255', // Ensure category is validated
        ]);

        $imagePath = $request->file('image')->store('portfolio', 'public');

        PortfolioItem::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $imagePath,
            'category' => $validated['category'], // Include category in the insert
        ]);

        return redirect()->route('portfolio.index')->with('success', 'Portfolio item added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = PortfolioItem::findOrFail($id);
        return view('portfolio.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $item = PortfolioItem::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolio', 'public');
            $item->image = $imagePath;
        }

        $item->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('portfolio.index')->with('success', 'Portfolio item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = PortfolioItem::findOrFail($id);
        $item->delete();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio item deleted successfully!');
    }
}
