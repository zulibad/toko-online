<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
    * Action untuk menampilkan semua kategori
    */
    public function index(){
        $daftar_kategori = \App\Category::paginate(3);
        // return view("kategori.index", ["daftar_kategori" => $daftar_kategori]);
        return view("kategori.index", compact("daftar_kategori"));
    }
    /**
    * Action untuk mencari kategori berdasarkan nama
    */
    public function search(Request $request){
        // dapatkan keyword dari querystring ?name=keyword
        $keyword = $request->get("name");
        // cari kategori where name == keyword dari querystring
        return \App\Category::where("name", "LIKE", "%$keyword%")->get();
     }
    /**
    * Action untuk delete kategori
    */
    public function delete($id){
        $category = \App\Category::findOrFail($id);

        if(!$category->trashed()){
            $category->delete();
            return "Kategori $category->name berhasil dihapus";
        }
    }
    /**
    * Action untuk merestore kategori yang telah didelete
    */
    public function restore($id){
        $category = \App\Category::withTrashed()->findOrFail($id);

        if(!$category->trashed()){
            return "Kategori tidak perlu direstore";
        }
        return "Kategori $category->name berhasil direstore";
    }
    /**
    * Action untuk permanent delete dari database (tidak bisa direstore)
    */
    public function permanentDelete($id){
        $category = \App\Category::withTrashed()->findOrFail($id);

        $category->forceDelete();
            return "Kategori $category->name berhasil dihapus permanent. Tidak bisa direstore";
    }
}
