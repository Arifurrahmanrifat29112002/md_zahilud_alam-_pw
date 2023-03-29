@extends('dashbord.layouts.dashbordtem')
@section('main_page')
<div class="col-md-10 grid-margin stretch-card">

    <div class="card">
        @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <ul>
                        <li>
                            <p class="text-light">{{ $error }}</p>
                        </li>
                    </ul>
                @endforeach
            @endif

      <div class="card-body">
        <h4 class="card-title">Edit Protfolio Post</h4>
        <form class="forms-sample" action="{{ route('update.protfolio',['id'=>$protfolios->id ]) }}" method="POST" enctype="multipart/form-data">
        @csrf
          
          <div class="form-group row">
            <label for="Category" class="col-sm-3 col-form-label">Category</label>
            <div class="col-sm-9">
              <select class="form-control text-light" id="exampleSelectGender" name="category_id" value="">
                <option value="{{ $protfolios->category_id }}" selected>{{ $protfolios->category_name }}</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                      @endforeach
                </select>
            </div>
          </div>

                    <img src="{{ asset("upload/protfolio_image") }}/{{ $protfolios->protfolio_image }}" alt="" srcset="" style="width:20%;margin-left:25%" >
          <div class="form-group row">

            <label for="file" class="col-sm-3 col-form-label">Protfolio Image</label>
            <div class="col-sm-9">
              <input type="file" class="form-control text-light" id="file" placeholder="Protfolio Description" name="protfolio_image">
            </div>
          </div>
          <button type="submit" class="btn btn-primary me-2">Update</button>

        </form>
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
