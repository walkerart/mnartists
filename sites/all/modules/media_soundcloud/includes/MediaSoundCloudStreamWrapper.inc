<?php

/**
 *  @file
 *  Create a SoundCloud Stream Wrapper class for the Media/Resource module.
 */

/**
 *  Create an instance like this:
 *  $soundcloud = new ResourceSoundCloudStreamWrapper('soundcloud://u/[user-name]/a/[audio-code]');
 */
class MediaSoundCloudStreamWrapper extends MediaReadOnlyStreamWrapper {
  protected $base_url = 'http://soundcloud.com/'; 
  protected $parameters = array('u','a','g','s');
  
  function interpolateUrl() {
    $url = "";
    if(isset($this->parameters['u'])){
        $url = $this->base_url . check_plain($this->parameters['u']);   
    }
    //group set
    if(isset($this->parameters['g'])){
        $url = $this->base_url . 'groups/' . check_plain($this->parameters['g']);   
    }
    //single song
    if(isset($this->parameters['u']) && isset($this->parameters['a'])){
        $url = $this->base_url . check_plain($this->parameters['u']) . '/' . check_plain($this->parameters['a']);
    }
    //audio sets
    if(isset($this->parameters['u']) && isset($this->parameters['s'])){
        $url = $this->base_url . check_plain($this->parameters['u']) . '/sets/' . check_plain($this->parameters['s']);
    }
    return $url;
  }
  
  function getTarget($f) {
    return FALSE;
  }

  static function getMimeType($uri, $mapping = NULL) {
    return 'audio/soundcloud';
  }

  function getOriginalThumbnailPath() {
    //return a thumbnail image
    return drupal_get_path('module','media_soundcloud') . "/images/thumb_image.jpg";
  }

  function getLocalThumbnailPath() {
    $parts = $this->get_parameters();
    $api = "http://api.soundcloud.com/resolve?client_id=29800bb0ab961280619c6721dca3aa3d&format=json&url=http://soundcloud.com/";
    $local_path = "";
    //user set
    if(isset($parts['u'])){
        $local_path = 'public://media-soundcloud/u/' . check_plain($parts['u']) . '.jpg';
        $api_path = $api . check_plain($parts['u']);
    }
    //group set
    if(isset($parts['g'])){
        $local_path = 'public://media-soundcloud/g/' . check_plain($parts['g']) . '.jpg';  
        $api_path = $api . check_plain($parts['g']); 
    }
    //single song
    if(isset($parts['u']) && isset($parts['a'])){
        $local_path = 'public://media-soundcloud/u/' . check_plain($parts['u']) . '/a/'.check_plain($parts['a']).'.jpg';
        $api_path = $api . check_plain($parts['u']) . '/' . check_plain($parts['a']);
    }
    //audio sets
    if(isset($parts['u']) && isset($parts['s'])){
        $local_path = 'public://media-soundcloud/u/' . check_plain($parts['u']) . '/s/'.check_plain($parts['s']).'.jpg';
        $api_path = $api . check_plain($parts['u']) . '/' . check_plain($parts['s']);
    }


    if (!file_exists($local_path)) {
      $api_response = drupal_http_request($api_path);
      if($api_response) {
        $api_json = json_decode($api_response->data);
        if ($api_json->artwork_url != NULL) {
          $thumb_image = str_replace("large", "t500x500", $api_json->artwork_url);
        } else {
          $thumb_image = str_replace("large", "t500x500", $api_json->user->avatar_url);
        }
        if($thumb_image){
          $thumb_data = drupal_http_request($thumb_image);
        }
      }
      $dirname = drupal_dirname($local_path);
      file_prepare_directory($dirname, FILE_CREATE_DIRECTORY | FILE_MODIFY_PERMISSIONS);
      if($thumb_data) {
        file_save_data($thumb_data->data, $local_path);
      } else {
        @copy($this->getOriginalThumbnailPath(), $local_path);
      }
    }
    return $local_path;
  }
  
  public function getOEmbed($url, $options = array()) {
    //drupal_set_message("MediaSoundCloudStreamWrapper::getOEmbed");
    $oembed_parameters = array_merge(array('url' => $url, 'format' => 'json'), $options);
    $oembed_url = url('http://soundcloud.com/oembed', array('query' => $oembed_parameters));
    //drupal_set_message(print_r($oembed_url,true));
    $response = drupal_http_request($oembed_url);
    //drupal_set_message(print_r($response,true)); 
    if (!isset($response->error)) {
      return drupal_json_decode($response->data);
    }else{
      $error_msg = t("Error Embedding SoundCloud Media '@file'. Error code(@code) : !message", array('@file' => $url, '@code' => $response->code, '!message' => $response->status_message));
      // Output error to watchdog
      watchdog('Media Soundcloud', $error_msg, NULL, WATCHDOG_WARNING);
      // Output error to admin
      if (user_access('edit media')) {
        drupal_set_message($error_msg, "error", FALSE);
        drupal_set_message(t('Please check sharing permissions'), 'error', FALSE);
      }
    }
  }
}
