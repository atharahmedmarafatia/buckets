<x-app-layout>
    <form action="{{route('ballq.store')}}" method="POST" class="step-1 creatives-form">
        @csrf
        <div class="main-form">
            <div class="form-group">
                <div class="form-floating mb-3">
                    <label for="ball_name">ball Name</label>
                    <input type="text" step="any" class="form-control" name="ball_name[]" id="ball_name" placeholder="ball_name" maxlength="100" value="pink" readonly>
                    @error('ball_name')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="ball_count">ball_count</label>
                    <input type="number" step="any" class="form-control" name="ball_count[]" id="ball_count" placeholder="ball_count" maxlength="100" value="{{ old('ball_count') }}">
                    @error('ball_count')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <div class="form-floating mb-3">
                    <label for="ball_name">ball Name</label>
                    <input type="text" step="any" class="form-control" name="ball_name[]" id="ball_name" placeholder="ball_name" maxlength="100" value="red" readonly>
                    @error('ball_name')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="ball_count">ball_count</label>
                    <input type="number" step="any" class="form-control" name="ball_count[]" id="ball_count" placeholder="ball_count" maxlength="100" value="{{ old('ball_count') }}">
                    @error('ball_count')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
            </div>



            <div class="form-group">
                <div class="form-floating mb-3">
                    <label for="ball_name">ball Name</label>
                    <input type="text" step="any" class="form-control" name="ball_name[]" id="ball_name" placeholder="ball_name" maxlength="100" value="blue" readonly>
                    @error('ball_name')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="ball_count">ball_count</label>
                    <input type="number" step="any" class="form-control" name="ball_count[]" id="ball_count" placeholder="ball_count" maxlength="100" value="{{ old('ball_count') }}">
                    @error('ball_count')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
            </div>



            <div class="form-group">
                <div class="form-floating mb-3">
                    <label for="ball_name">ball Name</label>
                    <input type="text" step="any" class="form-control" name="ball_name[]" id="ball_name" placeholder="ball_name" maxlength="100" value="orange" readonly>
                    @error('ball_name')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="ball_count">ball_count</label>
                    <input type="number" step="any" class="form-control" name="ball_count[]" id="ball_count" placeholder="ball_count" maxlength="100" value="{{ old('ball_count') }}">
                    @error('ball_count')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
            </div>



            <div class="form-group">
                <div class="form-floating mb-3">
                    <label for="ball_name">ball Name</label>
                    <input type="text" step="any" class="form-control" name="ball_name[]" id="ball_name" placeholder="ball_name" maxlength="100" value="green" readonly>
                    @error('ball_name')
                    <span style="display: inline-block;" class="alert alert-danger" role="alert">{{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <label for="ball_count">ball_count</label>
                    <input type="number" step="any" class="form-control" name="ball_count[]" id="ball_count" placeholder="ball_count" maxlength="100" value="{{ old('ball_count') }}">
                    @error('ball_count')
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