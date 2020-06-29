<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function getAllProduct()
    {
        $products = DB::table('products')->get();

        return response()->json([
            'message' => 'success',
            'data' => $products
        ], 200);
    }
    public function getimagepro($directory, $url)
    {
        $path = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix($directory . '/' . $url);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
    public function opencreateproduct()
    {
        return view("dashboard/createproduct");
    }
    public function createproduct(Request $request)
    {
        try {

            $data = $request->input();
            dd($request->hasFile('image')); die;
            if ($request->hasFile('image')) {
                $data['image'] = $this->resizeImage("product_foto", $request->file('image'));
            }
            // $tujuan_upload = 'data_file';
	        // $data['image']->move($tujuan_upload,$data['image']->getClientOriginalName());
            $product = Product::create($data);
            return $this->lihat();
        } catch (\Throwable $th) {
            //throw $th;s
        }
    }
    function resizeImage($folder, $pathInput)
    {
        $resize = Image::make($pathInput)->resize(512, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->encode('jpg');
        $hash = md5($resize->__toString());
        $path = $folder . "/{$hash}.jpg";
        // $path = $folder . "/{$pathInput}.jpg";
        Storage::put($path, $resize->__toString());

        return $path;
    }
    public function lihat()
    {
        $products = Product::selectRaw('name, price , qty')
            ->get();
        return view("dashboard/listproduct", compact("products"));
    }
}
