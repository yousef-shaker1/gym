<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'message'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
