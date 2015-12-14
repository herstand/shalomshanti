function SaveTheDate() {
    var checkForm = window.setInterval(seeIfFormComplete, 1000),
    state = {
        "isComplete" : true,
        responseData : {
            "id" : document.body.dataset.guest,
            "response" : "",
            "address-1" : "",
            "address-2" : "",
            "city" : "",
            "state" : "",
            "zip" : "",
            "country" : "",
            "emailAddresses" : ""
        }
    };

    function cleanUsername(username) {
        return username.replace("@", "");
    }
    function cleanDomain(domain) {
        return domain.replace("@", "");
    }
    function getInitialEmails() {
        var email = "";
        utilities.toArray(document.querySelectorAll('.digitalAddress .email')).forEach(function(el) {
            email += cleanUsername(el.querySelector(".username").dataset.initialValue) + "@" + cleanDomain(el.querySelector(".domain").dataset.initialValue) + ",";
        });
        return email.substring(0, email.length - 1);
    }
    function getEmails() {
        var email = "";
        utilities.toArray(document.querySelectorAll('.digitalAddress .email')).forEach(function(el) {
            if (utilities.getText(el.querySelector(".username")).length > 0 && utilities.getText(el.querySelector(".domain")).length > 0) {
                email += cleanUsername(utilities.getText(el.querySelector(".username"))) + "@" + cleanDomain(utilities.getText(el.querySelector(".domain"))) + ",";
            }
        });
        return email.substring(0, email.length - 1);
    }
    function setupRemoveEmailButton(button) {
        button.addEventListener('click', function(e) {
            e.target.parentNode.parentNode.removeChild(e.target.parentNode);    
        });
    }
    function setupAtJumper(username) {
        username.addEventListener("keydown", function(e) {
            if (e.which == 50 && e.shiftKey) {
                e.preventDefault();
                username.parentNode.querySelector(".domain").focus();
                return false;
            }
        });
    }

    function setupFormCompleteListener(el) {
        el.addEventListener("keyup", seeIfFormComplete);
        el.addEventListener("change", seeIfFormComplete);
    }

    function setEventListeners() {
        document.querySelector("#addEmail a").addEventListener("click", function(e) {
            var email = document.querySelector("#templates .email").cloneNode(true);
            e.preventDefault();
            document.querySelector(".digitalAddress").insertBefore(email, document.querySelector("#addEmail"));
            setupRemoveEmailButton(email.querySelector(".removeEmail"));
            setupAtJumper(email.querySelector(".username"));
            setupFormCompleteListener(email.querySelector(".username"));
            setupFormCompleteListener(email.querySelector(".domain"));
            return false;
        });
        utilities.toArray(document.querySelectorAll("[contenteditable='true']")).forEach(setupFormCompleteListener);
        utilities.toArray(document.querySelectorAll(".digitalAddress .username")).forEach(setupAtJumper);
        utilities.toArray(document.querySelectorAll(".removeEmail")).forEach(setupRemoveEmailButton);
    }

    function emailIsValid(username, domain) {
        return (username.length === 0 && domain.length === 0) ||
            (username.length > 0 && domain.length > 2 && domain.indexOf(".") < domain.length - 1);
    }

    function noEmailsPartiallyFilled() {
        var el, 
            emails =  utilities.toArray(document.querySelectorAll(".digitalAddress .email"));
        for (var i in emails) {
            el = emails[i];
            if (!emailIsValid(utilities.getText(el.querySelector(".username")), utilities.getText(el.querySelector(".domain")))) {
                return false;
            }
        }
        return true;
    }
    
    function formIsComplete(){
        return document.querySelector(".responses input[name='response']:checked") !== null &&
            !document.querySelector(".physicalAddress .address-1:empty") &&
            !document.querySelector(".physicalAddress .city:empty") &&
            !document.querySelector(".physicalAddress .state:empty") &&
            !document.querySelector(".physicalAddress .zip:empty") &&
            noEmailsPartiallyFilled() &&
            !document.querySelector(".digitalAddress .email:first-of-type .username:empty") &&
            !document.querySelector(".digitalAddress .email:first-of-type .domain:empty") &&
            emailIsValid(
                utilities.getText(document.querySelector(".digitalAddress .email:first-of-type .username")),
                utilities.getText(document.querySelector(".digitalAddress .email:first-of-type .domain"))
            );
    }
    function getCurrentResponseData() {
        return  {
            "id" : document.body.dataset.guest,
            "response" : document.querySelector(".responses input[name='response']:checked").value,
            "address-1" : utilities.getText(document.querySelector(".physicalAddress .address-1")),
            "address-2" : utilities.getText(document.querySelector(".physicalAddress .address-2")),
            "city" : utilities.getText(document.querySelector(".physicalAddress .city")),
            "state" : utilities.getText(document.querySelector(".physicalAddress .state")),
            "zip" : utilities.getText(document.querySelector(".physicalAddress .zip")),
            "country" : utilities.getText(document.querySelector(".physicalAddress .country")),
            "emailAddresses" : getEmails()
        };
    }

    function displayFormSubmitMessage(msgProperty, isComplete) {
        document.querySelector(".submitFeedback img").src = document.querySelector(".submitFeedback img").dataset[msgProperty];
        document.querySelector(".submitFeedback h1").innerHTML = document.querySelector(".submitFeedback h1").dataset[msgProperty];
        state.isComplete = isComplete;
    }

    function seeIfFormComplete() {
        var formData, responseDataCurrent;
        if (formIsComplete()) {
            responseDataCurrent = getCurrentResponseData();
            if (!utilities.deepEquals(responseDataCurrent, state.responseData)) {
                state.responseData = responseDataCurrent;
                utilities.ajax(
                    "saveContactInfo", 
                    function(data) {
                        displayFormIsComplete();
                    }, 
                    "POST", 
                    utilities.convertJsonToFormData(state.responseData)
                );
            } else {
                displayFormSubmitMessage('complete', true);
            }
        } else if (state.isComplete) {
            displayFormSubmitMessage('waiting', false);
        }
    }

    setEventListeners();

    return {
        "formIsComplete" : formIsComplete,
        "seeIfFormComplete" : seeIfFormComplete,
        "state" : state
    }
}