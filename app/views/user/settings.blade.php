@extends('master')
@section('content')
{{ Breadcrumbs::addCrumb('Home', '/') }}
{{ Breadcrumbs::addCrumb('Settings') }}
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="row">
				<div class="col-md-4">
					<img src="/uploads/profile/{{$user->profile_picture}}">
				</div>
				<div class="col-md-8">
					<h2>Hello {{{ $user->username }}}!</h2>
					<p>This is your personal profile settings page.</p>
					<a href="/user/settings/add-key"><button class="btn btn-sm btn-info">Add or change your GPG Key</button></a>
				</div>
			</div>
			<h2>User Details</h2>
			{{ Form::open(array('url' => '/user/settings/save')) }}
				<div class="form-group">
					<div class="row">
				    	<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" name="email" class="form-control" value="{{{ $user->email }}}">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="checkbox-inline pull-right public-email">
						@if ($user->email_public)
							<input type="checkbox" name="email_public" checked> Show your email to the public?
						@else
							<input type="checkbox" name="email_public"> Show your email to the public?
						@endif
						</label>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
				    	<label class="col-sm-2 control-label">ByteRub Address <small>(optional)</small></label>
						<div class="col-sm-10">
							<input type="text" name="monero_address" class="form-control" value="{{{ $user->monero_address }}}">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
				    	<label class="col-sm-2 control-label">Website Address <small>(optional)</small></label>
						<div class="col-sm-10">
							<input type="text" name="website" class="form-control" value="{{{ $user->website }}}">
						</div>
					</div>
				</div>
				<p>Only enter a new password if you wish to change it.</p>
				<div class="form-group">
					<div class="row">
					    <label class="col-sm-2 control-label">New Password</label>
					    <div class="col-sm-10">
					      <input type="password" name="password" class="form-control">
					    </div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
					    <label class="col-sm-2 control-label">Repeat Password</label>
					    <div class="col-sm-10">
					      <input type="password" name="password_confirmation" class="form-control">
					    </div>
					</div>
				</div>
				<button class="btn btn-sm btn-success pull-right" type="submit" name="submit">Save</button>
			{{ Form::close() }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Profile Picture</h2>
			{{ Form::open(array('url' => '/user/upload/profile', 'files' => true)) }}
				<div class="form-group">
					<input type="file" class="file-inputs" name="profile" title="Choose a picture.">
					<p class="helpblock">The picture has to be 150 x 150 pixels in size. If it is bigger than that, it will be resized.</p>
				</div>
				<a href="/user/settings/delete/picture"><button type="button" class="btn btn-sm btn-danger pull-right btn-right">Delete</button></a>
				<button class="btn btn-sm btn-success pull-right btn-right" type="submit" name="submit">Upload</button>
			{{ Form::close() }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Forum View</h2>
			<label>Sort posts by:</label>
			{{ Form::open(array('url' => '/user/settings/view/save')) }}
				<div class="radio">
				  <label>
				  	@if ($user->default_sort == 'weight')
				    <input type="radio" name="forum_view" value="weight" checked>
				    @else
				    <input type="radio" name="forum_view" value="weight">
				    @endif
				    Weight
				  </label>
				</div>
				<div class="radio">
				  <label>
				  	@if ($user->default_sort == 'date_desc')
				    <input type="radio" name="forum_view" value="date_desc" checked>
				    @else
				    <input type="radio" name="forum_view" value="date_desc">
				    @endif
				    Latest
				  </label>
				</div>
				<div class="radio">
				  <label>
				  	@if ($user->default_sort == 'date_desc')
				    <input type="radio" name="forum_view" value="date_asc" checked>
				    @else
					<input type="radio" name="forum_view" value="date_asc">
				    @endif
				    Oldest
				  </label>
				</div>
				{{ Form::submit('Save', array('class' => 'btn btn-success btn-sm pull-right')) }}
			{{ Form::close() }}
			<label>Show parent comment:</label>
			{{ Form::open(array('url' => '/user/settings/parent/save')) }}
			<div class="checkbox">
				<label>
					@if ($user->show_parent)
						<input type="checkbox" name="show_parent" value="1" checked>
					@else
						<input type="checkbox" name="show_parent" value="1">
					@endif
					Show Parent
				</label>
			</div>
			<p class="help-block">
				When using the <strong>latest</strong> or <strong>oldest</strong> sorting options for a thread, show the parent of a reply by default.
			</p>
			{{ Form::submit('Save', array('class' => 'btn btn-success btn-sm pull-right')) }}
			{{ Form::close() }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<h2>Subscriptions</h2>
		{{ Form::open(array('url' => URL::route('subscriptions.save'))) }}
		<div class="checkbox">
			<label>
				@if($user->subscribe)
					<input type="checkbox" name="subscribe" value="1" checked>
				@else
					<input type="checkbox" name="subscribe" value="1">
				@endif
				Automatically subscribe to threads I reply to.
			</label>
		</div>
			<a href="{{ URL::route('subscriptions.index') }}"><button type="button" class="btn btn-info">Manage subscriptions</button></a>
		{{ Form::submit('Save', array('class' => 'btn btn-success btn-sm pull-right')) }}
		<div class="clearfix"></div>
		{{ Form::close() }}
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Email Notifications</h2>
			{{ Form::open(array('url' => URL::route('user.notifications.save'))) }}
			<div class="checkbox">
				<label>
					@if($user->reply_notifications)
						<input type="checkbox" name="reply" value="1" checked>
					@else
						<input type="checkbox" name="reply" value="1">
					@endif
					Notify me about new replies to threads I am susbcribed to via email.
				</label>
			</div>
			<div class="checkbox">
				<label>
					@if($user->pm_notifications)
						<input type="checkbox" name="pm" value="1" checked>
					@else
						<input type="checkbox" name="pm" value="1">
					@endif
					Notify me about new private messages via email.
				</label>
			</div>
			<div class="checkbox">
				<label>
					@if($user->mention_notifications)
						<input type="checkbox" name="mention" value="1" checked>
					@else
						<input type="checkbox" name="mention" value="1">
					@endif
					Notify when someone mentions me via email.
				</label>
			</div>
			{{ Form::submit('Save', array('class' => 'btn btn-success btn-sm pull-right')) }}
			<div class="clearfix"></div>
			{{ Form::close() }}
		</div>
	</div>
@stop