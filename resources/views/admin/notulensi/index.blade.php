@extends('admin.layout.app')

@section('content')
///show table user
<div class="card">
    <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="notulensi" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Tempat</th>
                    <th>Pemimpin Kegiatan</th>
                    <th>Peserta</th>
                    <th>Dokumentasi</th>
                    <th>Notulensi</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        {{ $notulensi->links() }}
    </div>
    <!-- /.card-body -->
</div>

        
@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {

    var table = $('#notulensi').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('notulensi.json') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'kegiatan', name: 'kegiatan'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'waktu', name: 'waktu'},
            {data: 'tempat', name: 'tempat'},
            {data: 'pemimpin_kegiatan', name: 'pemimpin_kegiatan'},
            {data: 'peserta', name: 'peserta'},
            {data: 'dokumentasi', name: 'dokumentasi'},
            {data: 'notulensi', name: 'notulensi'},
            {data: 'status', name: 'status'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });

  });
</script>
@endpush