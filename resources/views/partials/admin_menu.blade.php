<div class="card">
	<div class="card-header">
		Admin options
	</div>
	<div class="card-body">
		
		<a href="{{route('volunteer.index')}}"></a>
		<ul class="nav flex-column">
		  <li class="nav-item">
		    <a class="nav-link" href="{{route('requester.index')}}">{{__('Requests')}}</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href="{{route('volunteer.index')}}">{{__('Volunteers')}}</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link" href={{route('typeOfSupport.index')}}>{{__('Support types')}}</a>
		  </li>
		</ul>
	</div>
</div>