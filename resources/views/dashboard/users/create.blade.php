@extends('layouts.dashboard.app')

@section('content')


<div class="content-wrapper">

		<section class="content-header">

             <h1>
             @lang('site.add') 
             </h1>

    <ol class="breadcrumb">
      	<li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li ><a href="{{ route('dashboard.users.index') }}">@lang('site.users')</a></li>
                <li class="active">@lang('site.add')</li>
    </ol>

         
        </section>

	<section class="content">
		<div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('site.add')</h3>
                </div>

        <div class="box-body">

        	@include('partials._errors')
        	
        	<form action="{{ route('dashboard.users.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                       <div class="form-group">
                           <label>@lang('site.first_name')</label>
                           <input type="text" name="frist_name" class="form-control" value="{{ old('frist_name') }}">
                        </div>

                         <div class="form-group">
                            <label>@lang('site.last_name')</label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}">
                        </div>

 
                        <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('uploads/users_images/default.png') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.password')</label>
                            <input type="text" name="password"  class="form-control">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.password_confirmation')</label>
                            <input type="text" name="password_confirmation" class="form-control">
                        </div>


 <div class="form-group">
       <label>@lang('site.permissions')</label>
          <div class="nav-tabs-custom">

          	 @php
                $models = ['users', 'categories', 'products', 'clients', 'orders'];
                $maps = ['create', 'read', 'update', 'delete'];
             @endphp

            <ul class="nav nav-tabs">
           		@foreach ($models as $index=>$model)
   						<li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}" data-toggle="tab">@lang('site.' . $model)
   						</a></li>
                @endforeach
            </ul>

      <div class="tab-content">
            @foreach ($models as $index=>$model)

                 <div class="tab-pane {{ $index == 0 ? 'active' : '' }}" id="{{ $model }}">

 @foreach ($maps as $map)
 <label><input type="checkbox" name="permissions[]" value="{{ $map . '_' . $model }}"> @lang('site.' . $map)</label>
 @endforeach

                   </div>

@endforeach

                                   

            </div><!-- end of tab content -->
                                
        </div><!-- end of nav tabs -->
                            
          </div>





                        
                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</button>
                        </div>

            </div>


        </div>        

        </div>       
	</section>
		
	</div>

	

@endsection