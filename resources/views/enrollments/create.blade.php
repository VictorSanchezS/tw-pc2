@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Enrollment
                </div>
                <div class="float-end">
                    <a href="{{ route('enrollments.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('enrollments.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="level" class="col-md-4 col-form-label text-md-end text-start">Level</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('level') is-invalid @enderror" id="level" name="level" value="{{ old('level') }}">
                            @if ($errors->has('level'))
                                <span class="text-danger">{{ $errors->first('level') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="semester" class="col-md-4 col-form-label text-md-end text-start">Semester</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" value="{{ old('semester') }}">
                            @if ($errors->has('semester'))
                                <span class="text-danger">{{ $errors->first('semester') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Enrollment">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
