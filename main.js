console.log("Javascript connected");

// v Show Password v
function togglePassword() {
    const passwordField = document.getElementById('password');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
    } else {
        passwordField.type = 'password';
    }
}
// ^ Show Password ^

// v Dashboard v
document.getElementById('btnDashboard').addEventListener('click',function(){
    let dashboard = document.getElementById('dashboard');
    dashboard.style.display = dashboard.style.display === 'block' ? 'none' : 'block';
});
// ^ Dashboard ^

// v Modal v
function openModal(elementId,fogId){
    let window = document.getElementById(elementId);
    window.style.display = 'flex';
    let fog = document.getElementById(fogId);
    fog.style.display = 'block';
}
function collapseModal(elementId,fogId){
    let window = document.getElementById(elementId);
    window.style.display = 'none';
    let fog = document.getElementById(fogId);
    fog.style.display = 'none';
}
// ^ Modal ^ 

// v Confirmation Window v
let text = '';
function confirmWindow(text){
    let confirmed = window.confirm(text);
    return confirmed;
}
// ^ Confirmation Window ^

function pages(linkhtml){
    let link = linkhtml;
    window.location.href = linkhtml;
}