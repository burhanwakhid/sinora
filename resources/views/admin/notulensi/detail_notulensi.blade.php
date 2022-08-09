<!-- detail notolensi -->
@extends('admin.layout.app')

@section('content')
<!-- show detail notulensi -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Notulensi</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                   
                    <th>Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Tempat</th>
                    <th>Pemimpin Kegiatan</th>
                    <th>Peserta</th>
                    <th>Dokumentasi</th>
                    <th>Notulensi</th>
                  
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $notulensi->kegiatan }}</td>
                    <td>{{ $notulensi->tanggal }}</td>
                    <td>{{ $notulensi->waktu }}</td>
                    <td>{{ $notulensi->tempat }}</td>
                    <td>{{ $notulensi->pemimpin_kegiatan }}</td>
                    <td>{{ $notulensi->peserta }}</td>
                    <td>{{ $notulensi->dokumentasi }}</td>
                    <td>{!! $notulensi->notulensi !!}</td>
                   
                </tr>
            </tbody
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection