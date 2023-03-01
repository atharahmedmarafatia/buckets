<x-app-layout>
    <form action="{{route('buckets.store')}}" method="POST" class="step-1 creatives-form">
        @csrf
        <div class="main-form">
            <div class="form-group">
                <div class="form-floating mb-3">
                    <label for="bucket_name">Buckets Name</label>
                    <input type="text" step="any" class="form-control" name="bucket_name[]" id="bucket_name" placeholder="bucket_name" maxlength="100" value="A" readonly>
                    @error('bucket_name')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="bucket_size">bucket_size</label>
                    <input type="number" step="any" class="form-control" name="bucket_size[]" id="bucket_size" placeholder="bucket_size" maxlength="100" value="{{old('bucket_size')}}">
                    @error('bucket_size')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <div class="form-floating mb-3">
                    <label for="bucket_name">Buckets Name</label>
                    <input type="text" step="any" class="form-control" name="bucket_name[]" id="bucket_name" placeholder="bucket_name" maxlength="100" value="B" readonly>
                    @error('bucket_name')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="bucket_size">bucket_size</label>
                    <input type="number" step="any" class="form-control" name="bucket_size[]" id="bucket_size" placeholder="bucket_size" maxlength="100" value="{{old('bucket_size')}}">
                    @error('bucket_size')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
            </div>



            <div class="form-group">
                <div class="form-floating mb-3">
                    <label for="bucket_name">Buckets Name</label>
                    <input type="text" step="any" class="form-control" name="bucket_name[]" id="bucket_name" placeholder="bucket_name" maxlength="100" value="C" readonly>
                    @error('bucket_name')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="bucket_size">bucket_size</label>
                    <input type="number" step="any" class="form-control" name="bucket_size[]" id="bucket_size" placeholder="bucket_size" maxlength="100" value="{{ old('bucket_size') }}">
                    @error('bucket_size')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
            </div>



            <div class="form-group">
                <div class="form-floating mb-3">
                    <label for="bucket_name">Buckets Name</label>
                    <input type="text" step="any" class="form-control" name="bucket_name[]" id="bucket_name" placeholder="bucket_name" maxlength="100" value="D" readonly>
                    @error('bucket_name')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="bucket_size">bucket_size</label>
                    <input type="number" step="any" class="form-control" name="bucket_size[]" id="bucket_size" placeholder="bucket_size" maxlength="100" value="{{ old('bucket_size') }}">
                    @error('bucket_size')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
            </div>



            <div class="form-group">
                <div class="form-floating mb-3">
                    <label for="bucket_name">Buckets Name</label>
                    <input type="text" step="any" class="form-control" name="bucket_name[]" id="bucket_name" placeholder="bucket_name" maxlength="100" value="E" readonly>
                    @error('bucket_name')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="bucket_size">bucket_size</label>
                    <input type="number" step="any" class="form-control" name="bucket_size[]" id="bucket_size" placeholder="bucket_size" maxlength="100" value="{{ old('bucket_size') }}">
                    @error('bucket_size')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
        </div>
       
        <div class="form-group full">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</x-app-layout>
<script>

</script>