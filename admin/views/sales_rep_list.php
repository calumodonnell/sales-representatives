<?php
// @author Calum O'Donnell

// database functions
global $wpdb;

// page title
$title = __('Sales Representatives List');

// get page no from url
if(isset($_GET['pg'])) :
    $p = $_GET['pg'];
else :
    $p = 1;
endif;

$max = 10;
$limit = ($p - 1) * $max;
$prev = $p - 1;
$next = $p + 1;
$limits = (int)($p - 1) * $max;

// if statement for different cable results based on url parameters
if (isset($_REQUEST['orderby']) && $_REQUEST['order'] === 'asc') :
	$sql = "SELECT * FROM wp_sr_locations ORDER BY " . $_REQUEST['orderby'] . " ASC";
elseif (isset($_REQUEST['orderby']) && $_REQUEST['order'] == 'desc') :
	$sql = "SELECT * FROM wp_sr_locations ORDER BY " . $_REQUEST['orderby'] . " DESC";
elseif (isset($_REQUEST['s'])) :
	$search = $_REQUEST['s'];
	$sql = "SELECT * FROM wp_sr_locations WHERE name LIKE '%$search%' OR address_one LIKE '%$search' OR address_two LIKE '%$search' OR address_three LIKE '%$search' OR country LIKE '%$search' OR city LIKE '%$search'";
else :
	$sql = "SELECT * FROM wp_sr_locations ORDER BY name ASC";
endif;

// query sql statement to get results
$query = $sql . " LIMIT $limits, $max";
$rep_list = $wpdb->get_results($query);

// get total no results
$query = $wpdb->get_results($sql);
$total_reps = $wpdb->num_rows;

$total_posts = ceil($total_reps / $max);
$lpm1 = $total_posts - 1;
?>

