@extends('layouts.template')

@section('content')



    <div class="card row mt-5 mb-5">
        <div class="card-header bg-primary text-white col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Transaksi</h2>
            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="card-body">
        <table class="table table-bordered">
            <tr class="bg-light text-dark">
                <th width="20px" class="text-center">#</th>
                <th>ID TRX</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor</th>
                <th>Total Transaksi</th>
                <th>Status</th>
                <th width="280px" class="text-center">Action</th>
            </tr>
            @forelse ($items as $item)
                <tr>
                    <td class="text-center">{{ ++$i }}</td>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>${{ $item->transaction_total }}</td>
                    <td>
                        @if ($item->transaction_status == 'PENDING')
                            <span class="badge bg-info">
                            @elseif($item->transaction_status == 'SUCCESS')
                                <span class="badge badge-success">
                                @elseif($item->transaction_status == 'FAILED')
                                    <span class="badge badge-warning">
                                    @else
                                        <span>
                        @endif
                        {{ $item->transaction_status }}
                        </span>
                    </td>
                    <td>
                        @if ($item->transaction_status == 'PENDING')
                            <a href="{{ route('transactions.status', $item->id) }}?status=SUCCESS"
                                class="btn btn-success btn-sm">
                                <i class="fa fa-check"></i>
                            </a>
                            <a href="{{ route('transactions.status', $item->id) }}?status=FAILED"
                                class="btn btn-warning btn-sm">
                                <i class="fa fa-times"></i>
                            </a>
                        @endif
                        <a href="#mymodal" data-remote="{{ route('transactions.show', $item->id) }}" data-toggle="modal"
                            data-target="#mymodal" data-title="Detail Transaksi {{ $item->uuid }}"
                            class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('transactions.edit', $item->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <form action="{{ route('transactions.destroy', $item->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center bg-secondary p-5">
                        <strong>Data tidak tersedia</strong>
                    </td>
                </tr>
            @endforelse
        </table>
    </div>

@endsection
