<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdoptionController extends Controller
{
    public function index()
    {
        $adoptions = Adoption::with(['user', 'pet'])
                        ->orderBy('id', 'desc')
                        ->paginate(12);
        return view('adoptions.index')->with('adoptions', $adoptions);
    }

    public function create()
    {
        $users = User::orderBy('fullname')->get();
        $pets  = Pet::where('adopted', 0)->orderBy('name')->get();
        return view('adoptions.create', compact('users', 'pets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'pet_id'  => ['required', 'exists:pets,id'],
        ]);

        // Evitar duplicados
        $exists = Adoption::where('user_id', $request->user_id)
                          ->where('pet_id', $request->pet_id)
                          ->exists();
        if ($exists) {
            return redirect()->back()
                    ->withErrors(['pet_id' => 'This adoption already exists.'])
                    ->withInput();
        }

        $adoption = Adoption::create([
            'user_id' => $request->user_id,
            'pet_id'  => $request->pet_id,
        ]);

        // Marcar mascota como adoptada
        Pet::where('id', $request->pet_id)->update(['adopted' => 1]);

        return redirect('adoptions')
                ->with('message', 'Adoption registered successfully!');
    }

    public function show(Adoption $adoption)
    {
        return view('adoptions.show')->with('adoption', $adoption);
    }

    public function edit(Adoption $adoption)
    {
        $users = User::orderBy('fullname')->get();
        $pets  = Pet::orderBy('name')->get();
        return view('adoptions.edit', compact('adoption', 'users', 'pets'));
    }

    public function update(Request $request, Adoption $adoption)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'pet_id'  => ['required', 'exists:pets,id'],
        ]);

        // Desmarcar mascota anterior
        Pet::where('id', $adoption->pet_id)->update(['adopted' => 0]);

        $adoption->user_id = $request->user_id;
        $adoption->pet_id  = $request->pet_id;
        $adoption->save();

        // Marcar nueva mascota como adoptada
        Pet::where('id', $request->pet_id)->update(['adopted' => 1]);

        return redirect('adoptions')
                ->with('message', 'Adoption updated successfully!');
    }

    public function destroy(Adoption $adoption)
    {
        // Desmarcar mascota al eliminar adopción
        Pet::where('id', $adoption->pet_id)->update(['adopted' => 0]);

        $adoption->delete();

        return redirect('adoptions')
                ->with('message', 'Adoption deleted successfully!');
    }

    public function pdf()
    {
        $adoptions = Adoption::with(['user', 'pet'])->get();
        $pdf = Pdf::loadView('adoptions.pdf', compact('adoptions'));
        return $pdf->download('alladoptions.pdf');
    }

     /**
    * Generate an Excel file
    */
    public function excel()
    {
    $adoptions = Adoption::with(['user', 'pet'])->get();
    return response()->streamDownload(function () use ($adoptions) {
        echo view('adoptions.excel', compact('adoptions'))->render();
    }, 'alladoptions.xls', [
        'Content-Type' => 'application/vnd.ms-excel',
    ]);
    }

    public function search(Request $request)
    {
        $q = $request->q;
        $adoptions = Adoption::with(['user', 'pet'])
            ->whereHas('user', fn($query) => $query->where('fullname', 'like', "%$q%"))
            ->orWhereHas('pet', fn($query) => $query->where('name', 'like', "%$q%"))
            ->orderBy('id', 'desc')
            ->paginate(12);
        return view('adoptions.search')->with('adoptions', $adoptions);
    }
}