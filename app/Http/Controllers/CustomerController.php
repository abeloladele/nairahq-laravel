<?php
namespace App\Http\Controllers;
use App\Models\Customer; use Illuminate\Http\RedirectResponse; use Illuminate\Http\Request; use Illuminate\View\View;
class CustomerController extends Controller {
 public function index(Request $request): View { $items=Customer::where('business_id',$request->user()->current_business_id)->latest()->paginate(15); return view('customers.index', compact('items')); }
 public function create(): View { return view('customers.create'); }
 public function store(Request $request): RedirectResponse { $data=$request->validate(['name'=>'required|string|max:255','email'=>'nullable|email','phone'=>'nullable|string|max:50','address'=>'nullable|string|max:500','city'=>'nullable|string|max:100','state'=>'nullable|string|max:100','country'=>'nullable|string|max:100','notes'=>'nullable|string']); Customer::create($data + ['business_id'=>$request->user()->current_business_id]); return redirect()->route('customers.index')->with('status','Saved.'); }
 public function show(Customer $customer): View { $this->authorize('view', $customer); return view('customers.show', ['item'=>$customer]); }
 public function edit(Customer $customer): View { $this->authorize('update', $customer); return view('customers.edit', ['item'=>$customer]); }
 public function update(Request $request, Customer $customer): RedirectResponse { $this->authorize('update', $customer); $customer->update($request->validate(['name'=>'required|string|max:255','email'=>'nullable|email','phone'=>'nullable|string|max:50','address'=>'nullable|string|max:500','city'=>'nullable|string|max:100','state'=>'nullable|string|max:100','country'=>'nullable|string|max:100','notes'=>'nullable|string'])); return redirect()->route('customers.index')->with('status','Updated.'); }
 public function destroy(Customer $customer): RedirectResponse { $this->authorize('delete', $customer); $customer->delete(); return back()->with('status','Deleted.'); }
}
