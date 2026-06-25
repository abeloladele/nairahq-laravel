<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\Relations\BelongsTo;
class BankAccount extends Model { use HasFactory; protected $fillable=['business_id','name','bank_name','account_number','currency','opening_balance','current_balance']; protected function casts(): array { return ['opening_balance'=>'decimal:2','current_balance'=>'decimal:2']; } public function business(): BelongsTo { return $this->belongsTo(Business::class); } }
