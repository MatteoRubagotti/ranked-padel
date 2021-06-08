function checkDate(idField) {
    date_msg = $("#date-wrong");
    error_msg = $("#reservation-fail");
    date_invalid_msg = $("#date-invalid");

    date_msg.html("");
    date_invalid_msg.html("");
    error_msg.html("");

    var input_date = new Date($("#date-picker").val());

    if (!isValidDate(input_date)) {
        date_invalid_msg.html("Inserisci una data valida.");
    }

    day = input_date.getDate();
    month = input_date.getMonth() + 1;
    year = input_date.getFullYear();

    var date = new Date(year, month - 1, day + 1).toISOString().slice(0, 10);

    var today = new Date().toISOString().slice(0, 10);

    console.log(date);

    var error = false;

    if (date > today) {
        $(".btn-check").prop("disabled", false);
        $(".btn-check").prop("checked", false);
        date_msg.html("");

        $.ajax({
            type: "GET",
            url: "/ajaxOrari",
            data: { date: date, idField: idField },
            success: function (response) {
                // console.log(response);

                if (response.orario08) {
                    var button = "#btnradio08";
                    $(button).prop("disabled", true);
                }

                if (response.orario09) {
                    var button = "#btnradio09";
                    $(button).prop("disabled", true);
                }

                if (response.orario10) {
                    var button = "#btnradio10";
                    $(button).prop("disabled", true);
                }

                if (response.orario11) {
                    var button = "#btnradio11";
                    $(button).prop("disabled", true);
                }

                if (response.orario12) {
                    var button = "#btnradio12";
                    $(button).prop("disabled", true);
                }

                if (response.orario14) {
                    var button = "#btnradio14";
                    $(button).prop("disabled", true);
                }

                if (response.orario15) {
                    var button = "#btnradio15";
                    $(button).prop("disabled", true);
                }

                if (response.orario16) {
                    var button = "#btnradio16";
                    $(button).prop("disabled", true);
                }

                if (response.orario17) {
                    var button = "#btnradio17";
                    $(button).prop("disabled", true);
                }

                if (response.orario18) {
                    var button = "#btnradio18";
                    $(button).prop("disabled", true);
                }
            },
        });
    } else {
        $(".btn-check").prop("disabled", false);
        date_msg.html(
            "È impossibile prenotare un campo in questa data! Seleziona un'altra data."
        );
    }
}

function isValidDate(d) {
    return d instanceof Date && !isNaN(d);
}

function checkHour(idField) {
    error = false;

    error_msg = $("#reservation-fail");
    date_msg = $("#date-wrong");
    date_invalid_msg = $("#date-invalid");

    date_msg.html("");
    date_invalid_msg.html("");

    var input_date = new Date($("#date-picker").val());

    if (!isValidDate(input_date)) {
        date_invalid_msg.html("Inserisci una data valida.");
    }

    day = input_date.getDate();
    month = input_date.getMonth() + 1;
    year = input_date.getFullYear();

    console.log(input_date);

    var date = new Date(year, month - 1, day + 1).toISOString().slice(0, 10);
    var today = new Date().toISOString().slice(0, 10);

    hour = $("input[name=time]:checked", "#prenota-form").val();

    if (!error) {
        if (date > today) {
            $.ajax({
                type: "GET",
                url: "/ajaxOrario",
                data: { date: date, time: hour, idField: idField },
                success: function (response) {
                    // console.log(response);

                    if (hour === undefined) {
                        error_msg.html(
                            "L'orario deve essere selezionato per effettuare la prenotazione!"
                        );
                    } else {
                        if (response.checked) {
                            $("form[name=prenota]").submit();
                            error = false;
                        } else {
                            error = true;
                            error_msg.html(
                                "Attenzione! Non è possibile prenotare in questo orario. Aggiorna gli orari premendo il tasto sopra!"
                            );
                        }
                    }
                },
            });
        } else {
            date_msg.html(
                "È impossibile prenotare un campo in questa data! Seleziona un'altra data."
            );
        }
    }
}
function enableEditUserProfile() {
    email = $("#email-dashboard");
    age = $("#age-dashboard");
    save_button = $("#save-profile");
    age_alert = $("#age-alert");

    email.prop("disabled", false);
    age.prop("disabled", false);
    save_button.prop("hidden", false);
}

