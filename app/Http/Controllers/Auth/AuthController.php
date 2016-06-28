<?php

namespace App\Http\Controllers\Auth;

use App\Model\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
//    protected $redirectTo = '/';
    protected $redirectTo = '/backend';

    protected $guard = 'user'; // 需要用到的 guard
    protected $loginView = 'auth.index'; // admin.login 登录视图
    protected $registerView = 'auth.register'; // admin.register 注册视图
    protected $username = 'email'; // 需要验证的字段
    protected $redirectAfterLogout = '/'; // 登出后重定向的路由

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware($this->guestMiddleware(), [ 'except' => 'logout' ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator( array $data ) {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
//            'password' => 'required|min:6|confirmed',
            'captcha'  => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     *
     * @return User
     */
    protected function create( array $data ) {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * 重写登录请求,添加对ajax的支持
     *
     * @param Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function login( Request $request ) {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ( $throttles && $lockedOut = $this->hasTooManyLoginAttempts($request) ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->getCredentials($request);

        // 如果是 ajax 的请求
        if ( $request->ajax() ) {
            if ( Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember')) ) {
                if ( $throttles ) {
                    $this->clearLoginAttempts($request);
                }

                return response()->json([ 'redirectPath' => $this->redirectPath() ], 200);
            }

            // If the login attempt was unsuccessful we will increment the number of attempts
            // to login and redirect the user back to the login form. Of course, when this
            // user surpasses their maximum number of attempts they will get locked out.
            if ( $throttles && !$lockedOut ) {
                $this->incrementLoginAttempts($request);
            }

            return response()->json($this->getLoginFailedMessage($credentials), 422);
        }

        // 不是 ajax 请求 , 表单 post 请求
        if ( Auth::guard($this->getGuard())->attempt($credentials, $request->has('remember')) ) {
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        if ( $throttles && !$lockedOut ) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }


    /**
     * 获取登录错误信息
     *
     * @return array
     */
    protected function getLoginFailedMessage( $credentials ) {
        $re_array = [ ];

        $user = User::where('email', $credentials['email'])->first();

        if ( empty( $user ) ) {
            $re_array['email'] = '此邮箱未注册';

            return $re_array;
        }

        $re_array['password'] = '密码输入有误';

        return $re_array;
    }

    /**
     * 重写注册请求
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function register( Request $request ) {
        $validator = $this->validator($request->all());

        if ( $validator->fails() ) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::guard($this->getGuard())->login($this->create($request->all()));

        if ( $request->ajax() ) return response()->json([ 'redirectPath' => $this->redirectPath() ], 200);
        else return redirect($this->redirectPath());
    }

}
