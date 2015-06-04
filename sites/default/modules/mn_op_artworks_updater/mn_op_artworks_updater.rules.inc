<?php
//Notes:
//need to make body required, if body is empty the fields do not update on the application
//dimensions field needs a limit, I broke it.

/**
 * @file
 * Rules integration for MN OP Artworks Updater.
 */

/**
 * Implements hook_rules_action_info().
 *
 * @return array
 */
function mn_op_artworks_updater_rules_action_info() {
  $actions = array();

  $actions['mn_op_artworks_updater'] = array(
    'label' => t('Update artwork in the op_artworks table'),
    'group' => t('MNArtists'),
    'parameter' => array(
      'node' => array(
        'type' => 'node',
        'label' => t('Artwork'),
      ),
    ),
  );

  return $actions;
}

/**
 * Pass node object to grab field data to update op_artworks table
 *
 * @param type $node
 */
function mn_op_artworks_updater($node) {
  $vid = $node->vid;  //this is node id for the artwork

  $is_in_table = mn_op_artworks_updater_table_check($vid); // check if artwork is in the op_table before proceeding
  if($is_in_table) {
    foreach($is_in_table as $key => $value) {
    $nid = $value->nid;
    //$nid = $is_in_table[0]->nid; //nid, this is the nid for the opportunity NOT the artowrk content and is returned from checking the op_table
    //$file_name_in_table = $is_in_table[0]->file;
    $file_name_in_table = $value->file;
    $uid = $node->uid;
    $title = $node->title;

    //date - partial date field for entity_metadata_wrapper returns property not found
    $year = isset($node->field_created_date[LANGUAGE_NONE][0]['year']) ? $node->field_created_date[LANGUAGE_NONE][0]['year'] : '';
    $day = isset($node->field_created_date[LANGUAGE_NONE][0]['day']) ? $node->field_created_date[LANGUAGE_NONE][0]['day'] : '';
    $month = isset($node->field_created_date[LANGUAGE_NONE][0]['month']) ? $node->field_created_date[LANGUAGE_NONE][0]['month'] : '';

    $wrapper = entity_metadata_wrapper('node', $node);
    $medias = ($wrapper->field_media->value() ? $wrapper->field_media->value() : '');
    $field_medium = ($wrapper->field_medium->value() ? $wrapper->field_medium->value() : '');
    $field_medium3 = ($wrapper->field_medium3->value() ? $wrapper->field_medium3->value() : '');
    $field_roles = ($wrapper->field_roles->value() ? $wrapper->field_roles->value() : '');
    $field_venue = ($wrapper->field_venue->value() ? $wrapper->field_venue->value() : '');
    $field_other_artists = ($wrapper->field_other_artists_involved->value() ? $wrapper->field_other_artists_involved->value() : '');
    $dimensions = ($wrapper->field_dimensions->value() ? $wrapper->field_dimensions->value() : '');
    $description = ($wrapper->body->value->value() ? $wrapper->body->value->value() : ''); //needs a value or will not update, should make required
    $excerpt = ($wrapper->field_artwork_excerpt->value() ? $wrapper->field_artwork_excerpt->value() : '');  //@todo -- Updste '' to NULL

    $venue = ($field_venue->title ? $field_venue->title : '');

    //process values, e.g. taxonomy terms have special format.
    $category =  mn_op_artworks_updater_process_taxonomy_term($field_medium);

    $date = mn_ap_get_artwork_date($month, $day, $year);

    //$venue = mn_op_artworks_updater_process_venue($field_venue);
    $other_artists =   mn_op_artworks_updater_process_taxonomy_term($field_other_artists);
    $medium3 =  mn_op_artworks_updater_process_taxonomy_term($field_medium3);
    $roles =  mn_op_artworks_updater_process_taxonomy_term($field_roles);

    //possible multiple files here
    //but currently we will only update one spot, there
    $fid = $medias[0]['fid']; //use only the first media since this is all we can work with in the op_artworks table make a note on the media field
    $file_obj = file_load($fid); //load file to get the rest of the information

    $file_attributes = mn_op_artworks_updater_process_files($file_obj, $nid, $uid);  //handles file

    $file = $file_attributes['file'];
    $file_type = $file_attributes['file_type'];

    $table = 'op_artworks';  //op_artists table

    $updated_fields = array(
      'title' => $title,
      'medium' => $category,
      'date' => $date,
      'dimensions' =>  $dimensions,
      'description' => $description,
      'excerpt' => $excerpt,
      'venue' => $venue,
      'other_artists' => $other_artists,
      'file' => $file,
      'file_type' => $file_type,
      'medium3' => $medium3,
      'roles' => $roles,
      'fid' => $fid,
      'vid' => $vid,
    );
    db_update($table)
      ->fields($updated_fields)
      ->condition('vid', $vid, '=')
      ->execute();

    }
   }
}

/**
 * This creates the json data needed for the IMA template
 *
 * @param type $terms
 * @return string
 */
function mn_op_artworks_updater_process_taxonomy_term($terms) {

  //check if there are values, data in field
  if($terms) {
    $term_count = count($terms) - 1;
    $term_value = '';
    //get and format medium values
    foreach ($terms as $key => $value) {
      if ($term_count === 0  || $key === $term_count) {
        $term_value .= "\"$value->name\"";
      }
      else {
        $term_value .="\"$value->name\",";
      }

    }
    $final_term_value = '['.$term_value.']';
  }
  else {
    $final_term_value = '""';
  }

  return $final_term_value;
}

