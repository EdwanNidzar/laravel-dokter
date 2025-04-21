@extends('template.index')
@section('title', 'Dashboard Dokter')

@section('content')
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Dokter</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('dokter.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Periksa Pasien</li>
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
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Pemeriksaan Pasien: {{ $periksa->pasien->name ?? 'Nama Pasien' }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('periksa.update', $periksa->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Biaya Pemeriksaan -->
                    <div class="mb-3">
                        <label for="biaya_periksa" class="form-label">Biaya Pemeriksaan</label>
                        <input type="text" class="form-control" id="biaya_periksa" name="biaya_periksa" value="{{ old('biaya_periksa', $periksa->biaya_periksa) }}">
                        @error('biaya_periksa')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status Pemeriksaan -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Pemeriksaan</label>
                        <select class="form-control" id="status" name="status">
                            <option value="Menunggu" {{ $periksa->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="Selesai" {{ $periksa->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-success">Perbarui Pemeriksaan</button>
                </form>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::App Content-->
@endsection
