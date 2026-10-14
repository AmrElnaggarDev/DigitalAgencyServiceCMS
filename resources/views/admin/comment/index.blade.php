@extends('admin.layouts.master')

@section('content')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div class="page-heading mb-0">
            <h1>Comments</h1>
        </div>
    </div>

    <div class="card-custom-p5">
        <table id="dataTable" class="table-dt">
            <thead>
            <tr>
                <th>SL</th>
                <th>Post</th>
                <th>Name</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $comment->post->title ?? '' }}</td>
                    <td>{{ $comment->name }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ Str::limit($comment->comment, 80) }}</td>
                    <td>
                        @if($comment->status == 'Approved')
                            <span class="badge bg-success">Approved</span>
                        @elseif($comment->status == 'Rejected')
                            <span class="badge bg-danger">Rejected</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </td>
                    <td>
                        @if($comment->status != 'Approved')
                            <form action="{{ route('admin.comment.approve', $comment->id) }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                            </form>
                        @endif
                        @if($comment->status != 'Rejected')
                            <form action="{{ route('admin.comment.reject', $comment->id) }}" method="post" class="d-inline mt-1">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">Reject</button>
                            </form>
                        @endif
                        <form action="{{ route('admin.comment.destroy', $comment->id) }}" method="post" class="d-inline mt-1">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this comment?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
