<?php
namespace App\Http\Controllers\Api;
 
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\ApiController;
 
class ProductsController extends ApiController
{
    public function index()
    {
        return $this->successResponse('Products successfully fetched.', ProductResource::collection(Product::all()));
    }
    
    public function store(Request $request)
    {
        //return array("action"=>'store');
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'place' => 'nullable',
            'price' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->errorResponse('Error validation.', $validator->errors());       
        }
        return $this->successResponse('Post successfully created.', new ProductResource(
            Product::create($validator->validated())
        ));
    }
   
    public function show($id)
    {
        //return array("action"=>'show');
        $product = Product::find($id);
        if (is_null($product)) {
            return $this->errorResponse('Product does not exist.');
        }
        return $this->successResponse('Product successfully fetched.', new ProductResource($product));
    }
    
    public function update(Request $request, Product $product)
    {
        //return array("action"=>'update');
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'place' => 'nullable',
            'price' => 'required'
        ]);
        if($validator->fails()){
            return $this->errorResponse('Error validation.', $validator->errors());       
        }
        $input = $validator->validated();
        $product->title = $input['title'];
        $product->description = $input['description'];
        if (isset($input['place'])) {
            $product->place = $input['place'];
        }
        $product->price = $input['price'];
        $product->save();
        
        return $this->successResponse('Product successfully updated.', new ProductResource($product));
    }
   
    public function destroy($id)
    {
        //return array("action"=>'destroy');
        $product = Product::find($id);
        if (is_null($product)) {
            return $this->errorResponse('Product does not exist.');
        }
        $product->delete();
        return $this->successResponse('Product successfully deleted.');
    }
}
?>