@extends('dashbord.layouts.dashbordtem')
@section('main_page')


<div class="col-md-8 grid-margin stretch-card m-auto">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Category</h4>
       
        <form class="forms-sample" action="{{ route('update.category',['id'=>$category->id]) }}" method="POST">
            @csrf
          <div class="form-group row">
            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Category Name</label>
            <div class="col-sm-9 ">
                
              <input type="text" class="form-control text-light" id="exampleInputUsername2" placeholder="Category Name" name="category_name" value="{{ $category->category_name }}">
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
