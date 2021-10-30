@extends('layouts.dashboard')

@section('content')
<div class="dashboard-wrapper" >
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <ul class="list-group">
                    <li class="list-group-item {{ (Illuminate\Support\Facades\Route::currentRouteName())=='home'? 'active' :'' }}"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="list-group-item {{ (Illuminate\Support\Facades\Route::currentRouteName())=='profile'? 'active' :'' }}"><a href="{{route('profile')}}">Profile</a></li>
                  </ul>
            </div>
            <div class="col-sm-12 col-md-8">
                @foreach ($Courses as $course)
                 @foreach ($carts as $cart)
                 @foreach ($cart->items as $item)
                 @if ($course->title==$item['title'])
                 <div class="col mb-4">
                    <div class="card">
                        <img src="{{asset('/storage/'.$course->image)}}" class="card-img-top" alt="..." width="200" height="250" >
                        <div class="card-body">
                          <h5 class="card-title font-weight-bold ">{{ $course->title}}</h5>
                          <small class="text-muted">{{ $course->created_at->format('Y/m/d')}}</small>
                          <p class="text-muted font-weight-bold ">{{ $course->description}}</p>
                        </div>
                        <div class="card-footer">
                        <a href="{{route('one-course',$course->id)}}" class="btn btn-outline-success">GET STARTED</a>
                        </div>
                    </div>

                </div>
                 @endif
                 @endforeach
                 @endforeach
                @endforeach
            </div>
        </div>
    </div>

</div>

@endsection
