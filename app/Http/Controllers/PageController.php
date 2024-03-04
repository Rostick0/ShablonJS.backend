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
