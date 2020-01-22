@include('inc.header')
  <div class="container">
    <div class="row">
      <legend>Laravel crud application</legend>

  <div class="row">
            <div class="">
              @if(session('info'))
                <div class="alert alert-success">
                  {{session('info')}}
                </div>
              @endif    
            </div>
          </div>


      <table class="table table-hover">

        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">descrition</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

        <tbody>
          @if(count($doctors) > 0)
            @foreach($doctors as $doctor)
              <tr>
                <td scope="row">{{$doctor->id}}</td>
                <td class="linebreaking">{{$doctor->title}}</td>
                <td class="linebreaking">{{$doctor->description}}</td>
                <td>
                  <a href='{{url("read/{$doctor->id}")}}' class="badge badge-primary">Read </a>|
                  <a href='{{url("update/{$doctor->id}")}}' class="badge badge-success">Update </a>|
                  <a href='{{url("delete/{$doctor->id}")}}' class="badge badge-danger"> Delete</a>
                </td>
              </tr>
            @endforeach  
          @endif
        </tbody>

      </table> 

    </div>
  </div>

@include('inc.footer')



















