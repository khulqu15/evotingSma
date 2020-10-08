<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\User;
use App\Models\Voters;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function redirectLogin()
    {
        return redirect()->route('login.index');
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))) {
            Auth::user();
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login.index')->with('failure', 'Email / Password Salah');
        }
    }

    public function dropVoters()
    {
        if(Auth::check()) {
            DB::table('voters')->delete();
            return redirect()->route('admin.admin')->with('success', 'Voters deleted');
        } else {
            return abort(404);
        }
    }

    public function admin()
    {
        if(Auth::check()) {
            $candidates = Candidate::all();
            $voters = Voters::all();
            $candidate1 = Candidate::find(1);
            $voters1 = $candidate1->voters;
            $candidate2 = Candidate::find(2);
            $voters2 = $candidate2->voters;
            $candidates_desc = Candidate::orderBy('id', 'DESC')->get();
            return view('admin.dashboard', compact('candidates', 'voters', 'voters1', 'voters2', 'candidates_desc'));
        } else {
            return abort(404);
        }
    }

    public function participant(Request $request)
    {
        if(Auth::check()) {
            $name = !empty($request->get('name')) ? $request->get('name') : '';
            $pilihan = !empty($request->get('pilihan')) ? $request->get('pilihan') : '';
            $sorted = !empty($request->get('sorted')) ? $request->get('sorted') : '';
            $level = $request->get('level');
            if(empty($level)) {
                $level = "Siswa";
            }
            if($name != '') {
                if($pilihan != '') {
                    if($sorted != '') {
                        $voters = Voters::where('level', $level)
                                    ->where('name', 'LIKE', "%$name%")
                                    ->where('vote_id', $pilihan)
                                    ->orderBy('id', $sorted)->paginate(5);
                    } else {
                        $voters = Voters::where('level', $level)
                                    ->where('name', 'LIKE', "%$name%")
                                    ->where('vote_id', $pilihan)->paginate(5);
                    }
                } else {
                    if($sorted != '') {
                        $voters = Voters::where('level', $level)
                                    ->where('name', 'LIKE', "%$name%")
                                    ->orderBy('id', $sorted)->paginate(5);
                    } else {
                        $voters = Voters::where('level', $level)
                                    ->where('name', 'LIKE', "%$name%")->paginate(5);
                    }
                }
            } else {
                if($pilihan != '') {
                    if($sorted != '') {
                        $voters = Voters::where('level', $level)
                                    ->where('vote_id', $pilihan)
                                    ->orderBy('id', $sorted)->paginate(5);
                    } else {
                        $voters = Voters::where('level', $level)
                                    ->where('vote_id', $pilihan)->paginate(5);
                    }
                } else {
                    if($sorted != '') {
                        $voters = Voters::where('level', $level)
                                    ->orderBy('id', $sorted)->paginate(5);
                    } else {
                        $voters = Voters::where('level', $level)->paginate(5);
                    }
                }
            }
            return view('admin.participant', compact('voters'));
        } else {
            return abort(404);
        }
    }

    public function deleteParticipant($id)
    {
        if(Auth::check()) {
            $voter = Voters::find($id);
            $voter->delete();
            return redirect()->back()->with('success', 'Berhasil dihapus');
        } else {
            return abort(404);
        }
    }

    public function indexAdmin()
    {
        if(Auth::check()) {
            $me = Auth::user();
            $other = User::where('id', '!=', $me->id)->get();
            return view('admin.admin', compact('me', 'other'));
        } else {
            return abort(404);
        }
    }
    public function createAdmin()
    {
        if(Auth::check()) {
            $me = Auth::user();
            return view('admin.admin-form', compact('me'));
        } else {
            return abort(404);
        }
    }
    public function storeAdmin(Request $request)
    {
        if(Auth::check()) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->api_token = Str::random(25);
            $user->save();
            return redirect()->route('admin.admin')->with('success', 'Admin Created');
        } else {
            return abort(404);
        }
    }
    public function settingAdmin()
    {
        if(Auth::check()) {
            $me = Auth::user();
            return view('admin.admin-form', compact('me'));
        } else {
            return abort(404);
        }
    }
    public function destroyAdmin($id)
    {
        if(Auth::check()) {
            $user = User::find($id);
            $user->delete();
            return redirect()->route('admin.admin')->with('success', 'Admin Deleted');
        } else {
            return abort(404);
        }
    }
    public function updateAdmin(Request $request, $id)
    {
        if(Auth::check()) {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->api_token = Str::random(25);
            if(Hash::check($request->password, $user->password)) {
                $user->password = $request->passwordNew;
                $user->save();
                return redirect()->route('admin.admin')->with('success', 'Admin Updated');
            } else {
                return redirect()->back()->with('failure', 'Password tidak sesuai');
            }
        } else {
            return abort(404);
        }
    }


    public function indexCandidate()
    {
        if(Auth::check()) {
            $candidates = Candidate::all();
            return view('admin.candidate', compact('candidates'));
        } else {
            return abort(404);
        }
    }
    public function createCandidate()
    {

        if(Auth::check()) {
            return view('admin.candidate-form');
        } else {
            return abort(404);
        }
    }

    public function logout()
    {
        if(Auth::check()) {
            Auth::logout();
            return redirect()->route('login.index')->with('success', 'Logout Success');
        } else {
            return abort(404);
        }
    }
}
