<?php
set_include_path($_SERVER["DOCUMENT_ROOT"]."/shalomshanti/");
require_once "Controller/SessionController.php";
require_once "css/variables.php";
$session = SessionController::getSession();
header("Content-type: text/javascript; charset: UTF-8");
?>
document.addEventListener("DOMContentLoaded", function(event) {
    <?php include "fonts.js.php"; ?>
    <?php include "header.js.php"; ?>
    <?php include "footer.js.php"; ?>
    var user = <?php echo json_encode($session->user); ?>,
      cards = utilities.toArray(document.querySelectorAll("form > article"));

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
      newFieldset.dataset.attendantIndex = 0;

      newFieldset.querySelector("input").setAttribute("id", eventName + "_" + newFieldset.dataset.attendantIndex);
      newFieldset.querySelector("input").addEventListener("keyup", ableButton);
      newFieldset.querySelector("input").addEventListener("keydown", preventDefault);

      newFieldset.querySelector("label").setAttribute("for", newFieldset.querySelector("input").getAttribute("id"));
      newFieldset.querySelector("label").addEventListener("click", clickInputRemover);

      document.querySelector("article." + eventName + " section.attendants").appendChild(newFieldset);

      return newFieldset;
    }

    function addFieldset(e) {
        var newFieldset = addAttendeeFieldset(e.target.parentNode.id);
        if (moreAreInvited(getEventName(newFieldset.querySelector("input")))) {
          document.querySelector("article." + e.target.parentNode.id + " button").classList.add("disabled");
        } else {
          ViewUtilities.hide(document.querySelector("article." + e.target.parentNode.id + " button"));
        }
        updateCardHeights();
        newFieldset.querySelector("input").focus();
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
      updateCardHeights();
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

    function getEventName(input) {
      return input.parentNode.parentNode.parentNode.id;
    }
    function moreAreInvited(eventName) {
      return parseInt(getNumberInvitedTo(eventName)) >
        document.querySelectorAll("article#" + eventName + " input").length;
    }
    function noInputsAreEmpty(input) {
      return document.querySelector("article#" + getEventName(input)).querySelector("input:invalid") === null;
    }
    function preventDefault(e) {
      if (e.which === 13) {
        e.preventDefault();
        if (moreAreInvited(getEventName(e.target)) && noInputsAreEmpty(e.target)) {
          addFieldset({"target" : e.target.parentNode.parentNode.parentNode.querySelector("button")});
        }
      }
      return false;
    }

    function respondToFormSubmit(data) {
      data = JSON.parse(data);
      if (!data.success) {
        alert("We are so sorry! Your RSVP didn't go through. Please email wedding@shalomshanti.com with your information and please less us know that you got the error: \"" + data.message + "\"");
      } else {
        window.location = "/rsvp-confirmation";
      }
    }

    function getNewAttendantsFor(eventName) {
      var attendants = [];
      utilities.toArray(document.querySelectorAll("article#" + eventName + " fieldset")).forEach(function(fieldset) {
        if (fieldset.dataset.attendantIndex === "0") {
          attendants.push({
            "id" : 0,
            "name" : fieldset.querySelector("input").value
          });
        }
      });
      return attendants;
    }

    function appendUpdatedAttendantsTo(rsvpEvent) {
      utilities.toArray(document.querySelectorAll(
        "article#" + rsvpEvent.event_name + " fieldset")
      ).forEach(function(fieldset) {
        if (fieldset.dataset.attendantIndex !== "0") {
          rsvpEvent.attendants.push({
            "id" : fieldset.dataset.attendantIndex,
            "name" : fieldset.querySelector("input").value
          });
        }
      });
    }

    function jsonifyForm() {
      var formData =
        {
          "Has RSVPed" : true,
          "rsvpEvents" : [
          ]
        };
      utilities.toArray(document.querySelectorAll("form > article")).forEach(function(el) {
        var rsvpEvent = {
          "event_name" : el.id,
          "attendants" : [
            getNewAttendantsFor(el.id)
          ],
          "num_invited" : parseInt(getNumberInvitedTo(el.id))
        };
        appendUpdatedAttendantsTo(rsvpEvent);
        formData['rsvpEvents'].push(rsvpEvent);
      });
      return JSON.stringify(formData);
    }

    function updateCardHeights() {
      if (window.innerWidth >= <?php echo $ipadLandscape; ?> ) {
        ViewUtilities.setHeights(cards, ViewUtilities.getTallestEl(cards) + "px");
      } else {
        ViewUtilities.setHeights(
          utilities.toArray(document.querySelectorAll("form > article")),
          "auto"
        );
      }
    }

    document.querySelector("main > form").addEventListener("submit", function (e) {
      e.preventDefault();
      document.querySelector("main > form button[type='submit']").innerText = "Saving…";
      utilities.ajaxJson(
        e.target.action,
        respondToFormSubmit,
        e.target.method,
        jsonifyForm()
      );
      return false;
    });
    document.querySelector("main > form button[type='submit']").addEventListener("click", function (e) {
      utilities.toArray(document.querySelectorAll("input:invalid")).forEach(function (el) {
        el.parentNode.remove();
      });
    });

    utilities.toArray(document.querySelectorAll("label.removeFieldset")).forEach(function(el) {
      el.addEventListener("click", clickInputRemover);
    });

    utilities.toArray(document.querySelectorAll("main > form > article input")).forEach(function(el) {
      el.addEventListener("keyup", ableButton);
      el.addEventListener("keydown", preventDefault);
    });

    utilities.toArray(document.querySelectorAll("main > form > article button.add")).forEach(function(el) {
      el.addEventListener("click", addFieldset)
    });

    window.addEventListener("resize", updateCardHeights);
    updateCardHeights();


});
