<?php $user = Auth::instance(); ?>
<h3>現在のログインアカウント</h3>
<p><?php echo $user->get_screen_name() ?></p>
<h3>現在開催中イベント</h3>
<p><?php echo $event->event_name; ?></p>
