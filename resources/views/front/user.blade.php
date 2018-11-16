@extends ("layouts.app")
@section('content')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<div class="container emp-profile">
        {!! Form::open(['method'=>'POST','action'=>['UserController@img',$users->id],'files'=>'true']) !!}
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            @if($users->photo!=null)
                            <img src={{asset('images/'.$users->photo->photo)}} alt=""/>
                            @else
                            <i class="fa fa-user" style="font-size:24px"></i>
                            @endif
                            {{-- {{$users->photo->photo}} --}}
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <div class="form-group">
                                        {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-16" style="text-align:center">
                                <div class="form-group">
                                    {!! Form::submit('Change Photo',['class'=>'profile-edit-btn']) !!}
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5 style="margin-bottom: 4em">
                                        {{{$nama}}}
                                    </h5>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::submit('Edit Profile',['class'=>'profile-edit-btn']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$useraktif}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                            <p>{{$nama}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$email}}</p>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Profession</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Web Developer and Designer</p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                @foreach($posts as $post)
                                    <div class="card">
                                        <div class="card-header">
                                        </div>
                                    <div class="card-body">
                                            <blockquote class="blockquote mb-0">
                                                {{$post->post}}
                                                <br><br>
                                            <footer class="blockquote-footer">Create At <cite title="Source Title">{{$post->created_at}}</cite></footer>
                                            </blockquote>
                                    </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}         
        </div>

@endsection