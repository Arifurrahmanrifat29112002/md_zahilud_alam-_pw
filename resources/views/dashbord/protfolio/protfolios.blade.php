@extends('dashbord.layouts.dashbordtem')
@section('main_page')
<div class="col-6 grid-margin">
    <div class="card">
        @if (session('success'))
                <div class="alert alert-info">
                    {{ Session::get('success') }}
                </div>
            @endif
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="card-title">All  Post</h4>
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

                                <th> Category Name </th>
                                <th>Image</th>
                                <th> Action </th>
                            </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                           @forelse ($protfolioTrashed as $trashprotfolio)
                           <tr>

                            <td>{{ $trashprotfolio->category_name }}</td>
                            <td><img src="{{ asset('upload/protfolio_image') }}/{{ $trashprotfolio->protfolio_image }}" alt="" srcset=""></td>
                            <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" style="">
                                <a class="dropdown-item text-light" href="{{ route('restor.protfolio',['id'=>$trashprotfolio->id]) }}"><i class="bx bx-edit-alt me-1"></i> Restore</a>
                                <a class="dropdown-item text-light" href="{{ route('delete.protfolio',['id'=>$trashprotfolio->id]) }}"><i class="bx bx-trash me-1"></i> Delete</a>
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


                <th> Category Name </th>
                <th> Image </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
                @forelse ($protfolio as $post)

                <tr>

                    <td> {{ $post->category_name }} </td>
                    <td><a href="{{ asset('upload/protfolio_image') }}/{{ $post->protfolio_image }}"
                        data-gallery="portfolioGallery" class="portfolio-lightbox"><img src="{{ asset('upload/protfolio_image') }}/{{ $post->protfolio_image }}" alt="" srcset=""> </a></td>

                    <td>
                        <div class="button-group" role="group">
                            <a  href="{{ route('edit.protfolio',['id'=> $post->id]) }}" class="btn btn-secondary" ><i class="mdi mdi-border-color" title="edit"></i></a>
                            <a  href="{{ route('destroy.protfolio',['id'=> $post->id]) }}" class="btn btn-secondary" ><i class="mdi mdi-delete-forever" title="delete"></i></a>
                        </div>
                    </td>
                  </tr>
                @empty

                @endforelse




            </tbody>

          </table>

            <div class=" m-3">
                {{ $protfolio->links('pagination::bootstrap-5') }}
            </div>
        </div>
      </div>
    </div>
  </div>


@endsection
@section('script')
@if (session('success'))
<script>
    Swal.fire({
        position: 'top',
        icon: 'success',
        title: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 3500
    })
</script>
@endif
@endsection
