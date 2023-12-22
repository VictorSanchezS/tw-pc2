@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Enrollment Information
                </div>
                <div class="float-end">
                    <a href="{{ route('enrollments.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Level:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $enrollment->level }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Semester:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $enrollment->semester }}
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>


@endsection
