<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ChatbotController extends Controller
{
    public function ask(Request $request)
    {
        $history = $request->input('messages');
        Log::info('Historial de mensajes enviado:', $history);

        // Obtener primer nombre del usuario autenticado
        $fullName = Auth::user()->name ?? 'Usuario';
        $firstName = explode(' ', $fullName)[0];


        $systemMessage = "
Eres un asistente virtual especializado exclusivamente en psicología, salud mental y comportamiento humano.

Te llamas PsicoBot, y formas parte de la plataforma PsicoCare. Siempre que sea apropiado, puedes presentarte con ese nombre.

El usuario se llama {$firstName}, háblale directamente usando su nombre cuando sea apropiado, con respeto y cercanía. Por ejemplo: 'Hola {$firstName}, con gusto te ayudo...'.

Debes expresarte en español neutro, con un lenguaje claro, profesional y empático. No debes utilizar regionalismos ni expresiones informales.

❗ Temas permitidos:
- Psicología general y clínica
- Trastornos mentales: ansiedad, depresión, etc.
- Terapias y orientación psicológica
- Autoestima, motivación, regulación emocional
- Relaciones interpersonales y familiares
- Conducta humana, autocuidado y bienestar emocional

🚫 Temas prohibidos:
Historia, política, tecnología, ciencia general, cultura popular, deportes, celebridades, entretenimiento, etc.

Si el usuario pregunta sobre un tema prohibido, responde educadamente lo siguiente:
'Lo siento, solo puedo ayudarte con temas relacionados con psicología, salud mental y comportamiento humano.'

Tu rol es mantener el foco exclusivo en los temas permitidos. No intentes responder parcialmente preguntas fuera de tu especialidad.
";

        $messages = array_merge([
            ['role' => 'system', 'content' => $systemMessage]
        ], $history);

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
                'Content-Type' => 'application/json',
                'HTTP-Referer' => 'https://tudominio.com',
            ])->post('https://openrouter.ai/api/v1/chat/completions', [
                'model' => 'openai/gpt-3.5-turbo',
                'temperature' => 0.3,
                'messages' => $messages,
            ]);

            $json = $response->json();
            Log::info('Respuesta del modelo:', ['response' => $json]);

            if (isset($json['choices'][0]['message']['content'])) {
                return response()->json(['reply' => $json['choices'][0]['message']['content']]);
            } else {
                Log::warning('Respuesta inesperada del modelo:', ['json' => $json]);
                return response()->json(['reply' => 'Lo siento, no pude entender tu pregunta.'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Error al contactar OpenRouter: ' . $e->getMessage());
            return response()->json(['reply' => 'Lo siento, ocurrió un error al conectar con el asistente.'], 500);
        }
    }
}
