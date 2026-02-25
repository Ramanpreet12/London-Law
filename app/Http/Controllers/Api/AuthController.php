<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ApiResponse;

    /**
     * Handle User Registration
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firm_name'      => 'required|string|max:255',
            'contact_name'   => 'required|string|max:255',
            'contact_email'  => 'required|email|max:255',
            'post_code'      => 'required|string|max:20',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'country'        => 'required|string|max:100',
            'town'           => 'required|string|max:100',
            'telephone'      => 'required|string|max:20',
            'email'          => 'required|string|email|max:255|unique:users',
            'password'       => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        $user = User::create([
            'firm_name'      => $request->firm_name,
            'contact_name'   => $request->contact_name,
            'contact_email'  => $request->contact_email,
            'post_code'      => $request->post_code,
            'address_line_1' => $request->address_line_1,
            'address_line_2' => $request->address_line_2,
            'country'        => $request->country,
            'town'           => $request->town,
            'telephone'      => $request->telephone,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'role'           => User::ROLE_USER,
        ]);

        // Generate JWT Token so user is logged in immediately after signup
        // $token = auth('api')->login($user);

        return $this->successResponse([
            'user'          => $user,
            // 'access_token'  => $token,
            // 'token_type'    => 'bearer',
            // 'expires_in'    => auth('api')->factory()->getTTL() * 60
        ], 'Registration Successful', 201); // 201 Created
    }

    /**
     * Handle User Login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->validationErrorResponse($validator->errors());
        }

        $credentials = $request->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {
            return $this->errorResponse('Invalid credentials. Please try again.', 401);
        }

        return $this->successResponse([
            'user'         => auth('api')->user(),
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth('api')->factory()->getTTL() * 60
        ], 'Login successful!');
    }

    /**
     * Handle Logout
     */
    public function logout()
    {
        auth('api')->logout();
        return $this->successResponse(null, 'Logged out successfully');
    }
}