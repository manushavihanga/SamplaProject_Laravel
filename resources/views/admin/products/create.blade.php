<div class="container" style="max-width: 600px; margin: 50px auto; padding: 20px; background-color: #f8f9fa; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2 style="font-weight: bold; margin-bottom: 20px;">Add Products</h2>
    
    <form action="{{ route('products.store') }}" method="POST">
        @csrf  
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="name" style="font-weight: bold;">Product</label>
            <select id="name" name="name" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;" onchange="setCategoryId()">
                <option value="">Select Product</option>
                <option value="Chair" {{ old('name') == 'Chair' ? 'selected' : '' }}>Chair</option>
                <option value="Bed" {{ old('name') == 'Bed' ? 'selected' : '' }}>Bed</option>
                <option value="Shirt" {{ old('name') == 'Shirt' ? 'selected' : '' }}>Shirt</option>
                <option value="Short" {{ old('name') == 'Short' ? 'selected' : '' }}>Short</option>
                <option value="Ring" {{ old('name') == 'Ring' ? 'selected' : '' }}>Ring</option>
                <option value="Table" {{ old('name') == 'Table' ? 'selected' : '' }}>Table</option>
                <option value="TV" {{ old('name') == 'TV' ? 'selected' : '' }}>TV</option>
                <option value="Radio" {{ old('name') == 'Radio' ? 'selected' : '' }}>Radio</option>
            </select>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <script>
            // JavaScript function to set the category_id based on the selected product name
            function setCategoryId() {
                const productSelect = document.getElementById('name'); // Get the product select element
                const categoryIdInput = document.getElementById('category_id'); // Get the category_id input element
                
                // Map of product names to their corresponding category IDs
                const categoryMap = {
                    'Chair': 'FUR2019',
                    'Bed': 'FUR2019',
                    'Shirt': 'CLO2019',
                    'Short': 'CLO2019',
                    'Ring': 'JEW2019',
                    'Table': 'FUR2019',
                    'TV': 'ELE2019',
                    'Radio': 'ELE2019'
                };
                
                // Get the selected product name
                const selectedProduct = productSelect.value;
        
                // Set the category_id based on the selected product
                categoryIdInput.value = categoryMap[selectedProduct] || ''; // Empty string if no product is selected
            }
        </script>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="price" style="font-weight: bold;">Price</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
            @error('price')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="description" style="font-weight: bold;">Description</label>
            <textarea id="description" name="description" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">{{ old('description') }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="category_id" style="font-weight: bold;">Category ID</label>
            <input type="text" id="category_id" name="category_id" value="{{ old('category_id') }}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;" readonly>
            @error('category_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="padding: 10px 20px; background-color: #007bff; border: none; border-radius: 5px; color: white;">Save</button>
        <a href="{{ url('/dashboard') }}" class="btn btn-secondary" style="padding: 10px 20px; margin-left: 10px; background-color: #6c757d; border: none; border-radius: 5px; color: white;">Back</a>
    </form>
</div>
