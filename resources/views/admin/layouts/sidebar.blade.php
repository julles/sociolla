<div class=" sidebar" role="navigation">
	<div class="navbar-collapse">
		<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
			<ul class="nav" id="side-menu">
				
				@foreach($parents as $parent)

				<li>
					<a href="#"><i class="{{ $parent->icon }}"></i>{{ $parent->title }}<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse">
					
					@foreach($modelMenu->whereParentId($parent->id)->orderBy('order' , 'asc')->get() as $child)	
						<li>
							<a href="{{ url('admin-panel/'.$child->slug) }}">{{ $child->title }}</a>
						</li>
					@endforeach
					</ul>
					<!-- /nav-second-level -->
				</li>

				@endforeach

			</ul>
			<div class="clearfix"> </div>
			<!-- //sidebar-collapse -->
		</nav>
	</div>
</div>