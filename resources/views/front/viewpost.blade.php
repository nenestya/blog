@extends ("layouts.app")
@section('content')
<div class="containe">
    <div class="container-fluid">
        <h2>Selamat Datang  {{ Auth::user()->name }}</h2>
        <br>
        <div class="row">
                        <section class="our_project_area">
                                <div class="container" style="padding-left:50px">
                                        <div class="contianer">
                                                @if (Session::has('create_post_success'))
    
                                                <div class="alert alert-success">{{ Session('create_post_success') }}</div>
                                            
                                                @elseif (Session::has('create_post_fail'))
                                            
                                                <div class="alert alert-danger">{{ Session('create_post_fail') }}</div>
                                                @endif
                                            </div>
                                    <div class="container-fluid">
                                            {!! Form::open(['method'=>'post', 'action'=>'PostController@store','files'=>'true']) !!}
                                            <div class="form-group">
                                                {!! Form::label('post','Status') !!}
                                                {!! Form::textarea('post',null,['class'=>'form-control','placeholder'=>'Ada Berita Apa Hari Ini?'])!!}
                                            </div>
                                            <div class="form-group">
                                                    {!! Form::submit('Simpan',['class'=>'btn btn-primary'])!!}
                                                </div>
                                            {!! Form::close() !!} 
                                    </div>
                                    
                                    <div class="row">
                                            @foreach ($posts as $post)
                                        <div class="col-md-9" style="position:relative;">
                                            
                                            <div class="card">
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-md-10">
                                                                    {{$post->user}}
                                                            </div>
                                                            <div class="col-md-2">
                                                              @if($post->user == Auth::user()->name)
                                                                can edit
                                                                @else
                                                                can view
                                                                @endif
                                                            </div>
                                                        </div>
                                                            
                                                    </div>
                                                    <div class="card-body">
                                                      <blockquote class="blockquote mb-0">
                                                            {{$post->post}}
                                                            <br><br><br>
                                                        <footer class="blockquote-footer">Create At <cite title="Source Title">{{$post->created_at}}</cite></footer>
                                                      </blockquote>
                                                    </div>
                                                  </div>
                                            <br><br>
                                        
                                            <div class="col-md-12">
                                                <span style="font-size: 17px;font-weight: bold">Comment</span>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                                        <img src="{{asset('img/blog/lates_post.png')}}" alt="" srcset="" style="max-width:100%;">
                                                    </div>
                                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                                        <label for="commentName">Nestya</label>
                                                        <small>May 22, 2017 AT 5:48 AM</small><br>
                                                        <p>
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi omnis modi voluptatem perferendis
                                                            quo! Vero, excepturi fugiat delectus quibusdam aut ratione optio beatae est id dignissimos quae perferendis dolorem doloribus.
                                                        </p>
                                                        <br>
                        
                                                    </div>
                                                </div><br>
                                            </div>
                                            <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-2" style="text-align: center">
                                                            <label for="nama">Komentar</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <textarea name="" id="" rows="5" class="form-control"></textarea>
                                                            <br>
                                                            <div class="pull-right">
                                                                    <input type="button" value="Post" class="btn btn-primary btn-sm">
                                                                </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>
        </div>
        
    </div>
</div>
    @endsection


