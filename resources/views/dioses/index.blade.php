<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dioses</title>
<link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Orbitron:wght@500&display=swap" rel="stylesheet">

<style>
:root {
    --primary: #ffdd00;
    --secondary: #ff6f61;
    --accent: #00ffe0;
    --dark: #0a0a0a;
    --card-bg: rgba(255,255,255,0.05);
    --card-border: rgba(255,255,255,0.2);
}

* { margin:0; padding:0; box-sizing:border-box; font-family:'Orbitron', sans-serif; }

body {
    background: radial-gradient(circle at center, #0a0a0a, #1c1c1c);
    color: white;
    min-height: 100vh;
    display:flex;
    justify-content:center;
    align-items:flex-start;
    overflow-x:hidden;
    padding:50px 0;
    perspective:1500px;
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
    max-width:1200px;
}

header {
    text-align:center;
    margin-bottom:40px;
}

header h1 {
    font-size:3rem;
    background: linear-gradient(90deg, var(--primary), var(--secondary), var(--accent));
    -webkit-background-clip:text;
    color:transparent;
    animation: glowTitle 3s ease-in-out infinite alternate;
}

@keyframes glowTitle {
    0% { text-shadow:0 0 10px var(--primary), 0 0 20px var(--secondary);}
    50% { text-shadow:0 0 20px var(--accent),0 0 40px var(--secondary);}
    100% { text-shadow:0 0 30px var(--primary),0 0 50px var(--accent);}
}

header p {
    font-size:1.2rem;
    color:var(--accent);
    margin-top:10px;
    opacity:0.8;
    animation: fadeInOut 4s ease-in-out infinite alternate;
}

@keyframes fadeInOut {
    0% { opacity:0.7; }
    100% { opacity:1; }
}

/* Botón */
.btn-primary {
    display:inline-block;
    padding:12px 25px;
    border-radius:12px;
    background: linear-gradient(90deg, var(--primary), var(--accent));
    color: #0a0a0a;
    font-weight:bold;
    text-decoration:none;
    margin-bottom:30px;
    transition: all 0.3s ease;
    box-shadow:0 0 15px var(--primary);
}

.btn-primary:hover {
    background: linear-gradient(90deg, var(--accent), var(--secondary));
    color:white;
    transform:scale(1.1);
    box-shadow:0 0 30px var(--accent);
}

/* Tarjetas */
.god-list {
    display:grid;
    grid-template-columns: repeat(auto-fit,minmax(280px,1fr));
    gap:25px;
}

.god-card {
    background: var(--card-bg);
    border:1px solid var(--card-border);
    border-radius:20px;
    padding:20px;
    display:flex;
    justify-content:space-between;
    flex-direction:column;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    transform-style: preserve-3d;
    cursor:pointer;
    overflow:hidden;
}

.god-card::before {
    content:"";
    position:absolute;
    top:0;
    left:-100%;
    width:100%;
    height:100%;
    background: linear-gradient(120deg, transparent, rgba(255,255,255,0.1), transparent);
    transition: 0.8s;
}

.god-card:hover::before {
    left:100%;
}

.god-name {
    font-size:1.4rem;
    font-weight:bold;
    color:var(--primary);
    margin-bottom:5px;
}

.god-details {
    font-size:1rem;
    color:var(--accent);
}

.btn-danger {
    background: linear-gradient(90deg, #ff004c, #ff6f61);
    border:none;
    color:white;
    padding:10px 20px;
    border-radius:12px;
    font-weight:bold;
    cursor:pointer;
    transition: all 0.3s ease;
    margin-top:15px;
}

.btn-danger:hover {
    box-shadow:0 0 20px #ff6f61;
    transform:scale(1.1);
}

/* Estado vacío */
.empty-state {
    text-align:center;
    padding:50px 0;
    color:#ccc;
    font-size:1.2rem;
}
.empty-state-icon {
    font-size:4rem;
    margin-bottom:15px;
    color:var(--accent);
}

/* Animaciones adicionales */
@keyframes floatCard {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}
</style>
</head>
<body>

<canvas id="particles"></canvas>

<div class="container">
    <header>
        <h1>DIOSES</h1>
        <p>Explora y gestiona los dioses de tu mundo</p>
    </header>

    <a href="{{ route('dioses.create') }}" class="btn-primary">+ Nuevo Dios</a>

    @if ($dioses->isEmpty())
    <div class="empty-state">
        <div class="empty-state-icon">🪐</div>
        <p>No hay dioses registrados.</p>
    </div>
    @else
    <ul class="god-list">
        @foreach ($dioses as $dios)
        <li class="god-card">
            <div class="god-info">
                <div class="god-name">{{ $dios->nombre }}</div>
               
            </div>
            <form action="{{ route('dioses.destroy', $dios->id) }}" method="POST" onsubmit="return confirm('¿Eliminar registro permanentemente?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">Eliminar</button>
            </form>
        </li>
        @endforeach
    </ul>
    @endif
</div>

<script>
// Partículas dinámicas interactivas
const canvas = document.getElementById('particles');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const particles = [];
const particleCount = 120;

for(let i=0;i<particleCount;i++){
    particles.push({
        x: Math.random()*canvas.width,
        y: Math.random()*canvas.height,
        size: Math.random()*3+1,
        speedX: (Math.random()-0.5)*0.7,
        speedY: (Math.random()-0.5)*0.7,
        color: ['#ffdd00','#ff6f61','#00ffe0'][Math.floor(Math.random()*3)]
    });
}

function drawParticles(){
    ctx.clearRect(0,0,canvas.width,canvas.height);
    particles.forEach(p=>{
        ctx.beginPath();
        ctx.arc(p.x,p.y,p.size,0,Math.PI*2);
        ctx.fillStyle=p.color;
        ctx.fill();
        p.x+=p.speedX;
        p.y+=p.speedY;
        if(p.x<0||p.x>canvas.width)p.speedX*=-1;
        if(p.y<0||p.y>canvas.height)p.speedY*=-1;
    });
    requestAnimationFrame(drawParticles);
}
drawParticles();

// Tarjetas 3D interactivas (solucionado cursor en toda la pantalla)
document.querySelectorAll('.god-card').forEach(card => {
    card.addEventListener('mousemove', e=>{
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const rotateY = ((x - rect.width/2)/(rect.width/2))*15;
        const rotateX = ((rect.height/2 - y)/(rect.height/2))*15;
        card.style.transform = `rotateY(${rotateY}deg) rotateX(${rotateX}deg) translateZ(0px)`;
    });
    card.addEventListener('mouseleave', ()=>{
        card.style.transform = `rotateY(0deg) rotateX(0deg) translateZ(0px)`;
    });
});

// Animación flotante sutil
document.querySelectorAll('.god-card').forEach(card=>{
    card.style.animation = 'floatCard 3s ease-in-out infinite';
});
</script>

</body>
</html>
