console.log("Made by Dapatnapo, Chester from BSIT - 3208");

// v Show Password v
function seeCharacters(field) {
    const passwordField = document.getElementById(field);
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
    } else {
        passwordField.type = 'password';
    }
}

// v Make Visible v
function visible(id) {
  let dashboard = document.getElementById(id);
  dashboard.style.display = dashboard.style.display === 'block' ? 'none' : 'block';
}

// v Confirmation Window v
let text = '';
function confirmWindow(text){
    let confirmed = window.confirm(text);
    return confirmed;
}

// v Change Location v
function pages(linkhtml){
    let link = linkhtml;
    window.location.href = linkhtml;
}

// v Modal v
// function openModal(elementId,fogId){
//     let window = document.getElementById(elementId);
//     window.style.display = 'flex';
//     let fog = document.getElementById(fogId);
//     fog.style.display = 'block';
// }
// function collapseModal(elementId,fogId){
//     let window = document.getElementById(elementId);
//     window.style.display = 'none';
//     let fog = document.getElementById(fogId);
//     fog.style.display = 'none';
// }

// v Submit User ID to PHP v
function submitUserForm(id) {
    document.getElementById('user_id' + id).value = id;
    document.getElementById('userForm' + id).submit();
}