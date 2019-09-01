@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <h4>{{ $message }}</h4>
    </div>
@endif

<div class="row">

    <div class="col-md-12">
        <div class="pull-left">
        
            <h1>MAIN PAGE</h1>
        </div>
        <div class="pull-right">
           <a href="{{route('profiles.create')}}" class="btn btn-lg btn-success">Register</a>
        </div>
    </div>

</div>

<table class="table table-bordered table-dark">

    <tr>
        <th>No.</th>
        <th> ID</th>
        <th>Image Profile</th>        
        <th>First Name</th>
        <th>Last Name</th>
        <th>Home Address</th>
        <th>Phone Number</th>
        <th>Email Address</th>
        <th>Edit / Delete</th>
    </tr> 
    @foreach($profiles as $profile)
    <tr>
        <th>{{ ++$i }}</th>
        <th>{{ $profile->id }}</th>
        <th>
            <img src="{{ asset('uploads/employee/' . $profile->Image1) }}" alt="Image" height="100px" width="100px">
        </th>        
        <th>{{ $profile->Fname }}</th>
        <th>{{ $profile->Lname }}</th>
        <th>{{ $profile->Address }}</th>
        <th>{{ $profile->Pnumber }}</th>
        <th>{{ $profile->Email }}</th>
        <th>         
            <form action="{{route('profiles.destroy', $profile->id)}}" method="POST">
                
                <a href="{{route('profiles.edit', $profile->id)}}" class="btn btn-info">Edit</a>
                @csrf    
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>  
                
                          
            </form>
        </th>
    </tr>
    @endforeach
 
 
</table>

{!! $profiles->links() !!}

@endsection