<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Controller;


class DashboardController extends Controller
{
    
    public function index(){
        $dashboard = Dashboard::all();
        return view('dashboard.index', ['dashboard' => $dashboard]);
        
    }

    public function create(){
        return view('dashboard.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $newDashboard = Dashboard::create($data);

        return redirect(route('dashboard.index'));

    }

    public function edit(Dashboard $dashboard){
        return view('dashboard.edit', ['dashboard' => $dashboard]);
    }

    public function update(Dashboard $dashboard, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $dashboard->update($data);

        return redirect(route('dashboard.index'))->with('success', 'Dashboard Updated Succesffully');

    }

    public function destroy(Dashboard $dashboard){
        $dashboard->delete();
        return redirect(route('dashboard.index'))->with('success', 'Dashboard deleted Succesffully');
    }
}