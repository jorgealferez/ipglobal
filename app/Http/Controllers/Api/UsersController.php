<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
class UsersController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/users/get/{id}",
     *     summary="Obtener usuario",
     *     tags={"Users"},
     *     @OA\Response(
     *         response=200,
     *         description="Obtener usuario.",
     *         @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example="true"),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/User"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuario no encontrado",
     *         @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example="false"),
     *              @OA\Property(property="message", type="string", example="User not found"),
     *         )
     *     )
     * )
     */
    public function get($id){
        $user = User::find($id);
        if ($user){
            return response()->json(['success' => true, 'data' => $user]);
        } else {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/users/store",
     *     summary="Guardar usuario",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *       @OA\JsonContent(
     *          allOf={
     *                    @OA\Schema(ref="#/components/schemas/User"),
     *               }
     *          )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Usuario grabado correctamente",
     *         @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example="true"),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/User"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Usuario no válido",
     *         @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example="false"),
     *              @OA\Property(property="message", type="string", example="There has some errors while creating user"),
     *         )
     *     )
     * )
     */
    public function store(StoreUserRequest $request){
        $user = User::create($request->validated());
        if ($user){
            return response()->json(['success' => true, 'data' => $user], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'There has some errors while creating user'], 422);
        }
    }
}
