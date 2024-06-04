@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('produk') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('produk.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <img src="{{ asset('storage/produks/' . $produk->image) }}" class="w-100 rounded">
                    <hr>
                    <h4>{{ $produk->nama }}</h4>
                    <p class="tmt-3">
                        Harga : Rp.{{ number_format($produk->harga, 2) }}
                    </p>
                    <p class="tmt-3">
                        Deskripsi : {!! $produk->deskripsi !!}
                    </p>
                    <p class="tmt-3">
                       Kategori : {!! $produk->kategori->nama_kategori !!}
                    </p>
                    <p class="tmt-3">
                       Merek : {!! $produk->merek->nama_merek !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
