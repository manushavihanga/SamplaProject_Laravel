<div class="container" style="max-width: 600px; margin: 50px auto; padding: 20px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h1 style="font-size: 28px; font-weight: bold; margin-bottom: 20px; text-align: center;">Edit Category</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger" style="margin-bottom: 20px; padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px;">
            <ul style="list-style: none; padding-left: 0;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Category Form -->
    <form action="{{ route('categories.update', $category->category_id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Use PUT method for updating the category -->

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="name" style="font-weight: bold;">Category Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}" required style="padding: 10px; border-radius: 5px; border: 1px solid #ced4da;">
        </div>

        <div class="form-group" style="margin-bottom: 20px;">
            <label for="description" style="font-weight: bold;">Category Description:</label>
            <textarea name="description" class="form-control" required style="padding: 10px; border-radius: 5px; border: 1px solid #ced4da;">{{ old('description', $category->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="padding: 10px 20px; background-color: #007bff; border: none; border-radius: 5px; color: white; cursor: pointer;">Update Category</button>
        <a href="{{ url('categories') }}" class="btn btn-secondary" style="padding: 10px 20px; margin-left: 10px; background-color: #6c757d; border: none; border-radius: 5px; color: white; text-decoration: none; cursor: pointer;">Cancel</a>
    </form>
</div>
