<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Vendor extends Model { use HasFactory; protected $fillable=['business_id','name','email','phone','address','city','state','country','notes']; public function business(): BelongsTo { return $this->belongsTo(Business::class); } }
