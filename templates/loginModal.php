<?php
  set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
  if (!isset($session)) {
    require_once "Controller/SessionController.php";
    $session = SessionController::getSession();
  }

?>
<div data-destination-parent="body" data-destination-pend="prepend" class="login modalWrapper">
  <div class="modal">
  <button class="close">×</button>
  <h4 class="typ-littleTitle">Welcome!</h4>
  <p class="typ-body">Welcome to the guests-only area of our website! You’re logged <span class="nobreak">in as:</span></p>
  <p class="householdName typ-subsection-header"><em class="household_name"></em></p>
  <p class="typ-body">We’ve put together lots of information for you to browse. Please be sure to RSVP by <span class="nobreak dueDate"></span>.</p>
  <a href="/rsvp" class="typ-littleTitle rsvp">RSVP Now</a>
  <p class="typ-body">P.S. Did you recognize your password? It's a word from Indian or Jewish culture. A quick web search might reveal something you didn't <span class="nobreak">know before!</span></p>
  </div>
</div>