<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Resources\PackageResource;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Package::query()->with('bookings');
        // فلترکردن
        $query->when($request->query('destination'), function ($q, $destination) {
            $q->where('destination', $destination);
        });

        // searching
        $query->when($request->query('search'), function ($q, $term) {
            $q->where(function ($inner) use ($term) {
                $inner->where('name', 'like', "%{$term}%")
                    ->orWhere('destination', 'like', "%{$term}%")
                    ->orWhere('description', 'like', "%{$term}%");
            });
        });

        // sorting
        $sortable = ['name', 'destination', 'price', 'duration'];

        $sort = $request->query('sort', 'created_at');
        $direction = $request->query('direction', 'desc');

        if (!in_array($sort, $sortable)) {
            $sort = 'created_at';
        }
        if (!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }
        $query->orderBy($sort, $direction);

        $perPage = (int) $request->query('per_page',10);

        $perPage =min(100,max(1,$perPage));

        return PackageResource::collection($query->paginate($perPage));

        // return PackageResource::collection($query->latest()->paginate(10));
        // $package = package::with('bookings')->latest()->paginate(15);
        // return PackageResource::collection($package);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackageRequest $request)
    {
        $package = Package::create($request->validated());
        return response()->json($package, 201);
        // فعلاً همین‌جا توقف می‌کنیم
    }
    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        return $package->load('bookings');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        $package->update($request->validated());

        return response()->json($package);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return response()->json([
            'message' => 'Package deleted successfully'
        ]);
    }
}
