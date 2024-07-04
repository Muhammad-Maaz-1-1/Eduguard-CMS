@include('admin.layouts.header')
<!-- Page Wrapper -->
<div id="wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row justify-content-center">

            <div class="col-lg-12">

                <!-- Circle Buttons -->


                <!-- Brand Buttons -->
                <div class="card shadow mb-4 mt-5">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary text-uppercase">categories form</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('categories_form_submit')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input  type="file" class="form-control-file" name="image" accept=".png,.jpg,.jpeg,.svg" id="image" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="image">Description</label>
                                        <input type="text" name="description" placeholder="Enter your Description" class="form-control" id="description" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>



            </div>

        </div>
