<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return View
     */
    public function create():View
    {
        return view('pages.order');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fio'=>['required', 'string', 'min:3'],
            'email'=>['required', 'string'],
            'phone'=>['required', 'string'],
            'link'=>['required', 'string'],
        ]);

        $validated = $request->only(['fio', 'email','phone','link']);
        try {
            Storage::disk('local')->append('orders.csv',
                date('Y-m-d H:m').";" . implode(';',$validated)
            );
        } catch (Exception $e) {
            return redirect()->route('feedback.create')
                ->with('error', $e->getMessage());
        }

        return redirect()->route('order.create')
        ->with('success','Заказ принят!');
    }
}
