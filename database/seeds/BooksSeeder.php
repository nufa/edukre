<?php

use Illuminate\Database\Seeder;
use App\Author;
use App\Book;
use App\BorrowLog;
use App\User;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sample Penulis
        $author1 = Author::create(['name'=>'Mohammed Salah']);
        $author2 = Author::create(['name'=>'Taylor Otwell']);
        $author3 = Author::create(['name'=>'John Doe']);

        //Sample Buku
        $book1 = Book::create(['title'=>'Teknik Menggiring Bola', 'amount'=>3, 'author_id'=>$author1->id]);
        $book2 = Book::create(['title'=>'Memahami Framework Laravel Untuk Professional', 'amount'=>2, 'author_id'=>$author2->id]);
        $book3 = Book::create(['title'=>'Tutorial Desain Web Agar Menarik', 'amount'=>4, 'author_id'=>$author3->id]);
        $book4 = Book::create(['title'=>'Menjadi Desainer Professional', 'amount'=>3, 'author_id'=>$author3->id]);

        //Sample peminjaman buku
        $member = User::where('email', 'member@gmail.com')->first();
        BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book1->id, 'is_returned' => 0]);
        BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book2->id, 'is_returned' => 0]);
        BorrowLog::create(['user_id' => $member->id, 'book_id'=>$book3->id, 'is_returned' => 1]);
    }
}
