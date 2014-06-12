<?php
    global $user;
    $should_show_welcome = _mnartist_profiles_should_show_welcome();
?>
<div class="user-welcome">
    <h2>Now that you've joined MN Artists, here are some fun ways to start exploring and better using the site.</h2>
    <ul class="welcome-list">
        <li class="welcome-artists"><a href="/community?content[artists]=1">Find new artists in your area</a></li>
        <li class="welcome-collect"><a href="/">Start collecting artists, artworks, or articles</li>
        <li class="welcome-articles"><a href="/community?content[article]=1">Read up on current arts articles</li>
        <li class="welcome-artwork"><a href="/node/add/artwork">Add new work to your profile</a></li>
        <li class="welcome-opportunities"><a href="/community?content[opportunity]=1">Find Opportunities to advance your career</a></li>
        <li class="welcome-events"><a href="/community?content[event]=1">Learn about what art events are happening this week</a></li>
    </ul>
    <form id="welcome-form" class="done-link" method="post" action="/user/<?= $user->uid ?>/setwelcome">
        <label><input type="checkbox" name="no-welcome"<?php if (!$should_show_welcome) { ?> checked<?php } ?>> I've tried all these things</label>
    </form>
</div>
