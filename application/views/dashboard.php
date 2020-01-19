<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">
                    1. Apa yang Anda ketahui tentang Git?</h3>
                <p>Git adalah version control system (VCS), yang berfungsi untuk mengelola perubahan di dokumen projek.
                </p>
                <h3 class="box-title">
                    2. Apa yang Anda ketahui tentang Relasi Table dalam database?</h3>
                <p>Relasi adalah hubungan antara tabel yang mempresentasikan hubungan antar objek di dunia nyata.</p>
                <h3 class="box-title">
                    3. Apa yang Anda ketahui tentang OOP?</h3>
                <p>Pemrograman berorientasi objek (Inggris: object-oriented programming disingkat OOP) merupakan
                    paradigma pemrograman berdasarkan konsep "objek", yang dapat berisi data, dalam bentuk field atau
                    dikenal juga sebagai atribut; serta kode, dalam bentuk fungsi/prosedur atau dikenal juga sebagai
                    method. Semua data dan fungsi di dalam paradigma ini dibungkus dalam kelas-kelas atau objek-objek.
                </p>
                <h3 class="box-title">
                    4. Apa yang Anda ketahui tentang REST API?</h3>
                <p>REST API Gaya arsitektur yang komunikasi nya menggunakan HTTP untuk pertukaran data dan biasanya
                    datanya itu berupa JSON.</p>
                <h3 class="box-title">
                    5. Security apa saja yang bisa digunakan dalam REST API?</h3>
                <p>Security pada REST API, gunakan protokol HTTPS, enkripsi password, dan aktifkan fitur autentikasi</p>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <table class="table table-striped">
                    <thead>costumer x hadiah</thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Poin</th>
                    </tr>
                    <?php foreach($costumer as $c){ ?>
                    <tr>
                        <td><?php echo $c['nama']; ?></td>
                        <td><?php echo $c['email']; ?></td>
                        <td><?php echo $c['poin']; ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>