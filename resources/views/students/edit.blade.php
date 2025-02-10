@extends('students.layout')
@include('layouts.header')
@section('content')
  
<div class="card mt-5 mb-5">
  <h2 class="card-header">Edit Student</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('students.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
  
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
                value="{{ $student->name }}"
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Detail:</strong></label>
            <textarea 
                class="form-control @error('detail') is-invalid @enderror" 
                style="height:150px" 
                name="detail" 
                id="inputDetail" 
                placeholder="Detail">{{ $student->detail }}</textarea>
            @error('detail')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Upload Field -->
        <div class="mb-3">
            <label for="image_upload" class="form-label"><strong>Image Upload:</strong></label>
            <input 
                type="file" 
                name="image_upload" 
                class="form-control @error('image_upload') is-invalid @enderror" 
                id="image_upload">
            @error('image_upload')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Show current image if exists -->
        @if($student->image_upload)
            <div class="mb-3">
                <label class="form-label"><strong>Current Image:</strong></label>
                <img src="{{ asset('images/' . $student->image_upload) }}" alt="Student Image" width="150px">
            </div>
        @endif

        <!-- University Selection Dropdown -->
        <div class="mb-3">
            <label for="university_id" class="form-label"><strong>University:</strong></label>
            <select 
                name="university_id" 
                id="university_id" 
                class="form-control @error('university_id') is-invalid @enderror">
                <option value="">Select University</option>
                @foreach($universities as $university)
                    <option value="{{ $university->id }}" 
                        @if($university->id == $student->university_id) selected @endif>
                        {{ $university->name }}
                    </option>
                @endforeach
            </select>
            @error('university_id')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>
  
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
