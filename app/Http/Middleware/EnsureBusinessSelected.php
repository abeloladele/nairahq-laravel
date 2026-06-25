<?php
namespace App\Http\Middleware;
use Closure; use Illuminate\Http\Request; use Symfony\Component\HttpFoundation\Response;
class EnsureBusinessSelected { public function handle(Request $request, Closure $next): Response { if (! $request->user()?->current_business_id) { return redirect()->route('businesses.create')->with('status','Create your first business to continue.'); } return $next($request); } }
