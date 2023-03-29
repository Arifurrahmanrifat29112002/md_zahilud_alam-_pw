@extends('dashbord.layouts.dashbordtem')
@section('main_page')
    <div class="col-12 grid-margin">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-info">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="card-body">
                <h4 class="card-title">Home info </h4>
                <form class="form-sample" action="{{ route('store.about') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p class="card-description"> home page </p>
                    <div class="row">

                        <div class="col-md-10">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Main Logo</label>
                                <div class="col-sm-9">
                                    {{ $user_info->main_logo }}
                                    <input type="file" class="form-control" name="main_logo">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Main Title</label>
                                <div class="col-sm-9">

                                    <input type="text" class="form-control text-light" name="main_title"
                                        value="{{ $user_info->main_title }}">
                                </div>
                            </div>

                            <p class="card-description"> About Section </p>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">About Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="about_image">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">About Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control text-light" id="textAreaExample3" rows="4" name="about_description">{{ $user_info->about_description }}</textarea>
                                </div>
                            </div>
                            <!-- Textarea 2 rows height -->
                            <p class="card-description"> Address Section </p>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-light" name="address"
                                        value="{{ $user_info->address }}">
                                </div>
                            </div>
                            <p class="card-description"> Contact Section </p>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Call</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control text-light" name="number"
                                        value="{{ $user_info->number }}">
                                </div>
                            </div>
                            <p class="card-description"> Link Section </p>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">facebook</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-light" name="facebook"
                                        placeholder="Enter Your Facebook Link" value="{{ $user_info->facebook }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">instagram</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-light" name="instagram"
                                        placeholder="Enter Your instagram Link" value="{{ $user_info->instagram }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">twitter</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-light" name="twitter"
                                        placeholder="Enter Your twitter Link" value="{{ $user_info->twitter }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Linkdin</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-light" name="linkdin"
                                        placeholder=" Enter Your Linkdin Link" value="{{ $user_info->linkdin }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">YouTube</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-light" name="youtube"
                                        placeholder=" Enter Your youtube Link" value="{{ $user_info->youtube }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Behance</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control text-light" name="behance"
                                        placeholder=" Enter Your behance Link" value="{{ $user_info->behance }}">
                                </div>
                            </div>

                        </div>

                    </div>
                    <button type="submit" class="btn btn-info ">Submit info</button>
                </form>
            </div>
        </div>
    </div>
@endsection
