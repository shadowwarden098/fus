<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registrar Nuevo Dios</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
<style>
:root {
    --bg-dark: #0b0c1a;
    --card-bg: rgba(20, 20, 40, 0.8);
    --neon-cyan: #00fff0;
    --neon-magenta: #ff00f7;
    --text-light: #f0f0f0;
}

* { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Orbitron', sans-serif; }

body {
    background: radial-gradient(ellipse at center, #0b0c1a 0%, #000000 100%);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    color: var(--text-light);
}

canvas#background {
    position: fixed;
    top:0; left:0;
    width: 100%; height: 100%;
    z-index: 0;
}

.container {
    position: relative;
    z-index: 2;
    width: 95%;
    max-width: 700px;
    background: var(--card-bg);
    border-radius: 25px;
    padding: 50px;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 50px rgba(0,255,240,0.5), 0 0 50px rgba(255,0,247,0.5);
    overflow: hidden;
}

h1 {
    text-align: center;
    font-size: 2.5rem;
    background: linear-gradient(90deg, var(--neon-cyan), var(--neon-magenta));
    -webkit-background-clip: text;
    color: transparent;
    text-shadow: 0 0 10px var(--neon-cyan), 0 0 20px var(--neon-magenta);
    margin-bottom: 40px;
    animation: glow 2s infinite alternate;
}

@keyframes glow {
    0% { text-shadow: 0 0 10px var(--neon-cyan), 0 0 20px var(--neon-magenta); }
    50% { text-shadow: 0 0 25px var(--neon-cyan), 0 0 40px var(--neon-magenta); }
    100% { text-shadow: 0 0 10px var(--neon-cyan), 0 0 20px var(--neon-magenta); }
}

form { display: flex; flex-direction: column; gap: 25px; }

label {
    font-weight: bold;
    color: var(--neon-cyan);
}

input {
    padding: 15px 20px;
    border-radius: 12px;
    border: 2px solid rgba(0,255,240,0.2);
    background: rgba(0,0,0,0.2);
    color: var(--text-light);
    font-size: 1rem;
    transition: all 0.3s ease;
}

input:focus {
    border-color: var(--neon-magenta);
    box-shadow: 0 0 20px var(--neon-cyan), 0 0 30px var(--neon-magenta);
    outline: none;
    transform: scale(1.02);
}

.button-group {
    display: flex;
    gap: 20px;
    margin-top: 30px;
}

.btn {
    flex: 1;
    padding: 15px;
    border-radius: 12px;
    border: none;
    font-weight: bold;
    font-size: 1rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    background: linear-gradient(90deg, var(--neon-cyan), var(--neon-magenta));
    color: #000;
    box-shadow: 0 0 15px var(--neon-cyan), 0 0 15px var(--neon-magenta);
    transition: all 0.3s ease;
}

.btn:hover {
    transform: scale(1.08);
    box-shadow: 0 0 30px var(--neon-cyan), 0 0 30px var(--neon-magenta);
}

.btn-back {
    background: rgba(0,0,0,0.2);
    border: 1px solid rgba(0,255,240,0.3);
    color: var(--text-light);
}

.btn-back:hover {
    background: rgba(0,255,240,0.1);
    color: var(--neon-cyan);
    box-shadow: 0 0 20px var(--neon-cyan), 0 0 20px var(--neon-magenta);
}

/* Tooltip hover efecto en inputs */
input::placeholder {
    color: rgba(255,255,255,0.5);
}

/* Fondo partículas */
.particle {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}
</style>
</head>
<body>

<canvas id="background"></canvas>

<div class="container">
    <h1><i class="fas fa-galaxy"></i> Registrar Nuevo Dios</h1>

    <form action="{{ route('dioses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingresa el nombre del dios" required>
        </div>

     
        <div class="button-group">
            <button type="submit" class="btn"><i class="fas fa-save"></i> Guardar</button>
            <a href="{{ route('dioses.index') }}" class="btn btn-back"><i class="fas fa-arrow-left"></i> Volver</a>
        </div>
    </form>
</div>

<script>
// Fondo dinámico de estrellas
const canvas = document.getElementById('background');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const stars = [];
for(let i=0;i<150;i++){
    stars.push({
        x: Math.random()*canvas.width,
        y: Math.random()*canvas.height,
        radius: Math.random()*2+1,
        alpha: Math.random()
    });
}

function drawStars(){
    ctx.clearRect(0,0,canvas.width,canvas.height);
    stars.forEach(s=>{
        ctx.beginPath();
        ctx.arc(s.x,s.y,s.radius,0,Math.PI*2);
        ctx.fillStyle = `rgba(255,255,255,${s.alpha})`;
        ctx.fill();
    });
}

function animateStars(){
    stars.forEach(s=>{
        s.alpha += (Math.random()-0.5)*0.02;
        if(s.alpha<0) s.alpha=0;
        if(s.alpha>1) s.alpha=1;
    });
    drawStars();
    requestAnimationFrame(animateStars);
}
animateStars();

// Partículas interactivas con el cursor
document.addEventListener('mousemove', function(e){
    const particle = document.createElement('div');
    particle.classList.add('particle');
    particle.style.width = particle.style.height = Math.random()*5+3+'px';
    particle.style.left = e.clientX+'px';
    particle.style.top = e.clientY+'px';
    particle.style.background = 'linear-gradient(45deg, #00fff0, #ff00f7)';
    particle.style.boxShadow = '0 0 8px #00fff0, 0 0 10px #ff00f7';
    document.body.appendChild(particle);
    setTimeout(()=>particle.remove(),500);
});

window.addEventListener('resize', ()=>{ canvas.width = window.innerWidth; canvas.height = window.innerHeight; });
</script>

</body>
</html>
