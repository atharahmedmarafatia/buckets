<?php

namespace App\Http\Controllers;

use App\Models\Buckets;
use Illuminate\Http\Request;

class BucketsController extends Controller
{
    public function index()
    {

    }


    public function create()
    {
        $buckets = Buckets::all();
        return view('Buckets.create',compact('buckets'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bucket_name' => 'required',
            'bucket_size' => 'required',
        ]);
        $bucket_name = $request['bucket_name'];
        $bucket_size = $request['bucket_size'];

        
        foreach($request['bucket_name'] as $keys => $value)
        {
            $balls = Buckets::create([
                'bucket_name' => $value,
                'bucket_size' => $request['bucket_size'][$keys],
            ]);
        }
        return redirect()->route('ball.create')->with('message', 'Buckets created successfully!');
    }
}
