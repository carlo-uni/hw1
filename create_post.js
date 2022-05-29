
function invio_dati(event)
{   
    console.log("amomogi");
    const regole=document.querySelector('#struttura_ricerca');
    regole.classList.add('hidden');
    servizio=form.servizi.value;
    const contenuto=form.contenuto.value;
    fetch("do_search_content.php?contenuto="+contenuto+"&servizio="+servizio).then(onResponse).then(onJson);
    
    event.preventDefault();
}

function onResponse(response)
{
    return response.json();
}

function onError(error)
{
    console.log("errore" + error);
}

function onJson(json)
{
    const risultato = document.querySelector('#visualizza_risultati');
    risultato.innerHTML= '';
    if(servizio=='NASA')
    {
        console.log("siamo alla nasa");
        const immagine=json;
        const img_url=immagine.hdurl;
        
        if(img_url)
        {
            console.log("imposto il url");
            const img=document.createElement('img');
            img.src=img_url;  
            console.log(img.src);
            console.log("//////");
            console.log(img_url);
            risultato.appendChild(img);
            img.addEventListener('click',scelta);
            console.log("/////////////////////");
            console.log(img);
        }
    }
    else{
        console.log("non magic");
    }
}



function scelta(event)
{
    const carta= createImage(event.currentTarget.src);
    modal.appendChild(carta);
    modal.classList.remove('hidden');
    carta.addEventListener('click',close_modal_view);
}
////////////////////////////////
function createImage(src)
{
    const image = document.createElement('img');
    image.src = src;
    contenuto_multimediale = image.src;

    console.log("sssssssssssssss");

    console.log(contenuto_multimediale);
    return image;

}

function close_modal_view(event){
    const carta=event.currentTarget;
    modal.removeChild(carta);
    modal.classList.add('hidden');
}
//////////////////////////
function condividi_post(event)
{

    console.log(contenuto_multimediale);
    fetch('send_post.php?contenuto='+ contenuto_multimediale + '&descrizione=' + descrizione_post.value+'&service='+servizio).then(onResponse, onError);

    
    console.log(servizio);
}
let contenuto_multimediale;
let servizio;
const form_post = document.forms['post'];
const descrizione_post = form_post.descrizione;
form_post.addEventListener('submit', condividi_post);
const modal = document.querySelector('#modal_view');
const form = document.querySelector('form');
form.addEventListener('submit', invio_dati);
