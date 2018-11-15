@extends ("layout.app")
@section ('main')
<div class="container-fluid" style="width:50%">
    <h2>Daftar</h2>
    <br>
    <form action="#" method="POST" enctype="multipart/form-data">

        <div class="form-group">
          <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" >
        </div>
        <div class="form-group">
                <input type="text" class="form-control" name="user" placeholder="User" >
              </div>
        <div class="form-group">
          <input type="password" class="form-control" name="psw" placeholder="Password">
        </div>
        <div class="form-group">
                <input type="password" class="form-control" name="psw" placeholder="Confirm Password">
              </div>
        <div class="form-group">
            <input type="button" class="btn btn-primary" name="Login" value="Login">
    @endsection


