<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{   
    //home page
    public function home(){

        $inventories = Inventory::get();
        return view('home', ['inventories' => $inventories]);
    }

    //create new inventory
    public function create(){
        return view('create');
    }

    //validate & save new inventory
    public function store(Request $request){

        $formFields = $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'weight' => ['required', 'integer'],
            'colour' => 'required',
            'qty' => ['required', 'integer'],
            'pickup' => 'required',
            'destination' => 'required',
            'warehouse' => 'required',
            'transportation_mode' => 'required',
            'status' => 'required',
            'pickup_date' => 'required',
            'delivery_date' => 'required'
    
        ]);

        $formFields['image'] = $request->file('image')->store('uploads','public');

        Inventory::create($formFields);

        $inventory = Inventory::get();

        $inventories = $inventory->toArray();
        
        return redirect('/')->with('message', "Inventory created successfully");

      
    }

    //edit-inventory page
    public function edit(Inventory $inventory){

        // dd($inventory->name);
        return view('edit', [
          'inventory' => $inventory  
        ]);
    }

    //validate & save updated inventory
    public function update(Request $request, Inventory $inventory){

        $formFields = $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'weight' => ['required', 'integer'],
            'colour' => 'required',
            'qty' => ['required', 'integer'],
            'pickup' => 'required',
            'destination' => 'required',
            'warehouse' => 'required',
            'transportation_mode' => 'required',
            'status' => 'required',
            'pickup_date' => 'required',
            'delivery_date' => 'required'
    
        ]);

        $formFields['image'] = $request->file('image')->store('uploads','public');

        $inventory->update($formFields);

        $inventory = Inventory::get();

        $inventories = $inventory->toArray();
        
        return redirect('/')->with('message', "Inventory updated successfully");

    }

    //delete inventory
    public function destroy(Inventory $inventory, Request $request){
        // dd($inventory['id']);
        
        $formFields = $request->validate(['comment' => 'required']);

        $formFields['inventory_id'] = $inventory['id'];
        
        Comments::create($formFields);
        $inventory->delete();

        return redirect('/')->with('message', "Inventory deleted successfully");

    }

    //thrashed inventory
    public function thrashed(Inventory $inventory){

        $inventory = Inventory::onlyTrashed()->get();

        return view('thrashed', [
            'inventory' => $inventory
        ]);
    }

    public function undelete($id) {

        // dd($id);
        $inventory = Inventory::withTrashed()
                ->where('id', $id)
                ->restore();

        $inventory = Inventory::onlyTrashed()->get();

        return redirect('/thrashed')->with('message', 'inventory restored successfully');
        

    }
    
}
