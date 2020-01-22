@include('inc.header')


<div class="container">
  <div class="row">
    <div class="col-md-6">
      <form class="form-horizontal" method="POST" action='{{url("/edit/{$doctor->id}")}}'>
        @csrf
        <fieldset>
          <legend>Laravel crud application</legend>

          @if(count($errors) > 0)
            @foreach($errors->all() as $error)
              <div class="alert alert-danger">
                {{$error}}
              </div>
            @endforeach
          @endif

          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$doctor->title}}" placeholder="title">
          </div>

          <div class="form-group">
            <label for="description">description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{$doctor->description}}" placeholder="description">
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{url('/')}}" class="btn btn-primary">Back</a>
          
          </div>

        </fieldset>
      </form>

    </div>
  </div>
</div>


@include('inc.footer')



