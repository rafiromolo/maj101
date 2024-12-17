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
    <div class="grid grid-cols-4 header">
        <div class="flex items-center justify-center logo">
            <img src="<?= base_url('assets/img/logo.webp') ?>" width="344" alt="">
        </div>
        <div class="col-span-2 flex flex-col items-center justify-center">
            <h1 class="font-bold title">ANDON</h1>
            <h2 class="font-semibold subtitle">PT. MEKAR ARMADA JAYA</h2>
        </div>
        <div class="flex flex-col items-end justify-center pe-4">
            <p id="headerDate" class="font-bold headerDate"></p>
            <p id="headerTime" class="font-bold headerTime"></p>
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
        // Date and Time Function
        function updateDateTime() {
            const now = new Date();

            // Date Format
            const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
            const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            const formattedDate = `${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
            document.getElementById('headerDate').textContent = formattedDate;

            // Time Format
            const formattedTime = [now.getHours(), now.getMinutes(), now.getSeconds()]
                .map(unit => String(unit).padStart(2, '0'))
                .join(':');
            document.getElementById('headerTime').textContent = formattedTime;

            // Update Time Every Seconds
            setTimeout(updateDateTime, 1000);
        }

        // Fetch Data Function
        function fetchData(apiUrl, tableBody) {
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    tableBody.innerHTML = '';
                    const mergeInfo = {};

                    data.forEach(row => {
                        const tr = document.createElement('tr');

                        Object.entries(row).forEach(([key, value]) => {
                            const cellValue = value || '-';

                            if (mergeInfo[key]?.lastValue === cellValue && cellValue !== '-') {
                                mergeInfo[key].rowspan++;
                                mergeInfo[key].lastCell.setAttribute('rowspan', mergeInfo[key].rowspan);
                            } else {
                                const td = document.createElement('td');
                                td.textContent = cellValue;
                                td.classList.toggle('indicator-red', cellValue === '-');
                                tr.appendChild(td);

                                mergeInfo[key] = { lastValue: cellValue, lastCell: td, rowspan: 1};
                            }
                        });

                        tableBody.appendChild(tr);
                    });
                })
                .catch(error => console.error('Error fetching data: ', error));
        }

        // Infinite Scroll Function
        function enableInfiniteScroll(container, tableBody) {
            container.addEventListener('scroll', () => {
                if (container.scrollTop + container.clientHeight >= container.scrollHeight) {
                    // Gandakan data di tabel untuk infinite scroll
                    Array.from(tableBody.rows).forEach(row => tableBody.appendChild(row.cloneNode(true)));
                }
            });
        }

        function enableAutoScroll(container, tableBody) {
            let scrollInterval = setInterval(() => {
                container.scrollTop += 1;

                if (container.scrollTop + container.clientHeight >= container.scrollHeight - 5) {
                    Array.from(tableBody.rows).forEach(row => tableBody.appendChild(row.cloneNode(true)));
                }
            }, 120);

            window.addEventListener('beforeunload', () => clearInterval(scrollInterval));
        }

        // Initialize
        window.onload = () => {
            const apiUrl = 'http://localhost:8080/api/billing';
            const tableBody = document.querySelector('#data-table tbody');
            const tableContainer = document.getElementById('data-table-container');

            updateDateTime();
            fetchData(apiUrl, tableBody);
            enableAutoScroll(tableContainer, tableBody);
            // enableInfiniteScroll(tableContainer, tableBody);
        }
    </script>
</body>
</html>