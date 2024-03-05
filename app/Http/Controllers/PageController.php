<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Http\Requests\Page\StorePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use Illuminate\Http\Request;

class PageController extends RestApiController
{
    public function __construct()
    {
        $this->model = new Page();
        $this->store_request = new StorePageRequest;
        $this->update_request = new UpdatePageRequest;
    }

    /**
     * Index
     * @OA\Get (
     *     path="/api/pages",
     *     tags={"Pages"},
     *     security={{"bearer_token": {}}},
     *     @OA\Parameter(
     *          name="filter",
     *          in="query",
     *          @OA\Schema(
     *              type="object",
     *              example={
     *                 "filter[id]":null,
     *                 "filter[name]":null,
     *                 "filter[code]":null,
     *                 "filter[layout_id]":null,
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
     *      @OA\Parameter(
     *          name="extends",
     *          in="query",
     *          example="layout",
     *          @OA\Schema(
     *              type="string",
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="data", type="object",
     *                  ref="#/components/schemas/PageSchema"
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
     *     path="/api/pages",
     *     tags={"Pages"},
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
     *                          property="code",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="type",
     *                          type="enum",
     *                          enum={"index", "create", "edit", "show", "other"}
     *                      ),
     *                      @OA\Property(
     *                          property="layout_id",
     *                          type="number"
     *                      ),                   
     *                 ),
     *                 example={
     *                     "name":"Админка админки",
     *                     "code":"code page",
     *                     "type":"index",
     *                     "layout_id":1,
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="data", type="object",
     *                  ref="#/components/schemas/PageSchema"
     *              ),
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
    public function store(Request $request)
    {
        return parent::store($request);
    }

    /**
     * Show
     * @OA\Get (
     *     path="/api/pages/{id}",
     *     tags={"Pages"},
     *      @OA\Parameter( 
     *          name="id",
     *          in="path",
     *          required=true,
     *          example="1",
     *          @OA\Schema(
     *              type="number"
     *          ),
     *      ),
     *      @OA\Parameter(
     *          name="extends",
     *          in="query",
     *          example="layout",
     *          @OA\Schema(
     *              type="string",
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="data", type="object",
     *                  ref="#/components/schemas/PageSchema"
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
     *     path="/api/pages/{id}",
     *     tags={"Pages"},
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
     *                  @OA\Property(
     *                      property="data",
     *                      type="object",
     *                      @OA\Property(
     *                          property="name",
     *                          type="string"
     *                      ),
     *                      @OA\Property(
     *                          property="code",
     *                          type="string"
     *                      ),       
     *                      @OA\Property(
     *                          property="type",
     *                          type="enum",
     *                          enum={"index", "create", "edit", "show", "other"}
     *                      ),
     *                      @OA\Property(
     *                          property="layout_id",
     *                          type="number"
     *                      ),          
     *                 ),
     *                 example={
     *                     "name":"Админка админки",
     *                     "code":"code page",
     *                     "type":"index",
     *                     "layout_id": 1,
     *                }
     *             )
     *         )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="data", type="object",
     *                  ref="#/components/schemas/PageSchema"
     *              ),
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
    public function update(Request $request, int $id)
    {
        return parent::update($request, $id);
    }

    /**
     * Delete
     * @OA\Delete (
     *     path="/api/pages/{id}",
     *     tags={"Pages"},
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
