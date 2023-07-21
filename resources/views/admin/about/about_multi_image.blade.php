@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>




    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">About Multi Image</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form method="post" action="{{ route('store.multi.about') }}" enctype="multipart/form-data">
                   @csrf

                <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">About Multi Image</h4>



                            <div class="row mb-3">
                                <label for="example-img-input" class="col-sm-2 col-form-label">About Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" multiple="" type="file" name="multi_image[]" id="image">
                                    <br><br>
                                </div>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-xl" id="showImage"
                                 src="{{url('upload/no_image.jpg')}}" alt="No image selected !!">
                                 </div>
                            </div>

              <input type="submit" class="btn btn-outline-info" value="Add About Multi Image">
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
