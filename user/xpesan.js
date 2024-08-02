const hitungHarga = () => {
    const venue = document.getElementById("posisi").value;
    const jumlahTiket = document.getElementById("jumlah_tiket").value;
    let harga = 0;

    switch (venue) {
        case "Festival":
            harga = 75000;
            break;
        case "VIP":
            harga = 150000;
            break;
    }

    const totalHarga = harga * jumlahTiket;
    document.getElementById("total_harga").innerHTML = `Harga: Rp ${totalHarga}`;
};

document.getElementById("jumlah_tiket").addEventListener("change", hitungHarga);
document.getElementById("posisi").addEventListener("change", hitungHarga);