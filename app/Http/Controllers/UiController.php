<?php

namespace App\Http\Controllers;

use App\Http\Requests\UiStoreRequest;
use App\Http\Requests\UiUpdateRequest;
use App\Models\Ui;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UiController extends Controller
{
    public function index(Request $request): View
    {
        $uis = Ui::all();

        return view('ui.index', [
            'uis' => $uis,
        ]);
    }

    public function create(Request $request): View
    {
        return view('ui.create');
    }

    public function store(UiStoreRequest $request): RedirectResponse
    {
        $ui = Ui::create($request->validated());

        $request->session()->flash('ui.id', $ui->id);

        return redirect()->route('uis.index');
    }

    public function show(Request $request, Ui $ui): View
    {
        return view('ui.show', [
            'ui' => $ui,
        ]);
    }

    public function edit(Request $request, Ui $ui): View
    {
        return view('ui.edit', [
            'ui' => $ui,
        ]);
    }

    public function update(UiUpdateRequest $request, Ui $ui): RedirectResponse
    {
        $ui->update($request->validated());

        $request->session()->flash('ui.id', $ui->id);

        return redirect()->route('uis.index');
    }

    public function destroy(Request $request, Ui $ui): RedirectResponse
    {
        $ui->delete();

        return redirect()->route('uis.index');
    }
}
