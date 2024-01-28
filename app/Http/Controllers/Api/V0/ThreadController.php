<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Thread;
use App\Http\Resources\V1\ThreadCollection;
use App\Http\Resources\V1\ThreadResource;

class ThreadController extends Controller
{
    public function list() {
        $threads = Thread::all();
        return new ThreadCollection($threads);
    }

    public function detail($id) {
        $thread = Thread::findOrFail($id);
        return new ThreadResource($thread);
    }

    public function detailModel(Thread $thread) {
        return new ThreadResource($thread);
    }

        /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$thread = new Thread();
        //$thread->fill($request->all());
        // compatto
        //$thread = Thread::create($request->all());
        // validazione
        $data = $request->validate([
            'title' => 'required|string',
            'body'  => 'required|Sting'
        ]);
        $thread = Thread::create($data);
        Thread.save();
    }
}

