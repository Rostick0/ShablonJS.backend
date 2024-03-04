<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use App\Http\Requests\Layout\StoreLayoutRequest;
use App\Http\Requests\Layout\UpdateLayoutRequest;
use Illuminate\Http\Request;

class LayoutController extends RestApiController
{
    public function __construct()
    {
        $this->model = new Layout();
        $this->store_request = new StoreLayoutRequest;
        $this->update_request = new UpdateLayoutRequest;
    }

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
