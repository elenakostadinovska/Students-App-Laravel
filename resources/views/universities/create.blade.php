@extends('universities.layout')
@include('layouts.header')
@section('content')

<div class="card mt-5 mb-5">
    <h2 class="card-header">Add New University</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('universities.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
        </div>

        <form action="{{ route('universities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Name Field -->
            <div class="mb-3">
                <label for="inputName" class="form-label"><strong>Name:</strong></label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control @error('name') is-invalid @enderror" 
                    id="inputName" 
                    placeholder="Name">
                @error('name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Address Field -->
            <div class="mb-3">
                <label for="inputAddress" class="form-label"><strong>Address:</strong></label>
                <textarea 
                    class="form-control @error('address') is-invalid @enderror" 
                    style="height:150px" 
                    name="address" 
                    id="inputAddress" 
                    placeholder="Address"></textarea>
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
                <small class="form-text text-muted">Acceptable file formats: JPG, PNG, JPEG. Max size: 2MB.</small>
                @error('image_upload')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </form>

        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
