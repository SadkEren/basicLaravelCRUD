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
    <link rel="stylesheet" href="css/mdb.min.css" />
  </head>
  <body>
  <br><br>
        <div class="container">


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
                @foreach($book as $key => $kitap)
                    <tr>
                        <th scope="row" >{{$key+1}}</th>
                        <th scope="row" >{{$kitap->name}}</th>
                        <th scope="row" >{{$kitap->book_code}}</th>
                        <th scope="row" >{{$kitap->author}}</th>
                        <th>
                            <a href="{{ route('bookDelete',['id'=>$kitap->id ]) }}" class="btn btn-sm btn-danger" >Sil</a>
                            <a href="{{ route('getBookEdit',['id'=>$kitap->id ]) }}" class="btn btn-sm btn-info" >Düzenle</a>
                        </th>
                    </tr>
                @endforeach
                </tbody>

            </table><br><br>

            <form method="POST" action="{{ isset($firstBook) ? url('book/edit') : url('book/store') }} ">
            {{csrf_field() }}
            <div class="form-outline mb-4">
                <input type="text" id="name" value="{{ isset($firstBook) ? $book->name : '' }}" name="name" class="form-control" />
                <label class="form-label" for="name">Kitap Adı</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="book_code" value="{{ isset($firstBook) ? $book->book_code : '' }}" name="book_code" class="form-control" />
                <label class="form-label" for="book_code">Kitap Kodu</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" id="author" value="{{ isset($firstBook) ? $book->author : '' }}" name="author" class="form-control" />
                <label class="form-label" for="form1Example2">Kitap Yazarı</label>
            </div>

            {!!  isset($firstBook)  ? '<input type="hidden" name="book_id" value="'.$firstBook->id.'" >' : '' !!}

            <!-- <button type="submit" name="kaydet" value="{{ isset($firstBook) ? 'Güncelle' : 'Kaydet' }}" class="btn btn-primary btn-block">Gönder</button> -->
            <input type="submit" name="kaydet" value="{{ isset($firstBook) ? 'Güncelle' : 'Kaydet' }}" class="btn btn-primary btn-block" >
            </form>

        </div>




    <script type="text/javascript" src="js/mdb.min.js"></script>

  </body>
</html>
