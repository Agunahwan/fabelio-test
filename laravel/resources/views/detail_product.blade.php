@extends('master_page.master')
@section('title') :: Detail Produk ::
@stop
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Detail Product</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<form class="form-horizontal" role="form">
    <div class="row split-border">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="col-sm-5 control-label">Name</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control input-large" value="{{{ $name or '' }}}" disabled required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">Current Price</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control input-large" value="{{{ $price or '' }}}" disabled required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-5 control-label">Description</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control input-large" value="{{{ $description or '' }}}" disabled
                        required>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <div class="col-sm-12">
                    <img src="<?=$image_url?>" alt="<?=$name?>" style="max-width:100%;max-height:100%">
                </div>
            </div>
        </div>
    </div>
</form>
<br />
<form class="form-horizontal" method="POST" action="{{ route('comment/add') }}" role="form">
    {{ csrf_field() }}
    <input type="hidden" id="product_id" name="product_id" value="{{{ $id or '' }}}" />
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading" data-toggle="collapse" data-target="#searchBody" aria-expanded="true">Comment
                </div>
                <ul class="list-group collapse in" id="searchBody" aria-expanded="true">
                    <li class="list-group-item">
                        <div class="row form-search">
                            <div class="form-group col-md-12">
                                <label class="col-sm-2 control-label label-search" for="title">Title
                                    :</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="title" name="title"
                                            placeholder="Title" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-search">
                            <div class="form-group col-md-12">
                                <label class="col-sm-2 control-label label-search" for="comment">Comment
                                    :</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <textarea id="comment" class="form-control" placeholder="Comment" name="comment"
                                            rows="5" cols="50"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" id="submit_comment" value="Submit" />
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</form>
<form class="form-horizontal" role="form">
    <div class="row split-border">
        <div class="col-lg-12">
            @for ($i = 0; $i < count($comment); $i++) 
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{ $comment[$i]->title }} ( {{ $comment[$i]->created_date }} )</h3>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                {{ $comment[$i]->comment }}
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <a href="#" onclick="vote({{ $comment[$i]->id }}, 1)">
                    <div id="voteUp{{ $comment[$i]->id }}" class="glyphicon glyphicon-thumbs-up"> {{ $comment[$i]->Up }}
                    </div>
                </a>
            </div>
            <div class="col-lg-2">
                <a href="#" onclick="vote({{ $comment[$i]->id }}, 0)">
                    <div id="voteDown{{ $comment[$i]->id }}" class="glyphicon glyphicon-thumbs-down">
                        {{ $comment[$i]->Down }}</div>
                </a>
            </div>
        </div>
        <hr />
        @endfor
    </div>
    </div>
</form>
<!-- /.col-lg-12 -->
<!-- /.row -->
@stop
@section('customjs') {!! Html::script('public_html/js/custom/comment.js') !!}
@stop