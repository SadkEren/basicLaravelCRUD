<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
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
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Book Code</label>
                <input type="text" name="book_code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Author</label>
                <input type="text" name="author" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>


            <button type="submit" class="btn btn-primary">Gönder</button>
        </form>

            <br>

            <a href="{{ url('/') }}" ><button class="btn btn-primary " > Diğer sayfaya Git </button></a>

            <br>
            <br>


            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="cole" >No</th>
                        <th scope="cole" >Kitap Adı</th>
                        <th scope="cole" >Kodu</th>
                        <th scope="cole" >Kitap Yazarı</th>
                        <th scope="cole" >İşlemler</th>
                        <th scope="cole" ></th>
                    </tr>
                </thead>

                <tbody>
                @foreach($git as $key => $kitap)
                <tr>
                        <th scope="row" >{{$key+1}}</th>
                        <th scope="row" >{{$kitap->name}}</th>
                        <th scope="row" >{{$kitap->book_code}}</th>
                        <th scope="row" >{{$kitap->author}}</th>
                        <th>
                            <a href="{{ route('sil',['id'=>$kitap->id ]) }}" class="btn btn-sm btn-danger" >Sil</a>

                            <a href="{{ route('edit',['id'=>$kitap->id ]) }}" class="btn btn-sm btn-info" >Düzenle</a>
                        </th>
                    </tr>

                @endforeach
                </tbody>

            </table><br><br>



        </div>

    <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>

  </body>
</html>
