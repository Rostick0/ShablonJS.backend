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
     *                 "filter[title]":null,
     *                 "filter[description]":null,
     *                 "filter[price]":null,
     *                 "filter[old_price]":null,
     *                 "filter[count]":null,
     *                 "filter[is_infinitely]":null,
     *                 "filter[raiting]":null,
     *                 "filter[user_id]":null,
     *                 "filter[category_id]":null,
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
     *          example="images,user,category",
     *          @OA\Schema(
     *              type="string",
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

    public function store(Request $request)
    {
        return parent::store($request);
    }

    public function show(Request $request, int $id)
    {
        return parent::show($request, $id);
    }

    public function update(Request $request, int $id)
    {
        return parent::update($request, $id);
    }

    public function destroy(int $id)
    {
        return parent::destroy($id);
    }
}
