<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\Categorie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return response()
     */


    public function index(Request $request): View
    {
        $year = $request->input('year');

        $finances = Finance::latest();

        if ($year) {
            $finances->whereYear('date', $year);
        } else {
            $year = Carbon::now()->year;
            $finances->whereYear('date', $year);
        }

        $finances = $finances->paginate(5);
        $categories = Categorie::latest()->paginate(5);

        // Hitung total pendapatan untuk setiap tahun
        $totalIncomeByYear = Finance::where('type', 'income')
            ->when($year, function ($query, $year) {
                return $query->whereYear('date', $year);
            })
            ->sum('amount');

        // Hitung total pengeluaran untuk setiap tahun
        $totalExpenseByYear = Finance::where('type', '!=', 'income')
            ->when($year, function ($query, $year) {
                return $query->whereYear('date', $year);
            })
            ->sum(DB::raw('CASE WHEN type != "income" THEN -1 * amount ELSE amount END'));

        // Gabungkan hasilnya
        $combinedTotals = collect([
            ['year' => $year, 'total' => $totalIncomeByYear],
            ['year' => $year, 'total' => $totalExpenseByYear]
        ]);

        // Urutkan berdasarkan tahun
        $combinedTotals = $combinedTotals->sortBy('year');

        // Hitung total gabungan
        $totalCombined = $combinedTotals->sum('total');

        // Periksa apakah total gabungan negatif
        $isNegative = $totalCombined < 0;

        // Ambil nilai mutlak dari total gabungan
        $totalCombined = abs($totalCombined);

        $monthlyIncome = Finance::selectRaw('MONTH(date) as month, SUM(amount) as total')
            ->where('type', 'income')
            ->when($year, function ($query, $year) {
                return $query->whereYear('date', $year);
            })
            ->groupBy('month')
            ->get();

        $monthlyExpense = Finance::selectRaw('MONTH(date) as month, SUM(amount) as total')
            ->where('type', '!=', 'income')
            ->when($year, function ($query, $year) {
                return $query->whereYear('date', $year);
            })
            ->groupBy('month')
            ->get();

        $months = ["January", "February", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        return view('main.index', compact('finances', 'categories', 'totalCombined', 'isNegative', 'monthlyIncome', 'monthlyExpense', 'months', 'year'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return response()
     */
    public function transaction(Request $request): View
    {

        $type = $request->input('type');
        $start = $request->input('start');
        $end = $request->input('end');
        $category = $request->input('category');

        $finances = Finance::query();

        if ($type) {
            $finances->where('type', $type);
        }

        if ($start) {
            $finances->where('date', '>=', $start);
        }

        if ($end) {
            $finances->where('date', '<=', $end);
        }

        if ($category) {
            $finances->where('category', $category);
        }

        $finances = $finances->orderBy('date', 'desc')->paginate(5);

        $incomeCategories = Categorie::where('type', 'income')->get();

        $expenseCategories = Categorie::where('type', 'expense')->get();


        $totalIncome = Finance::where('type', 'income')->sum('amount');

        $totalNonIncome = Finance::where('type', '!=', 'income')
            ->sum(DB::raw('CASE WHEN type != "income" THEN -1 * amount ELSE amount END'));

        $totalCombined = $totalIncome + $totalNonIncome;

        $isNegative = $totalCombined < 0;

        $totalCombined = abs($totalCombined);

        return view('main.transaction', compact('finances', 'incomeCategories','expenseCategories', 'totalIncome', 'totalNonIncome', 'totalCombined', 'isNegative', 'start', 'end', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('modal.modal_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'date' => 'required',
            'name' => 'required',
            'type' => 'required',
            'amount' => 'required',
            'detail' => 'required',
            'category' => 'required',
            'detail' => 'required',
        ]);

        $input = $request->all();

        Finance::create($input);

        return redirect()->route('trans')
            ->with('success', 'Data created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Finance $finance): View
    {
        return view('finances.show', compact('finance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Finance $finance): View
    {
        return view('finances.edit', compact('finance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Finance $Finance): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'amount' => 'required',
            'detail' => 'required',
            'category' => 'required',
            'detail' => 'required',
            'date' => 'required',
        ]);

        $input = $request->all();


        $Finance->update($input);

        return redirect()->route('trans')
            ->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Finance $Finance): RedirectResponse
    {
        $Finance->delete();

        return redirect()->route('trans')
            ->with('success', 'Data deleted successfully');
    }
}
