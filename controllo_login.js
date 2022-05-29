function controllo_login(event)
{
    
    if(form.Nome_Utente.value.length == 0 ||
       form.Password.value.length == 0)
    {
        alert ("Compilare tutti i campi.");
        event.preventDefault();
    }   
}


const form = document.forms['form_login'];

form.addEventListener('submit', controllo_login);