<?php

namespace App\Http\Controllers;

use App\Models\Mask;
use App\Http\Requests\Mask\StoreMaskRequest;
use App\Http\Requests\Mask\UpdateMaskRequest;
use Illuminate\Http\Request;

class MaskController extends RestApiController
{
    public function __construct()
    {
        $this->model = new Mask();
        $this->store_request = new StoreMaskRequest;
        $this->update_request = new UpdateMaskRequest;
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
