@extends('induk')

@section('content')

<p>
    <a href="/semakan/baru" class="btn btn-primary">Hantar Permohonan</a>
</p>

    <table class="table">
        <thead>
            <th>PENGIRIM BORANG</th>
            <th>NAMA PEMOHON</th>
            <th>JAWATAN PEMOHON</th>
            <th>JABATAN PEMOHON</th>
            <th>JENIS TABLET</th>
            <th>HARGA BELIAN</th>
            <th>TARIKH BELIAN</th>
            <th>TINDAKAN</th>
        </thead>
        <tbody>
            @foreach($senaraiPermohonan as $item)
            <tr>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->nama_pemohon }}</td>
                <td>{{ $item->jawatan_pemohon }}</td>
                <td>{{ $item->jabatan_pemohon }}</td>
                <td>{{ $item->jenis_tablet }}</td>
                <td>{{ $item->harga_belian }}</td>
                <td>{{ $item->tarikh_belian }}</td>
                <td>
                    <a href="/semakan/{{ $item->id }}" class="btn btn-info">
                        EDIT
                    </a>
                    
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $item->id }}">
                            DELETE
                        </button>
                    

                    <!-- Button trigger modal -->
                    <!-- Modal -->
                    <div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            
                            <form method="POST" action="/semakan/{{ $item->id }}">
                                @csrf
                                @method('DELETE')

                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Pengesahan Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Adakah anda bersetuju untuk menghapuskan data {{ $item->id }}
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Confirm</button>
                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>  

    {!! $senaraiPermohonan->links() !!}
@endsection