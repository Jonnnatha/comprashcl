<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function autent()
    {
        // Verifique se o usuário está autenticado
        if (auth()->check()) {
            // Agora é seguro acessar as propriedades do usuário
            if (auth()->user()->level == 'adm') {
                return redirect('/dashboard-admin');
            } elseif (auth()->user()->level == 'solicitante') {
                return redirect('/dashboard-solicitante');
            } elseif (auth()->user()->level == 'compras') {
                return redirect('/dashboard-compras');
            }
        } else {
            // Se o usuário não estiver autenticado, faça logout por segurança e redirecione para a tela de login
            Auth::logout();
            return view('index'); // Garanta que 'login' é o caminho correto para sua view de login
        }
    }

    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validação manual dos campos. Ajuste conforme necessário.
        $credentials = $request->validate([
            'nome' => ['required'],
            'senha' => ['required'],
        ]);

        // Tenta autenticar usando os campos personalizados.
        // Note que 'password' é o nome da coluna esperado por padrão pelo Laravel.
        if (Auth::attempt(['nome' => $request->nome, 'password' => $request->senha], $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // Se a autenticação falhar, redireciona de volta com um erro.
        return back()->withErrors([
            'nome' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
