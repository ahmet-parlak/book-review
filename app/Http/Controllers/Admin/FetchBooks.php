<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\BookAuthor;
use App\Models\BookCategory;
use Illuminate\Support\Str;

class FetchBooks extends Controller
{
    public function index()
    {
        return view("admin.fetchbooks.index");
    }

    public function fetch(Request $request)
    {
        $publisher = Publisher::where('publisher_name', 'LIKE', '%' . $request->publisher . '%')->first();
        if ($publisher) {

            //Item Counts
            if ($request->item_count) {
                $psize = $request->item_count;
            } else {
                $psize = 1000;
            }

            /* Fetch books */
            $p = rawurlencode(mb_strtoupper($publisher->publisher_name));
            $url = "https://api2.isbndb.com/publisher/{$p}?page=1&pageSize=" . $psize;
            $restKey = '48819_1b37a1ccde67e472b3b1922d1b1ebe73';

            $headers = array(
                "Content-Type: application/json",
                "Authorization: " . $restKey
            );

            $rest = curl_init();
            curl_setopt($rest, CURLOPT_URL, $url);
            curl_setopt($rest, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($rest, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($rest);

            curl_close($rest);

            //File write
            file_put_contents('fetchedbooks\\' . str_replace(" ", "_", $publisher->publisher_name) ."_". date('d.m.y_h.i.s',time()) . '.json', $response);
            /* Fetch books# */

            //DB

            foreach (json_decode($response)->books as $book) {
                if (isset($book->authors)) { //if book have an author

                    //if book doesn't exist
                    if (!Book::whereIsbn($book->isbn13)->first()) {
                        $db_book = Book::create([
                            'isbn' => $book->isbn13,
                            'title' => Str::limit($book->title, 200, '...'),
                            'publisher_id' => $publisher->id,
                            'publication_year' => $book->date_published ?? "unknown",
                            'pages' => $book->pages ?? null,
                            'book_photo' => $book->image ?? null,
                            'language' => $book->language ?? 'tr',
                        ]);

                        /* Book Author */
                        foreach ($book->authors as $author) {
                            $db_author = Author::where('author_name', 'LIKE', '%' . $author . '%')->first();
                            //Create author if not exist
                            if (!$db_author) {
                                $db_author = Author::create(['author_name' => $author]);
                            }
                            BookAuthor::create(['book_id' => $db_book->id, 'author_id' => $db_author->id]);
                        }

                        /* Book Category */
                        if (isset($book->subjects)) {
                            foreach ($book->subjects as $subject) {
                                $db_category = Category::where('category_name', 'LIKE', '%' . $subject . '%')->first();
                                //Create author if not exist
                                if (!$db_category) {
                                    $db_category = Category::create(['category_name' => $subject]);
                                }
                                BookCategory::create(['book_id' => $db_book->id, 'category_id' => $db_category->id]);
                            }
                        } else {
                            BookCategory::create(['book_id' => $db_book->id, 'category_id' => 1]);
                        }
                    }
                }
            }

            //return "success";
            return redirect()->route('fetchbooks')->withSuccess('success');
        } else {
            return "publisher not found";
        }
    }
}
