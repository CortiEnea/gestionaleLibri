<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>I miei Libri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body class="bg-light">
    <main class="container">
        <section class="row">
            <div class="col-md-12 my-4">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="/" class="btn btn-secondary">Libri</a>
                    <a href="/listauthor" class="btn btn-secondary">Autori</a>
                    <a href="/listcategory" class="btn btn-secondary">Categorie</a>
                </div>
                <a href="/createbook" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Aggiungi un
                    Libro</a>
                <h2 class="mt-5 mb-4">I miei Libri</h2>
            </div>
        </section>

        <section class="row">
            <div class="col-md-12">
                <div class="list-book">
                    @foreach($books as $book)
                    <article class="card border-0">
                        <div class="card-body">
                            <h3 class="card-title">{{$book['title']}}</h3>
                            <div>di {{ $authors->find($book->author_id)->name }}</div>

                            <div class="mt-2"><span class="badge text-bg-secondary">{{ $categories->find($book->category_id)->name }}</span></div>
                            <div class="btn-group mt-3 d-flex justify-content-center" role="group">
                                <a href="/detail/{{$book->id}}" class="btn btn-light"><i class="bi bi-eye"></i></a>
                                <a href="/editbook/{{$book->id}}" class="btn btn-light"><i class="bi bi-pencil"></i></a>
                                <form action="{{route("book.delete", $book->id)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Sei sicuro di voler eliminare')">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>
                            </div>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

</body>

</html>
