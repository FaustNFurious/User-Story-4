<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;



class CreateArticle extends Component
{

    /* l'attributo #[Validate] consente di definire le regole di validazione direttamente sulle proprietà di un componente. 
    Questo permette di effettuare la validazione in tempo reale, ovvero non appena l'utente modifica il valore di una proprietà. */
    #[Validate('required|string|max:255')]
    public $title;

    #[Validate('required|string|min:10|max:1000')]
    public $description;

    #[Validate('required|numeric|min:0')]
    public $price;

    #[Validate('required|exists:categories,id')]
    public $category = null;

    public $article;


    // Store new article
    public function store() 
    {

        $this->validate();

        $this->article = Article::create([
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category,
            'user_id' => Auth::id()
        ]);

        // Redirect alla dashboard con messaggio di successo
        return redirect()->route('dashboard')->with('success', 'Articolo "' . $this->article->title . '" creato con successo!');

    }


    public function render()
    {
        return view('livewire.create-article');
    }

}
