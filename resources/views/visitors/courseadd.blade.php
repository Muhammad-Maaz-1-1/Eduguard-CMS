 @extends('visitors.layouts.main')
 @section('main-container')

 <!-- SignUp Area Starts Here -->
 <section class="signup-area overflow-hidden h-100 addCourse" style="padding: 100px 0;">
     <div class="container">
         <div class="row align-items-center justify-content-md-center">
             <div class="col-lg-12 order-2 order-lg-0">
                 <div class="signup-area-textwrapper">
                 <h2 class="mb-4">ADD NEW COURSE</h2>
                <form action="{{ route('register_submit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-element success">
        <div class="form-alert">
            <label for="instructor_id">Instructor ID</label>
        </div>
        <div class="form-alert-input">
            <input type="text" name="instructor_id" id="instructor_id" placeholder="Enter Instructor ID" required />
        </div>
    </div>

    <div class="form-element success">
        <div class="form-alert">
            <label for="featured_image">Featured Image</label>
        </div>
        <div class="form-alert-input">
            <input type="file" name="featured_image" id="featured_image" accept="image/*" required />
        </div>
    </div>
    <div class="form-element success">
        <div class="form-alert">
            <label for="featured_video">Featured video</label>
        </div>
        <div class="form-alert-input">
            <input type="file" name="featured_video" id="featured_video" accept="video" required />
        </div>
    </div>

    <div class="form-element success ">
        <div class="form-alert">
            <label for="title">Title</label>
        </div>
        <div class="form-alert-input">
            <input type="text" name="title" id="title" placeholder="Course Title" required />
        </div>
    </div>

    <div class="form-element success">
        <div class="form-alert">
            <label for="total_lesson">Total Lessons</label>
        </div>
        <div class="form-alert-input">
            <input type="number" name="total_lesson" id="total_lesson" placeholder="Number of Lessons" required />
        </div>
    </div>

    <div class="form-element success">
        <div class="form-alert">
            <label for="total_hours">Total Hours</label>
        </div>
        <div class="form-alert-input">
            <input type="number" name="total_hours" id="total_hours" placeholder="Total Hours" required />
        </div>
    </div>

    <div class="form-element success">
        <div class="form-alert">
            <label for="discount_price">Discount Price</label>
        </div>
        <div class="form-alert-input">
            <input type="text" name="discount_price" id="discount_price" placeholder="Discount Price" />
        </div>
    </div>

    <div class="form-element success">
        <div class="form-alert">
            <label for="final_price">Final Price</label>
        </div>
        <div class="form-alert-input">
            <input type="text" name="final_price" id="final_price" placeholder="Final Price" required />
        </div>
    </div>

    <div class="form-element success w-100">
        <div class="form-alert">
            <label for="description">Description</label>
        </div>
        <div class="form-alert-input">
            <textarea name="description" rows="5" class="form-control" id="description" placeholder="Course Description" required></textarea>
        </div>
    </div>

    <div class="form-element">
        <button type="submit" class="button button-lg button--primary w-100">Submit Course</button>
    </div>
</form>

                 </div>
             </div>
            
         </div>
     </div>
 </section>
 <!-- SignUp Area Ends Here -->

 <!-- Dot Images Starts Here -->
 <div class="dot-images">
     <img src="{{ asset('assets') }}/dist/images/shape/dots/dots-img-05.png" alt="shape" class="img-fluid first-dotimage" />
     <img src="{{ asset('assets') }}/dist/images/shape/dots/dots-img-07.png" alt="shape" class="img-fluid second-dotimage" />
 </div>
 @endsection
