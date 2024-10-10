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
            <h2 class="mt-5 mb-4">Aggiungi un Libro</h2>
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
            <form action="{{route('book.add')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 form-floating">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Il nome della Rosa">
                    <label for="title">Titolo</label>
                </div>
                <div class="mb-3 form-floating">
                    <textarea class="form-control textarea-height" placeholder="Inserisci la descrizione"
                              id="description" name="description"></textarea>
                    <label for="description">Descrizione (opzionale)</label>
                </div>
                <div class="mb-3 form-floating nr_pages_width">
                    <input type="number" class="form-control" id="pages" name="pages" placeholder="10">
                    <label for="pages">N° Pagine (opzionale)</label>
                </div>
                <div class="mb-3 form-floating">
                    <select class="form-select" aria-label="Default select example" id="author_id" name="author_id">
                        <option selected>Seleziona l'Autore</option>
                        @foreach($authors as $author)
                            <option value="{{$author['id']}}">{{$author['name']}} - {{$author['birthday']}} </option>
                        @endforeach
                    </select>
                    <label for="author_id">Autore</label>
                </div>
                <div class="mb-4 form-floating">
                    <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                        <option selected>Seleziona la Categoria</option>
                        @foreach($categories as $category)
                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                        @endforeach
                    </select>
                    <label for="category">Categoria</label>
                </div>
                <div class="mb-3 form-floating">
                    <input type="file" class="form-control" id="cover_image" name="cover_image" placeholder="Copertina Libro">
                    <label for="cover">Copertina del Libro (opzionale)</label>
                </div>
                <div class="pt-4 border-top">
                    <button type="submit" class="btn btn-primary me-3">Aggiungi il Libro</button>
                    <a href="index.blade.php"
                       class="link-dark link-offset-2 link-underline-opacity-0 link-underline-opacity-100-hover">Annulla</a>
                </div>
            </form>
        </div>
    </section>
</main>
</body>

</html>
