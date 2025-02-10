@extends('students.layout')
@include('layouts.header')
@section('content')

<div class="card mt-5 mb-5">
  <h2 class="card-header">Show Student</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('students.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong> <br/>
                {{ $student->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Details:</strong> <br/>
                {{ $student->detail }}
            </div>
        </div>

        <!-- Display university name -->
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>University:</strong> <br/>
                {{ $student->university->name ?? 'No university assigned' }}
            </div>
        </div>

        <!-- Display uploaded image -->
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Image:</strong> <br/>
                <!-- Show image if it exists -->
                @if($student->image_upload)
                    <img src="{{ asset('storage/images/' . $student->image_upload) }}" alt="Student Image" width="150px" height="150px" style="object-fit: cover;">
                @else
                    <p>No image uploaded</p>
                @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
