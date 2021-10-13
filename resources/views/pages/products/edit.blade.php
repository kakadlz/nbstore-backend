@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Barang</strong>
            <small>{{$data->name}}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{route('products.update',$data->id)}}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Nama Barang</label>
                    <input type="text" name="name" value="{{old('name') ? old('name') : $data->name}}" class="form-control @error('name') is-invalid
                    @enderror">
                    @error('name')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type">Tipe Barang</label>
                    <input type="text" name="type" value="{{old('type') ? old('type') : $data->type}}" class="form-control @error('type') is-invalid
                    @enderror">
                    @error('type')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type">Deskripsi Barang</label>
                    <textarea name="description"  class="ckeditor form-control @error('description') is-invalid
                    @enderror">{{old('description') ? old('description') : $data->description}}</textarea>
                    @error('description')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Harga Barang</label>
                    <input type="number" name="price" value="{{old('price') ? old('price') : $data->price}}" class="form-control @error('price') is-invalid
                    @enderror">
                    @error('price')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity">Jumlah Barang</label>
                    <input type="number" name="quantity" value="{{old('quantity') ? old('quantity') : $data->quantity}}" class="form-control @error('quantity') is-invalid
                    @enderror">
                    @error('quantity')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Simpan </button>
                </div>
            </form>
        </div>
    </div>
@endsection
