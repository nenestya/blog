@extends ("layouts.app")
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2">
            ini side bar kiri
        </div>
        <div class="col-md-8">
            <section>
                @if (Session::has('create_post_success'))
                    <div class="alert alert-success">{{ Session('create_post_success') }}</div>     
                @elseif (Session::has('create_post_fail'))
                    <div class="alert alert-danger">{{ Session('create_post_fail') }}</div>
                @endif
                {!! Form::open(['method'=>'post', 'action'=>'PostController@store','files'=>'true']) !!}
                <div class="form-group">
                    {!! Form::label('post','Status') !!}
                    {!! Form::textarea('post',null,['class'=>'form-control','rows'=>'3','placeholder'=>'Ada Berita Apa Hari Ini?'])!!}
                </div>
                <div class="form-group">
                    {!! Form::hidden('user',Auth::user()->name,['class'=>'form-control'])!!}
                </div>    
                <div class="form-group">
                    {!! Form::submit('Simpan',['class'=>'btn btn-primary'])!!}
                </div>
                {!! Form::close() !!}   
                @foreach ($posts as $post)
                    <div class="row">
                        <div class="col-md-12" style="position:relative;">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-10">
                                            {{$post->user}}
                                        </div>
                                        <div class="col-md-2">
                                            @if($post->user == Auth::user()->name)
                                            <div style="float: right;">
                                                    <i id="open" onclick="$('#{{$post->id}}').css('display','block');" class="fa fa-edit" style="font-size:24px"></i>
                                            <a href="{{route('post.destroy',$post->id)}}">
                                                    <i class="fa fa-trash" style="font-size:24px"></i></a>
                                                    </div>
                                            @endif
                                        </div>
                                        <div class="col-md-12" style="display:none" id="{{$post->id}}">
                                                {!! Form::model($post,['method'=>'PUT', 'action'=>['PostController@update',$post->id],'files'=>'true']) !!}
                                                <div class="col-md-12">
                                                     <div class="form-group">
                                                        {!! Form::textarea('post',null,['class'=>'form-control','placeholder'=>'Ada Berita Apa Hari Ini?'])!!}
                                                    </div>
                                                    <div class="form-group">
                                                            {!! Form::submit('Simpan',['class'=>'btn btn-primary'])!!}
                                                            <a class="btn btn-default" onclick="$('#{{$post->id}}').css('display','none');">Batal</a>
                                                        </div>
                                                </div>
                                                {!! Form::close() !!} 
                                                </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        {{$post->post}}
                                        <br><br><br>
                                        <footer class="blockquote-footer">Create At <cite title="Source Title">{{$post->created_at}}</cite></footer>
                                    </blockquote>
                                    <hr>
                                    @foreach ($komentars as $komentar)
                                    @if($komentar->id_post==$post->id)
                                        
                                        <div class="row" style="border-left:1px solid blue; margin:0.5em;padding:5px;background-color:#eee" >
                                            <div class="col-md-2" >
                                                {{$komentar->user}}
                                            </div>
                                            <div class="col-md-10">
                                                {{$komentar->komentar}}
                                                @if($komentar->user == Auth::user()->name)
                                                <div style="float: right;">
                                                 
                                                <i id="open" onclick="$('#{{$komentar->id}}').css('display','block');" class="fa fa-edit" style="font-size:24px"></i>
                                            
                                                </div>
                                            <div style="display:none" id="{{$komentar->id}}">
                                                    {!! Form::model($komentar,['method'=>'PUT', 'action'=>['KomentarController@update',$komentar->id],'files'=>'true']) !!}
                                                    <div class="col-md-10">
                                                         <div class="form-group">
                                                            {!! Form::text('komentar',null,['class'=>'form-control','placeholder'=>'Ada Berita Apa Hari Ini?'])!!}
                                                        </div>
                                                        <div class="form-group">
                                                                {!! Form::submit('Simpan',['class'=>'btn btn-primary'])!!}
                                                                <a class="btn btn-default" onclick="$('#{{$komentar->id}}').css('display','none');">Batal</a>
                                                            </div>
                                                    </div>
                                                    {!! Form::close() !!} 
                                                    </div>
                                                 @else
                                                can view
                                            @endif
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                 
                                            {!! Form::open(['method'=>'post', 'action'=>['KomentarController@store'],'files'=>'true']) !!}
                                        <div class="row"> 
                                            <div class="col-md-10">
                                                 <div class="form-group">
                                                    {!! Form::text('komentar',null,['class'=>'form-control','placeholder'=>'Ada Berita Apa Hari Ini?'])!!}
                                                    {!! Form::hidden('id_post',$post->id,['class'=>'form-control'])!!}
                                                    {!! Form::hidden('user',Auth::user()->name,['class'=>'form-control','placeholder'=>'Ada Berita Apa Hari Ini?'])!!}
                                                </div> 
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    {!! Form::submit('Simpan',['class'=>'btn btn-primary'])!!}
                                                   
                                                </div>
                                            </div> 
                                            {!! Form::close() !!} 
                                        </div>
                                     
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <br>
                        @endforeach
                    </section>
                    </div>
        <div class="col-md-1">
            ini kanan
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

        // $(document).ready(function(){
        //     var Status=false;
        //     $('#open').click(function(){
        //         if(Status==false){
        //             $('#view').css('display','block');
        //             Status=true;
        //         }else{
        //             $('#view').css('display','none');
        //             Status=false;
        //         }
        //     });
        // });
        
        </script>
@endsection


