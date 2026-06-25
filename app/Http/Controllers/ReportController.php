<?php
namespace App\Http\Controllers;
use App\Models\{Expense,Invoice}; use Illuminate\Http\Request; use Illuminate\View\View;
class ReportController extends Controller { public function profitLoss(Request $request): View { $businessId=$request->user()->current_business_id; $income=(float)Invoice::where('business_id',$businessId)->sum('amount_paid'); $expenses=(float)Expense::where('business_id',$businessId)->sum('amount'); return view('reports.profit-loss', ['income'=>$income,'expenses'=>$expenses,'profit'=>$income-$expenses]); } }
