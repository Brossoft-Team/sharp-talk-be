<?php

namespace Modules\Sharp\app\Http\Controllers;

use App\Core\Controllers\ApiController;
use Illuminate\Http\Request;
use Modules\Sharp\app\Http\Requests\Judgment\JudgmentStoreRequest;
use Modules\Sharp\app\Models\Judgment;
use Modules\Sharp\app\Models\Sharp;
use Modules\Sharp\app\Transformers\JudgmentResource;

class JudgmentController extends ApiController
{
    public function get(Sharp $sharp)
    {
        return JudgmentResource::collection($sharp->judgments()->with(["user"])->withCount("judgments")->inRandomOrder('1234')->paginate());
    }

    public function getOne(Sharp $sharp, Judgment $judgment)
    {
        return JudgmentResource::make($judgment->load(["user","judgments"])->loadCount("judgments"))->additional(["sharp" => $sharp]);
    }

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
