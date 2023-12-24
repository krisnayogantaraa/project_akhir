<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return response()
     */
    public function index(): View
    {
        $incomeCategorie = Categorie::where('type', 'income')->get()->toArray();
        $expenseCategorie = Categorie::where('type', 'expense')->get()->toArray();
        
        return view('main.profile', compact('incomeCategorie', 'expenseCategorie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $input = $request->all();

        Categorie::create($input);

        return redirect()->route('finances.index')
            ->with('success', 'Data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $Categorie): View
    {
        return view('categories.show', compact('Categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $Categorie): View
    {
        return view('categories.edit', compact('Categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $Categorie): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $input = $request->all();

        $Categorie->update($input);

        return redirect()->route('categories.index')
            ->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $Categorie): RedirectResponse
    {
        $Categorie->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Data deleted successfully');
    }
}
