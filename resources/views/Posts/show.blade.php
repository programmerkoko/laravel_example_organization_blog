@extends("layouts.app")
@section("content")

@if(session("info"))
    <div class="alert alert-success">
        {{ session("info") }}
    </div>
@endif

<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Whiteboard</h3>
        </div>

        <div class="card-body">
            @foreach ($data as $output)
                <div class="mb-4 p-3 border rounded">
                    <h5 class="card-title">{{ $output->title }}</h5>
                    <p class="text-muted">
                        Uploaded by <strong>{{ $output->writer }}</strong> |
                        Posted {{ $output->created_at->diffForHumans() }}
                        @if($output->updated_at)
                        | Updated: {{ $output->updated_at->diffForHumans() }}
                    @endif
                    </p>
                    <div>
                        <a href="{{ url("/details/{$output->id}") }}" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i> Read this
                        </a>
                        @can("post-update", $output)
                            <a href="{{ url("/delete/{$output->id}") }}" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Delete
                            </a>
                            <a href="{{ route("edit", ["id" => $output->id]) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $data->links("pagination::bootstrap-4") }}
    </div>
</div>
@endsection
