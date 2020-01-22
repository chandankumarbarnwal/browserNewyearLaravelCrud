@include('inc.header')
  <div class="container">
    <div class="row">
      <legend>Read record of <u>{{$doctor->title}}</u></legend>
          <div>
          <p><b>Title:</b> {{$doctor->title}}</p>
          <p><b>Description:</b> {{$doctor->description}}</p>
      </div>
    </div>
  </div>
@include('inc.footer')
