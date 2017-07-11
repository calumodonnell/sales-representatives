<?php
// @author Calum O'Donnell

if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF']))
	die('You are not allowed to call this page directly.');

$title = __('Edit Sales Representative');

global $wpdb;

if($_REQUEST['action']='edit' && $_REQUEST['rep_id']!=''){
	$rep_id = $_REQUEST['rep_id'];

	$rep_sql = "SELECT * FROM wp_sr_locations where id='$rep_id'";
	$rep = $wpdb->get_results($rep_sql, 'ARRAY_A');
}
?>
<div class="wrap">
  <div class="icon32 icon32-posts-post" id="icon-edit"></div>
  <h1><?php echo esc_html( $title ); ?></h1>
  <p>Fields marked with an * are required</p>
	<form name="add_trainer" id="add_trainer" action="<?php echo admin_url('admin.php?page=add-location&action=edit&edit=yes'); ?>" method="post" enctype="multipart/form-data">
		<table style="padding-left:5px;" class="create_trainer" cellspacing="5">
			<tr>
				<td width="150">Company Name *</td>
				<td>
					<input class="sr_input" type="hidden" name="rep_id" id="rep_id" value="<?php echo stripslashes($rep[0]['id']); ?>"/>
					<input class="sr_input" type="text" name="name" id="name" value="<?php echo stripslashes($rep[0]['name']); ?>"/>
				</td>
			</tr>
			<tr>
				<td>Address One * </td>
				<td><input type="text" class="sr_input" name="address_one" id="address_one" value="<?php echo stripslashes($rep[0]['address_one']);?>"></td>
			</tr>
			<tr>
				<td>Address Two</td>
				<td><input type="text" class="sr_input" name="address_two" id="address_two" value="<?php echo stripslashes($rep[0]['address_two']);?>"></td>
			</tr>
			<tr>
				<td>Address Three</td>
				<td><input type="text" class="sr_input" name="address_three" id="address_three" value="<?php echo stripslashes($rep[0]['address_three']);?>"></td>
			</tr>
			<tr>
				<td>City *</td>
				<td><input type="text" class="sr_input" name="city" id="city"  value="<?php echo stripslashes($rep[0]['city']);?>"/></td>
			</tr>
			<tr>
				<td>State</td>
				<td><input type="text" class = "sr_input" name = "state" id="state" value="<?php echo stripslashes($rep[0]['state']);?>"/></td>
			</tr>
			<tr id="state_select">
				<td>Additional States - (Hold CTRL to make multiple selections)</td>
				<td>
					<select class = "sr_input" name ="add_state[]" id="add_state" multiple>
						<?php
						$sql = "SELECT state FROM wp_sr_additional_states WHERE location_id = '" . $rep[0]['id'] . "'";
						$add_state_record = $wpdb->get_results($sql);
						?>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Alabama') echo 'selected';} ?> value='Alabama'>Alabama</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Alaska') echo 'selected';} ?> value='Alaska'>Alaska</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Arizona') echo 'selected';} ?> value='Arizona'>Arizona</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Arkansas') echo 'selected';} ?> value='Arkansas'>Arkansas</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'California') echo 'selected';} ?> value='California'>California</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Colorado') echo 'selected';} ?> value='Colorado'>Colorado</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Delaware') echo 'selected';} ?> value='Delaware'>Delaware</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Florida') echo 'selected';} ?> value='Florida'>Florida</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Georgia') echo 'selected';} ?> value='Georgia'>Georgia</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Hawaii') echo 'selected';} ?> value='Hawaii'>Hawaii</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Idaho') echo 'selected';} ?> value='Idaho'>Idaho</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Illinois') echo 'selected';} ?> value='Illinois'>Illinois</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Indiana') echo 'selected';} ?> value='Indiana'>Indiana</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Iowa') echo 'selected';} ?> value='Iowa'>Iowa</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Kansas') echo 'selected';} ?> value='Kansas'>Kansas</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Kentucky') echo 'selected';} ?> value='Kentucky'>Kentucky</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Louisiana') echo 'selected';} ?> value='Louisiana'>Louisiana</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Maine') echo 'selected';} ?> value='Maine'>Maine</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Maryland') echo 'selected';} ?> value='Maryland'>Maryland</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Massachusetts') echo 'selected';} ?> value='Massachusetts'>Massachusetts</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Michigan') echo 'selected';} ?> value='Michigan'>Michigan</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Minnesota') echo 'selected';} ?> value='Minnesota'>Minnesota</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Mississippi') echo 'selected';} ?> value='Mississippi'>Mississippi</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Missouri') echo 'selected';} ?> value='Missouri'>Missouri</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Montana') echo 'selected';} ?> value='Montana'>Montana</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Nebraska') echo 'selected';} ?> value='Nebraska'>Nebraska</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Nevada') echo 'selected';} ?> value='Nevada'>Nevada</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'New Hampshire') echo 'selected';} ?> value='New Hampshire'>New Hampshire</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'New Jersey') echo 'selected';} ?> value='New Jersey'>New Jersey</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'New Mexico') echo 'selected';} ?> value='New Mexico'>New Mexico</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'New York') echo 'selected';} ?> value='New York'>New York</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'North Carolina') echo 'selected';} ?> value='North Carolina'>North Carolina</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'North Dakota') echo 'selected';} ?> value='North Dakota'>North Dakota</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Ohio') echo 'selected';} ?> value='Ohio'>Ohio</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Oklahoma') echo 'selected';} ?> value='Oklahoma'>Oklahoma</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Oregon') echo 'selected';} ?> value='Oregon'>Oregon</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Pennsylvania') echo 'selected';} ?> value='Pennsylvania'>Pennsylvania</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Rhode Island') echo 'selected';} ?> value='Rhode Island'>Rhode Island</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'South Carolina') echo 'selected';} ?> value='South Carolina'>South Carolina</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'South Dakota') echo 'selected';} ?> value='South Dakota'>South Dakota</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Tennessee') echo 'selected';} ?> value='Tennessee'>Tennessee</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Texas') echo 'selected';} ?> value='Texas'>Texas</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Utah') echo 'selected';} ?> value='Utah'>Utah</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Vermont') echo 'selected';} ?> value='Vermont'>Vermont</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Virginia') echo 'selected';} ?> value='Virginia'>Virginia</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Washington') echo 'selected';} ?> value='Washington'>Washington</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'West Washington') echo 'selected';} ?> value='West Virginia'>West Virginia</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Wisconsin') echo 'selected';} ?> value='Wisconsin'>Wisconsin</option>
						<option <?php foreach($add_state_record as $st){if ($st->state == 'Wyoming') echo 'selected';} ?> value='Wyoming'>Wyoming</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Postcode</td>
				<td><input class="sr_input" type="text" name="postcode" id="postcode"  value="<?php echo stripslashes($rep[0]['postcode']); ?>"/></td>
			</tr>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script>
				$(document).ready(function() {
					$('#country').on('change', function() {
						$("#state_select").toggle($(this).val() == 'United States of America');
					}).trigger('change');
				});
			</script>
			<tr>
				<td>Main Country *</td>
				<td>
					<select class = "sr_input" name ="country" id="country">
						<option value=''></option>
						<option <?php if ($rep[0]['country'] === 'Afghanistan' ) echo 'selected'; ?> value="Afghanistan">Afghanistan</option>
						<option <?php if ($rep[0]['country'] === 'Åland Islands' ) echo 'selected'; ?> value="Åland Islands">Åland Islands</option>
						<option <?php if ($rep[0]['country'] === 'Albania' ) echo 'selected'; ?> value="Albania">Albania</option>
						<option <?php if ($rep[0]['country'] === 'Algeria' ) echo 'selected'; ?> value="Algeria">Algeria</option>
						<option <?php if ($rep[0]['country'] === 'American Samoa' ) echo 'selected'; ?> value="American Samoa">American Samoa</option>
						<option <?php if ($rep[0]['country'] === 'Andorra' ) echo 'selected'; ?> value="Andorra">Andorra</option>
						<option <?php if ($rep[0]['country'] === 'Angola' ) echo 'selected'; ?> value="Angola">Angola</option>
						<option <?php if ($rep[0]['country'] === 'Anguilla' ) echo 'selected'; ?> value="Anguilla">Anguilla</option>
						<option <?php if ($rep[0]['country'] === 'Antarctica' ) echo 'selected'; ?> value="Antarctica">Antarctica</option>
						<option <?php if ($rep[0]['country'] === 'Antigua and Barbuda' ) echo 'selected'; ?> value="Antigua and Barbuda">Antigua and Barbuda</option>
						<option <?php if ($rep[0]['country'] === 'Argentina' ) echo 'selected'; ?> value="Argentina">Argentina</option>
						<option <?php if ($rep[0]['country'] === 'Armenia' ) echo 'selected'; ?> value="Armenia">Armenia</option>
						<option <?php if ($rep[0]['country'] === 'Aruba' ) echo 'selected'; ?> value="Aruba">Aruba</option>
						<option <?php if ($rep[0]['country'] === 'Australia' ) echo 'selected'; ?> value="Australia">Australia</option>
						<option <?php if ($rep[0]['country'] === 'Austria' ) echo 'selected'; ?> value="Austria">Austria</option>
						<option <?php if ($rep[0]['country'] === 'Azerbaijan' ) echo 'selected'; ?> value="Azerbaijan">Azerbaijan</option>
						<option <?php if ($rep[0]['country'] === 'Bahamas' ) echo 'selected'; ?> value="Bahamas">Bahamas</option>
						<option <?php if ($rep[0]['country'] === 'Bahrain' ) echo 'selected'; ?> value="Bahrain">Bahrain</option>
						<option <?php if ($rep[0]['country'] === 'Bangladesh' ) echo 'selected'; ?> value="Bangladesh">Bangladesh</option>
						<option <?php if ($rep[0]['country'] === 'Barbados' ) echo 'selected'; ?> value="Barbados">Barbados</option>
						<option <?php if ($rep[0]['country'] === 'Belarus' ) echo 'selected'; ?> value="Belarus">Belarus</option>
						<option <?php if ($rep[0]['country'] === 'Belgium' ) echo 'selected'; ?> value="Belgium">Belgium</option>
						<option <?php if ($rep[0]['country'] === 'Belize' ) echo 'selected'; ?> value="Belize">Belize</option>
						<option <?php if ($rep[0]['country'] === 'Benin' ) echo 'selected'; ?> value="Benin">Benin</option>
						<option <?php if ($rep[0]['country'] === 'Bermuda' ) echo 'selected'; ?> value="Bermuda">Bermuda</option>
						<option <?php if ($rep[0]['country'] === 'Bhutan' ) echo 'selected'; ?> value="Bhutan">Bhutan</option>
						<option <?php if ($rep[0]['country'] === 'Bolivia' ) echo 'selected'; ?> value="Bolivia">Bolivia</option>
						<option <?php if ($rep[0]['country'] === 'Bosnia and Herzegovina' ) echo 'selected'; ?> value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
						<option <?php if ($rep[0]['country'] === 'Botswana' ) echo 'selected'; ?> value="Botswana">Botswana</option>
						<option <?php if ($rep[0]['country'] === 'Bouvet Island' ) echo 'selected'; ?> value="Bouvet Island">Bouvet Island</option>
						<option <?php if ($rep[0]['country'] === 'Brazil' ) echo 'selected'; ?> value="Brazil">Brazil</option>
						<option <?php if ($rep[0]['country'] === 'British Indian Ocean Territory' ) echo 'selected'; ?> value="British Indian Ocean Territory">British Indian Ocean Territory</option>
						<option <?php if ($rep[0]['country'] === 'Brunei Darussalam' ) echo 'selected'; ?> value="Brunei Darussalam">Brunei Darussalam</option>
						<option <?php if ($rep[0]['country'] === 'Bulgaria' ) echo 'selected'; ?> value="Bulgaria">Bulgaria</option>
						<option <?php if ($rep[0]['country'] === 'Burkina Faso' ) echo 'selected'; ?> value="Burkina Faso">Burkina Faso</option>
						<option <?php if ($rep[0]['country'] === 'Burundi' ) echo 'selected'; ?> value="Burundi">Burundi</option>
						<option <?php if ($rep[0]['country'] === 'Cambodia' ) echo 'selected'; ?> value="Cambodia">Cambodia</option>
						<option <?php if ($rep[0]['country'] === 'Cameroon' ) echo 'selected'; ?> value="Cameroon">Cameroon</option>
						<option <?php if ($rep[0]['country'] === 'Canada' ) echo 'selected'; ?> value="Canada">Canada</option>
						<option <?php if ($rep[0]['country'] === 'Cape Verde' ) echo 'selected'; ?> value="Cape Verde">Cape Verde</option>
						<option <?php if ($rep[0]['country'] === 'Cayman Islands' ) echo 'selected'; ?> value="Cayman Islands">Cayman Islands</option>
						<option <?php if ($rep[0]['country'] === 'Central African Republic' ) echo 'selected'; ?> value="Central African Republic">Central African Republic</option>
						<option <?php if ($rep[0]['country'] === 'Chad' ) echo 'selected'; ?> value="Chad">Chad</option>
						<option <?php if ($rep[0]['country'] === 'Chile' ) echo 'selected'; ?> value="Chile">Chile</option>
						<option <?php if ($rep[0]['country'] === 'China' ) echo 'selected'; ?> value="China">China</option>
						<option <?php if ($rep[0]['country'] === 'Christmas Island' ) echo 'selected'; ?> value="Christmas Island">Christmas Island</option>
						<option <?php if ($rep[0]['country'] === 'Cocos (Keeling) Islands' ) echo 'selected'; ?> value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
						<option <?php if ($rep[0]['country'] === 'Colombia' ) echo 'selected'; ?> value="Colombia">Colombia</option>
						<option <?php if ($rep[0]['country'] === 'Comoros' ) echo 'selected'; ?> value="Comoros">Comoros</option>
						<option <?php if ($rep[0]['country'] === 'Congo' ) echo 'selected'; ?> value="Congo">Congo</option>
						<option <?php if ($rep[0]['country'] === 'Congo, The Democratic Republic of The' ) echo 'selected'; ?> value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
						<option <?php if ($rep[0]['country'] === 'Cook Islands' ) echo 'selected'; ?> value="Cook Islands">Cook Islands</option>
						<option <?php if ($rep[0]['country'] === 'Costa Rica' ) echo 'selected'; ?> value="Costa Rica">Costa Rica</option>
						<option <?php if ($rep[0]['country'] === "Cote D'ivoire" ) echo 'selected'; ?> value="Cote D'ivoire">Cote D'ivoire</option>
						<option <?php if ($rep[0]['country'] === 'Croatia' ) echo 'selected'; ?> value="Croatia">Croatia</option>
						<option <?php if ($rep[0]['country'] === 'Cuba' ) echo 'selected'; ?> value="Cuba">Cuba</option>
						<option <?php if ($rep[0]['country'] === 'Cyprus' ) echo 'selected'; ?> value="Cyprus">Cyprus</option>
						<option <?php if ($rep[0]['country'] === 'Czech Republic' ) echo 'selected'; ?> value="Czech Republic">Czech Republic</option>
						<option <?php if ($rep[0]['country'] === 'Denmark' ) echo 'selected'; ?> value="Denmark">Denmark</option>
						<option <?php if ($rep[0]['country'] === 'Djibouti' ) echo 'selected'; ?> value="Djibouti">Djibouti</option>
						<option <?php if ($rep[0]['country'] === 'Dominica' ) echo 'selected'; ?> value="Dominica">Dominica</option>
						<option <?php if ($rep[0]['country'] === 'Dominican Republic' ) echo 'selected'; ?> value="Dominican Republic">Dominican Republic</option>
						<option <?php if ($rep[0]['country'] === 'Ecuador' ) echo 'selected'; ?> value="Ecuador">Ecuador</option>
						<option <?php if ($rep[0]['country'] === 'Egypt' ) echo 'selected'; ?> value="Egypt">Egypt</option>
						<option <?php if ($rep[0]['country'] === 'El Salvador' ) echo 'selected'; ?> value="El Salvador">El Salvador</option>
						<option <?php if ($rep[0]['country'] === 'Equatorial Guinea' ) echo 'selected'; ?> value="Equatorial Guinea">Equatorial Guinea</option>
						<option <?php if ($rep[0]['country'] === 'Eritrea' ) echo 'selected'; ?> value="Eritrea">Eritrea</option>
						<option <?php if ($rep[0]['country'] === 'Estonia' ) echo 'selected'; ?> value="Estonia">Estonia</option>
						<option <?php if ($rep[0]['country'] === 'Ethiopia' ) echo 'selected'; ?> value="Ethiopia">Ethiopia</option>
						<option <?php if ($rep[0]['country'] === 'Falkland Islands (Malvinas)' ) echo 'selected'; ?> value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
						<option <?php if ($rep[0]['country'] === 'Faroe Islands' ) echo 'selected'; ?> value="Faroe Islands">Faroe Islands</option>
						<option <?php if ($rep[0]['country'] === 'Fiji' ) echo 'selected'; ?> value="Fiji">Fiji</option>
						<option <?php if ($rep[0]['country'] === 'Finland' ) echo 'selected'; ?> value="Finland">Finland</option>
						<option <?php if ($rep[0]['country'] === 'France' ) echo 'selected'; ?> value="France">France</option>
						<option <?php if ($rep[0]['country'] === 'French Guiana' ) echo 'selected'; ?> value="French Guiana">French Guiana</option>
						<option <?php if ($rep[0]['country'] === 'French Polynesia' ) echo 'selected'; ?> value="French Polynesia">French Polynesia</option>
						<option <?php if ($rep[0]['country'] === 'French Southern Territories' ) echo 'selected'; ?> value="French Southern Territories">French Southern Territories</option>
						<option <?php if ($rep[0]['country'] === 'Gabon' ) echo 'selected'; ?> value="Gabon">Gabon</option>
						<option <?php if ($rep[0]['country'] === 'Gambia' ) echo 'selected'; ?> value="Gambia">Gambia</option>
						<option <?php if ($rep[0]['country'] === 'Georgia' ) echo 'selected'; ?> value="Georgia">Georgia</option>
						<option <?php if ($rep[0]['country'] === 'Germany' ) echo 'selected'; ?> value="Germany">Germany</option>
						<option <?php if ($rep[0]['country'] === 'Ghana' ) echo 'selected'; ?> value="Ghana">Ghana</option>
						<option <?php if ($rep[0]['country'] === 'Gibraltar' ) echo 'selected'; ?> value="Gibraltar">Gibraltar</option>
						<option <?php if ($rep[0]['country'] === 'Greece' ) echo 'selected'; ?> value="Greece">Greece</option>
						<option <?php if ($rep[0]['country'] === 'Greenland' ) echo 'selected'; ?> value="Greenland">Greenland</option>
						<option <?php if ($rep[0]['country'] === 'Grenada' ) echo 'selected'; ?> value="Grenada">Grenada</option>
						<option <?php if ($rep[0]['country'] === 'Guadeloupe' ) echo 'selected'; ?> value="Guadeloupe">Guadeloupe</option>
						<option <?php if ($rep[0]['country'] === 'Guam' ) echo 'selected'; ?> value="Guam">Guam</option>
						<option <?php if ($rep[0]['country'] === 'Guatemala' ) echo 'selected'; ?> value="Guatemala">Guatemala</option>
						<option <?php if ($rep[0]['country'] === 'Guernsey' ) echo 'selected'; ?> value="Guernsey">Guernsey</option>
						<option <?php if ($rep[0]['country'] === 'Guinea' ) echo 'selected'; ?> value="Guinea">Guinea</option>
						<option <?php if ($rep[0]['country'] === 'Guinea-bissau' ) echo 'selected'; ?> value="Guinea-bissau">Guinea-bissau</option>
						<option <?php if ($rep[0]['country'] === 'Guyana' ) echo 'selected'; ?> value="Guyana">Guyana</option>
						<option <?php if ($rep[0]['country'] === 'Haiti' ) echo 'selected'; ?> value="Haiti">Haiti</option>
						<option <?php if ($rep[0]['country'] === 'Heard Island and Mcdonald Islands' ) echo 'selected'; ?> value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
						<option <?php if ($rep[0]['country'] === 'Holy See (Vatican City State)' ) echo 'selected'; ?> value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
						<option <?php if ($rep[0]['country'] === 'Honduras' ) echo 'selected'; ?> value="Honduras">Honduras</option>
						<option <?php if ($rep[0]['country'] === 'Hong Kong' ) echo 'selected'; ?> value="Hong Kong">Hong Kong</option>
						<option <?php if ($rep[0]['country'] === 'Hungary' ) echo 'selected'; ?> value="Hungary">Hungary</option>
						<option <?php if ($rep[0]['country'] === 'Iceland' ) echo 'selected'; ?> value="Iceland">Iceland</option>
						<option <?php if ($rep[0]['country'] === 'India' ) echo 'selected'; ?> value="India">India</option>
						<option <?php if ($rep[0]['country'] === 'Indonesia' ) echo 'selected'; ?> value="Indonesia">Indonesia</option>
						<option <?php if ($rep[0]['country'] === 'Iran, Islamic Republic of' ) echo 'selected'; ?> value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
						<option <?php if ($rep[0]['country'] === 'Iraq' ) echo 'selected'; ?> value="Iraq">Iraq</option>
						<option <?php if ($rep[0]['country'] === 'Ireland' ) echo 'selected'; ?> value="Ireland">Ireland</option>
						<option <?php if ($rep[0]['country'] === 'Isle of Man' ) echo 'selected'; ?> value="Isle of Man">Isle of Man</option>
						<option <?php if ($rep[0]['country'] === 'Israel' ) echo 'selected'; ?> value="Israel">Israel</option>
						<option <?php if ($rep[0]['country'] === 'Italy' ) echo 'selected'; ?> value="Italy">Italy</option>
						<option <?php if ($rep[0]['country'] === 'Jamaica' ) echo 'selected'; ?> value="Jamaica">Jamaica</option>
						<option <?php if ($rep[0]['country'] === 'Japan' ) echo 'selected'; ?> value="Japan">Japan</option>
						<option <?php if ($rep[0]['country'] === 'Jersey' ) echo 'selected'; ?> value="Jersey">Jersey</option>
						<option <?php if ($rep[0]['country'] === 'Jordan' ) echo 'selected'; ?> value="Jordan">Jordan</option>
						<option <?php if ($rep[0]['country'] === 'Kazakhstan' ) echo 'selected'; ?> value="Kazakhstan">Kazakhstan</option>
						<option <?php if ($rep[0]['country'] === 'Kenya' ) echo 'selected'; ?> value="Kenya">Kenya</option>
						<option <?php if ($rep[0]['country'] === 'Kiribati' ) echo 'selected'; ?> value="Kiribati">Kiribati</option>
						<option <?php if ($rep[0]['country'] === "Korea, Democratic People's Republic of" ) echo 'selected'; ?> value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
						<option <?php if ($rep[0]['country'] === 'Korea, Republic of' ) echo 'selected'; ?> value="Korea, Republic of">Korea, Republic of</option>
						<option <?php if ($rep[0]['country'] === 'Kuwait' ) echo 'selected'; ?> value="Kuwait">Kuwait</option>
						<option <?php if ($rep[0]['country'] === 'Kyrgyzstan' ) echo 'selected'; ?> value="Kyrgyzstan">Kyrgyzstan</option>
						<option <?php if ($rep[0]['country'] === "Lao People's Democratic Republic" ) echo 'selected'; ?> value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
						<option <?php if ($rep[0]['country'] === 'Latvia' ) echo 'selected'; ?> value="Latvia">Latvia</option>
						<option <?php if ($rep[0]['country'] === 'Lebanon' ) echo 'selected'; ?> value="Lebanon">Lebanon</option>
						<option <?php if ($rep[0]['country'] === 'Lesotho' ) echo 'selected'; ?> value="Lesotho">Lesotho</option>
						<option <?php if ($rep[0]['country'] === 'Liberia' ) echo 'selected'; ?> value="Liberia">Liberia</option>
						<option <?php if ($rep[0]['country'] === 'Libyan Arab Jamahiriya' ) echo 'selected'; ?> value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
						<option <?php if ($rep[0]['country'] === 'Liechtenstein' ) echo 'selected'; ?> value="Liechtenstein">Liechtenstein</option>
						<option <?php if ($rep[0]['country'] === 'Lithuania' ) echo 'selected'; ?> value="Lithuania">Lithuania</option>
						<option <?php if ($rep[0]['country'] === 'Luxembourg' ) echo 'selected'; ?> value="Luxembourg">Luxembourg</option>
						<option <?php if ($rep[0]['country'] === 'Macao' ) echo 'selected'; ?> value="Macao">Macao</option>
						<option <?php if ($rep[0]['country'] === 'Macedonia, The Former Yugoslav Republic of' ) echo 'selected'; ?> value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
						<option <?php if ($rep[0]['country'] === 'Madagascar' ) echo 'selected'; ?> value="Madagascar">Madagascar</option>
						<option <?php if ($rep[0]['country'] === 'Malawi' ) echo 'selected'; ?> value="Malawi">Malawi</option>
						<option <?php if ($rep[0]['country'] === 'Malaysia' ) echo 'selected'; ?> value="Malaysia">Malaysia</option>
						<option <?php if ($rep[0]['country'] === 'Maldives' ) echo 'selected'; ?> value="Maldives">Maldives</option>
						<option <?php if ($rep[0]['country'] === 'Mali' ) echo 'selected'; ?> value="Mali">Mali</option>
						<option <?php if ($rep[0]['country'] === 'Malta' ) echo 'selected'; ?> value="Malta">Malta</option>
						<option <?php if ($rep[0]['country'] === 'Marshall Islands' ) echo 'selected'; ?> value="Marshall Islands">Marshall Islands</option>
						<option <?php if ($rep[0]['country'] === 'Martinique' ) echo 'selected'; ?> value="Martinique">Martinique</option>
						<option <?php if ($rep[0]['country'] === 'Mauritania' ) echo 'selected'; ?> value="Mauritania">Mauritania</option>
						<option <?php if ($rep[0]['country'] === 'Mauritius' ) echo 'selected'; ?> value="Mauritius">Mauritius</option>
						<option <?php if ($rep[0]['country'] === 'Mayotte' ) echo 'selected'; ?> value="Mayotte">Mayotte</option>
						<option <?php if ($rep[0]['country'] === 'Mexico' ) echo 'selected'; ?> value="Mexico">Mexico</option>
						<option <?php if ($rep[0]['country'] === 'Micronesia, Federated States of' ) echo 'selected'; ?> value="Micronesia, Federated States of">Micronesia, Federated States of</option>
						<option <?php if ($rep[0]['country'] === 'Moldova, Republic of' ) echo 'selected'; ?> value="Moldova, Republic of">Moldova, Republic of</option>
						<option <?php if ($rep[0]['country'] === 'Monaco' ) echo 'selected'; ?> value="Monaco">Monaco</option>
						<option <?php if ($rep[0]['country'] === 'Mongolia' ) echo 'selected'; ?> value="Mongolia">Mongolia</option>
						<option <?php if ($rep[0]['country'] === 'Montenegro' ) echo 'selected'; ?> value="Montenegro">Montenegro</option>
						<option <?php if ($rep[0]['country'] === 'Montserrat' ) echo 'selected'; ?> value="Montserrat">Montserrat</option>
						<option <?php if ($rep[0]['country'] === 'Morocco' ) echo 'selected'; ?> value="Morocco">Morocco</option>
						<option <?php if ($rep[0]['country'] === 'Mozambique' ) echo 'selected'; ?> value="Mozambique">Mozambique</option>
						<option <?php if ($rep[0]['country'] === 'Myanmar' ) echo 'selected'; ?> value="Myanmar">Myanmar</option>
						<option <?php if ($rep[0]['country'] === 'Namibia' ) echo 'selected'; ?> value="Namibia">Namibia</option>
						<option <?php if ($rep[0]['country'] === 'Nauru' ) echo 'selected'; ?> value="Nauru">Nauru</option>
						<option <?php if ($rep[0]['country'] === 'Nepal' ) echo 'selected'; ?> value="Nepal">Nepal</option>
						<option <?php if ($rep[0]['country'] === 'Netherlands' ) echo 'selected'; ?> value="Netherlands">Netherlands</option>
						<option <?php if ($rep[0]['country'] === 'Netherlands Antilles' ) echo 'selected'; ?> value="Netherlands Antilles">Netherlands Antilles</option>
						<option <?php if ($rep[0]['country'] === 'New Caledonia' ) echo 'selected'; ?> value="New Caledonia">New Caledonia</option>
						<option <?php if ($rep[0]['country'] === 'New Zealand' ) echo 'selected'; ?> value="New Zealand">New Zealand</option>
						<option <?php if ($rep[0]['country'] === 'Nicaragua' ) echo 'selected'; ?> value="Nicaragua">Nicaragua</option>
						<option <?php if ($rep[0]['country'] === 'Niger' ) echo 'selected'; ?> value="Niger">Niger</option>
						<option <?php if ($rep[0]['country'] === 'Nigeria' ) echo 'selected'; ?> value="Nigeria">Nigeria</option>
						<option <?php if ($rep[0]['country'] === 'Niue' ) echo 'selected'; ?> value="Niue">Niue</option>
						<option <?php if ($rep[0]['country'] === 'Norfolk Island' ) echo 'selected'; ?> value="Norfolk Island">Norfolk Island</option>
						<option <?php if ($rep[0]['country'] === 'Northern Mariana Islands' ) echo 'selected'; ?> value="Northern Mariana Islands">Northern Mariana Islands</option>
						<option <?php if ($rep[0]['country'] === 'Norway' ) echo 'selected'; ?> value="Norway">Norway</option>
						<option <?php if ($rep[0]['country'] === 'Oman' ) echo 'selected'; ?> value="Oman">Oman</option>
						<option <?php if ($rep[0]['country'] === 'Pakistan' ) echo 'selected'; ?> value="Pakistan">Pakistan</option>
						<option <?php if ($rep[0]['country'] === 'Palau' ) echo 'selected'; ?> value="Palau">Palau</option>
						<option <?php if ($rep[0]['country'] === 'Palestinian Territory, Occupied' ) echo 'selected'; ?> value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
						<option <?php if ($rep[0]['country'] === 'Panama' ) echo 'selected'; ?> value="Panama">Panama</option>
						<option <?php if ($rep[0]['country'] === 'Papua New Guinea' ) echo 'selected'; ?> value="Papua New Guinea">Papua New Guinea</option>
						<option <?php if ($rep[0]['country'] === 'Paraguay' ) echo 'selected'; ?> value="Paraguay">Paraguay</option>
						<option <?php if ($rep[0]['country'] === 'Peru' ) echo 'selected'; ?> value="Peru">Peru</option>
						<option <?php if ($rep[0]['country'] === 'Philippines' ) echo 'selected'; ?> value="Philippines">Philippines</option>
						<option <?php if ($rep[0]['country'] === 'Pitcairn' ) echo 'selected'; ?> value="Pitcairn">Pitcairn</option>
						<option <?php if ($rep[0]['country'] === 'Poland' ) echo 'selected'; ?> value="Poland">Poland</option>
						<option <?php if ($rep[0]['country'] === 'Portugal' ) echo 'selected'; ?> value="Portugal">Portugal</option>
						<option <?php if ($rep[0]['country'] === 'Puerto Rico' ) echo 'selected'; ?> value="Puerto Rico">Puerto Rico</option>
						<option <?php if ($rep[0]['country'] === 'Qatar' ) echo 'selected'; ?> value="Qatar">Qatar</option>
						<option <?php if ($rep[0]['country'] === 'Reunion' ) echo 'selected'; ?> value="Reunion">Reunion</option>
						<option <?php if ($rep[0]['country'] === 'Romania' ) echo 'selected'; ?> value="Romania">Romania</option>
						<option <?php if ($rep[0]['country'] === 'Russia' ) echo 'selected'; ?> value="Russia">Russian</option>
						<option <?php if ($rep[0]['country'] === 'Rwanda' ) echo 'selected'; ?> value="Rwanda">Rwanda</option>
						<option <?php if ($rep[0]['country'] === 'Saint Helena' ) echo 'selected'; ?> value="Saint Helena">Saint Helena</option>
						<option <?php if ($rep[0]['country'] === 'Saint Kitts and Nevis' ) echo 'selected'; ?> value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
						<option <?php if ($rep[0]['country'] === 'Saint Lucia' ) echo 'selected'; ?> value="Saint Lucia">Saint Lucia</option>
						<option <?php if ($rep[0]['country'] === 'Saint Pierre and Miquelon' ) echo 'selected'; ?> value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
						<option <?php if ($rep[0]['country'] === 'Saint Vincent and The Grenadines' ) echo 'selected'; ?> value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
						<option <?php if ($rep[0]['country'] === 'Samoa' ) echo 'selected'; ?> value="Samoa">Samoa</option>
						<option <?php if ($rep[0]['country'] === 'San Marino' ) echo 'selected'; ?> value="San Marino">San Marino</option>
						<option <?php if ($rep[0]['country'] === 'Sao Tome and Principe' ) echo 'selected'; ?> value="Sao Tome and Principe">Sao Tome and Principe</option>
						<option <?php if ($rep[0]['country'] === 'Saudi Arabia' ) echo 'selected'; ?> value="Saudi Arabia">Saudi Arabia</option>
						<option <?php if ($rep[0]['country'] === 'Senegal' ) echo 'selected'; ?> value="Senegal">Senegal</option>
						<option <?php if ($rep[0]['country'] === 'Serbia' ) echo 'selected'; ?> value="Serbia">Serbia</option>
						<option <?php if ($rep[0]['country'] === 'Seychelles' ) echo 'selected'; ?> value="Seychelles">Seychelles</option>
						<option <?php if ($rep[0]['country'] === 'Sierra Leone' ) echo 'selected'; ?> value="Sierra Leone">Sierra Leone</option>
						<option <?php if ($rep[0]['country'] === 'Singapore' ) echo 'selected'; ?> value="Singapore">Singapore</option>
						<option <?php if ($rep[0]['country'] === 'Slovakia' ) echo 'selected'; ?> value="Slovakia">Slovakia</option>
						<option <?php if ($rep[0]['country'] === 'Slovenia' ) echo 'selected'; ?> value="Slovenia">Slovenia</option>
						<option <?php if ($rep[0]['country'] === 'Solomon Islands' ) echo 'selected'; ?> value="Solomon Islands">Solomon Islands</option>
						<option <?php if ($rep[0]['country'] === 'Somalia' ) echo 'selected'; ?> value="Somalia">Somalia</option>
						<option <?php if ($rep[0]['country'] === 'South Africa' ) echo 'selected'; ?> value="South Africa">South Africa</option>
						<option <?php if ($rep[0]['country'] === 'South Georgia and The South Sandwich Islands' ) echo 'selected'; ?> value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
						<option <?php if ($rep[0]['country'] === 'Spain' ) echo 'selected'; ?> value="Spain">Spain</option>
						<option <?php if ($rep[0]['country'] === 'Sri Lanka' ) echo 'selected'; ?> value="Sri Lanka">Sri Lanka</option>
						<option <?php if ($rep[0]['country'] === 'Sudan' ) echo 'selected'; ?> value="Sudan">Sudan</option>
						<option <?php if ($rep[0]['country'] === 'Suriname' ) echo 'selected'; ?> value="Suriname">Suriname</option>
						<option <?php if ($rep[0]['country'] === 'Svalbard and Jan Mayen' ) echo 'selected'; ?> value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
						<option <?php if ($rep[0]['country'] === 'Swaziland' ) echo 'selected'; ?> value="Swaziland">Swaziland</option>
						<option <?php if ($rep[0]['country'] === 'Sweden' ) echo 'selected'; ?> value="Sweden">Sweden</option>
						<option <?php if ($rep[0]['country'] === 'Switzerland' ) echo 'selected'; ?> value="Switzerland">Switzerland</option>
						<option <?php if ($rep[0]['country'] === 'Syrian Arab Republic' ) echo 'selected'; ?> value="Syrian Arab Republic">Syrian Arab Republic</option>
						<option <?php if ($rep[0]['country'] === 'Taiwan, Province of China' ) echo 'selected'; ?> value="Taiwan, Province of China">Taiwan, Province of China</option>
						<option <?php if ($rep[0]['country'] === 'Tajikistan' ) echo 'selected'; ?> value="Tajikistan">Tajikistan</option>
						<option <?php if ($rep[0]['country'] === 'Tanzania, United Republic of' ) echo 'selected'; ?> value="Tanzania, United Republic of">Tanzania, United Republic of</option>
						<option <?php if ($rep[0]['country'] === 'Thailand' ) echo 'selected'; ?> value="Thailand">Thailand</option>
						<option <?php if ($rep[0]['country'] === 'Timor-leste' ) echo 'selected'; ?> value="Timor-leste">Timor-leste</option>
						<option <?php if ($rep[0]['country'] === 'Togo' ) echo 'selected'; ?> value="Togo">Togo</option>
						<option <?php if ($rep[0]['country'] === 'Tokelau' ) echo 'selected'; ?> value="Tokelau">Tokelau</option>
						<option <?php if ($rep[0]['country'] === 'Tonga' ) echo 'selected'; ?> value="Tonga">Tonga</option>
						<option <?php if ($rep[0]['country'] === 'Trinidad and Tobago' ) echo 'selected'; ?> value="Trinidad and Tobago">Trinidad and Tobago</option>
						<option <?php if ($rep[0]['country'] === 'Tunisia' ) echo 'selected'; ?> value="Tunisia">Tunisia</option>
						<option <?php if ($rep[0]['country'] === 'Turkey' ) echo 'selected'; ?> value="Turkey">Turkey</option>
						<option <?php if ($rep[0]['country'] === 'Turkmenistan' ) echo 'selected'; ?> value="Turkmenistan">Turkmenistan</option>
						<option <?php if ($rep[0]['country'] === 'Turks and Caicos Islands' ) echo 'selected'; ?> value="Turks and Caicos Islands">Turks and Caicos Islands</option>
						<option <?php if ($rep[0]['country'] === 'Tuvalu' ) echo 'selected'; ?> value="Tuvalu">Tuvalu</option>
						<option <?php if ($rep[0]['country'] === 'Uganda' ) echo 'selected'; ?> value="Uganda">Uganda</option>
						<option <?php if ($rep[0]['country'] === 'Ukraine' ) echo 'selected'; ?> value="Ukraine">Ukraine</option>
						<option <?php if ($rep[0]['country'] === 'United Arab Emirates' ) echo 'selected'; ?> value="United Arab Emirates">United Arab Emirates</option>
						<option <?php if ($rep[0]['country'] === 'United Kingdom' ) echo 'selected'; ?> value="United Kingdom">United Kingdom</option>
						<option <?php if ($rep[0]['country'] === 'United States of America' ) echo 'selected'; ?> value="United States of America">United States of America</option>
						<option <?php if ($rep[0]['country'] === 'United States Minor Outlying Islands' ) echo 'selected'; ?> value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
						<option <?php if ($rep[0]['country'] === 'Uruguay' ) echo 'selected'; ?> value="Uruguay">Uruguay</option>
						<option <?php if ($rep[0]['country'] === 'Uzbekistan' ) echo 'selected'; ?> value="Uzbekistan">Uzbekistan</option>
						<option <?php if ($rep[0]['country'] === 'Vanuatu' ) echo 'selected'; ?> value="Vanuatu">Vanuatu</option>
						<option <?php if ($rep[0]['country'] === 'Venezuela' ) echo 'selected'; ?> value="Venezuela">Venezuela</option>
						<option <?php if ($rep[0]['country'] === 'Vietnam' ) echo 'selected'; ?> value="Vietnam">Vietnam</option>
						<option <?php if ($rep[0]['country'] === 'Virgin Islands, British' ) echo 'selected'; ?> value="Virgin Islands, British">Virgin Islands, British</option>
						<option <?php if ($rep[0]['country'] === 'Virgin Islands, U.S.' ) echo 'selected'; ?> value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
						<option <?php if ($rep[0]['country'] === 'Wallis and Futuna' ) echo 'selected'; ?> value="Wallis and Futuna">Wallis and Futuna</option>
						<option <?php if ($rep[0]['country'] === 'Western Sahara' ) echo 'selected'; ?> value="Western Sahara">Western Sahara</option>
						<option <?php if ($rep[0]['country'] === 'Yemen' ) echo 'selected'; ?> value="Yemen">Yemen</option>
						<option <?php if ($rep[0]['country'] === 'Zambia' ) echo 'selected'; ?> value="Zambia">Zambia</option>
						<option <?php if ($rep[0]['country'] === 'Zimbabwe' ) echo 'selected'; ?> value="Zimbabwe">Zimbabwe</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Additional Countries - (Hold CTRL to make multiple selections)</td>
				<td>
					<select class = "sr_input" name ="add_country[]" id="add_country" multiple>
						<?php
							$countries_sql = "SELECT country FROM wp_sr_additional_countries WHERE location_id = '" . $rep[0]['id'] . "'";
							$countries = $wpdb->get_results($countries_sql);
						?>

						<option <?php foreach($countries as $co){if ($co->country === 'Afghanistan') echo 'selected';} ?> value="Afghanistan">Afghanistan</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Åland Islands') echo 'selected';} ?> value="Åland Islands">Åland Islands</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Albania') echo 'selected';} ?> value="Albania">Albania</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Algeria') echo 'selected';} ?> value="Algeria">Algeria</option>
						<option <?php foreach($countries as $co){if ($co->country === 'American Samoa') echo 'selected';} ?> value="American Samoa">American Samoa</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Andorra') echo 'selected';} ?> value="Andorra">Andorra</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Angola') echo 'selected';} ?> value="Angola">Angola</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Anguilla') echo 'selected';} ?> value="Anguilla">Anguilla</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Antarctica') echo 'selected';} ?> value="Antarctica">Antarctica</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Antigua and Barbuda') echo 'selected';} ?> value="Antigua and Barbuda">Antigua and Barbuda</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Argentina') echo 'selected';} ?> value="Argentina">Argentina</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Armenia') echo 'selected';} ?> value="Armenia">Armenia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Aruba') echo 'selected';} ?> value="Aruba">Aruba</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Australia') echo 'selected';} ?> value="Australia">Australia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Austria') echo 'selected';} ?> value="Austria">Austria</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Azerbaijan') echo 'selected';} ?> value="Azerbaijan">Azerbaijan</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Bahamas') echo 'selected';} ?> value="Bahamas">Bahamas</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Bahrain') echo 'selected';} ?> value="Bahrain">Bahrain</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Bangladesh') echo 'selected';} ?> value="Bangladesh">Bangladesh</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Barbados') echo 'selected';} ?> value="Barbados">Barbados</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Belarus') echo 'selected';} ?> value="Belarus">Belarus</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Belgium') echo 'selected';} ?> value="Belgium">Belgium</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Belize') echo 'selected';} ?> value="Belize">Belize</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Benin') echo 'selected';} ?> value="Benin">Benin</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Bermuda') echo 'selected';} ?> value="Bermuda">Bermuda</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Bhutan') echo 'selected';} ?> value="Bhutan">Bhutan</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Bolivia') echo 'selected';} ?> value="Bolivia">Bolivia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Bosnia and Herzegovina') echo 'selected';} ?> value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Botswana') echo 'selected';} ?> value="Botswana">Botswana</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Bouvet Island') echo 'selected';} ?> value="Bouvet Island">Bouvet Island</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Brazil') echo 'selected';} ?> value="Brazil">Brazil</option>
						<option <?php foreach($countries as $co){if ($co->country === 'British Indian Ocean Territory') echo 'selected';} ?> value="British Indian Ocean Territory">British Indian Ocean Territory</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Brunei Darussalam') echo 'selected';} ?> value="Brunei Darussalam">Brunei Darussalam</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Bulgaria') echo 'selected';} ?> value="Bulgaria">Bulgaria</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Burkina Faso') echo 'selected';} ?> value="Burkina Faso">Burkina Faso</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Burundi') echo 'selected';} ?> value="Burundi">Burundi</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Cambodia') echo 'selected';} ?> value="Cambodia">Cambodia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Cameroon') echo 'selected';} ?> value="Cameroon">Cameroon</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Canada') echo 'selected';} ?> value="Canada">Canada</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Cape Verde') echo 'selected';} ?> value="Cape Verde">Cape Verde</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Cayman Islands') echo 'selected';} ?> value="Cayman Islands">Cayman Islands</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Central African Republic') echo 'selected';} ?> value="Central African Republic">Central African Republic</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Chad') echo 'selected';} ?> value="Chad">Chad</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Chile') echo 'selected';} ?> value="Chile">Chile</option>
						<option <?php foreach($countries as $co){if ($co->country === 'China') echo 'selected';} ?> value="China">China</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Christmas Island') echo 'selected';} ?> value="Christmas Island">Christmas Island</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Cocos (Keeling) Islands') echo 'selected';} ?> value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Colombia') echo 'selected';} ?> value="Colombia">Colombia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Comoros') echo 'selected';} ?> value="Comoros">Comoros</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Congo') echo 'selected';} ?> value="Congo">Congo</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Congo, The Democratic Republic of The') echo 'selected';} ?> value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Cook Islands') echo 'selected';} ?> value="Cook Islands">Cook Islands</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Costa Rica') echo 'selected';} ?> value="Costa Rica">Costa Rica</option>
						<option <?php foreach($countries as $co){if ($co->country === "Cote D'ivoire") echo 'selected';} ?> value="Cote D'ivoire">Cote D'ivoire</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Croatia') echo 'selected';} ?> value="Croatia">Croatia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Cuba') echo 'selected';} ?> value="Cuba">Cuba</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Cyprus') echo 'selected';} ?> value="Cyprus">Cyprus</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Czech Republic') echo 'selected';} ?> value="Czech Republic">Czech Republic</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Denmark') echo 'selected';} ?> value="Denmark">Denmark</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Djibouti') echo 'selected';} ?> value="Djibouti">Djibouti</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Dominica') echo 'selected';} ?> value="Dominica">Dominica</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Dominican Republic') echo 'selected';} ?> value="Dominican Republic">Dominican Republic</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Ecuador') echo 'selected';} ?> value="Ecuador">Ecuador</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Egypt') echo 'selected';} ?> value="Egypt">Egypt</option>
						<option <?php foreach($countries as $co){if ($co->country === 'El Salvador') echo 'selected';} ?> value="El Salvador">El Salvador</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Equatorial Guinea') echo 'selected';} ?> value="Equatorial Guinea">Equatorial Guinea</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Eritrea') echo 'selected';} ?> value="Eritrea">Eritrea</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Estonia') echo 'selected';} ?> value="Estonia">Estonia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Ethiopia') echo 'selected';} ?> value="Ethiopia">Ethiopia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Falkland Islands (Malvinas)') echo 'selected';} ?> value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Faroe Islands') echo 'selected';} ?> value="Faroe Islands">Faroe Islands</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Fiji') echo 'selected';} ?> value="Fiji">Fiji</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Finland') echo 'selected';} ?> value="Finland">Finland</option>
						<option <?php foreach($countries as $co){if ($co->country === 'France') echo 'selected';} ?> value="France">France</option>
						<option <?php foreach($countries as $co){if ($co->country === 'French Guiana') echo 'selected';} ?> value="French Guiana">French Guiana</option>
						<option <?php foreach($countries as $co){if ($co->country === 'French Polynesia') echo 'selected';} ?> value="French Polynesia">French Polynesia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'French Southern Territories') echo 'selected';} ?> value="French Southern Territories">French Southern Territories</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Gabon') echo 'selected';} ?> value="Gabon">Gabon</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Gambia') echo 'selected';} ?> value="Gambia">Gambia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Georgia') echo 'selected';} ?> value="Georgia">Georgia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Germany') echo 'selected';} ?> value="Germany">Germany</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Ghana') echo 'selected';} ?> value="Ghana">Ghana</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Gibraltar') echo 'selected';} ?> value="Gibraltar">Gibraltar</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Greece') echo 'selected';} ?> value="Greece">Greece</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Greenland') echo 'selected';} ?> value="Greenland">Greenland</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Grenada') echo 'selected';} ?> value="Grenada">Grenada</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Guadeloupe') echo 'selected';} ?> value="Guadeloupe">Guadeloupe</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Guam') echo 'selected';} ?> value="Guam">Guam</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Guatemala') echo 'selected';} ?> value="Guatemala">Guatemala</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Guernsey') echo 'selected';} ?> value="Guernsey">Guernsey</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Guinea') echo 'selected';} ?> value="Guinea">Guinea</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Guinea-bissau') echo 'selected';} ?> value="Guinea-bissau">Guinea-bissau</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Guyana') echo 'selected';} ?> value="Guyana">Guyana</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Haiti') echo 'selected';} ?> value="Haiti">Haiti</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Heard Island and Mcdonald Islands') echo 'selected';} ?> value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Holy See (Vatican City State)') echo 'selected';} ?> value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Honduras') echo 'selected';} ?> value="Honduras">Honduras</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Hong Kong') echo 'selected';}?> value="Hong Kong">Hong Kong</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Hungary') echo 'selected';} ?> value="Hungary">Hungary</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Iceland') echo 'selected';} ?> value="Iceland">Iceland</option>
						<option <?php foreach($countries as $co){if ($co->country === 'India') echo 'selected';} ?> value="India">India</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Indonesia') echo 'selected';} ?> value="Indonesia">Indonesia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Iran, Islamic Republic of') echo 'selected';} ?> value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Iraq') echo 'selected';} ?> value="Iraq">Iraq</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Ireland') echo 'selected';} ?> value="Ireland">Ireland</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Isle of Man') echo 'selected';} ?> value="Isle of Man">Isle of Man</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Israel') echo 'selected';} ?> value="Israel">Israel</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Italy') echo 'selected';} ?> value="Italy">Italy</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Jamaica') echo 'selected';} ?> value="Jamaica">Jamaica</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Japan') echo 'selected';} ?> value="Japan">Japan</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Jersey') echo 'selected';} ?> value="Jersey">Jersey</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Jordan') echo 'selected';} ?> value="Jordan">Jordan</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Kazakhstan') echo 'selected';} ?> value="Kazakhstan">Kazakhstan</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Kenya') echo 'selected';} ?> value="Kenya">Kenya</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Kiribati') echo 'selected';} ?> value="Kiribati">Kiribati</option>
						<option <?php foreach($countries as $co){if ($co->country === "Korea, Democratic People's Republic of") echo 'selected';} ?> value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Korea, Republic of') echo 'selected';} ?> value="Korea, Republic of">Korea, Republic of</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Kuwait') echo 'selected';} ?> value="Kuwait">Kuwait</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Kyrgyzstan') echo 'selected';} ?> value="Kyrgyzstan">Kyrgyzstan</option>
						<option <?php foreach($countries as $co){if ($co->country === "Lao People's Democratic Republic") echo 'selected';} ?> value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Latvia') echo 'selected';} ?> value="Latvia">Latvia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Lebanon') echo 'selected';} ?> value="Lebanon">Lebanon</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Lesotho') echo 'selected';} ?> value="Lesotho">Lesotho</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Liberia') echo 'selected';} ?> value="Liberia">Liberia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Libyan Arab Jamahiriya') echo 'selected';} ?> value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Liechtenstein') echo 'selected';} ?> value="Liechtenstein">Liechtenstein</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Lithuania') echo 'selected';} ?> value="Lithuania">Lithuania</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Luxembourg') echo 'selected';} ?> value="Luxembourg">Luxembourg</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Macao') echo 'selected';} ?> value="Macao">Macao</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Macedonia, The Former Yugoslav Republic of') echo 'selected';} ?> value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Madagascar') echo 'selected';} ?> value="Madagascar">Madagascar</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Malawi') echo 'selected';} ?> value="Malawi">Malawi</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Malaysia') echo 'selected';} ?> value="Malaysia">Malaysia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Maldives') echo 'selected';} ?> value="Maldives">Maldives</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Mali') echo 'selected';} ?> value="Mali">Mali</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Malta') echo 'selected';} ?> value="Malta">Malta</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Marshall Islands') echo 'selected';} ?> value="Marshall Islands">Marshall Islands</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Martinique') echo 'selected';} ?> value="Martinique">Martinique</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Mauritania') echo 'selected';} ?> value="Mauritania">Mauritania</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Mauritius') echo 'selected';} ?> value="Mauritius">Mauritius</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Mayotte') echo 'selected';} ?> value="Mayotte">Mayotte</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Mexico') echo 'selected';} ?> value="Mexico">Mexico</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Micronesia, Federated States of') echo 'selected';} ?> value="Micronesia, Federated States of">Micronesia, Federated States of</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Moldova, Republic of') echo 'selected';} ?> value="Moldova, Republic of">Moldova, Republic of</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Monaco') echo 'selected';} ?> value="Monaco">Monaco</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Mongolia') echo 'selected';} ?> value="Mongolia">Mongolia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Montenegro') echo 'selected';} ?> value="Montenegro">Montenegro</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Montserrat') echo 'selected';} ?> value="Montserrat">Montserrat</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Morocco') echo 'selected';} ?> value="Morocco">Morocco</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Mozambique') echo 'selected';} ?> value="Mozambique">Mozambique</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Myanmar') echo 'selected';} ?> value="Myanmar">Myanmar</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Namibia') echo 'selected';} ?> value="Namibia">Namibia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Nauru') echo 'selected';} ?> value="Nauru">Nauru</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Nepal') echo 'selected';} ?> value="Nepal">Nepal</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Netherlands') echo 'selected';} ?> value="Netherlands">Netherlands</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Netherlands Antilles') echo 'selected';} ?> value="Netherlands Antilles">Netherlands Antilles</option>
						<option <?php foreach($countries as $co){if ($co->country === 'New Caledonia') echo 'selected';} ?> value="New Caledonia">New Caledonia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'New Zealand') echo 'selected';} ?> value="New Zealand">New Zealand</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Nicaragua') echo 'selected';} ?> value="Nicaragua">Nicaragua</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Niger') echo 'selected';} ?> value="Niger">Niger</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Nigeria') echo 'selected';} ?> value="Nigeria">Nigeria</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Niue') echo 'selected';} ?> value="Niue">Niue</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Norfolk Island') echo 'selected';} ?> value="Norfolk Island">Norfolk Island</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Northern Mariana Islands') echo 'selected';} ?> value="Northern Mariana Islands">Northern Mariana Islands</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Norway') echo 'selected';} ?> value="Norway">Norway</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Oman') echo 'selected';} ?> value="Oman">Oman</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Pakistan') echo 'selected';} ?> value="Pakistan">Pakistan</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Palau') echo 'selected';} ?> value="Palau">Palau</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Palestinian Territory, Occupied') echo 'selected';} ?> value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Panama') echo 'selected';} ?> value="Panama">Panama</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Papua New Guinea') echo 'selected';} ?> value="Papua New Guinea">Papua New Guinea</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Paraguay') echo 'selected';} ?> value="Paraguay">Paraguay</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Peru') echo 'selected';} ?> value="Peru">Peru</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Philippines') echo 'selected';} ?> value="Philippines">Philippines</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Pitcairn') echo 'selected';} ?> value="Pitcairn">Pitcairn</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Poland') echo 'selected';} ?> value="Poland">Poland</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Portugal') echo 'selected';} ?> value="Portugal">Portugal</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Puerto Rico') echo 'selected';} ?> value="Puerto Rico">Puerto Rico</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Qatar') echo 'selected';} ?> value="Qatar">Qatar</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Reunion') echo 'selected';} ?> value="Reunion">Reunion</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Romania') echo 'selected';} ?> value="Romania">Romania</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Russia') echo 'selected';} ?> value="Russia">Russian</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Rwanda') echo 'selected';} ?> value="Rwanda">Rwanda</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Saint Helena') echo 'selected';} ?> value="Saint Helena">Saint Helena</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Saint Kitts and Nevis') echo 'selected';} ?> value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Saint Lucia') echo 'selected';} ?> value="Saint Lucia">Saint Lucia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Saint Pierre and Miquelon') echo 'selected';} ?> value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Saint Vincent and The Grenadines') echo 'selected';} ?> value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Samoa') echo 'selected';} ?> value="Samoa">Samoa</option>
						<option <?php foreach($countries as $co){if ($co->country === 'San Marino') echo 'selected';} ?> value="San Marino">San Marino</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Sao Tome and Principe') echo 'selected';} ?> value="Sao Tome and Principe">Sao Tome and Principe</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Saudi Arabia') echo 'selected';} ?> value="Saudi Arabia">Saudi Arabia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Senegal') echo 'selected';} ?> value="Senegal">Senegal</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Serbia') echo 'selected';} ?> value="Serbia">Serbia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Seychelles') echo 'selected';} ?> value="Seychelles">Seychelles</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Sierra Leone') echo 'selected';} ?> value="Sierra Leone">Sierra Leone</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Singapore') echo 'selected';} ?> value="Singapore">Singapore</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Slovakia') echo 'selected';} ?> value="Slovakia">Slovakia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Slovenia') echo 'selected';} ?> value="Slovenia">Slovenia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Solomon Islands') echo 'selected';} ?> value="Solomon Islands">Solomon Islands</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Somalia') echo 'selected';} ?> value="Somalia">Somalia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'South Africa') echo 'selected';} ?> value="South Africa">South Africa</option>
						<option <?php foreach($countries as $co){if ($co->country === 'South Georgia and The South Sandwich Islands') echo 'selected';} ?> value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Spain') echo 'selected';} ?> value="Spain">Spain</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Sri Lanka') echo 'selected';} ?> value="Sri Lanka">Sri Lanka</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Sudan') echo 'selected';} ?> value="Sudan">Sudan</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Suriname') echo 'selected';} ?> value="Suriname">Suriname</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Svalbard and Jan Mayen') echo 'selected';} ?> value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Swaziland') echo 'selected';} ?> value="Swaziland">Swaziland</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Sweden') echo 'selected';} ?> value="Sweden">Sweden</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Switzerland') echo 'selected';} ?> value="Switzerland">Switzerland</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Syrian Arab Republic') echo 'selected';} ?> value="Syrian Arab Republic">Syrian Arab Republic</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Taiwan, Province of China') echo 'selected';} ?> value="Taiwan, Province of China">Taiwan, Province of China</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Tajikistan') echo 'selected';} ?> value="Tajikistan">Tajikistan</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Tanzania, United Republic of') echo 'selected';} ?> value="Tanzania, United Republic of">Tanzania, United Republic of</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Thailand') echo 'selected';} ?> value="Thailand">Thailand</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Timor-leste') echo 'selected';} ?> value="Timor-leste">Timor-leste</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Togo') echo 'selected';} ?> value="Togo">Togo</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Tokelau') echo 'selected';} ?> value="Tokelau">Tokelau</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Tonga') echo 'selected';} ?> value="Tonga">Tonga</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Trinidad and Tobago') echo 'selected';} ?> value="Trinidad and Tobago">Trinidad and Tobago</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Tunisia') echo 'selected';} ?> value="Tunisia">Tunisia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Turkey') echo 'selected';} ?> value="Turkey">Turkey</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Turkmenistan') echo 'selected';} ?> value="Turkmenistan">Turkmenistan</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Turks and Caicos Islands') echo 'selected';} ?> value="Turks and Caicos Islands">Turks and Caicos Islands</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Tuvalu') echo 'selected';} ?> value="Tuvalu">Tuvalu</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Uganda') echo 'selected';} ?> value="Uganda">Uganda</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Ukraine') echo 'selected';} ?> value="Ukraine">Ukraine</option>
						<option <?php foreach($countries as $co){if ($co->country === 'United Arab Emirates') echo 'selected';} ?> value="United Arab Emirates">United Arab Emirates</option>
						<option <?php foreach($countries as $co){if ($co->country === 'United Kingdom') echo 'selected';} ?> value="United Kingdom">United Kingdom</option>
						<option <?php foreach($countries as $co){if ($co->country === 'United States of America') echo 'selected';} ?> value="United States of America">United States of America</option>
						<option <?php foreach($countries as $co){if ($co->country === 'United States Minor Outlying Islands') echo 'selected';} ?> value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Uruguay') echo 'selected';} ?> value="Uruguay">Uruguay</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Uzbekistan') echo 'selected';} ?> value="Uzbekistan">Uzbekistan</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Vanuatu') echo 'selected';} ?> value="Vanuatu">Vanuatu</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Venezuela') echo 'selected';} ?> value="Venezuela">Venezuela</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Vietnam') echo 'selected';} ?> value="Vietnam">Vietnam</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Virgin Islands, British') echo 'selected';} ?> value="Virgin Islands, British">Virgin Islands, British</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Virgin Islands, U.S.') echo 'selected';} ?> value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Wallis and Futuna') echo 'selected';} ?> value="Wallis and Futuna">Wallis and Futuna</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Western Sahara') echo 'selected';} ?> value="Western Sahara">Western Sahara</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Yemen') echo 'selected';} ?> value="Yemen">Yemen</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Zambia') echo 'selected';} ?> value="Zambia">Zambia</option>
						<option <?php foreach($countries as $co){if ($co->country === 'Zimbabwe') echo 'selected';} ?> value="Zimbabwe">Zimbabwe</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Phone</td>
				<td><input type="text" class="sr_input" name="phone" id="phone" value="<?php echo stripslashes($rep[0]['phone']);?>"/></td>
			</tr>
			<tr>
				<td>Fax</td>
				<td><input type="text" class="sr_input" name="fax" id="fax"  value="<?php echo stripslashes($rep[0]['fax']); ?>"/></td>
			</tr>
			<tr>
				<td>Mobile</td>
				<td><input type="text" class="sr_input" name="mobile" id="mobile" value="<?php echo stripslashes($rep[0]['mobile']);?>"/></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" class="sr_input" name="email" id="email" value="<?php echo stripslashes($rep[0]['email']);?>"/></td>
			</tr>
			<tr>
				<td>Website</td>
				<td><input type="text" class="sr_input"  name="website" id="website" value="<?php echo stripslashes($rep[0]['website']); ?>"/></td>
			</tr>
			<tr>
				<td>Contact Name(s)</td>
				<td><input type="text" class="sr_input" name="contact_name" id="contact_name" value="<?php echo stripslashes($rep[0]['contact_name']);?>"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" class="button button-primary button-large" name="submit" id="submit" value="Edit Location" /></td>
			</tr>
		</table>
	</form>
</div>
