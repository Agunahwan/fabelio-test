@extends('master_page.master')

@section('title')
:: Produk ::
@stop

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Data Product</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box box-default">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="tableData" class="table table-bordered table-hover" style="width:100%">
                                    <thead>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
@stop

@section('customjs')
{!! Html::script('public_html/js/custom/product.js') !!}
@stop