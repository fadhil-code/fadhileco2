@extends('ecolayout2')
@section('title','ECO seystem')



@section('content2')
  <!-- The Grid -->

   <!-- Left Column -->

    <!-- Middle Column -->
    <div class="w3-col m7">

      



<div class="cardl">
    <a href="{{route('registration')}}" style="width: auto" class="w3-bar-item  w3-padding-large "><i class="fa fa-user-plus "></i> انشاء حساب</a>

    <form action="{{route('login.post')}}" method="POST" class="" >
            @csrf
            <div class="mb-3">
                        <div class="inputlog-container">
                          <input placeholder="البريد الالكتروني" type="email" class="inputlog-field" name="email">
                          <label for="inputlog-field" class="inputlog-label">ادخل البريد الالكتروني</label>
                          <span class="inputlog-highlight"></span>
                        </div>
            </div>
                  <div class="mb-3">
                    <div class="inputlog-container">
                        <input placeholder="كلمة المرور" type="password" class="inputlog-field" name="password" >
                        <label for="inputlog-field" class="inputlog-label">ادخل كلمة المرور</label>
                          <span class="inputlog-highlight"></span>
                          </div>
                    </div>
                    <button type="submit" class="contactButton"> تسجيل الدخول
      <div class="iconButton">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
  </div>
      </button>
        </form>

</div>
<br>

      

      

      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->

  
      <!-- Accordion -->
      
   
    <!-- End Left Column -->
    
  <!-- End Grid -->
  
<!-- End Page Container -->
@endsection