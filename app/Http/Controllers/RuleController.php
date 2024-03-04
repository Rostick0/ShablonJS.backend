<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Http\Requests\Rule\StoreRuleRequest;
use App\Http\Requests\Rule\UpdateRuleRequest;
use Illuminate\Http\Request;

class RuleController extends RestApiController
{
    public function __construct()
    {
        $this->model = new Rule();
        $this->store_request = new StoreRuleRequest;
        $this->update_request = new UpdateRuleRequest;
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
