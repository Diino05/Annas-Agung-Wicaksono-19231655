<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input Absen Bermasalah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: #f4f6f9">
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header bg-danger text-white">
                <h5>INPUT ABSEN BERMASALAH</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('absens.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>No Keterangan</label>
                            <input type="text" name="no_keterangan" class="form-control" value="{{ old('no_keterangan') }}" required>
                            <small class="text-danger">Contoh : C1-20191220-01</small>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tanggal Awal</label>
                            <input type="date" name="tanggal_awal" class="form-control" value="{{ old('tanggal_awal') }}" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" class="form-control" value="{{ old('tanggal_akhir') }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Keterangan Absen Bermasalah</label>
                            <input type="text" name="keterangan" class="form-control" value="{{ old('keterangan') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Lokasi Kampus*</label>
                            <select name="lokasi_kampus" class="form-control" required>
                                <option value="">-- Pilih Lokasi --</option>
                                @foreach($lokasiList as $lokasi)
                                    <option value="{{ $lokasi }}" {{ old('lokasi_kampus')==$lokasi?'selected':'' }}>{{ $lokasi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Pilih Shift Kerja*</label>
                            <select name="shift_kerja" class="form-control" required>
                                <option value="">-- Pilih Shift --</option>
                                @foreach($shiftList as $shift)
                                    <option value="{{ $shift }}" {{ old('shift_kerja')==$shift?'selected':'' }}>{{ $shift }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pilih Kondisi</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="kondisi[]" value="1" id="kondisi1" {{ is_array(old('kondisi')) && in_array(1, old('kondisi')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="kondisi1">[1] Absen Masuk</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="kondisi[]" value="2" id="kondisi2" {{ is_array(old('kondisi')) && in_array(2, old('kondisi')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="kondisi2">[2] Absen Tengah</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="kondisi[]" value="3" id="kondisi3" {{ is_array(old('kondisi')) && in_array(3, old('kondisi')) ? 'checked' : '' }}>
                                <label class="form-check-label" for="kondisi3">[3] Absen Pulang</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Petugas Input</label>
                            <select name="petugas_input" class="form-control" required>
                                <option value="">-- Pilih Petugas --</option>
                                @foreach($petugasList as $petugas)
                                    <option value="{{ $petugas }}" {{ old('petugas_input')==$petugas?'selected':'' }}>{{ $petugas }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('absens.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>