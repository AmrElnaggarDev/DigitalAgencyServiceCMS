@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>Replies</h1>
        </div>
    </div>

    <div class="card-custom-p5">
        <table id="dataTable" class="table-dt">
            <thead>
            <tr>
                <th>SL</th>
                <th>Comment</th>
                <th>Name</th>
                <th>Type</th>
                <th>Reply</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Str::limit($reply->comment->comment ?? 'N/A', 40) }}</td>
                    <td>{{ $reply->name }}</td>
                    <td>{{ $reply->person_type }}</td>
                    <td>{{ Str::limit($reply->reply, 80) }}</td>
                    <td>
                        @if($reply->status == 'Approved')
                            <span class="badge bg-success">Approved</span>
                        @elseif($reply->status == 'Rejected')
                            <span class="badge bg-danger">Rejected</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </td>
                    <td>
                        @if($reply->status != 'Approved')
                            <form action="{{ route('admin.reply.approve', $reply->id) }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                            </form>
                        @endif
                        @if($reply->status != 'Rejected')
                            <form action="{{ route('admin.reply.reject', $reply->id) }}" method="post" class="d-inline mt-1">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">Reject</button>
                            </form>
                        @endif
                        <form action="{{ route('admin.reply.destroy', $reply->id) }}" method="post" class="d-inline mt-1">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this reply?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
