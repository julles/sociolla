<div class=" sidebar" role="navigation">
	<div class="navbar-collapse">
		<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
			<ul class="nav" id="side-menu">
				
				@foreach($parents as $parent)
						
					<?php
					if(Auth::user()->role_id != 1)
					{
						$childs = Helper::injectModel('Role')->find(Auth::user()->role_id)->menus()->whereParentId($parent->id); 
					}else{
						$childs = $modelMenu->whereParentId($parent->id);
					}
					?>

					@if($childs->count() > 0 || Auth::user()->role_id == 1)
						<li>
							<a href="#"><i class="{{ $parent->icon }}"></i>{{ $parent->title }}<span class="fa arrow"></span></a>
							<ul class="nav nav-second-level collapse">
							
							@foreach($childs->get() as $child)	
								<li>
									<a href="{{ url('admin-panel/'.$child->slug) }}">{{ $child->title }}</a>
								</li>
							@endforeach
							</ul>
							<!-- /nav-second-level -->
						</li>
					@endif

				@endforeach

			</ul>
			<div class="clearfix"> </div>
			<!-- //sidebar-collapse -->
		</nav>
	</div>
</div>