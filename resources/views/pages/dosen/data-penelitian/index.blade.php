@extends('layouts.admin')

@section('content')
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penelitian</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Penelitian</li>
        </ol>
    </div>

    <div class="card">
        <div class="card-body">
            <a href="{{ route('penelitian.create') }}" class="btn btn-primary mb-3">Tambah Data Penelitian</a>
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Anggota 1</th>
                            <th>Anggota 2</th>
                            <th>Status</th>
                            <th>Pesan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->nama }}</td>
                            <td>{{ $item->anggota_1 }}</td>
                            <td>{{ $item->anggota_2 }}</td>
                            <td>{{ $item->status }}</td>
                            @if ($item->pesan)
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#staticBackdrop2{{ $item->id }}">
                                    Lihat Pesan
                                </button>
                            </td>
                            @else
                                <td>-</td>
                            @endif
                            <td>
                                <a href="{{ route('penelitian.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop{{ $item->id }}">
                                    Lihat
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->

@foreach ($items as $item2)
<div class="modal fade" id="staticBackdrop{{ $item2->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $item2->judul_program }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="{{ $item2->link_jurnal }}" target="_blank">Link Jurnal</a><br>
                <a href="{{ $item2->link_luaran_1 }}" target="_blank">Link Tambahan</a><br>
                @if ($item2->link_luaran_2)
                    <a href="{{ $item2->link_luaran_2 }}" target="_blank">Link Tambahan 2</a>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($items as $item3)
<div class="modal fade" id="staticBackdrop2{{ $item3->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $item3->judul_program }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Pesan</p>
                <p>
                    {{ $item2->pesan }}
                </p>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
