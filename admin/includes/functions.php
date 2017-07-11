<?php
// author calum o'donnell

// registers sessions
function register_session() {
	if (!session_id())
		session_start();
}
add_action('wp_loaded', 'register_session');

function sr_add_new_location(){
	global $wpdb;

	$rep_sql = "INSERT INTO wp_sr_locations (`name`, `address_one`, `address_two`, `address_three`, `city`, `state`, `postcode`, `country`, `phone`, `fax`, `mobile`, `email`, `website`, `contact_name`) VALUES ('" . $_POST['name'] . "', '" . $_POST['address_one'] . "', '" . $_POST['address_two'] . "', '" . $_POST['address_three'] . "', '" . $_POST['city'] . "', '" . $_POST['state'] . "', '" . $_POST['postcode'] . "', '" . $_POST['country'] . "', '" . $_POST['phone'] . "', '" . $_POST['fax'] . "', '" . $_POST['mobile'] . "', '" . $_POST['email'] . "', '" . $_POST['website'] . "', '" . $_POST['contact_name'] . "')";
	$rep_query = $wpdb->query($rep_sql);

	if (isset($rep_query)) :
		$rep_id_sql = "SELECT id FROM wp_sr_locations WHERE name = '" . $_POST['name'] . "' AND address_one = '" . $_POST['address_one'] . "' LIMIT 1";
		$rep_id_query = $wpdb->get_results($rep_id_sql, 'ARRAY_A');

		$rep_id = $rep_id_query[0]['id'];

		foreach( $_POST['add_country'] as $row => $value ) :
			$countries_sql = "INSERT INTO wp_sr_additional_countries (location_id, country) VALUES ('" . $rep_id . "', '" . $_POST['add_country'][$row] . "')";
			$countries_query = $wpdb->query($countries_sql);
		endforeach;

		if (!empty($_POST['add_state'])) :
			foreach($_POST['add_state'] as $row => $value) :
				$state_sql = "INSERT INTO wp_sr_additional_states (location_id, state) VALUES ('" . $rep_id . "', '" . $_POST['add_state'][$row] . "')";
				$state_query = $wpdb->query($state_sql);
			endforeach;
		endif;
	endif;

	if (isset($rep_query)) :
		$_SESSION['added'] = "A new representative was added successfully";
	else :
		$_SESSION['edited'] = "There as a problem adding the new representative. Please try again.";
	endif;

	echo "<script> location.replace('admin.php?page=sales-representatives'); </script>";
}


function sr_edit_location(){
	global $wpdb;

	if (!empty($_POST['rep_id'])) :
		$rep_sql = "UPDATE wp_sr_locations SET name = '" . $_POST['name'] . "', address_one = '" . $_POST['address_one'] . "', address_two = '" . $_POST['address_two'] . "', address_three = '" . $_POST['address_three'] . "', city = '" . $_POST['city'] . "', state = '" . $_POST['state'] . "', postcode = '" . $_POST['postcode'] . "', country = '" . $_POST['country'] . "', phone = '" . $_POST['phone'] . "', fax = '" . $_POST['fax'] . "', mobile = '" . $_POST['mobile'] . "', email = '" . $_POST['email'] . "', website = '" . $_POST['website'] . "', contact_name = '" . $_POST['contact_name'] . "' WHERE id = '" . $_POST['rep_id'] . "'";
		$rep_query = $wpdb->query($rep_sql);

		$country = $_POST['add_country'];

		if (!empty($country)) :
			$delete_sql = "DELETE FROM wp_sr_additional_countries WHERE location_id = '" . $_POST['rep_id'] . "'";
			$delete_query = $wpdb->query($delete_sql);

			foreach($country as $co) :
				$country_sql = "INSERT INTO wp_sr_additional_countries(location_id, country) VALUES ('" . $_POST['rep_id'] . "', '$co')";
				$country_query = $wpdb->query($country_sql);
			endforeach;
		endif;

		$state = $_POST['add_state'];

		if (!empty($state)) :
			$delete_sql = "DELETE FROM wp_sr_additional_states WHERE location_id = '" . $_POST['rep_id'] . "'";
			$description = $wpdb -> query($delete_sql);

			foreach($state as $st) :
				$state_sql = "INSERT INTO wp_sr_additional_states(location_id, state) VALUES ('" . $_POST['rep_id'] . "', '$st')";
				$state_query = $wpdb->get_results($state_sql);
			endforeach;
		endif;
	endif;

	if(isset($rep_query) || isset($country_query) | isset($state_query)) :
		$_SESSION['added'] = "The representative was updated successfully";
	else :
		$_SESSION['edited'] = "There was a problem editing this representative. Please try again";
	endif;

	echo "<script> location.replace('admin.php?page=sales-representatives'); </script>";
}


