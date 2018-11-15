@extends ("layouts.app")
@section('content')
<div class="containe">
    <div class="container-fluid">
        <h2>Selamat Datang Nestya</h2>
        <br>
        <div class="row">
                        <section class="our_project_area">
                                <div class="container" style="padding-left:50px">
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
                                        <div class="col-md-9" style="position:relative;">
                                            <span style="position:absolute;max-width: 15%;,ax-height: 15%;padding: 10px;text-align: center">tes</span>
                                            <img src="{{asset('img/blog/sb.png')}}" alt="" style="max-width:100%">
                                            <small>Posted by Admin <span style="color: red">Nestya</span></small>
                                            @foreach ($posts as $post)
                                            <div class="col-md-12">
                                                SEMUABISA CINEMA <br>
                                                <p style="text-indent: 25px;text-align: justify">
                                                    {{$posts}}
                                                </p>
                                            </div>
                                            @endforeach
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: center">
                                                        <label for="nama">Nama</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-3" style="text-align: center">
                                                        <label for="nama">Komentar</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea name="" id="" rows="5" class="form-control"></textarea>
                                                    </div>
                                                </div><br>
                                                <div class="pull-right">
                                                    <input type="button" value="Post" class="btn btn-primary btn-sm">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <span style="font-size: 25px;font-weight: bold">21 Comment</span>
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
                                        </div>
                                        <div class="col-md-3">
                                            <span style="font-size: 30px">LATEST POST</span><hr>
                                            <div style="margin:1em;">
                                                <img src="{{asset('img/blog/lates_post.png')}}" alt="" srcset="" style="max-width:100%;"><br>
                                                <small>Camera digunakan banyak orang untuk ...</small>
                                            </div>
                                            <div style="margin:1em;">
                                                <img src="{{asset('img/blog/lates_post.png')}}" alt="" srcset="" style="max-width:100%;"><br>
                                                <small>Camera digunakan banyak orang untuk ...</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
        </div>
        
    </div>
</div>
    @endsection


