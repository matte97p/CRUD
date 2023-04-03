<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Create a new Product::class
     *
     * @param Request $request -> Product{}
     *
     * @return Response
     */
    public function store(Request $request)
    {
        try{
            $params = $request->all();
            $validator = Validator::make($params, [
                'name' => 'required|string',
                'description' => 'nullable|string',
                'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'sell_percentage' => 'required|integer',
                'sku' => 'required|string',
                'image' => 'nullable|string',
                'availability' => 'nullable|integer'
            ]);
            if ($validator->fails()) return response()->json($validator->errors()->all(), 406);
            Product::create([
                'name' => $params['name'],
                'description' => $params['description'] ?? null,
                'price' => $params['price'],
                'sell_percentage' => $params['sell_percentage'],
                'sku' => $params['sku'],
                'image' => $params['image'],
                'availability' => $params['availability'],
            ]);

            return response()->json(['msg'=>'Prodotto inserito'], 201);
        } catch (\Exception $e) {
            return response()->json(['msg'=>'Prodotto non inserito!'], 500);
        }
    }

    /**
     * Index/Search Product.
     *
     * @param Request $request -> search, sku, available
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $params = $request->all();
        $validator = Validator::make($params, [
            'search' => 'nullable|string',
            'sku' => 'nullable|string',
            'available' => 'nullable|boolean',

            'per_page' => 'nullable|integer',
            'page' => 'nullable|integer',
        ]);
        if ($validator->fails()) return response()->json($validator->errors()->all(), 406);

        $per_page = !empty($params) && isset($params['per_page']) ? $params['per_page'] : 10;
        $page = !empty($params) && isset($params['page']) ? $params['page'] : 1;

        $query = Product::select(
            'products.name',
            'products.description',
            'products.price',
            'products.sell_percentage',
            'products.sku',
            'products.image',
            'products.availability',
            'products.created_at',
            'products.updated_at'
        );

        if (!empty($params['search'])) {
            $query->where(function ($query) use ($params) {
                $query->where('products.name', 'ILIKE', '%' . $params['search'] . '%')
                    ->orWhere('products.description', 'ILIKE', '%' . $params['search'] . '%')
                    ->orWhere('products.sku', 'ILIKE', '%' . $params['search'] . '%');
            });
        }

        if (!empty($params['sku'])) {
            $query = $query->where('products.sku', 'ILIKE', '%' . $params['sku'] . '%');
        }

        if (array_key_exists('available', $params)) {
            $query = $query->where('products.availability', ($params['available'] ? '>=' : '='), (int)$params['available']);
        }

        $query = $query->orderBy('products.name', 'ASC')
            ->paginate($per_page, ['*'], 'page', $page);

        return response()->json($query, 200);
    }

    /**
     * Update a new Product::class
     *
     * @param Request $request -> Product{}
     *
     * @return Response
     */
    public function update(Request $request, string $id)
    {
        try{
            $params = $request->all();
            $validator = Validator::make($params, [
                'name' => 'required|string',
                'description' => 'nullable|string',
                'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'sell_percentage' => 'required|integer',
                'sku' => 'required|string',
                'image' => 'nullable|string',
                'availability' => 'nullable|integer'
            ]);
            if ($validator->fails()) return response()->json($validator->errors()->all(), 406);

            Product::findOrFail($id)->updateOrFail([
                'name' => $params['name'],
                'description' => $params['description'] ?? null,
                'price' => $params['price'],
                'sell_percentage' => $params['sell_percentage'],
                'sku' => $params['sku'],
                'image' => $params['image'],
                'availability' => $params['availability'],
            ]);

            return response()->json(['msg'=>'Prodotto aggiornato'], 201);
        } catch (\Exception $e) {
            return response()->json(['msg'=>'Prodotto non aggiornato!' . $e], 500);
        }
    }

    /**
     * Delete Product::class
     *
     * @param string $id
     *
     * @return Response
     */
    public function delete(string $id)
    {
        try{
            Product::findOrFail($id)->delete();

            return response()->json(['msg'=>'Prodotto cancellato'], 201);
        } catch (\Exception $e) {
            return response()->json(['msg'=>'Prodotto non cancellato!'], 500);
        }
    }
}
