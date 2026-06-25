<?php
namespace App\Http\Controllers;
use App\Models\Expense; use Illuminate\Http\RedirectResponse; use Illuminate\Http\Request; use Illuminate\View\View;
class ExpenseController extends Controller {
 public function index(Request $request): View { $items=Expense::where('business_id',$request->user()->current_business_id)->latest()->paginate(15); return view('expenses.index', compact('items')); }
 public function create(): View { return view('expenses.create'); }
 public function store(Request $request): RedirectResponse { $data=$request->validate(['vendor_id'=>'nullable|exists:vendors,id','bank_account_id'=>'nullable|exists:bank_accounts,id','expense_date'=>'required|date','category'=>'required|string|max:100','description'=>'required|string|max:500','amount'=>'required|numeric|min:0','tax_amount'=>'nullable|numeric|min:0','status'=>'required|in:draft,paid']); Expense::create($data + ['business_id'=>$request->user()->current_business_id]); return redirect()->route('expenses.index')->with('status','Saved.'); }
 public function show(Expense $expense): View { $this->authorize('view', $expense); return view('expenses.show', ['item'=>$expense]); }
 public function edit(Expense $expense): View { $this->authorize('update', $expense); return view('expenses.edit', ['item'=>$expense]); }
 public function update(Request $request, Expense $expense): RedirectResponse { $this->authorize('update', $expense); $expense->update($request->validate(['vendor_id'=>'nullable|exists:vendors,id','bank_account_id'=>'nullable|exists:bank_accounts,id','expense_date'=>'required|date','category'=>'required|string|max:100','description'=>'required|string|max:500','amount'=>'required|numeric|min:0','tax_amount'=>'nullable|numeric|min:0','status'=>'required|in:draft,paid'])); return redirect()->route('expenses.index')->with('status','Updated.'); }
 public function destroy(Expense $expense): RedirectResponse { $this->authorize('delete', $expense); $expense->delete(); return back()->with('status','Deleted.'); }
}
