<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Apartment;
class ApartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request)
    {
        $apartments = Apartment::with(['manager', 'platform'])
            ->when($request->city, function ($query, $city) {
                return $query->where('city', $city);
            })->get();
    
        return response()->json($apartments);
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:100',
            'city' => 'required|string',
            'postal_code' => 'required|size:5',
            'rent_price' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'rented' => 'required|boolean',
        ]);
        $apartment = Apartment::create($request->all());
        return $apartment;
    }
    public function show(Apartment $apartment)
    {
    }
    public function update(Request $request, Apartment $apartment)
    {
        $request->validate([
            'address' => 'required|string|max:100',
            'city' => 'required|string',
            'postal_code' => 'required|size:5',
            'rent_price' => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'rented' => 'required|boolean',
        ]);
        $apartment->update($request->all());
        return redirect()->route('apartments.index')
            ->with('success', 'Apartment updated successfully.');
    }
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return response()->json(['message' => 'Apartment deleted successfully']);
    }
    
    public function rented(Request $request)
    {
        $request->validate([
            'rented' => 'required|boolean',
        ]);

        $apartments = Apartment::with(['user'])
            ->where('rented', $request->rented)
            ->get();

        return response()->json($apartments);
    }    

}