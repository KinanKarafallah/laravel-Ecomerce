<?php 

namespace App\Repository;

use App\Interfaces\ProductInterface;
use App\Models\product;
use Illuminate\Support\Facades\File;

class ProductRepository implements ProductInterface
{
    public function store($request)
    {
        $data = $request->validated();
        $data['created_by'] = auth()->user()->id; ;
        
        
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $extestion =$image->getClientOriginalExtension();
            $filename = time().'.'.$extestion;
            $image->move('uploads/products/',$filename);
            $data['image'] = $filename;
            
        }
        
        product::create($data);
        

        return redirect()->route('home')->with(['message'=>'Product was added successfully']);

    }




    public function update($request, $id)
    {
        $data = $request->validated();
        $data['updated_by'] = $request->user()->id;
        $product = product::findOrFail($id);
        
        
        if($request->hasFile('image')){
            $destination = 'uploads/products/'.$product->image ;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $extestion =$image->getClientOriginalExtension();
            $filename = time().'.'.$extestion;
            $image->move('uploads/products/',$filename);
            $data['image'] = $filename;
        }
        if(empty($product)){
            return redirect()->route('Dashboard')->with(['error'=>'Unable to access the requested data']);
        }

       
        $product->update($data);

        return redirect()->route('product.manage')->with(['message'=>'Product was updated successfully']);
    }
}