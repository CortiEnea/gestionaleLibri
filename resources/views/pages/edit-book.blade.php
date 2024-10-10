<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aggiungi un Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body class="bg-light">
<main class="container">
    <section class="row">
        <div class="col-md-12 my-4">
            <h2 class="mt-5 mb-4">Modifica di {{$book->title}}</h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-md-5">
            <form action="{{route('book.update', $book->id)}}" method="post">
                @csrf
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Il nome della Rosa" value="{{$book->title}}">
                    <label for="title">Titolo</label>
                </div>
                <div class="mb-3 form-floating">
                    <textarea class="form-control textarea-height"
                              id="description" name="description" >{{$book->description}}</textarea>
                    <label for="description">Descrizione (opzionale)</label>
                </div>
                <div class="mb-3 form-floating nr_pages_width">
                    <input type="number" class="form-control" id="pages" name="pages" value="{{$book->pages}}">
                    <label for="pages">N° Pagine (opzionale)</label>
                </div>
                <div class="mb-3 form-floating">
                    <select class="form-select" aria-label="Default select example" id="author_id" name="author_id">
                        <option value="{{$author_attuale['id']}}">{{$author_attuale['name']}} - {{$author_attuale['birthday']}} </option>
                        @foreach($authors as $author)
                            <option value="{{$author['id']}}">{{$author['name']}} - {{$author['birthday']}} </option>
                        @endforeach
                    </select>
                    <label for="author_id">Autore</label>
                </div>
                <div class="mb-4 form-floating">
                    <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                        <option value="{{$categoriy_attuale['id']}}">{{$categoriy_attuale['name']}}</option>
                        @foreach($categories as $category)
                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                        @endforeach
                    </select>
                    <label for="category">Categoria</label>
                </div>
                <div class="mb-3 form-floating">
                    <input type="file" class="form-control" id="cover" placeholder="Copertina Libro">
                    <label for="cover">Copertina del Libro (opzionale)</label>
                </div>
                <div class="pt-4 border-top">
                    <button type="submit" class="btn btn-primary me-3">Modifica il Libro</button>
                    <a href="index.blade.php"
                       class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
                </div>
            </form>
        </div>
    </section>
</main>
</body>

</html>
