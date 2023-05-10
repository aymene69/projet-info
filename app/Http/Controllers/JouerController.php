<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;

class JouerController extends Controller
{
    public function round(string $id) {
        if (1 <= $id && $id <= 3){
            $questionHasard = DB::table('question')->where('questionLevel', 'Facile')->inRandomOrder()->first();
            session()->push('idQuestions', $questionHasard->id);
            return view('jouer.round', ['questionHasard' => $questionHasard, 'idRound' => $id]);
        }
        if (1 <= $id && $id <= 6){
            $questionHasard = DB::table('question')->where('questionLevel', 'Moyenne')->inRandomOrder()->first();
            session()->push('idQuestions', $questionHasard->id);
            return view('jouer.round', ['questionHasard' => $questionHasard, 'idRound' => $id]);
        }
        if (1 <= $id && $id <= 10){
            $questionHasard = DB::table('question')->where('questionLevel', 'Difficile')->inRandomOrder()->first();
            session()->push('idQuestions', $questionHasard->id);
            return view('jouer.round', ['questionHasard' => $questionHasard, 'idRound' => $id]);
        }
    }

    public function index() {
        session()->forget('idQuestions');
        session()->forget('reponsesFull');
        session()->forget('nbPoints');
        return view('jouer.index');
    }

    public function verif() {
        $data = request(['id', 'reponse', 'round', 'difficulte']);
        session()->push('reponsesFull', $data['reponse']);
        $question = DB::table('question')->where('id', $data['id'])->first();
        if ($question->reponse == $data['reponse']) {
            $points = session('nbPoints') +1;
            session()->put('nbPoints', $points);
            $user = User::find(auth()->user()->id);
            if ($data['difficulte'] == "Facile") {
                $user->score = $user->score + 1;
            }
            elseif ($data['difficulte'] == "Moyenne") {
                $user->score = $user->score + 2;
            }
            elseif ($data['difficulte'] == "Difficile") {
                $user->score = $user->score + 3;
            }
            $user->save();
            if ($data['round'] == 10) {
                $user = User::find(auth()->user()->id);
                $user->nbParties = $user->nbParties +1;
                if (session('nbPoints') > 5) {
                    $user->nbVictoires = $user->nbVictoires +1;
                    $user->save();
                }
                else {
                    $user->nbDefaites = $user->nbDefaites +1;
                    $user->save();
                }
                return redirect()->route('reponses', [
                    'idQuestions' => session('idQuestions'),
                    'reponsesFull' => session('reponsesFull'),
                    'nbPoints' => session('nbPoints')
                ]);
            }
            else {
                return redirect()->route('round', ['id' => intval($data['round']) + 1]);
            }
        } else {
            if ($data['round'] == 10) {
                $user = User::find(auth()->user()->id);
                $user->nbParties = $user->nbParties +1;
                if (session('nbPoints') > 5) {
                    $user->nbVictoires = $user->nbVictoires +1;
                    $user->save();
                }
                else {
                    $user->nbDefaites = $user->nbDefaites +1;
                    $user->save();
                }
                return redirect()->route('reponses', ['idQuestions' => session('idQuestions'), 'reponsesFull' => session('reponsesFull'), 'nbPoints' => session('nbPoints')]);
            }
            else {
                return redirect()->route('round', ['id' => intval($data['round']) + 1]);
            }
        }
    }

    public function reponses() {

        return view('jouer.reponses', ['idQuestions' => session('idQuestions')]);
    }
}
