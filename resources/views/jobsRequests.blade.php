

@extends('ecolayout2')
@section('content2')
@auth()
<div class="w3-col m7">
        <div class="w3-container w3-card w3-white w3-round w3-margin ">
<h5> الطلبات</h5>
          <div class="mb-3" style="overflow-x:auto;">
                <table class="table ">
                    <thead>
                        <tr>
                          <th scope="col">المنشور</th>
                          <th scope="col">المستخدم</th>
                          <th scope="col">تاريخ التقديم</th>
                          <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach($post_jobs_requests as $post_jobs_request)
                      @if($post_jobs_request->accepted==0)
                      <tr>
                        <th scope="row">
                        <a href=" {{route('postview',$post_jobs_request->pid)}}" class="btn w3-button   w3-padding-small w3-theme-d4 "  title="عرض المنشور">
                        <i class="fa fa-eye"></i></a>
                        {{$post_jobs_request->posts->title}}
                        </th>
                        <th scope="row">
                        <a href="{{route('profiles',$post_jobs_request->uid)}}" class=" " title="عرض الملف الشخصي">

                        <img src="{{ asset('storage/images/'.$post_jobs_request->users->photo) }}" alt="Avatar" class="w3-padding-small w3-right w3-circle " style="width:50px">

                        </a>
                                                {{$post_jobs_request->users->fullname}}
                          
                        </th>
                          <td>{{$post_jobs_request->requestdate}}</td>
                          <td>

                          <td scope="row" >
                          <a href="{{route('jobsRequests.post',[$post_jobs_request->id,1,$post_jobs_request->uid,$post_jobs_request->pid])}}" class=" " title="قبول الطلب">

                                          <button  class=" btn w3-button  w3-green "><i class="fa fa-check"></i></button>
                                          </a>
                              </td>
                          <td>
                          <a href="{{route('jobsRequests.post',[$post_jobs_request->id,2,$post_jobs_request->uid,$post_jobs_request->pid])}}" class=" " title="رفض الطلب">
                          <button type="submit" class=" btn w3-button  w3-red "> <i class="fa fa-remove"></i></button>
                          </a>
                          </td>
                        </tr>
                        @endif
                    @endforeach
                  </tbody>
                </table>

                </div>
       
                </div>

  <!-- End Middle Column -->
  <hr class="w3-clear">
  <div class="w3-container w3-card w3-white w3-round w3-margin ">
<h5> المقبولين</h5>
  <hr class="w3-clear">
          <div class="mb-3" style="overflow-x:auto;">
                <table class="table ">
                    <thead>
                        <tr>
                          <th scope="col">المنشور</th>
                          <th scope="col">المستخدم</th>
                          <th scope="col">تاريخ التقديم</th>
                          <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach($post_jobs_requests as $post_jobs_request)
                      @if($post_jobs_request->accepted==1)
                      <tr>
                        <th scope="row">
                        <a href=" {{route('postview',$post_jobs_request->pid)}}" class="btn w3-button   w3-padding-small w3-theme-d4 "  title="عرض المنشور">
                        <i class="fa fa-eye"></i></a>
                        {{$post_jobs_request->posts->title}}
                        </th>
                        <th scope="row">
                        <a href="{{route('profiles',$post_jobs_request->uid)}}" class=" " title="عرض الملف الشخصي">

                        <img src="{{ asset('storage/images/'.$post_jobs_request->users->photo) }}" alt="Avatar" class="w3-padding-small w3-right w3-circle " style="width:50px">

                        </a>
                                                {{$post_jobs_request->users->fullname}}
                          
                        </th>
                          <td>{{$post_jobs_request->requestdate}}</td>
                          <td>

                          <td scope="row" >
                          <a href="{{route('jobsRequests.post',[$post_jobs_request->id,1,$post_jobs_request->uid,$post_jobs_request->pid])}}" class=" " title="قبول الطلب">

                                          <button  class=" btn w3-button  w3-green "><i class="fa fa-check"></i></button>
                                          </a>
                              </td>
                          <td>
                          <a href="{{route('jobsRequests.post',[$post_jobs_request->id,2,$post_jobs_request->uid,$post_jobs_request->pid])}}" class=" " title="رفض الطلب">
                          <button type="submit" class=" btn w3-button  w3-red "> <i class="fa fa-remove"></i></button>
                          </a>
                          </td>
                        </tr>
                        @endif
                    @endforeach
                  </tbody>
                </table>

                </div>
       
                </div>

  <!-- End Middle Column -->
  <hr class="w3-clear">
  <div class="w3-container w3-card w3-white w3-round w3-margin ">
<h5> المرفوضين</h5>
  <hr class="w3-clear">
          <div class="mb-3" style="overflow-x:auto;">
                <table class="table ">
                    <thead>
                        <tr>
                          <th scope="col">المنشور</th>
                          <th scope="col">المستخدم</th>
                          <th scope="col">تاريخ التقديم</th>
                          <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                      @foreach($post_jobs_requests as $post_jobs_request)
                      @if($post_jobs_request->accepted==2)
                      <tr>
                        <th scope="row">
                        <a href=" {{route('postview',$post_jobs_request->pid)}}" class="btn w3-button   w3-padding-small w3-theme-d4 "  title="عرض المنشور">
                        <i class="fa fa-eye"></i></a>
                        {{$post_jobs_request->posts->title}}
                        </th>
                        <th scope="row">
                        <a href="{{route('profiles',$post_jobs_request->uid)}}" class=" " title="عرض الملف الشخصي">

                        <img src="{{ asset('storage/images/'.$post_jobs_request->users->photo) }}" alt="Avatar" class="w3-padding-small w3-right w3-circle " style="width:50px">

                        </a>
                                                {{$post_jobs_request->users->fullname}}
                          
                        </th>
                          <td>{{$post_jobs_request->requestdate}}</td>
                          <td>

                          <td scope="row" >
                          <a href="{{route('jobsRequests.post',[$post_jobs_request->id,1,$post_jobs_request->uid,$post_jobs_request->pid])}}" class=" " title="قبول الطلب">

                                          <button  class=" btn w3-button  w3-green "><i class="fa fa-check"></i></button>
                                          </a>
                              </td>
                          <td>
                          <a href="{{route('jobsRequests.post',[$post_jobs_request->id,2,$post_jobs_request->uid,$post_jobs_request->pid])}}" class=" " title="رفض الطلب">
                          <button type="submit" class=" btn w3-button  w3-red "> <i class="fa fa-remove"></i></button>
                          </a>
                          </td>
                        </tr>
                        @endif
                    @endforeach
                  </tbody>
                </table>

                </div>
       
                </div>

  
</div>
@endauth()

@endsection
