@extends('products.layout')
 
@section('content')

<main class="table">

    <section class="table__header">
            <h1>Data Table</h1>
            <a class="btn btn-primary" href="{{ route('products.create') }}"> Create New Product</a>
    </section>
    @if ($message = Session::get('success'))
            <div class="row">
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            </div>
    @endif
    <section class="table__body">
        <table>
        
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
        
                            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
            
                            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
        
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
        @endforeach
            </tbody>
        </table>
    </section>
</main>
@endsection