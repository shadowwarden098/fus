<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Las Lunas - Demon Slayer</title>
<link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Orbitron:wght@500&display=swap" rel="stylesheet">
<style>
:root {
    --primary: #1a1a2e;
    --secondary: #d4af37;
    --accent: #ff006e;
    --dark: #0f0f1e;
    --blood-red: #8b0000;
    --moon-glow: #e0e0ff;
}

* { margin:0; padding:0; box-sizing:border-box; font-family:'Orbitron', sans-serif; }

html { scroll-behavior: smooth; }

body {
    background: linear-gradient(135deg, #0a0a15 0%, #1a0a2e 50%, #0f0f1e 100%);
    color: white;
    min-height: 100vh;
    display:flex;
    justify-content:center;
    align-items:flex-start;
    overflow-x:hidden;
    padding:50px 0;
    perspective:1500px;
}

body.light-theme {
    background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 50%, #f0f0f0 100%);
    color: #333;
}

#particles {
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    z-index:0;
}

.container {
    position:relative;
    z-index:2;
    width:90%;
    max-width:1400px;
}

header {
    text-align:center;
    margin-bottom:50px;
    position:relative;
}

.moon-title {
    font-size:4rem;
    font-weight:bold;
    background: linear-gradient(90deg, var(--moon-glow), var(--secondary), var(--accent));
    -webkit-background-clip:text;
    color:transparent;
    text-shadow: 0 0 30px rgba(224,224,255,0.5);
    animation: glowTitle 3s ease-in-out infinite alternate;
    margin-bottom:10px;
}

@keyframes glowTitle {
    0% { text-shadow:0 0 20px var(--moon-glow), 0 0 40px var(--accent); }
    100% { text-shadow:0 0 40px var(--secondary), 0 0 60px var(--accent); }
}

header p {
    font-size:1.3rem;
    color:var(--secondary);
    margin-top:10px;
    opacity:0.9;
}

.stats-bar {
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap:15px;
    margin:30px 0;
}

.stat-box {
    background:rgba(26,26,46,0.6);
    border:2px solid var(--secondary);
    padding:15px;
    border-radius:10px;
    text-align:center;
}

body.light-theme .stat-box {
    background:rgba(255,255,255,0.8);
    border-color:#333;
    color:#333;
}

.stat-number {
    font-size:2rem;
    color:var(--accent);
    font-weight:bold;
}

.stat-label {
    color:var(--secondary);
    font-size:0.9rem;
}

body.light-theme .stat-label {
    color:#333;
}

.controls {
    display:flex;
    gap:15px;
    margin-bottom:30px;
    justify-content:center;
    flex-wrap:wrap;
}

.control-btn {
    padding:10px 20px;
    border:2px solid var(--secondary);
    background: transparent;
    color:var(--secondary);
    border-radius:8px;
    cursor:pointer;
    font-size:1rem;
    font-weight:bold;
    transition: all 0.3s ease;
}

.control-btn:hover {
    background:var(--secondary);
    color:var(--dark);
    box-shadow:0 0 15px var(--secondary);
}

.tabs {
    display:flex;
    gap:10px;
    margin-bottom:30px;
    justify-content:center;
    flex-wrap:wrap;
}

.tab-btn {
    padding:10px 20px;
    border:2px solid var(--secondary);
    background: transparent;
    color:var(--secondary);
    border-radius:8px;
    cursor:pointer;
    font-size:1rem;
    font-weight:bold;
    transition: all 0.3s ease;
}

.tab-btn.active {
    background:var(--secondary);
    color:var(--dark);
    box-shadow:0 0 20px var(--secondary);
}

.tab-btn:hover {
    box-shadow:0 0 15px var(--secondary);
    transform:scale(1.05);
}

.moon-grid {
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap:25px;
    margin-bottom:30px;
}

.moon-grid.detail-mode {
    grid-template-columns: 1fr;
}

