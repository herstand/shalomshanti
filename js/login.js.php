(function login() {
  function replaceHeader(data) {
    document.querySelector("body > header").innerHTML = data;
  }
  function onLogin(user) {
    utilities.setText(
      document.querySelector(".templates .login.modalWrapper .household_name"),
      JSON.parse(user).data.user.household_name
    );
    ViewUtilities.view(document.querySelector(".templates .login.modalWrapper"));

    utilities.ajaxJson(
      "/templates/header",
      replaceHeader,
      "GET"
    );
  }

  function closeModal(e) {
    ViewUtilities.hide(document.querySelector(".login.modalWrapper"));
  }
  function selectLoginForm() {
    document.querySelector("form.login input").classList.add("selected");
  }

  function deselectLoginForm(e) {
    if (
      e.relatedTarget !== document.querySelector("form.login .login input") &&
      e.relatedTarget !== document.querySelector(".login button")
    ) {
      document.querySelector("form.login input").classList.remove("selected");
    }
  }

  document.querySelector(".templates .login.modalWrapper .close").addEventListener("click", closeModal);
  document.querySelector("form.login input").addEventListener("focus", selectLoginForm);
  document.querySelector("form.login input").addEventListener("blur", deselectLoginForm);
  document.querySelector("form.login button").addEventListener("blur", deselectLoginForm);

  document.querySelector("header form").addEventListener(
    "submit",
    function(e) {
      e.preventDefault();
      if (!window.btoa) {
        alert("Sorry, your browser is insecure and cannot be used to login. Please upgrade to the latest version of Chrome, Firefox, Internet Explorer, or Safari to continue.");
      }
      utilities.ajaxJson(
        e.target.action,
        onLogin,
        e.target.method,
        "{\"" + btoa("password") + "\" : \""+btoa(document.querySelector("header form input").value) + "\" }"
      );
      return false;
    }
  );

})();