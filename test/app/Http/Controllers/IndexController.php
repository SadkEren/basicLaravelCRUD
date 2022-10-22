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

    public function postBook(Request $request)
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

        $book->name = $request->name ;  // book a nam ekle . Veri request den gelecek.
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

        $book = Book::all(); //get()

        $book = Book::where('id',$id)->first();

        return view('index',array('book'=>$book,'firstBook'=>$book));



    }


}
