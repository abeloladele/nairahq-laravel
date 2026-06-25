<?php
namespace App\Http\Controllers;
use App\Models\Product; use Illuminate\Http\RedirectResponse; use Illuminate\Http\Request; use Illuminate\View\View;
class ProductController extends Controller {
 public function index(Request $request): View { $items=Product::where('business_id',$request->user()->current_business_id)->latest()->paginate(15); return view('products.index', compact('items')); }
 public function create(): View { return view('products.create'); }
 public function store(Request $request): RedirectResponse { $data=$request->validate(['name'=>'required|string|max:255','description'=>'nullable|string','type'=>'required|in:product,service','unit_price'=>'required|numeric|min:0','taxable'=>'boolean','active'=>'boolean']); Product::create($data + ['business_id'=>$request->user()->current_business_id]); return redirect()->route('products.index')->with('status','Saved.'); }
 public function show(Product $product): View { $this->authorize('view', $product); return view('products.show', ['item'=>$product]); }
 public function edit(Product $product): View { $this->authorize('update', $product); return view('products.edit', ['item'=>$product]); }
 public function update(Request $request, Product $product): RedirectResponse { $this->authorize('update', $product); $product->update($request->validate(['name'=>'required|string|max:255','description'=>'nullable|string','type'=>'required|in:product,service','unit_price'=>'required|numeric|min:0','taxable'=>'boolean','active'=>'boolean'])); return redirect()->route('products.index')->with('status','Updated.'); }
 public function destroy(Product $product): RedirectResponse { $this->authorize('delete', $product); $product->delete(); return back()->with('status','Deleted.'); }
}
