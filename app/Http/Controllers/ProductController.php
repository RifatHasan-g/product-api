<?php



namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['brand', 'category', 'unit', 'tax', 'productQuantities.warehouse', 'attachments'])->get();
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Product showing successfully',
            'data' => $products,
            'error' => null
        ]);
    }

    public function show($id)
    {
        try {
            $product = Product::with(['brand', 'category', 'unit', 'tax', 'productQuantities.warehouse', 'attachments'])->findOrFail($id);
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Product showing successfully',
                'data' => $product,
                'error' => null
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'Product not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'symbology' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'unit_id' => 'required|exists:units,id',
            'tax_id' => 'required|exists:taxes,id',
            'price' => 'required|numeric',
            'qty' => 'required|integer',
            'alert_qty' => 'required|integer',
            'tax_method' => 'required|string',
            'has_stock' => 'required|boolean',
            'has_expiry_date' => 'required|boolean',
            'expiry_date' => 'nullable|date',
            'details' => 'nullable|string',
            'is_active' => 'required|boolean',
        ]);

        $product = Product::create($validatedData);
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Product created successfully',
            'data' => $product,
            'error' => null
        ], 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $product = Product::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'sometimes|required|string|max:255',
                'sku' => 'sometimes|required|string|max:255',
                'symbology' => 'sometimes|required|string|max:255',
                'brand_id' => 'sometimes|required|exists:brands,id',
                'category_id' => 'sometimes|required|exists:categories,id',
                'unit_id' => 'sometimes|required|exists:units,id',
                'tax_id' => 'sometimes|required|exists:taxes,id',
                'price' => 'sometimes|required|numeric',
                'qty' => 'sometimes|required|integer',
                'alert_qty' => 'sometimes|required|integer',
                'tax_method' => 'sometimes|required|string',
                'has_stock' => 'sometimes|required|boolean',
                'has_expiry_date' => 'sometimes|required|boolean',
                'expiry_date' => 'nullable|date',
                'details' => 'nullable|string',
                'is_active' => 'sometimes|required|boolean',
            ]);

            $product->update($validatedData);
            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Product updated successfully',
                'data' => $product,
                'error' => null
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'Product not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            return response()->json([
                'success' => true,
                'status' => 204,
                'message' => 'Product deleted successfully',
                'error' => null
            ], 204);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'status' => 404,
                'message' => 'Product not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }
}

