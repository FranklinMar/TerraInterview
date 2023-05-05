document.querySelectorAll("textarea").forEach(element => {
  element.oninput = function() {
    this.style.height = "";
    this.style.height = this.scrollHeight + 5 + "px"
  }
  element.oninput();
});