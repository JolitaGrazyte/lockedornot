<?php


namespace App\Http\Controllers;

//    use Illuminate\Http\Request;
    use App\Http\Requests;
    use JWTAuth;
    use Tymon\JWTAuth\Exceptions\JWTException;
    use App\User;


class AuthenticateController extends Controller
{

    /**
     * AuthenticateController constructor.
     */
    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth', ['except' => ['authenticate']]);

    }

    /**
     * @return mixed
     */
    public function register(){
        $credentials = Input::only('email', 'password');

        try {
            $user = User::create($credentials);
        } catch (Exception $e) {
            return Response::json(['error' => 'User already exists.'], HttpResponse::HTTP_CONFLICT);
        }

        $token = JWTAuth::fromUser($user);

        return Response::json(compact('token'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {

        $credentials = $request->only('email', 'password');

        try {
            // verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }


        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }
}