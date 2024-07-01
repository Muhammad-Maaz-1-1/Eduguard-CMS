@extends('visitors.layouts.main')
@section('main-container')
<section class="pt-5 pb-5">
    <div class="container">
        <form action="{{ route('edit_instructor_profile_submit') }}" name="add_name" id="add_name" method="post" enctype="multipart/form-data">
            @csrf
              <div class="row">
                <div class="col-lg-9 order-2 order-lg-0">
                    <div class="white-bg">
                        <div class="students-info-form editProfileForm">
                            <h6 class="font-title--card mb-4">Complete Your Profile</h6>
                          
                            <input type="hidden" value="{{ Auth()->user()->id }}" name="user_id">
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <label for="fname">First Name</label>
                                    <input type="text" value="{{ Auth()->user()->name }}" class="form-control" placeholder="Phillip" id="fname" />
                                </div>
                                <div class="col-lg-6">
                                    <label for="do">What Do You Do</label>
                                    <input type="text" name="skill" value="{{ $profile ? $profile->skill : '' }}" id="do" class="form-control" placeholder="UI/UX Designer" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" value="{{ Auth()->user()->email }}" class="form-control" placeholder="phillip.bergson@gmail.com" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="do">About</label>
                                    <textarea name="about" class="form-control" rows="5" id="aboutme">{{ $profile ? $profile->about : '' }}</textarea>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-lg-6">
                                    <label for="pnumber">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" placeholder="+8801236-858966" id="pnumber" value="{{ $profile ? $profile->phone_number : '' }}" />
                                </div>
                                <div class="col-lg-6">
                                    <label for="nationality">Nationality</label>
                                    <input type="text" name="nationality" class="form-control" placeholder="Bangladesh" value="{{ $profile ? $profile->nationality : '' }}" id="nationality" />
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="col-lg-3 order-1 order-lg-0 mt-4 mt-lg-0">
                    <div class="white-bg">
                        <div class="change-image-wizard">
                            <div class="image mx-auto">
                                @if ($profile->image === null)
                                <img src="{{ asset('assets') }}/src/images/teacher.png" alt="User" />
                                @else
                                <img src="{{ asset('uploads') }}/{{ $profile->image }}" alt="User" />
                                @endif
                            </div>
                            <div class="d-flex justify-content-center flex-column" style="position: relative;">
                                <input name="image" class="imageFile" type="file">
                                <button type="submit" class="button button--primary-outline">CHANGE iMAGE</button>
                                <p>Image size should be under 1MB image ratio 200px.</p>
                            </div>
                        </div>
                    </div>

                </div>
                <label for="" class="px-2">Educations</label>
                <table class="table table-bordered " id="dynamic_field">
                    <tr>
                        <td><input type="text" name="education_title[]" placeholder="Bachelor Degree" class="form-control title_list" /></td>
                        <td><input type="text" name="education_description[]" placeholder="Don Honorio Vectura Technological States University" class="form-control description_list" />
                        </td>
                        <td><input type="text" name="education_date[]" placeholder="2008 - 2010" class="form-control title_date" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-primary">Add More</button></td>
                    </tr>
                </table>

                <label for="" class="px-2">Experiences</label>
                <table class="table table-bordered" id="experience_dynamic_field">
                    <tr>
                        <td><input type="text" name="experience_title[]" placeholder="Typeface Design" class="form-control title_list" /></td>
                        <td><input type="text" name="experience_description[]" placeholder="Integer ultricies a turpis ac mattis. " class="form-control description_list" /></td>
                        <td><input type="text" name="experience_date[]" placeholder="2008 - 2010" class="form-control title_date" /></td>
                        <td><button type="button" name="experienceadd" id="experienceadd" class="btn btn-primary">Add More</button></td>
                    </tr>
                </table>
 @if ($profile && !$profile->education_title == null)
    @php
        $education_titles = explode(',', $profile->education_title);
        $education_descriptions = explode(',', $profile->education_description);
        $education_dates = explode(',', $profile->education_date);
    @endphp

    <label for="" class="px-2">Educations</label>
    <table class="table table-bordered" id="dynamic_field">
        @foreach($education_titles as $index => $title)
            <tr>
                <td><input type="text" name="education_title[]" value="{{ $title }}" placeholder="Bachelor Degree" class="form-control title_list" /></td>
                <td><input type="text" name="education_description[]" value="{{ $education_descriptions[$index] ?? '' }}" placeholder="Don Honorio Vectura Technological States University" class="form-control description_list" /></td>
                <td><input type="text" name="education_date[]" value="{{ $education_dates[$index] ?? '' }}" placeholder="2008 - 2010" class="form-control title_date" /></td>
            </tr>
        @endforeach
    </table>
@else
@endif
 @if ($profile && !$profile->experience_title == null)
    @php
        $experience_titles = explode(',', $profile->experience_title);
        $experience_descriptions = explode(',', $profile->experience_description);
        $experience_dates = explode(',', $profile->experience_date);
    @endphp

    <label for="" class="px-2">Experiences</label>
    <table class="table table-bordered" id="dynamic_field">
        @foreach($experience_titles as $index => $title)
            <tr>
                <td><input type="text" name="experience_title[]" value="{{ $title }}" placeholder="Bachelor Degree" class="form-control title_list" /></td>
                <td><input type="text" name="experience_description[]" value="{{ $experience_descriptions[$index] ?? '' }}" placeholder="Don Honorio Vectura Technological States University" class="form-control description_list" /></td>
                <td><input type="text" name="experience_date[]" value="{{ $experience_dates[$index] ?? '' }}" placeholder="2008 - 2010" class="form-control title_date" /></td>
            </tr>
        @endforeach
    </table>
@else
@endif




                <div class="d-flex justify-content-lg-center justify-content-center mt-2">
                    <button class="button button-lg button--primary" type="submit">Save Changes</button>
                </div>
               
        </form>
    </div>
</section>
@endsection
