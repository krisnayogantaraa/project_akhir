
@extends('layouts.app')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 10 CRUD with Image Upload Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('finances.create') }}"> Create New finance</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New categorie</a>
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
            <th>Image</th>
            <th>Date</th>
            <th>Name</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Detail</th>
            <th>category</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($finances as $finance)
        <tr>
            <td><img src="/images/{{ $finance->image }}" width="100px"></td>
            <td>{{ $finance->date }}</td>
            <td>{{ $finance->name }}</td>
            <td>{{ $finance->type }}</td>
            <td>{{ $finance->amount }}</td>
            <td>{{ $finance->detail }}</td>
            <td>{{ $finance->category }}</td>
            <td>
                <form action="{{ route('finances.destroy',$finance->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('finances.show',$finance->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('finances.edit',$finance->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
     
    <table class="table table-bordered">
        <tr>

            <th>Name</th>
            <th>Type</th>
            <th width="280px">Action</th>


        </tr>
        @foreach ($categories as $categorie)
        <tr>
            <td>{{ $categorie->name }}</td>
            <td>{{ $categorie->type }}</td>
            <td>
                <form action="{{ route('categories.destroy',$categorie->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('categories.show',$categorie->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('categories.edit',$categorie->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $categories->links() !!}
        
@endsection