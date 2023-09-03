

@extends('ecolayout2')
@section('content2')
@auth()
<div class="w3-col m7">

@if (auth()->user()->user_type=="1")
    
    <div class="w3-row-padding">
      <div class="w3-col m12">
        <div class="w3-card w3-round w3-white">
        <a href="javascript:showHidediv('publishdiv')" style="width: auto" class="w3-bar-item w3-button w3-large w3-padding-small w3-theme-d4  w3-right"><i class="fa fa-user w3-margin-right"></i> نشر منشور جديد</a>

          <div id="publishdiv" style="display:none" class="w3-container w3-padding">
          <form action="{{route('addpost.post')}}" method="POST" class="ms-auto me-auto mt-auto" enctype="multipart/form-data" >
           @csrf
           <div class="mb-3">
           <i class="fa fa-graduation-cap icon"></i>
                <label  class="form-label">التخصص</label>
                <br>
                
                @foreach($specialties as $i=>$specialtie)
                <input type="checkbox" id="htmlsp[{{$i}}]" name="htmlsp[{{$i}}]" value="{{ $specialtie->id }}">
                <label for="vehicle1">{{ $specialtie->spname }}</label>
                @endforeach
                </div>
            <div class="mb-3">
                  <i class="fa fa-briefcase icon"></i>
                  <label  class="form-label">عنوان المنشور</label>
                  <input  class="form-control"  name="title"  >
              </div>
              <div class="mb-3">
                  <i class="fa fa-pencil icon"></i>
                  <label  class="form-label">محتوى المنشور</label>
                  <textarea   class="form-control"  name="body" rows="4" cols="50" > </textarea>
              </div>  
              <div class="mb-3">
                  <i class="fa fa-photo icon"></i><br>
                  <input class="" type="file" id="images[]" name="images[]" accept="image/jpg, image/jpeg, image/png" multiple onchange="preview(this)" >
                  <div class="preview-area"></div>
                  
              </div> 
              
            <button type="submit" class="w3-button w3-green w3-section">نشر</button>
          </form>
            
          </div>
        </div>
      </div>
    </div>
  @endif
  <div class="w3-container w3-card w3-white w3-round w3-margin ">
</div>
  @foreach($postss as $posts)
  @php
  $isvaled=0;
