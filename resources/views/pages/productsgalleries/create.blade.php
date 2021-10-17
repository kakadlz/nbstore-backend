@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{route('productgalleries.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Barang</label>
                    <select name="product_id" id="product_id" class="form-controll @error('product_id')
                        is_invalid
                    @enderror">
                            @foreach ($products as $p)
                                    <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach
                </select>
                    @error('product_id')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type">Tipe Barang</label>
                    <input type="text" name="type" value="{{old('type')}}" class="form-control @error('type') is-invalid
                    @enderror">
                    @error('type')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo">Foto Barang</label>
                    <input type="file" name="photo" value="{{old('photo')}}" class="form-control @error('photo') is-invalid
                    @enderror" accept="image/">
                    @error('photo')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="is_default">Jadikan Default</label>
                    <fieldset id="group2">
                        <input type="radio" name="is_default" value="1" class=" @error('is_default') is-invalid
                        @enderror"/>Ya &nbsp;
                        <input type="radio" name="is_default" value="0" class=" @error('is_default') is-invalid
                        @enderror"/>Tidak
                    </fieldset>
                    @error('is_default')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Tambah </button>
                </div>
            </form>
        </div>
    </div>
@endsection
