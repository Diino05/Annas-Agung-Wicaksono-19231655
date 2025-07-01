<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Absen Bermasalah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: #f4f6f9">
    <div class="container mt-5 mb-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>Daftar Absen Bermasalah</h5>
            </div>
            <div class="card-body">
                <a href="{{ route('absens.create') }}" class="btn btn-success mb-3">Input Absen Bermasalah</a>
                <div class="mb-3 d-flex justify-content-between align-items-center">
                    <div>
                        <label>Show
                            <select class="form-control d-inline-block w-auto" style="width: 70px;">
                                <option>25</option>
                                <option>50</option>
                                <option>100</option>
                            </select>
                            records per page
                        </label>
                    </div>
                    <form class="d-inline-block">
                        <input type="text" class="form-control" placeholder="Search:">
                    </form>
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Keterangan</th>
                            <th>Keterangan</th>
                            <th>Lokasi</th>
                            <th>Tanggal Bermasalah</th>
                            <th>Shift</th>
                            <th>Kondisi</th>
                            <th>Petugas Input</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $i => $row)
                        <tr>
                            <td>{{ $data->firstItem() + $i }}</td>
                            <td>{{ $row->no_keterangan }}</td>
                            <td>{{ $row->keterangan }}</td>
                            <td>{{ $row->lokasi_kampus }}</td>
                            <td>
                                {{ $row->tanggal_awal }}
                                @if($row->tanggal_awal != $row->tanggal_akhir)
                                    / {{ $row->tanggal_akhir }}
                                @endif
                            </td>
                            <td>{{ $row->shift_kerja }}</td>
                            <td>
                                @if(is_array($row->kondisi))
                                    @foreach($row->kondisi as $k)
                                        @if($k==1) Absen Masuk <br>@endif
                                        @if($k==2) Absen Tengah <br>@endif
                                        @if($k==3) Absen Pulang <br>@endif
                                    @endforeach
                                @endif
                            </td>
                            <td>{{ $row->petugas_input }}</td>
                            <td>
                                <form action="{{ route('absens.destroy', $row->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-danger"><b>Hapus</b></button>
                                </form>
                                <a href="{{ route('absens.edit', $row->id) }}" class="btn btn-link p-0 m-0 align-baseline"><b>Edit</b></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Data tidak tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>