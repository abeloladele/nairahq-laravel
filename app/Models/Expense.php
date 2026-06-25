<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Expense extends Model { use HasFactory; protected $fillable=['business_id','vendor_id','bank_account_id','expense_date','category','description','amount','tax_amount','status']; protected function casts(): array { return ['expense_date'=>'date','amount'=>'decimal:2','tax_amount'=>'decimal:2']; } public function business(): BelongsTo { return $this->belongsTo(Business::class); } public function vendor(): BelongsTo { return $this->belongsTo(Vendor::class); } public function bankAccount(): BelongsTo { return $this->belongsTo(BankAccount::class); } }
