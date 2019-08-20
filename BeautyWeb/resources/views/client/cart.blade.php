@extends("client.app")

@section('content')
<div class="col-lg-6" id="cart">
    <div class="card">
        <div class="card-header card-header-warning">
            Yours Cart
        </div>
        <div class="card-body table-responsive">
            <table class="table table-hover">
                <thead class="text-warning">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                    <tr>
                        <td class="row">
                            <img src="{{ $product->options->image }}" alt="" class="col-sm-3">
                            <p class="col-sm-9">{{ $product->name }}</p>
                        </td>
                        @if($product->options->promotion_price == 0)
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->price * $product->qty }}</td>
                        @else
                        <td>{{ $product->options->promotion_price }}</td>
                        <td>{{ $product->qty }}</td>
                        <td>{{ $product->options->promotion_price * $product->qty }}</td>
                        @endif
                        <td class="td-actions text-right">
                            <form action="remove-from-cart/{{$product->rowId}}" method="get">
                                @csrf
                                <button type="submit" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm"
                                    data-original-title="Remove">
                                    <i class="material-icons">close</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class=" ml-auto mr-auto text-center">
                        @if(Auth::user())
                            <button class="btn btn-primary " data-toggle="modal" data-target="#myModal">
                            Buy now
                            </button>
                                        
                                @else
                                <button class="btn btn-primary " data-toggle="modal" data-target="#ModalLogin">
                                    Buy now
                                </button>
                                @endif
                   
              
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal infocustomer -->
<div class="modal" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <form action="addAddress" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Add the shipping address</h5>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <label>Name </label>
                                                <input type="text" name="name" class="form-control" placeholder="Name">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" class="form-control"
                                                    placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 pr-1">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- modal login-->

<div class="modal" id="ModalLogin" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Please log in Or register <a href="/register" style="color:red">here</a></h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="/login" class="btn btn-primary">Login now</a>
            </div>

        </div>

    </div>
</div>
@endsection
