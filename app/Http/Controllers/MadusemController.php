<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Dosen;
use App\Models\Madusem;
use App\Models\Periode;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\MadusemExport;
use App\Imports\MadusemImport;
use App\Models\DeadlineSidang;
use App\Models\KomponenSidang;
use App\Models\KomponenMadusem;
use App\Models\MahasiswaImport;
use App\Models\KomponenPrasidang;
use App\Models\DosenKoordinatorPA;
use function App\Helpers\semester;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\KomponenMadusemPivot;
use Maatwebsite\Excel\Facades\Excel;
use function App\Helpers\tahunAjaran;
use Illuminate\Support\Facades\Validator;



class MadusemController extends Controller
{
    public function inputNilaiForm()
    {
        $tahun_ajaran = [];
        $periodes = [];
        $komponenNilai = KomponenMadusem::all();
        foreach (Periode::whereNull('bulan')->get() as $periode) {
            if (!in_array($periode->tahun_ajaran, $tahun_ajaran)) {
                $periodes[] = $periode;
                $tahun_ajaran[] = $periode->tahun_ajaran;
            }
        }
        $periode = tahunAjaran();
        if (request()->periode) {
            $periode = request()->periode;
        }
        return view('backend.komponen-nilai.madusem', [
            'total_komponen_madusem' => KomponenMadusem::sum('presentase'),
            'komponenNilai' => $komponenNilai,
            'periodes' => $periodes,
            'tahun_ajaran' => $periode,
            'semester' => semester(),
            'items' => MahasiswaImport::latest()->get(),            
            'mahasiswa' => Mahasiswa::all()
        ]);
    }

    public function detail($id)
    {
        $item = MahasiswaImport::find($id);

        if (!$item) {
            abort(404, 'Mahasiswa Import not found');
        }

        $items = Mahasiswa::whereMahasiswaImportId($id)->get();
     

        return view('backend.komponen-nilai.madusem-detail', compact('item', 'items'));
    }

    public function updateMadusem(Request $request, $id)
    {
        $request->validate([
            'students' => 'array', 
        ]);
    
        // Get the Mahasiswa records associated with the MahasiswaImport record
        $mahasiswas = Mahasiswa::whereMahasiswaImportId($id)->get();
    
        // Update madusem attribute for Mahasiswa records based on checkboxes
        foreach ($mahasiswas as $mahasiswa) {
            $mahasiswaId = $mahasiswa->id;
    
            $updateData = [
                'madusem' => in_array($mahasiswaId, $request->input('students', [])) ? 1 : 0,
            ];
    
            $mahasiswa->update($updateData);
        }
    // dd($request->all());
        return redirect()->back()->with('success', 'Madusem attribute updated successfully');
    }
    

    public function inputNilaiDetail($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $pembimbing = Dosen::all();
        $madusem = Madusem::where('mahasiswa_id', $id)->first();
    
        // Ambil data komponen nilai dari database
        $komponenNilai = KomponenMadusem::all();
    
        if (!$mahasiswa) {
            abort(404); 
        }
    
        $total = 0;
    
        // Periksa apakah relasi komponenMadusemPivots ada
        if ($madusem && $madusem->komponenMadusemPivots->isNotEmpty()) {
            // Jumlahkan nilai dari semua komponen
            $total = $madusem->komponenMadusemPivots->sum('nilai_komponen');
        }
    
        return view('backend.madusem.input-detail', [
            'mahasiswa' => $mahasiswa,
            'pembimbing' => $pembimbing,
            'madusem' => $madusem,
            'total' => $total,
            'komponenNilai' => $komponenNilai,
            'total_komponen_madusem' => KomponenMadusem::sum('presentase'),
            // Menambahkan variabel $komponenNilai
        ]);
    }
    



    ########## MADUSEM ##########
    public function addKomponenNilai(Request $request)
        {
            // Validasi data input
            $request->validate([
                'nama_komponen' => 'required|string',
                'presentase' => 'required|numeric',
            ]);

            // Logika untuk menyimpan data ke dalam database
            $komponen = new KomponenMadusem();
            $komponen->nama_komponen = $request->nama_komponen;
            $komponen->presentase = $request->presentase;
            $komponen->slug = Str::slug($request->nama_komponen);
            $komponen->save();

            return redirect()->back()->with('success', 'Komponen nilai berhasil ditambahkan');
        }



