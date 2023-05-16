<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use SheetDB\SheetDB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'phone' => $request->phone,
                'visible' => $request->visible,
                'password' => Hash::make($request->password),
            ],
        )->givePermissionTo('ponto_coleta');
        //Para futura implementação para todas as pessoas se cadastrarem])->givePermissionTo($request->user_type);


        event(new Registered($user));

        Auth::login($user);

        $sheetdb = new SheetDB('5nql68xhnf7ee');
        $sheetdb->create(['NOME' => $request->name, 'ENDEREÇO' => $request->address, 'TELEFONE' => $request->phone]);

        return redirect(RouteServiceProvider::HOME);
    }
}
