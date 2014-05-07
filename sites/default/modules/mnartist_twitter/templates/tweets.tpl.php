<ul id="twitter_update_list" class="<?= (!is_null($list_class)) ? $list_class : '' ?>">
    <?php foreach ($tweets as $tweet) {

        // Set up some variables
        $tweet_url = 'http://twitter.com/'.$tweet->user->screen_name.'/statuses/'.$tweet->id_str; // tweet url
        $urls = $tweet->entities->urls; // links
        $retweet = false;
        if(!empty($tweet->retweet))
            print_r($tweet->retweet);
            //$retweet = $tweet->retweeted_status->user->screen_name; // there is a retweeted user
        $time = new DateTime($tweet->created_at); // lets grab the date
        $date = $time->format('M j, g:ia'); // and format it accordingly
        $url_find = array();
        $url_links = array();
        if ( $urls ) {
            if ( !is_array( $urls ) ) {
                $urls = array();
            }
            foreach ( $urls as $url ) {
                $theurl = $url->url;
                if ( $theurl ) {
                    $url_block = '<a href="'.$theurl.'" target="_blank">'.$theurl.'</a>';
                    $url_find[] = $theurl; // make array of urls
                    $url_links[] = $url_block; // make array of replacement link blocks for urls in text
                }
            }
        }
        if ( $retweet ) { // add a class for retweets
            $link_class = ' class="retweet"';
        } else {
            $link_class = '';
        }
        ?>

        <li<?= $link_class ?>>
            <?php
            $new_text = preg_replace('#@([\\d\\w]+)#', '<a href="http://twitter.com/$1" target="_blank">$0</a>', $tweet->text); // replace all @mentions with actual links
            $newer_text = preg_replace('/#([\\d\\w]+)/', '<a href="https://twitter.com/search?q=%23$1&src=hash" target="_blank">$0</a>', $new_text); // replace all #tags with actual links
            $text = str_replace( $url_find, $url_links, $newer_text); // replace all links with actual links
            ?>
            <?= $text ?>
            <br /><a class="twt-date" href="<?= $tweet_url ?>" target="_blank"><?= $date ?></a>
        </li>
    <?php } ?>
    <?php if ($show_more_link === true) { ?>
        <li id="twitter-more-link"><a>MORE</a></li>
    <?php } ?>
</ul>