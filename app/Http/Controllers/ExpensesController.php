<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// class ExpensesController extends Controller
// {
//     public function index()
//     {
//         // $expenses = DB::table('expenses')->get();
//         $expenses = Expense::all();
//         // dd($expenses);
//         return view('expenses', compact('expenses'));
//     }

//     public function create()
//     {

//         $expenses = Expense::all();
//         return view('create_expenses', compact('expenses'));
//     }
//     public function store(Request $request)
//     {
//         $expense = new Expense();
//         $expense->Item = $request->Item;
//         $expense->ItemCategory = $request->ItemCategory;
//         $expense->PurchaseDate = $request->PurchaseDate;
//         $expense->Amount = $request->Amount;
//         $expense->created_at = now();
//         $expense->updated_at = now();
//         $expense->save();
//         return view('create_expenses');
//     }

//     public function delete($id)
//     {
//         $expense = Expense::where('id', '=', $id);
//         $expense->delete();


//         return redirect()->back();
//     }

//     public function edit(string $id)
//     {
//         $expenses = Expense::findOrFail($id);
//         return view('edit', compact('expenses'));
//     }
// }

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::all();
        return view('front.expenses', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $expenses = Expense::all();
        return view('front.create_expenses', compact('expenses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $expense = new Expense;
        $expense->item = $request->item;
        $expense->itemCategory = $request->itemCategory;
        $expense->amount = $request->amount;


        $expense->purchaseDate = $request->expense_date;
        $expense->created_at = now();
        $expense->updated_at = now();
        $expense->save();
        return redirect()->back()->with('status', 'Expense Created Successfully');
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
    public function edit(string $id)
    {
        // Retrieve the expense with the specified ID
        $expenses = Expense::findOrFail($id);

        // Retrieve distinct item categories from the expenses table
        $categories = Expense::distinct()->pluck('itemCategory');

        return view('front.edit_expenses', compact('expenses', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Expense::where('id', $id)->update([
            'item' => $request->item,
            'itemCategory' => $request->itemCategory,
            'amount' => $request->amount,


            'purchaseDate' => $request->expense_date,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('expenses')->with('info', 'Expense Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense = Expense::where('id', $id);
        $expense->delete();
        return redirect()->back()->with('msg', 'Expense deleted Successfully');
    }
}
