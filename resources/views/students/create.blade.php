@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Student
                </div>
                <div class="float-end">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('students.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="id_person" class="col-md-4 col-form-label text-md-end text-start">ID Person</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('id_person') is-invalid @enderror" id="id_person" name="id_person" value="{{ old('id_person') }}">
                            @if ($errors->has('id_person'))
                                <span class="text-danger">{{ $errors->first('id_person') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="carrier" class="col-md-4 col-form-label text-md-end text-start">Carrier</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('carrier') is-invalid @enderror" id="carrier" name="carrier" value="{{ old('carrier') }}">
                            @if ($errors->has('carrier'))
                                <span class="text-danger">{{ $errors->first('carrier') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="faculty" class="col-md-4 col-form-label text-md-end text-start">Faculty</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('faculty') is-invalid @enderror" id="faculty" name="faculty" value="{{ old('faculty') }}">
                            @if ($errors->has('faculty'))
                                <span class="text-danger">{{ $errors->first('faculty') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="enrollment" class="col-sm-4 col-form-label text-md-end text-start">Enrollment:</label>
                        <div class="col-md-6">
                            <select name="enrollment" id="enrollment" class="form-select @error('enrollment') is-invalid @enderror">
                                <option value="">Select Level</option>
                                @foreach ($enrollments as $enrollment)
                                    <option value="{{ $enrollment->semester }}">{{ $enrollment->level }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('enrollment'))
                                    <span class="text-danger">{{ $errors->first('enrollment') }}</span>
                                @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add student">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