.moon-card {
    background: linear-gradient(135deg, rgba(26,26,46,0.8), rgba(45,20,60,0.6));
    border:2px solid var(--secondary);
    border-radius:15px;
    padding:25px;
    position:relative;
    overflow:hidden;
    transition: all 0.3s ease;
    transform-style: preserve-3d;
    cursor:pointer;
    animation: floatCard 4s ease-in-out infinite;
}

body.light-theme .moon-card {
    background: linear-gradient(135deg, rgba(240,240,250,0.9), rgba(230,220,245,0.7));
    border-color:#333;
    color:#333;
}

.moon-card::before {
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background: radial-gradient(circle, rgba(212,175,55,0.2), transparent);
    opacity:0;
    transition: opacity 0.3s ease;
}

.moon-card:hover {
    border-color:var(--accent);
    box-shadow:0 0 30px var(--secondary), inset 0 0 20px rgba(212,175,55,0.1);
    transform:translateY(-10px) scale(1.02);
}

.moon-card:hover::before {
    opacity:1;
}

.moon-card.hidden {
    display:none;
}

.moon-rank {
    display:inline-block;
    background:var(--blood-red);
    color:var(--secondary);
    padding:8px 15px;
    border-radius:50px;
    font-size:0.9rem;
    font-weight:bold;
    margin-bottom:10px;
    text-transform:uppercase;
    box-shadow:0 0 10px var(--blood-red);
}

.star-favorite {
    position:absolute;
    top:20px;
    right:20px;
    font-size:1.5rem;
    cursor:pointer;
    transition: all 0.3s ease;
    z-index:10;
}

.star-favorite:hover {
    transform:scale(1.2);
}

.star-favorite.favorite {
    color:var(--accent);
    text-shadow:0 0 10px var(--accent);
}

.moon-name {
    font-size:2rem;
    font-weight:bold;
    color:var(--moon-glow);
    margin-bottom:5px;
    text-transform:uppercase;
    letter-spacing:2px;
}

body.light-theme .moon-name {
    color:#8b0000;
}

.moon-number {
    font-size:1.4rem;
    color:var(--secondary);
    margin-bottom:15px;
    font-style:italic;
}

.moon-avatar {
    font-size:3rem;
    text-align:center;
    margin:10px 0;
}

.detail-avatar {
    font-size:6rem;
    text-align:center;
    margin:20px 0;
}

.detail-image {
    width:100%;
    max-width:500px;
    height:400px;
    border-radius:15px;
    margin:20px auto;
    display:block;
    border:3px solid var(--secondary);
    object-fit:cover;
}

.power-bar {
    background:rgba(0,0,0,0.5);
    border:1px solid var(--secondary);
    border-radius:10px;
    padding:3px;
    margin:10px 0;
    overflow:hidden;
}

.power-fill {
    background: linear-gradient(90deg, var(--accent), var(--secondary));
    height:25px;
    transition: width 0.8s ease;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:0.8rem;
    font-weight:bold;
}

.detail-item {
    display:flex;
    justify-content:space-between;
    border-bottom:1px solid rgba(212,175,55,0.3);
    padding-bottom:8px;
    margin-bottom:10px;
}

.detail-label {
    color:var(--secondary);
    font-weight:bold;
}

.detail-value {
    color:var(--moon-glow);
}

body.light-theme .detail-value {
    color:#333;
}

.moon-description {
    background:rgba(0,0,0,0.3);
    padding:12px;
    border-left:3px solid var(--accent);
    border-radius:5px;
    font-size:0.95rem;
    line-height:1.6;
    color:rgba(224,224,255,0.9);
    margin:15px 0;
}

body.light-theme .moon-description {
    background:rgba(0,0,0,0.05);
    color:#333;
}

.abilities {
    margin-top:15px;
}

.abilities-title {
    color:var(--secondary);
    font-weight:bold;
    margin-bottom:8px;
}

body.light-theme .abilities-title {
    color:#8b0000;
}

.ability-tag {
    display:inline-block;
    background:rgba(212,175,55,0.2);
    border:1px solid var(--secondary);
    color:var(--secondary);
    padding:6px 12px;
    border-radius:20px;
    font-size:0.85rem;
    margin:4px 4px 4px 0;
}

