@extends('sb-admin.app')
@section('title', 'Edit Store Banner Promotion')
@section('bannerStore', 'active')
@section('banner', 'show')
@section('banner-active', 'active')

@section('content')

    <h1 class="grey">Edit Store Banner Promotion</h1>
    {{-- EDIT --}}

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('bannerCategory.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                {{-- Category--}}
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" class="form-control form-select">
                        <option value="{{ old('category') ? old('category') : $category->category_id }}">{{ old('category') ? old('category') : $category->name }}</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- DESC --}}
                <div class="mb-3">
                    <label for="editor" class="form-label ">Description</label>
                    <textarea name="desc" class="form-control" id="editor">{{ old('desc') ? old('desc') : $banner->desc }}</textarea>
                    @error('desc')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                {{-- image --}}
                <div class="form-group mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="/admin-foresell/list/banner-category" class="btn btn-secondary">kembali</a>
            </form>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                fontFamily: {
                    options: [
                        'default',
                        'Ubuntu, Arial, sans-serif',
                        'Ubuntu Mono, Courier New, Courier, monospace'
                    ]
                },
                toolbar: [
                    'heading', 'fontFamily', 'bold', 'italic', 'undo', 'redo'
                ]
            })

            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
