<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Costumer extends Model
{
    use HasFactory; //use SoftDeletes;
    protected $fillable = [
      'name', 'phone', 'address', 'description', 'debt', 'trust_status',
    ];
    public function debts()
    {
        return $this->hasMany(Debt::class,'costumer_id','id')->orderBy('created_at','desc');
    }
    public function payments()
    {
        return $this->hasMany(Payment::class)->orderBy('created_at','desc');
    }
    public function DebtAll()
    {
        return $this->belongsTo(Debt::class);
    }
//    public function user()
//    {
//        return $this->belongsTo(User::class,'user_id','id');
//    }
}