<div class="wrap">
	<h1>
		<?php echo esc_html($title); ?>
		<a class="page-title-action" title="Add New" href="<?php echo admin_url( 'admin.php?page=add-location')?>">Add New</a>
		<?php
			// if s url parameter available, show search query
			if (isset($_REQUEST['s'])) :
				echo "<span class='subtitle'>Search results for '" . $_REQUEST['s'] . "'</span>";
			endif;
		?>
	</h1>
	<?php if(isset($_SESSION['edited'])) : ?>
		<div class="update-nag notice">
			<p>
				<?php
					echo $_SESSION['edited'];
					unset($_SESSION['edited']);
				?>
			</p>
		</div>
	<?php endif; ?>
	<?php if(isset($_SESSION['deleted'])) : ?>
		<div class="error notice">
			<p>
				<?php
					echo $_SESSION['deleted'];
					unset($_SESSION['deleted']);
				?>
			</p>
		</div>
	<?php endif; ?>
	<?php if(isset($_SESSION['added'])) : ?>
		<div class="updated notice">
			<p>
				<?php
					echo $_SESSION['added'];
					unset($_SESSION['added']);
				?>
			</p>
		</div>
	<?php endif; ?>
	<h2 class="screen-reader-text">Filter Sales Reps</h2>
	<div class="tablenav top">
		<form id="rep-filter" method="get" action="admin.php">
			<input type="hidden" name="page" value="sales-representatives"/>
			<p class="search-box">
				<label class="screen-reader-text" for="reps-search-input">Search:</label>
				<input type="search" id="reps-search-input" name="s"/>
				<input type="submit" id="search-submit" class="button" value="Search"/>
			</p>
		</form>
	</div>
	<h2 class="screen-reader-text">Sales Representatives List</h2>
	<table class="wp-list-table widefat fixed striped posts">
		<thead>
			<tr>
				<th scope="col" id="name" class="manage-column column-name column-primary <?php if ($_REQUEST['orderby'] == 'name'): echo "sorted"; else : echo 'sortable'; endif; ?> <?php if ($_REQUEST['order'] == 'desc'): echo 'desc'; else: echo 'asc'; endif; ?>">
					<a href="./admin.php?page=sales-representatives&orderby=name&order=<?php if ($_REQUEST['order'] == 'desc'): echo 'asc'; else: echo 'desc'; endif; ?>">
						<span>Company Name</span>
						<span class="sorting-indicator"></span>
					</a>
				</th>
				<th scope="col" id="country" class="manage-column column-country <?php if ($_REQUEST['orderby'] == 'country'): echo "sorted"; else : echo 'sortable'; endif; ?> <?php if ($_REQUEST['order'] == 'desc'): echo 'desc'; else: echo 'asc'; endif; ?>">
					<a href="./admin.php?page=sales-representatives&orderby=country&order=<?php if ($_REQUEST['order'] == 'desc'): echo 'asc'; else: echo 'desc'; endif; ?>">
						<span>Country</span>
						<span class="sorting-indicator"></span>
					</a>
				</th>
				<th scope="col" id="address_one" class="manage-column column-address_one <?php if ($_REQUEST['orderby'] == 'address_one'): echo "sorted"; else : echo 'sortable'; endif; ?> <?php if ($_REQUEST['order'] == 'desc'): echo 'desc'; else: echo 'asc'; endif; ?>">
					<a href="./admin.php?page=sales-representatives&orderby=address_one&order=<?php if ($_REQUEST['order'] == 'desc'): echo 'asc'; else: echo 'desc'; endif; ?>">
						<span>Address One</span>
						<span class="sorting-indicator"></span>
					</a>
				</th>
				<th scope="col" id="address_two" class="manage-column column-address_two <?php if ($_REQUEST['orderby'] == 'address_two'): echo "sorted"; else : echo 'sortable'; endif; ?> <?php if ($_REQUEST['order'] == 'desc'): echo 'desc'; else: echo 'asc'; endif; ?>">
					<a href="./admin.php?page=sales-representatives&orderby=address_two&order=<?php if ($_REQUEST['order'] == 'desc'): echo 'asc'; else: echo 'desc'; endif; ?>">
						<span>Address Two</span>
						<span class="sorting-indicator"></span>
					</a>
				</th>
				<th scope="col" id="address_three" class="manage-column column-address_three <?php if ($_REQUEST['orderby'] == 'address_three'): echo "sorted"; else : echo 'sortable'; endif; ?> <?php if ($_REQUEST['order'] == 'desc'): echo 'desc'; else: echo 'asc'; endif; ?>">
					<a href="./admin.php?page=sales-representatives&orderby=address_three&order=<?php if ($_REQUEST['order'] == 'desc'): echo 'asc'; else: echo 'desc'; endif; ?>">
						<span>Address Three</span>
						<span class="sorting-indicator"></span>
					</a>
				</th>
				<th scope="col" id="city" class="manage-column column-city <?php if ($_REQUEST['orderby'] == 'city'): echo "sorted"; else : echo 'sortable'; endif; ?> <?php if ($_REQUEST['order'] == 'desc'): echo 'desc'; else: echo 'asc'; endif; ?>">
					<a href="./admin.php?page=sales-representatives&orderby=city&order=<?php if ($_REQUEST['order'] == 'desc'): echo 'asc'; else: echo 'desc'; endif; ?>">
						<span>City</span>
						<span class="sorting-indicator"></span>
					</a>
				</th>
			</tr>
		</thead>
		<tbody id="the-list">
			<?php
				if($rep_list) :
					foreach($rep_list as $rep) :
						?>
						<tr id="rep-<?php echo $rep->id; ?>" class="iedit author-self level-0 post-<?php echo $rep->id; ?> type-post available-publish format-standard hentry category-uncategorised">
							<td><?php echo stripslashes($rep->name); ?>
								<div class="row-actions">
									<span class="edit">
										<a title="Edit this item" id="edit-rep" href="<?php echo admin_url( 'admin.php?page=add-location&action=edit&rep_id=' . $rep->id)?>">Edit</a>
									</span> |
									<span class="delete">
										<a title="Delete this item" id="delete-cable" href="<?php echo admin_url( 'admin.php?page=add-location&action=delete&rep_id=' . $rep->id)?>">Delete</a>
									</span>
								</div>
							</td>
							<td scope="row"><?php echo stripslashes($rep->country); ?></td>
							<td scope="row"><?php echo stripslashes($rep->address_one); ?></td>
							<td scope="row"><?php echo stripslashes($rep->address_two); ?></td>
							<td scope="row"><?php echo stripslashes($rep->address_three); ?></td>
							<td scope="row"><?php echo stripslashes($rep->city); ?></td>
						</tr>
						<?php
					endforeach;
				else :
					echo '<tr><td colspan="6" align="center"><strong>' . __('No entries found') . '</strong></td></tr>';
				endif;
			?>
		</tbody>
	</table>
	<div class="tablenav bottom">
		<div class="tablenav-pages">
			<span class="displaying-num"><?php echo $total_reps; ?> items</span>
			<span class="pagination-links">
				<?php
					if ( $total_reps > $max ) :
						echo pagination('sales-representatives', $total_reps, $total_posts, $p, $lpm1, $prev, $next);
					endif;
				?>
			</span>
		</div>
	</div>
</div>
