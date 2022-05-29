
function cerca_utenti(event)
{
    const titolo=document.querySelector('main h1');
    titolo.classList.add('hidden');
    const utente=form.utente_cercato.value;
    if(utente.value!==null)
    {
        fetch("ctrl_follow.php?id="+utente).then(controllo).then(onText2);
        fetch("do_search_people.php?utente_cercato="+utente).then(onResponse).then(onJson);
        // 
        
        // 
    }
    else{
    console.log("sono nell'else");
    
    fetch("do_search_people.php?").then(onResponse).then(onJson);
    }
    event.preventDefault();
}

function onResponse(response)
{
    return response.json();
}

function onText2(testo){
    console.log("arrivato");
    console.log(testo);
    if(testo=='true')
    {
        flag=1;
        console.log("seguire");
    }
    else
    {
        flag=0;
        console.log("seguito");
    }
}


function onJson(json)
{
    const risultato_ricerca=document.querySelector('section');
    risultato_ricerca.innerHTML= '';
    for(let i of json)
    {
        console.log(json);
        const username=document.createElement('span');
        const immagine=document.createElement('img');
        const segui=document.createElement('img');
        const utente=document.createElement('div');
        username.textContent=i.id;
        const url=i.avatar;
        immagine.src='images/'+ url;
        immagine.classList.add('img');
        
        if(flag==1)
        {
            console.log("da seguire");
            segui.src='icons/segui.png';
        }
        else
        {
            console.log("seguito");
            segui.src='icons/seguito.png';
            console.log(segui.src);
        }
        segui.classList.add('pointer');
        segui.dataset.id=username.textContent;
        utente.classList.add('div');
        utente.appendChild(immagine);
        utente.appendChild(username);
        utente.appendChild(segui);
        risultato_ricerca.appendChild(utente);
        segui.addEventListener('click',segui_utente);
    }
}

function segui_utente(event)
{
    const segui=event.currentTarget;
    const id_seguito=segui.dataset.id;
    fetch("follow_user.php?id="+id_seguito).then(controllo).then(onText);
}

function controllo(response)
{
  return response.text();
  
}

function onText(text)
{
    let foll=document.querySelector('.pointer');
    if(text=='true')
    {
        alert('Utente seguito');
        // foll
        foll.src='icons/seguito.png';
    }
    else
    {
        alert('Utente non seguito');
        foll.src='icons/segui.png';
    }
}

let flag;
let index=[];
const ricerca=document.forms["form_ricerca"];
ricerca.addEventListener('submit',cerca_utenti);