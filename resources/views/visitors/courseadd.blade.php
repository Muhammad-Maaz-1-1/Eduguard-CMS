 @extends('visitors.layouts.main')
 @section('main-container')

 <!-- SignUp Area Starts Here -->
 <section class="signup-area overflow-hidden h-100 addCourse" style="padding: 100px 0;">
     <div class="container">
         <div class="row align-items-center justify-content-md-center">
             <div class="col-lg-12 order-2 order-lg-0">
                 <div class="signup-area-textwrapper">
                 <h2 class="mb-4">ADD NEW COURSE</h2>
                <form action="{{ route('course_form_submit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-element success">
        <div class="form-alert">
            <label for="instructor_id">Title</label>
        </div>
        <div class="form-alert-input">
            <input type="text" name="title" id="title" placeholder=" Title " required />
            <input type="hidden" name="instructor_id" value="{{Auth::user()->id}}" id="instructor_id" placeholder="Enter Instructor ID" required />
        </div>
    </div>

    <div class="form-element success">
        <div class="form-alert">
            <label for="image">Featured Image</label>
        </div>
        <div class="form-alert-input">
            <input type="file" name="image" id="image" accept="image/*" required />
        </div>
    </div>
    <div class="form-element success">
        <div class="form-alert">
            <label for="video">Featured video</label>
        </div>
        <div class="form-alert-input">
            <input type="file" name="video" id="video" accept="video" required />
        </div>
    </div>

    <div class="form-element success">
        <div class="form-alert">
            <label for="total_lesson">Category</label>
        </div>
        <div class="form-alert-input">
            <select name="category" id="category" class="mb-2 bg-transparent">
                <option value="select category">select category</option>
                @foreach ( $categoryModel as $category )
                <option value="{{$category->name}}">{{$category->name}} </option>
                @endforeach
            </select>
            <input type="text" name="inputCategory" id="inputCategory" placeholder="Add New Category"  />
        </div>
    </div>
    <div class="form-element success">
        <div class="form-alert">
            <label for="total_lesson">Total Lessons</label>
        </div>
        <div class="form-alert-input">
            <input type="number" value="1" name="total_lesson" id="total_lesson" placeholder="Number of Lessons" required />
        </div>
    </div>

    <div class="form-element success">
        <div class="form-alert">
            <label for="total_hours">Total Hours</label>
        </div>
        <div class="form-alert-input">
            <input type="number" value="1" name="total_hours" id="total_hours" placeholder="Total Hours" required />
        </div>
    </div>

    <div class="form-element success">
        <div class="form-alert">
            <label for="discount_price">Discount Price</label>
        </div>
        <div class="form-alert-input">
            <input type="text" value="1" name="discount_price" id="discount_price" placeholder="Discount Price" />
        </div>
    </div>
    <div class="form-element success">
        <div class="form-alert">
            <label for="final_price">Final Price</label>
        </div>
        <div class="form-alert-input">
            <input type="text" value="1" name="final_price" id="final_price" placeholder="Final Price" required />
        </div>
    </div>

    <div class="form-element success w-100">
        <div class="form-alert">
            <label for="description">Description</label>
        </div>
        <div class="form-alert-input">
            <textarea name="description" rows="5" class="form-control" id="description" placeholder="Course Description" required>instructor_id</textarea>
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
