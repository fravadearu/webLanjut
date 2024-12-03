<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;


class CustomerController extends Controller
{
    public function index()
    {
        // Join customers and regions tables
        $customers = DB::table('customers')
            ->join('regions', 'customers.region_id', '=', 'regions.id')
            ->select(
                'customers.*',
                'regions.nama_kota',
                'regions.nama_daerah'
            )
            ->get();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $regions = Region::all();
        return view('customers.create', compact('regions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
        ]);

        Customer::create($validatedData);
        return redirect()->route('customers.index')->with('success', 'Customer created successfully');
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $regions = Region::all();
        return view('customers.edit', compact('customer', 'regions'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($validatedData);
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }

    public function generatePDF($id)
    {
        $data = DB::table('customers')
            ->join('regions', 'customers.region_id', '=', 'regions.id')
            ->select(
                'customers.*',
                'regions.nama_kota',
                'regions.nama_daerah'
            )
            ->where('customers.id', $id)
            ->first();

        $pdf = PDF::loadView('customers.pdf', ['data' => $data]);
        return $pdf->download(date('Y-m-d') . '_customer.pdf');
    }
}
