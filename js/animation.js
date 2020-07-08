window.addEventListener("scroll", () => {
  let page = this;
  let pageTop = this.scrollY;
  let pageHeight = this.outerHeight / 2;
  var _lang = $("#idioma").val();

  var aa = {
    en: "Hello",
    es: "Hola",
  };

  document.getElementById("a").innerHTML = aa[_lang];
  let frames = document.querySelectorAll(".scrollAnim");
  frames.forEach((frame) => {
    let frameTop = frame.offsetTop;
    let frameHeight = frame.offsetHeight;

    if (
      pageTop >= frameTop - pageHeight &&
      pageTop < frameTop + frameHeight / 2
    ) {
      frame.classList.add("anim");
    } else {
      frame.classList.remove("anim");
    }
  });
});

function cambiaId() {
  _lang = $("#idioma").val();
  alert(_lang);
  document.getElementById("a").innerHTML = aa[_lang];
}

