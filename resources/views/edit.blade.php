@extends('layouts.app')
@section('content')

    <form action="{{ route('product.update', ['product' => $product->id]) }}" method="Post" enctype="multipart/form-data" >
        @method('PUT')
        @csrf
        <div class="form-group row ">
            <label class="col-md-4 col-form-label text-md-right">Enter title</label>
            <input type="text" name="title" value="{{$product->title}}" class="form-control col-md-6" id="">
        </div>

        <div class="form-group row ">
            <label class="col-md-4 col-form-label text-md-right">Select category</label>
            <select class="form-control col-md-6" name="subcategory_id" >
                @foreach($categories as $cat)
                    <option  disabled label="{{ $cat->title }}"></option>
                    @foreach($cat->subcategories as $cas)
                        <option value="{{ $cas->id }}" {{ $selected = $cas->id == $product->subcategory_id ? 'selected' : '' }}>{{ $cas->title }}</option>
                    @endforeach
                @endforeach
            </select>
        </div>

        <div class="form-group row ">
            <label for="" class="col-md-4 col-form-label text-md-right">add image</label>
            <input type="file" name="img" value="{{$product->image}}" class="form-control col-md-6" id="">
        </div>
        <div class="form-group row ">
            <label for="" class="col-md-4 col-form-label text-md-right">Enter Description</label>
            <textarea name="desc" cols="30" rows="10"  class="form-control col-md-6"> {{$product->desc}}</textarea>
        </div>
        <button type="submit" class="btn btn-success ml-5 ">Edit</button>
    </form>
@endsection
