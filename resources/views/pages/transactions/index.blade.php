@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Transaksi Masuk </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nomor</th>
                                        <th>Total Transaksi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @forelse ($datas as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->number}}</td>
                                            <td>${{$data->transaction_total}}</td>
                                            <td>
                                                @if($data->transaction_status=>'PENDING')
                                                    <span class="badge badge-info">
                                                @elseif($data->transaction_status=>'SUCCESS')
                                                <span class="badge badge-success">
                                                @else
                                                    <span class="badge badge-danger">
                                                @endif

                                                {{$data->transaction_status }}

                                                </span>
                                            </td>
                                            <td>
                                                @if($data->transaction_status=>'PENDING')
                                                {{-- <a href="{{route('transactions.status',$data->id)}}?status=SUCCESS" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>
                                                <a href="{{route('transactions.status',$data->id)}}?status=FAILED" class="btn btn-success btn-sm"><i class="fa fa-times"></i></a> --}}
                                                @endif
                                                <a href="{{route('transactions.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>

                                                <a href="{{route('transactions.edit',$data->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                                <form action="{{route('transactions.delete',$data->id)}}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                   @empty
                                   <tr>
                                       <td colspan="6" class="text-center p-5"> Data tidak ditemukan</td>
                                   </tr>

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
