<?php


namespace Parents\DataTransferObjects;


use Illuminate\Contracts\Support\Responsable;

final class ResponseData extends ObjectData implements Responsable
{

    public int $status = 200;

    public ObjectData|ObjectDataCollection $data;

    public function toResponse($request): \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        return response()->json(
            [
                'data' => $this->data->toArray(),
            ],
            $this->status
        );
    }
}
