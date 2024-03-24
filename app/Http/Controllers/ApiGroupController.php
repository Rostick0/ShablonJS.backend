<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiGroup\StoreApiGroupRequest;
use Illuminate\Http\Request;

class ApiGroupController extends Controller
{
    /**
     * Store
     * @OA\Post (
     *     path="/api/api-group",
     *     tags={"ApiGroup"},
     *     security={{"bearer_token": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  @OA\Property(
     *                      property="data",
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="api",
     *                          type="string"
     *                      ),
     *                 ),
     *                 example={
     *                     "name":"test",
     *                     "api":"test",
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="data", type="file", format="binary"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Validation error",
     *          @OA\JsonContent(
     *                  @OA\Property(property="message", type="string", example="The name max length 255 charsets (and 1 more errors)"),
     *                  @OA\Property(property="errors", type="object",
     *                      @OA\Property(property="name", type="array", collectionFormat="multi",
     *                        @OA\Items(
     *                          type="string",
     *                          example="The name max length 255 charsets",
     *                          )
     *                      ),
     *                  ),
     *          )
     *      )
     * )
     */
    public function store(StoreApiGroupRequest $request)
    {
        $folder = 'storage/apis';

        if (!(file_exists($folder) || is_dir($folder))) mkdir('storage\apis');

        $name = $request->name;
        $fileName = $name . '.js';
        $filePath = storage_path('apis/' . $fileName);

        $stub = 'import useFetcher from "../utils/fetch";

const ' . $request->api . ' = {
    get: async ({ id, params }) => useFetcher().get(`/' . $request->api . '/${id}`, params),
    delete: async ({ id, params }) =>
        useFetcher().delete(`/' . $request->api . '/${id}`, params),
    update: async ({ id, data, params }) =>
        useFetcher().patch(`/' . $request->api . '/${id}`, data, params),
    getAll: async ({ params }) => useFetcher().get(`/' . $request->api . '`, params),
    create: async ({ data }) => useFetcher().post(`/' . $request->api . '`, data),
};

export default ' . $request->api . ';';

        file_put_contents($filePath, $stub);

        return response()->download($filePath);
    }
}