/**
 * This function queries the op_artworks table to see if the artwork that was updated is in the op_artworks table
 *
 * @param type $vid
 * @return type
 */
function mn_op_artworks_updater_table_check($vid) {
  $table = 'op_artworks';
  $results = db_select($table, 'a')
    ->fields('a')
    ->condition('vid', $vid, '=')
    ->execute()
    ->fetchAll();

  return $results;
}

/**
 * If a new file is uploaded it will need to be updated in the ap_folder
 * The ap_folder is a custom folder that is created where it puts op_artwork files
 *
 * The code below is an updated copy of code form the mn_ap.module.
 * From approximately the line 210 in the mn_ap.module
 * @param type $file_obj
 * @param type $nid
 * @param type $uid
 * @return type
 */
function mn_op_artworks_updater_process_files($file_obj, $nid, $uid) {
  $ap_folder = $nid;
  $user_folder = '/' . $uid;
  $ap_folder_path = variable_get('file_public_path', conf_path() . '/files') . '/opportunity/' . $ap_folder;
  $user_folder_path = $ap_folder_path . $user_folder;
  if ($file_obj->type == 'image') {

    //Update Image to have Large Style
    $style_name_large = image_style_load('large');
    $derivative_uri_large = image_style_path($style_name_large, $file_obj->uri);
    image_style_create_derivative($style_name_large, $file_obj->uri, $derivative_uri_large);

    //Update Image to have ap_tiny style
    $style_name_ap_tiny = image_style_load('ap_tiny');
    $derivative_uri_ap_tiny = image_style_path($style_name_ap_tiny, $file_obj->uri);
    image_style_create_derivative($style_name_ap_tiny, $file_obj->uri, $derivative_uri_ap_tiny);

    $url = image_style_url('large', $file_obj->uri);
    $data = drupal_http_request($url);
    $thumb = image_style_url('ap_tiny', $file_obj->uri);
    $thumb_data = drupal_http_request($thumb);

    if (file_prepare_directory($ap_folder_path, FILE_MODIFY_PERMISSIONS) && file_prepare_directory($user_folder_path, FILE_MODIFY_PERMISSIONS)) {
      $filepath = str_replace($GLOBALS['base_url'], "", file_create_url($file_obj->uri));
      $file = drupal_basename($filepath);

      $save_path_large = "$user_folder_path/$file";
      file_unmanaged_save_data($data->data, $save_path_large, FILE_EXISTS_REPLACE);

      $save_path_ap_tiny = "$user_folder_path/thumb_$file";
      file_unmanaged_save_data($thumb_data->data, $save_path_ap_tiny, FILE_EXISTS_REPLACE);

      $filename = explode("/",$file_obj->uri); //using uri instead of filename just incase there are multiple files with the same name e.g. _0 is appended and will show the wrong file

      $file_attributes['file_type'] = (isset($file_obj->type) ? $file_obj->type : '');  //need file type
      $file_attributes['file'] = (isset($filename[4]) ? $filename[4] : '');  //need file name, will make '' if not there to not break db
    }
  }
  if ($file_obj->type == 'document') {
    $url = file_create_url($file_obj->uri); //use uri for file name, since it can change
    $data = drupal_http_request($url);
    if (file_prepare_directory($ap_folder_path, $options = FILE_MODIFY_PERMISSIONS) && file_prepare_directory($user_folder_path, $options = FILE_MODIFY_PERMISSIONS)) {
      $filepath = str_replace($GLOBALS['base_url'], "", file_create_url($file_obj->uri));
      $file = drupal_basename($filepath);
      file_unmanaged_save_data($data->data, "$user_folder_path/$file", $replace = FILE_EXISTS_REPLACE);

      //get filename from uri
      $filename = explode("/",$file_obj->uri); //using uri instead of filename just incase there are multiple files with the same name e.g. _0 is appended and will show the wrong file

      $file_attributes['file_type'] = (isset($file_obj->type) ? $file_obj->type : '');  //need file type
      $file_attributes['file'] = (isset($filename[4]) ? $filename[4] : '');  //need file name, will make '' if not there to not break db

    }
  }
  if ($file_obj->type == 'video') {
    if (substr($file_obj->uri, 0, 1) == 'y') { //for youtube -- needed.  When content is saved, get a filetype of video
      $file_attributes['file_type'] = (isset($file_obj->type) ?  'youtube' : '');
      $file_attributes['file'] = (isset($file_obj->filename) ? 'http://www.youtube.com/embed/' . substr($file_obj->uri, 12) . '?autoplay=0' : '');
    } elseif (substr($file_obj->uri, 0, 1) == 'v') {  //for vimeo videos - may not be needed -- needed.  When content is saved, get a filetype of video
      $file_attributes['file_type'] = (isset($file_obj->type) ?  'vimeo' : '');
      $file_attributes['file'] = (isset($file_obj->filename) ?  '//player.vimeo.com/video/' . substr($file_obj->uri, 10) : '');
    }

  }
  if ($file_obj->type == 'audio') {
    if (substr($file_obj->uri, 0, 1) == 's') {  //for sound cloud -- needed.  When content is saved, get a filetype of audio
      $url = explode("/", substr($file_obj->uri, 15));
      $file_attributes['file_type'] = (isset($file_obj->type) ? 'soundcloud' : '');
      $file_attributes['file'] = (isset($file_obj->filename) ?  "http://soundcloud.com/$url[0]/$url[2]" : "http://soundcloud.com/$url[0]");
    }
  }

  return $file_attributes;

}
