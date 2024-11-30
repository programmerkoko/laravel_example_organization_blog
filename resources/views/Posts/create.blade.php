@extends("layouts.app")
@section("content")

<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Write Your Thoughts</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('create') }}">
                @csrf

                <input type="hidden" name="user_id" value="{{ auth()->id() }}" required>

                <!-- Title input -->
                <div class="mb-3">
                    <label for="np" class="form-label">Title of Your Post</label>
                    <input type="text" class="form-control" name="title" id="np" placeholder="Enter the title" required>
                </div>

                <!-- Content input -->
                <div class="mb-3">
                    <label for="paragraph" class="form-label">Write Your Thoughts</label>
                    <textarea class="form-control" name="content" id="paragraph" rows="5" placeholder="Share your thoughts here" required></textarea>
                </div>

                <!-- Hidden input for writer -->
                <input type="hidden" name="writer" value="{{ auth()->user()->name }}" required>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary w-100">Publish</button>
            </form>
        </div>
    </div>
</div>

@endsection
