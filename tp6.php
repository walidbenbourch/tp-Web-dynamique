<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste de tâches</title>
    <style>
       :root {
    --background: #cbe2f9;
    --text: #102d49;
    --primary: #1f82c4;
    --success: #2ecc71;
    --error: #e74c3c;
}
body {
    background: var(--background);
    font-family: 'Segoe UI', sans-serif;
    margin: 50px;
    line-height: 2;
}
.liste-taches {
    background: white;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
.tache {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px;
    border-bottom: 1px solid #e9ecef;
    transition: var(--background) 0.3s;
}
.tache:hover {
    background: #f8f9fa;
}
.tache-terminee {
    text-decoration: line-through;
    color: #95a5a6;
}
.bouton {
    background: none;
    border: none;
    padding: 8px;
    cursor: pointer;
    font-size: 1.2em;
    transition: transform 0.2s;
}
.bouton:hover {
    transform: scale(1.1);
}
.bouton-termine {
    color: var(--success);
}
.bouton-supprimer {
    color: var(--error);
}
#formulaire {
    background: white;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
#champ-tache {
    padding: 12px;
    border: 1px solid #e9ecef;
    border-radius: 25px;
    width: calc(100% - 120px);
    margin-right: 10px;
}
#champ-tache:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 10px rgba(52,152,219,0.3);
}
.bouton-termine::before {
    content: '✅';
    margin-right: 5px;
}

.bouton-supprimer::before {
    content: '❌';
    margin-right: 5px;
}
.dark-mode {
    background-color: #121212;
    color: white;
}
.dark-mode .liste-taches {
    background-color: #1e1e1e;
}
.dark-mode .tache {
    border-bottom: 1px solid #333;
}
.dark-mode .tache-terminee {
    color: #888;
}
.dark-mode .tache:hover {
    background: #333;
}
#darkModeBtn {
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    background: white;
    color: black;
    cursor: pointer;
    border-radius: 5px;
    transition: var(--background) 0.3s, color 0.3s;
    position: absolute;
    top: 10px;
    right: 10px;
}
.dark-mode #darkModeBtn {
    background: black;
    color: white;
}
    </style>
</head>
<body>
    <h1 style="color: var(--primary);">Ma liste de tâches</h1>    
    <form id="formulaire">
        <input type="text" id="champ-tache" placeholder="Ajouter une tâche">
        <button type="submit">Ajouter</button>
    </form>  
    <ul id="liste-taches" class="liste-taches"></ul>
    <button id="darkModeBtn">Mode Sombre</button>
    <script>
        const formulaire = document.getElementById('formulaire');
        const listeTaches = document.getElementById('liste-taches');
        const champTache = document.getElementById('champ-tache');
        formulaire.addEventListener('submit', function(e) {
            e.preventDefault();       
            const tacheTexte = champTache.value.trim();          
            if(tacheTexte !== '') {                
                const nouvelleTache = document.createElement('li');
                nouvelleTache.className = 'tache';                
                nouvelleTache.innerHTML = `
                    <span>${tacheTexte}</span>
                    <button class="bouton bouton-termine">Terminé</button>
                    <button class="bouton bouton-supprimer">Supprimer</button>
                `;             
                listeTaches.appendChild(nouvelleTache);                             
                champTache.value = '';            
                nouvelleTache.querySelector('.bouton-termine').addEventListener('click', function() {
                    nouvelleTache.querySelector('span').classList.toggle('tache-terminee');
                });             
                nouvelleTache.querySelector('.bouton-supprimer').addEventListener('click', function() {
                    nouvelleTache.remove();
                });
            }
        });
        const darkModeBtn = document.getElementById("darkModeBtn");

darkModeBtn.addEventListener("click", function() {
    document.body.classList.toggle("dark-mode");
    if (document.body.classList.contains("dark-mode")) {
        darkModeBtn.textContent = "Mode Clair";
    } else {
        darkModeBtn.textContent = "Mode Sombre";
    }
});
    </script>
</body>
</html>
