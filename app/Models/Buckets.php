<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buckets extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function bucketinball()
    {
        return $this->hasMany(BucketInBall::class,'bucket_id','id');
    }
}
