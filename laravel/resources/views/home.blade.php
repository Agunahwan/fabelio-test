@extends('master_page.master')

@section('title')
:: Produk ::
@stop

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Submit Product</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-xs-12 col-md-12">
		<div class="box box-default">
			<div class="box-body">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label class="col-sm-2 control-label label-search" for="path_product">Url :</label>
							<div class="input-group col-sm-10">
								<input class="form-control" type="text" id="path_product" name="path_product"
									placeholder="Path Product" />
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<button type="button" id="add_product" class="btn btn-block btn-success">Add
								Product</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.row -->
@stop

@section('customjs')
{!! Html::script('public_html/js/custom/home.js') !!}
@stop