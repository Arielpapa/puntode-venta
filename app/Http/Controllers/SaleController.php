<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Client;
use App\Models\Product;
use App\Models\saleDetail;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;

class SaleController extends Controller
{

     
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sales = Sale::get();
        return view('admin.sale.index', compact('sales'));
    }

  
    public function create()
    {
        $clients = Client::get();
        $products = Product::where('status', 'ACTIVE')->get();
        return view('admin.sale.create', compact('clients', 'products'));
    }
    

 
    public function store(StoreSaleRequest $request)
    {
        $sale = Sale::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'sale_date'=>Carbon::now('	America/Argentina/Buenos_Aires'),
        ]);

        foreach($request->product_id as $key=> $product){
            $results[]= array(
                "product_id"=>$request->product_id[$key],
                "quantity"=>$request->quantity[$key], 
                "price"=>$request->price[$key],
                "discount"=>$request->discount[$key]
            );
        }
        $sale->saleDetail()->createMany($results);

        // $product_id = $request->product_id;
        // $quantity = $request->quantity;
        // $price = $request->price;
        // $count = 0;
        // while($count < count($product_id)){
        //     $details = new SaleDetails();
        //     $details->purchase_id = $sale->id;
        //     $details->product_id = $product_id[$count];
        //     $details->quantity = $quantity[$count];
        //     $details->price = $price[$count];
        //     $details->save();
        //     $count = $count+1;
        // }
        return redirect()->route('sales.index');
    }

 
    public function show(Sale $sale)
    {
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetail;
     foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }
        return view('admin.sale.show', compact('sale', 'saleDetails', 'subtotal'));
    }

  
    public function edit(Sale $sale)
    {
       //$sale=Sale::get();
        $clients = Client::get();
        $products = Product::get();
        $saleDetails = saleDetail::find($sale);
      
        return view('admin.sale.edit', compact('sale','clients','products', 'saleDetails'));
    }

  
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
      //$sale->update($request->all());

        // return redirect()->route('sales.index');
        $clients = Client::get();
        $sale = Sale::update($request->all()+[
            'user_id'=>Auth::user()->id,
            'sale_date'=>Carbon::now('	America/Argentina/Buenos_Aires'),
        ]);

        foreach($request->product_id as $key=> $product){
            $results[]= array(
                "product_id"=>$request->product_id[$key],
                "quantity"=>$request->quantity[$key], 
                "price"=>$request->price[$key],
                "discount"=>$request->discount[$key]
            );
        }
        $sale->saleDetail()->createMany($results);
dd($sale);
        return redirect()->route('sales.index');
    }

   
    public function destroy(Sale $sale)
    {
        // $sale->delete();
        // return redirect()->route('sales.index');
    }

    public function pdf(Sale $sale)
    {
        $subtotal = 0 ;
        $saleDetails = $sale->saleDetail;
        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
        }
        $pdf = PDF::loadView('admin.sale.pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->download('Reporte_de_venta_'.$sale->id.'.pdf');
    }

    public function change_status(Sale $sale)
    {
        if ($sale->status == 'VALID') {
            $sale->update(['status'=>'CANCELED']);
            return redirect()->back();
        } else {
            $sale->update(['status'=>'VALID']);
            return redirect()->back();
        } 
    }
}
