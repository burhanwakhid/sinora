<?php

namespace App\Http\Controllers;

use App\Models\Notulensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class NotulensiController extends Controller
{
    //view create
    public function create()
    {
        return view('admin.notulensi.create');
    }


    /// store notulensi ke database
    public function store(Request $request)
    {
        // var image string 
        $image = '';

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $image= $filename;
        }
      

        $notulensi = Notulensi::create([
            'kegiatan' => $request->kegiatan,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'pemimpin_kegiatan' => $request->pemimpin_kegiatan,
            'peserta' => $request->peserta,
            'dokumentasi' => $image,
            'notulensi' => $request->notulensi,
            'status' => 'rejected',
            'id_user' => auth()->id(),
        
        ]);

        return redirect('/beranda');
    }

    // show all data
    public function index()
    {
        // $notulensi = DB::table('notulensi')->paginate();
        //join table with user
        $notulensi = Notulensi::join('users', 'notulensi.id_user', '=', 'users.id')->paginate();

        return view('admin.notulensi.index', compact('notulensi'));
    }

    /// update status notulensi
    public function updateStatusNotulensi(Request $request, $id)
    {
        $notulensi = Notulensi::find($id);
        $notulensi->status = $request->status;
        $notulensi->save();
        return redirect('/notulensi');
    }

    /// delete notulensi
    public function deleteNotulensi($id)
    {
        $notulensi = Notulensi::find($id);
        $notulensi->delete();
        return redirect('/notulensi');
    }
    
    /// show notulensi by id user
    public function showNotulensiByIdUser($id)
    {
        $notulensi = Notulensi::join('users', 'notulensi.id_user', '=', 'users.id')->where('notulensi.id_user', $id)->paginate();
        return view('admin.notulensi.detail_notulensi', compact('notulensi'));
    }

    /// show notulensi by id notulensi
    public function showNotulensiByIdNotulensi($id)
    {
        $notulensi = Notulensi::find($id);
        return view('admin.notulensi.detail_notulensi', compact('notulensi'));
    }
    

    public function getNotulensi(Request $request)
    {
        if ($request->ajax()) {

            // check user is admin
            if (auth()->user()->tipe != 'admin') {
                $data = Notulensi::where('status', 'approved')->get();
            } else {
                $data = Notulensi::all();
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="'.route('notulensi.showNotulensiByIdNotulensi', $row->id).'" class="btn btn-info btn-m"><i class="fa fa-info"></i></a>';
                    $actionBtn .= '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action', 'notulensi'])
                ->make(true);
        }
    }


}
