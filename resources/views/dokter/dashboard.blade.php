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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">List Pasien</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Pasien</th>
                    <th>Keluhan</th>
                    <th>Diagnosa</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($periksas as $item)
                <tr>
                    <td>{{ $item->pasien->name }}</td>
                    <td>{{ $item->keluhan }}</td>
                    <td>{{ $item->diagnosa ?? '-' }}</td>
                    <td>{{ $item->tanggal }}</td>
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
@endsection
