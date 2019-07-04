# SIA SMP SEDAYU
Sistem Informasi Akademik SMPN Sedayu

# Login Admin :
    - username : admin
    - password : admin

# Login Guru :
    - username : eny
    - password : eny

# Login Siswa :
    - username : atika
    - password : atika

# Revisi
    -   Siswa: Kuis->Lihat Kuis {aturan: Jika KUIS Sudah Pernah Dikerjakan pada kolom action diganti "Sudah
        Dikerjakan", hanya menampilkan data KUIS berdasarkan atribut siswa login}
    -   Siswa: Nilai->Nilai Kuis {aturan: Menampilkan Seluruh KUIS yang sudah pernah dikerjakan, hanya menampilka
        data KUIS berdasarkan atribut siswa login}
    -   Siswa: NIlai->Nilai Tugas {aturan: mata pelajaran yang ditampilkan berdasarkan atribut siswa login }
    -   Siswa: Nilai->Nilai Tugas, Cari Nilai Tugas {aturan: menampilkan data nilai tugas berdasarkan mata
        pelajaran dan tahun ajaran yang sudah dipilih, data nilai tugas diambil berdasarkan atribut siswa login}
    -   Admin: Akademik->Kelas {hidden action delete}
    -   Admin: Akademik->Tahun Ajaran {hidden action delete}
    -   Admin: Akademik->Mata Pelajaran ajaran {hidden action delete}