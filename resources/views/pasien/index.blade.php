@extends('template.index')

@section('content')
    <div class="app-content-header">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Periksa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Periksa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">

            {{-- Form Periksa --}}
            <div class="card card-primary mb-4">
                <div class="card-header">
                    <h5 class="card-title">Form Periksa</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('pasien.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="dokter_id" class="form-label">Dokter</label>
                            <select class="form-control" name="dokter_id" required>
                                <option value="">Pilih Dokter</option>
                                @foreach($dokter as $d)
                                    <option value="{{ $d->id }}">{{ $d->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                </div>
            </div>

            {{-- Riwayat Periksa --}}
            <div class="card card-primary">
                <div class="card-header">
                    <h5 class="card-title">Riwayat Periksa</h5>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Dokter</th>
                                <th>Tanggal</th>
                                <th>Biaya Periksa</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($riwayat as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->dokter->name }}</td>
                                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                    <td>Rp. {{ number_format($item->biaya_periksa, 0, ',', '.') }}</td>
                                    <td>{{ $item->status }}</td>
                                </tr>
                            @endforeach                           
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
