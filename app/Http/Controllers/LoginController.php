<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Title of the webpage
     * 
     * @var string
     */
    protected $title = 'Super Manager - Login';

    /**
     * Webpage name for backend purposes
     * 
     * @var string
     */
    protected $action_page = 'site.login';

    /**
     * POST login form rules
     * 
     * @var array
     */
    protected $rules = array(
        'user' => 'required|email',
        'pswd' => 'required'
    );

    /**
     * POST login form feedback for rules
     * 
     * @var array
     */
    protected $feedback = array(
        'user.email'    => "Must insert a valid email",
        'required'      => "Field :attribute is required",
    );

    /**
     * index route
     */
    public function index(Request $request)
    {
        $error = $this->assert_error_string($request->get('error'));

        return view('site.login', [
            'title'       => $this->title,
            'action_page' => $this->action_page,
            'error'       => $error
        ]);
    }

    /**
     * login route
     */
    public function login(Request $request)
    {
        $request->validate($this->rules, $this->feedback);

        $email = $request->get('user');
        $password = $request->get('pswd');

        $user = User::where('email', $email)->where('password', $password)->get()->first();

        if (isset($user->name)) {
            $this->start_a_session($user->name, $user->email);
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['error' => 1]);
        }
    }

    /**
     * logout route
     */
    public function logout(Request $request)
    {
        session_destroy();
        return redirect()->route('site.index');
    }

    /**
     * session start function
     */
    private function start_a_session(string $name, string $email)
    {
        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
    }

    /**
     * Assert the variable error string
     */
    private function assert_error_string($err_num)
    {
        switch ($err_num) {
            case 1:
                return "User email or password doesn't exists";
            case 2:
                return "User need to be logged to access the page";
            default:
                return '';
        }
    }
}
