function formCommento() {
  const parent = document.getElementById("form-commento");

  if (parent.firstElementChild) {
    while (parent.firstElementChild) {
      parent.removeChild(parent.firstElementChild);
    }
  } else {
    let form = document.createElement("form");
    form.id = "cform";
    form.method = "POST";

    //commento
    let textarea = document.createElement("textarea");
    textarea.name = "commento";
    textarea.placeholder = "Scrivi il tuo commento...";
    textarea.required = true; // Rende il campo obbligatorio
    form.appendChild(textarea);

    let br = document.createElement("br");
    form.appendChild(br);

    //voto
    let voto = document.createElement("input");
    voto.name = "voto";
    voto.type = "number";
    voto.min = 0;
    voto.max = 10;
    voto.placeholder = "inserisci voto";
    form.appendChild(voto);

    //invio
    let button = document.createElement("button");
    button.type = "submit";
    button.name = "invia";
    button.value = "inviaCommento";
    button.textContent = "Invia";
    form.appendChild(button);

    parent.appendChild(form);
  }
}
