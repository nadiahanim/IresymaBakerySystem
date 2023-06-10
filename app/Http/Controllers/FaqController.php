<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Models\Faq;

class FaqController extends Controller
{

    public function index()
    {
        $faq = Faq::where([['status_data',1]])->get();

        return view('Faq.index', 
        [
            'faq' => $faq
        ]);
    }

    public function create()
    {
        return view('Faq.create', 
        [
        ]);
    }

    public function save(Request $request)
    {
        $question = $request->question;
        $answer = $request->answer;

        $faq = new Faq;

        $faq->question = $question;
        $faq->answer = $answer;
        $faq->status_data = 1;
        $faq->updated_on = date('Y-m-d H:i:s');

        $saved = $faq->save();

        if($saved)
        {
            return redirect()->route('faq.index')->with([
                'success' => 'New FAQ successfully added!',
            ]);
        }
        else 
        {
            return redirect()->route('faq.create')->with([
                'error' => 'New FAQ addition unsuccessful',
            ]);
        }
    }

    public function view(Request $request)
    {
        $faq = Faq::where([['status_data',1]])->get();

        return view('Faq.view', 
        [
            'faq' => $faq
        ]);
    }

    public function edit(Request $request)
    {
        $faq_id = $request->faq_id;

        $faq = Faq::where([['id',$faq_id]])->first();

        return view('Faq.edit', 
        [
            'faq' => $faq
        ]);
    }

    public function update(Request $request)
    {
        $faq_id = $request->faq_id;
        $question = $request->question;
        $answer = $request->answer;

        $faq = Faq::where([['id',$faq_id]])->first();

        $faq->question = $question;
        $faq->answer = $answer;
        $faq->updated_on = date('Y-m-d H:i:s');

        $saved = $faq->save();

        if($saved)
        {
            return redirect()->route('faq.index')->with([
                'success' => 'FAQ update successful!',
            ]);
        }
        else 
        {
            return redirect()->route('faq.index')->with([
                'error' => 'FAQ update unsuccessful',
            ]);
        }
    }

    public function delete(Request $request)
    {
        $faq_id = $request->faq_id;

        $faq = Faq::where([['id',$faq_id]])->first();

        $faq->status_data = 0;
        $faq->updated_on = date('Y-m-d H:i:s');

        $saved = $faq->save();

        if($saved)
        {
            return redirect()->route('faq.index')->with([
                'success' => 'FAQ delete successful!',
            ]);
        }
        else 
        {
            return redirect()->route('faq.index')->with([
                'error' => 'FAQ delete unsuccessful',
            ]);
        }
    }


}
