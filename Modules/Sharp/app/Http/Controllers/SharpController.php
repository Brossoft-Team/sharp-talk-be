<?php

namespace Modules\Sharp\app\Http\Controllers;

use App\Core\Controllers\ApiController;
use Illuminate\Support\Facades\Request;
use Modules\Sharp\app\Http\Requests\SharpStoreRequest;
use Modules\Sharp\app\Models\Sharp;

class SharpController extends ApiController
{
    public function store(SharpStoreRequest $request)
    {
        $sharp = Sharp::create(array_merge($request->validated(),["user_id"=>auth()->user()->id]));
        if($request->hasAny("attachments")){
            foreach ($request->attachments as $attachment){
                $sharp->addMedia($attachment)
                    ->toMediaCollection("sharp");
            }

        }
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

    public function delete(Request $request, Sharp $sharp)
    {
        $sharp->delete();
        return $this->successResponse(null,200);
    }
}
