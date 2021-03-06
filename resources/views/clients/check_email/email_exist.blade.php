<script>
    let firstEmailField   =  document.getElementById("email");
    let secEmailField     =  document.getElementById("secondary_email");
    let notify            =  document.getElementById("signal-message");
    let btnSave           =  document.getElementById("btn-save");



    (
      function clientInfo() {
            firstEmailField.addEventListener('keyup', (e) => {
              let getId  = firstEmailField.value;
        fetch(`{!! url('admin-portal/clients/create/fetch-email') !!}`)
        .then(
            function(response) {
                if (response.status !== 200) {
                    console.log('Looks like there was a problem. Status Code: ' +
                        response.status);
                    return;
                }
                // Examine the text in the response
                response.json().then(function(data) {
                    const result = data.includes(firstEmailField.value);
                     if (result === true) {

                            firstEmailField.textContent = getId;
                            notify.classList.add("badge");
                            notify.classList.remove("badge-success");
                            notify.classList.add("badge-danger");
                            notify.classList.add("bx");
                            notify.classList.add("bx-x");
                            notify.classList.remove("bx-check-double");
                            notify.innerText = getId + ", "+ 'already exist';
                            btnSave.setAttribute("disabled", "yes");

                     }
                     else {

                            firstEmailField.textContent = getId;
                            notify.classList.add("badge");
                            notify.classList.remove("badge-danger");
                            notify.classList.remove("bx-x");
                            notify.classList.add("badge-success");
                            notify.classList.add("bx");
                            notify.classList.add("bx-check-double");
                            notify.innerText = getId + ", "+ 'accepted & approved';
                            firstEmailField.style.border = "1px solid green";
                            btnSave.removeAttribute("disabled", "yes");
                     }

                    console.log(data);
                 });

            }
        )
        .catch(function(err) {
            console.log('Fetch Error :-S', err);
        });
    });
}

)();

</script>