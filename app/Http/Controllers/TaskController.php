<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;


class TaskController extends Controller
{

     protected $database;
     protected $tabel_name;
    
    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->tabel_name = 'todolist';

    }

    public function index(){
        $tabel_name = 'todolist';
        $collection = $this->database->getReference($tabel_name)->getValue();
        return view('apps.src.index', compact('collection'));
    }

    public function add(){
       return view('apps.src.add');
    }

    public function insert(Request $request){
        

        $postData = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'umur' => $request->umur,
        ];

        $postRef = $this->database->getReference($this->tabel_name)->push($postData);

        if($postRef){      
           return redirect('/')->with('pesan', 'Data sudah berhasil ditambahkan');
        }else{
            return redirect('/')->with('pesan', 'Data sudah gagal ditambahkan');
        }


    }

    public function edit($id){
     $key = $id;
     $data_edit = $this->database->getReference($this->tabel_name)->getChild($key)->getValue();
     if($data_edit){
        return view('apps.src.edit', compact('data_edit', 'key'));
     }else{
         response()->json(404);
     }

    }

    public function update(Request $request, $id){
        $postData = [
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'umur' => $request->umur,
        ];
        $key = $id;
        $data_edit = $this->database->getReference($this->tabel_name.'/'.$key)->update($postData);

        if($data_edit){      
            return redirect('/')->with('pesan', 'Data sudah berhasil diupdate');
         }else{
             return redirect('/')->with('pesan', 'Data sudah gagal diupdate');
         }
 
 
    }

    public function hapus($id){

        $key = $id;
        $data_edit = $this->database->getReference($this->tabel_name.'/'.$key)->remove();

        if($data_edit){      
            return redirect('/')->with('pesan', 'Data sudah berhasil dihapus');
         }else{
             return redirect('/')->with('pesan', 'Data sudah gagal dihapus');
         }

    }

    public function about(){
        return view('apps.src.about');
    }
    
}

