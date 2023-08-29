import data from './data.js';
// Only for Home Page 
try {
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
    var i, st_pos, ct_pos, j;
    // Code for City input after State being selected
    const state = document.getElementById("state");
    state.addEventListener("change", (e) => {
        var option_str = document.getElementById("city_list");;
        option_str.innerHTML = '';
        var st_name = e.target.value;
        for (i = 0; i < data.length; i++) {
            if (data[i].state == st_name) {
                st_pos = i;
                break;
            }
        }

        document.getElementById('city').value = '';
        document.getElementById('area').value = '';
        document.getElementById('area_list').innerHTML = "";

        if (i == data.length) {
            alert("Enter Valid State");
            e.target.value = "";
            return;
        }
        for (i = 0; i < data[st_pos].cities.length; i++) {
            var opt = document.createElement('option');
            opt.value = data[st_pos].cities[i].name;
            option_str.insertAdjacentElement("beforeend", opt);
        }
    });

    // Code for area input after City being selected

    const city = document.getElementById("city");
    city.addEventListener("change", (e) => {
        if (document.getElementById('state').value == "") {
            alert("Select State First  ");
            e.target.value = "";
            return;
        }
        var option_str = document.getElementById("area_list");
        var ct_name = e.target.value;
        for (i = 0; i < data[st_pos].cities.length; i++) {
            if (data[st_pos].cities[i].name == ct_name) {
                ct_pos = i;
                break;
            }
        }

        document.getElementById('area').value = '';
        document.getElementById('area_list').innerHTML = "";

        if (data[st_pos].cities.length == i) {
            alert("Enter Valid City");
            e.target.value = "";
            return;
        }
        for (i = 0; i < data[st_pos].cities[ct_pos].areas.length; i++) {

            var opt = document.createElement('option');
            opt.value = data[st_pos].cities[ct_pos].areas[i];
            option_str.insertAdjacentElement("beforeend", opt);

        }
    });

    //After Area get selected

    const area = document.getElementById("area");
    area.addEventListener("change", (event) => {
        let name = event.target.value;
        let rec = document.getElementById("area_list");
        let opt = rec.getElementsByTagName("option");
        let flag = 0;
        for (let i = 0; i < opt.length; i++) {
            if (opt[i].value == name) flag = 1;
        }
        if (flag != 1) {
            alert("Enter Valid Area");
            event.target.value = "";
        };
    })

} catch (error) {
    console.log(error);
}

// Home Page Script Ends Here