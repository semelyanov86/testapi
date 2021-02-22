<?php


namespace Parents\DataTransferObjects;


use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ResponsePaginationData extends ObjectData implements Responsable
{
    public LengthAwarePaginator $paginator;

    public ObjectDataCollection $collection;

    public int $status = 200;

    public function toResponse($request): \Illuminate\Http\JsonResponse|\Symfony\Component\HttpFoundation\Response
    {
        return response()->json(
            [
                'data' => $this->collection->toArray(),
                'meta' => [
                    'currentPage' => $this->paginator->currentPage(),
                    'lastPage' => $this->paginator->lastPage(),
                    'path' => $this->paginator->path(),
                    'perPage' => $this->paginator->perPage(),
                    'total' => $this->paginator->total(),
                ],
            ],
            $this->status
        );
    }
}
