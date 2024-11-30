@extends("layouts.app")

@section("content")
<div class="container my-5">
    @if(session("info"))
        <div class="alert alert-success" role="alert">
            {{ session("info") }}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <h5 class="text-primary">{{ $data->title }}</h5>
        </div>

        <div class="card-body">
            <p class="text-dark">{{ $data->content }}</p>
        </div>

        <div class="card-footer text-muted">
            <p>Written by <strong>{{ $data->writer }}</strong></p>
            <p>Posted {{ $data->created_at->diffForHumans() }}
                @if($data->updated_at)
                | Updated: {{ $data->updated_at->diffForHumans() }}
            @endif

            </p>
        </div>
    </div>

    @if($data->comments && $data->comments->isNotEmpty())
        <div class="card mb-4">
            <div class="card-header">
                <h6>Comments ({{ $data->comments->count() }})</h6>
            </div>
            <div class="card-body">
                @foreach ($data->comments as $feedback)
                    <div class="mb-3 border-bottom pb-2">
                        <p>
                            <strong>{{ $feedback->user->name ?? "Anonymous User" }}</strong> commented
                            <span class="text-muted">{{ $feedback->created_at->diffForHumans() }}</span>
                        </p>
                        <p>{{ $feedback->feedback }}</p>
                        @can('delete', $feedback)
                            <a href="{{ route("deletecomment", ["id" => $feedback->id]) }}" class="btn btn-sm btn-danger">
                                Remove this comment
                            </a>
                            <br>
                            <a class="btn-warning" href="{{ route("editcomment", ["id"=>$feedback->id]) }}">Edit this comment</a>
                        @endcan
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            No comments yet.
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h6>Add a Comment</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ url("/addcomment") }}">
                @csrf
                <input type="hidden" name="post_id" value="{{ $data->id }}" required>
                <input type="hidden" name="user_id" value="{{ auth()->id() }}" required>

                <div class="mb-3">
                    <label for="fb" class="form-label">Write your personal view</label>
                    <textarea id="fb" name="feedback" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Submit Feedback</button>
            </form>
        </div>
    </div>
</div>
@endsection
