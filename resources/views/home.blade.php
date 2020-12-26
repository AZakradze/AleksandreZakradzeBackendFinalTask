@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
                @if(auth()->user()->role == 'admin')
                <div class="card-header mb-3">Add product</div>

                <form action="{{ route('product.store') }}" method="Post" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group row ">
                        <label class="col-md-4 col-form-label text-md-right">Enter title</label>
                        <input type="text" name="title" class="form-control col-md-6" id="">
                    </div>

                    <div class="form-group row ">
                        <label class="col-md-4 col-form-label text-md-right">Select category</label>
                        <select class="form-control col-md-6" name="subcategory_id">
                            @foreach($categories as $cat)
                                <option  disabled label="{{ $cat->title }}"></option>
                                @foreach($cat->subcategories as $cas)
                                <option value="{{ $cas->id }}">{{ $cas->title }}</option>
                                @endforeach

                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row ">
                        <label for="" class="col-md-4 col-form-label text-md-right">add image</label>
                        <input type="file" name="img" class="form-control col-md-6" id="">
                    </div>
                    <div class="form-group row ">
                        <label for="" class="col-md-4 col-form-label text-md-right">Enter Description</label>
                        <textarea name="desc" cols="30" rows="10" class="form-control col-md-6"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success ml-5 ">Add</button>
              </form>

                <div class="card-header mb-3">Add cateogires</div>

                <form action="{{ route('category.store') }}" method="Post"  class="mb-5">
                    @csrf
                    <div class="form-group row ">
                        <label class="col-md-4 col-form-label text-md-right">Enter title</label>
                        <input type="text" name="title" class="form-control col-md-6" id="">
                    </div>
                    <button type="submit" class="btn btn-success ml-5 ">Add</button>
                </form>
                <div class="">
                    @foreach($categories as $cat)
                        <div class="d-flex justify-content-sm-between mt-2">
                            <h5 class="d-block">{{ $cat->title }}</h5>
                            <a class="btn btn-secondary" >Edit </a>
                            <form  action="{{ route('category.destroy', ['category' => $cat->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Remove</button>
                            </form>
                        </div>
                        <div class="d-flex justify-content-sm-between mt-2">
                            <form action="{{ route('subcategory.store') }}" method="Post"  class="mb-5">
                                @csrf
                                <div class="form-group row ">
                                    <label class="col-md-4 col-form-label text-md-right">Enter title</label>
                                    <input type="text" name="title" class="form-control col-md-6" id="">
                                    <input type="hidden" name="category_id" value="{{$cat->id}}" id="">
                                </div>
                                <button type="submit" class="btn btn-success ml-5 ">Add sub</button>
                            </form>
                        </div>

                        <div class="d-flex ">
                            @foreach($cat->subcategories as $c2)
                                <h7 class="d-block">{{ $c2->title }}   || </h7>
                            @endforeach
                        </div>
                        <br><br>
                    @endforeach
                </div>
                @else
                    <div class="card-header mb-3">You need to be admin to add data </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
