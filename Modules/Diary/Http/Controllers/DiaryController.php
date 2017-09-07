<?php

namespace Modules\Diary\Http\Controllers;

use Modules\Diary\Emotion;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('diary::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('diary::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $diary = $request->user()->createDiary();
        $page = $diary->newPage();

        $responses = ['emotions' => []];
        foreach ($request->emotions as $values) {
            $emotion = Emotion::find($values['id']);

            $note = $page->writeNote($emotion, 0);

            array_push($responses['emotions'], [
                'id' => $note->noteable_id,
                'response' => $note->data,
            ]);
        }

        $diary->storeData(json_encode($responses));

        return [
            'message' => 'Sucesso',
            'data' => $diary->data()
        ];
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('diary::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('diary::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
