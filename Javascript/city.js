import data from './data.js';
const user = document.getElementById("user_name");
const state = document.getElementById("state");
const state_list = document.getElementById("state_list");
const city = document.getElementById("city");
const city_list = document.getElementById("city_list");
user.addEventListener("change", (event) => {
    state_list.innerHTML = "";
    state.value = "";
    if (checkName(event.target.value, "user_name_list") == false) {
        event.target.value = "";
        city.value = "";
        city_list.innerHTML = '';
        alert("Enter Valid User Name");
        return;
    }
    const formData = new FormData(document.getElementById("form"));
    var xhr = new XMLHttpRequest();
    xhr.open('POST', './server.php', true);
    xhr.onload = () => {
        if (xhr.status === 200) {
            var stateByUser = xhr.responseText.split(",");
            for (let i = 1; i < stateByUser.length; i++) {
                var opt = document.createElement('option');
                opt.value = stateByUser[i];
                state_list.insertAdjacentElement("beforeend", opt);
            }
            // body.classList.toggle("loading");s
        }
    };
    xhr.send(formData);
})
let st_pos, i;
state.addEventListener("change", (event) => {
    city_list.innerHTML = "";
    city.value = "";
    if (checkName(event.target.value, "state_list") == false) {
        event.target.value = "";
        alert("Enter Valid State Name");
        return;
    }
    for (i = 0; i < data.length; i++) {
        if (data[i].state == event.target.value) {
            st_pos = i;
            break;
        }
    }
    for (i = 0; i < data[st_pos].cities.length; i++) {
        var opt = document.createElement('option');
        opt.value = data[st_pos].cities[i].name;
        city_list.insertAdjacentElement("beforeend", opt);
    }
})

city.addEventListener("change", (event) => {
    if (checkName(event.target.value, "city_list") == false) {
        event.target.value = "";
        alert("Enter Valid City Name");
        return;
    }
})
const checkName = (name, id_name) => {
    let rec = document.getElementById(id_name);
    let opt = rec.getElementsByTagName("option");
    let flag = 0;
    for (let i = 0; i < opt.length; i++) {
        if (opt[i].value == name) flag = 1;
    }
    return flag == 1;
}