@extends('layout')

@section('content')
    <h1>Tambah Klien</h1>
    <form action="/create-client" method="post">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Klien</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
        </div>
        <div class="mb-3">
            <label for="perusahaan" class="form-label">Nama Perusahaan</label>
            <input type="text" class="form-control" id="perusahaan" name="perusahaan" placeholder="perusahaan" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" placeholder="alamat" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">No. HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No. HP" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
