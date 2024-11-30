@extends("layouts.app")
@section("content")

@if (session('info'))
    <div class="alert alert-success">
        {{ session('info') }}
    </div>
@endif

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Edit Your Comment</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('commentupdate', ['id' => $edit->id]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="content" class="form-label">Your Comment:</label>
                            <textarea
                                name="feedback"
                                id="content"
                                class="form-control @error('feedback') is-invalid @enderror"
                                rows="5"
                                required>{{ old('feedback', $edit->feedback) }}</textarea>
                            @error('feedback')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="post_id" value="{{ $edit->post_id }}">
                        <input type="hidden" name="user_id" value="{{ $edit->user_id }}">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success me-2">Confirm Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
