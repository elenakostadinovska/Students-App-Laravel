@extends('universities.layout')
@include('layouts.header')
@section('content')
  
<div class="card mt-5 mb-5">
  <h2 class="card-header">Edit University</h2>
  <div class="card-body">
  
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('universities.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
  
    <form action="{{ route('universities.update', $university->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
  
        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input 
                type="text" 
                name="name" 
                value="{{ $university->name }}"
                class="form-control @error('name') is-invalid @enderror" 
                id="inputName" 
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
  
        <div class="mb-3">
            <label for="inputAddress" class="form-label"><strong>Address:</strong></label>
            <textarea 
                class="form-control @error('address') is-invalid @enderror" 
                style="height:150px" 
                name="address" 
                id="inputAddress" 
                placeholder="Address">{{ $university->address }}</textarea>
            @error('address')
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
        @if($university->image_upload)
            <div class="mb-3">
                <label class="form-label"><strong>Current Image:</strong></label>
                <img src="{{ asset('images/' . $university->image_upload) }}" alt="University Image" width="150px">
            </div>
        @endif

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>
  
        </div>
    </div>
</div>

@include('layouts.footer')
@endsection
