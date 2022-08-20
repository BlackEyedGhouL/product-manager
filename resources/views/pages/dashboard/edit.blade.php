<form action="{{ route('dashboard.update', $product->id) }}" method="GET" enctype="multipart/form-data">
    @csrf
    <div class="mb-2">
        <label for="productName" class="form-label">Name</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="productName" required>
    </div>
    <div class="mb-4">
        <label for="productPrice" class="form-label">Price</label>
        <input type="number" name="price" value="{{ $product->price }}" min="0.00" max="10000.00" step="0.01"
            class="form-control" id="productPrice" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