.btn-expand {
    background:var(--secondary);
    border:none;
    color:var(--dark);
    padding:12px 20px;
    border-radius:12px;
    font-weight:bold;
    cursor:pointer;
    transition: all 0.3s ease;
    margin-top:15px;
    width:100%;
}

.btn-expand:hover {
    box-shadow:0 0 20px var(--secondary);
    transform:scale(1.05);
}

.btn-close {
    background:var(--blood-red);
    border:none;
    color:white;
    padding:12px 20px;
    border-radius:12px;
    font-weight:bold;
    cursor:pointer;
    transition: all 0.3s ease;
    margin-top:15px;
    width:100%;
}

.btn-close:hover {
    box-shadow:0 0 20px var(--blood-red);
    transform:scale(1.05);
}

.empty-state {
    text-align:center;
    padding:50px;
    color:var(--secondary);
    font-size:1.3rem;
    grid-column: 1/-1;
}

.moon-icon {
    font-size:3rem;
    margin-bottom:10px;
}

.filter-search {
    margin-bottom:30px;
    text-align:center;
}

.search-input {
    padding:12px 20px;
    border:2px solid var(--secondary);
    background:rgba(0,0,0,0.5);
    color:white;
    border-radius:10px;
    width:100%;
    max-width:400px;
    font-size:1rem;
    transition: all 0.3s ease;
}

body.light-theme .search-input {
    background:rgba(255,255,255,0.8);
    color:#333;
    border-color:#333;
}

.search-input:focus {
    outline:none;
    box-shadow:0 0 20px var(--secondary);
    border-color:var(--accent);
}

@keyframes floatCard {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-5px); }
    100% { transform: translateY(0px); }
}

@media (max-width: 768px) {
    .moon-title { font-size:2.5rem; }
    .detail-avatar { font-size:4rem; }
    .detail-image { height:300px; }
}
</style>
</head>
<body>

<canvas id="particles"></canvas>

<div class="container">
    <header>
        <h1 class="moon-title">🌙 LAS LUNAS 🌙</h1>
        <p>Demonios superiores del universo Demon Slayer</p>
        
        <div class="stats-bar">
            <div class="stat-box">
                <div class="stat-number" id="totalMoons">16</div>
                <div class="stat-label">Total de Lunas</div>
            </div>
            <div class="stat-box">
                <div class="stat-number" id="superiorCount">8</div>
                <div class="stat-label">Lunas Superiores</div>
            </div>
            <div class="stat-box">
                <div class="stat-number" id="inferiorCount">8</div>
                <div class="stat-label">Lunas Inferiores</div>
            </div>
            <div class="stat-box">
                <div class="stat-number" id="favoriteCount">0</div>
                <div class="stat-label">Favoritas</div>
            </div>
        </div>
    </header>

    <div class="filter-search">
        <input type="text" id="searchInput" class="search-input" placeholder="Buscar una luna...">
    </div>

    <div class="controls">
        <button class="control-btn" onclick="toggleTheme()">🌓 Tema</button>
        <button class="control-btn" onclick="exportPDF()">📥 Exportar</button>
    </div>

    <div class="tabs">
        <button class="tab-btn active" onclick="filterMoons('all')">Todas</button>
        <button class="tab-btn" onclick="filterMoons('upper')">Lunas Superiores</button>
        <button class="tab-btn" onclick="filterMoons('lower')">Lunas Inferiores</button>
        <button class="tab-btn" onclick="filterMoons('favorites')">⭐ Favoritas</button>
    </div>

    <div class="moon-grid" id="moonGrid"></div>
</div>

