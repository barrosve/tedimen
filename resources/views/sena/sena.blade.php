<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Sena AI
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div id="chat-container" class="textarea">
                        <!-- Aquí se mostrarán las preguntas y respuestas -->
                    <div id="barra" class="ml-2 hidden">
                        <img src="./img/barra.gif" height="40">
                    </div>
                    </div>
                    <div class="input-group mt-4">
                        <textarea id="input-question" class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50" placeholder="{{ __('What\'s on your mind?') }}"></textarea>
                        <button id="submit-button" class="submit-button ml-2">
                            <img src="./img/arrow-button.png" height="40">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            const inputQuestion = $('#input-question');
            const chatContainer = $('#chat-container');
            const barra = $('#barra');

            function addMessageToChat(message, isUser = false) {
                const messageElement = $('<p></p>');
                messageElement.text(isUser ? `Tu: ${message}` : `Sena: ${message}`);
                chatContainer.append(messageElement);
                chatContainer.scrollTop(chatContainer[0].scrollHeight);
            }

            function sendQuestion(question) {
                if (!question.trim()) {
                    alert('Ingresa una pregunta antes de enviarla.');
                    return;
                }

                addMessageToChat(question, true);
                inputQuestion.val(''); // Limpiar el contenido del textarea
                barra.show();

                $.ajax({
                    type: "POST",
                    url: "apps.php",
                    data: {
                        mensaje: question
                    },
                    success: function(respuesta) {
                        barra.hide();
                        addMessageToChat(respuesta);
                    }
                });
            }

            inputQuestion.keypress(function(event) {
                if (event.keyCode === 13) {
                    event.preventDefault();
                    sendQuestion(inputQuestion.val());
                }
            });

            $('#submit-button').click(function() {
                sendQuestion(inputQuestion.val());
            });
        });
    </script>
</x-app-layout>
