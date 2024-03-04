<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Http\Requests\Api\StoreApiRequest;
use App\Http\Requests\Api\UpdateApiRequest;
use Illuminate\Http\Request;

class ApiController extends RestApiController
{
    public function __construct()
    {
        $this->model = new Api();
        $this->store_request = new StoreApiRequest;
        $this->update_request = new UpdateApiRequest;
    }

    /**
     * Index
     * @OA\Get (
     *     path="/api/apis",
     *     tags={"Apis"},
     *     security={{"bearer_token": {}}},
     *     @OA\Parameter(
     *          name="filter",
     *          in="query",
     *          @OA\Schema(
     *              type="object",
     *              example={
     *                 "filter[id]":null,
     *                 "filter[name]":null,
     *                 "filter[url]":null,
     *                 "filter[price]":null,
     *                 "filter[query]":null,
     *                 "filter[method]":null,
     *                 "filter[created_at]":null,
     *                 "filter[updated_at]":null,
     *               }
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="sort",
     *          in="query",
     *          example="id",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="page",
     *          in="query",
     *          example="1",
     *          @OA\Schema(
     *              type="number"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          example="20",
     *          @OA\Schema(
     *              type="number",
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="data", type="object",
     *                  ref="#/components/schemas/ApiSchema"
     *              ),
     *          )
     *      ),
     * )
     */
    public function index(Request $request)
    {
        return parent::index($request);
    }

    /**
     * Store
     * @OA\Post (
     *     path="/api/apis",
     *     tags={"Apis"},
     *     security={{"bearer_token": {}}},
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  required={"url"},
     *                  @OA\Property(
     *                      property="data",
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="url",
     *                          type="string"
     *                      ),                 
     *                      @OA\Property(
     *                          property="query",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="method",
     *                          type="enum",
     *                          enum={"GET", "POST", "PUT", "PATCH", "DELETE"}
     *                      ),
     *                 ),
     *                 example={
     *                     "name":"Получение продуктов",
     *                     "url":"http://92.63.179.235:81/api/products",
     *                     "query": "?limit=20&sort=-id",
     *                     "method": "GET",
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="data", type="object",
     *                  ref="#/components/schemas/ApiSchema"
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Validation error",
     *          @OA\JsonContent(
     *                  @OA\Property(property="message", type="string", example="The url field is required. (and 1 more errors)"),
     *                  @OA\Property(property="errors", type="object",
     *                      @OA\Property(property="url", type="array", collectionFormat="multi",
     *                        @OA\Items(
     *                          type="string",
     *                          example="The url field is required.",
     *                          )
     *                      ),
     *                  ),
     *          )
     *      )
     * )
     */
    public function store(Request $request)
    {
        return parent::store($request);
    }

    /**
     * Show
     * @OA\Get (
     *     path="/api/apis/{id}",
     *     tags={"Apis"},
     *      @OA\Parameter( 
     *          name="id",
     *          in="path",
     *          required=true,
     *          example="1",
     *          @OA\Schema(
     *              type="number"
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="data", type="object",
     *                  ref="#/components/schemas/ApiSchema"
     *              ),
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Validation error",
     *          @OA\JsonContent(
     *                  @OA\Property(property="message", type="string", example="Not found"),
     *                  ),
     *          )
     *      )
     * )
     */
    public function show(Request $request, int $id)
    {
        return parent::show($request, $id);
    }

    /**
     * Update
     * @OA\Patch (
     *     path="/api/apis/{id}",
     *     tags={"Apis"},
     *     security={{"bearer_token": {}}},
     *     @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                  required={"url"},
     *                  @OA\Property(
     *                      property="data",
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="url",
     *                          type="string"
     *                      ),                 
     *                      @OA\Property(
     *                          property="query",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="method",
     *                          type="enum",
     *                          enum={"GET", "POST", "PUT", "PATCH", "DELETE"}
     *                      ),
     *                 ),
     *                 example={
     *                     "name":"Получение продуктов",
     *                     "url":"http://92.63.179.235:81/api/products",
     *                     "query": "?limit=20&sort=-id",
     *                     "method": "GET",
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="data", type="object",
     *                  ref="#/components/schemas/ApiSchema"
     *              ),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Validation error",
     *          @OA\JsonContent(
     *                  @OA\Property(property="message", type="string", example="The url field is required. (and 1 more errors)"),
     *                  @OA\Property(property="errors", type="object",
     *                      @OA\Property(property="url", type="array", collectionFormat="multi",
     *                        @OA\Items(
     *                          type="string",
     *                          example="The url field is required.",
     *                          )
     *                      ),
     *                  ),
     *          )
     *      )
     * )
     */
    public function update(Request $request, int $id)
    {
        return parent::update($request, $id);
    }

    /**
     * Delete
     * @OA\Delete (
     *     path="/api/apis/{id}",
     *     tags={"Apis"},
     *     security={{"bearer_token": {}}},
     *     @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Deleted"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Access error",
     *          @OA\JsonContent(
     *                  @OA\Property(property="message", type="string", example="No access"),
     *                 ),
     *          )
     *      )
     * )
     */
    public function destroy(int $id)
    {
        return parent::destroy($id);
    }
}