function editUserProfile() {
    error = false;

    email_alert = $("#email-alert");
    email = $("#email-dashboard");
    age = $("#age-dashboard");
    save_button = $("#save-profile");
    age_alert = $("#age-alert");

    age_alert.html("");
    email_alert.html("");

    email.prop("disabled", false);
    age.prop("disabled", false);
    save_button.prop("hidden", false);

    age_value = $("input[name=age]", "#edit-profile").val();
    email_value = $("input[name=email]", "#edit-profile").val();

    console.log(email_value);

    var regularExpressionAge = new RegExp("^(([1-9][0-9]){0,2})$", "g"); // Age must be two digits at most

    // var regularExpressionEmail = new RegExp("^[^s@]+@[^s@]+\.[^s@]+$", "g");
    var regularExpressionEmail = new RegExp(
        "^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$",
        "g"
    );

    //console.log(age_value);
    if (age_value < 16 && age_value != "") {
        error = true;
        age_alert.html("Devi avere almeno 16 anni.");
        age.focus();
    }

    if (!age_value.match(regularExpressionAge)) {
        error = true;
        age_alert.html("Inserisci un'età corretta.");
        age.focus();
    }

    if (!email_value.match(regularExpressionEmail)) {
        error = true;
        email_alert.html("Inserisci un'e-mail corretta (esempio@dominio.it)");
        email.focus();
    }

    if (!error) {
        $.ajax({
            type: "GET",
            url: "/ajaxEmail",
            data: { email: email_value },
            success: function (response) {
                console.log(response);

                if (response.checked) {
                    $("form[name=edit-profile]").submit();
                    error = false;
                } else {
                    error = true;
                    email_alert.html("Hai inserito un'e-mail già esistente.");
                }
            },
        });
    }
}

function checkNews() {
    news_title = $("#title-news");
    news_description = $("#descriptionNews");
    news_title_alert = $("#title-news-alert");
    news_description_alert = $("#description-news-alert");

    news_title_alert.html("");
    news_description_alert.html("");

    error = false;

    //console.log(news_title.val().length);
    if (news_title.val().trim().length == 0) {
        news_title_alert.html("Attenzione! Campo obbligatorio!");
        news_title.focus();
        error = true;
    }

    if (news_description.val().trim().length == 0) {
        news_description_alert.html("Attenzione! Campo obbligatorio!");
        news_description_alert.focus();
        error = true;
    }
    console.log(news_title.val().trim().length);

    if (news_title.val().trim().length > 80) {
        news_title_alert.html(
            "Attenzione! Il titolo può contenere al massimo 80 caratteri."
        );
        news_title.focus();
        error = true;
    }

    if (!error) {
        $("form[name=addNews]").submit();
    }
}

function checkNameField() {
    name_field = $("#nameField");
    name_field_alert = $("#name-field-alert");

    name_field_alert.html("");

    error = false;

    if (name_field.val().trim().length == 0) {
        name_field_alert.html("Nome obbligatorio. Non può essere vuoto!");
        error = true;
    }

    if (name_field.val().trim().length > 20) {
        name_field_alert.html(
            "Nome del campo troppo lungo! Prova con un altro più corto."
        );
        error = true;
    }

    name_value = $("input[name=nameField]", "#addCampo").val().toLowerCase();

    if (!error) {
        $.ajax({
            type: "GET",
            url: "/ajaxNomeCampo",
            data: { name: name_value },
            success: function (response) {
                console.log(response);

                if (response.checked) {
                    $("form[name=addCampo]").submit();
                    error = false;
                } else {
                    error = true;
                    name_field_alert.html(
                        "Hai inserito un nome già esistente."
                    );
                }
            },
        });
    }
}

