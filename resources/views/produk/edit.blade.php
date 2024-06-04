@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Dashboard') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('produk.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('produk.update', $produk->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk"
                                value="{{ $produk->nama_produk }}" placeholder="nama produk" required>
                            @error('nama_produk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Produk</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga"
                                value="{{ $produk->harga }}" placeholder="harga" required>
                            @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                value="{{ old('deskripsi') }}" placeholder="Deskripsi" required>
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Id Kategori</label>
                            <select name="id_kategori" class="form-select">
                                <option value=""disabled selected>Pilih Kategori</option>
                                @forelse ($kategori as $data)

                                <option value="{{$data->id}}" @error('id_kategori') is-invalid @enderror>
                                    {{$data->nama_kategori}}
                                </option>
                                @empty
                                    <option value="" disabled>Data Belum Tersedia</option>
                                @endforelse
                            </select>

                            @error('id_kategori')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Id Merek</label>
                            <select name="id_merek" class="form-select">
                                <option value=""disabled selected>Pilih Merek</option>
                                @forelse ($merek as $data)

                                <option value="{{$data->id}}" @error('id_merek') is-invalid @enderror>
                                    {{$data->nama_merek}}
                                </option>
                                @empty
                                    <option value="" disabled>Data Belum Tersedia</option>
                                @endforelse
                            </select>

                            @error('id_merek')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                value="{{ $produk->image }}"></input>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-sm btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
