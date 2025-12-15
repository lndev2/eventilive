function formCommento(idEvento) {
  const parent = document.getElementById("form-commento");

  if (parent.firstElementChild) {

    while (parent.firstElementChild) {
      parent.removeChild(parent.firstElementChild);
    }

  } else {
    let form = document.createElement("form");
    form.id = "cform";
    form.method = "POST";
    form.action = "insert_comm_contr.php";

    //commento
    let textarea = document.createElement("textarea");
    textarea.name = "commento";
    textarea.placeholder = "Scrivi il tuo commento...";
    textarea.required = true; 
    form.appendChild(textarea);

    let br = document.createElement("br");
    form.appendChild(br);

    //voto
    let voto = document.createElement("input");
    voto.name = "voto";
    voto.type = "number";
    voto.min = 0;
    voto.max = 10;
    voto.valueAsNumber = 5;
    voto.placeholder = "inserisci voto";
    form.appendChild(voto);

    //invio
    let button = document.createElement("button");
    button.type = "submit";
    button.name = "invia";
    button.value = "inviaCommento";
    button.textContent = "Invia";
    form.appendChild(button);

    let evento = document.createElement("input");
    evento.type = "hidden";
    evento.name = "idEvento";
    evento.value = idEvento;
    form.appendChild(evento);

    parent.appendChild(form);
  }
}
