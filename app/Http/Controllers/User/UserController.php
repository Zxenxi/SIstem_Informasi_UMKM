<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $admin = User::all();
        $category = Category::all();
        $products = Product::join('customers', 'products.customer_id', '=', 'customers.id')
            ->select('products.*', 'customers.phone_number',)
            ->with('category')
            ->get();

        foreach ($products as $product) {
            $product->phone_number = $this->formatPhoneNumber($product->phone_number);
        }
        foreach ($admin as $user) {
            $user->phone_number = $this->formatPhoneNumber($user->phone_number);
        }

        return view('user.user_dashboard', compact('category', 'products','admin'));
    }   

    public function mainCategory()
    {
        $category = Category::all();
        $products = Product::join('customers', 'products.customer_id', '=', 'customers.id')
            ->select('products.*', 'customers.phone_number')
            ->with('category')
            ->get();

        foreach ($products as $product) {
            $product->phone_number = $this->formatPhoneNumber($product->phone_number);
        }

        return view('user.user_mainproduct', compact('category', 'products'));
    }

    public function showByCategory($id)
    {
        $categories = Category::all();
        $category = Category::find($id);

        $products = Product::join('customers', 'products.customer_id', '=', 'customers.id')
            ->where('products.category_id', $category->id)
            ->select('products.*', 'customers.phone_number')
            ->with('category')
            ->get();

        foreach ($products as $product) {
            $product->phone_number = $this->formatPhoneNumber($product->phone_number);
        }
        

        return view('user.user_product', compact('products', 'category', 'categories'));
    }

    public function search(Request $request)
    {
        $category = Category::all();
        $keyword = $request->search;
        $products = Product::where('name', 'like', "%" . $keyword . "%")
            ->orWhere('description', 'like', "%" . $keyword . "%")
            ->paginate(5);

        foreach ($products as $product) {
            $product->phone_number = $this->formatPhoneNumber($product->customer->phone_number);
        }

        return view('user.user_mainproduct', compact('products', 'category'));
    }

    
    public function details($id)
    {
        $category = Category::all();
        $product = Product::findOrFail($id);
        $customer = $product->customer;

        $phone_number = $this->formatPhoneNumber($customer->phone_number);
        
        return view('user.user_detailsProduct', compact('product', 'phone_number', 'category'));
    }

    private function formatPhoneNumber($number)
    {
        // Menghapus semua karakter non-digit
        $number = preg_replace('/\D/', '', $number);

        // Jika nomor dimulai dengan '0', ubah menjadi '62'
        if (substr($number, 0, 1) == '0') {
            $number = '62' . substr($number, 1);
        }

        // Jika nomor sudah diawali dengan '62', kembalikan nomor
        if (substr($number, 0, 2) == '62') {
            return $number;
        }

        // Jika nomor tidak dimulai dengan '62' atau '0', tambahkan '62' di depan
        return '62' . $number;
    }
}







































    // public function index()
    // {
    //     $category = Category::all();
    //     $products = Product::join('customers', 'products.customer_id', '=', 'customers.id')
    //         ->select('products.*', 'customers.phone_number')
    //         ->with('category')
    //         ->get();
    //     // $products = Product::with('category')->get();

    //     return view('user.user_dashboard', compact('category', 'products'));
    // }   

    // public function mainCategory()
    // {
    //     $category = Category::all();
    //     $products = Product::join('customers', 'products.customer_id', '=', 'customers.id')
    //         ->select('products.*', 'customers.phone_number')
    //         ->with('category')
    //         ->get();

    //     return view('user.user_mainproduct', compact('category', 'products'));
    // }
    // //menampilkan product berdasarkan kategori
    // public function showByCategory($id)
    // {
    //     // Retrieve the category based on the id
    //     $categories = Category::all();
    //     $category = Category::find($id);

    //     // Retrieve all products that belong to the category
    //     $products = Product::join('customers', 'products.customer_id', '=', 'customers.id')
    //         ->where('products.category_id', $category->id)
    //         ->select('products.*', 'customers.phone_number')
    //         ->with('category')
    //         ->get();

    //     // Pass the products and category to the view
    //     return view('user.user_product', compact('products', 'category', 'categories'));
    // }

    // public function search(Request $request)
    // {
    //     // kalu mau extend category nav harus menambahkan seperti dibawah ini ya guys ya
    //     $category = Category::all();

    //     $keyword = $request->search;
    //     $products = Product::where('name', 'like', "%" . $keyword . "%")
    //         ->orWhere('description', 'like', "%" . $keyword . "%")
    //         ->paginate(5);
    //     return view('user.user_mainproduct', compact('products', 'category'));
    // }
    // public function details($id)
    // {
    //     $category = Category::all();
    //     // Retrieve the product based on its ID
    //     $product = Product::findOrFail($id);
    //     // Retrieve the associated customer (assuming there is a 'customer' relationship defined in the Product model)
    //     $customer = $product->customer;
    //     // Access the phone number from the customer
    //     $phone_number = $customer->phone_number;
    //     // $customers = Customer::all();
    //     return view('user.user_detailsProduct', compact('product', 'phone_number', 'category'));
    // }