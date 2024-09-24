<div class="container">
    <h1>Categories</h1>
    
    <table>
        <thead>
            <tr>
                <th>Category ID</th> <!-- Fixed the column name -->
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th> <!-- Added Actions column header -->
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $item)
            <tr>
                <td>{{ $item->category_id }}</td> <!-- Corrected the access to category_id -->
                <td>{{ $item->name }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    <!-- Edit button -->
                    <a href="{{ route('categories.edit', $item->category_id) }}" class="btn btn-warning">Edit</a>

                    <!-- Delete button (with form) -->
                    <form action="{{ route('categories.destroy', $item->category_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE') <!-- This makes the form a DELETE request -->
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach 

            @if($categories->isEmpty())
            <tr>
                <td colspan="4">No categories found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
