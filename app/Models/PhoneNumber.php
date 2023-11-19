<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhoneNumber extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'phone_number'];


    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
