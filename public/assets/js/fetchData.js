export function fetchData(apiUrl, tableBody) {
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

                        mergeInfo[key] = { lastValue: cellValue, lastCell: td, rowspan: 1 };
                    }
                });

                tableBody.appendChild(tr);
            });
        })
        .catch(error => console.error('Error fetching data: ', error));
}