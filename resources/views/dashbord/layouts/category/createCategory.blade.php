@extends('dashbord.layouts.dashbordtem')
@section('main_page')


    <div class="col-md-8 grid-margin stretch-card m-auto">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-primary">
                    {{ Session::get('success') }}
                </div>
            @endif
          <div class="card-body">
            <h4 class="card-title">Create a Category</h4>

            <form class="forms-sample" action="{{ route('store.category') }}" method="POST">
                @csrf
              <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Category Name</label>
                <div class="col-sm-9 ">
                  <input type="text" class="form-control text-light" id="exampleInputUsername2" placeholder="Category Name" name="category_name">
                </div>
              </div>

              <button type="submit" class="btn btn-primary me-2">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6 grid-margin stretch-card m-auto mt-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title">All Categories</h4>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#largeModal">
                   Trash Bin
                 </button>
            </div>
             <!-- Large Modal -->
             <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content  bg-dark">
                    <div class="modal-header ">
                      <h5 class="modal-title" id="exampleModalLabel3">Trash Bin</h5>
                      <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-1">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-dark">

                              <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                              </thead>
                              <tbody class="table-border-bottom-0">
                               @forelse ($Treshedcategory as $trashCategory)
                               <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $loop->iteration }}</strong></td>
                                <td>{{ $trashCategory->category_name }}</td>
                                <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" style="">
                                    <a class="dropdown-item text-light" href="{{ route('restor.categoty',['id'=>$trashCategory->id]) }}"><i class="bx bx-edit-alt me-1"></i> Restore</a>
                                    <a class="dropdown-item text-light" href="{{ route('delete.categoty',['id'=>$trashCategory->id]) }}"><i class="bx bx-trash me-1"></i> Delete</a>
                                    </div>
                                </div>
                                </td>
                            </tr>
                               @empty
                               <tr>
                                  <td class="d-block">No Category</td>
                              </tr>
                               @endforelse


                              </tbody>
                            </table>
                          </div>

                    </div>

                  </div>
                </div>
              </div>

            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Category</th>

                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->category_name }}</td>

                        <td>
                            <div class="button-group" role="group">
                                <a  href="{{ route('edit.category',['id'=> $category->id]) }}" class="btn btn-secondary" ><i class="mdi mdi-border-color" title="edit"></i></a>
                                <a  href="{{ route('destroy.category',['id'=> $category->id]) }}" class="btn btn-secondary" ><i class="mdi mdi-delete-forever" title="delete"></i></a>
                            </div>
                        </td>
                      </tr>
                    @empty

                    @endforelse


                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>

@endsection

