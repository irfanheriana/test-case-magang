<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Case</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
  <body>

    <h1 class="text-center mb-5">Data Pegawai</h1>

    <div class="container">
    <a href="/tambahpegawai" type="button" class="btn btn-success mb-3">Tambah Data</a> &nbsp;
    <div class="row">
        {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
           {{ $message }}
          </div>
        @endif --}}
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            <?php
                $no = 1;
            ?>
            @foreach ($data as $index => $row)      
          <tr>
            {{-- membuat supaya data page berutan --}}
            <th scope="row">{{ $index + $data->firstItem() }}</th>
            <td>{{ $row->nama }}</td>
            <td>{{ $row->username }}</td>
            <td>{{ $row->password }}</td>
            <td>{{ $row->status }}</td>
            <td>
                <a href="/editpegawai/{{ $row->id }}" class="btn btn-primary">Edit</a>
                <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{-- membuat pagination --}}
      {{ $data->links() }}
    </div>
    {{-- export pdf --}}
    <a href="/exportpdf" type="button" class="btn btn-primary mb-3">Download PDF</a> &nbsp;
    <a href="/exportexcell" type="button" class="btn btn-primary mb-3">Download Excell</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    {{-- toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
  <script>
       
        $('.delete').click( function() {

            var Pegawaiid = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');

            swal({
                title: "Apakah Kamu Yakin?",
                text: "Kamu akan menghapus data pegawai bernama "+nama+" !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    // menghapus data pegawai
                    window.location = "/deletepegawai/"+Pegawaiid+""
                    swal("Duuaarrr! data berhasil dihapus!", {
                    icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus!");
                }
             });
        });
  </script>

  <script>
      @if(Session::has('success'))
      toastr.success("{{ Session::get('success') }}")
      @endif
  </script>
</html>