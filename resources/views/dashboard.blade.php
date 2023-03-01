<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <a class="btn btn-primary" href="{{route('buckets.create')}}">Buckets Create</a><hr><br>

                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>Bucket (size)</th>
                            <th>Ball (size)</th>
                            <th>count</th>
                        </tr>
                        @if(count($Buckets) > 0)
                            @foreach($Buckets as $bucket)
                            <tr>
                                <td>{{$bucket->bucket_name ." (". $bucket->bucket_size .")"}}</td>
                                <td>{{implode(',',$bucket->ball_names) ." (". implode(',',$bucket->ball_size) .")" }}</td>
                                <td>{{implode(' + ',$bucket->ball_counts)  ." = ". $bucket->sum_inbucketball}}</td>
                            </tr>
                            @endforeach
                        @else
                        <tr>
                            <td>Data not Found</td>
                        </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
