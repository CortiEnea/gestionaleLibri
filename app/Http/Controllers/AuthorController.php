<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class   AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('pages/list_author', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('pages/create_author');
    }

    /**
     * Store a newly created resource in storage.
     *e
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AuthorRequest $request)
    {
        $data = $request->validated();
        $author = new Author();
        $author->name = $data['name'];
        $author->birthday = $data['birthday'];
        $author->save();
        $authors = Author::all();
        return view('pages/list_author', ['authors' => $authors]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $author = Author::find($id);
        return view('pages/edit_author', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, $id) : RedirectResponse
    {
        Author::find($id)->update($request->validated());
        return redirect()->route('author.index')->with('success', 'Libro modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('author.index')->with('success', 'Autore eliminato con successo');
    }
}
