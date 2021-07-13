@extends('induk')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label class="form-label">Nama Pemohon</label>
            <input type="text" class="form-control" name="nama_pemohon" value="{{ $item->nama_pemohon }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Jawatan Pemohon</label>
            <input type="text" class="form-control" name="jawatan_pemohon" value="{{ $item->jawatan_pemohon }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Gred Pemohon</label>
            <input type="text" class="form-control" name="gred_pemohon" value="{{ $item->gred_pemohon }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Jabatan Pemohon</label>
            <input type="text" class="form-control" name="jabatan_pemohon" value="{{ $item->jabatan_pemohon }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Tablet</label>
            <input type="text" class="form-control" name="jenis_tablet" value="{{ $item->jenis_tablet }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Harga Belian</label>
            <input type="number" min="0.00" step="0.01" class="form-control" name="harga_belian" value="{{ $item->harga_belian }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Tarikh Belian</label>
            <input type="date" class="form-control" name="tarikh_belian" value="{{ $item->tarikh_belian }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection