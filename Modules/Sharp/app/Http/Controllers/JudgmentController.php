<?php

namespace Modules\Sharp\app\Http\Controllers;

use App\Core\Controllers\ApiController;
use Illuminate\Http\Request;
use Modules\Sharp\app\Http\Requests\Judgment\JudgmentStoreRequest;
use Modules\Sharp\app\Models\Judgment;
use Modules\Sharp\app\Models\Sharp;

class JudgmentController extends ApiController
{

    public function store(JudgmentStoreRequest $request, Sharp $sharp)
    {
        $judgment = Judgment::create(array_merge($request->validated(),["user_id"=>auth()->user()->id,
            "sharp_id" => $sharp->id]));
        return $this->successResponse(null
            ,201);
    }

    /*    public function edit(Sharp $sharp)
        {
            return $this->successResponse($sharp,200);
        }

        public function update(SharpUpdateRequest $request, Sharp $sharp)
        {
            $sharp->update($request->validated());
            return $this->successResponse($sharp,200);
        }*/

    public function delete(Request $request, Sharp $sharp, Judgment $judgment)
    {
        $judgment->delete();
        return $this->successResponse(null,200);
    }
}
