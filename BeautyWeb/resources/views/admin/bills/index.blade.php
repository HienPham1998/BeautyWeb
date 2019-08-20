@extends('admin.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header rounded card-header-primary">
                    <h3 class="card-title text-white"> Manage Bills</h3>
                </div>
                <div class="card-body">
                    <!-- <a class="btn btn-primary btn-round" href="products/create">
                        Add Product
                    </a> -->
                    @if(session()->has("success"))
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
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
                                    Customer Id
                                </th>
                                <th>
                                    Total
                                </th>
                                <th>
                                    Created at
                                </th>

                                <th>Options</th>
                            </thead>
                            <tbody>
                                @foreach($bills as $key => $bill)
                                <tr>
                                    <td>
                                        {{ (($bills->currentPage() - 1 ) * $bills->perPage()) + ($key+1) }}
                                    </td>
                                    <td>
                                        {{ $bill->customer_id }}
                                    </td>
                                    <td>
                                        {{ $bill->total }}
                                    </td>
                                    <td>
                                        {{ $bill->created_at }}
                                    </td>



                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <!-- <button type="button" class="btn btn-primary btn-link btn-sm px-2 btn-edit"
                                                data-href="bills/update/{{ $bill->id }}"><i
                                                    class="material-icons">edit</i></button>
                                            <button type="button" class="btn btn-danger btn-link btn-sm px-2"
                                                data-toggle="modal" data-target="#modalDelete{{$bill->id}}"><i
                                                    class="material-icons">close</i></button> -->
                                            <a  class="btn btn-light btn-link btn-sm px-2"
                                            href="/manage/billdetail/{{ $bill->id }}">Detail
                                                   </a>
                                            <!-- Modal -->
                                            

                                              
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $bills->links() }}
                </div>
            </div>
        </div>
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
                    $('#editForm input[name="customer_id"]').val(col[1].innerText.trim());
                    $('#editForm input[name="total"]').val(col[2].innerText);
                    $('#editForm input[name="created_at"]').val(col[3].innerText);
                   

                    $('#editModal').modal({
                        backdrop: 'static',
                        show: true
                    });
                });
            </script>
            @endpush