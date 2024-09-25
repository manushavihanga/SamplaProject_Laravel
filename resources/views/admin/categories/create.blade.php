

<!--
<div class="container" style="max-width: 600px; margin: 50px auto; padding: 20px; background-color: #f8f9fa; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2 style="font-weight: bold; margin-bottom: 20px;">Add Categories</h2>
    
    <form action="{{ url('categories/create')}}" method="POST">
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="name" style="font-weight: bold;">Name</label>
            <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
            <span class="text-danger" style="color: #2f0343;">The name field is required.</span>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="description" style="font-weight: bold;">Description</label>
            <textarea id="description" name="description" value="{{old('description')}} class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;"></textarea>
            <span class="text-danger" style="color: #2f0343;">The description field is required.</span>
        </div>

       
        <button type="submit" class="btn btn-primary" style="padding: 10px 20px; background-color: #007bff; border: none; border-radius: 5px; color: white;">Save</button>
        <a href="{{ url('categories')}}" class="btn btn-secondary" style="padding: 10px 20px; margin-left: 10px; background-color: #6c757d; border: none; border-radius: 5px; color: white;">Back</a>
    </form>
</div>

-->



 


<div class="container" style="max-width: 600px; margin: 50px auto; padding: 20px; background-color: #f8f9fa; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
    <h2 style="font-weight: bold; margin-bottom: 20px;">Add Categories</h2>
    
    <form action="{{ url('categories/create')}}" method="POST">
        @csrf  <!-- Add CSRF token for security -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="category_id" style="font-weight: bold;">category_id</label>
            <input type="text" id="category_id" name="category_id" value="{{ old('category_id') }}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
            @error('category_id') <!-- Display validation error for name -->
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="name" style="font-weight: bold;">Category Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">
            @error('name') <!-- Display validation error for name -->
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label for="description" style="font-weight: bold;">Description</label>
            <textarea id="description" name="description" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 5px;">{{ old('description') }}</textarea>
            @error('description') <!-- Display validation error for description -->
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="padding: 10px 20px; background-color: #007bff; border: none; border-radius: 5px; color: white;">Save</button>
        <a href="{{ url('/dashboard') }}" class="btn btn-secondary" style="padding: 10px 20px; margin-left: 10px; background-color: #007bff; border: none; border-radius: 5px; color: white;">Back</a>
    </form>
</div>



