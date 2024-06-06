let general_data, contacts_data;

let general_s_form = document.getElementById('general_s_form');
let site_title = document.getElementById('site_title');
let site_about = document.getElementById('site_about');
let site_title_inp = document.getElementById('site_title_inp');
let site_about_inp = document.getElementById('site_about_inp');
let shutdown_toggle = document.getElementById('shutdown-toggle');

function get_general() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                general_data = JSON.parse(xhr.responseText);

                site_title.innerText = general_data.site_title;
                site_about.innerText = general_data.site_about;

                site_title_inp.value = general_data.site_title;
                site_about_inp.value = general_data.site_about;

                shutdown_toggle.checked = (general_data.shutdown_toggle == 1);
            } catch (e) {
                console.error('Error parsing JSON:', e);
            }
        } else {
            console.error('Error fetching general settings. Status:', xhr.status);
        }
    };

    xhr.send('get_general');
}

function upd_general(title, about) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log('General settings updated successfully.');
            // You may perform additional actions upon successful update
        } else {
            console.error('Error updating general settings. Status:', xhr.status);
        }
    };

    let formData = new FormData();
    formData.append('site_title', title);
    formData.append('site_about', about);
    formData.append('upd_general', ''); // Assuming this is your identifier for the server

    xhr.send(formData);
}

general_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    upd_general(site_title_inp.value, site_about_inp.value);
});

function upd_shutdown(val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (xhr.status === 200) {
            if (xhr.responseText == 1 && general_data.shutdown_toggle == 0) {
                alert('success', 'Site has been shutdown!');
            } else {
                alert('Error', 'Shutdown mode off!');
            }
            get_general();
        } else {
            console.error('Error updating shutdown settings. Status:', xhr.status);
        }
    };

    let data = 'upd_shutdown=' + encodeURIComponent(val);
    xhr.send(data);
}

function get_contacts() {
    let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'insta', 'tw'];
    let iframe = document.getElementById('iframe');

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                contacts_data = JSON.parse(this.responseText);
                contacts_data = Object.values(contacts_data);

                for (let i = 0; i < contacts_p_id.length; i++) {
                    let element = document.getElementById(contacts_p_id[i]);
                    if (element) {
                        element.textContent = contacts_data[i + 1];
                    } else {
                        console.error(`Element with ID ${contacts_p_id[i]} not found.`);
                    }
                }

                iframe.src = contacts_data[9];

                // Assuming you have a function contacts_inp that you want to call
                contacts_inp(contacts_data);
            } catch (e) {
                console.error('Error parsing JSON:', e);
            }
        } else {
            console.error('Error fetching contacts. Status:', xhr.status);
        }
    };

    xhr.send('get_contacts=');
}

function contacts_inp(data) {
    let contacts_p_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'tw_inp', 'iframe_inp'];

    for (let i = 0; i < contacts_p_id.length; i++) {
        document.getElementById(contacts_p_id[i]).value = data[i + 1];
    }
}

let contacts_s_form = document.getElementById('contacts_s_form');

contacts_s_form.addEventListener('submit', function (e) {
    e.preventDefault();
    upd_contacts();
});

function upd_contacts() {
    let index = ['address', 'gmap', 'pn1', 'pn2', 'email', 'fb', 'insta', 'tw', 'iframe'];

    let contacts_inp_id = ['address_inp', 'gmap', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'fb_inp', 'insta_inp', 'tw_inp', 'iframe_inp'];
    let data_str = "";

    for (var i = 0; i < index.length; i++) {
        let inputElement = document.getElementById(contacts_inp_id[i]);
        if (inputElement) {
            data_str += index[i] + "=" + encodeURIComponent(inputElement.value) + '&';
        } else {
            console.error(`Element with ID ${contacts_inp_id[i]} not found.`);
        }
    }

    data_str += "upd_contacts";

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/settings_crud.php", true);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                let response = JSON.parse(xhr.responseText);
                if (response.success) {
                    var myModal = document.getElementById('contacts-s');
                    var modal = new bootstrap.Modal(myModal);
                    modal.hide();
                    alert('success', 'Changes Saved!');
                    get_contacts(); // Assuming you have a function to refresh contact data
                } else {
                    alert('Error', 'No Changes Made!');
                }
            } catch (e) {
                console.error('Error parsing JSON:', e);
            }
        }
    };

    xhr.send(data_str);
}




window.onload=function(){
    get_general();
    get_contacts();
}