<script>
// ==================== DATOS ====================
const moons = [
    {
        name: "Muzan Kibutsuji",
        number: "Primera Luna",
        type: "upper",
        power: 100,
        avatar: "👹",
        image: "https://preview.redd.it/this-level-of-criticism-of-muzan-makes-no-sense-to-me-v0-mggudj6isc1f1.png?width=640&crop=smart&auto=webp&s=afd434e9159e0667d4fb5f4fef633bf0bdbfc7f0",
        abilities: ["Manipulación Biomasas", "Regeneración Completa", "Técnicas Demoníacas Múltiples"],
        description: "El Rey Demonio, creador de todos los demonios.",
        background: "Nació hace más de mil años como humano. Es el creador de la marca de demonio y progenitor de todas las Lunas.",
        weakness: "Luz del sol, Voluntad humana",
        defeatedBy: "Tanjiro Kamado",
        yearConverted: "Antigüedad desconocida",
        techniques: ["Técnica Lunar Infinita", "Aura Demoníaca", "Regeneración Absoluta"]
    },
    {
        name: "Kokushibo",
        number: "Luna Superior #1",
        type: "upper",
        power: 99,
        avatar: "🌙",
        image: "https://images.unsplash.com/photo-1542838132-92c53300491e?w=500&h=400&fit=crop",
        abilities: ["Respiración de la Luna", "Ojos de Demonio", "Regeneración Acelerada"],
        description: "Antiguo espadachín Hashira convertido en demonio.",
        background: "Fue un Hashira hace siglos. Buscaba perfeccionar su técnica y fue convertido por Muzan.",
        weakness: "Cuerpos de agua",
        defeatedBy: "Tomioka & Giyuu",
        yearConverted: "Era Heian",
        techniques: ["Respiración de la Luna (16 técnicas)"]
    },
    {
        name: "Douma",
        number: "Luna Superior #2",
        type: "upper",
        power: 98,
        avatar: "❄️",
        image: "https://preview.redd.it/why-douma-is-the-most-broken-demon-to-ever-exist-v0-z0j8a2vi4vmc1.png?auto=webp&s=c2f057f82c7e95189e1fed4a7ba5b621a4c21e01",
        abilities: ["Respiración del Hielo", "Congelación Demoníaca", "Regeneración"],
        description: "Demonio elegante que lidera un culto religioso.",
        background: "Líder del Templo de la Religiosa del Hielo. Obsesionado con la belleza.",
        weakness: "Fuego, Concentración",
        defeatedBy: "Shinobu & Kanao",
        yearConverted: "Hace 200 años",
        techniques: ["Respiración del Hielo (10 técnicas)"]
    },
    {
        name: "Akaza",
        number: "Luna Superior #3",
        type: "upper",
        power: 97,
        avatar: "💜",
        image: "https://a.storyblok.com/f/178900/1920x1080/0c8e61d7d2/demon-slayer-kimetsu-no-yaiba-infinity-castle.jpg",
        abilities: ["Técnica Demoníaca Destructiva", "Puños de Demonio", "Percepción de Energía"],
        description: "Demonio beligerante que disfruta del combate.",
        background: "Fue un luchador de sumo humano. Buscó fuerza y fue convertido en demonio.",
        weakness: "Energía vital débil",
        defeatedBy: "Rengoku & Tanjiro",
        yearConverted: "Hace 100 años",
        techniques: ["Técnica Demoníaca Destructiva (8 técnicas)"]
    },
    {
        name: "Hantengu",
        number: "Luna Superior #4",
        type: "upper",
        power: 96,
        avatar: "⚡",
        image: "https://images.unsplash.com/photo-1516975080664-ed2fc6a32937?w=500&h=400&fit=crop",
        abilities: ["Separación de Cuerpo", "Técnicas Elementales", "Regeneración"],
        description: "Demonio tímido que puede dividir su cuerpo.",
        background: "Criminal ejecutado convertido por Muzan. Cobarde pero poderoso.",
        weakness: "Cabeza principal",
        defeatedBy: "Tanjiro",
        yearConverted: "Hace 150 años",
        techniques: ["Separación Emocional", "Técnicas de los 4 Elementos"]
    },
    {
        name: "Gyokko",
        number: "Luna Superior #5",
        type: "upper",
        power: 95,
        avatar: "🐠",
        image: "https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=500&h=400&fit=crop",
        abilities: ["Manipulación de Agua", "Técnica del Recipiente Demoníaco", "Control de Criaturas"],
        description: "Demonio obsesionado con el arte.",
        background: "Artista obsesionado que usa porcelana viviente como medio. Crea criaturas demoníacas.",
        weakness: "Luz",
        defeatedBy: "Muichiro",
        yearConverted: "Hace 200 años",
        techniques: ["Técnica del Recipiente Viviente", "Control de Criaturas Demoníacas"]
    },
    {
        name: "Gyutaro",
        number: "Luna Superior #6",
        type: "upper",
        power: 94,
        avatar: "🩸",
        image: "https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=500&h=400&fit=crop",
        abilities: ["Técnica de Sangre", "Garras de Demonio", "Veneno Demoniaco"],
        description: "Demonio vengativo que protege a su hermana Daki.",
        background: "Criminal humano que murió protegiendo a su hermana. Convertido como demonio.",
        weakness: "Separación de su hermana",
        defeatedBy: "Tanjiro & Tengen",
        yearConverted: "Hace 100 años",
        techniques: ["Técnica de Sangre (6 técnicas)", "Veneno Hemotóxico"]
    },
    {
        name: "Nakime",
        number: "Luna Superior #4 (Nueva)",
        type: "upper",
        power: 93,
        avatar: "🎺",
        image: "https://static.wikia.nocookie.net/kimetsu-no-yaiba/images/b/b1/Nakime_no_Anime.png/revision/latest?cb=20240102194219&path-prefix=pt-br",
        abilities: ["Manipulación Biológica", "Teletransporte", "Control de Castillo"],
        description: "Demonio músico que controla la fortaleza de Muzan.",
        background: "Reemplazó a Hantengu. Manipula la realidad dentro de su dominio mediante música.",
        weakness: "Separación de su instrumento",
        defeatedBy: "Ninguno",
        yearConverted: "Desconocido",
        techniques: ["Biomancia", "Teletransporte de Castillo", "Realidad Alterada"]
    },
    {
        name: "Rui",
        number: "Luna Inferior #5",
        type: "lower",
        power: 82,
        avatar: "🕷️",
        image: "https://i.redd.it/rui-from-demon-slayer-vs-toji-from-jjk-who-wins-this-battle-v0-miu4c37co4rf1.png?width=1920&format=png&auto=webp&s=1b29830998cb35b38b32faa44d1cfdb935bd20e3",
        abilities: ["Manipulación de Redes", "Veneno de Seda", "Regeneración"],
        description: "Joven demonio que construyó una familia.",
        background: "Fue convertido joven. Buscaba conexiones emocionales reales con su familia demoniaca.",
        weakness: "Separación de la familia",
        defeatedBy: "Tanjiro",
        yearConverted: "Hace 50 años",
        techniques: ["Redes de Sida Letal", "Envenenamiento Progresivo"]
    },
    {
        name: "Enmu",
        number: "Luna Inferior #1",
        type: "lower",
        power: 80,
        avatar: "😴",
        image: "https://www.nautiljon.com/images/perso/00/83/enmu_21138.webp",
        abilities: ["Manipulación de Sueños", "Energía Demoniaca", "Ilusiones"],
        description: "Demonio que manipula los sueños de sus víctimas.",
        background: "Favorito de Muzan. Tiene una conexión especial con el Rey Demonio.",
        weakness: "Despertar",
        defeatedBy: "Tanjiro",
        yearConverted: "Desconocido",
        techniques: ["Sueño Infinito", "Absorción de Alma"]
    },
    {
        name: "Kamanue",
        number: "Luna Inferior #2",
        type: "lower",
        power: 79,
        avatar: "💀",
        image: "https://i.pinimg.com/736x/f4/74/f7/f474f7dc2cf41ea0311b42fddcdb225e.jpg",
        abilities: ["Regeneración Ósea", "Armas Óseas", "Resistencia Física"],
        description: "Demonio gordo que crea armas con su propio esqueleto.",
        background: "Increíblemente resistente. Puede regenerar partes de su cuerpo con hueso.",
        weakness: "Fuego",
        defeatedBy: "Inosuke",
        yearConverted: "Hace 30 años",
        techniques: ["Proyectil Óseo", "Armadura Ósea"]
    },
    {
        name: "Mukago",
        number: "Luna Inferior #4",
        type: "lower",
        power: 78,
        avatar: "🟢",
        image: "https://static.wikia.nocookie.net/kimetsu-no-yaiba/images/7/7c/Mukago_bowing_to_Muzan.png/revision/latest?cb=20190928170133",
        abilities: ["Secreciones Pegajosas", "Trampa de Cuerpo", "Absorción"],
        description: "Demonio baboso que atrapa víctimas en su cuerpo viscoso.",
        background: "Tiene un cuerpo gelatinoso que le permite atrapar y absorber a sus presas.",
        weakness: "Calor extremo",
        defeatedBy: "Giyu",
        yearConverted: "Hace 40 años",
        techniques: ["Trampa Viscosa", "Digestión Lenta"]
    },
    {
        name: "Rokuro",
        number: "Luna Inferior #3",
        type: "lower",
        power: 77,
        avatar: "⚫",
        image: "https://cdn.shopify.com/s/files/1/0046/2779/1960/files/rokuro_demon_slayer_kimetsu_no_yaiba_480x480.jpg?v=1642370019",
        abilities: ["Manipulación de Energía", "Ataques a Distancia", "Sentidos Mejorados"],
        description: "Demonio con poderes de energía.",
        background: "Fue derrotado por Tanjiro en sus primeras batallas. Tenía una conexión con Muzan.",
        weakness: "Falta de poder comparativo",
        defeatedBy: "Tanjiro",
        yearConverted: "Hace 25 años",
        techniques: ["Proyectil Energético", "Sentido Demoniaco"]
    },
    {
        name: "Wakuraba",
        number: "Luna Inferior #6",
        type: "lower",
        power: 76,
        avatar: "🟡",
        image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlgtEn0OiRU6PxpK7DUOghfCCyvbFXngMtfw&s",
        abilities: ["Transformación", "Regeneración Básica", "Agilidad"],
        description: "Demonio menor de las Lunas Inferiores.",
        background: "Tiene habilidades básicas demoniacas. Es una de las Lunas más débiles.",
        weakness: "Técnicas respiratorias básicas",
        defeatedBy: "Varios Hashira",
        yearConverted: "Hace 20 años",
        techniques: ["Transformación Parcial", "Movimiento Rápido"]
    },
    {
        name: "Daki",
        number: "Hermana de Gyutaro",
        type: "lower",
        power: 81,
        avatar: "🎎",
        image: "https://i.pinimg.com/736x/ed/a8/3f/eda83f7f43793064af4773229d573e69.jpg",
        abilities: ["Cintas Demoniácas", "Seducción", "Regeneración"],
        description: "Hermana de Gyutaro, trabaja en el Distrito Rojo.",
        background: "Protegida por su hermano. Trabaja como cortesana en el Distrito Rojo. Ambiciosa y cruel.",
        weakness: "Separación de Gyutaro",
        defeatedBy: "Tanjiro & Tengen",
        yearConverted: "Simultáneamente con Gyutaro",
        techniques: ["Cintas de Obi Demoníaco", "Atracción Hipnótica"]
    }
];

