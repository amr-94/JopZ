<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class JopformController extends Controller
{
    public function index_form_sended()
    {
        $form_sended = Auth::user()->forms;
        return view('dashboard.jops.send_jop_form.index_form_jop', compact('form_sended'));
    }
    public function edit_form_sended($id)
    {
        $form_sended = Auth::user()->forms->find($id);
        return view('dashboard.jops.send_jop_form.edit_form_jop', compact('form_sended'));
    }


    public function update_form_sended(Request $request, $id)
    {
        $form_sended = Auth::user()->forms->find($id);
        if ($request->user_cv !== null && $request->user_cv == $form_sended->cv) {
            File::delete(public_path('forms/' . $form_sended->cv));
        }
        // $request->validate([
        //     'message' => 'required',
        // ]);
        if ($request->hasFile('user_cv')) {
            $cv = $request->file('user_cv');
            $cv_name = rand(1, 10000) . '.' . $cv->getClientOriginalName();
            $cv->move(public_path('files/forms/'), $cv_name);
            $request->merge([
                'cv' => $cv_name
            ]);
        }


        $form_sended->update($request->all());

        return redirect()->route('index_form_sended')->with('success', 'Form updated successfully');
    }
}