@extends ("layout.app")
@section ('main')
<div class="container-fluid" style="width:50%">
    <h2> Login</h2>
    <br>
    <form action="post" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <textarea class="form-control" name="status" placeholder="Apa Yang Anda Pikirkan"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="Login" value="Login">
        </div>
    </form>
    @endsection


