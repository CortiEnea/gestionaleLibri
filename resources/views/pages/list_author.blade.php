<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista Autori</title>
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
            <a href="/createauthor" class="btn btn-primary"><i
                    class="bi bi-plus-circle"></i> Aggiungi un'Autore</a>
            <h2 class="mt-5 mb-4">Gli Autori</h2>
        </div>
        <div class="col-md-6">

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col" class="w-auto">#</th>
                    <th scope="col" class="w-50">Autore</th>
                    <th scope="col" class="w-25">Data di nascita</th>
                    <th scope="col" class="w-auto text-end">Azioni</th>
                </tr>
                </thead>
                <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td class="align-middle">{{$author['id']}}</td>
                        <td class="align-middle">{{$author['name']}}</td>
                        <td class="align-middle">{{$author['birthday']}}</td>

                        <td class="text-end">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/editauthor/{{$author->id}}" class="btn btn-light"><i class="bi bi-pencil"></i></a>

                                <form action="{{route("author.delete", $author->id)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Sei sicuro di voler eliminare')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </section>
</main>
</body>

</html>
