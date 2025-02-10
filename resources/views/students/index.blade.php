@extends('students.layout')
@include('layouts.header')

@section('content')

<div class="card mt-5 mb-5">
    <h2 class="card-header">Laravel 11 CRUD Example from scratch - ItSolutionStuff.com</h2>
    <div class="card-body">
          
        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession
          
        <!-- Create New Student Button -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('students.create') }}"> 
                <i class="fa fa-plus"></i> Create New Student
            </a>
        </div>

        <!-- Students Table -->
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th>Image</th>  <!-- New column for image -->
                    <th>University</th> <!-- New column for university -->
                    <th width="250px">Action</th>
                </tr>
            </thead>
  
            <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->detail }}</td>
                    <td>
                        @if($student->image_upload)
                            <img src="{{ asset('storage/images/' . $student->image_upload) }}" alt="Student Image" style="max-width: 100%; max-height: 50px; object-fit: contain;">
                        @else
                            <img src="{{ asset('storage/images/default.png') }}" alt="No Image" width="50px" height="50px">
                        @endif
                    </td>
                    <td>{{ $student->university ? $student->university->name : 'No University' }}</td> <!-- Display university name -->
                    <td>
                        <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('students.show',$student->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                            <a class="btn btn-primary btn-sm" href="{{ route('students.edit',$student->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">There are no data.</td>
                </tr>
            @endforelse
            </tbody>
  
        </table>
        
        {!! $students->links() !!}
        </div>
    </div> 
</div> 

@include('layouts.footer')

@endsection
