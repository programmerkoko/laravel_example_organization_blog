@extends("layouts.app")

@section("content")
<div class="container mt-5">
    <h3 class="text-center mb-4 text-primary">Edit Your Post</h3>

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('update', ['id' => $data->id]) }}">
                @csrf
                @method('PUT')

                <!-- Writer -->
                <div class="mb-3">
                    <label for="author" class="form-label fw-bold">Writer</label>
                    <input
                        type="text"
                        class="form-control form-control-lg"
                        name="writer"
                        id="author"
                        value="{{ $data->writer }}"
                        placeholder="Enter the writer's name"
                        required>
                </div>

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <input
                        type="text"
                        class="form-control form-control-lg"
                        name="title"
                        id="title"
                        value="{{ $data->title }}"
                        placeholder="Enter the title of the post"
                        required>
                </div>

                <!-- Main Post -->
                <div class="mb-3">
                    <label for="body" class="form-label fw-bold">Main Post</label>
                    <textarea
                        class="form-control form-control-lg"
                        name="content"
                        id="body"
                        rows="6"
                        placeholder="Write your post here"
                        required>{{ $data->content }}</textarea>
                </div>

                <input type="hidden" value="{{ $data->user_id }}" name="user_id">
                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Update Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