// ==================== VARIABLES GLOBALES ====================
let favorites = [];
let currentFilter = 'all';

// ==================== RENDERIZADO PRINCIPAL ====================
function renderMoons(filter = 'all', search = '') {
    currentFilter = filter;
    const grid = document.getElementById('moonGrid');
    grid.innerHTML = '';
    grid.classList.remove('detail-mode');

    let filtered = moons;
    
    if (filter !== 'all') {
        if (filter === 'favorites') {
            filtered = filtered.filter(m => favorites.includes(m.name));
        } else {
            filtered = filtered.filter(m => m.type === filter);
        }
    }

    if (search) {
        filtered = filtered.filter(m => 
            m.name.toLowerCase().includes(search.toLowerCase()) ||
            m.number.toLowerCase().includes(search.toLowerCase())
        );
    }

    if (filtered.length === 0) {
        grid.innerHTML = `
            <div class="empty-state">
                <div class="moon-icon">🌑</div>
                <p>No se encontraron lunas...</p>
            </div>
        `;
        return;
    }

    filtered.forEach(moon => {
        const card = createCard(moon);
        grid.appendChild(card);
    });
}

function createCard(moon) {
    const isFavorite = favorites.includes(moon.name);
    const card = document.createElement('div');
    card.className = 'moon-card';
    card.innerHTML = `
        <span class="star-favorite ${isFavorite ? 'favorite' : ''}" onclick="toggleFavorite('${moon.name}', event)">
            ${isFavorite ? '⭐' : '☆'}
        </span>
        <div class="moon-rank">${moon.type === 'upper' ? '🔝 Superior' : '🔻 Inferior'}</div>
        <div class="moon-avatar">${moon.avatar}</div>
        <div class="moon-name">${moon.name}</div>
        <div class="moon-number">${moon.number}</div>
        <div class="power-bar">
            <div class="power-fill" style="width:${moon.power}%">${moon.power}</div>
        </div>
        <button class="btn-expand" onclick="showDetail('${moon.name}')">Ver Detalles</button>
    `;
    card.onclick = (e) => {
        if (e.target.className !== 'star-favorite favorite' && e.target.className !== 'star-favorite' && e.target.className !== 'btn-expand') {
            showDetail(moon.name);
        }
    };
    return card;
}