    public function deleteMadusem($id)
    {
        KomponenMadusem::find($id)->forceDelete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    public function inputNilai(){
    
        $komponenNilai = KomponenMadusem::all();
        $pembimbing = Dosen::all();
        $madusem = Madusem::first(); 
        return view('backend.madusem.input', [
            'pembimbing' => $pembimbing,
            'komponenNilai' => $komponenNilai,
            'madusem' => $madusem, // Pass the $madusem variable to the view
            'mahasiswa' => Mahasiswa::where('madusem', true)->get(),
        ]);
    
    }


    public function uploadExcel(Request $request)
    {

        DB::beginTransaction();
        try {
            Excel::import(new MadusemImport, $request->file('excelFile'));

            DB::commit();
            return redirect()->back()->with('success', 'Data berhasil diimpor.');
        } catch (\Exception $e) {
        
            DB::rollback();
            return redirect()->back()->with('warning', 'Gagal menambah data, silahkan cek kembali file anda');
        }
    }

    public function downloadExcel()
    {
        return Excel::download(new MadusemExport, 'madusem_data.xlsx');
    }

    public function store(Request $request)
        {
            $request->validate([
                'pbb_1_id' => 'required|exists:dosen,id',
                'pbb_2_id' => 'required|exists:dosen,id',
                'puj_1_id' => 'required|exists:dosen,id',
                'puj_2_id' => 'required|exists:dosen,id',
                'mahasiswa_id' => 'required|exists:mahasiswa,id',
            ]);
    
                // Logika untuk store jika diperlukan
                $madusem = new Madusem([
                    'pbb_1_id' => $request->pbb_1_id,
                    'pbb_2_id' => $request->pbb_2_id,
                    'puj_1_id' => $request->puj_1_id,
                    'puj_2_id' => $request->puj_2_id,
                    'mahasiswa_id' => $request->mahasiswa_id,
                ]);

                $madusem->save();
                
                $madusemId = $madusem->id;

                // dd($madusem);
                // Iterasi melalui nilai komponen dan simpan ke dalam tabel pivot
                foreach ($request->input('nilai_komponen') as $komponenId => $nilai) {
                    // Pastikan nilai_komponen yang dikirim sesuai dengan nama input di form
                    KomponenMadusemPivot::create([
                        'madusem_id' => $madusemId,
                        'komponen_madusem_id' => $komponenId,
                        'nilai_komponen' => $nilai,
                    ]);
                }

        
        
                return redirect()->back()->with('success', 'Berhasil Menyimpan Data');
            }

            public function update(Request $request, $id)
            {
                $madusem = Madusem::findOrFail($id);
            
                // Update data Madusem sesuai request
                $madusem->update([
                    'pbb_1_id' => $request->pbb_1_id,
                    'pbb_2_id' => $request->pbb_2_id,
                    'puj_1_id' => $request->puj_1_id,
                    'puj_2_id' => $request->puj_2_id,
                    'mahasiswa_id' => $request->mahasiswa_id,
                ]);
            
                // Periksa apakah $request->komponen_nilai adalah array
                if (is_array($request->komponen_nilai)) {
                    // Iterasi melalui nilai komponen dan lakukan pembaruan
                    foreach ($request->komponen_nilai as $komponenId => $nilai) {
                        $pivot = $madusem->komponenMadusemPivots()->where('komponen_madusem_id', $komponenId)->first();
                        if ($pivot) {
                            $pivot->update(['nilai_komponen' => $nilai]);
                        } else {
                            $pivot = new KomponenMadusemPivot([
                                'komponen_madusem_id' => $komponenId,
                                'nilai_komponen' => $nilai,
                            ]);
                            $madusem->komponenMadusemPivots()->save($pivot);
                        }
                    }
                }
            
                return redirect()->back()->with('success', 'Berhasil Memperbarui Data');
            }
            
        
    public function nilaiMadusem()
    {
        $komponenNilai = KomponenMadusem::all();
        $komponenPrasidang = KomponenPrasidang::all();
        $mahasiswaId = auth()->user()->mahasiswa->id;
        $madusem = Madusem::where('mahasiswa_id', $mahasiswaId)->first();
            
        if ($madusem == null) {
            return redirect()->back()->with('warning', 'Data belum tersedia');
        }
            
        $pbb1Name = Dosen::find($madusem->pbb_1_id)->nama_gelar;
        $pbb2Name = Dosen::find($madusem->pbb_2_id)->nama_gelar;
        $puj1Name = Dosen::find($madusem->puj_1_id)->nama_gelar;
        $puj2Name = Dosen::find($madusem->puj_2_id)->nama_gelar;
            
            return view('backend.nilai-madusem.index-madusem', compact('madusem', 'pbb1Name', 'pbb2Name', 'komponenNilai','puj1Name','puj2Name','komponenPrasidang'));
        }

    public function print($mahasiswaId)
    {
        $madusem = Madusem::where('mahasiswa_id', $mahasiswaId)->first();
        $periode = $madusem->periode;
        $komponenNilai = KomponenMadusem::all();
        $komponenPrasidang = KomponenPrasidang::all();
        if ($madusem == null) {
            return redirect()->back()->with('warning', 'Data belum tersedia');
        }
        // Loop through the collection and fetch PBB names
        $pbb1name = Dosen::find($madusem->pbb_1_id)->nama_gelar;
        $pbb2name = Dosen::find($madusem->pbb_2_id)->nama_gelar;
        $puj1Name = Dosen::find($madusem->puj_1_id)->nama_gelar;
        $puj2Name = Dosen::find($madusem->puj_2_id)->nama_gelar;
    
        return view('backend.nilai-madusem.print', compact('madusem','pbb1name','pbb2name','komponenNilai','puj1Name','puj2Name','komponenPrasidang'));
    }
    
    public function uploadRevisi(Request $request)
    {
        $request->validate([
            'madusem_id' => 'required|exists:madusem,id',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048', // Sesuaikan dengan jenis dan ukuran file yang diizinkan
        ]);

        // Simpan file di penyimpanan file
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName(); // Nama asli file
        $path = $file->storeAs('revisi', $fileName);

        $madusem = Madusem::findOrFail($request->madusem_id);
        $madusem->file_revisi = $fileName; // Atau sesuaikan dengan informasi yang ingin Anda simpan
        $madusem->save();
        // Lakukan operasi lainnya sesuai kebutuhan, misalnya menyimpan path file di database

        // Redirect atau kembali ke halaman yang diinginkan
        return redirect()->back()->with('success', 'Revisi berhasil diunggah.');
    }


}
