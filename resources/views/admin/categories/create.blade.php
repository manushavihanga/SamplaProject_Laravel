<div class="container" style="max-width: 600px; margin: 50px auto; padding: 20px; background-color: #f8f9fa; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2 style="font-weight: bold; margin-bottom: 20px;">Add Categories</h2>
    
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf <!-- CSRF token for security -->
        
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="category" style="font-weight: bold;">Category Name</label>
            <select id="category" name="category" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;" onchange="setCategoryId()">
                <option value="">Select Category</option>
                <option value="Furniture" {{ old('category') == 'Furniture' ? 'selected' : '' }}>Furniture</option>
                <option value="Jewellery" {{ old('category') == 'Jewellery' ? 'selected' : '' }}>Jewellery</option>
                <option value="Clothes" {{ old('category') == 'Clothes' ? 'selected' : '' }}>Clothes</option>
                <option value="Electronics" {{ old('category') == 'Electronics' ? 'selected' : '' }}>Electronics</option>
            </select>
            @error('category') <!-- Display validation error for category -->
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Field to display the category_id -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="category_id" style="font-weight: bold;">Category ID</label>
            <input type="text" id="category_id" name="category_id" value="{{ old('category_id') }}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;" readonly>
            @error('category_id') <!-- Display validation error for category_id -->
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <script>
            // JavaScript function to set the category_id based on the selected category name
            function setCategoryId() {
                const categorySelect = document.getElementById('category');
                const categoryIdInput = document.getElementById('category_id');
                
                // Map of category names to their corresponding IDs
                const categoryMap = {
                    'Furniture': 'FUR2019',
                    'Jewellery': 'JEW2019',
                    'Clothes': 'CLO2019',
                    'Electronics': 'ELE2019'
                };
                
                // Get the selected category name
                const selectedCategory = categorySelect.value;
        
                // Set the category_id based on the selected category
                categoryIdInput.value = categoryMap[selectedCategory] || ''; // Empty string if no category is selected
            }
        </script>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="description" style="font-weight: bold;">Description</label>
            <textarea id="description" name="description" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">{{ old('description') }}</textarea>
            @error('description') <!-- Display validation error for description -->
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="padding: 10px 20px; background-color: #007bff; border: none; border-radius: 5px; color: white;">Save</button>
        <a href="{{ url('/dashboard') }}" class="btn btn-secondary" style="padding: 10px 20px; margin-left: 10px; background-color: #6c757d; border: none; border-radius: 5px; color: white;">Back</a>
    </form>
</div>
