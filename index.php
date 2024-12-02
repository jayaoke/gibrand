<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Rantai Pasokan</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            position: fixed;
            height: 100%;
            padding-top: 30px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            text-align: center;
            font-size: 24px;
            color: #ecf0f1;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            color: #ecf0f1;
            padding: 12px 20px;
            text-decoration: none;
            margin: 8px 0;
            border-radius: 4px;
            font-size: 16px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .header {
            background-color: #34495e;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .form-container, .welcome-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        h2 {
            font-size: 22px;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 16px;
            margin-bottom: 8px;
            color: #7f8c8d;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #bdc3c7;
            border-radius: 4px;
            font-size: 16px;
            background-color: #ecf0f1;
            margin-bottom: 8px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #3498db;
            outline: none;
        }

        button {
            padding: 12px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #bdc3c7;
            text-align: left;
            font-size: 16px;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        td {
            background-color: #ecf0f1;
        }

        .about-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        .about-container h2 {
            margin-bottom: 15px;
        }

        .about-container p {
            font-size: 16px;
            color: #7f8c8d;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
            }

            h2 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="javascript:void(0);" onclick="showForm('formPemasok')">Input Data Pemasok</a>
        <a href="javascript:void(0);" onclick="showForm('formProduk')">Input Data Produk</a>
        <a href="javascript:void(0);" onclick="showForm('formInfoPemasok')">Input Info Pemasok</a>
        <a href="javascript:void(0);" onclick="showForm('formInfoProduk')">Input Info Produk</a>
        <a href="javascript:void(0);" onclick="showForm('aboutContent')">About</a>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Manajemen Rantai Pasokan</h1>
        </div>

        <div id="welcomeContent" class="welcome-container">
            <h2>Selamat Datang di Manajemen Rantai Pasokan</h2>
            <p>Silakan pilih menu di sebelah kiri untuk memulai.</p>
        </div>

        <!-- Form Input Data Pemasok -->
        <div id="formPemasok" class="form-container" style="display: none;">
            <h2>Form Input Data Pemasok</h2>
            <form id="pemasokForm" onsubmit="event.preventDefault(); saveData('pemasokForm', 'pemasok');">
                <input type="hidden" name="form_type" value="pemasok">
                <div class="form-group">
                    <label for="nama_pemasok">Nama Pemasok:</label>
                    <input type="text" id="nama_pemasok" name="nama_pemasok" required>
                </div>
                <div class="form-group">
                    <label for="alamat_pemasok">Alamat:</label>
                    <input type="text" id="alamat_pemasok" name="alamat_pemasok" required>
                </div>
                <div class="form-group">
                    <label for="telepon_pemasok">Telepon:</label>
                    <input type="text" id="telepon_pemasok" name="telepon_pemasok" required>
                </div>
                <button type="submit">Simpan</button>
            </form>
            <div id="result_pemasok"></div>
        </div>

        <!-- Form Input Data Produk -->
        <div id="formProduk" class="form-container" style="display: none;">
            <h2>Form Input Data Produk</h2>
            <form id="produkForm" onsubmit="event.preventDefault(); saveData('produkForm', 'produk');">
                <input type="hidden" name="form_type" value="produk">
                <div class="form-group">
                    <label for="nama_produk">Nama Produk:</label>
                    <input type="text" id="nama_produk" name="nama_produk" required>
                </div>
                <div class="form-group">
                    <label for="harga_produk">Harga:</label>
                    <input type="number" id="harga_produk" name="harga_produk" required>
                </div>
                <div class="form-group">
                    <label for="pemasok_produk">Nama Pemasok:</label>
                    <input type="text" id="pemasok_produk" name="pemasok_produk" required>
                </div>
                <button type="submit">Simpan</button>
            </form>
            <div id="result_produk"></div>
        </div>

        <!-- Form Input Info Pemasok -->
        <div id="formInfoPemasok" class="form-container" style="display: none;">
            <h2>Form Input Info Pemasok</h2>
            <form id="infoPemasokForm" onsubmit="event.preventDefault(); saveData('infoPemasokForm', 'info_pemasok');">
                <input type="hidden" name="form_type" value="info_pemasok">
                <div class="form-group">
                    <label for="nama_info_pemasok">Nama Info Pemasok:</label>
                    <input type="text" id="nama_info_pemasok" name="nama_info_pemasok" required>
                </div>
                <div class="form-group">
                    <label for="alamat_info_pemasok">Alamat:</label>
                    <input type="text" id="alamat_info_pemasok" name="alamat_info_pemasok" required>
                </div>
                <div class="form-group">
                    <label for="telepon_info_pemasok">Telepon:</label>
                    <input type="text" id="telepon_info_pemasok" name="telepon_info_pemasok" required>
                </div>
                <button type="submit">Simpan</button>
            </form>
            <div id="result_info_pemasok"></div>
        </div>

        <!-- Form Input Info Produk -->
        <div id="formInfoProduk" class="form-container" style="display: none;">
            <h2>Form Input Info Produk</h2>
            <form id="infoProdukForm" onsubmit="event.preventDefault(); saveData('infoProdukForm', 'info_produk');">
                <input type="hidden" name="form_type" value="info_produk">
                <div class="form-group">
                    <label for="nama_info_produk">Nama Info Produk:</label>
                    <input type="text" id="nama_info_produk" name="nama_info_produk" required>
                </div>
                <div class="form-group">
                    <label for="harga_info_produk">Harga:</label>
                    <input type="number" id="harga_info_produk" name="harga_info_produk" required>
                </div>
                <div class="form-group">
                    <label for="pemasok_info_produk">Nama Pemasok:</label>
                    <input type="text" id="pemasok_info_produk" name="pemasok_info_produk" required>
                </div>
                <button type="submit">Simpan</button>
            </form>
            <div id="result_info_produk"></div>
        </div>

        <!-- About Section -->
        <div id="aboutContent" class="about-container" style="display: none;">
            <h2>Tentang Kami</h2>
            <p>Manajemen Rantai Pasokan adalah sistem yang digunakan untuk mengelola pemasok dan produk secara efisien.</p>
            <p>UTS WEB 1</p>
            <p>Nama : M. Gibran darma</p>
            <p>kelas : 36</p>
            <p>NIM : 2355201025</p>    
        </div>
    </div>

    <script>
        const dataPemasok = [];
        const dataProduk = [];
        const dataInfoPemasok = [];
        const dataInfoProduk = [];

        function showForm(formId) {
            const formSections = document.querySelectorAll('.form-container, .welcome-container, .about-container');
            formSections.forEach(section => {
                section.style.display = 'none';
            });
            const formToShow = document.getElementById(formId);
            if (formToShow) {
                formToShow.style.display = 'block';
            }
        }

        function saveData(formId, formType) {
            const form = document.getElementById(formId);
            const formData = new FormData(form);
            let data = {};

            formData.forEach((value, key) => {
                data[key] = value;
            });

            // Menyimpan data ke array yang sesuai berdasarkan formType
            if (formType === 'pemasok') {
                dataPemasok.push(data);
                updatePemasokTable();
            } else if (formType === 'produk') {
                dataProduk.push(data);
                updateProdukTable();
            } else if (formType === 'info_pemasok') {
                dataInfoPemasok.push(data);
                updateInfoPemasokTable();
            } else if (formType === 'info_produk') {
                dataInfoProduk.push(data);
                updateInfoProdukTable();
            }

            form.reset();
        }

        // Memperbarui tabel Pemasok
        function updatePemasokTable() {
            let tableContent = "<table><tr><th>Nama Pemasok</th><th>Alamat</th><th>Telepon</th></tr>";
            dataPemasok.forEach(item => {
                tableContent += `<tr><td>${item.nama_pemasok}</td><td>${item.alamat_pemasok}</td><td>${item.telepon_pemasok}</td></tr>`;
            });
            tableContent += "</table>";
            document.getElementById('result_pemasok').innerHTML = tableContent;
        }

        // Memperbarui tabel Produk
        function updateProdukTable() {
            let tableContent = "<table><tr><th>Nama Produk</th><th>Harga</th><th>Pemasok</th></tr>";
            dataProduk.forEach(item => {
                tableContent += `<tr><td>${item.nama_produk}</td><td>${item.harga_produk}</td><td>${item.pemasok_produk}</td></tr>`;
            });
            tableContent += "</table>";
            document.getElementById('result_produk').innerHTML = tableContent;
        }

        // Memperbarui tabel Info Pemasok
        function updateInfoPemasokTable() {
            let tableContent = "<table><tr><th>Nama Info Pemasok</th><th>Alamat</th><th>Telepon</th></tr>";
            dataInfoPemasok.forEach(item => {
                tableContent += `<tr><td>${item.nama_info_pemasok}</td><td>${item.alamat_info_pemasok}</td><td>${item.telepon_info_pemasok}</td></tr>`;
            });
            tableContent += "</table>";
            document.getElementById('result_info_pemasok').innerHTML = tableContent;
        }

        // Memperbarui tabel Info Produk
        function updateInfoProdukTable() {
            let tableContent = "<table><tr><th>Nama Info Produk</th><th>Harga</th><th>Pemasok</th></tr>";
            dataInfoProduk.forEach(item => {
                tableContent += `<tr><td>${item.nama_info_produk}</td><td>${item.harga_info_produk}</td><td>${item.pemasok_info_produk}</td></tr>`;
            });
            tableContent += "</table>";
            document.getElementById('result_info_produk').innerHTML = tableContent;
        }
    </script>
</body>
</html>
