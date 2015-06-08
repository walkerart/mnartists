<?php 

function mn_ap_edit($nid, $uid) {
  //return path back to opportunity submission in query string
  //$path = check_plain($_GET['destination']); 
  $path = drupal_get_query_parameters();
  $destination =  isset($path['destination']) ? $path['destination'] : '';
  $path = check_plain($destination);

  //load mn_ap.apply.inc to reuse functions that are here
  module_load_include('inc', 'mn_ap', 'mn_ap.apply');
  
  //load user for the application that is begin submitted
  $user = user_load($uid); 
  $name = $user->name;
  
  //get information defined in the Opportunity Content Type
	$op_data = mn_ap_opportunity_data($nid);
	//check for exiting application
	$ap_data = mn_ap_application_data($nid, $uid);
  //Set to reopen
  if($ap_data['complete'] == '1' ) {
    $ap_data['reopen'] = '1';
  }
  //custom reopen mode of admin_edit
  $ap_data['admin_edit'] = '1';
  //getting name of user for application
  $ap_data['name'] = $name;
  //passing along return path
  $ap_data['return-path'] = $path;
  
  //reusing what is currently in place
	$output = '';
	//check id completed or still in progress
	$user_artworks = mn_ap_artworks_data($uid);
	$resume = mnartist_profiles_resume_download($uid);

		//if exists query op_applicaiton table and image table
		if ($ap_data) {
			$application_data = array(
					'opportunity' => $op_data,
					'artworks' => $user_artworks,
					'application' => $ap_data,
					'resume_view' => $resume
			);
			//if application is reopened get previous artworks selected
			if ($ap_data['reopen'] == '1') {
				$application_data['ap_artworks'] = mn_ap_get_ap_artworks($nid, $uid);
			}
			$rows = mn_ap_parse_data($application_data, $nid);
      } else {
			$user_profile = (array) user_load($uid);
			$main_profile =  (array) _profile2_by_uid_load($uid, 'main');
			$resume_profile =  (array) _profile2_by_uid_load($uid, 'resume');
			$profile2_data[] = array(
					'opportunity' => $op_data,
					'artworks' => $user_artworks,
					'user' => $user_profile,
					'main' => $main_profile,
					'resume' => $resume_profile,
					'resume_view' => $resume
			);
			$rows = mn_ap_profile2_data($profile2_data['0'], $nid);
		}
      
		//apply theme to node data
		$output = theme('mn_ap_apply', array('rows' => $rows['0'])); //used without template
		return $output;
}