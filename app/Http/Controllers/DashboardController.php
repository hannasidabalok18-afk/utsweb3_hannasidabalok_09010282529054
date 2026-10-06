<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah total
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        
        // mengambil 5 data buku terbaru beserta relasi kategorinya
        $books = Book::with('category')->latest()->take(5)->get();

        // Mengirimkan variabel ke view dashboard
        return view('dashboard', compact('totalBooks', 'totalCategories', 'books'));
    }
}