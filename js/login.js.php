(function login() {
  function replaceHeader(data) {
    document.querySelector("body > header").innerHTML = data;
  }
  function onLogin(data) {
    ViewUtilities.view(document.querySelector(".templates .login.modalWrapper"));
    utilities.ajaxJson(
      "/templates/header",
      replaceHeader,
      "GET"
    );
  }
  document.querySelector("header form").addEventListener("submit", function(e) {
    e.preventDefault();
    if (!window.btoa) {
      alert("Sorry, your browser is insecure and cannot be used to login. Please upgrade to the latest version of Chrome, Firefox, Internet Explorer, or Safari to continue.");
    }
    utilities.ajaxJson(
      e.target.action,
      onLogin,
      e.target.method,
      "{\"" + btoa("password")+"\" : \""+btoa(document.querySelector("header form input").value) + "\" }"
    );
    return false;
  });

})();