// delete rep location
function sr_delete_location () {
	global $wpdb;

  $delete_sql = "DELETE FROM wp_sr_locations WHERE id='" . $_REQUEST['rep_id'] . "'";
  $delete_location_query = $wpdb->query($delete_sql);

	$delete_sql = "DELETE FROM wp_sr_additional_countries WHERE location_id='" . $_REQUEST['rep_id'] . "'";
  $delete_countries_query = $wpdb->query($delete_sql);

	$delete_sql = "DELETE FROM wp_sr_additional_states WHERE location_id='" . $_REQUEST['rep_id'] . "'";
  $delete_states_query = $wpdb->query($delete_sql);

	if ($delete_location_query):
		$_SESSION['deleted'] = "Representative deleted successfully";
	else :
		$_SESSION['edited'] = "There was an issue deleting the representative. Please try again";
	endif;

	echo "<script> location.replace('admin.php?page=sales-representatives'); </script>";
}


// pagination on all list pages
function pagination ($location, $total_record, $total_posts, $pages, $lpm1, $prev, $next) {
  if($total_posts > 1) {
    $pagination = "";
		if ($pages > 1) {
			$pagination .= "<a href='?";
			foreach($_GET as $key => $value){
				$pagination .= $key . "=" . $value . "&";
			}
			$pagination .= "pg=$prev' class='prev-page'>‹</a>";
		} else {
			$pagination .= "<span class='tablenav-pages-navspan'>‹</span> ";
		}

		$count_pages = ($total_posts / 10) * 10;
		$pagination .= "<span id='table-paging' class='paging-input'>$pages of <span class='total-pages'>$count_pages</span></span>";

    if ($pages < $count_pages) {
			$pagination .= " <a href='?";
			foreach ($_GET as $key => $value) {
				$pagination .= $key . "=" . $value . "&";
			}
			$pagination .= "pg=$next' class='next-page'><span class='screen-reader-text'>Next page</span><span aria-hidden='true'>›</span></a>";

		} else {
			$pagination.= " <span class='tablenav-pages-navspan'>›</span>\n";
		}
	}
  return $pagination;
}


