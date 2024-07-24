<?php

namespace App\Http\Controllers;

use App\Services\InterfaceService;
use Illuminate\Http\Request;

class InterfaceController extends Controller
{
    protected $intService;

    public function __construct(InterfaceService $intService)
    {
        $this->intService = $intService;
    }

    public function index()
    {
        $interfaces = $this->intService->getInterfaces();
        return view('interface.index', compact('interfaces'));
    }

    public function status($id)
    {
        $this->intService->setIntStatus($id);
        session()->flash('success', 'Interface status updated');
        return redirect()->route('interface');
    }

    public function update(Request $request, $id)
    {
        $this->intService->setInterface($request->name, $id);
        session()->flash('success', 'Interface Updated');
        return redirect()->back();
    }
}
