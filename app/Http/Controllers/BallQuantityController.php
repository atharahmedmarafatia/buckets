<?php

namespace App\Http\Controllers;

use App\Models\BallSize;
use App\Models\BucketInBall;
use App\Models\Buckets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BallQuantityController extends Controller
{
    public function index()
    {
        $Buckets = Buckets::with(['bucketinball' => function($q) {
            $q->with('ball_size');
        }])->get();
        foreach($Buckets as $key => $Bucket)
        {
            
            $ball_name = [];
            $ball_count = [];
            $ball_size = [];
            foreach($Bucket->bucketinball as $bucketinball)
            {
                $ball_count[] = $bucketinball->inbucketball;
                $ball_name[] = $bucketinball->ball_size->ball_name;
                $ball_size[] = $bucketinball->ball_size->ball_size;
            }
            $Bucket->sum_inbucketball = $Bucket->bucketinball->sum('inbucketball');
            $Bucket->ball_names = $ball_name;
            $Bucket->ball_counts = $ball_count;
            $Bucket->ball_size = $ball_size;
        }
        return view('dashboard',compact('Buckets'));
    }


    public function create()
    {
        
        $balls = BallSize::select('id','ball_name')->get();
        return view('Quantity.create',compact('balls'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ball_name' => 'required',
            'ball_count' => 'required',
        ]);
        $ball_name = $request['ball_name'];
        $ball_count = $request['ball_count'];

        
        foreach($request['ball_name'] as $keys => $value)
        {
            $balls = BallSize::updateOrCreate([
                'id' => $keys + 1 ],
                ['ball_name' => $value,
                'ball_count' => $request['ball_count'][$keys]
            ]);
        }

        $buckets = Buckets::get();
        foreach($buckets as $key => $bucket)
        {
            $balls = BallSize::where('id',$key+1)->first();
            $ball_size1 = $balls['ball_size']; //.8
            $ball_count1 = $balls['ball_count']; //40
            $ball_id = $balls['id']; //1
            $bucket_size = $bucket->bucket_size; //40
            $bucket_cal = $ball_count1 * $ball_size1;
            
            if($bucket_size > $bucket_cal)
            {
                $buckets_in_ball = $ball_count1;
                $remaing_ball = 0;
                $bucket_remaing_size = $bucket_size - $bucket_cal;
                $BucketInBall = BucketInBall::create([
                    'bucket_id' => $bucket->id,
                    'ball_size_id' => $ball_id,
                    'inbucketball' => intval($buckets_in_ball),
                    'remaing_ball' => $remaing_ball,
                    'bucket_remaing_size' => $bucket_remaing_size,
                ]);
            } else {
                $buckets_in_ball = $bucket_size / $ball_size1;
                $remaing_ball = abs($buckets_in_ball - $ball_count1);
                $buck_point = fmod($buckets_in_ball,1) + fmod($remaing_ball,1);
                $bucket_remaing_size = abs(($ball_size1 * intval($buckets_in_ball)) - $bucket_size);
                $BucketInBall = BucketInBall::create([
                    'bucket_id' => $bucket->id,
                    'ball_size_id' => $ball_id,
                    'inbucketball' => intval($buckets_in_ball),
                    'remaing_ball' => intval($remaing_ball) + $buck_point,
                    'bucket_remaing_size' => $bucket_remaing_size,
                ]);
            }
            
        }
        $buckets_remaing_ball = BucketInBall::where('remaing_ball','>',0)->get();
        foreach($buckets_remaing_ball as $key => $val)
        {
            if($val->remaing_ball > 0)
            {
                $bucketId = $val->bucket_id;
                $ballId = $val->ball_size_id;
                $ball_details = BallSize::where('id',$ballId)->first();
                $ball_size = $ball_details->ball_size;
                $bucket_remaing_size = BucketInBall::where('bucket_remaing_size','>',0)->first();
                if($bucket_remaing_size->bucket_remaing_size > $ball_size || $bucket_remaing_size->bucket_remaing_size == $ball_size)
                {
                    $add_balltobucket = intval($bucket_remaing_size->bucket_remaing_size / $ball_size);
                    $remaing_ball_count = $val->remaing_ball;
                    if($add_balltobucket > $remaing_ball_count || $add_balltobucket == $remaing_ball_count)
                    {
                        $final_remaing_ball = $remaing_ball_count - $add_balltobucket;
                        $occupied_space = $add_balltobucket * $ball_size;
                        $bucket_remaing_space = abs($occupied_space - $bucket_remaing_size->bucket_remaing_size);
                        BucketInBall::where('id',$bucket_remaing_size->id)->update(['bucket_remaing_size'=>0]);
                        BucketInBall::where('id',$val->id)->update(['remaing_ball'=>0]);
                        BucketInBall::create([
                            'bucket_id' => $bucket_remaing_size->bucket_id,
                            'ball_size_id' => $ballId,
                            'inbucketball' => intval($add_balltobucket),
                            'remaing_ball' => 0,
                            'bucket_remaing_size' => $bucket_remaing_space,
                        ]);
                    } else {
                        $occupied_space = $add_balltobucket * $ball_size;
                        $bucket_remaing_space = abs($occupied_space - $bucket_remaing_size->bucket_remaing_size);
                        $final_remaing_ball = abs($add_balltobucket - $remaing_ball_count);
                        BucketInBall::where('id',$bucket_remaing_size->id)->update(['bucket_remaing_size'=>0]);
                        BucketInBall::where('id',$val->id)->update(['remaing_ball'=>0]);
                        BucketInBall::create([
                            'bucket_id' => $bucket_remaing_size->bucket_id,
                            'ball_size_id' => $ballId,
                            'inbucketball' => intval($add_balltobucket),
                            'remaing_ball' => $final_remaing_ball,
                            'bucket_remaing_size' => $bucket_remaing_space,
                        ]);
                    }
                }
            }
        }
        return redirect()->route('dashboard')->with('message', 'Balls created successfully!');
    }
}
