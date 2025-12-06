<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Mail;
use App\Mail\BecomeRevisor;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{

    public function index()
    {
        $article_to_check = Article::where('is_accepted', null)->first();
        return view('revisor.index', compact('article_to_check'));
    }

    public function acceptArticle(Article $article)
    {
        $article->setAccepted(true);
        return redirect()->back()->with('message', 'Hai accettato l\'articolo ' . $article->title . ' con successo!');
    }

    public function rejectArticle(Article $article)
    {
        $article->setAccepted(false);
        return redirect()->back()->with('message', 'Hai rifiutato l\'articolo ' . $article->title . ' con successo!');
    }

    public function requestRevisor()
    {
        Mail::to('admin@userstory.com')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('dashboard')->with('success', 'La tua richiesta di diventare revisore è stata inviata con successo!');
    }

    public function makeRevisor(User $user)
    {
        Artisan::call('app:make-user-revisor', ['email' => $user->email]);
        return redirect()->back();
    }

}
