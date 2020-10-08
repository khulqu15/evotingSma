<?php

namespace App\Http\Controllers;

use App\Mail\EVoting;
use App\Models\Voters;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class VotersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nis' => 'nullable',
                'nip' => 'nullable',
                'kelas' => 'nullable',
                'jurusan' => 'nullable',
                'profesi' => 'nullable',
            ]);
            $voter = new Voters();
            $voter->nis = $request->nis;
            $voter->nip = $request->nip;
            $voter->name = $request->name;
            $voter->gender = $request->gender;
            $voter->email = $request->email;
            $voter->kelas = $request->kelas;
            $voter->jurusan = $request->jurusan;
            $voter->profesi = $request->profesi;
            $voter->level = $request->level;
            if($request->level == "Lainnya") {
                $code_verify = Str::random(4);
                $voter->email_verify = $code_verify;
                $voter->save();
                return redirect()->route('vote', ['id' => $voter->id, 'name' => str_replace(' ', '_', $voter->name)]);
            }
            else {
                $voter->save();
                return redirect()->route('vote', ['id' => $voter->id, 'name' => str_replace(' ', '_', $voter->name)]);
            }
        } catch (\Exception $e) {
            return $this->exceptionHandle($e);
        }
    }

    public function voted(Request $request, $id, $name)
    {
        try {
            $voter = Voters::find($id);
            $voter->vote_id = $request->vote;
            $voter->save();
            return redirect()->route('respond', ['id' => $voter->id, 'name' => $name]);
        } catch(\Exception $e) {
            var_dump($e);
            exit;
        }
    }

    public function verifikasi($id)
    {
        $voter = Voters::find($id);
        if($voter->level !== "Lainnya") {
            return redirect()->route('form')->with('failure', 'Tidak ada verifikasi');
        } else {
            Mail::to($voter->email)->send(new EVoting($voter->email_verify));
            return view('general.verify', compact('voter'));
        }
    }

    public function verified(Request $request, $id)
    {
        $voter = Voters::find($id);
        $code_verify = $voter->email_verify;
        $code_request = $request->code;
        if($code_verify == $code_request) {
            return redirect()->route('vote', ['id' => $voter->id, 'name' => str_replace(' ', '_', $voter->name)]);
        } else {
            return redirect()->back()->with('failure', 'Code verifikasi tidak sesuai');
        }
    }

    public function votedUser()
    {
        return view('general.voted_page');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voters  $voters
     * @return \Illuminate\Http\Response
     */
    public function showApi($id)
    {
        $voter = Voters::find($id);
        return response()->json([
            'success' => true,
            'voter' => $voter
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voters  $voters
     * @return \Illuminate\Http\Response
     */
    public function edit(Voters $voters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voters  $voters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voters $voters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voters  $voters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voters $voters)
    {
        //
    }

    private function exceptionHandle(\Exception $e)
    {
        if($e instanceof ClientException) {
            $newException = json_decode($e->getResponse()->getBody()->getContents(), true);
            if($newException) {
                $e = new \Exception($newException['reason'], $newException['code']);
            }
        }
        $arr = [
            'error' => $e->getMessage(),
            'code' => $e->getCode()
        ];

        return redirect()->route('form')->with('failure', 'Anda sudah voting');
    }
}
