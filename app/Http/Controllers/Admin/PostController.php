<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Mail\NewPostNotificationToAdmin;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\New_;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->checkValidationRules());
        $data = $request->all();

        // Se l'immagine è presente salviamo l'immagine
        if (isset($data['image'])) {
            $image = Storage::put('post_images', $data['image']);
            $data['image'] = $image;
        }

        $new_post = new Post();
        $new_post->fill($data);
        $new_post->slug = Post::generatePostSlug($new_post->title);
        $new_post->save();

        // Se la variabile $data con attributo ['tags'] è stata dichiarata ed è diversa da null
        if (isset($data['tags'])) {
            // tramite la funzione sync andiamo a riscrivere l'array dei tags
            $new_post->tags()->sync($data['tags']);
        }

        Mail::to('admin@boolpress.it')->send(new NewPostNotificationToAdmin($new_post));

        return redirect()->route('admin.posts.show', ['post' => $new_post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $current_post = Post::findOrFail($id);
        $category = $current_post->category;
        $tag = $current_post->tags;
        return view('admin.posts.show', compact('current_post', 'category', 'tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('current_post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->checkValidationRules());

        $data = $request->all();

        $current_post = Post::findOrFail($id);

        // Se l'utente modifica l'immagine
        if (isset($data['image'])) {
            // se l'immagine effettivamente è diversa dalla precedente
            if ($current_post->image) {
                // Elimina l'immagine precedente
                Storage::delete($current_post->image);
            }

            // Salva la nuova immagine
            $image = Storage::put('post_images', $data['image']);
            $data['image'] = $image;
        }


        $current_post->fill($data);
        $current_post->slug = Post::generatePostSlug($current_post->title);
        $current_post->save();
        // $data['slug'] = Post::generatePostSlugFromTitle($data['title']);
        // $current_post->update($data);

        // Se la variabile $data con attributo ['tags'] è stata dichiarata ed è diversa da null
        if (isset($data['tags'])) {
            // tramite la funzione sync andiamo a riscrivere l'array dei tags
            $current_post->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.posts.show', ['post' => $current_post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $current_post = Post::findOrFail($id);
        if($current_post->image) {
            Storage::delete($current_post->image);
        }
        $current_post->delete();

        return redirect()->route('admin.posts.index');
    }

    private function checkValidationRules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:45000',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'image' => 'image|max:1024'
        ];
    }
}
