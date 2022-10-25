<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title> KİTAPÇI </title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="{{  asset('css/mdb.min.css')}}" />
  </head>
  <body>
  <br><br>
        <div class="container">

         <form method="POST" action="{{ url('ekle/kitap') }}">

            {{csrf_field() }}

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" value="{{ $duzen->name }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Book Code</label>
                <input type="text" name="book_code" value="{{ $duzen->book_code }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Author</label>
                <input type="text" name="author" value="{{ $duzen->author }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            {!!  isset($duzen)  ? '<input type="hidden" name="book_id" value="'.$duzen->id.'">' : '' !!}

            <button type="submit" class="btn btn-primary">Gönder</button>
        </form>

            <br>

            <a href="{{ url('/') }}" ><button class="btn btn-primary " > Diğer sayfaya Git </button></a>

            <br>
            <br>



        </div>

    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>

  </body>
</html>

