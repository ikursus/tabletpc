@extends('induk')
    
@section('content')


    <h1>Halaman Semakan ID: {{ $id }}</h1>
    <p>No ID Permohonan adalah {{ $id }}</p>
    <p>{{ $input_nama }}</p>
    <p>{!! $input_nama !!}</p>

    <?php

    $warna = 'merah';

    if ($warna == 'merah')
    {
        echo 'Saya suka warna merah';
    }
    else
    {
        echo 'saya mahu warna merah';
    }

    ?>

    @php
    $warna = 'pink'
    @endphp

    @if($warna == 'biru')
    Saya suka Warna biru
    @else
    Saya Mahu warna biru
    @endif

    


@endsection    
    