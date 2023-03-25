<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Termwind\Components\Dd;

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

        return redirect()->route('editquestions');
    }

    public function supprimertype()
    {
        $data = request(['nomType']);
        DB::table('question_type')->where('questionType', $data['nomType'])->delete();

        return redirect()->route('editquestions');
    }

    public function ajouterquestion()
    {
        $data = request(['image', 'question', 'reponse', 'reponse2', 'reponse3', 'reponse4', 'explication', 'questionType', 'questionLevel', 'questionImage']);
        DB::table('question_type')->insert([
            'image' => $data['image'],
            'question' => $data['question'],
            'reponse' => $data['reponse'],
            'reponse2' => $data['reponse2'],
            'reponse3' => $data['reponse3'],
            'reponse4' => $data['reponse4'],
            'explication' => $data['explication'],
            'questionType' => $data['questionType'],
            'questionLevel' => $data['questionLevel'],
            'questionImage' => $data['questionImage']
        ]);

        return redirect()->route('editquestions');
    }
}