// display sales reps on site to users
function sr_show_sales_representatives(){
	global $wpdb;

	$sql_countries = "SELECT DISTINCT country FROM wp_sr_locations ORDER BY IF(country='United States of America' OR country='United Kingdom', country, ~country) DESC, country ASC";
	$country_record = $wpdb->get_results($sql_countries);

	?>

	<div class="locations">
		<?php
		foreach($country_record as $country){
			//echo "<div class='heading'><img src='/trak/wp-content/uploads/flags/" . $country->image_url . "' alt='" . $country->country . "'/><p>" . $country->country . "</p><div class='sales-icon'></div></div>";
			echo "<div class='heading'><p>" . $country->country . "</p><div class='sales-icon'></div></div>";
				if($country->country == 'United States of America'){
					$sql_state = "SELECT state FROM wp_sr_locations where country='United States of America' GROUP BY state UNION SELECT state FROM wp_sr_additional_states  ORDER BY state ASC";
					$state_record = $wpdb->get_results($sql_state);

					if($state_record > 0){
						echo "<div class='sales-rep-content'>";
							foreach($state_record as $state){
								$sql_location = "SELECT id, name, address_one, address_two, address_three, city, state, postcode, country, phone, fax, mobile, email, website, contact_name FROM wp_sr_locations WHERE state='$state->state' UNION SELECT wp_sr_locations.id, name, address_one, address_two, address_three, city, wp_sr_locations.state, postcode, country, phone, fax, mobile, email, website, contact_name FROM wp_sr_locations, wp_sr_additional_states WHERE wp_sr_additional_states.location_id = wp_sr_locations.id AND wp_sr_additional_states.state = '$state->state' ORDER BY country ASC";
								$location_record = $wpdb->get_results($sql_location);

								echo "<div class='heading'><p>" . stripslashes($state->state) . "</p><div class='sales-icon'></div></div>";
								echo "<div class='sales-rep-content-2'>";
									foreach($location_record as $locations){
										echo "<div class='location-holder'>";
											echo "<div class='address-holder'>";
												echo "<p class='company-name'>" . stripslashes($locations->name). "</p>";
												echo "<p>" . stripslashes($locations->address_one) . "</p>";
												echo "<p>" . stripslashes($locations->address_two) . "</p>";
												echo "<p>" . stripslashes($locations->address_three) . "</p>";
												echo "<p>" . stripslashes($locations->city) . "</p>";
												echo "<p>" . stripslashes($locations->state) . "</p>";
												echo "<p>" . stripslashes($locations->postcode) . "</p>";
												echo "<p>" . stripslashes($locations->country) . "</p>";
											echo "</div>";
											if(strlen($locations->phone)){echo "<p>Tel: " . stripslashes($locations->phone) . "</p>";}
											if(strlen($locations->fax)){echo "<p>Fax: " . stripslashes($locations->fax) . "</p>";}
											if(strlen($locations->mobile)){echo "<p>Mob: " . stripslashes($locations->mobile) . "</p>";}
											if(strlen($locations->email)){echo "<p>Email: <a href='mailto:stripslashes($locations->email'>". stripslashes($locations->email) . "</a></p>";}
											if(strlen($locations->website)){echo "<p>Website: <a href='http://$locations->website' target='_blank'>" . stripslashes($locations->website) . "</a></p>";}
											if(strlen($locations->contact_name)){echo "<p>Contact Name(s): " . stripslashes($locations->contact_name) . "</p>";}
										echo "</div>";
									}
								echo "</div>";
							}
						echo "</div>";
					}
				}
				else{
					$sql_location = "SELECT id, name, address_one, address_two, address_three, city, state, postcode, country, phone, fax, mobile, email, website, contact_name FROM wp_sr_locations WHERE country='$country->country' UNION SELECT wp_sr_locations.id, name, address_one, address_two, address_three, city, state, postcode, wp_sr_locations.country, phone, fax, mobile, email, website, contact_name FROM wp_sr_locations, wp_sr_additional_countries WHERE wp_sr_additional_countries.location_id = wp_sr_locations.id AND wp_sr_additional_countries.country = '$country->country' ORDER BY country ASC";
					$location_record = $wpdb->get_results($sql_location);
					$location_num = $wpdb->num_rows;

					if($location_num > 0){
						echo "<div class='sales-rep-content'>";
							foreach($location_record as $locations){
								echo "<div class='location-holder'>";
									echo "<div class='address-holder'>";
										echo "<p class='company-name'>" . stripslashes($locations->name) . "</p>";
										echo "<p>" . stripslashes($locations->address_one) . "</p>";
										echo "<p>" . stripslashes($locations->address_two) . "</p>";
										echo "<p>" . stripslashes($locations->address_three) . "</p>";
										echo "<p>" . stripslashes($locations->city) . "</p>";
										echo "<p>" . stripslashes($locations->state) . "</p>";
										echo "<p>" . stripslashes($locations->postcode) . "</p>";
										echo "<p>" . stripslashes($locations->country) . "</p>";
									echo "</div>";
									if(strlen($locations->phone)){echo "<p>Tel: " . stripslashes($locations->phone) . "</p>";}
									if(strlen($locations->fax)){echo "<p>Fax: " . stripslashes($locations->fax) . "</p>";}
									if(strlen($locations->mobile)){echo "<p>Mob: " . stripslashes($locations->mobile) . "</p>";}
									if(strlen($locations->email)){echo "<p>Email: <a href='mailto:$locations->email'>" . stripslashes($locations->email) . "</a></p>";}
									if(strlen($locations->website)){echo "<p>Website: <a href='http://$locations->website'>" . stripslashes($locations->website) . "</a></p>";}
									if(strlen($locations->contact_name)){echo "<p>Contact Name(s): " . stripslashes($locations->contact_name) . "</p>";}
								echo "</div>";
							}
						echo "</div>";
					}
				}
		}
		?>
	</div>
	<?php
}

?>
