<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\UserTaskResource;
use App\Models\User;
use App\Traits\apiResponseBuilder;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    use apiResponseBuilder;

    /**
     * @param User $user
     * @return JsonResponse
     */
    public function get_profile(User $user): JsonResponse
    {
        return $this -> successResponse(new UserResource($user), true, '', Response::HTTP_OK );
    }
}
