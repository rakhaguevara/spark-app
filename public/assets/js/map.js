// Inisialisasi map
const map = L.map('map').setView([-6.1754, 106.8272], 13); // Jakarta

// Load OpenStreetMap tiles
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Marker contoh
L.marker([-6.1754, 106.8272])
  .addTo(map)
  .bindPopup('Lokasi Parkir Contoh')
  .openPopup();
