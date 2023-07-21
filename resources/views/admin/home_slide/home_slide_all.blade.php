@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>




    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Home Slide</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form method="post" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                   @csrf

                   <input type="hidden" name="id" value="{{ $homeslide->id }}" >
                <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Home Slide</h4>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $homeslide->title }}" name="title" id="title">
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $homeslide->short_title }}" name="short_title" id="short_title">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Video Url</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $homeslide->video_url }}" name="video_url" id="video_url">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-img-input" class="col-sm-2 col-form-label">Slider Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="home_slide" id="image">
                                </div>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-xl" id="showImage"
                                 src="{{ (!empty($homeslide->home_slide))?
                                  url('upload/home_slide/'.$homeslide->home_slide):url('upload/no_image.jpg')}}" alt="No image selected !!">
                                </div>
                            </div>

              <input type="submit" class="btn btn-outline-info" value="Update Slide">
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
