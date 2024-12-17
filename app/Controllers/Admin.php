<?php

namespace App\Controllers;

use Config\Email;

class Admin extends BaseController
{
    public function index()
    {
        $data['jumlahkategori'] = $this->db->table('kategori')
            ->countAllResults();
        $data['jumlahbuku'] = $this->db->table('buku')
            ->countAllResults();
        return view('admin/index', $data);
    }

    public function kategoridaftar()
    {
        $data['kategori'] = $this->db->table('kategori')
            ->get()
            ->getResult();
        return view('admin/kategoridaftar', $data);
    }

    public function kategoritambah()
    {
        return view('admin/kategoritambah');
    }

    public function kategoritambahsimpan()
    {
        $nama_kategori = $this->request->getPost('nama_kategori');
        $this->db->table('kategori')->insert([
            'nama_kategori' => $nama_kategori
        ]);
        return redirect()->to('admin/kategoridaftar')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function kategoriedit($id)
    {
        $data['kategori'] = $this->db->table('kategori')
            ->where(['id_kategori' => $id])
            ->get()
            ->getRow();
        return view('admin/kategoriedit', $data);
    }

    public function kategorieditsimpan($id)
    {
        $nama_kategori = $this->request->getPost('nama_kategori');
        $this->db->table('kategori')
            ->where(['id_kategori' => $id])
            ->update([
                'nama_kategori' => $nama_kategori
            ]);
        return redirect()->to('admin/kategoridaftar')->with('success', 'Data Berhasil Diubah');
    }

    public function kategorihapus($id)
    {
        $this->db->table('kategori')
            ->where(['id_kategori' => $id])
            ->delete();
        return redirect()->to('admin/kategoridaftar')->with('success', 'Data Berhasil Dihapus');
    }


    public function ebookdaftar()
    {
        // Query to get all books with their categories
        $search = $this->request->getVar('search');

        $sql = "SELECT bukudigital.*, kategori.nama_kategori 
                FROM bukudigital 
                LEFT JOIN kategori ON bukudigital.id_kategori = kategori.id_kategori";

        if ($search) {
            $sql .= " WHERE bukudigital.namabuku LIKE '%" . $this->db->escapeLikeString($search) . "%' 
                      OR bukudigital.kodebuku LIKE '%" . $this->db->escapeLikeString($search) . "%' 
                      OR bukudigital.penulis LIKE '%" . $this->db->escapeLikeString($search) . "%'";
        }

        $sql .= " ORDER BY idbuku DESC";

        $query = $this->db->query($sql);

        $buku = $query->getResultArray();

        $data = [
            'buku' => $buku,
            'search' => $search
        ];
        return view('admin/ebookdaftar', $data);
    }



    public function ebooktambah()
    {
        // Mendapatkan semua kategori
        $datakategori = $this->db->table('kategori')->get()->getResultArray();

        $data = [
            'datakategori' => $datakategori,
        ];
        return view('admin/ebooktambah', $data);
    }

    public function ebooktambahsimpan()
    {
        $nama = $this->request->getPost('nama');
        $kodebuku = $this->request->getPost('kodebuku');
        $id_kategori = $this->request->getPost('id_kategori');
        $deskripsi = $this->request->getPost('deskripsi');
        $penulis = $this->request->getPost('penulis');

        // Cek apakah kode buku sudah ada
        $cek = $this->db->table('bukudigital')->where('kodebuku', $kodebuku)->get()->getRowArray();
        if ($cek) {
            return redirect()->back()->with('error', 'Kode Buku Sudah Ada');
        }

        // Upload foto buku
        $foto = $this->request->getFile('foto');
        $namafoto = $foto->getRandomName();
        $foto->move(FCPATH . 'foto', $namafoto); // Menyimpan ke folder public/foto

        // Upload file buku
        $filebuku = $this->request->getFile('filebuku');
        $namafilebuku = $filebuku->getRandomName();
        $filebuku->move(FCPATH . 'foto', $namafilebuku); // Menyimpan ke folder public/foto

        // Simpan data buku
        $this->db->table('bukudigital')->insert([
            'namabuku' => $nama,
            'kodebuku' => $kodebuku,
            'id_kategori' => $id_kategori,
            'fotobuku' => $namafoto,
            'filebuku' => $namafilebuku,
            'deskripsibuku' => $deskripsi,
            'penulis' => $penulis,
        ]);

        return redirect()->to(base_url('admin/ebookdaftar'))->with('success', 'Buku Berhasil Disimpan');
    }

    public function ebookedit($id)
    {
        $builder = $this->db->table('bukudigital');
        $bukudigital = $builder->where('idbuku', $id)->get()->getRowArray();

        $kategoriBuilder = $this->db->table('kategori');
        $datakategori = $kategoriBuilder->get()->getResultArray();

        $data = [
            'bukudigital' => $bukudigital,
            'datakategori' => $datakategori
        ];

        return view('admin/ebookedit', $data);
    }

    public function ebookeditsimpan()
    {
        $id = $this->request->getPost('idbuku');
        $kodebukulama = $this->request->getPost('kodebukulama');
        $kodebuku = $this->request->getPost('kodebuku');

        $builder = $this->db->table('bukudigital');

        if ($kodebuku != $kodebukulama) {
            // Check if the new kodebuku already exists
            $exists = $builder->where('kodebuku', $kodebuku)->countAllResults();
            if ($exists > 0) {
                return redirect()->back()->with('error', 'Kode Buku Sudah Ada');
            }
        }

        $data = [
            'namabuku' => $this->request->getPost('nama'),
            'kodebuku' => $kodebuku,
            'id_kategori' => $this->request->getPost('id_kategori'),
            'deskripsibuku' => $this->request->getPost('deskripsi'),
            'penulis' => $this->request->getPost('penulis')
        ];

        // Handle file uploads
        $foto = $this->request->getFile('foto');
        if ($foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move(FCPATH . 'foto', $fotoName);
            $data['fotobuku'] = $fotoName;
        } else {
            $data['fotobuku'] = $this->request->getPost('fotolama');
        }

        $filebuku = $this->request->getFile('filebuku');
        if ($filebuku->isValid() && !$filebuku->hasMoved()) {
            $filebukuName = $filebuku->getRandomName();
            $filebuku->move(FCPATH . 'foto', $filebukuName);
            $data['filebuku'] = $filebukuName;
        } else {
            $data['filebuku'] = $this->request->getPost('filebukulama');
        }

        // Update the database
        $builder->where('idbuku', $id)->update($data);

        return redirect()->to(base_url('admin/ebookdaftar'))->with('success', 'Buku Berhasil Diperbarui');
    }

    public function ebookhapus($id)
    {
        $this->db->table('bukudigital')->where('idbuku', $id)->delete();

        return redirect()->to(base_url('admin/ebookdaftar'))->with('success', 'Data Berhasil Dihapus');
    }

    public function kendaraantambah()
    {
        $data['kategori'] = $this->db->table('kategori')->get()->getResult();
        return view('admin/kendaraantambah', $data);
    }

    public function kendaraantambahsimpan()
    {
        $data = $this->request->getPost();
        $foto = $this->request->getFile('foto');
        if (!$this->validate([
            'namakendaraan' => 'required',
            'id_kategori' => 'required',
            'nopol' => 'required',
            'warna' => 'required',
            'kapasitas' => 'required',
            'berlakustnk' => 'required',
            'terakhirservice' => 'required',
            'foto' => 'uploaded[foto]|max_size[foto,5120]|mime_in[foto,image/jpg,image/png,image/jpeg,image/gif]|is_image[foto]',
        ])) {
            return redirect()->back()->with('errors', $this->validator->listErrors());
        }

        if ($foto && $foto->getSize() != 0) {
            $newName = $foto->getRandomName();
            $foto->move('foto', $newName);
            $data['foto'] = $newName;
        }

        $this->db->table('kendaraan')->insert($data);
        return redirect()->to('admin/kendaraandaftar')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function laporanebook()
    {
        $builder = $this->db->table('bukudigital')
            ->join('kategori', 'bukudigital.id_kategori = kategori.id_kategori');

        $data['laporan'] = $builder->orderBy('bukudigital.idbuku', 'DESC')->get()->getResultArray();

        return view('admin/laporanebook', [
            'laporan' => $data['laporan']
        ]);
    }

    public function laporanebookcetak()
    {
        $builder = $this->db->table('bukudigital')
            ->join('kategori', 'bukudigital.id_kategori = kategori.id_kategori');

        $data['laporan'] = $builder->orderBy('bukudigital.idbuku', 'DESC')->get()->getResult();

        return view('admin/laporanebookcetak', [
            'laporan' => $data['laporan']
        ]);
    }


    public function penggunadaftar()
    {
        $data['pengguna'] = $this->db->table('pengguna')->where('id !=', session('user')->id)->get()->getResultArray();
        return view('admin/penggunadaftar', $data);
    }

    public function penggunatambah()
    {
        return view('admin/penggunatambah');
    }

    public function penggunatambahsimpan()
{
    // Mengambil data dari form
    $data = [
        'username'      => $this->request->getPost('username'),
        'nama'          => $this->request->getPost('nama'),
        'email'         => $this->request->getPost('email'),
        'telepon'       => $this->request->getPost('telepon'),
        'password'      => $this->request->getPost('password'),
        'alamat'        => $this->request->getPost('alamat'),
        'level'         => $this->request->getPost('level'),
        'tanggal_lahir' => $this->request->getPost('tanggal_lahir'), // Menambahkan tanggal lahir
        'jenis_kelamin' => $this->request->getPost('jenis_kelamin'), // Menambahkan jenis kelamin
    ];

    // Definisikan aturan validasi
    $validationRules = [
        'username' => [
            'rules' => 'required|is_unique[pengguna.username]',
            'label' => 'username',
            'errors' => [
                'required' => 'username harus diisi.',
                'is_unique' => 'username sudah terdaftar.'
            ]
        ],
        'nama' => 'required',
        'email' => 'required|valid_email',
        'telepon' => 'required|numeric',
        'password' => 'required|min_length[6]',
        'alamat' => 'required',
        'level' => 'required',
        'tanggal_lahir' => 'required|valid_date', // Validasi untuk tanggal lahir
        'jenis_kelamin' => 'required', // Validasi untuk jenis kelamin
    ];

    // Melakukan validasi
    if (!$this->validate($validationRules)) {
        // Jika validasi gagal, kembalikan ke form dengan error
        return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
    }

    // Mengambil foto jika ada
    $foto = null;
    if ($this->request->getFile('fotoprofil')) {
        $fotoFile = $this->request->getFile('fotoprofil');
        $fotoName = time() . '_' . $fotoFile->getName();
        $fotoFile->move('foto', $fotoName); // Pastikan folder 'foto' ada
        $foto = $fotoName;
    }

    // Menyimpan data
    $builder = $this->db->table('pengguna');
    $data['fotoprofil'] = $foto;
    $builder->insert($data);

    // Redirect atau pesan sukses
    return redirect()->to('admin/penggunadaftar')->with('success', 'Pengguna berhasil ditambahkan.');
}


    public function penggunaedit($id)
    {
        $data['pengguna'] = $this->db->table('pengguna')->where('id', $id)->get()->getRow();

        return view('admin/penggunaedit', $data);
    }

    public function penggunaeditsimpan($id)
    {
        // Mengambil data dari form
        $data = [
            'username'      => $this->request->getPost('username'),
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'telepon'  => $this->request->getPost('telepon'),
            'alamat'   => $this->request->getPost('alamat'),
            'level'    => $this->request->getPost('level'),
        ];

        // Definisikan aturan validasi
        $validationRules = [
            'username' => [
                'rules' => 'required|is_unique[pengguna.username,id,' . $id . ']', // username harus unik kecuali yang sedang diupdate
                'label' => 'username',
                'errors' => [
                    'required' => 'username harus diisi.',
                    'is_unique' => 'username sudah terdaftar.'
                ]
            ],
            'nama' => 'required',
            'email' => 'required|valid_email',
            'telepon' => 'required|numeric',
            'alamat' => 'required',
            'level' => 'required',
        ];

        // Melakukan validasi
        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembalikan ke form dengan error
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        // Mengupdate password jika diisi
        $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            $data['password'] = $newPassword; // Hash password
        } else {
            unset($data['password']); // Jangan update password jika tidak diisi
        }

        // Mengambil foto jika ada
        if ($this->request->getFile('fotoprofil')) {
            $fotoFile = $this->request->getFile('fotoprofil');
            $fotoName = time() . '_' . $fotoFile->getName();
            $fotoFile->move('foto/', $fotoName);
            $data['fotoprofil'] = $fotoName;
        }

        // Menyimpan data
        $builder = $this->db->table('pengguna');
        $builder->where('id', $id)->update($data);

        // Redirect atau pesan sukses
        return redirect()->to('admin/penggunadaftar')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function penggunahapus($id)
    {
        $builder = $this->db->table('pengguna');
        $builder->where('id', $id)->delete();
        return redirect()->to('admin/penggunadaftar')->with('success', 'Pengguna berhasil dihapus.');
    }


    public function profile()
    {
        $data['row'] = $this->db->table('pengguna')->where('id', session('user')->id)->get()->getRowArray();
        return view('admin/profile', $data);
    }

    public function profileupdate()
    {
        $user = session('user'); // Mengambil data pengguna dari session
        $id = $user->id; // Mengambil ID pengguna untuk pembaruan

        // Mengambil data dari form
        $data = [
            'username'      => $this->request->getPost('username'),
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'telepon'  => $this->request->getPost('telepon'),
            'alamat'   => $this->request->getPost('alamat'),
            'level'    => 'Admin',
        ];

        // Cek jika password diisi, jika ya, hash dan tambahkan ke data
        $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            $data['password'] = $newPassword; // Hash password
        }

        // Cek jika foto di-upload
        // if ($this->request->getFile('foto')->getSize() > 0) {
        //     $fotoFile = $this->request->getFile('foto');
        //     $fotoName = time() . '_' . $fotoFile->getName();
        //     $fotoFile->move(WRITEPATH . 'uploads', $fotoName); // Pastikan folder 'uploads' ada
        //     $data['fotoprofil'] = $fotoName; // Update foto hanya jika ada file baru
        // } 

        // Memulai query builder
        $builder = $this->db->table('pengguna');

        // Mengupdate data pengguna
        $builder->where('id', $id)->update($data);

        // Redirect atau pesan sukses
        return redirect()->to('admin/profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
