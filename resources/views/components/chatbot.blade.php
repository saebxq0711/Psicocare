{{-- resources/views/components/chatbot.blade.php --}}
<style>
    /* Custom animations for the chatbot */
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulse-bubble {
        0% { transform: scale(1); }
        50% { transform: scale(1.03); }
        100% { transform: scale(1); }
    }

    @keyframes typing-dots {
        0%, 80%, 100% { transform: scale(0); opacity: 0; }
        40% { transform: scale(1); opacity: 1; }
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.3s ease-out forwards;
    }

    .animate-pulse-bubble:hover {
        animation: pulse-bubble 0.5s ease-in-out;
    }

    .typing-dot {
        display: inline-block;
        width: 6px;
        height: 6px;
        background-color: #6b7280; /* gray-500 */
        border-radius: 50%;
        margin: 0 1px;
        animation: typing-dots 1.4s infinite ease-in-out both;
    }
    .typing-dot:nth-child(2) { animation-delay: 0.2s; }
    .typing-dot:nth-child(3) { animation-delay: 0.4s; }
</style>

<div x-data="{ open: false, messages: [] }" class="fixed bottom-6 right-6 z-50">
    {{-- Botón flotante de burbuja --}}
    <button @click="open = !open" x-show="!open"
        class="relative bg-[#10b981] hover:bg-emerald-700 text-white p-5 rounded-full shadow-xl transition duration-300 focus:outline-none transform hover:scale-105 animate-pulse-bubble">
        <i class="fas fa-comment-dots text-2xl"></i>
        {{-- Opcional: Indicador de nuevo mensaje --}}
        {{-- <span class="absolute top-0 right-0 block h-3 w-3 rounded-full ring-2 ring-white bg-red-500"></span> --}}
    </button>

    {{-- Panel de chat expandible --}}
    <div x-show="open" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
        @click.away="open = false"
        class="fixed bottom-0 right-0 left-0 w-full h-full md:relative md:w-[28rem] md:h-auto md:mt-2 bg-white border border-gray-200 rounded-none md:rounded-2xl shadow-2xl flex flex-col overflow-hidden">
        {{-- Header del chat --}}
        <div class="bg-gradient-to-r from-[#10b981] to-emerald-700 text-white px-6 py-4 flex items-center justify-between shadow-md">
            <div class="flex items-center">
                {{-- Avatar del Bot en el Header --}}
                <img src="/assets/img/chatbot.png" alt="Bot Avatar"
                    class="w-12 h-12 rounded-full object-cover mr-3 border-2 border-white shadow-md bg-white" >
                <span class="font-semibold text-xl">Asistente Psicobot</span>
            </div>
            <button @click="open = false" class="text-white text-3xl hover:text-gray-100 transition-colors">
                <i class="fas fa-xmark"></i>
            </button>
        </div>

        {{-- Área de mensajes --}}
        <div class="p-4 sm:p-5 space-y-4 overflow-y-auto flex-1 bg-gray-100 max-h-[calc(100vh-180px)] md:max-h-[450px]" id="chatbot-messages">
            {{-- Mensaje guía inicial --}}
            <div x-show="messages.length === 0" x-transition:leave="transition ease-in duration-300 opacity-0"
                class="text-center text-gray-600 text-sm p-4 bg-white rounded-lg shadow-sm animate-fade-in-up">
                <i class="fas fa-info-circle text-lg text-[#10b981] mb-2"></i>
                <p class="font-medium">¡Hola! Soy Psicobot.</p>
                <p>Estoy aquí para ayudarte con tus dudas y brindarte apoyo en tu camino hacia el bienestar. Puedes preguntarme sobre salud mental, técnicas de relajación, o cualquier tema relacionado. ¡Comienza a escribir!</p>
            </div>
            {{-- Los mensajes se añadirán aquí dinámicamente --}}
        </div>

        {{-- Input y botón enviar --}}
        <form id="chatbot-form" class="flex items-center p-4 border-t border-gray-200 bg-white">
            <input type="text" id="chatbot-input"
                class="flex-1 px-4 py-2.5 text-base bg-gray-100 rounded-full focus:outline-none focus:ring-2 focus:ring-[#10b981] placeholder:text-gray-500 transition-all duration-200"
                placeholder="Escribe tu mensaje...">
            <button type="submit"
                class="ml-3 bg-[#10b981] hover:bg-emerald-700 text-white p-3.5 rounded-full transition duration-300 focus:outline-none transform hover:scale-105">
                <i class="fas fa-paper-plane text-lg"></i>
            </button>
        </form>
    </div>
