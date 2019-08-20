@extends('admin.app')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header rounded card-header-primary">
                    <h3 class="card-title text-white"> Manage Category</h3>
                        
                        
                    </div>
                    <div class="card-body">
                    <a class="btn btn-primary btn-round" href="categories/create">
                            Add Category
                        </a>
                        @if(session()->has("success"))
                            <div class="alert alert-success alert-dismissible fade show">
                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <i class="material-icons">close</i>
                                </button>
                                <span> {{ session("success") }}</span>
                            </div>
                        @endif
                        @include("common.errors")
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    ID
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Note
                                </th>
                                <th>
                                    Options
                                </th>
                                </thead>
                                <tbody>
                                @foreach($categories as $key => $category) 
                                    <tr>
                                        <td>
                                            {{ (($categories->currentPage() - 1 ) * $categories->perPage()) + ($key+1) }}
                                        </td>
                                        <td>
                                            {{ $category->name }}
                                        </td> 
                                        <td>
                                            {{ $category->note }}
                                        </td>
                                        
                                        <td>
                                            <div class= "btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-primary btn-link btn-sm px-2 btn-edit"
                                                        data-href="categories/update/{{ $category->id }}"><i class="material-icons">edit</i></button>
                                                <button type="button" class="btn btn-danger btn-link btn-sm px-2" data-toggle="modal"
                                                        data-target="#modalDelete{{$category->id}}"><i class="material-icons">close </i></button>

                                                <!-- Modal -->
                                                <div id="modalDelete{{$category->id}}" class="modal fade" role="dialog">
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
                                                                <form action="categories/destroy/{{ $category->id }}"
                                                                      method="post">
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
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal edit -->
    <div class="modal" id="editModal" role="dialog" aria-labelledby="editModalLabel" aria-hidden="false">
        <div class="modal-dialog" role="document">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Update Category</h5>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                    <label>Name Category</label>
                                                    <input type="text" name="name" class="form-control" placeholder="Name category">
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 pr-1">
                                                <div class="form-group">
                                                    <label>Note</label>
                                                    <input type="text" name="note" class="form-control" placeholder="Note">
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
            $('#editForm input[name="name"]').val(col[1].innerText.trim());
            $('#editForm input[name="note"]').val(col[2].innerText);
            //$('#editForm select[name="role_id"]').val($(col[3]).get(0).innerText === "User" ? 2 : 1);

            $('#editModal').modal({
                backdrop: 'static',
                show: true
            });
        });
    </script>
@endpush
