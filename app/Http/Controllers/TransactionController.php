<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\location;
use App\Models\vehicle_type;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Transaction';
        $transactions = transaction::with(['location', 'vehicle_type'])->get();

        $locations = location::all();
        $vehicle_types = vehicle_type::all();

        $selectVeh = $request->get('vehicle_id', $vehicle_types->first()->id ?? 1);

        $serverTime = Carbon::now()->toIso8601String();
        $tickets = transaction::with(['location', 'vehicle_type'])->orderBy('id', 'desc')->get();



        return view('transaction.index', compact('title', 'transactions', 'serverTime', 'locations', 'vehicle_types', 'selectVeh', 'tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function submitEnter(request $request)
    {
        $request->validate([
            'id_lokasi' => 'required',
            'id_jenis' => 'required',
        ]);

        $location = location::find($request->id_lokasi);
        $veh = vehicle_type::find($request->id_jenis);

        if ($location->getSlot($veh->id) <= 0) {
            return back()->with('error', 'Maaf, kapasitas parkir untuk tipe kendaraan ini sudah penuh!');
        }

        $no_ticket = 'PRK-' . date('YmdHis');

        $ticket = transaction::create([
            'id_lokasi' => $request->id_lokasi,
            'id_jenis' => $request->id_jenis,
            'no_ticket' => $no_ticket,
            'no_polisi' => '-',
            'masuk' => Carbon::now(),
        ]);

        $tx = transaction::with(['location', 'vehicle_type'])->find($ticket->id);


        return back()->with('masuk_success', $ticket->id);
    }

    public function exit(request $request) {
        $request->validate([
            'no_ticket' => 'required',
            'no_polisi' => 'required',
        ]);

        $transaction = transaction::where('no_ticket', $request->no_ticket)
            ->whereNull('keluar')
            ->first();

        if (!$transaction) {
            return back()->with('error', 'Nomor tiket tidak ditemukan atau sudah keluar!');
        }

        $biaya = vehicle_type::find($transaction->id_jenis);
        $waktuMasuk = Carbon::parse($transaction->masuk);
        $waktuKeluar = Carbon::now();

        $totalmenit = $waktuMasuk->diffInMinutes($waktuKeluar);
        $total_jam_simulasi = ceil($totalmenit / 60);

        if ($total_jam_simulasi <= 0) {
            $total_jam_simulasi = 1;
        }

        if ($total_jam_simulasi == 1) {
            $total_bayar = $biaya->perjam_pertama;
        } else {
            $total_bayar = $biaya->perjam_pertama + (($total_jam_simulasi - 1) * $biaya->perjam_berikutnya);
        }

        if ($total_bayar > $biaya->max_perhari) {
            $total_bayar = $biaya->max_perhari;
        }

        $transaction->update([
            'no_polisi' => strtoupper(trim($request->no_polisi)),
            'keluar' => $waktuKeluar,
            'perjam_pertama' => $biaya->perjam_pertama,
            'perjam_berikutnya' => $biaya->perjam_berikutnya,
            'max_perhari' => $biaya->max_perhari,
            'total_jam' => $total_jam_simulasi,
            'total_bayar' => $total_bayar
        ]);

        return back()->with('exit_success', $transaction);
    }

    
    
}
