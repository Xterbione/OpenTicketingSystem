<div class="demo-card mdl-card mdl-shadow--2dp notifydrawer" >
  <div class="mdl-card__title" >
    <h2 class="mdl-card__title-text" style="margin: auto !important;">notificaties</h2>
  </div>
 <div class="mdl-card__supporting-text">
   hier vind je al je notificaties.
 </div>
 <div class="mdl-card__actions mdl-card--border">
   <div class="mdl-card__supporting-text">
     <div class="scrolldiv4">
       <?php
       $notify = new notify();
       $notify->get($user->data()->User_ID); ?>
     </div>
   </div>
 </div>
 <div class="mdl-card__menu">
   <form action='delallnotify.php' method='POST'>
     <input type='hidden' name='nid' value='<?php echo $_SESSION['UID']; ?>'>   <button class="rembuttonstyling" href='' type='submit'><img src='icons/remallnotify.png' style="margin-top:5px; margin-left: 5px;" height='50px'></button>
   </form>
 </div>
</div>
