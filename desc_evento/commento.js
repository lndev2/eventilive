function formCommento() {
  const parent = document.getElementById("form-commento");

  if (parent.firstElementChild) {
    while (parent.firstElementChild) {
      parent.removeChild(parent.firstElementChild);
    }
  } else {
    let form = document.createElement("form");
    form.id = "cform";

    // textarea
    let textarea = document.createElement("textarea");
    textarea.name = "commento";
    textarea.placeholder = "Scrivi il tuo commento...";
    form.appendChild(textarea);

    let br = document.createElement("br");
    form.appendChild(br);

    // button
    let button = document.createElement("button");
    button.type = "submit";
    button.textContent = "Invia";
    form.appendChild(button);


    parent.appendChild(form);
  }
}