@endphp


    @foreach ($post_special as $post_specials) 
          @if($post_specials->pid==$posts->id)
                          @foreach ($post_specials->specialties as $specialtie)
                          @foreach ($user_detales as $user_detales1) 

                              @foreach($user_detales1->specialties as $user_detal) 
                              @if($user_detal->id==$specialtie->id)
                                                                @php
                                    $isvaled=1;
                                  @endphp
                               @endif
                          @endforeach
                          @endforeach
                          @endforeach
              @endif
                     @endforeach
    @if($isvaled==1)
    @if ($posts->active==1)
    
  <div class="w3-container w3-card w3-white w3-round w3-margin "><br>
          <img src="{{ asset('storage/images/'.$posts->User->photo) }}" alt="Avatar" class="w3-right w3-circle w3-margin-right" style="width:60px">
          <span class="w3-left w3-opacity">{{ $posts->postdate }}</span>
          <h5>{{ $posts->User->fullname }}</h5><br>
          <hr class="w3-clear">
          @php
              $requested=0;
            @endphp
          @foreach($post_jobs_requests as $post_jobs_request)
            @if($post_jobs_request->pid==$posts->id)
                  @php
                    $requested=1;
                  @endphp
              <span class="w3-tag w3-larg "style="background-color: #199543;"><i class="fa fa-check">تم التقديم على هذه الوظيفة </i></span>
              @endif
            @endforeach
            @if($requested==0)

              <span class="w3-tag w3-larg "style="background-color: #3478c7;"><i class="fa fa-certificate"> وظيفة جديدة </i></span>
              @endif
          <p>التخصص   
            @foreach ($post_special as $post_specials) 
          @if($post_specials->pid==$posts->id)
                          @foreach ($post_specials->specialties as $specialtie)
                          {{ $specialtie->spname }} ,
                          @endforeach
              @endif
                     @endforeach

                     </p>
          <p>{{ $posts->title }}</p>
          <p>{{ $posts->body }}</p>
          
          <div class="w3-row-padding" style="margin:0 -16px">
            @foreach($post_photo as $i=>$post_photos)
            @if($posts->id==$post_photos->pid)
              <div class="w3-right">
                <img src="{{ asset('storage/images/posts/'.$post_photos->image) }}" style="height:250px;width:100%" alt="Northern Lights" class="w3-margin-bottom">
              </div>
              @endif
            @endforeach



          </div>
          @php
              $postlike=0;
              $likeid=0;
            @endphp
               @foreach($post_like as $post_likes)
            @if($posts->id==$post_likes->pid)
            @php
              $postlike=1;
              $likeid=$post_likes->id;
            @endphp
            @endif
            @endforeach
            
            @if($postlike!=1)
          @php
          $rout=route('add_post_like.post',$posts->id);
          $likeclass="w3-button w3-theme-d1 w3-margin-bottom ";
          @endphp
            @else
          @php
          $rout=route('delete_post_like.post',$likeid);

            $likeclass="w3-button   w3-red w3-margin-bottom";

            @endphp
            @endif
            <div class="mb-3" style="overflow-x:auto;">
            <table >
                      <tbody>
                          <tr>
                          <td >
                               <form action="{{$rout}}" method="POST"  >
                                 @csrf
                                    <button type="submit" class="{{$likeclass}}"><i class="fa fa-heart"></i>  اعجبني</button> 
                                 
                                  </form>
                          </td>
                          
                          <td >
                              <button type="button" onclick="showHidediv('comment2{{$posts->id}}')" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i> تعليق</button> 
                          </th>
                          <td >
                                @if (auth()->user()->user_type=="2")
                                @if($requested==0)
                                <form action="{{route('add_job_request.post',[$posts->id,$posts->uid])}}" method="POST"  >
                                  @csrf
                                  <button type="submit" class="w3-button w3-theme-d2 w3-margin-bottom" ><i class="fa fa-pencil-square-o" ></i> تقديم</button> 
                                </form>
                                @endif

                                @endif
                            </td>
                            
                          <td >
                          @if (auth()->user()->user_type=="1" and auth()->user()->id==$posts->uid)
                          <form action="{{route('deactive_post.post',$posts->id)}}" method="POST"  >
                                  @csrf
                                  <button type="submit" class="w3-left w3-button w3-theme-d2 w3-margin-bottom " ><i class="fa fa-archive" ></i> ارشفة</button> 
                          </form>
                          @endif

                          </td>

                         
                          </tr>
                    </tbody>
                  </table>
</div>
          <br>

          <div style="overflow:scroll; height:200px; display:none;" id="comment2{{$posts->id}}" >
                <form action="{{route('add_post_comment.post',$posts->id)}}" method="POST"  >
                    @csrf
                <div class="w3-container w3-card w3-white w3-round "><br>

               <input  class="form-control" type="text"  name="comment" id="comment"  >
               <button type="submit" class="  w3-button w3-circle  w3-blue  " ><i class="fa fa-paper-plane" ></i></button> 
          </div>
<br>
    
               @foreach($post_comments as $post_comment)
            @if($posts->id==$post_comment->pid)
                <img src="{{ asset('storage/images/'.$post_comment->users->photo) }}" alt="Avatar" class="w3-padding-small w3-right w3-circle " style="width:60px">
                <span class="w3-right w3-opacity">{{ $post_comment->users->fullname }}</span><br><br>
                <span class="w3-left w3-opacity">{{ $post_comment->commentdate }}</span>
                <span class="w3-right ">{{ $post_comment->comment }}</span><br>
          <hr class="w3-clear">

              @endif
            @endforeach

                </form>
          </div>
          <br>
         
    </div>  
    @endif
    @endif
    @endforeach
    
    
  <!-- End Middle Column -->
  </div>
@endauth()

@endsection
