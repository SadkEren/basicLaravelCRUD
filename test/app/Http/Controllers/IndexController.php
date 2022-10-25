<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class IndexController extends Controller
{


    public function getIndex()
    {
        //$book = Book::find(1);//çekeceğim tablodaki 1. stünü.

        //$book = Book::where('id',2)->first();

        //$book = Book::whereRaw('id=? and author=?',array(1,2))->first(); //çalışmadı

        $book = Book::all(); //get()

        return view('index',array('book'=>$book));
    }

    public function postBook(Request $request) // aynı zaman da update fonksiyonunda bunun içinde yaptım.
    {
        $validateData = $request->validate(    //gelen verilkeri alıp validatrre ile kontrol ettiriyorum
            [
                'name' => 'required|string',
                'book_code' => 'required|integer',
                'author' => 'required|string'
            ]
        );  // Burada kontrol ettik. Hata durumunda hata döndür ekleyebiliriz.

        // Kayıt işlemleri

        $book = new Book();

        $book->name = $request->name ;  // book a name ekle . Veri request den gelecek.
        $book->book_code = $request->book_code;
        $book->author = $request->author;

        $book->save();

        return back(); // redireckt de kullanabilrisn.

    }

    public function bookDelete(int $id)
    {

        Book::where('id',$id)->delete();
        return redirect()->route('index');

    }


    public function getBookEdit(int $id)
    {

        $book = Book::all();

        $bookk = Book::where('id',$id)->first();

        return view('index',array('book'=>$book,'firstBook'=>$bookk)); //1. olan select işlemi için ikinci olan ise edit olarak yolladığımız.

    }

    public function postBookEdit(Request $request )
    {

        $validateData = $request->validate(    //gelen verilkeri alıp validate ile kontrol ettiriyorum
            [
                'name' => 'required|string',
                'book_code' => 'required|integer',
                'author' => 'required|string',
                'book_id' => 'required|integer'
            ]
        );

        //$edit = Book::find($request->book_id);

        $dit =Book::where('id',$request->book_id,)->update([
            'name'=>$request->name,
            'book_code'=>$request->book_code,
            'author'=>$request->author
        ]);


        return back();

    }





    //_______________________________________

    public function yolla()
    {
        $cek = Book::all();

        return  view('ekle',array('git'=>$cek)); // 'git'-> blade sayfasında yazdırılan değişkendir.
    }



    public function ekle(Request $request)
    {
        $veriDogrulama = $request->validate([
            'name' => 'required|string',
            'book_code' => 'required|integer',
            'author' => 'required|string',
        ]);

        $yeniBook = new Book([
            'name' => $request->name,
            'book_code' => $request->book_code,
            'author' => $request->author,
        ]);

        $yeniBook->save();

        return back();

    }



    public function edit(int $id)
    {
        $duzen = Book::where('id',$id)->first();

        return view('edit',array('duzen'=>$duzen));

    }

    public function postEdit(Request $request)
    {
        $veriDogrulama = $request->validate([
            'name' => 'required|string',
            'book_code' => 'required|integer',
            'author' => 'required|string',
            'book_id' =>'required|integer'
        ]);

        $yeniBook = Book::where('id',$request->book_id)->update([

            'name' => $request->name,
            'book_code' => $request->book_code,
            'author' => $request->author
        ]);

        //$yeniBook->save();

        return back();

    }


    public function sil($id)
    {
        Book::where('id',$id)->delete();
        return back();
    }


}
