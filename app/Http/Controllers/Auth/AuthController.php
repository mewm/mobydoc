<?php namespace Mobydoc\Http\Controllers\Auth;

use Illuminate\Contracts\Auth\Authenticator;

use Mobydoc\Http\Requests\Auth\LoginRequest;
use Mobydoc\Http\Requests\Auth\RegisterRequest;

/**
 * @Middleware("csrf")
 * @Middleware("guest", except={"logout"})
 */
class AuthController {

	/**
	 * The authenticator implementation.
	 *
	 * @var Authenticator
	 */
	protected $auth;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  Authenticator  $auth
	 * @return void
	 */
	public function __construct(Authenticator $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Show the application registration form.
	 *
	 * @Get("auth/register")
	 *
	 * @return Response
	 */
	public function showRegistrationForm()
	{
		return view('auth.register');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @Post("auth/register")
	 *
	 * @param  RegisterRequest  $request
	 * @return Response
	 */
	public function register(RegisterRequest $request)
	{
		// Registration form is valid, create user...

		$this->auth->login($user);

		return redirect('/');
	}

	/**
	 * Show the application login form.
	 *
	 * @Get("auth/login")
	 *
	 * @return Response
	 */
	public function showLoginForm()
	{
		return view('auth.login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @Post("auth/login")
	 *
	 * @param  LoginRequest  $request
	 * @return Response
	 */
	public function login(LoginRequest $request)
	{
		if ($this->auth->attempt($request->only('email', 'password')))
		{
			return redirect('/');
		}

		return redirect('/login')->withErrors([
			'email' => 'The credentials you entered did not match our records. Try again?',
		]);
	}

	/**
	 * Log the user out of the application.
	 *
	 * @Get("auth/logout")
	 *
	 * @return Response
	 */
	public function logout()
	{
		$this->auth->logout();

		return redirect('/');
	}

}
