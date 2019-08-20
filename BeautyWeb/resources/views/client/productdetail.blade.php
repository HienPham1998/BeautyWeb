@extends('client.app');
@section('content')
<div class="main main-raised">
    <div class="container">
        <div class="section">
            <h2>Product detail</h2>
            <div class="container">
                <!-- column left -->
                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">

                    <div class="row">
                        <div class=" image col-12 col-sm-12 col-md-4 col-lg-4 col-sl-4">
                            <img src="{{$product->image}}" alt="">
                        </div>
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-sl-8">
                            <div class="pro-item">
                                <p class="pro-item-title">
                                    Product name : <b>{{$product->name}}</b>
                                </p>
                            </div>
                            <div class="pro-item-price">
                            Price : <b> $ {{$product->unit_price}}</b>
                            </div>
                            
                          <div class="mt-2">  Quantity : <b>{{$product->quantity}}</b></div>
                                        
                            <div class="pro-item-option">
                                @if(Auth::user())
                                <a href="/buynow/{{$product->id}}" class="btn btn-primary my-4">Buy now</a>

                                @else
                                <button class="btn btn-primary my-4 " data-toggle="modal" data-target="#ModalLogin">
                                    Buy now
                                </button>
                                @endif
                            </div>
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shield-check" style="width: 24px"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                class="svg-inline--fa fa-shield-check fa-w-16 fa-3x">
                                <path fill="currentColor"
                                    d="M466.5 83.7l-192-80a48.15 48.15 0 0 0-36.9 0l-192 80C27.7 91.1 16 108.6 16 128c0 198.5 114.5 335.7 221.5 380.3 11.8 4.9 25.1 4.9 36.9 0C360.1 472.6 496 349.3 496 128c0-19.4-11.7-36.9-29.5-44.3zm-47.2 114.2l-184 184c-6.2 6.2-16.4 6.2-22.6 0l-104-104c-6.2-6.2-6.2-16.4 0-22.6l22.6-22.6c6.2-6.2 16.4-6.2 22.6 0l70.1 70.1 150.1-150.1c6.2-6.2 16.4-6.2 22.6 0l22.6 22.6c6.3 6.3 6.3 16.4 0 22.6z"
                                    class=""></path>
                            </svg>
                            Guaranteed  :  3 days to return
                        </div>
                    </div>

                    <div class="woocommerce-tabs mt-4">

                        <h4>Product Description</h4>


                        <div class="panel" id="tab-description" style="display: block;">
                            <p>{{$product->description}}</p>
                        </div>

                    </div>
                </div>
                <!-- column right -->
                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"></div>
            </div>
        </div>
    </div>
</div>
<!-- modal login-->

<div class="modal" id="ModalLogin" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Please log in Or register <a href="/register">here</a></h4>
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
