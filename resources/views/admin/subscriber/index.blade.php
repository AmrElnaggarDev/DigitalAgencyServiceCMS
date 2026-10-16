@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>Subscribers</h1>
        </div>
        <a href="{{ route('admin.subscriber.export_csv') }}" class="btn-admin-primary">
            <i class="fa-solid fa-download me-1"></i>Download Active CSV
        </a>
    </div>

    <div class="card-custom-p5">
        <table id="dataTable" class="table-dt">
            <thead>
            <tr>
                <th>SL</th>
                <th>Email</th>
                <th>Status</th>
                <th>Subscribed At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subscribers as $subscriber)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subscriber->email }}</td>
                    <td>
                        @if($subscriber->status == 'Active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </td>
                    <td>{{ $subscriber->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <form action="{{ route('admin.subscriber.destroy', $subscriber->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this subscriber?');">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
