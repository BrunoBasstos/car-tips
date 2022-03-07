<?php

namespace App\Http\Controllers;

use App\Models\Make;
use App\Models\Model;
use App\Models\Tag;
use App\Models\Tip;
use App\Models\Trim;
use App\Models\Type;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TipController extends Controller
{

    public function index()
    {
        $tips = Tip::all();

        return view('dashboard', compact('tips'));
    }

    public function create()
    {
        $types = Type::active()->get();
        $makes = Make::active()->get();
        $models = Model::active()->get();
        $trims = Trim::active()->get();
        $tags = Tag::active()->get();
        $vehicles = Vehicle::active()->get();

        return view('tips.create', compact('types', 'models', 'makes', 'trims', 'tags', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'content'    => ['required', 'string'],
            'vehicle_id' => ['required', 'integer', 'exists:vehicles,id'],
            'tag_id'     => ['nullable', 'integer', 'exists:tags,id']
        ]);

        $tip = $request->user()
            ->tips()
            ->create($validData);

        return $tip;
    }

    public function show($id)
    {
        return view('livewire.tips.show', ['tip' => Tip::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
