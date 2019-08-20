<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('client/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('client/assets/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Kit by Creative Tim
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('admin/assets/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
    <link href="{{ asset('client/assets/css/material-kit.css?v=2.0.5') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('client/assets/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="landing-page sidebar-collapse">
    <div class="fixed-top ">
        <div class="navbar  navbar-expand-lg navbar-color-on-scroll d-flex flex-column" color-on-scroll="100"
            id="sectionsNav" style="background-color:rgb(217, 132, 145)!important ">
            <div class="container-fluid">
                <div class="navbar-translate">
                    <h3 class="my-logo"><a  href="/" class="text-white">
                        TuHiDu Cosmetics </a>| Bill</h3>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        @if(Auth::user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown"
                                href="javascript:void(0)">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-danger">
                                <a class="dropdown-item" href=""><i class="nc-icon nc-single-02"></i>&nbsp; Profile</a>
                                <a class="dropdown-item" href="blog-posts.html"><i
                                        class="nc-icon nc-bullet-list-67"></i>&nbsp; My posts</a>
                                <a class="dropdown-item" href="/logout"><i class="nc-icon nc-bookmark-2"></i>&nbsp;
                                    Logout</a>
                            </ul>
                        </li>
                        @else

                        <li class="nav-item">
                            <a class="nav-link" href="/login">
                                Log in
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">
                                Sign up
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Contact us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
    </div>

    <div class="col-md-10" style="margin: 150px auto">
        <div class="card card-stats">
            <div class=" card-header-icon">
                <div class="card-icon " style="background-color:rgb(217, 132, 145)">
                    <i class="material-icons">store</i>
                </div>
                <h3 class="card-category text-dark">Shipping Address</h3>

            </div>
            <div class="card-footer">
                {{$shippingaddress->name}},
                {{$shippingaddress->phone}},
                {{$shippingaddress->address}}
                <button type="button" class="btn btn-primary btn-link btn-sm px-2 btn-edit"
                    data-href="/updateAddress/{{$shippingaddress->id}}"><i class="material-icons">edit</i></button>
            </div>
            <!-- Modal -->
            <div class="modal" id="editModal" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
                <div class="modal-dialog" role="document">
                    <form id="editForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Update the shipping address</h5>
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
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Name">
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
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>
                                    Product
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th class="text-right">
                                    Into money
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($products as $product)
                            <tr>

                                <td>
                                    <img src="{{ $product->options->image }}" alt="" class="col-sm-3">
                                    <p class="col-sm-9">{{ $product->name }}</p>

                                </td>


                                @if($product->options->promotion_price == 0)
                                
                                <td>
                                    $ {{ $product->price }}
                                </td>
                                <td>
                                    {{ $product->qty }}
                                </td>
                                <td class="text-right">
                                    $ {{ $product->price * $product->qty }}
                                </td>
                                @else
                                <td>
                                    $ {{ $product->options->promotion_price }}
                                </td>
                                <td>
                                    {{ $product->qty }}
                                </td>
                                <td class="text-right">
                                    $ {{ $product->options->promotion_price * $product->qty }}
                                </td>
                                @endif




                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                </div>

                <div class="row p-3 border-top border-bottom">
                    <div class="col-6">
                        Massage: <input type="text" placeholder="Lưu ý cho người bán..." />
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-3"> Transport unit: </div>
                            <div class="col-3"> Fast delivery </div>
                            <div class="col-3"> <a href="#">Change</a> </div>
                            <div class="col-3 text-right">$ 2 </div>
                        </div>

                    </div>

                </div>
                <div class="row pt-3">
                    <div class="col-9"></div>
                    <div class="col-3">Total amout:<p class="text-right">$ {{\Cart::subTotal() + 2}}</p>
                    </div>

                </div>
            </div>

        </div>
        <div class="card card-stats">
            <div class="row">
                <h3 class="card-category text-dark ml-5">Payment method </h3>
                <h4 class="card-category text-dark ml-5">Payment on delivery</h4>
            </div>
            <div class="row mb-3">
                <div class="col-9">

                </div>
                <div class="col-2">
                    Total money
                </div>
                <div class="col-1 ">
                    $ {{\Cart::subTotal()}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-9">

                </div>
                <div class="col-2">
                    Transport fee
                </div>
                <div class="col-1">
                    $ 2
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-9">

                </div>
                <div class="col-2">
                    Total payment:
                </div>
                <div class="col-1">
                    $ {{\Cart::subTotal() + 2}}
                </div>
            </div>
            <div class="row pb-4">
                <div class="col-8">

                </div>
                <div class="col-2">

                </div>
                <div class="col-2">
                    <form class="form" method="POST" action="/order">
                        @csrf
                        <button class="btn btn-primary">Order</button>
                    </form>
                </div>

            </div>
        </div>

    </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('client/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('client/assets/js/plugins/moment.min.js') }}"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="{{ asset('client/assets/js/plugins/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{ asset('client/assets/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('client/assets/js/material-kit.js?v=2.0.5x') }}" type="text/javascript"></script>
</body>
<script>
    var msg = '{{Session::get('
    alert ')}}';
    var exist = '{{Session::has('
    alert ')}}';
    if (exist) {
        alert(msg);
    }

    // Click edit button
    $('.btn-edit').click(function (e) {
        e.preventDefault();
        resetFormModal($(this).data('href'));

       
        $('#editModal').modal({
            backdrop: 'static',
            show: true
        });
    });

</script>
<script src="{{ asset('js/script.js') }}"></script>

</html>
