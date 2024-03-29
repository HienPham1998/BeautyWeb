@extends('admin.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header rounded card-header-primary">
                    <h3 class="card-title text-white">Bill Detail</h3>
                </div>
                <div class="card-body">
                    <!-- <a class="btn btn-primary btn-round" href="products/create">
                        Add Product
                    </a> -->
                    @if(session()->has("success"))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                        </button>
                        <span> {{ session("success") }}</span>
                    </div>
                    @endif
                    @include("common.errors")
                    <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                            <th>
                                    Bill id
                                </th>
                                <th>
                                    Product name
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <!-- <th>Options</th> -->

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($detail as $detail)
                            <tr>

                                <td>
                                    
                                    {{ $detail->bill_id }}

                                </td>

                                <td>
                                    {{ $detail->product_name }}
                                </td>
                                <td>
                                    $ {{ $detail->price }}
                                </td>
                                <td >
                                     {{$detail->quantity }}
                                </td>
            

                            <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <!-- <button type="button" class="btn btn-primary btn-link btn-sm px-2 btn-edit"
                                                data-href="billdetail/update/{{ $detail->id }}"><i
                                                    class="material-icons">edit</i></button>
                                            <button type="button" class="btn btn-danger btn-link btn-sm px-2"
                                                data-toggle="modal" data-target="#modalDelete{{$detail->id}}"><i
                                                    class="material-icons">close</i></button> -->
                                            
                                            <!-- Modal -->
                                            <div id="modalDelete{{$detail->id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="display: block;">
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;
                                                            </button>
                                                            <h4 class="modal-title">Delete</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure to delete?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="bills/destroy/{{ $detail->id }}" method="post">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                                <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Cancel
                                                                </button>
                                                                <button type="submit" class="btn btn-danger">Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                   @endforeach 
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal edit -->
<!-- <div class="modal" id="editModal" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <form id="editForm" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Update Product</h5>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="margin-top:0; margin-bottom:0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <label>Name Product</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Name product">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <label>Category Id</label>
                                                <input type="text" name="category_id" class="form-control"
                                                    placeholder="Category Id">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <label>Provider Id</label>
                                                <input type="text" name="provider_id" class="form-control"
                                                    placeholder="Provider Id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <label>Promotion Price</label>
                                                <input type="text" name="promotion_price" class="form-control"
                                                    placeholder="Promotion Price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <label>Unit Price</label>
                                                <input type="text" name="unit_price" class="form-control"
                                                    placeholder="Unit Price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input type="text" name="quantity" class="form-control"
                                                    placeholder="Quantity">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="text" name="image" class="form-control"
                                                    placeholder="Image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input type="text" name="description" class="form-control"
                                                    placeholder="Description">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer" style="padding:1rem 0.5rem">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div> -->

          
            @endsection

            @push('scripts')
            <script>
                // Click edit button
                $('.btn-edit').click(function (e) {
                    e.preventDefault();
                    resetFormModal($(this).data('href'));

                    // Fill default value
                    var row = $(this).parent().parent().parent();
                    var col = row.find('td');
                    console.log(row);
                    console.log(col);
                    // $('#editForm input[name="name"]').val(col[1].innerText.trim());
                    // $('#editForm input[name="category_id"]').val(col[2].innerText);
                    // $('#editForm input[name="provider_id"]').val(col[3].innerText);
                    // $('#editForm input[name="promotion_price"]').val(col[4].innerText);
                    // $('#editForm input[name="unit_price"]').val(col[5].innerText);
                    // $('#editForm input[name="quantity"]').val(col[6].innerText);
                    // $('#editForm input[name="image"]').val(col[7].innerText);
                    // $('#editForm input[name="description"]').val(col[8].innerText);

                    $('#editModal').modal({
                        backdrop: 'static',
                        show: true
                    });
                });
            </script>
            @endpush