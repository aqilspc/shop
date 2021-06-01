<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
use Carbon\Carbon;
use PDF;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'admin')
        {
            $data = DB::table('homes')->where('id',1)->first();
            return view('admin',compact('data'));
        }else
        {
            return redirect('/');
        }
    }


    //home
    public function uploadFile(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();
            // $tmp_name = $file['tmp_name'];

            $extension = explode('.',$name);
            $extension = strtolower(end($extension));

            $key = rand().'-'.$oke;
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "admin/images/";
            $file->move($tmp_file_path,$tmp_file_name);
            // if(move_uploaded_file($tmp_name, $tmp_file_path)){
            $result =url('admin/images').'/'.$tmp_file_name;
            // }
        return $result;
    }

    //home
    public function updateHome(Request $request)
    {
        $file1 = $request->file('slider1');
        $file2 = $request->file('slider2');
        $file3 = $request->file('slider3');
        $slider1 ='';
        $slider2 ='';
        $slider3 ='';
        if($file1!=null)
        {
            $slider1 = $this->uploadFile($request,'slider1');
        }else
        {
            $slider1 = $request->old_slider1;
        }

         if($file2!=null)
        {
            $slider2 = $this->uploadFile($request,'slider2');
        }else
        {
            $slider2 = $request->old_slider2;
        }

         if($file3!=null)
        {
            $slider3 = $this->uploadFile($request,'slider3');
        }else
        {
            $slider3 = $request->old_slider3;
        }
        DB::table('homes')->where('id',1)->update(
            [
                'name_shop'=>$request->name_shop
                ,'phone'=>$request->phone
                ,'text_slider1'=>$request->text_slider1
                ,'text_slider2'=>$request->text_slider2
                ,'text_slider3'=>$request->text_slider3
                ,'slider1'=>$slider1
                ,'slider2'=>$slider2
                ,'slider3'=>$slider3
            ]
        );

        return redirect()->back();
    }

    //category
    public function indexCategory()
    {
        $data = DB::table('categories')->get();
        return view('admin_category',compact('data'));
    }

    public function indexCategoryEdit($id)
    {
        $data = DB::table('categories')->where('id',$id)->first();
        return view('admin_category_update',compact('data'));
    }

    public function createCategory(Request $request)
    {
        $file1 = $request->file('foto');
        if($file1!=null)
        {
            $foto = $this->uploadFile($request,'foto');
        }else
        {
            $foto = $request->old_foto;
        }
        DB::table('categories')->insert(
            [
                'category_name'=>$request->category_name
                ,'slug'=>$request->slug
                ,'foto'=>$foto
            ]
        );
         return $this->indexCategory();
    }

    public function updateCategory(Request $request,$id)
    {
        $file1 = $request->file('foto');
        if($file1!=null)
        {
            $foto = $this->uploadFile($request,'foto');
        }else
        {
            $foto = $request->old_foto;
        }
        DB::table('categories')->where('id',$id)->update(
            [
                'category_name'=>$request->category_name
                ,'slug'=>$request->slug
                ,'foto'=>$foto
            ]
        );
         return $this->indexCategory();
    }

    public function deleteCategory($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        return $this->indexCategory();
    }


    //products
    public function indexProduct()
    {
        $data =  DB::table('products as ps')
        ->join('categories as cs','ps.category_id','=','cs.id')
        ->select('cs.category_name','ps.*')
        ->get();
        $category = DB::table('categories')->get();
        return view('admin_product',compact('data','category'));
    }

    public function indexProductEdit($id)
    {
        $data = DB::table('products')->where('id',$id)->first();
        $category = DB::table('categories')->get();
        return view('admin_product_update',compact('data','category'));
    }

    public function createProduct(Request $request)
    {
        $file1 = $request->file('foto');
        if($file1!=null)
        {
            $foto = $this->uploadFile($request,'foto');
        }else
        {
            $foto = $request->old_foto;
        }
        DB::table('products')->insert(
            [
                'category_id'=>$request->category_id
                ,'product_name'=>$request->product_name
                ,'price'=>$request->price
                ,'description'=>$request->description
                ,'foto'=>$foto
            ]
        );
         return $this->indexProduct();
    }

    public function updateProduct(Request $request,$id)
    {
        $file1 = $request->file('foto');
        if($file1!=null)
        {
            $foto = $this->uploadFile($request,'foto');
        }else
        {
            $foto = $request->old_foto;
        }
        DB::table('products')->where('id',$id)->update(
            [
                'category_id'=>$request->category_id
                ,'product_name'=>$request->product_name
                ,'price'=>$request->price
                ,'description'=>$request->description
                ,'foto'=>$foto
            ]
        );
         return $this->indexProduct();
    }

    public function deleteProduct($id)
    {
        DB::table('products')->where('id',$id)->delete();
        return $this->indexProduct();
    }

    //profile
    public function indexProfile()
    {
        return view('admin_user_profile');
    }
    public function updateProfile(Request $request)
    {
        $file1 = $request->file('foto');
        if($file1!=null)
        {
            $foto = $this->uploadFile($request,'foto');
        }else
        {
            $foto = Auth::user()->foto;
        }
        DB::table('users')->where('id',Auth::user()->id)->update(
            [
                'name'=>$request->name
                ,'email'=>$request->email
                ,'password'=>bcrypt($request->password)
                ,'country'=>$request->country
                ,'phone'=>$request->phone
                ,'birth'=>$request->birth
                ,'foto'=>$foto
            ]
        );
        return redirect()->back();
    }

    //transaction
    public function indexTransactionAdmin()
    {
        $data = DB::table('transactions')->get();
        return view('admin_transaction',compact('data'));
    }

    public function indexTransactionUser()
    {
        $data = DB::table('transactions')->where('user_id',Auth::user()->id)->get();
        return view('user_transaction',compact('data'));
    }
    public function cerateTransaction(Request $request)
    {
        //return $request;
        //$item = Session::get('item_shop');
        $item = $request->item;
        $cart = $request->cart;
        $id_trs = DB::table('transactions')->insertGetId(
            [
                'user_id'=>Auth::user()->id
                ,'date'=>Carbon::now()->format('Y-m-d')
                ,'no_transaction'=>rand(100,21000)
                ,'foto'=>null
                ,'status'=>0 // menunggu , 1 cacncel , 2 tolak, 3 terima 
                ,'total'=>$request->total
            ]
        );

        foreach ($item as $it)
        {
            DB::table('transaction_items')->insert(
                [
                    'transaction_id'=>$id_trs
                    ,'product_id'=>$it
                ]
            );
        }
        foreach ($cart as $it)
        {
           DB::table('carts')->where('id',$it)->update(['checkout'=>1]);
        }
        
        return redirect('order');
    }

    public function actTransaction($id,$act)
    {
        DB::table('transactions')->where('id',$id)->update(['status'=>$act]);
        return redirect()->back();
    }

    public function up_image(Request $request)
    {
        $foto = $this->uploadFile($request,'foto');
        DB::table('transactions')->where('no_transaction',$request->no_transaction)->update(['foto'=>$foto]);
        return redirect()->back();
    }


    //cart
    public function addToCart($id)
    {
        DB::table('carts')->insert(
            [
                'user_id'=>Auth::user()->id
                ,'product_id'=>$id
                ,'checkout'=>0
            ]
        );
        return redirect('carts')->with('success','Successfuly add the product to cart');
    }

    public function cartUser()
    {
        $id = Auth::user()->id;
        $data = DB::table('carts as cr')
        ->join('products as ps','ps.id','=','cr.product_id')
        ->where('cr.user_id',$id)
        ->where('cr.checkout',0)
        ->select('ps.product_name','cr.id as cart_id','ps.id as product_id','ps.price','ps.foto')
        ->get();
        if($data->isEmpty())
        {
            return view('empty-cart');
        }else
        {
            return view('cart',compact('data'));
        }
    }

    public function removeCart($id)
    {
        DB::table('carts')->where('id',$id)->delete();
        return redirect('carts')->with('success','Successfuly removed the product from cart');
    }

    //detail products
    public function detailProduct($id)
    {
        $data = DB::table('products as ps')->where('ps.id',$id)
        ->join('categories as cs','ps.category_id','=','cs.id')
        ->select('cs.category_name','ps.*')
        ->first();
        return view('product-single',compact('data'));
    }

    public function print_pdf_invoice($id)
    {
        $data = DB::table('transactions')->where('id',$id)->first();
        $item = DB::table('transaction_items')->where('transaction_id',$data->id)->get();
        $user = DB::table('users')->where('id',$data->user_id)->first();
        $pdf = PDF::loadview('sales_receipt',compact('data','item','user'));
        return $pdf->download('sales_receipt-'.$data->no_transaction.'.pdf');
        //return $pdf->stream();
        // return count($period);
    }
}
