@extends('admin.admin_master')
@section('admin')

<div class="page-content">
 <div class="container-fluid">


  <div class="row">
    <div class="col-md-6 col-xl-4">

        <!-- Simple card -->
        <div class="card">
            <div class="col-sm-10">
                <img class="rounded-circle avatar-xl"  id="image" src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg')}}" alt="Card image cap">
            </div>
            <div class="card-body">
                <h4 class="card-title">Name : {{ $adminData->name }}</h4>
                <hr>
                <h4 class="card-title">Email : {{ $adminData->email }}</h4>
                <hr>
                <a href="{{ route('edit.profile') }}" class="btn btn-primary waves-effect waves-light">Edit Your Profile</a>
            </div>
        </div>

    </div><!-- end col -->


  </div>
 </div>
</div>


<!-- end row -->

@endsection
