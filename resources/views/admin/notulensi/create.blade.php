@extends('admin.layout.app')

@section('content')
<div class="card">
    <div class="card-header">
        Form Notulensi
    </div>
    <div class="card-body">
        <form action="{{ route('notulensi.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="">Kegiatan</label>
                <input type="text" class="form-control" name="kegiatan" id="kegiatan" placeholder="Kegiatan">
            </div>
            <div class="form-group">
                <label for="">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal">
            </div>
            <div class="form-group">
                <label for="">Waktu</label>
                <input type="time" class="form-control" name="waktu" id="waktu" placeholder="Waktu">
            </div>
            <div class="form-group">
                <label for="">Tempat</label>
                <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat">
            </div>
            <div class="form-group">
                <label for="">Pemimpin Kegiatan</label>
                <input type="text" class="form-control" name="pemimpin_kegiatan" id="pemimpin_kegiatan" placeholder="Pemimpin Kegiatan">
            </div>
            <div class="form-group">
                <label for="">Peserta</label>
                <input type="text" class="form-control" name="peserta" id="peserta" placeholder="Peserta">
            </div>
            <div class="form-group">
                <label for="">Dokumentasi</label>
                <input type="file" class="form-control" required name="image" id="dokumentasi" placeholder="Dokumentasi">
            </div>
            <div class="form-group">
                <label for="">Notulensi</label>
                <!-- <input type="text" class="form-control" name="notulensi" id="notulensi" placeholder="Notulensi"> -->
                <textarea class="ckeditor form-control" name="notulensi" id="notulensi" placeholder="Notulensi"></textarea>
            </div>

            /**
            create button submit
             */

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
</div>

@endsection