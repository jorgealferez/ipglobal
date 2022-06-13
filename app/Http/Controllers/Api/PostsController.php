<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/posts/get/{id}",
     *     summary="Obtener una publicación",
     *     tags={"Posts"},
     *     @OA\Response(
     *         response=200,
     *         description="Obtener una publicación.",
     *         @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example="true"),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Post"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Publicación no encontrada",
     *         @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example="false"),
     *              @OA\Property(property="message", type="string", example="Post not found"),
     *         )
     *     )
     * )
     */
    public function get($id){
        $post = Post::where('id','=',$id)->with('user')->first();
        if ($post){
            return response()->json(['success' => true, 'data' => $post]);
        } else {
            return response()->json(['success' => false, 'message' => 'Post not found'], 404);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/posts/store",
     *     summary="Guardar publicación",
     *     tags={"Posts"},
     *     @OA\RequestBody(
     *       @OA\JsonContent(
     *          allOf={
     *                    @OA\Schema(ref="#/components/schemas/Post"),
     *               }
     *          )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Publicación grabada correctamente",
     *         @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example="true"),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/Post"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Publicación no válida",
     *         @OA\JsonContent(
     *              @OA\Property(property="success", type="bool", example="false"),
     *              @OA\Property(property="message", type="string", example="There has some errors while creating post"),
     *         )
     *     )
     * )
     */
    public function store(StorePostRequest $request){
        $post = Post::create($request->validated());
        if ($post){
            return response()->json(['success' => true, 'data' => $post], 201);
        } else {
            return response()->json(['success' => false, 'message' => 'There has some errors while creating post'], 422);
        }
    }
}
