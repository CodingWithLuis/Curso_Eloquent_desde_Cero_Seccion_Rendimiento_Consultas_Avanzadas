<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['total_sale', 'sale_date', 'employee_id'];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