</div>

<script>
    document.addEventListener("alpine:init", () => {
        // Alpine.js `messages` array is now managed directly by x-data on the root div
        const chatbotData = document.querySelector('[x-data="{ open: false, messages: [] }"]')._x_dataStack[0];
        
        const form = document.getElementById("chatbot-form");
        const input = document.getElementById("chatbot-input");
        const messagesContainer = document.getElementById("chatbot-messages");

        // URL del avatar del usuario logueado (usando Blade para PHP)
        const USER_AVATAR_URL = "{{ Auth::check() && Auth::user()->avatar ? asset(Auth::user()->avatar) : '/placeholder.svg?height=28&width=28' }}";
        // URL del avatar del bot
        const BOT_AVATAR_URL = "/assets/img/chatbot.png"; // Usando la ruta que ya tienes en el HTML

        form?.addEventListener("submit", async function (e) {
            e.preventDefault();
            const text = input.value.trim();
            if (!text) return;

            appendMessage(text, 'right'); // Mensaje del usuario
            chatbotData.messages.push({ role: 'user', content: text }); // Actualiza el array de Alpine
            input.value = '';

            const loader = appendMessage("Escribiendo...", 'left', true); // Mensaje de "Escribiendo..."
            try {
                const res = await fetch("{{ route('chatbot.ask') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name=csrf-token]').content
                    },
                    body: JSON.stringify({ messages: chatbotData.messages }) // Envía el array actualizado
                });
                const data = await res.json();
                messagesContainer.removeChild(loader); // Eliminar el loader
                appendMessage(data.reply, 'left'); // Respuesta del bot
                chatbotData.messages.push({ role: 'assistant', content: data.reply }); // Actualiza el array de Alpine
            } catch (err) {
                messagesContainer.removeChild(loader); // Eliminar el loader incluso en error
                appendMessage("Error al conectar con el asistente.", 'left');
            }
        });

        function appendMessage(text, align, isLoader = false) {
            const messageWrapper = document.createElement('div');
            messageWrapper.className = `flex ${align === 'right' ? 'justify-end' : 'justify-start'} mb-3 animate-fade-in-up`;

            if (!isLoader) { // Solo añadir avatar si no es un mensaje de carga
                const avatar = document.createElement('img');
                avatar.className = `w-7 h-7 rounded-full object-cover ${align === 'right' ? 'ml-2 order-2' : 'mr-2 order-1'} self-end shadow-sm`;
                avatar.src = align === 'right' ? USER_AVATAR_URL : BOT_AVATAR_URL;
                avatar.alt = align === 'right' ? 'User Avatar' : 'Bot Avatar';
                messageWrapper.appendChild(avatar);
            }

            const messageBubble = document.createElement('div');
            messageBubble.className = `relative max-w-[75%] px-4 py-2.5 rounded-xl shadow-md text-sm break-words ${
                align === 'right'
                    ? 'bg-[#d1fae5] text-gray-800 rounded-br-none' // Mensaje del usuario (verde claro)
                    : 'bg-white text-gray-800 rounded-bl-none' // Mensaje del bot (blanco)
            } ${isLoader ? 'italic text-gray-500 flex items-center' : ''}`; // Estilo para el loader

            if (isLoader) {
                messageBubble.innerHTML = `<span>${text}</span><span class="typing-dot"></span><span class="typing-dot"></span><span class="typing-dot"></span>`;
            } else {
                messageBubble.textContent = text;
            }
            
            messageWrapper.appendChild(messageBubble);
            messagesContainer.appendChild(messageWrapper);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
            return messageWrapper; // Retornar el wrapper para poder eliminar el loader
        }
    });
</script>
