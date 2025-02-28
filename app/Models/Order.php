<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\rale_offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'day', 'rale_offer_id', 'status'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function rale_offer()
    {
        return $this->belongsTo(rale_offer::class);
    }
}
