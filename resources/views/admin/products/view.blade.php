<div class="container" style="padding: 20px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); max-width: 1000px; margin: 50px auto;">
    <h1 style="font-size: 32px; font-weight: bold; text-align: center; margin-bottom: 20px;">Products</h1>

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
        <thead>
            <tr style="background-color: #6706ef; color: white;">
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Product ID</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Name</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Price</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Product Description</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Category ID</th>
                <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $item)
            <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $item->id }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $item->name }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $item->price }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $item->description }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">{{ $item->category_id }}</td>
                <td style="padding: 12px; border: 1px solid #ddd;">
                    <!-- Edit button -->
                    <a href="{{ route('products.edit', $item->id) }}" class="btn btn-warning" style="padding: 8px 16px; background-color: #6706ef; border: none; color: white; text-decoration: none; border-radius: 4px;">Edit</a>

                    <!-- Delete button -->
                    <form action="{{ route('products.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 8px 16px; background-color: #6706ef; border: none; color: white; border-radius: 4px;" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach 

            @if($products->isEmpty())
            <tr>
                <td colspan="6" style="padding: 12px; text-align: center; border: 1px solid #ddd;">No products found.</td>
            </tr>
            @endif
        </tbody>
    </table>

    <a href="{{ url('/dashboard') }}" class="btn btn-secondary" style="padding: 10px 20px; background-color: #6706ef; border: none; border-radius: 5px; color: white;">Back</a>
</div>
