<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'street',
        'city',
        'state',
        'zip_code',
        'country',
        'is_billing',
        'is_shipping',
    ];

    protected $casts = [
        'is_billing' => 'boolean',
        'is_shipping' => 'boolean',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
