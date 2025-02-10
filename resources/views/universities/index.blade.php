@extends('universities.layout')
@include('layouts.header')
@section('content')

<div class="card mt-5 mb-5">
    <h2 class="card-header">Laravel 11 CRUD Example from scratch - ItSolutionStuff.com</h2>
    <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
  
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('universities.create') }}"> <i class="fa fa-plus"></i> Create New University</a>
        </div>
  
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Image</th>  <!-- New column for image -->
                    <th width="250px">Action</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($universities as $university)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $university->name }}</td>
                    <td>{{ $university->address }}</td>
                    <td>
                        @if($university->image_upload)
                            <img src="{{ asset('storage/images/' . $university->image_upload) }}" alt="University Image" style="max-width: 100%; max-height: 50px; object-fit: contain;">
                        @else
                            <img src="{{ asset('storage/images/default.png') }}" alt="No Image" width="50px" height="50px">
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('universities.destroy',$university->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('universities.show',$university->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('universities.edit',$university->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">There are no data.</td>
                </tr>
            @endforelse
            </tbody>
  
        </table>
        
        {!! $universities->links() !!}
    </div>
</div>  
</div>

@include('layouts.footer')
@endsection
