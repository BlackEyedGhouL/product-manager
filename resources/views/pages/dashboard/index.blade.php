@extends('layouts.app')

@section('content')
    @include('layouts.nav')

    <h3 class="mx-4 mt-4">Add product</h3>
    <div class="px-4 pt-2">
        <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-2">
                <label for="productName" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="productName" required>
            </div>
            <div class="mb-2">
                <label for="productPrice" class="form-label">Price</label>
                <input type="number" name="price" min="0.00" max="10000.00" step="0.01" class="form-control"
                    id="productPrice" required>
            </div>
            <div class="mb-4">
                <label for="productImage" class="form-label">Image</label>
                <input class="form-control" name="image" type="file" id="productImage" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h3 class="mx-4 mt-4">Product list</h3>
    <div class="px-4 pt-2 pb-4">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>
                            <img src="{{ asset($product->image) }}" width="80" height="50"
                                class="img img-responsive" />
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>
                            @if ($product->status == 'active')
                                <span class="badge text-bg-success">Active</span>
                            @else
                                <span class="badge text-bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('dashboard.delete', $product->id) }}" class="btn btn-danger"><i
                                    class="fa-regular fa-trash-can"></i></a>
                            <a href="{{ route('dashboard.status', $product->id) }}" class="btn btn-success"><i
                                    class="fa-solid fa-check"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"
                                    onclick="productEditModel({{ $product->id }})"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="productEdit" tabindex="-1" aria-labelledby="productEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productEditLabel">Edit product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="productEditContent">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function productEditModel(product_id) {
            var data = {
                product_id: product_id
            };
            $.ajax({
                url: "{{ route('dashboard.edit') }}",
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
                },
                type: 'GET',
                dataType: '',
                data: data,
                success: function(response) {
                    $('#productEdit').modal('show');
                    $('#productEditContent').html(response);
                }
            });
        }
    </script>
@endpush
