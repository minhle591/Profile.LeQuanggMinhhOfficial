var map = L.map('map').setView([51.505, -0.09], 13);

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);
ip();
let btn = document.querySelector("#btn");
let inputed = document.querySelector("#ipInput");
let form = document.querySelector("#ipform");
let addressIp = document.querySelector("#ipAddress");
let locationIp = document.querySelector("#location");
let timeZoneIp = document.querySelector("#timezone");
let ispIp = document.querySelector("#isp");

async function ip(ipdata) {
    let myIp = "https://geo.ipify.org/api/v2/country,city,vpn?apiKey=at_5DQR1UsR0ScFDZdemTYXBArkvYeIl"
    let inputIP = `https://geo.ipify.org/api/v2/country,city,vpn?apiKey=at_5DQR1UsR0ScFDZdemTYXBArkvYeIl&ip&ipAddress=${ipdata}`
    let dataIp = await fetch(ipdata ? inputIP : myIp);
    let resonse = await dataIp.json();
    addressIp.innerHTML = resonse.ip;
    locationIp.innerHTML = resonse.location.city + ", " + resonse.location.region + " " + resonse.location.geonameId;
    timeZoneIp.innerHTML = resonse.as.name + " - " + resonse.location.timezone;
    ispIp.innerHTML = resonse.isp;
    let latId = resonse.location.lat;
    let lngId = resonse.location.lng;
    L.marker([latId, lngId]).addTo(map)
        .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
        .openPopup();
}

let inpuut = inputed.addEventListener("change", (event) => {
    ip(event.target.value);
    if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(event.target.value)) {
        return true
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'This is not ip Address!'
        })
        ip()
    }

})
form.addEventListener("submit", (event) => {
    event.preventDefault();
});