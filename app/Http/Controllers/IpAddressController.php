<?php

namespace App\Http\Controllers;

use App\Services\AddressService;
use App\Services\InterfaceService;
use Illuminate\Http\Request;

class IpAddressController extends Controller
{
    protected $address;
    protected $interface;

    public function __construct(AddressService $addressService, InterfaceService $interface)
    {
        $this->address = $addressService;
        $this->interface = $interface;
    }

    public function index()
    {
        $interfaces = $this->interface->getInterfaces();
        $ip_address = $this->address->getAddressList();

        return view('ip-address.index', compact('ip_address', 'interfaces'));
    }

    public function store(Request $request)
    {
        $this->address->addAddress($request->all());
        session()->flash('success', 'Interface Added');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->address->updateAddress($request->all(), $id);
        session()->flash('success', 'Interface Updated');
        return redirect()->back();
    }

    public function status($id)
    {
        $this->address->setStatusAddress($id);
        session()->flash('success', 'IP Address status updated');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $this->address->deleteAddress($id);
        session()->flash('success', 'IP Address Deleted');
        return redirect()->back();
    }
}
