      @extends('visitors.layouts.main')
      @section('main-container')
      <section class="pt-5">
          <div class="container">
                              <form action="{{ route('edit_profile_submit') }}" method="post"enctype="multipart/form-data">
              <div class="row">
                  <div class="col-lg-9 order-2 order-lg-0">
                      <div class="white-bg">
                          <div class="students-info-form editProfileForm">
                              <h6 class="font-title--card mb-4">Complete Your Profile</h6>
                              @csrf
                              <input type="hidden" value="{{ Auth()->user()->id }}" name="user_id">
                              <input type="hidden" name="id" name="profile_id">
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
                                          <input type="email" id="email" value="{{Auth()->user()->email}}" class="form-control" placeholder="phillip.bergson@gmail.com" />
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-12 mb-3">
                                          <label for="do">About</label>
                                          <textarea name="about" class="form-control" rows="5" id="aboutme">{{$profile ? $profile->about : ''  }}</textarea>
                                      </div>
                                  </div>
                                  <div class="row g-3">
                                      <div class="col-lg-6">
                                          <label for="pnumber">Phone Number</label>
                                          <input type="text"  name="phone_number" class="form-control" placeholder="+8801236-858966" id="pnumber" value="{{ $profile ? $profile->phone_number : "" }}" />
                                      </div>
                                      <div class="col-lg-6">
                                          <label for="nationality">Nationality</label>
                                          <input type="text" name="nationality" class="form-control" placeholder="Bangladesh" value="{{ $profile ? $profile->nationality : "" }}" id="nationality" />
                                      </div>
                                  </div>
                                  <div class="d-flex justify-content-lg-center justify-content-center mt-2">
                                      <button class="button button-lg button--primary" type="submit">Save Changes</button>
                                  </div>
                          </div>
                      </div>

                  </div>
                  <div class="col-lg-3 order-1 order-lg-0 mt-4 mt-lg-0">
                      <div class="white-bg">
                          <div class="change-image-wizard">
                              <div class="image mx-auto">
                                  @if (!$profile)
                                  <img src="{{ asset('assets') }}/src/images/student.png" alt="User" />
                                  @else
                                  <img src="{{ asset('uploads') }}/{{ $profile->image }}" alt="User" />


                                  @endif
                              </div>
                                  <div class="d-flex justify-content-center flex-column" style="position: relative;">
                                      <input name="image" class="imageFile" type="file">
                                      <button type="submit" class="button button--primary-outline">CHANGE iMAGE</button>
                              </form>
                              <p>Image size should be under 1MB image ratio 200px.</p>
                          </div>
                      </div>
                  </div>

              </div>
                              </form>
          </div>
      </section>
      @endsection
