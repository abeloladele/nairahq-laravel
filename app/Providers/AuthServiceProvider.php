<?php
namespace App\Providers;
use App\Models\{BankAccount,Business,Customer,Expense,Invoice,Product,Vendor};
use App\Policies\BusinessOwnedPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
class AuthServiceProvider extends ServiceProvider {
    protected $policies = [Business::class=>BusinessOwnedPolicy::class, Customer::class=>BusinessOwnedPolicy::class, Vendor::class=>BusinessOwnedPolicy::class, Product::class=>BusinessOwnedPolicy::class, BankAccount::class=>BusinessOwnedPolicy::class, Expense::class=>BusinessOwnedPolicy::class, Invoice::class=>BusinessOwnedPolicy::class];
}
