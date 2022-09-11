<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{

    public function index()
    {
        $this->authorize('view', App\Models\Customer::class);
        $customers = Customer::all();
        return view('admin.customers.index',compact('customers'));
    }


    public function create()
    {
        $this->authorize('create', App\Models\Customer::class);
        return view('admin.customers.create');
    }


    public function store(Request $request)
    {
        $this->authorize('create', App\Models\Customer::class);
        $validated = $request->validate([
            'name'   => ['required','min:3'],
            'email'  => ['required','email',Rule::unique('customers')],
            'mobile' => ['required'],
        ]);

        Customer::create($validated);

        return to_route('customers.index')->with('msg','Cliente cadastrado com sucesso!');

    }


    public function edit(Customer $customer)
    {
        $this->authorize('update', App\Models\Customer::class);
        return view('admin.customers.edit',compact('customer'));
    }


    public function update(Request $request, Customer $customer)
    {
        $this->authorize('update', App\Models\Customer::class);
        $validated = $request->validate([
            'name'   => ['required','min:3'],
            'email'  => ['required','email',Rule::unique('customers')->ignore($customer->id)],
            'mobile' => ['required'],
        ]);

        Customer::find($customer->id)->update($validated);

        return to_route('customers.index')->with('msg','Cliente editado com sucesso!');

    }


    public function destroy(Customer $customer)
    {
        $this->authorize('delete', App\Models\Customer::class);
        Customer::find($customer->id)->delete();
        return to_route('customers.index')->with('msg','Cliente excluído com sucesso!');

    }

}
