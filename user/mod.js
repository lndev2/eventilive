function modEventoForm(idEvento,titolo,idCategoria,città,luogo,provincia,data,ora,descrizione) {
  const div = document.getElementById(idEvento);

  if (div.firstElementChild) {
    while (div.firstElementChild) {
      div.removeChild(div.firstElementChild);
    }
  } else {
    // Titolo
    const title = document.createElement("p");
    title.textContent = "Modifica Evento";
    div.appendChild(title);

    // Form
    const form = document.createElement("form");
    form.action = "mod_evento_contr.php";
    form.method = "POST";

    const fieldset = document.createElement("fieldset");

    // utility per creare label + input
    function creaInput(labelText, type, name, required = true, valorePrecedente) {
      const label = document.createElement("label");
      label.htmlFor = name;
      label.textContent = labelText;

      const input = document.createElement("input");
      input.type = type;
      input.name = name;
      input.value = valorePrecedente;

      if (required) input.required = true;

      fieldset.appendChild(label);
      fieldset.appendChild(document.createElement("br"));
      fieldset.appendChild(input);
      fieldset.appendChild(document.createElement("br"));
      fieldset.appendChild(document.createElement("br"));
    }

    // Titolo
    creaInput("Titolo", "text", "titolo", true, titolo);
    console.log(titolo);

    // Categoria (select)
    const labelCat = document.createElement("label");
    labelCat.textContent = "Categoria";
    labelCat.htmlFor = "categoria";
    fieldset.appendChild(labelCat);
    fieldset.appendChild(document.createElement("br"));

    const select = document.createElement("select");
    select.name = "categoria";
    select.required = true;

    const categorie = [
      ["1", "Concerti"],
      ["2", "Teatro"],
      ["3", "Ballo"],
      ["4", "Conferenze"],
      ["5", "Gastronomia"],
    ];

    console.log(idCategoria);
    
    categorie.forEach(([value, text]) => {
      const option = document.createElement("option");
      option.value = value;
      option.textContent = text;

      if(option.value == idCategoria){
        option.selected = true;
      }

      select.appendChild(option);
    });

    fieldset.appendChild(select);
    fieldset.appendChild(document.createElement("br"));
    fieldset.appendChild(document.createElement("br"));

    // Città - Luogo - Provincia
    creaInput("Città", "text", "città", null, città);
    creaInput("Luogo", "text", "luogo", null , luogo);
    creaInput("Provincia", "text", "provincia", null, provincia);

    // Data
    const labelData = document.createElement("label");
    labelData.textContent = "Data";
    labelData.htmlFor = "data";
    fieldset.appendChild(labelData);

    const inputData = document.createElement("input");
    inputData.type = "date";
    inputData.name = "data";
    inputData.value = data;
    fieldset.appendChild(inputData);

    fieldset.appendChild(document.createElement("br"));
    fieldset.appendChild(document.createElement("br"));

    // Ora
    creaInput("Ora", "time", "ora", null, ora);

    // Descrizione
    const labelDesc = document.createElement("label");
    labelDesc.textContent = "Descrizione";
    labelDesc.htmlFor = "descrizione";
    fieldset.appendChild(labelDesc);
    fieldset.appendChild(document.createElement("br"));

    const textarea = document.createElement("textarea");
    textarea.name = "descrizione";
    textarea.rows = 4;
    textarea.cols = 50;
    textarea.required = true;
    textarea.value = descrizione;
    fieldset.appendChild(textarea);

    fieldset.appendChild(document.createElement("br"));
    fieldset.appendChild(document.createElement("br"));

    // Immagine
    const labelImg = document.createElement("label");
    labelImg.textContent = "Carica Immagine:";
    labelImg.htmlFor = "immagine";
    fieldset.appendChild(labelImg);

    const inputImg = document.createElement("input");
    inputImg.type = "file";
    inputImg.name = "immagine";
    fieldset.appendChild(inputImg);

    fieldset.appendChild(document.createElement("br"));
    fieldset.appendChild(document.createElement("br"));

    // Submit
    const btn = document.createElement("button");
    btn.type = "submit";
    btn.name = "modifica";
    btn.textContent = "Invia";
    fieldset.appendChild(btn);

    const inputIdEvento = document.createElement("input");
    inputIdEvento.id = "inputIdEvento";
    inputIdEvento.type = "hidden";
    inputIdEvento.name = "idEvento";
    inputIdEvento.value = idEvento;
    fieldset.appendChild(inputIdEvento);

    // Montaggio finale
    form.appendChild(fieldset);
    div.appendChild(form);
  }
}



function confermaEliminazione() {
    return confirm("Sei sicuro di voler eliminare questo evento?");
}



