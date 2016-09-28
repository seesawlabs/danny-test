<?php

namespace App\Http\Controllers\Auth;

use App\Dal\Contracts\IUserRepository;
use App\Http\Controllers\Controller;

use Validator;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    private $userRepository;

    protected $redirectTo = '/';

    public function __construct(IUserRepository $userRepository)
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $this->userRepository = $userRepository;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return $this->userRepository->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
