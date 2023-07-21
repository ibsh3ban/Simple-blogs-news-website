@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>




    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Change Password</h4>

                    </div>

                </div>
                @if (count($errors))
                    @foreach ($errors->all() as $error)

                     <p class="alert alert-primary" role="alert">{{ $error }}</p>


                    @endforeach

                  @endif
            </div>
            <!-- end page title -->
            <form method="post" action="{{ route('update.password') }}" >
                   @csrf
                <div class="row">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password"  name="oldpassword" id="oldpassword">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password"  name="newpassword" id="newpassword">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password"  name="confirmpassword" id="confirmpassword">
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- end row -->


              <input type="submit" class="btn btn-outline-info" value="Change Password">

            </form>


            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
 </div>
</div>


<!-- end row -->


@endsection
