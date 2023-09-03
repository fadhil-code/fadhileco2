

@extends('layoutECO')
@section('title','ECO seystem')
@section('content')
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m2 w3-hide-small">
  @auth()

      

      

@endauth()

      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
      
      <div class="card4">
  <div class="item4 item4--1">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M17 15.245v6.872a.5.5 0 0 1-.757.429L12 20l-4.243 2.546a.5.5 0 0 1-.757-.43v-6.87a8 8 0 1 1 10 0zm-8 1.173v3.05l3-1.8 3 1.8v-3.05A7.978 7.978 0 0 1 12 17a7.978 7.978 0 0 1-3-.582zM12 15a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" fill="rgba(149,149,255,1)"></path></svg>
    <span class="quantity"> 90+ </span>
    <span class="text4 text4--1"> Icons </span>
  </div>
  <div class="item4 item4--2">
    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0L24 0 24 24 0 24z" fill="none"></path><path fill="rgba(252,161,71,1)" d="M16 16c1.657 0 3 1.343 3 3s-1.343 3-3 3-3-1.343-3-3 1.343-3 3-3zM6 12c2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4 1.79-4 4-4zm10 6c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1zM6 14c-1.105 0-2 .895-2 2s.895 2 2 2 2-.895 2-2-.895-2-2-2zm8.5-12C17.538 2 20 4.462 20 7.5S17.538 13 14.5 13 9 10.538 9 7.5 11.462 2 14.5 2zm0 2C12.567 4 11 5.567 11 7.5s1.567 3.5 3.5 3.5S18 9.433 18 7.5 16.433 4 14.5 4z"></path></svg>    <span class="quantity"> 70+ </span>
    <span class="text4 text4--2"> Illustrations </span>
  </div>
  <div class="item4 item4--3">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M20.083 15.2l1.202.721a.5.5 0 0 1 0 .858l-8.77 5.262a1 1 0 0 1-1.03 0l-8.77-5.262a.5.5 0 0 1 0-.858l1.202-.721L12 20.05l8.083-4.85zm0-4.7l1.202.721a.5.5 0 0 1 0 .858L12 17.65l-9.285-5.571a.5.5 0 0 1 0-.858l1.202-.721L12 15.35l8.083-4.85zm-7.569-9.191l8.771 5.262a.5.5 0 0 1 0 .858L12 13 2.715 7.429a.5.5 0 0 1 0-.858l8.77-5.262a1 1 0 0 1 1.03 0zM12 3.332L5.887 7 12 10.668 18.113 7 12 3.332z" fill="rgba(66,193,110,1)"></path></svg>
    <span class="quantity"> 150+ </span>
    <span class="text4 text4--3"> Components </span>
  </div>
  <div class="item4 item4--4">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 20h8v2h-8C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10a9.956 9.956 0 0 1-2 6h-2.708A8 8 0 1 0 12 20zm0-10a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm-4 4a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm8 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm-4 4a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" fill="rgba(220,91,183,1)"></path></svg>
    <span class="quantity"> 30+ </span>
    <span class="text4 text4--4"> Animations </span>
  </div>
  </div>
  </div>
<br>

      
    <!-- End Right Column -->
    </div>
    
    <!-- Middle Column -->
    @if(session()->has('error'))
            <div class="alert alert-danger">{{session('error')}} </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">{{session('success')}} </div>
        @endif
    <!-- Page Container -->
@yield('content2')
    <!-- Right Column -->

    <div class="w3-col m3 w3-hide-small">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         
         <p class="w3-center"><img src="{{ url('/img/homepagelogo.png') }}" class="" style="height:100%;width:100%" alt="Avatar"></p>
        </div>
      </div>
      @auth()
      @csrf
      <div class="w3-card w3-round w3-white w3-hide-small">
         <div class="cardpro">
            <div class="imagepro"><img src="{{ asset('storage/images/'.auth()->user()->photo) }}" class="w3-circle" style="height:82px;width:82px" ></div>
            <div class="cardpro-info">
              <span>{{auth()->user()->fullname}}</span>
              <p>@foreach ($user_detales as $user_detales1) 

          @foreach($user_detales1->specialties as $user_detal) 

          {{$user_detal->spname}}
          @endforeach
          @endforeach</p>
            </div>
            <a href="{{route('show_edit_info2')}}" class="buttonpro">الملف الشخصي</a>
          </div>  
    </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round ">
      @if (auth()->user()->user_type=="1")
  <a href="{{route('jobsRequests')}}" class="w3-block w3-theme-l1 w3-right-align w3-bar-item w3-button w3-padding-large  w3-hide-small w3-right">
    <i class="fa fa-home w3-margin-right"></i>المتقديمن على الوظائف
  </a>

          @endif
        <div class="w3-white ">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-right-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> الدورات</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>

          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-right-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> الوظائف</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>


          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-right-align"><i class="fa fa-users fa-fw w3-margin-right"></i> الصور</button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="{{ url('/img/lights.jpg') }}" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="{{ url('/img/nature.jpg') }}" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="{{ url('/img/mountains.jpg') }}" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="{{ url('/img/forest.jpg') }}" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="{{ url('/img/nature.jpg') }}" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="{{ url('/img/snow.jpg') }}" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>
        </div>      
      </div>
      <br>
      
      <!-- Interests --> 
      <div class="w3-card w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>المهارات</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">HTML</span>
            <span class="w3-tag w3-small w3-theme-d4">CSS</span>
            <span class="w3-tag w3-small w3-theme-d3">Labels</span>
            <span class="w3-tag w3-small w3-theme-d2">Games</span>
            <span class="w3-tag w3-small w3-theme-d1">Friends</span>
            <span class="w3-tag w3-small w3-theme">Games</span>
            <span class="w3-tag w3-small w3-theme-l1">Friends</span>
            <span class="w3-tag w3-small w3-theme-l2">Food</span>
            <span class="w3-tag w3-small w3-theme-l3">Design</span>
            <span class="w3-tag w3-small w3-theme-l4">Art</span>
            <span class="w3-tag w3-small w3-theme-l5">Photos</span>
          </p>
        </div>
      </div>
      <br>


      @endauth()
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>مرحبا بكم في نظام الايكو في الجامعة التكنولوجية للحصول على الوظائف والدورات الحضورية والالكترونية</p>
      </div>
    
    <!-- End Left Column -->
    </div>
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>
@endsection