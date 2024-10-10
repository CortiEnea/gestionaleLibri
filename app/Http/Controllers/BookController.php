<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $books = Book::all();
        $category = Category::all();
        $authors = Author::all();
        return view('pages/index', ['books' => $books, 'authors' => $authors, 'categories' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view('pages/create_book', ['authors' => $authors, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *e
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BookRequest $request)
    {
        /*$data = $request->validated();
        $book = new Book();
        $book->title = $data['title'];
        $book->description = $data['description'];
        $book->pages = $data['pages'];
        $book->author_id = $data['author_id'];
        $book->category_id = $data['category_id'];
        $book->save();
        */
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $image = Image::make($file)->resize(400, 520);
            $image->save(public_path('cover/' . $fileName));
            $imagePath = 'cover/' . $fileName;
        } else {
            $imagePath = 'cover/default.png';
        }
        $validatedData = $request->validated();
        $validatedData['cover_image'] = $imagePath;

        Book::create($validatedData);
        $books = Book::all();
        $categories = Category::all();
        $authors = Author::all();
        return view('pages/index', ['books' => $books, 'authors' => $authors, 'categories' => $categories]);

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
        $book = Book::find($id);

        $category_attuale = Category::find($book->category_id);
        $author_attuale = Author::find($book->author_id);
        $authors = Author::all();
        $categories = Category::all();

        return view('pages/edit-book', ['book' => $book, 'author_attuale' => $author_attuale, 'categoriy_attuale' => $category_attuale, 'authors' => $authors, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id) : RedirectResponse
    {
        Book::find($id)->update($request->validated());
        return redirect()->route('book.index')->with('success', 'Libro modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index')->with('success', 'Libro eliminato con successo');
    }

    public function detail(int $id)
    {
        $book = Book::find($id);
        $category = Category::find($book->category_id);
        $author = Author::find($book->author_id);
        return view('pages/detail_book', ['book' => $book, 'author' => $author, 'category' => $category]);
    }
}
