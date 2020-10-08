<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Voters;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() { return view('general.home'); }
    public function form() { return view('general.form'); }
    public function loginPage() { return view('admin.login'); }
    public function vote($id, $name) {
        $voter = Voters::where('id', $id)->where('name', str_replace('_', ' ', $name))->first();
        if($voter) {
            if($voter->vote_id == null) {
                $candidates = Candidate::all();
                return view('general.voting', compact('voter', 'candidates'));
            } else {
                return $this->redirectForm('failure', 'Anda sudah voting');
            }
        } else {
            return $this->redirectForm('failure', 'Silahkan isi form terlebih dahulu');
        }
    }
    public function respond($id, $name) {
        $voter = Voters::where('id', $id)->where('name', str_replace('_', ' ', $name))->first();
        if($voter) {
            return view('general.respond', compact('voter'));
        } else {
            return $this->redirectForm('failure', 'Silahkan isi form terlebih dahulu');
        }
    }

    private function redirectForm($session, $msg) {
        return redirect()->route('form')->with($session, $msg);
    }
}