// ==================== VISTA DETALLADA ====================
function showDetail(moonName) {
    const moon = moons.find(m => m.name === moonName);
    const grid = document.getElementById('moonGrid');
    
    grid.innerHTML = `
        <div class="moon-card" style="grid-column: 1/-1;">
            <span class="star-favorite ${favorites.includes(moon.name) ? 'favorite' : ''}" onclick="toggleFavorite('${moon.name}')">
                ${favorites.includes(moon.name) ? '⭐' : '☆'}
            </span>
            
            <div style="text-align:center; margin-bottom:20px;">
                <div class="detail-avatar">${moon.avatar}</div>
                <h2 class="moon-name">${moon.name}</h2>
                <div class="moon-number">${moon.number}</div>
                <div class="moon-rank" style="display:inline-block;">${moon.type === 'upper' ? '🔝 Luna Superior' : '🔻 Luna Inferior'}</div>
            </div>

            <img src="${moon.image}" alt="${moon.name}" class="detail-image" onerror="this.src='https://via.placeholder.com/500x400?text=${moon.name}'">

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:30px; margin:30px 0;">
                <div>
                    <h3 class="abilities-title">📊 Estadísticas</h3>
                    <div class="detail-item">
                        <span class="detail-label">Poder:</span>
                        <span class="detail-value">${moon.power}/100</span>
                    </div>
                    <div class="power-bar" style="margin:15px 0;">
                        <div class="power-fill" style="width:${moon.power}%">${moon.power}</div>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Tipo:</span>
                        <span class="detail-value">${moon.type === 'upper' ? 'Superior' : 'Inferior'}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Convertida:</span>
                        <span class="detail-value">${moon.yearConverted}</span>
                    </div>
                </div>

                <div>
                    <h3 class="abilities-title">⚠️ Información</h3>
                    <div class="detail-item">
                        <span class="detail-label">Rango:</span>
                        <span class="detail-value">${moon.number}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Debilidades:</span>
                        <span class="detail-value">${moon.weakness}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Derrotada Por:</span>
                        <span class="detail-value">${moon.defeatedBy}</span>
                    </div>
                </div>
            </div>

            <div style="margin:20px 0; padding:15px; background:rgba(0,0,0,0.3); border-radius:10px; border-left:3px solid var(--accent);">
                <h3 class="abilities-title">📜 Descripción</h3>
                <p style="color:rgba(224,224,255,0.9); line-height:1.6;">${moon.description}</p>
            </div>

            <div style="margin:20px 0; padding:15px; background:rgba(0,0,0,0.3); border-radius:10px; border-left:3px solid var(--accent);">
                <h3 class="abilities-title">🎭 Trasfondo</h3>
                <p style="color:rgba(224,224,255,0.9); line-height:1.6;">${moon.background}</p>
            </div>

            <div style="margin:20px 0;">
                <h3 class="abilities-title">⚔️ Habilidades</h3>
                <div>${moon.abilities.map(a => `<span class="ability-tag">${a}</span>`).join('')}</div>
            </div>

            <div style="margin:20px 0;">
                <h3 class="abilities-title">💥 Técnicas Especiales</h3>
                <div>${moon.techniques.map(t => `<span class="ability-tag">${t}</span>`).join('')}</div>
            </div>

            <button class="btn-close" onclick="closeDetail()">❌ Cerrar Vista Detallada</button>
        </div>
    `;
    grid.classList.add('detail-mode');
}

