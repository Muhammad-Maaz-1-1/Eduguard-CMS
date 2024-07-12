
@foreach ($courses as $course)
    <div class="col-md-6 mb-4">
        <div class="contentCard contentCard--course">
            <div class="contentCard-top">
                <a href="{{ route('course_detail',$course->id) }}"><img src="{{ asset('uploads/'.$course->image) }}" alt="images" class="img-fluid" /></a>
            </div>
            <div class="contentCard-bottom">
                <h5>
                    <a href="{{ route('course_detail',$course->id) }}" class="font-title--card">{{$course->title}}</a>
                </h5>
                <div class="contentCard-info d-flex align-items-center justify-content-between">
                    <a href="instructor-profile.html" class="contentCard-user d-flex align-items-center">
                        <img width="50px" height="50px" style="object-fit: contain" src="{{ asset('uploads/'.$course->user->profile->image) }}" alt="client-image" class="rounded-circle" />
                        <p class="font-para--md">{{$course->user->name}}</p>
                    </a>
                    <div class="price">
                        <span>{{$course->discount_price}}</span>
                        <del>{{$course->final_price}}</del>
                    </div>
                </div>
                <div class="contentCard-more justify-content-between">
                    <div class="book d-flex align-items-center">
                        <div class="icon">
                            <img src="{{ asset('assets') }}/dist/images/icon/book.png" alt="location" />
                        </div>
                        <span>{{$course->total_lesson}} Lesson</span>
                    </div>
                    <div class="clock d-flex align-items-center">
                        <div class="icon">
                            <img src="{{ asset('assets') }}/dist/images/icon/Clock.png" alt="clock" />
                        </div>
                        <span>{{$course->total_hours}} Hours</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
