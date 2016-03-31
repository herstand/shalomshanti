<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
require_once "Controller/SessionController.php";
$session = SessionController::getSession();
header("Content-type: text/javascript; charset: UTF-8");
?>
document.addEventListener("DOMContentLoaded", function(event) {
    <?php include "fonts.js.php"; ?>
    <?php include "header.js.php"; ?>
    <?php include "footer.js.php"; ?>
    var user = <?php echo json_encode($session->user); ?>;

    function getNumberInvitedTo(eventName) {
      for (var rsvpEvent in user.rsvp.rsvpEvents) {
        rsvpEvent = user.rsvp.rsvpEvents[rsvpEvent];
        if (rsvpEvent.event_name === eventName) {
          return rsvpEvent.num_invited;
        }
      }
    }

    function addAttendeeFieldset(eventName) {
      var newFieldset = document.querySelector(".templates fieldset[data-event-name='" + eventName + "']").cloneNode(true);
      if (document.querySelector("article." + eventName + " input")) {
        newFieldset.dataset.attendantIndex = parseInt(document.querySelector("article." + eventName + " fieldset:last-of-type").dataset.attendantIndex) + 1;
      } else {
        newFieldset.dataset.attendantIndex = 0;
      }

      newFieldset.querySelector("input").setAttribute("id", eventName + "_" + newFieldset.dataset.attendantIndex);

      newFieldset.querySelector("label").setAttribute("for", newFieldset.querySelector("input").getAttribute("id"));
      newFieldset.querySelector("label").addEventListener("click", clickInputRemover);

      document.querySelector("article." + eventName + " section.attendants").appendChild(newFieldset);

      return newFieldset;
    }

    function addFieldset(e) {
        var newFieldset = addAttendeeFieldset(e.target.parentNode.id);
        newFieldset.addEventListener("keyup", ableButton);
        if (parseInt(getNumberInvitedTo(e.target.parentNode.id)) === (parseInt(newFieldset.dataset.attendantIndex) + 1)) {
          ViewUtilities.hide(document.querySelector("article." + e.target.parentNode.id + " button"));
        } else {
          document.querySelector("article." + e.target.parentNode.id + " button").classList.add("disabled");
        }
    }

    function addAddButton(eventName) {
      var newButton = document.querySelector(".templates button." + eventName).cloneNode(true);
      newButton.addEventListener("click", addFieldset);
      if (document.querySelector("article#" + eventName + " input:invalid") !== null) {
        newButton.classList.add("disabled");
      }
      ViewUtilities.view(newButton);
    }

    function clickInputRemover(e) {
      var eventName = e.target.parentNode.dataset.eventName;
      document.getElementById(e.target.getAttribute("for")).parentNode.remove();
      if (!document.querySelector("article#" + eventName + " button")) {
        addAddButton(eventName);
      }
      if (document.querySelector("article#" + eventName + " input:invalid") === null) {
        document.querySelector("article#" + eventName + " button").classList.remove("disabled");
      }
      updateNumber(eventName);
    }

    function ableButton(e) {
      if (document.querySelector("article#" + e.target.parentNode.dataset.eventName + " button") !== null) {
        if (e.target.value !== "") {
          document.querySelector("article#" + e.target.parentNode.dataset.eventName + " button").classList.remove("disabled");
        } else {
          document.querySelector("article#" + e.target.parentNode.dataset.eventName + " button").classList.add("disabled");
        }
      }
      updateNumber(e.target.parentNode.dataset.eventName);
    }

    function updateNumber(eventName) {
      utilities.setText(
        document.querySelector("article#" + eventName + " figure span"),
        document.querySelectorAll("article#" + eventName + " input:valid").length
      );
    }

    document.querySelector("main > form").addEventListener("submit", function (e) {
      e.preventDefault();
      return false;
    });
    utilities.toArray(document.querySelectorAll("label.removeFieldset")).forEach(function(el) {
      el.addEventListener("click", clickInputRemover);
    });

    utilities.toArray(document.querySelectorAll("main > form > article input")).forEach(function(el) {
      el.addEventListener("keyup", ableButton);
    });

    utilities.toArray(document.querySelectorAll("main > form > article button.add")).forEach(function(el) {
      el.addEventListener("click", addFieldset)
    });

});