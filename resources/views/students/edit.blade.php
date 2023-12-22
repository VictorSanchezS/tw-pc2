@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit student
                </div>
                <div class="float-end">
                    <a href="{{ route('students.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('students.update', $student->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="id_person" class="col-md-4 col-form-label text-md-end text-start">ID Person</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('id_person') is-invalid @enderror" id="id_person" name="id_person" value="{{ $student->id_person }}">
                            @if ($errors->has('id_person'))
                                <span class="text-danger">{{ $errors->first('id_person') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="carrier" class="col-md-4 col-form-label text-md-end text-start">Carrier</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('carrier') is-invalid @enderror" id="carrier" name="carrier" value="{{ $student->carrier }}">
                            @if ($errors->has('carrier'))
                                <span class="text-danger">{{ $errors->first('carrier') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="faculty" class="col-md-4 col-form-label text-md-end text-start">Faculty</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('faculty') is-invalid @enderror" id="faculty" name="faculty" value="{{ $student->faculty }}">
                            @if ($errors->has('faculty'))
                                <span class="text-danger">{{ $errors->first('faculty') }}</span>
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
