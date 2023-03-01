<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BucketInBall extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function bucket()
    {
        return $this->belongsTo(Buckets::class);
    }

    public function ball_size()
    {
        return $this->belongsTo(BallSize::class,'ball_size_id','id');
    }
}
