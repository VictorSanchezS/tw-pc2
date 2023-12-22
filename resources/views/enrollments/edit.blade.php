@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit enrollment
                </div>
                <div class="float-end">
                    <a href="{{ route('enrollments.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('enrollments.update', $enrollment->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="level" class="col-md-4 col-form-label text-md-end text-start">Level</label>
                        <div class="col-md-6">
                          <input type="number" class="form-control @error('name') is-invalid @enderror" id="level" name="level" value="{{ $enrollment->level }}">
                            @if ($errors->has('level'))
                                <span class="text-danger">{{ $errors->first('level') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Semester</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="semester" name="semester">{{ $enrollment->semester }}</textarea>
                            @if ($errors->has('semester'))
                                <span class="text-danger">{{ $errors->first('semester') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
