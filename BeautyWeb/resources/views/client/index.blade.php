@extends("client.app")

@section('content')
<div class="main main-raised">
    <div class="container">
        <div class="section ">
            <!-- <div class="row">
            <div class="col-md-8 ml-auto mr-auto">
                <h2 class="title">Let&apos;s talk product</h2>
                <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn&apos;t scroll to get here. Add a button if you want the user to see more.</h5>
            </div>
            </div> -->
            <h2 style="color:#e90029">
                <marquee>List of products</marquee>
            </h2>
            <div class="features" style="position:relative">

                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="info">
                            @if($product->promotion_price == 0)
                            <div class="image">
                                <img src="{{$product->image}}" alt="">
                                
                            </div>
                            <h4 class="info-title">{{$product->name}}</h4>
                            <p>
                                <span class="flashsale">${{$product->unit_price}}</span>
                            </p>
                            @else
                            <div class="image">
                                <img src="{{$product->image}}" alt="">
                                <div class="overlay text-center"> Sale </div>
                            </div>
                            <h4 class="info-title">{{$product->name}}</h4>
                            <p>
                                <span class="flashdel">${{$product->unit_price}}</span>
                                <span class="flashsale">${{$product->promotion_price}}</span>
                                </p>
                                @endif
                            
                            <p>
                                <a href="/add-to-cart/{{$product->id}}" class="btn  border-pink"><i
                                        class="fa fa-shopping-cart"></i></a>

                                <a href="/productdetail/{{$product->id}}" class="btn border-pink">Details</a>
                            </p>
                        </div>
                    </div>
                    @endforeach

                </div>
                {{ $products->links() }}
            </div>
        </div>
    </div>

</div>
</div>

@endsection

@push('script')

@endpush
