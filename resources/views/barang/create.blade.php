@extends('barang.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Barang
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('barang.store') }}" id="myForm">
                @csrf
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" id="kode_barang" aria-describedby="kode_barang" >
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="nama_barang" name="nama_barang" class="form-control" id="nama_barang" aria-describedby="nama_barang" >
                    </div>
                    <div class="form-group">
                        <label for="kategori_barang">Kategori Barang</label>
                        <select type="kategori_barang" name="kategori_barang" class="form-control" id="kategori_barang" aria-describedby="kategori_barang">
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="Makanan & Minuman">Makanan & Minuman</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Fashion Pria">Fashion Pria</option>
                            <option value="Fashion Wanita">Fashion Wanita</option>
                            <option value="Kecantikan">Kecantikan</option>>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="harga" name="harga" class="form-control" id="harga" aria-describedby="harga" >
                    </div>
                    <div class="form-group">
                        <label for="qty">Qty</label>
                        <input type="qty" name="qty" class="form-control" id="qty" aria-describedby="qty" >
                    </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
