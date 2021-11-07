@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Transaksi</strong>
            <small>{{$data->uuid}}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{route('transactions.update',$data->id)}}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Nama Pemesan</label>
                    <input type="text" name="name" value="{{old('name') ? old('name') : $data->name}}" class="form-control @error('name') is-invalid
                    @enderror">
                    @error('name')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{old('email') ? old('email') : $data->name}}" class="form-control @error('email') is-invalid
                    @enderror">
                    @error('email')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="number">Nomer HP</label>
                    <input type="text" name="number" value="{{old('number') ? old('number') : $data->number}}" class="form-control @error('number') is-invalid
                    @enderror">
                    @error('number')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <input type="text" name="address" value="{{old('address') ? old('address') : $data->address}}" class="form-control @error('address') is-invalid
                    @enderror">
                    @error('address')
                        <div class="text-muted">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Ubah Transaksi </button>
                </div>
            </form>
        </div>
    </div>
@endsection
