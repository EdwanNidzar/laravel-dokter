@extends('template.index')
@section('title', 'Dashboard Dokter')

@section('content')
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
      <!--begin::Row-->
      <div class="row">
        <div class="col-sm-6"><h3 class="mb-0">Dokter</h3></div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Memeriksa</li>
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
          <h3 class="card-title">Daftar Pasien Belum Diperiksa</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pasien</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($periksas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pasien->name }}</td>
                    <td>
                        <a href="{{ route('dokter.periksa', $item->id) }}" class="btn btn-primary">Periksa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--end::Container-->
  </div>
  <!--end::App Content-->
</div>
@endsection
