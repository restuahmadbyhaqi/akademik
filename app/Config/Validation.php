<?php

namespace Config;

class Validation
{
    public $ruleSets = [
        \CodeIgniter\Validation\Rules::class,
        \CodeIgniter\Validation\FormatRules::class,
        \CodeIgniter\Validation\FileRules::class,
        \CodeIgniter\Validation\CreditCardRules::class,
    ];

    public $templates = [
        'list' => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // Validation rules for 'fakultas'
    public $fakultas = [
        'fak_nama' => 'required',
        'fak_jmlprodi' => 'required'
    ];

    public $fakultas_errors = [
        'fak_nama' => [
            'required' => 'Nama fakultas wajib diisi.'
        ],
        'fak_jmlprodi' => [
            'required' => 'Jumlah prodi fakultas wajib diisi.'
        ]
    ];

    // Validation rules for 'prodi'
    public $prodi = [
        'prodi_nama' => 'required',
        'prodi_akre' => 'required',
        'prodi_jenj' => 'required',
        'prodi_status' => 'required',
        'fak_id' => 'required'
    ];

    public $prodi_errors = [
        'prodi_nama' => ['required' => 'Nama prodi wajib diisi.'],
        'prodi_akre' => ['required' => 'Prodi akreditasi wajib diisi.'],
        'prodi_jenj' => ['required' => 'Prodi jenjang wajib diisi.'],
        'prodi_status' => ['required' => 'Status prodi wajib diisi.'],
        'fak_id' => ['required' => 'Fakultas wajib diisi.']
    ];

    // Validation rules for 'authlogin'
    public $authlogin = [
        'email' => 'required|valid_email',
        'password' => 'required'
    ];

    public $authlogin_errors = [
        'email' => [
            'required' => 'Email wajib diisi.',
            'valid_email' => 'Format email tidak valid.'
        ],
        'password' => [
            'required' => 'Password wajib diisi.'
        ]
    ];

    // Validation rules for 'authregister'
    public $authregister = [
        'email' => 'required|valid_email|is_unique[users.email]',
        'username' => 'required|alpha_numeric|is_unique[users.username]|min_length[8]|max_length[35]',
        'name' => 'required|alpha_numeric_space|min_length[3]|max_length[35]',
        'password' => 'required|string|min_length[8]|max_length[35]',
        'confirm_password' => 'required|string|matches[password]|min_length[8]|max_length[35]',
    ];

    public $authregister_errors = [
        'email' => [
            'required' => 'Email wajib diisi.',
            'valid_email' => 'Format email tidak valid.',
            'is_unique' => 'Email sudah terdaftar.'
        ],
        'username' => [
            'required' => 'Username wajib diisi.',
            'alpha_numeric' => 'Username hanya boleh berisi huruf dan angka.',
            'is_unique' => 'Username sudah terdaftar.',
            'min_length' => 'Username minimal 8 karakter.',
            'max_length' => 'Username maksimal 35 karakter.'
        ],
        'name' => [
            'required' => 'Nama wajib diisi.',
            'alpha_numeric_space' => 'Nama hanya boleh berisi huruf, angka, dan spasi.',
            'min_length' => 'Nama minimal 3 karakter.',
            'max_length' => 'Nama maksimal 35 karakter.'
        ],
        'password' => [
            'required' => 'Password wajib diisi.',
            'string' => 'Password hanya boleh berisi huruf, angka, spasi, dan karakter lain.',
            'min_length' => 'Password minimal 8 karakter.',
            'max_length' => 'Password maksimal 35 karakter.'
        ],
        'confirm_password' => [
            'required' => 'Konfirmasi password wajib diisi.',
            'string' => 'Konfirmasi password hanya boleh berisi huruf, angka, spasi, dan karakter lain.',
            'matches' => 'Konfirmasi password tidak sesuai dengan password.',
            'min_length' => 'Konfirmasi password minimal 8 karakter.',
            'max_length' => 'Konfirmasi password maksimal 35 karakter.'
        ]
    ];
    public $mahasiswa = [
        'mhs_nama' => 'required',
        'prodi_id' => 'required',
        'mhs_npm' => 'required|is_unique[mahasiswa.mhs_npm,mhs_id,{mhs_id}]'
        // Tambahkan aturan validasi lainnya di sini
    ];
    
    public $mahasiswa_errors = [
        'mhs_nama' => [
            'required' => 'Nama mahasiswa wajib diisi.'
        ],
        'prodi_id' => [
            'required' => 'Prodi mahasiswa wajib diisi.'
        ],
        'mhs_npm' => [
            'required' => 'NPM mahasiswa wajib diisi.',
            'is_unique' => 'NPM mahasiswa harus unik.'
        ],
        // Pesan kesalahan untuk aturan validasi lainnya
    ];
    
    
}
