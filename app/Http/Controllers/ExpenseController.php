<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    public function index()
    {
        // $expenses = DB::table('expenses')->get();
        $expenses = Expense::all();
        // dd($expenses);
        return view('expenses', compact('expenses'));
    }

    public function create(Request $request)
    {

        $expense = new Expense();
        $expense->Item = $request->Item;
        $expense->ItemCategory = $request->ItemCategory;
        $expense->PurchaseDate = $request->PurchaseDate;
        $expense->Amount = $request->Amount;
        $expense->created_at = now();
        $expense->updated_at = now();
        $expense->save();
        return view('create_expenses');
    }

    public function delete($id)
    {
        $expense = Expense::where('id', '=', $id);
        $expense->delete();


        return redirect()->back();
    }

    public function edit(string $id)
    {
        $expenses = Expense::findOrFail($id);
        return view('edit', compact('expenses'));
    }
}
