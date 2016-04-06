if (
  typeof window.hasOwnProperty === "undefined" ||
  typeof document.createElement("div").classList === "undefined"
) {
  window.location = "/unsupportedBrowser.php";
}