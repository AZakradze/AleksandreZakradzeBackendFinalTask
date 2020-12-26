@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($products as $product)
                <div class="border row flex-column align-items-center justify-content-center">
                    <img src="{{ 'http://127.0.0.1:8000/storage/'.( str_replace('public/', '', $product->img)) }}" alt="qw">
                    <h2>{{ $product->title  }}</h2>
                    <h4>category: <span>{{ $product->subcatecory->title}}</span></h4>
                    <p>{{ $product->desc     }}</p>
                    <div class="d-flex justify-content-between">
                        @guest
                        @else
                            @if(auth()->user()->role == 'admin')
                                <a class="btn btn-secondary" href="{{ route('product.edit', ['product' => $product->id]) }}">EDIT</a>
                                <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            @endif
                        @endguest
                    </div>
                </div>
                @guest
                @else
                <div class="border row flex-column">
                    <h3>Comments:</h3>
                    <div class=" ">
                        <h4>Add comment here:</h4>
                        <form action="{{route('comment.store')}}" class="mr-5" method="POST">
                            @csrf
                            <input type="text" name="body" class="mr-5 ml-5" placeholder="enter comment">
                            <input type="hidden" value="{{$product->id}}" name="product_id" id="">
                            <button class="btn btn-secondary" type="submit">Add comment</button>
                        </form>
                    </div>
                    @foreach($product->comments as $com)
                        <div class="border ">
                            {{ $com->body }}
                        </div>
                    @endforeach
                </div>
                @endguest
            @endforeach
        </div>
    </div>
</div>

@endsection
