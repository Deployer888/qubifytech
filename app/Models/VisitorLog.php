<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class VisitorLog extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'visitor_id',
        'visitor_detail_id',
        'confidence',
        'ip_address',
        'authorised_by',
        'purpose',
        'reference',
        'checkin',
        'checkout',
    ];
    
    public function visitor(){
        return $this->belongsTo(Visitor::class);
    }
    
    public function detail()
    {
        return $this->hasOne(VisitorDetail::class, 'id', 'visitor_detail_id');
    }

    public function visitorDetail()
    {
        return $this->hasOne(VisitorDetail::class, 'id', 'visitor_detail_id')
                    ->where('visit_date', Carbon::today()->toDateString());
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'authorised_by', 'id');
    }
    
}
