<?php
namespace App\Http\Controllers;
use App\Models\BankAccount; use Illuminate\Http\RedirectResponse; use Illuminate\Http\Request; use Illuminate\View\View;
class BankAccountController extends Controller {
 public function index(Request $request): View { $items=BankAccount::where('business_id',$request->user()->current_business_id)->latest()->paginate(15); return view('bank-accounts.index', compact('items')); }
 public function create(): View { return view('bank-accounts.create'); }
 public function store(Request $request): RedirectResponse { $data=$request->validate(['name'=>'required|string|max:255','bank_name'=>'nullable|string|max:255','account_number'=>'nullable|string|max:100','currency'=>'required|string|size:3','opening_balance'=>'required|numeric','current_balance'=>'required|numeric']); BankAccount::create($data + ['business_id'=>$request->user()->current_business_id]); return redirect()->route('bank-accounts.index')->with('status','Saved.'); }
 public function show(BankAccount $bankaccount): View { $this->authorize('view', $bankaccount); return view('bank-accounts.show', ['item'=>$bankaccount]); }
 public function edit(BankAccount $bankaccount): View { $this->authorize('update', $bankaccount); return view('bank-accounts.edit', ['item'=>$bankaccount]); }
 public function update(Request $request, BankAccount $bankaccount): RedirectResponse { $this->authorize('update', $bankaccount); $bankaccount->update($request->validate(['name'=>'required|string|max:255','bank_name'=>'nullable|string|max:255','account_number'=>'nullable|string|max:100','currency'=>'required|string|size:3','opening_balance'=>'required|numeric','current_balance'=>'required|numeric'])); return redirect()->route('bank-accounts.index')->with('status','Updated.'); }
 public function destroy(BankAccount $bankaccount): RedirectResponse { $this->authorize('delete', $bankaccount); $bankaccount->delete(); return back()->with('status','Deleted.'); }
}
