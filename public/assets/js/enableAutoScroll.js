export function enableAutoScroll(container, tableBody) {
    let scrollInterval = setInterval(() => {
        container.scrollTop += 1;

        if (container.scrollTop + container.clientHeight >= container.scrollHeight - 5) {
            Array.from(tableBody.rows).forEach(row => tableBody.appendChild(row.cloneNode(true)));
        }
    }, 120);

    window.addEventListener('beforeunload', () => clearInterval(scrollInterval));
}