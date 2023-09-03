@extends('ecolayout2')
@section('title','المعلومات الشخصية')
@section('content2')

<div class="w3-col m7">
    

    
    <div class="w3-container w3-card w3-white w3-round w3-margin "><br>
    <p>المعلومات الشخصية:</p>
      <hr class="w3-clear">
        <div class="w3-row-padding" style="margin:0 -16px">
        <form action="/editinfo/<?php echo $Users[0]->id; ?>" method="POST" class="ms-auto me-auto mt-auto" style="width:500px">
            @csrf
        <div class="mb-3">
            <label  class="form-label">الاسم</label>
            <input  class="form-control"  name="fullname" value = '<?php echo $Users[0]->fullname; ?>' >
        </div>
        <div class="mb-3">
        <label  class="form-label">البريد الالكتروني</label>

        <input class="form-control" type="email" class="input-res" name="email" value = '<?php echo $Users[0]->email; ?>'>
        </div>
        
       
        <button type="submit" class="btn btn-primary">تحديث</button>
        </form>
      </div>
    </div>
    

    
  <!-- End Middle Column -->
  </div>
@endsection
