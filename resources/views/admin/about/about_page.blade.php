@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>




    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">About Page</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">
                   @csrf

                   <input type="hidden" name="id" value="{{ $about->id }}" >
                <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">About Page</h4>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $about->title }}" name="title" id="title">
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $about->short_title }}" name="short_title" id="short_title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    {{-- <input class="form-control" type="text" value="{{ $about->short_description }}" name="short_title" id="short_title"> --}}
                                    <textarea rows="5"  required="" name="short_description" class="form-control" >{{ $about->short_description }}</textarea>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Long Description</label>
                                <div class="col-sm-10">

                                 <textarea id="elm1" name="long_description"  >{{ $about->long_description }}</textarea>
                                    {{-- <input class="form-control" type="text" value="" name="long_title" id="long_title"> --}}
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="example-img-input" class="col-sm-2 col-form-label">About Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="about_image" id="image">
                                </div>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-xl" id="showImage"
                                 src="{{ (!empty($about->about_image))?
                                  url('upload/about_image/'.$about->about_image):url('upload/no_image.jpg')}}" alt="No image selected !!">
                                </div>
                            </div>

              <input type="submit" class="btn btn-outline-info" value="Update About Page">
            </form>


            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
 </div>
</div>


<!-- end row -->
<script type="text/javascript">
 $(document).ready(function(){
    $('#image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
        $('#showImage').attr('src',e.target.result);
    }
        reader.readAsDataURL(e.target.files['0']);

    });
 });


</script>

@endsection
