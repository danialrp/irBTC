<?php

namespace App\Http\Controllers\Auth;

use App\MyClasses\ThrottleClass;
use App\MyClasses\UserClass;
use App\Providers\JDateServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    protected $redirectPath = '/profile';
    /**
     * @var UserClass
     */
    private $userClass;
    /**
     * @var ThrottleClass
     */
    private $throttleClass;
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(UserClass $userClass, ThrottleClass $throttleClass)
    {
        $this->middleware('guest', ['except' => 'getLogout']);
        $this->userClass = $userClass;
        $this->throttleClass = $throttleClass;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:60|unique:users',
            'password' => array('required', 'confirmed', 'min:8', 'regex:/^\S*(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/'),
            'nname' => array('required','max:60','unique:users','regex:/^[a-zA-Z0-9_@.-]*$/')
        ]);
    }

    /**
     * OverRide to RegisterUsers Trait > postRegister
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postRegister(Request $request)
    {
        if ($this->throttleClass->checkLocked($request->ip(), $request->email) == false) {
            return redirect('/auth/register')
                ->withErrors([
                    'email' => 'دسترسی شما به دلایل امنیتی به مدت ۱ دقیقه مسدود گردید!'
                ]);
            dd($request);
        } else {
            $validator = $this->validator($request->all());

            if ($validator->fails()) {
                $this->throwValidationException(
                    $request, $validator
                );
            }

            $this->throttleClass->setThrottleStatus($request->ip(), 1);
            Auth::login($this->create($request->all()));
            return redirect($this->redirectPath());
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'nname' => $data['nname'],
                'created_fa' => JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true),
                'login_time' => JDateServiceProvider::date('Y-m-d H:i:s', time(), false, true),
            ]);
            $this->userClass->makeBalance($user->id);
            return $user;
    }

    public function Authenticate(Request $request)
    {
        if ($this->throttleClass->checkLocked($request->ip(), $request->email) == false) {
            return redirect('/')
                ->withErrors([
                    'email' => 'دسترسی شما به دلایل امنیتی به مدت ۱ دقیقه مسدود گردید!'
                ]);
            dd($request);
        } else {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt(['email' => $request['email'], 'password' => $request['password'], 'active' => 1])) {
                $this->userClass->setLoginFootage(Auth::user()->id, $request->ip());
                $this->throttleClass->setThrottleStatus($request->ip(), 1);
                return redirect()->intended('/');
            } else {
                return redirect('/')
                    ->withInput($request->only('email'))
                    ->withErrors([
                        'email' => 'اطلاعات وارد شده صحیح نمی باشد!',
                    ]);
            }
        }
    }
}
