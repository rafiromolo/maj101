export function updateDateTime() {
    const now = new Date();

    const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
    const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    const formattedDate = `${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]} ${now.getFullYear()}`;
    document.getElementById('headerDate').textContent = formattedDate;

    const formattedTime = [now.getHours(), now.getMinutes(), now.getSeconds()]
        .map(unit => String(unit).padStart(2, '0'))
        .join(':');
    document.getElementById('headerTime').textContent = formattedTime;

    setTimeout(updateDateTime, 1000);
}