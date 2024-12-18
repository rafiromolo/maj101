<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andon</title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Start of Header Section -->
    <div class="header">
        <div class="logo">
            <img src="<?= base_url('assets/img/logo.webp') ?>" height="66" width="344" alt="Logo PT Mekar Armada Jaya">
        </div>
        <div class="col-span-2 headings">
            <h1 class="title">ANDON</h1>
            <h2 class="subtitle">PT. MEKAR ARMADA JAYA</h2>
        </div>
        <div class="datetime">
            <p id="headerDate" class="headerDate"></p>
            <p id="headerTime" class="headerTime"></p>
        </div>
    </div>
    <!-- End of Header Section -->

    <!-- Start of Table Section -->
    <div id="data-table-container">
        <table id="data-table">
            <thead>
                <tr>
                    <th>PR</th>
                    <th>PO</th>
                    <th>GR</th>
                    <th>INVOICE</th>
                </tr>
            </thead>
            <tbody id="data-body"></tbody>
        </table>
    </div>
    <!-- End of Table Section -->
    
    <script>
        window.onload = () => {
            const apiUrl = 'http://localhost:8080/api/billing';
            const tableBody = document.querySelector('#data-table tbody');
            const tableContainer = document.getElementById('data-table-container');

            import('<?= base_url('assets/js/fetchData.js') ?>').then(module => {
                module.fetchData(apiUrl, tableBody);
            })
            import('<?= base_url('assets/js/updateDateTime.js') ?>').then(module => {
                module.updateDateTime();
            })
            import('<?= base_url('assets/js/enableAutoScroll.js') ?>').then(module => {
                module.enableAutoScroll(tableContainer, tableBody);
            })
        }
    </script>
</body>
</html>