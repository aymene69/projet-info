<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Termwind\Components\Dd;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function listequestions()
    {
        return view('admin.liste');
    }

    public function editquestions()
    {
        return view('admin.edit');
    }

    public function editregles()
    {
        return view('admin.regles');
    }

    public function ajoutertype()
    {
        $data = request(['nomType']);
        DB::table('question_type')->insert([
            'questionType' => $data['nomType']
        ]);

        return redirect()->route('editquestions');
    }

    public function edittype()
    {
        $data = request(['nomType', 'nouveauNomType']);
        DB::table('question_type')->where('questionType', $data['nomType'])->update([
            'questionType' => $data['nouveauNomType']
        ]);
        DB::table('question')->where('questionType', $data['nomType'])->update([
            'questionType' => $data['nouveauNomType']
        ]);
        return redirect()->route('editquestions');
    }

    public function supprimertype()
    {
        $data = request(['nomType']);
        DB::table('question_type')->where('questionType', $data['nomType'])->delete();
        DB::table('question')->where('questionType', $data['nomType'])->delete();
        return redirect()->route('editquestions');
    }

    public function ajouterquestion()
    {
        $data = request(['question', 'reponse', 'reponse2', 'reponse3', 'reponse4', 'indice', 'explication', 'questionType', 'questionLevel', 'questionImage', 'image']);
        $fileName = time().'.'.$data['image']->extension();
        $data['image']->move(public_path('uploads'), $fileName);
        DB::table('question')->insert([
            'question' => $data['question'],
            'reponse' => $data['reponse'],
            'reponse2' => $data['reponse2'],
            'reponse3' => $data['reponse3'],
            'reponse4' => $data['reponse4'],
            'indice' => $data['indice'],
            'explication' => $data['explication'],
            'questionType' => $data['questionType'],
            'questionLevel' => $data['questionLevel'],
            'questionImage' => $fileName
        ]);

        return redirect()->route('editquestions');
    }

    public function supprimerquestion()
    {
        $data = request(['question']);
        DB::table('question')->where('id', $data['question'])->delete();

        return redirect()->route('editquestions');
    }

    public function ajouterregle()
    {
        $data = request(['regle']);
        DB::table('regles')->insert([
            'regle' => $data['regle']
        ]);

        return redirect()->route('editregles');
    }

    public function modifregle()
    {
        $data = request(['regle', 'nouvelleRegle']);
        DB::table('regles')->where('id', $data['regle'])->update([
            'regle' => $data['nouvelleRegle']
        ]);

        return redirect()->route('editregles');
    }

    public function supprimerregle()
    {
        $data = request(['regle']);
        DB::table('regles')->where('id', $data['regle'])->delete();

        return redirect()->route('editregles');
    }
}
