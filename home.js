
fetch("http://localhost/new/visualizza_post.php").then(onResponse, onError).then(onJson);

function onError(error){
    console.log("errore" + error);
}

function onResponse(response)
{
    return response.json();
}

function onJson(json)
{
    const spazio_post=document.querySelector('section');
    spazio_post.innerHTML='';
    console.log(json);
    const res= json
    
    let num=50;
    for(let i=0; i<num; i++)
    {
        const results = res[i]
        const singolo_post=document.createElement('div');
        const descrizione=document.createElement('div');
        const contenuto=document.createElement('img');
        const utente=document.createElement('span');
        const data=document.createElement('span');
        const intestazione=document.createElement('div');
        const icona_like=document.createElement('img');
        const n_like=document.createElement('span');
        
        descrizione.textContent=results.descrizione;
        
        console.log(results.contenuto_multimediale);
        contenuto.src=results.contenuto_multimediale;
        
        console.log("sussusussususususu");
        console.log(contenuto.src);

        contenuto.classList.add('contenuto');
        n_like.dataset.id_post=results.id_post;
        
        utente.textContent=results.id_utente;
        
        n_like.textContent=results.numero_like;
        
        data.textContent=results.data_pubblicazione;
        
        icona_like.classList.add('pointer');
        n_like.classList.add('pointer');
        if(results.liked==0)
        
        {
            icona_like.src="icons/like.png";
        }
        else
        {
            icona_like.src="icons/piaciuto.png";
        }
        icona_like.dataset.id_post=results.id_post;
        
        singolo_post.classList.add('single_post');
        intestazione.appendChild(utente);
        intestazione.appendChild(data);
        singolo_post.appendChild(intestazione);
        singolo_post.appendChild(contenuto);
        singolo_post.appendChild(descrizione);
        singolo_post.appendChild(icona_like);
        singolo_post.appendChild(n_like);
        spazio_post.appendChild(singolo_post);
        icona_like.addEventListener('click',ilike);
        n_like.addEventListener('click',show_like);
    }    
 }

function show_like(event)
{
    const current=event.currentTarget;
    const id_post=current.dataset.id_post;
    fetch("show_like.php?id_post="+id_post).then(onResponse).then(onLike);
}

function onLike(json)
{
    for(let i of json)
    {
        console.log(json);
        const user=document.createElement('span');
        const immagine=document.createElement('img');
        const utente=document.createElement('div');
        const folder=i.avatar;
        user.textContent=i.id;
        immagine.src='images/'+ folder;
        utente.appendChild(immagine);
        utente.appendChild(user);
        modal.classList.add('utente');
        modal.appendChild(utente);
        modal.classList.remove('hidden');
        modal.addEventListener('click',close_modal_view);
    }
}

function close_modal_view(event){
    const modale=event.currentTarget;
    modal.innerHTML='';
    modale.classList.add('hidden');
}


function ilike(event)
{
    console.log('cliccato');
    const post_piaciuto=event.currentTarget;
    const id_post=post_piaciuto.dataset.id_post;
    fetch("like.php?id_post="+id_post);
    fetch("visualizza_post.php").then(onResponse).then(onJson);

}
const modal = document.querySelector('#modal_view');