function checkEditNameField(index, id_field) {
    // console.log("#nameField".concat(index));
    // console.log("#name-field-alert".concat(index));
    name_field = $("#nameField".concat(index));
    name_field_alert = $("#name-field-alert".concat(index));

    name_field_alert.html("");

    error = false;

    name_value = $("input[name=nameField]", "#editField".concat(index))
        .val()
        .toLowerCase();

    console.log(name_field.val().trim().length);

    if (name_field.val().trim().length == 0) {
        name_field_alert.html("Nome obbligatorio. Non può essere vuoto!");
        error = true;
    }

    if (name_field.val().trim().length > 20) {
        name_field_alert.html(
            "Nome del campo troppo lungo! Prova con un altro più corto."
        );
        error = true;
    }

    console.log(name_value);

    if (!error) {
        $.ajax({
            type: "GET",
            url: "/ajaxModificaNomeCampo",
            data: { name: name_value, idField: id_field },
            success: function (response) {
                console.log(response);

                if (response.available) {
                    $("#editField".concat(index)).submit();
                } else {
                    name_field_alert.html(
                        "Hai inserito un nome già esistente."
                    );
                }
            },
        });
    }
}

function checkStrings() {
    firstname = $("#name");
    lastname = $("#lastname");

    alert_msg_name = $("#alert_msg_name");
    alert_msg_name.html("");
    alert_msg_lastname = $("#alert_msg_lastname");
    alert_msg_lastname.html("");

    error = false;

    firstname_value = $("input[name=name]", "#register-form").val();
    lastname_value = $("input[name=lastname]", "#register-form").val();

    var regularExpressionName = new RegExp("^[a-zA-zèéàòù ]+$", "g");

    // console.log();

    if (!firstname_value.match(regularExpressionName)) {
        error = true;
        alert_msg_name.html(
            "Attenzione! Hai inserito caratteri non supportati. Prova ad inserire un altro nome."
        );
    }

    if (!lastname_value.match(regularExpressionName)) {
        error = true;
        alert_msg_lastname.html(
            "Attenzione! Hai inserito caratteri non supportati. Prova ad inserire un altro cognome."
        );
    }

    if (firstname_value.trim() == "") {
        error = true;
        alert_msg_name.html("Attenzione! Campo obbligatorio");
    }

    if (lastname_value.trim() == "") {
        error = true;
        alert_msg_lastname.html("Attenzione! Campo obbligatorio");
    }

    if (!error) {
        $("form[name=registerForm]").submit();
    }
}

function collapseOthers() {
    collapse_div = $("div.multi-collapse.show");

    setTimeout(function () {
        collapse_div.removeClass("show");
    }, 150);
}

function getWeather() {
    var url =
            "http://api.weatherapi.com/v1/forecast.json?key=2bccac77ee8c46e4a00163655210806&q=Brescia&lang=it&days=3&aqi=no&alerts=no";

    $.getJSON(url, function (response) {
        var location = response.location.name;
        var region = response.location.region;

        var days = response.forecast.forecastday; // Array [0 => JSON_Date0, 1 => JSON_Date1, 2 => JSON_Date2]
        icons = [];
        dates = [];
        // console.log(days);

        days.forEach((element, index) => {
            icons[index] = element.day.condition.icon;
            dates[index] = element.date;
        });
        // console.log(dates);

        for (var i = 0; i < icons.length; i++) {
            http = "http:";
            icons[i] = http.concat(icons[i]);
        }
        // console.log(icons);

        days.forEach((element, index) => {
            $("#img-day".concat(index)).attr("src", icons[index]);
            // console.log(dates[index]);
            $("#date-day".concat(index)).html(dates[index].concat('<i class="bi bi-calendar-event-fill ms-3"></i>'));
            $("#list-day".concat(index).concat("-list")).html(index == 0 ? ("Oggi • ").concat(dates[index]) : dates[index]);
            $(".location-name").html(region.concat(" - ").concat(location).concat("<i class='bi bi-geo-fill ms-2'></i>"));
        });
    });
}