function closeDetail() {
    renderMoons(currentFilter, document.getElementById('searchInput').value);
}

// ==================== FUNCIONES AUXILIARES ====================
function toggleFavorite(moonName, event) {
    if (event) event.stopPropagation();
    const idx = favorites.indexOf(moonName);
    if (idx > -1) {
        favorites.splice(idx, 1);
    } else {
        favorites.push(moonName);
    }
    updateStats();
    renderMoons(currentFilter, document.getElementById('searchInput').value);
}

function filterMoons(type) {
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    renderMoons(type, '');
}

function toggleTheme() {
    document.body.classList.toggle('light-theme');
}

function exportPDF() {
    let content = 'LAS LUNAS - DEMON SLAYER\n';
    content += '========================\n\n';
    moons.forEach(m => {
        content += `${m.avatar} ${m.name}\n`;
        content += `Rango: ${m.number}\n`;
        content += `Poder: ${m.power}/100\n`;
        content += `Habilidades: ${m.abilities.join(', ')}\n`;
        content += `Debilidades: ${m.weakness}\n`;
        content += `Derrotada por: ${m.defeatedBy}\n`;
        content += '---\n\n';
    });
    const blob = new Blob([content], { type: 'text/plain' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'lunas-demon-slayer.txt';
    a.click();
}

function updateStats() {
    document.getElementById('totalMoons').textContent = moons.length;
    document.getElementById('superiorCount').textContent = moons.filter(m => m.type === 'upper').length;
    document.getElementById('inferiorCount').textContent = moons.filter(m => m.type === 'lower').length;
    document.getElementById('favoriteCount').textContent = favorites.length;
}

// ==================== EVENT LISTENERS ====================
document.getElementById('searchInput').addEventListener('input', (e) => {
    renderMoons(currentFilter, e.target.value);
});

// ==================== PARTÍCULAS ANIMADAS ====================
const canvas = document.getElementById('particles');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const particles = [];
for(let i = 0; i < 80; i++) {
    particles.push({
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        size: Math.random() * 2 + 0.5,
        speedX: (Math.random() - 0.5) * 0.4,
        speedY: (Math.random() - 0.5) * 0.4,
        color: ['#d4af37', '#e0e0ff', '#ff006e'][Math.floor(Math.random() * 3)]
    });
}

function drawParticles() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    particles.forEach(p => {
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
        ctx.fillStyle = p.color;
        ctx.fill();
        p.x += p.speedX;
        p.y += p.speedY;
        if (p.x < 0 || p.x > canvas.width) p.speedX *= -1;
        if (p.y < 0 || p.y > canvas.height) p.speedY *= -1;
    });
    requestAnimationFrame(drawParticles);
}
drawParticles();

window.addEventListener('resize', () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
});

// ==================== INICIALIZACIÓN ====================
renderMoons('all', '');
updateStats();
</script>

</body>
</html>