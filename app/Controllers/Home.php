<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $builder = $this->db->table('bukudigital');
        $builder->join('kategori', 'bukudigital.id_kategori = kategori.id_kategori', 'left');

        // Memproses input pencarian
        $keyword = $this->request->getPost('keyword');
        if (!empty($keyword)) {
            $builder->like('kodebuku', $keyword);
            $builder->orLike('namabuku', $keyword);
            $builder->orLike('penulis', $keyword);
        }

        // Pagination setup
        $perPage = 9;  // Menampilkan 9 buku per halaman
        $currentPage = $this->request->getVar('page') ?: 1;  // Halaman saat ini
        $offset = ($currentPage - 1) * $perPage;

        // Hitung total buku untuk pagination
        $totalBooks = $builder->countAllResults(false);  // Tidak menghitung hasil yang sudah di-filter
        $totalPages = ceil($totalBooks / $perPage);  // Total halaman

        // Ambil data buku dengan limit dan offset
        $builder->limit($perPage, $offset);
        $query = $builder->get();
        $data['bukudigital'] = $query->getResultArray();

        // Pass data pagination ke view
        $data['totalPages'] = $totalPages;
        $data['currentPage'] = $currentPage;
        $data['keyword'] = $keyword;  // Pass keyword pencarian ke view

        // Load view dan pass data buku digital
        return view('home', $data);
    }

    public function buku()
    {
        $perPage = 6; // Jumlah item per halaman
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1; // Mendapatkan nomor halaman saat ini
        $offset = ($currentPage - 1) * $perPage; // Menghitung offset

        if ($this->request->getPost('keyword')) {
            $data['keyword'] = $this->request->getPost('keyword');
            $data['buku'] = $this->db
                ->table('buku')
                ->join('kategori', 'buku.id_kategori = kategori.id_kategori')
                ->groupStart()
                ->like('namabuku', $this->request->getPost('keyword'))
                ->orLike('nopol', $this->request->getPost('keyword'))
                ->orLike('warna', $this->request->getPost('keyword'))
                ->groupEnd()
                ->orderBy('idbuku', 'DESC')
                ->limit($perPage, $offset) // Mengatur limit dan offset
                ->get()
                ->getResult();

            // Menghitung total data
            $total = $this->db->table('buku')
                ->join('kategori', 'buku.id_kategori = kategori.id_kategori')
                ->groupStart()
                ->like('namabuku', $this->request->getPost('keyword'))
                ->orLike('nopol', $this->request->getPost('keyword'))
                ->orLike('warna', $this->request->getPost('keyword'))
                ->groupEnd()
                ->countAllResults();
        } else {
            $data['keyword'] = '';
            $data['buku'] = $this->db
                ->table('buku')
                ->join('kategori', 'buku.id_kategori = kategori.id_kategori')
                ->orderBy('idbuku', 'DESC')
                ->limit($perPage, $offset) // Mengatur limit dan offset
                ->get()
                ->getResult();

            // Menghitung total data
            $total = $this->db->table('buku')
                ->join('kategori', 'buku.id_kategori = kategori.id_kategori')
                ->countAllResults();
        }

        // Penanganan jika tidak ada hasil
        if (empty($data['buku'])) {
            $data['message'] = 'Tidak ada buku ditemukan.';
        }

        // Menghitung total halaman
        $data['totalPages'] = ceil($total / $perPage);
        $data['currentPage'] = $currentPage;

        return view('buku', $data);
    }

    public function bukudetail($id)
    {
        $data['detail'] = $this->db
            ->table('buku')
            ->join('kategori', 'buku.id_kategori = kategori.id_kategori')
            ->where(['idbuku' => $id])
            ->get()
            ->getRow();

        $data['peminjamandetail'] = $this->db
            ->table('peminjamandetail')
            ->join('peminjaman', 'peminjamandetail.idpeminjaman = peminjaman.idpeminjaman')
            ->join('pengguna', 'peminjaman.idpengguna = pengguna.id')
            ->where(['peminjamandetail.idbuku' => $id])
            ->get()
            ->getResult();

        return view('bukudetail', $data);
    }

    public function bukupinjam($id)
    {
        $cart = session()->get('keranjang') ?? [];
        $jumlah = 1;

        // Cek apakah idbuku sudah ada di dalam keranjang
        if (isset($cart[$id])) {
            // Jika ada, tambahkan jumlahnya
            $jumlah = $cart[$id]['jumlah'] + 1;
        }

        // Update atau tambahkan data ke keranjang
        $cart[$id] = [
            'idbuku' => $id,
            'jumlah' => $jumlah
        ];

        // Simpan kembali ke session
        session()->set('keranjang', $cart);

        return redirect('keranjang')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function ebook()
    {
        // Ambil builder untuk tabel 'bukudigital'
        $builder = $this->db->table('bukudigital');
        $builder->join('kategori', 'bukudigital.id_kategori = kategori.id_kategori', 'left');

        // Memproses input pencarian
        $keyword = $this->request->getPost('keyword');
        if (!empty($keyword)) {
            $builder->like('kodebuku', $keyword);
            $builder->orLike('namabuku', $keyword);
            $builder->orLike('penulis', $keyword);
        }

        // Pagination setup
        $perPage = 9;  // Menampilkan 9 buku per halaman
        $currentPage = $this->request->getVar('page') ?: 1;  // Halaman saat ini
        $offset = ($currentPage - 1) * $perPage;

        // Hitung total buku untuk pagination
        $totalBooks = $builder->countAllResults(false);  // Tidak menghitung hasil yang sudah di-filter
        $totalPages = ceil($totalBooks / $perPage);  // Total halaman

        // Ambil data buku dengan limit dan offset
        $builder->limit($perPage, $offset);
        $query = $builder->get();
        $data['bukudigital'] = $query->getResultArray();

        // Pass data pagination ke view
        $data['totalPages'] = $totalPages;
        $data['currentPage'] = $currentPage;
        $data['keyword'] = $keyword;  // Pass keyword pencarian ke view

        // Load view dan pass data buku digital
        return view('ebook', $data);
    }


    public function ebookdetail($id)
    {
        $session = session('user');

        if (empty($session)) {
            return redirect()->to('login')->with('message', 'Harap login terlebih dahulu');
        }
        $builder = $this->db->table('bukudigital');
        $builder->join('kategori', 'bukudigital.id_kategori = kategori.id_kategori', 'left');
        $builder->where('bukudigital.idbuku', $id);

        $query = $builder->get();
        $data['detail'] = $query->getRowArray();

        if (!$data['detail']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Buku digital dengan ID $id tidak ditemukan.");
        }

        // Load view dan pass data detail buku digital
        return view('ebookdetail', $data);
    }

    public function downloadbukudigital($id)
    {
        // Query untuk mengambil data buku berdasarkan ID
        $buku = $this->db->table('bukudigital')->where('idbuku', $id)->get()->getRowArray();
        $totaldownload = $buku['totaldownload'] + 1;
        // Mengupdate kolom totaldownload menggunakan query builder
        $this->db->table('bukudigital')
            ->where('idbuku', $id)
            ->set('totaldownload', $totaldownload)
            ->update();

        // Mengarahkan pengguna untuk mendownload file
        return $this->response->download('foto/' . $buku['filebuku'], null);
        exit;
    }

    public function riwayat()
    {
        $iduser = session('user')->id;

        $data['peminjaman'] = $this->db
            ->table('peminjaman')
            ->where('idpengguna', $iduser)
            ->get()
            ->getResult();

        $detailpeminjaman = [];
        foreach ($data['peminjaman'] as $peminjaman) {

            $detailpeminjaman[$peminjaman->idpeminjaman] = $this->db
                ->table('peminjamandetail')
                ->where('idpeminjaman', $peminjaman->idpeminjaman)
                ->get()
                ->getResult();
        }

        $data['peminjamandetail'] = $detailpeminjaman;

        return view('riwayat', $data);
    }




    public function riwayathapus($id)
    {
        $this->db->table('peminjaman')->where('idpeminjaman', $id)->delete();
        $this->db->table('peminjamandetail')->where('idpeminjaman', $id)->delete();
        return redirect('riwayat')->with('success', 'Data Berhasil Dihapus');
    }

    public function profile()
    {
        $user = session('user');
        $data['row'] = $this->db
            ->table('pengguna')
            ->where('id', $user->id)
            ->get()
            ->getRowArray();
        return view('profile', $data);
    }

    public function profileupdate()
    {
        // Mengambil data dari sesi pengguna
        $user = session('user');
        $id = $user->id; // Pastikan Anda memiliki ID pengguna di session

        // Mengambil data dari form
        $data = [
            'username'      => $this->request->getPost('username'),
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'telepon'  => $this->request->getPost('telepon'),
            'alamat'   => $this->request->getPost('alamat'),
        ];

        // Cek jika password baru diisi
        $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            // Jika ada password baru, hash dan tambahkan ke data
            $data['password'] = $newPassword;
        }

        // Mengambil foto jika ada
        $fotoFile = $this->request->getFile('foto');
        if ($fotoFile && $fotoFile->isValid()) {
            $fotoName = time() . '_' . $fotoFile->getName();
            $fotoFile->move('foto', $fotoName); // Pastikan folder 'foto' ada
            $data['fotoprofil'] = $fotoName; // Update foto hanya jika ada file baru
        }

        // Memulai query builder
        $builder = $this->db->table('pengguna');

        // Mengupdate data pengguna berdasarkan ID
        $builder->where('id', $id)->update($data);

        // Redirect atau pesan sukses
        return redirect()->to('profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
