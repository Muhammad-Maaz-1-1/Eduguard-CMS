@extends('visitors.layouts.main')
@section('main-container')
    <section class="pt-5 pb-5">
        <div class="container">
            <form name="add_name" action="{{ route('chapters_submit') }}" id="add_name" method="post"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $courseId }}" name="course_id[]">
                <div class="row">
                    <div class="">
                        <div class="white-bg">
                            <div class="students-info-form editProfileForm">
                                <h6 class="font-title--card mb-4">Add Your Chapters</h6>
                                <div class="row g-3">
                                    <div class="col-lg-12">
                                        <div class="d-flex gap-4">
                                            <input type="text" name="chapter_heading[]" placeholder="Chapter Heading"
                                                class="form-control chapter_heading" />
                                            <button type="button" name="chaptersAdd" id="chaptersAdd"
                                                style="text-wrap:nowrap;width: 299px;padding: 0px !important;height: 55px !important;"
                                                class="btn btn-primary text-white">Add Lecture</button>
                                        </div>
                                        <table class="table table-bordered" id="chapters_dynamic_field">

                                        </table>

                                    </div>
                                    <style>
                                        table tr td {
                                            text-align: start !important;
                                        }

                                        table tr {
                                            display: flex;
                                            align-items: end;
                                        }

                                        table#chapters_dynamic_field tr,
                                        table#chapters_dynamic_field tbody,
                                        table#chapters_dynamic_field td,
                                        #new_chapters_dynamic_field tr,
                                        #new_chapters_dynamic_field td,
                                        #new_chapters_dynamic_field tbody,
                                        #new_lecture_dynamic_field tr,
                                        #new_lecture_dynamic_field td,
                                        #new_lecture_dynamic_field tbody {
                                            border: none;
                                            text-align: right;
                                        }

                                        table input {
                                            border: 1px solid #ccc !important;
                                        }

                                        table td {
                                            padding: 0 5px;
                                        }

                                        table tr input {
                                            margin-bottom: 0px !important;
                                        }

                                        table tr {
                                            padding-bottom: 15px !important;
                                            display: block;
                                        }

                                        table#new_chapters_dynamic_field tbody td {
                                            display: flex;
                                            justify-content: center;
                                            align-items: center;
                                        }

                                        #new_chapters_dynamic_field td button,
                                        #new_lecture_dynamic_field td button,
                                        .btn_remove {
                                            text-wrap: nowrap;
                                            box-shadow: none !important;
                                            width: 159px;
                                            background: #1089ff !important;
                                            border: none !important;
                                            color: #fff !important;
                                            padding: 0px !important;
                                            margin: 0px 5px;
                                            height: 45px !important;
                                        }

                                        input.form-control.chapter_heading {
                                            width: 51vw;
                                        }
                                    </style>
                                    <div class="col-lg-12">
                                        <table class="table table-bordered" id="new_chapters_dynamic_field">
                                            <tr>
                                                <td class="text-center mb-3"><button type="button" name="newchaptersAdd"
                                                        id="newchaptersAdd" class="btn btn-primary text-white">Add
                                                        Chapter</button></td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered" id="new_lecture_dynamic_field">
                                            <tr>
                                            </tr>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-lg-center justify-content-center gap-5 mt-2">
                        <button class="button button-lg button--primary" type="submit">Add Chapters</button>
                        @if ($chapterModel && !$chapterModel->chapter_heading == null)
                            <a href="{{ route('course_published', $courseId) }}"
                                class="button button-lg button--primary float-right">PUBLISHED</a>
                        @else
                        @endif
                    </div>
            </form>


        </div>
    </section>
@endsection
