<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function prosesLogin()
    {
        $data = $this->request->getPost();

        $credentials = $this->db->table('pengguna')->where('username', $data['username'])->get()->getRow();

        if ($credentials && $data['username'] == $credentials->username && $data['password'] == $credentials->password) {
            session()->set('user', $credentials);

            if ($credentials->level == 'Admin' || $credentials->level == 'Staft') {
                return redirect()->to('admin');
            } else {
                return redirect()->to(base_url('/'));
            }
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah, Silahkan coba lagi');
        }
    }

    public function logout()
    {
        session()->remove('user');
        return redirect()->to(base_url('/login'));
    }

    public function daftar()
    {
        return view('daftar');
    }

    public function daftarsimpan()
    {
        $data = $this->request->getPost();
        
        // Menambahkan data untuk tanggal lahir dan jenis kelamin
        $data['tanggal_lahir'] = $this->request->getPost('tanggal_lahir');
        $data['jenis_kelamin'] = $this->request->getPost('jenis_kelamin');
        
        $foto = $this->request->getFile('foto');
    
        // Validasi form
        if (!$this->validate([
            'foto' => 'uploaded[foto]|max_size[foto,5120]|mime_in[foto,image/jpg,image/png,image/jpeg,image/gif]',
            'username' => 'required|is_unique[pengguna.username]',
            'password' => 'required',
            'email' => 'required|valid_email',
            'nama' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|valid_date', // Validasi tanggal lahir
            'jenis_kelamin' => 'required|in_list[Laki-laki,Perempuan]' // Validasi jenis kelamin
        ])) {
            return redirect()->back()->with('errors', $this->validator->listErrors());
        }
    
        // Menangani upload foto
        if ($foto && $foto->getSize() > 0) {
            $newName = $foto->getRandomName();
            $foto->move('foto', $newName);
            $data['fotoprofil'] = $newName;
        }
    
        // Menyimpan data pengguna ke database
        $this->db->table('pengguna')->insert($data);
    
        return redirect()->to('/login')->with('success', 'Data Berhasil Ditambahkan');
    }
    
}
