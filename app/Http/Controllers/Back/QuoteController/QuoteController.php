<?php

namespace App\Http\Controllers\Back\QuoteController;

use App\Http\Controllers\Controller;
use App\Models\Quotes;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function quoteListIndex(){
        $quotes = Quotes::all();
        return view('back.quote.list',compact('quotes'));
    }
    public function quoteListAdd(Request $request){
        $request->validate([
           'author'=>'required',
           'words'=>'required',
        ]);
        $quote = new Quotes();
        $quote->author = $request->author;
        $quote->content = $request->words;
        return redirect()->back()->with($quote->save() ? 'success' : 'error',true);
    }
    public function quoteStatus(Request $request){
        $quote = Quotes::find($request->id);
        if(!$quote){
            return response()->json('0');
        }
        $quote->status = $quote->status == '0' ? '1' : '0';
        return $quote->save() ? response()->json('1') : response()->json('0');
    }
    public function quoteDelete(Request $request){
        $quote = Quotes::find($request->id);
        if(!$quote){
            return response()->json('0');
        }
        return $quote->delete() ? response()->json('1') : response()->json('0');
    }
}
