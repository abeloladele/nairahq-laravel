<?php
namespace App\Http\Controllers;
use App\Models\Vendor; use Illuminate\Http\RedirectResponse; use Illuminate\Http\Request; use Illuminate\View\View;
class VendorController extends Controller {
 public function index(Request $request): View { $items=Vendor::where('business_id',$request->user()->current_business_id)->latest()->paginate(15); return view('vendors.index', compact('items')); }
 public function create(): View { return view('vendors.create'); }
 public function store(Request $request): RedirectResponse { $data=$request->validate(['name'=>'required|string|max:255','email'=>'nullable|email','phone'=>'nullable|string|max:50','address'=>'nullable|string|max:500','city'=>'nullable|string|max:100','state'=>'nullable|string|max:100','country'=>'nullable|string|max:100','notes'=>'nullable|string']); Vendor::create($data + ['business_id'=>$request->user()->current_business_id]); return redirect()->route('vendors.index')->with('status','Saved.'); }
 public function show(Vendor $vendor): View { $this->authorize('view', $vendor); return view('vendors.show', ['item'=>$vendor]); }
 public function edit(Vendor $vendor): View { $this->authorize('update', $vendor); return view('vendors.edit', ['item'=>$vendor]); }
 public function update(Request $request, Vendor $vendor): RedirectResponse { $this->authorize('update', $vendor); $vendor->update($request->validate(['name'=>'required|string|max:255','email'=>'nullable|email','phone'=>'nullable|string|max:50','address'=>'nullable|string|max:500','city'=>'nullable|string|max:100','state'=>'nullable|string|max:100','country'=>'nullable|string|max:100','notes'=>'nullable|string'])); return redirect()->route('vendors.index')->with('status','Updated.'); }
 public function destroy(Vendor $vendor): RedirectResponse { $this->authorize('delete', $vendor); $vendor->delete(); return back()->with('status','Deleted.'); }
}
