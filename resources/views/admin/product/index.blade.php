@extends('layouts.backend.app')
@push('meta')
@endpush
@section('title', 'Product')
    @push('pagecss')
    @endpush
    @push('css')
    @endpush
@section('breadcrumb')
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Product</h4>
                    <div class="row">
                        <div class="col-lg-4">
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="product">Product Name</label>
                                    <input type="text" class="form-control" id="product" name="name"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="product">Product Image</label>
                                    <input type="file" class="form-control" id="product" name="image"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="product">Product Price</label>
                                    <input type="text" class="form-control" id="product" name="price"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Select Category</label>
                                    <select name="category_id" class="form-control" id="exampleFormControlSelect2">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <div class="col-lg-8">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $key=>$product)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td><img src="{{ asset($product->image) }}" width="100px" height="100px" alt="">
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal"
                                                    data-target="#editCategory{{ $product->id }}"
                                                    class="btn btn-sm btn-primary">edit</a>
                                                <a href="#" data-toggle="modal" data-target="#delete{{ $product->id }}"
                                                    class="btn btn-sm btn-danger">x</a>
                                            </td>
                                        </tr>

                                        <!--product Edit Modal -->
                                        <div class="modal fade" id="editCategory{{ $product->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('product.update', $product->id) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="product">Product Name</label>
                                                                <input type="text" class="form-control" id="product"
                                                                    name="name" name="name" value="{{$product->name}}" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="product">Product Image</label>
                                                                <input type="file" class="form-control" id="product"
                                                                    name="image" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="product">Product Price</label>
                                                                <input type="text" class="form-control" id="product"
                                                                    name="price" value="{{$product->price}}" aria-describedby="emailHelp">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect2">Select
                                                                    Category</label>
                                                                <select name="category_id" class="form-control"
                                                                    id="exampleFormControlSelect2">
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}" {{$product->category_id==$category->id?'selected':''}}>
                                                                            {{ $category->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description">Description</label>
                                                                <textarea class="form-control" name="description"
                                                                    id="description" rows="3">{{$product->description}}</textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- delete product Modal -->
                                        <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title" id="exampleModalLabel">Product Delete</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are You Sure You Want Delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">No</button>
                                                        <form action="{{ route('product.destroy', $product->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Yes</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('pagejs')
@endpush
@push('js')

@endpush
