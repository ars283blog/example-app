<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Thread;
use Illuminate\Http\Request;
use App\Http\Resources\V1\ThreadCollection;
use App\Http\Resources\V1\ThreadResource;
use App\Http\Requests\V1\ThreadStoreRequest;
use App\Http\Requests\V1\ThreadUpdateRequest;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $threads = Thread::all();
        return new ThreadCollection($threads);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ThreadStoreRequest $request)
    {
        $thread = Thread::create($request->validated());
        $thread->save();
        new ThreadResource($thread);
    }

    /**
     * Display the specified resource.
     */
    public function show(Thread $thread)
    {
        return new ThreadResource($thread);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ThreadUpdateRequest $request, Thread $thread)
    {
        $data = $request->validated();
        $thread->fill($data);
        $thread->save();
        return new ThreadResource($thread);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thread $thread)
    {
        $thread->delete();
        return response()->noContent();
    }
}
