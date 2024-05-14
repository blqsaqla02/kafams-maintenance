@extends('results.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('results.create') }}"> Create New Result</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Class</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($results as $result)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $result->student_name }}</td>
            <td>{{ $result->student_class }}</td>
            <td>
                <form action="{{ route('results.destroy',$result->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('results.show',$result->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('results.edit',$result->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $results->links() !!}
      
@endsection
