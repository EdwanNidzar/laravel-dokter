@extends('template.index')

@section('content')
    <!--begin::App Content Header-->
    <div class="app-content-header">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dokter</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dokter.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dokter</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->

    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="card card-primary mb-4">
                <div class="card-header">
                    <h5 class="card-title">
                        {{ isset($obatEdit) ? 'Edit Obat' : 'Tambah Obat' }}
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ isset($obatEdit) ? route('obat.update', $obatEdit->id) : route('obat.store') }}"
                        method="POST">
                        @csrf
                        @if (isset($obatEdit))
                            @method('PUT')
                        @endif

                        <div class="mb-3">
                            <label for="nama_obat" class="form-label">Nama Obat</label>
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat"
                                value="{{ $obatEdit->nama_obat ?? '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="kemasan" class="form-label">Kemasan</label>
                            <input type="text" class="form-control" id="kemasan" name="kemasan"
                                value="{{ $obatEdit->kemasan ?? '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                value="{{ $obatEdit->harga ?? '' }}" required>
                        </div>

                        <button type="submit" class="btn btn-{{ isset($obatEdit) ? 'success' : 'primary' }}">
                            {{ isset($obatEdit) ? 'Update' : 'Simpan' }}
                        </button>
                        @if (isset($obatEdit))
                            <a href="{{ route('obat.index') }}" class="btn btn-secondary">Batal</a>
                        @endif
                    </form>
                </div>

            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title">Data Obat</h5>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Obat</th>
                                <th>Kemasan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obats as $obat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $obat->nama_obat }}</td>
                                    <td>{{ $obat->kemasan }}</td>
                                    <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('obat.edit', $obat->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('obat.destroy', $obat->id) }}" method="POST"
                                            style="display:inline-block;"
                                            onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if ($obats->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data obat</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
