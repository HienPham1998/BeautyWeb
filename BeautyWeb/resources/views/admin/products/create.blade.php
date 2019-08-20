@extends('admin.app')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Create Product</h4>
                    </div>
                    <div class="card-body">
                        @include('common.errors')
                        <form action="store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-4">
                                <div class="col-md-6 offset-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Name Product</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <!-- <div class="col-md-6 offset-3">
                        <div class="form-group mt-4">
                          <label class="bmd-label-floating">Category Id</label>
                          <input type="text" name='category_id' class="form-control">
                        </div>
                      </div> -->
                               
                                    <div class="col-md-6 offset-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category</label>
                                            <select name="category_id" class="form-control">
                                                @foreach($categories as  $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Provider</label>
                                            <select name="category_id" class="form-control">
                                                @foreach($providers as  $provider)
                                                <option value="{{$provider->id}}">{{$provider->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Promotion Price</label>
                                        <input type="text" name="promotion_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 offset-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Unit Price</label>
                                        <input type="text" name="unit_price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 offset-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Quantity</label>
                                        <input type="text" name="quantity" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 offset-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Image</label>
                                        <input style="opacity: 1; position: initial;" type="file" name="file"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 offset-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Description</label>
                                        <input type="text" name="description" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Create Product</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="../assets/img/faces/marc.jpg" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                        <h4 class="card-title">Alec Thompson</h4>
                        <p class="card-description">
                            Don't be scared of the truth because we need to restart the human foundation in truth And I
                            love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                        </p>
                        <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

</script>
@endpush
