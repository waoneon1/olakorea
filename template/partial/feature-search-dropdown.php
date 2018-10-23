<?php 
	$terms = get_terms( array(
	    'taxonomy' => 'platforms',
	    'hide_empty' => true,
	) );
	$filter = (isset($_GET['filter']) && $_GET['filter']) ? $_GET['filter'] : 'all';
?>

<div class="toolbar-custom">
	<form method="post" class="float-left cold-12 col-sm-6 p-l-0 p-r-10">
		<div class="form-group input-icon-right">
			<i class="fa fa-search"></i>
			<input type="text" class="form-control search-game" placeholder="Search Game...">
		</div>
	</form>
	<div class="dropdown float-left">
		<button class="btn btn-default" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<?php if ($filter == 'all') {
				echo 'All Platform';
			} else {
				foreach ($terms as $term) {
					if (($filter == $term->slug)){
						echo  $term->name;
					}
				}
			} ?>
			<i class="fa fa-caret-down"></i>
		</button>
		<div class="dropdown-menu">
			<a class="dropdown-item <?php $filter == 'all' ? 'active' : '' ?>" href="?">All Platform</a>
			<?php array_map(
				function($arr) {
					$filter = (isset($_GET['filter']) && $_GET['filter']) ? $_GET['filter'] : 'all';
					$href = ($filter == $arr->slug) ? '' : 'href="?filter='.$arr->slug.'"';
					echo '<a class="dropdown-item" '.($filter == $arr->slug ? 'active' : '').' '.$href.'>'.$arr->name.'</a>';
				}, $terms
			) ?>
		</div>
	</div>
</div>  
