function controllo_signup(event)
{
    
    if( form.Nome_Utente.value.length == 0 ||
        form.Password.value.length == 0 ||
        form.Conferma_Password.value.length == 0 ||
        form.Nome.value.length == 0 ||
        form.Cognome.value.length == 0 ||
        form.Email.value.length == 0 ||
        form.genere.value == false ||
        form.Paese.value == null ||
        form.n_telefono.value == 0 ||
        form.fileToUpload.value.length==0||
        form.Data_Nascita == 0) 
    {
    
      alert("Compilare tutti i campi.");
    
      event.preventDefault();
    }
    var password = document.forms["form_signup"]["Password"].value;
    var conferma_password = document.forms["form_signup"]["Conferma_Password"].value;
    if(password !== conferma_password)
    {
      alert("Le password non coincidono");
      event.preventDefault();
    }
  var em = document.forms["form_signup"]["Email"].value;
  var atpos = em.indexOf("@");
  var dotpos = em.lastIndexOf(".");
  if (atpos<1 || dotpos<atpos+2 || dotpos+2>=em.length){
    alert("Indirizzo email non valido");
    event.preventDefault();
  }
}



function onResponse(response)
{
  return response.text();
  
}

function onError(error)
{
  console.log("errore " + error);
}

function onText(text)
{
  console.log(text);
  if(text=="true")
  {

    alert('username già in uso');
  }
  else
  {
    console.log("c'è un problema");
  }
}
 
function controllo_username()
{

  console.log("////////////");
  console.log(campo_id);
  console.log(campo_id.value);

  fetch('ctrl_username.php?id='+campo_id.value).then(onResponse, onError).then(onText);
}

const campo_id=document.forms['form_signup'].Nome_Utente;

campo_id.addEventListener('blur', controllo_username);


const form = document.forms['form_signup'];

form.addEventListener('submit', controllo_signup);