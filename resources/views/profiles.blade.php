

@extends('ecolayout2')
@section('content2')
@auth()
<div class="w3-col m7">
<div  class="w3-container w3-card w3-white w3-round w3-margin "><br>
        <a href="javascript:showHidediv('personaldiv')" style="width: 100%" class="w3-bar-item w3-button w3-large w3-padding-small w3-theme-d4  w3-right"><i class="fa fa-user w3-margin-right"></i> المعلومات الشخصية </a>
      <div id="personaldiv" style="display:none" class="w3-row-padding" style="margin:0 -16px">
          <!-- <form action="/editinfo/<?php echo $Users[0]->id; ?>" method="POST" class="ms-auto me-auto mt-auto" enctype="multipart/form-data">
         --> 
         <img id="output" src="{{ asset('storage/images/'.$Users[0]->photo) }}" class="w3-circle" style="height:106px;width:106px" alt="Avatar">

              <div class="mb-3">
              <span class="w3-right ">{{ $Users[0]->fullname }}</span>
              <br>
              <span class="w3-right "><i class=" fa fa-envelope icon"></i> {{ $Users[0]->email }}</span>
              <br>
              <span class="w3-right "><i class=" fa fa-phone icon"></i> {{ $users_contacts[0]->phone }}</span>
              <br>
              <span class="w3-right "><i class=" fa fa-facebook icon"></i> {{ $users_contacts[0]->facebook }}</span>
              <br>
              <span class="w3-right "><i class=" fa fa-telegram icon"></i> {{ $users_contacts[0]->telegram }}</span>
              <br>
              <span class="w3-right "><i class=" fa fa-instagram icon"></i> {{ $users_contacts[0]->instagram }}</span>
              <br>
              <span class="w3-right "><i class=" fa fa-linkedin icon"></i> {{ $users_contacts[0]->linkedin }}</span>
            </div>
 

      </div>
      <br>
        <hr class="w3-clear">
        <a href="javascript:showHidediv('adressdiv')" style="width: 100%" class="w3-bar-item w3-button w3-large w3-padding-small w3-theme-d4  w3-right"><i class="fa fa-home w3-margin-right"></i> معلومات السكن والاقامة</a>
        <div id="adressdiv" style="display:none" class="w3-row-padding" style="margin:0 -16px">
        <div class="mb-3">

              <span class="w3-right "><i class=" fa fa-flag icon"></i> {{ $users_address[0]->country }}</span>
              <br>
              <span class="w3-right "><i class=" fa fa-building icon"></i> {{ $users_address[0]->city }}</span>
        </div>
        </div>
        <br>
        <hr class="w3-clear">
        <a href="javascript:showHidediv('studydiv')" style="width: 100%" class="w3-bar-item w3-button w3-large w3-padding-small w3-theme-d4  w3-right"><i class="fa fa-graduation-cap w3-margin-right"></i> التحصيل الدراسي</a>
        <div id="studydiv" style="display:none" class="w3-row-padding" style="margin:0 -16px">
          <div class="mb-3" style="overflow-x:auto;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th scope="col">الشهادة</th>
                          <th scope="col">التخصص</th>
                          <th scope="col">الجامعة</th>
                          <th scope="col">الكلية</th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach($users_studes as $users_studey)
                        <tr>
                          <th scope="row">{{$users_studey['stname']}}</th>
                          <td>{{$users_studey['special']}}</td>
                          <td>{{$users_studey['university']}}</td>
                          <td>{{$users_studey['collage']}}</td>

                        </tr>
                    @endforeach
                  </tbody>
                </table>


  
                </div>
       
        </div>
        <br>

        
        <hr class="w3-clear">
        <a href="javascript:showHidediv('skildiv')" style="width: 100%" class="w3-bar-item w3-button w3-large w3-padding-small w3-theme-d4  w3-right"><i class="fa fa-globe w3-margin-right">
        </i> المهارات والشهادات </a>
        <div id="skildiv" style="display:none" class="w3-row-padding" style="margin:0 -16px">
          <div class="mb-3" style="overflow-x:auto;"> 
                <table class="table table-bordered">
                    <thead>
                        <tr>
                          <th scope="col">نوع المهارة</th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach($users_skills as $users_skill)
                        <tr>
                          <th scope="row">{{$users_skill['skname']}}</th>
     
                        </tr>
                    @endforeach
                  </tbody>
                </table>


                <br>
            </div>
            <br>

        <hr class="w3-clear">
                
                <div class="mb-3" style="overflow-x:auto;">
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                          <th scope="col">عنوان الشهادة</th>
                          <th scope="col">تاريخ الحصول</th>

                          </tr>
                      </thead>
                      <tbody>
                        @foreach($users_cirtificates as $users_cirtificate)
                          <tr>
                          <th scope="row">{{$users_cirtificate['cname']}}</th>
                          <th scope="row">{{$users_cirtificate['date1']}}</th>
  
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <br>
                </div>
                <br>
   
                <hr class="w3-clear">

               <div class="mb-3" style="overflow-x:auto;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">اللغة</th>
                        <th scope="col">النسبة</th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach($users_langs as $users_lang)
                        <tr>
                        <th scope="row">{{$users_lang['langname']}}</th>
                        <th scope="row">{{$users_lang['pres']}}</th>
     
                        </tr>
                    @endforeach
                  </tbody>
                </table>
  
            </div>


        </div>

        <br>
        <hr class="w3-clear">
        <a href="javascript:showHidediv('jobsdiv')" style="width: 100%" class="w3-bar-item w3-button w3-large w3-padding-small w3-theme-d4  w3-right"><i class="fa fa-briefcase w3-margin-right">
        </i> الوظائف السابقة </a>
        <div id="jobsdiv" style="display:none" class="w3-row-padding" style="margin:0 -16px">
        <div class="mb-3" style="overflow-x:auto;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">العنوان الوظيفي</th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach($users_jobs as $users_job)
                        <tr>
                        <th scope="row">{{$users_job['jobtitle']}}</th>

                        </tr>
                    @endforeach
                  </tbody>
                </table>
  
            </div>

          </div>

        <br>
    </div>  
  <!-- End Middle Column -->
</div>
@endauth()

@endsection
