<?php
    global $user;
    $should_show_welcome = _mnartist_profiles_should_show_welcome();
?>
<div class="user-welcome">
    <h2>Now that you've joined MN Artists, here are some fun ways to start exploring and better using the site.</h2>
    <ul class="welcome-list">
        <li class="welcome-artists">Find new artists in your area</li>
        <li class="welcome-collect">Start collecting artists, artworks, or articles</li>
        <li class="welcome-articles">Read up on current arts articles</li>
        <li class="welcome-artwork">Add new work to your profile</li>
        <li class="welcome-opportunities">Find Opportunities to advance your career</li>
        <li class="welcome-events">Learn about what art events are happening this week</li>
    </ul>
    <form id="welcome-form" class="done-link" method="post" action="/user/<?= $user->uid ?>/setwelcome">
        <label><input type="checkbox" name="no-welcome"<?php if (!$should_show_welcome) { ?> checked<?php } ?>> I've tried all these things</label>
    </form>
</div>