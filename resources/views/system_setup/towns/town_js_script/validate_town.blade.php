<script>
'use strict';

const town = document.querySelector('#town');
const eventList = ["keyup", "keydown", "focus", "change"];
let signalBadge = document.querySelector("span#signal-message");
let signalIcon = document.querySelector("span#signal-icon");
let btnSave = document.querySelector("#btn-save");
let t = document.querySelector("input#town");

(

    function toggleState() {
        eventList.forEach(event => {
            town.addEventListener(event, () => {

                let townId = town.value;
                let empty = "";
                const key = event.key;

                const town_capitalize = upperCaseFirst(townId);
                console.log(town_capitalize);

                if ((town.value.length === 0 || town.value === undefined)) {
                    signalBadge.innerText = 'waiting to process input...';
                    signalBadge.textContent = signalBadge.innerText;
                    signalBadge.classList.add("badge");
                    signalBadge.classList.add("badge-warning");
                    signalIcon.classList.add("text-warning");
                    signalIcon.classList.add("bx");
                    signalIcon.classList.add("bx-loader-circle");
                    town.setAttribute('value', empty)
                    signalIcon.classList.add("bx-spin");
                    t.style.border = "1px solid yellow";
                    btnSave.setAttribute("disabled", "yes");
                    town.value = '';

                } else {

                    fetch('{{ url("admin-portal/system-setup/towns/create/filter-data") }}')
                        .then(
                            function(response) {
                                if (response.status !== 200) {
                                    console.log('Looks like there was a problem. Status Code: ' +
                                        response.status);
                                    return;
                                }

                                // Examine the text in the response
                                response.json().then(function(data) {

                                    const data_result = data.includes(town_capitalize);

                                    if (data_result) {

                                        console.log(town_capitalize);
                                        signalBadge.innerText = town.value + "\n" + 'Already Exist';
                                        signalBadge.textContent = signalBadge.innerText;
                                        signalBadge.classList.add("badge");
                                        signalBadge.classList.add("badge-danger");
                                        signalIcon.classList.add("text-danger");
                                        signalIcon.classList.add("bx");
                                        signalIcon.classList.add("bx-error-circle");
                                        town.setAttribute('value', town_capitalize)
                                        t.style.border = "1px solid red";

                                        btnSave.setAttribute("disabled", "yes");

                                    } else if (town.value.length > 0 && !data_result) {

                                        signalBadge.innerText = townId + "\n" + ' Available for entry';
                                        signalBadge.textContent = signalBadge.innerText;
                                        signalBadge.classList.add("badge");
                                        signalBadge.classList.add("badge-success");
                                        signalIcon.classList.add("text-success");
                                        signalIcon.classList.add("bx");
                                        signalIcon.classList.add("bx-check-double");
                                        town.setAttribute('value', town_capitalize)
                                        t.style.border = "1px solid green";

                                        signalBadge.classList.remove("badge-danger");
                                        signalIcon.classList.remove("bx-error-circle");
                                        signalIcon.classList.remove("text-danger");

                                        signalBadge.classList.remove("badge-warning");
                                        signalIcon.classList.remove("text-warning");
                                        signalIcon.classList.remove("bx-loader-circle");
                                        signalIcon.classList.remove("bx-spin");

                                        btnSave.removeAttribute("disabled", "yes");

                                    }

                                });

                            }
                        )
                        .catch(function(err) {
                            console.log('Fetch Error :-S', err);
                        });

                }
            });
        });
    }
)();

function upperCaseFirst(params) {
    const data = params.trim().toLowerCase().replace(/\w\S*/g, (w) => (w.replace(/^\w/, (c) => c.toUpperCase())));
    return data;
}

</script>