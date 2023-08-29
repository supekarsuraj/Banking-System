import data from './data.js';
const state = document.getElementById("state");
const user = document.getElementById("user_name");
user.addEventListener("change", (event) => {
    let state_list = document.getElementById("state_list");
    if (checkName(event.target.value, "user_name_list") == false) {
        event.target.value = "";
        state_list.innerHTML = "";
        state.value = "";
        alert("Enter Valid User Name");
        return;
    }
})

state.addEventListener("change", (event) => {
    if (checkName(event.target.value, "state_list") == false) {
        state.value = "";
        alert("Enter Valid State");
        return;
    }
})

function print_state_home(e_id) {
    var x = document.getElementById(e_id);
    if (x == null) return;
    for (var i = 0; i < data.length; i++) {
        var opt = document.createElement('option');
        opt.value = data[i].state;
        x.insertAdjacentElement("beforeend", opt);
    }
}
print_state_home("state_list");

const checkName = (name, id_name) => {
    let rec = document.getElementById(id_name);
    let opt = rec.getElementsByTagName("option");
    let flag = 0;
    for (let i = 0; i < opt.length; i++) {
        if (opt[i].value == name) flag = 1;
    }
    return flag == 1;
}