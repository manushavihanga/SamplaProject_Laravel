<div class="container" style="padding: 20px; background-color: #f9f9f9; border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); max-width: 900px; margin: 50px auto;">
    <h1 style="font-size: 28px; font-weight: bold; text-align: center; margin-bottom: 20px;">Products in {{ $category->name }}</h1>
    
    @if($category->products->isEmpty())
        <p style="text-align: center; font-size: 18px; color: #555;">No products available for this category.</p>
    @else
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <thead>
                <tr style="background-color: #007bff; color: white;">
                    <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Product Name</th>
                    <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Price</th>
                    <th style="padding: 12px; border: 1px solid #ddd; text-align: left;">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category->products as $product)
                <tr style="background-color: #f9f9f9; border-bottom: 1px solid #ddd;">
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $product->name }}</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $product->price }}</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $product->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    <a href="{{ url()->previous() }}" class="btn btn-primary" style="padding: 10px 20px; background-color: #007bff; border: none; border-radius: 5px; color: white; text-decoration: none;">Back to Categories</a>
</div>
