@props([
    'galleryAlbum' => null, // For edit mode
    'clients' => [], // List of clients (optional)
])

<form action="{{ $galleryAlbum ? route('gallery-albums.update', $galleryAlbum->id) : route('gallery-albums.store') }}"
      method="POST" enctype="multipart/form-data">
    @csrf
    @if ($galleryAlbum)
        @method('PUT')
    @endif

    <!-- Title -->
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control"
               value="{{ old('title', $galleryAlbum?->title) }}" required>
    </div>

    <!-- Type -->
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select name="type" id="type" class="form-select">
            @foreach (['image', 'video', 'pdf', 'other'] as $type)
                <option value="{{ $type }}"
                    {{ old('type', $galleryAlbum?->type) === $type ? 'selected' : '' }}>
                    {{ ucfirst($type) }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Client (optional) -->
    <div class="mb-3">
        <label for="client_id" class="form-label">Client (Optional)</label>
        <select name="client_id" id="client_id" class="form-select">
            <option value="">Select Client</option>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}"
                    {{ old('client_id', $galleryAlbum?->client_id) == $client->id ? 'selected' : '' }}>
                    {{ $client->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- File Upload -->
    <div class="mb-3">
        <label for="file" class="form-label">Upload File</label>
        <input type="file" name="file" id="file" class="form-control">
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">
        {{ $galleryAlbum ? 'Update Album' : 'Create Album' }}
    </button>
</form>
