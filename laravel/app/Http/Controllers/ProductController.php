<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function listProduct()
    {
        return view('list_product');
    }

    public function getList()
    {
        $product = new Product();
        $dataProduct = $product->getListAllProduct();

        echo json_encode($dataProduct);
    }

    public function getCurl($page)
    {
        $page = str_replace("|", "/", $page);
        $response = $this->getWebPage($page);
        $data = array(
            'page' => $response,
        );
        echo json_encode($data);
    }

    public function getWebPage($url)
    {
        $options = array(
            CURLOPT_RETURNTRANSFER => true, // return web page
            CURLOPT_HEADER => false, // don't return headers
            CURLOPT_FOLLOWLOCATION => true, // follow redirects
            CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
            CURLOPT_ENCODING => "", // handle compressed
            CURLOPT_AUTOREFERER => true, // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 120, // time-out on connect
            CURLOPT_TIMEOUT => 120, // time-out on response
        );

        $ch = curl_init($url);
        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);

        curl_close($ch);

        return $content;
    }

    public function detailProduct($id)
    {
        try {
            $product = new Product();
            $dataProduct = $product->getProduct($id);

            // Get Comment
            $comment = new Comment();
            $dataComment = $comment->getListAllComment($id);

            if (count($dataProduct) == 0) {
                $page = "https://fabelio.com/insider/data/product/id/" . $id;

                $response = $this->getWebPage($page);

                $productResponse = json_decode($response)->product;

                $name = $productResponse->name;
                $price = $productResponse->unit_sale_price;
                $description = "";
                if (isset($productResponse->description)) {
                    $description = $productResponse->description;
                }
                $image = $productResponse->product_image_url;
                $url = $productResponse->url;
                $created_date = date('Y-m-d H:i:s');

                $product->id = $id;
                $product->name = $name;
                $product->price = $price;
                $product->description = $description;
                $product->image = $image;
                $product->url = $url;
                $product->created_date = $created_date;

                $result = $product->save();

                $data = array(
                    'id' => $id,
                    'name' => $name,
                    'price' => $price,
                    'description' => $description,
                    'image_url' => $image,
                    'url' => $url,
                    'comment' => $dataComment,
                );

                return view('detail_product', $data);
            } else {
                $data = array(
                    'id' => $id,
                    'name' => $dataProduct[0]->name,
                    'price' => $dataProduct[0]->price,
                    'description' => $dataProduct[0]->description,
                    'image_url' => $dataProduct[0]->image,
                    'url' => $dataProduct[0]->url,
                    'comment' => $dataComment,
                );

                return view('detail_product', $data);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            echo $ex;
            // return redirect()->route('home');
        }
    }

    public function addComment(Request $request)
    {
        try {
            $comment = new Comment();

            $comment->product_id = $request->product_id;
            $comment->title = $request->title;
            $comment->comment = $request->comment;
            $comment->created_date = date('Y-m-d H:i:s');

            $result = $comment->save();

            return redirect('/product/detail_product/' . $request->product_id);
        } catch (\Illuminate\Database\QueryException $ex) {
            echo $ex;
            // return redirect()->route('home');
        }
    }
}
