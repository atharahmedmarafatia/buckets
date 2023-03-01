<?php

namespace App\Http\Controllers;

use App\Models\Ball;
use App\Models\BallSize;
use App\Models\BucketInBall;
use App\Models\Buckets;
use App\Models\Size;
use Illuminate\Http\Request;

class BallController extends Controller
{
    public function index()
    {

    }


    public function create()
    {
        
        $balls = BallSize::all();
        return view('Ball.create',compact('balls'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ball_name' => 'required',
            'ball_size' => 'required',
        ]);
        $ball_name = $request['ball_name'];
        $ball_size = $request['ball_size'];


        
        foreach($request['ball_name'] as $keys => $value)
        {
            $balls = BallSize::create([
                'ball_name' => $value,
                'ball_size' => $request['ball_size'][$keys],
            ]);
        }
        return redirect()->route('ballq.create')->with('message', 'Balls created successfully!');
    }
}
