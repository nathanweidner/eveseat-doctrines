@extends('web::layouts.grids.4-4-4')

@section('title', trans('doctrines::meta.plugin_name') . ' | ' . trans('doctrines::meta.title_dashboard'))
@section('page_header', trans('doctrines::meta.title_dashboard'))

@section('left')

	<div class="box box-info">
		<div class="box-header with-border text-center">
			<i class="fa fa-cube"></i>
			<h3 class="box-title">{{ trans('doctrines::words.doctrines') }}</h3>
		</div>
		<div class="box-body">
			
		</div>
		<div class="box-footer">

		</div>
	</div>

@stop

@section('center')

	<div class="box box-info">
		<div class="box-header with-border text-center">
			<i class="fa fa-space-shuttle"></i>
			<h3 class="box-title">{{ trans('doctrines::words.fittings') }}</h3>
		</div>
		<div class="box-body">
			<a class="btn btn-default btn-block" href="{{ route('doctrines.fit.indexStore') }}">
				{{ trans('doctrines::actions.create.fit') }}
			</a>
			<a class="btn btn-default btn-block" href="{{ route('doctrines.category.index') }}">
				{{ trans('doctrines::actions.manage.category') }}
			</a>
		</div>
		<div class="box-footer">

		</div>
	</div>

@stop

@section('right')

@stop