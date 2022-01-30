@extends('front.master')


@section('content')
<!--inside-article-->
<div class="all-requests">
    <div class="container">
        <div class="path">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url(route('home'))}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">طلبات التبرع</li>
                </ol>
            </nav>
        </div>

        <!--requests-->
        <div class="requests">
            <div class="head-text">
                <h2>طلبات التبرع</h2>
            </div>
            <div class="content">
                <form class="row filter">
                    <div class="col-md-5 blood">
                        <div class="form-group">
                            <div class="inside-select">
                                <label for="exampleFormControlSelect1"></label><select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر فصيلة الدم</option>
                                    @foreach($blood_types as $blood_type)
                                    <option>{{$blood_type->name}}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 city">
                        <div class="form-group">
                            <div class="inside-select">
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>اختر المدينة</option>
                                    @foreach($governorates as $governorate)
                                    <option>{{$governorate->name}}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 search">
                        <button type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <div class="patients">
                    @foreach($donation_requests as $donation_request)
                        <div class="details">
                        <div class="blood-type">
                            <h2 dir="ltr">{{$donation_request->bloodType->name}}</h2>
                        </div>
                        <ul>
                            <li><span>اسم الحالة:</span>{{$donation_request->patient_name}}</li>
                            <li><span>مستشفى:</span> {{$donation_request->hospital_name}}</li>
{{--                            <li><span>المدينة:</span> {{$donation_request->city->name}}</li>--}}
                            <li><span>المدينة:</span> {{optional($donation_request->city)->name}}</li>
                        </ul>
                         <a href="{{url(route('request-details'))}}">التفاصيل</a>

                    </div>
                    @endforeach
                        {{ $donation_requests->links() }}
{{--                <div class="pages">--}}
{{--                    <nav aria-label="Page navigation example" dir="ltr">--}}
{{--                        <ul class="pagination">--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                    <span aria-hidden="true">&laquo;</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                           --}}
{{--                            <li class="page-item"><a class="page-link active" href="#">1</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">5</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">6</a></li>--}}
{{--                            <li class="page-item">--}}
{{--                                <a class="page-link" href="#" aria-label="Next">--}}
{{--                                    <span aria-hidden="true">&raquo;</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </nav>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>



<!--footer-->
@endsection
