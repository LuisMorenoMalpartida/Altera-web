import StreamingAvatar, {
  AvatarQuality,
  StreamingEvents,
} from "https://esm.sh/@heygen/streaming-avatar";

// Elementos del DOM
const videoElement = document.getElementById("alana-video");
const startButton = document.getElementById("start-alana-btn");
const endButton = document.getElementById("end-alana-btn");
const statusElement = document.getElementById("alana-status");
const optionsContainer = document.getElementById("alana-options"); // Contenedor de opciones

let avatar = null;
let sessionData = null;

// Configuración del Avatar
const AVATAR_ID = "Daisy-skirt-20220823"; 
const VOICE_ID = "es-MX-DaliaNeural";

async function fetchAccessToken() {
  try {
    const response = await fetch("/Altera/api/heygen-token.php");
    if (!response.ok) throw new Error("Error obteniendo token");
    const data = await response.json();
    return data.data.token;
  } catch (error) {
    updateStatus("Error: Configura tu API Key.");
    console.error(error);
    return null;
  }
}

async function startSession() {
  updateStatus("Iniciando Alana...");
  startButton.disabled = true;
  startButton.classList.add('hidden'); // Ocultar botón iniciar al comenzar

  const token = await fetchAccessToken();
  if (!token) {
    startButton.disabled = false;
    startButton.classList.remove('hidden');
    return;
  }

  avatar = new StreamingAvatar({
    token: token,
  });

  avatar.on(StreamingEvents.STREAM_READY, (event) => {
    videoElement.srcObject = event.detail;
    videoElement.play();
    updateStatus("Alana conectada.");
    endButton.disabled = false;
    
    // Iniciar flujo de conversación
    fetchNextStep("intro");
  });

  avatar.on(StreamingEvents.STREAM_DISCONNECTED, () => {
    updateStatus("Sesión finalizada.");
    resetUI();
  });

  try {
    sessionData = await avatar.createStartAvatar({
      quality: AvatarQuality.High,
      avatarName: AVATAR_ID,
      voice: { voiceId: VOICE_ID },
    });
  } catch (error) {
    console.error("Error starting avatar:", error);
    updateStatus("Error al iniciar sesión.");
    startButton.disabled = false;
    startButton.classList.remove('hidden');
  }
}

async function endSession() {
  updateStatus("Desconectando...");
  if (avatar) {
    await avatar.stopAvatar();
    avatar = null;
  }
  resetUI();
}

// Función para obtener el siguiente paso del flujo
async function fetchNextStep(nextNodeId) {
  try {
    optionsContainer.innerHTML = ''; // Limpiar opciones anteriores
    updateStatus("Alana está pensando...");

    const response = await fetch("/Altera/api/alana-chat.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ next_node: nextNodeId }),
    });
    
    const data = await response.json();
    
    // Hablar
    if (avatar) {
        await avatar.speak({ text: data.text });
        updateStatus("Alana hablando...");
    }

    // Mostrar opciones después de un pequeño delay o inmediatamente
    renderOptions(data.options);

  } catch (e) {
    console.error("Error fetching flow:", e);
    updateStatus("Error de conexión.");
  }
}

function renderOptions(options) {
  optionsContainer.innerHTML = '';
  
  if (!options || options.length === 0) return;

  options.forEach(opt => {
    const btn = document.createElement("button");
    btn.className = "btn btn--outline btn--sm alana-option-btn";
    btn.textContent = opt.label;
    btn.style.margin = "5px";
    
    btn.onclick = () => {
      if (opt.action === 'link') {
        window.open(opt.url, '_blank');
      } else if (opt.next_node) {
        fetchNextStep(opt.next_node);
      }
    };
    
    optionsContainer.appendChild(btn);
  });
}

function updateStatus(msg) {
  statusElement.textContent = msg;
}

function resetUI() {
  startButton.disabled = false;
  startButton.classList.remove('hidden');
  endButton.disabled = true;
  videoElement.srcObject = null;
  optionsContainer.innerHTML = '';
}

// Event Listeners
startButton.addEventListener("click", startSession);
endButton.addEventListener("click", endSession);

