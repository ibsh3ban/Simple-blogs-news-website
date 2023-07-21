@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>




    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Profile</h4>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                   @csrf
                <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Edit Data</h4>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="{{ $editData->name }}" name="name" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" value="{{ $editData->email }}" name="email" id="example-email-input">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-img-input" class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" name="profile_image" id="image">
                                </div>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-xl" id="showImage" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg')}}" alt="Card image cap">
                                </div>
                            </div>
              <input type="submit" class="btn btn-outline-info" value="Update Profile">
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
