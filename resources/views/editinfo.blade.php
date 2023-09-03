@extends('ecolayout2')
@section('title','المعلومات الشخصية')
@section('content2')

<div class="w3-col m7">

    <div  class="w3-container w3-card w3-white w3-round w3-margin "><br>
    
        <a href="javascript:showHidediv('personaldiv')" style="width: 100%" class="w3-bar-item w3-button w3-large w3-padding-small w3-theme-d4  w3-right"><i class="fa fa-user w3-margin-right"></i> الحساب الشخصي</a>
      <div id="personaldiv" style="display:none" class="w3-row-padding" style="margin:0 -16px">
          <!-- <form action="/editinfo/<?php echo $Users[0]->id; ?>" method="POST" class="ms-auto me-auto mt-auto" enctype="multipart/form-data">
         --> 
         <form action="{{route('show_edit_info2.post')}}" method="POST" class="ms-auto me-auto mt-auto" enctype="multipart/form-data">
               @csrf
              <div class="mb-3">
                 <i class="fa fa-briefcase icon"></i>
                <label  class="form-label">الصورة</label>
                <input type="file" class="form-control" name="image" id="image" onchange="readURL(event);" accept="image/jpg, image/jpeg, image/png">
                
                <img id="output" src="{{ asset('storage/images/'.$Users[0]->photo) }}" class="w3-circle" style="height:106px;width:106px" alt="Avatar">
                 
            </div>
            <div class="mb-3">
                 <i class="fa fa-user icon"></i>
                <label  class="form-label">الاسم</label>
                <input  class="form-control"  name="fullname" value = '<?php echo $Users[0]->fullname; ?>' >
            </div>
            <div class="mb-3">
            <i class="fa fa-envelope icon"></i>
              <label  class="form-label">البريد الالكتروني</label>

              <input class="form-control" type="email" class="input-res" name="email" value = '<?php echo $Users[0]->email; ?>'>
            </div>
            <div class="mb-3">
              <i class="fa fa-phone icon"></i>
              <label  class="form-label">رقم الهاتف</label>
              <input class="form-control" type="tel" id="phone" name="phone" pattern="[0-9]{11}" placeholder="07*********" class="input-res" value = '<?php echo $users_contacts[0]->phone; ?>'>
            </div>
            <div class="mb-3">
              <i class="fa fa-facebook icon"></i>
              <label  class="form-label">حساب الفيسبوك</label>
              <input class="form-control" style="text-align:left;" type="url" id="facebook" name="facebook"  placeholder="www.facebook.com/@username" class="input-res" value = '<?php echo $users_contacts[0]->facebook; ?>'>
            </div>
            <div class="mb-3">
              <i class="fa fa-instagram icon"></i>
              <label  class="form-label">حساب الانستاكرام</label>
              <input class="form-control"  style="text-align:left;" type="url" id="instagram" name="instagram"  placeholder="www.instagram.com/@username" class="input-res" value = '<?php echo $users_contacts[0]->instagram; ?>'>
            </div>
            <div class="mb-3">
              <i class="fa fa-telegram icon"></i>
              <label  class="form-label">قناة التليكرام</label>
              <input class="form-control" style="text-align:left;" type="url" id="telegram" name="telegram"  placeholder="www.t.me/@username" class="input-res" value = '<?php echo $users_contacts[0]->telegram; ?>'>
            </div>
            <div class="mb-3">
              <i class="fa fa-linkedin icon"></i>
              <label  class="form-label">حساب اللنكدن</label>
              <input class="form-control" style="text-align:left;" type="url" id="linkedin" name="linkedin"  placeholder="www.linkedin.com/@username" class="input-res" value = '<?php echo $users_contacts[0]->linkedin; ?>'>
            </div>

            <button type="submit" class="w3-button w3-green w3-section">تحديث</button>
          </form>
      </div>
      <br>
        <hr class="w3-clear">
        <a href="javascript:showHidediv('adressdiv')" style="width: 100%" class="w3-bar-item w3-button w3-large w3-padding-small w3-theme-d4  w3-right"><i class="fa fa-home w3-margin-right"></i> معلومات السكن والاقامة</a>
        <div id="adressdiv" style="display:none" class="w3-row-padding" style="margin:0 -16px">
          <form action="{{route('editadress2.post')}}" method="POST" class="ms-auto me-auto mt-auto" >
              @csrf   
            <div class="mb-3">
                  <i class="fa fa-flag icon"></i>
                  <label  class="form-label">البلد</label>
                  <input  class="form-control"  name="country" value = '<?php echo $users_address[0]->country; ?>' >
            </div>
            <div class="mb-3">
                <i class="fa fa-building icon"></i>
                <label  class="form-label">المدينة</label>
                <input  class="form-control"  name="city" value = '<?php echo $users_address[0]->city; ?>' >
            </div>
            <button type="submit" class="w3-button w3-green w3-section">تحديث</button>
            </form>
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
                          <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach($users_studes as $users_studey)
                        <tr>
                          <th scope="row">{{$users_studey['stname']}}</th>
                          <td>{{$users_studey['special']}}</td>
                          <td>{{$users_studey['university']}}</td>
                          <td>{{$users_studey['collage']}}</td>
                          <td>
                          <form action="{{route('delete_study2.post',$users_studey->id)}}" method="POST" class="ms-auto me-auto mt-auto" >
                                @csrf
                                  <button type="submit" class=" btn btn-danger w3-section">حذف</button>
                              </form>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>


                  <a href="javascript:showHidediv('studydiv2')" style="width: auto" class=" w3-button w3-small w3-padding-small w3-theme-d4  w3-right"><i class="fa fa-plus w3-margin-right"></i> اضافة شهادة جديدة</a>
  
                </div>
       
        </div>
        <div id="studydiv2" style="display:none" class="w3-row-padding" style="margin:0 -16px">
         <form action="{{route('addstudy2.post')}}" method="POST" class="ms-auto me-auto mt-auto" >
           @csrf

          <div class="mb-3">
                 <i class="fa fa-certificate icon"></i>
                <label  class="form-label">الشهادة</label>
                <input  class="form-control"  name="stname"  >
            </div>
            <div class="mb-3">
                <i class="fa fa-graduation-cap icon"></i>
                <label  class="form-label">التخصص</label>
                <input  class="form-control"  name="special"  >
            </div>
            <div class="mb-3">
                <i class="fa fa-building icon"></i>
                <label  class="form-label">اسم الجامعة</label>
                <input  class="form-control"  name="university"  >
            </div>
            <div class="mb-3">
                <i class="fa fa-building icon"></i>
                <label  class="form-label">اسم الكلية</label>
                <input  class="form-control"  name="collage"  >
            </div>
            <div class="mb-3">
                <i class="fa fa-flag icon"></i>
                <label  class="form-label">الدولة</label>
                <input  class="form-control"  name="stcountry"  >
            </div>
            <div class="mb-3">
                <i class="fa fa-building-o icon"></i>
                <label  class="form-label">المدينة</label>
                <input  class="form-control"  name="stcity"  >
            </div>
            <div class="mb-3">
                <i class="fa fa-calendar icon"></i>
                <label  class="form-label">تاريخ القبول</label>
                <input type="date" class="form-control"  name="stdate1"  >
            </div>
            <div class="mb-3">
                 <i class="fa fa-calendar icon"></i>
                <label  class="form-label">تاريخ التخرج</label>
                <input type="date" class="form-control"  name="stdate2"  >
            </div>

           
            <button type="submit" class="w3-button w3-green w3-section">اضافة</button>
          </form>
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
                          <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach($users_skills as $users_skill)
                        <tr>
                          <th scope="row">{{$users_skill['skname']}}</th>
                          <td>
                          <form action="{{route('delete_skill.post',$users_skill->id)}}" method="POST" class="ms-auto me-auto mt-auto" >
                                @csrf
                                  <button type="submit" class=" btn btn-danger w3-section">حذف</button>
                              </form>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>


                <a href="javascript:showHidediv('skildiv2')" style="width: auto" class=" w3-button w3-small w3-padding-small w3-theme-d4  w3-right"><i class="fa fa-plus w3-margin-right"></i> اضافة مهارة جديدة</a>
                <br>
            </div>
          <div id="skildiv2" style="display:none" class="w3-row-padding" style="margin:0 -16px">
                  <form action="{{route('addskils.post')}}" method="POST" class="ms-auto me-auto mt-auto" >
                    @csrf
                      <div class="mb-3">
                          <i class="fa fa-fort-awesome icon"></i>
                          <label  class="form-label">المهارة</label>
                          <input  class="form-control"  name="skname"  >
                      </div>
                      
                      <button type="submit" class="w3-button w3-green w3-section">اضافة</button>
                      
                    </form>
                  </div>
        <hr class="w3-clear">
                
                <div class="mb-3" style="overflow-x:auto;">
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                          <th scope="col">عنوان الشهادة</th>
                          <th scope="col">تاريخ الحصول</th>
                            <th scope="col"></th>

                          </tr>
                      </thead>
                      <tbody>
                        @foreach($users_cirtificates as $users_cirtificate)
                          <tr>
                          <th scope="row">{{$users_cirtificate['cname']}}</th>
                          <th scope="row">{{$users_cirtificate['date1']}}</th>
                            <td>
                            <form action="{{route('delete_cirtificate.post',$users_cirtificate->id)}}" method="POST" class="ms-auto me-auto mt-auto" >
                                  @csrf
                                    <button type="submit" class=" btn btn-danger w3-section">حذف</button>
                                </form>
                            </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <a href="javascript:showHidediv('skildiv3')" style="width: auto" class=" w3-button w3-small w3-padding-small w3-theme-d4  w3-right"><i class="fa fa-plus w3-margin-right"></i> اضافة شهادة خبرة جديدة</a>
                  <br>
                </div>
                <div id="skildiv3" style="display:none" class="w3-row-padding" style="margin:0 -16px">
                 <form action="{{route('addcirtificate.post')}}" method="POST" class="ms-auto me-auto mt-auto" >
                  @csrf

                    <div class="mb-3">
                        <i class="fa fa-certificate icon"></i>
                        <label  class="form-label">عنوان الشهادة</label>
                        <input  class="form-control"  name="cname" value =  >
                    </div>
                    <div class="mb-3">
                        <i class="fa fa-calendar icon"></i>
                        <label  class="form-label">تاريخ الحصول على الشهادة</label>
                        <input type="date" class="form-control"  name="date1"  >
                    </div>

                    <button type="submit" class="w3-button w3-green w3-section">اضافة</button>
                  </form>
                </div>
                <hr class="w3-clear">

               <div class="mb-3" style="overflow-x:auto;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">اللغة</th>
                        <th scope="col">النسبة</th>
                          <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach($users_langs as $users_lang)
                        <tr>
                        <th scope="row">{{$users_lang['langname']}}</th>
                        <th scope="row">{{$users_lang['pres']}}</th>
                          <td>
                          <form action="{{route('delete_lang.post',$users_lang->id)}}" method="POST" class="ms-auto me-auto mt-auto" >
                                @csrf
                                  <button type="submit" class=" btn btn-danger w3-section">حذف</button>
                              </form>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <a href="javascript:showHidediv('skildiv4')" style="width: auto" class=" w3-button w3-small w3-padding-small w3-theme-d4  w3-right"><i class="fa fa-plus w3-margin-right"></i> اضافة لغة جديدة</a>
  
            </div>
              <div id="skildiv4" style="display:none" class="w3-row-padding" style="margin:0 -16px">
                  <form action="{{route('addlang.post')}}" method="POST" class="ms-auto me-auto mt-auto" >
                @csrf

                  <div class="mb-3">
                      <i class="fa fa-language" aria-hidden="true"></i>
                      <label  class="form-label">اللغة</label>
                      <input  class="form-control"  name="langname"  >
                  </div>
                  <div class="mb-3">
                      <i class="fa fa-globe" aria-hidden="true"></i>
                      <label  class="form-label">نسبة المعرفة</label>
                      <input  class=" slider" type="range" name="pres" min="10" max="100"  >
                  </div>
                  <button type="submit" class="w3-button w3-green w3-section">اضافة</button>
                    </form>
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
                          <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach($users_jobs as $users_job)
                        <tr>
                        <th scope="row">{{$users_job['jobtitle']}}</th>
                          <td>
                          <form action="{{route('delete_job.post',$users_job->id)}}" method="POST" class="ms-auto me-auto mt-auto" >
                                @csrf
                                  <button type="submit" class=" btn btn-danger w3-section">حذف</button>
                              </form>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
                <a href="javascript:showHidediv('jobsdiv2')" style="width: auto" class=" w3-button w3-small w3-padding-small w3-theme-d4  w3-right"><i class="fa fa-plus w3-margin-right"></i> اضافة وظيفة جديدة</a>
  
            </div>
        <div id="jobsdiv2" style="display:none" class="w3-row-padding" style="margin:0 -16px">
         <form action="{{route('addjob.post')}}" method="POST" class="ms-auto me-auto mt-auto" >
           @csrf
          <div class="mb-3">
                 <i class="fa fa-briefcase icon"></i>
                <label  class="form-label">عنوان العمل</label>
                <input  class="form-control"  name="jobtitle"  >
            </div>
            
            <button type="submit" class="w3-button w3-green w3-section">اضافة</button>
          </form>
          </div>
          </div>

        <br>
    </div>  

    
  <!-- End Middle Column -->
  </div>
@endsection
