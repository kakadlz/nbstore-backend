<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>{{$datas->name}}</th>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{$datas->email}}</td>
    </tr>
    <tr>
        <td>Nomor</td>
        <td>{{$datas->number}}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>{{$datas->address}}</td>
    </tr>
    <tr>
        <td>Total Transaksi</td>
        <td>{{$datas->transaction_total}}</td>
    </tr>
    <tr>
        <td>Status Transaksi</td>
        <td>{{$datas->transaction_status}}</td>
    </tr>
    <tr>
        <td>Pembelian Product</td>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                @forelse ($datas->details as $d)
                    <tr>
                        <td>{{$d->products!=null?$d->products->name:'Data tidak ditemukan'}}</td>
                        <td>{{$d->products!=null?$d->products->type:'Data tidak ditemukan'}}</td>
                        <td>{{$d->products!=null?$d->products->price:'Data tidak ditemukan'}}</td>
                    </tr>
                @empty

                @endforelse
            </table>
        </td>
    </tr>
</table>

<div class="row">
    <div class="col-4">
        <a href="{{route('transactions.status',$datas->id)}}?status=SUCCESS" class="btn btn-success btn-block"><i class="fa fa-check"></i> Set Success</a>
    </div>
    <div class="col-4">
        <a href="{{route('transactions.status',$datas->id)}}?status=FAILED" class="btn btn-danger btn-block"><i class="fa fa-times"></i> Set Gagal</a>
    </div>
    <div class="col-4">
        <a href="{{route('transactions.status',$datas->id)}}?status=PENDING" class="btn btn-info btn-block"><i class="fa fa-spinner"></i> Set Pending</a>
    </div>
</div>
