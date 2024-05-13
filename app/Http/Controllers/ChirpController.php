<?php


namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    public function index()
    {
        return view('chirps.index',[
            'chirps' =>Chirp::with('user')->latest()->get()
         ]);
    }

    public function store(Request $request)
    {
        $validated =  $request->validate([
            'message'=>['required','min:3', 'max:255']

        ]);
        //accecer al usuario autenticado y crear chirp
        $request->user()->chirps()->create($validated);

    return to_route('chirps.index')
    ->with('status',__(('Chirp created successfully!')));
    }

    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        return view('chirps.edit',[
            'chirp' => $chirp
        ]);
    }

    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        $validated =  $request->validate([
            'message'=>['required','min:3', 'max:255']

        ]);

        $chirp->update($validated);

        return to_route('chirps.index')
        ->with('status',__(('Chirp updated successfully!')));
    }

    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);
        $chirp->delete();

        return to_route('chirps.index')
        ->with('status',__(('Chirp deleted successfully!')));
    }



}
