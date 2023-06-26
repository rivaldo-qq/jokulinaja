@extends('layouts.admin')

@section('title')
    product   
@endsection

@section('content')
<div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <h2 class="dashboard-title">Admin Dashboard</h2>
              <p class="dashboard-subtitle">Look what you have made today!</p>
            </div>
            <div class="dashboard-content">
              <!--content-->
              <div class="row">
                <div class="col-md-12">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>                                
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route ('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label>nama product</label>
                                                <input type="text" name="name" class="form-control" value="{{ $item ->name}}" required>
                                            </div>
                                    </div>
                                
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label>pemilik product</label>
                                                <select name="users_id" class="form-control">
                                                    <option value="{{$item ->users_id}}" selected>{{$item->user->name}}</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>kategori produk</label>
                                                <select name="categories_id" class="form-control">
                                                    <option value="{{$item ->categories_id}}" selected>{{$item->category->name}}</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>harga produk</label>
                                                <input type="number" name="price" class="form-control" value="{{ $item ->price}}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>deskripsi produk</label>
                                                <textarea name="description" id="editor">{!! $item -> description !!}</textarea>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success px-5">
                                            save now
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
              </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
@endsection

@push('setelah-script')
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>
@endpush