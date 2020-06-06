/* Format Initializations */

const passwordFormat = /^\S{0,8}$/;
const emailIdFormat = /^(.+)@([^\.].*)\.([a-z]{2,})$/;
const pinFormat = /^\d{5}(-\d{4})?$/;
const phoneFormat = /^\d{3}-\d{3}-\d{4}$/;


function subscriber_validation(event, form) {

    var isValid = true;
    var emailContainer = document.getElementsByClassName("right")[0];
    var emailField = emailContainer.getElementsByTagName("input")[0];
    isValid = validate(isValid, emailField, emailContainer, emailIdFormat);
    if (!isValid) {
        event.preventDefault();
        event.stopPropagation();
    }


}

/*Function checks if the field value is empty*/
function isEmpty(value) {
    return value === "";
}

/*Function to get a value from a field */
function getValue(field) {
    switch (field.type) {
        case "text":
            return field.value;
        case "radio":
            var radioName = field.name;
            var isAnyOptionSelected = document.querySelector(`input[name=${radioName}]:checked`);
            if (isAnyOptionSelected) {
                return isAnyOptionSelected.value;
            }
            return "";
        default:
            return field.value;
    }
}

/*Function to validate the regex format */
function validateRegex(value, regex) {
    if (isEmpty(regex)) {
        return true;
    }
    return regex.test(value);
}


/*Function to validate if field value is empty or does not follow the regex format */
function validate(isValid, field, container, regex = "") {
    var fieldValue = getValue(field);

    if (isEmpty(fieldValue)) {
        setError(field, container);
        return false;
    } else if (!validateRegex(fieldValue, regex)) {
        setErrorFormat(field, container);
        return false
    } else {
        setSuccess(field, container);
        return isValid;
    }
}

/*Function to print the label for success and colour changes to green */
function setSuccess(field, container) {
    field.classList.add('success');
    field.classList.remove('error');
    container.getElementsByClassName("error-label")[0].classList.add('hidden');
    container.getElementsByClassName("error-label-format")[0].classList.add('hidden');
}

/*Function to print the label for failure and colour changes to red */
function setError(field, container) {
    field.classList.add('error');
    field.classList.remove('success');
    container.getElementsByClassName("error-label-format")[0].classList.add('hidden');
    container.getElementsByClassName("error-label")[0].classList.remove('hidden');
}

function setErrorFormat(field, container) {
    field.classList.add('error');
    field.classList.remove('success');
    container.getElementsByClassName("error-label")[0].classList.add('hidden');
    container.getElementsByClassName("error-label-format")[0].classList.remove('hidden');
}

/*validate login page*/
function login_page_validation(event, form) {
    var isValid = true;
    var userNameContainer = document.getElementsByClassName("user-name")[0];
    var passwordContainer = document.getElementsByClassName("password")[0];
    var userNameField = userNameContainer.getElementsByTagName("input")[0];
    var passwordField = passwordContainer.getElementsByTagName("input")[0];

    isValid = validate(isValid, userNameField, userNameContainer);
    isValid = validate(isValid, passwordField, passwordContainer);

    if (!isValid) {
        event.preventDefault();
        event.stopPropagation();
    }
}

function login_password_recover_cancel(event, form) {
    document.getElementById('lean-login-page-recover-popup').classList.add('hidden');
}

function contact_us_page_validation(event, form) {

    var isValid = true;
    var userNameContainer = document.getElementsByClassName("firstName")[0];
    var lastNameContainer = document.getElementsByClassName("lastName")[0];
    var userNameField = userNameContainer.getElementsByTagName("input")[0];
    var lastNameField = lastNameContainer.getElementsByTagName("input")[0];
    var emailFieldContainer = document.getElementsByClassName("contact-email")[0];
    var emailField = emailFieldContainer.getElementsByTagName("input")[0];
    var topicFieldContainer = document.getElementsByClassName("contact-topic")[0];
    var topicField = topicFieldContainer.getElementsByTagName("input")[0];
    var messageFieldContainer = document.getElementsByClassName("mensaje")[0];
    var messageField = messageFieldContainer.getElementsByTagName("textarea")[0];


    isValid = validate(isValid, userNameField, userNameContainer);
    isValid = validate(isValid, lastNameField, lastNameContainer);
    isValid = validate(isValid, emailField, emailFieldContainer, emailIdFormat);
    isValid = validate(isValid, topicField, topicFieldContainer);
    isValid = validate(isValid, messageField, messageFieldContainer);


    if (!isValid) {
        event.preventDefault();
        event.stopPropagation();
    }


}

function confirm_event_modal(event) {
    event.preventDefault();
    document.getElementById("lean-login-page-recover-popup").classList.remove('hidden');
}

function login_recover_modal(event) {
    event.preventDefault();
    document.getElementById("lean-login-page-recover-popup").classList.remove('hidden');
}

function register_individual_modal(event) {
    event.preventDefault();
    document.getElementById("lean-register-page-recover-popup").classList.remove('hidden');
}


function register_business_modal(event) {
    event.preventDefault();
    document.getElementById("lean-register-business-page-recover-popup").classList.remove('hidden');
}

function register_agent_modal(event) {
    event.preventDefault();
    document.getElementById("lean-register-agent-page-recover-popup").classList.remove('hidden');
}

function register_individual_page(event, form) {
    var isValid = true;
    var emailContainer = document.getElementsByClassName("email-add")[0];
    var emailField = emailContainer.getElementsByTagName("input")[0];

    var passwordContainer = document.getElementsByClassName("password")[0];
    var passwordField = passwordContainer.getElementsByTagName("input")[0];

    var userNameContainer = document.getElementsByClassName("user-name")[0];
    var userNameField = userNameContainer.getElementsByTagName("input")[0];

    var lastnameContainer = document.getElementsByClassName("last-name")[0];
    var lastNameField = lastnameContainer.getElementsByTagName("input")[0];

    var directionContainer = document.getElementsByClassName("direction")[0];
    var directionField = directionContainer.getElementsByTagName("input")[0];

    var cityContainer = document.getElementsByClassName("city")[0];
    var cityField = cityContainer.getElementsByTagName("input")[0];

    var stateContainer = document.getElementsByClassName("state")[0];
    var stateField = stateContainer.getElementsByTagName("input")[0];

    var pinContainer = document.getElementsByClassName("pin")[0];
    var pinField = pinContainer.getElementsByTagName("input")[0];

    isValid = validate(isValid, emailField, emailContainer, emailIdFormat);
    isValid = validate(isValid, passwordField, passwordContainer, passwordFormat);
    isValid = validate(isValid, userNameField, userNameContainer);
    isValid = validate(isValid, lastNameField, lastnameContainer);
    isValid = validate(isValid, directionField, directionContainer);
    isValid = validate(isValid, cityField, cityContainer);
    isValid = validate(isValid, stateField, stateContainer);
    isValid = validate(isValid, pinField, pinContainer, pinFormat);

    if (!isValid) {
        event.preventDefault();
        event.stopPropagation();
    }
}

function register_individual_cancel(event, form) {
    document.getElementById('lean-register-page-recover-popup').classList.add('hidden');
    window.location.href = "./lean-register-page.php";

}

function register_business_page(event, form) {
    var isValid = true;
    var emailContainer = document.getElementsByClassName("business-email-add")[0];
    var emailField = emailContainer.getElementsByTagName("input")[0];

    var passwordContainer = document.getElementsByClassName("business-password")[0];
    var passwordField = passwordContainer.getElementsByTagName("input")[0];

    var userNameContainer = document.getElementsByClassName("business-user-name")[0];
    var userNameField = userNameContainer.getElementsByTagName("input")[0];

    var lastnameContainer = document.getElementsByClassName("business-last-name")[0];
    var lastNameField = lastnameContainer.getElementsByTagName("input")[0];

    var directionContainer = document.getElementsByClassName("business-direction")[0];
    var directionField = directionContainer.getElementsByTagName("input")[0];

    var cityContainer = document.getElementsByClassName("business-city")[0];
    var cityField = cityContainer.getElementsByTagName("input")[0];

    var stateContainer = document.getElementsByClassName("business-state")[0];
    var stateField = stateContainer.getElementsByTagName("input")[0];

    var pinContainer = document.getElementsByClassName("business-pin")[0];
    var pinField = pinContainer.getElementsByTagName("input")[0];

    var businessTypeContainer = document.getElementsByClassName("business-type")[0];
    var businessTypeRadios = businessTypeContainer.getElementsByTagName("input")[0];

    var foundationContainer = document.getElementsByClassName("business-foundation")[0];
    var foundationField = foundationContainer.getElementsByTagName("input")[0];

    isValid = validate(isValid, emailField, emailContainer, emailIdFormat);
    isValid = validate(isValid, passwordField, passwordContainer, passwordFormat);
    isValid = validate(isValid, userNameField, userNameContainer);
    isValid = validate(isValid, lastNameField, lastnameContainer);
    isValid = validate(isValid, directionField, directionContainer);
    isValid = validate(isValid, cityField, cityContainer);
    isValid = validate(isValid, stateField, stateContainer);
    isValid = validate(isValid, pinField, pinContainer, pinFormat);
    isValid = validate(isValid, businessTypeRadios, businessTypeContainer);
    isValid = validate(isValid, foundationField, foundationContainer);

    if (!isValid) {
        event.preventDefault();
        event.stopPropagation();

    }

}

function register_business_cancel(event, form) {
    document.getElementById('lean-register-business-page-recover-popup').classList.add('hidden');
    window.location.href = "./lean-register-page.php";

}


function register_agent_page(event, form) {

    var isValid = true;
    var emailContainer = document.getElementsByClassName("agent-email-add")[0];
    var emailField = emailContainer.getElementsByTagName("input")[0];

    var passwordContainer = document.getElementsByClassName("agent-password")[0];
    var passwordField = passwordContainer.getElementsByTagName("input")[0];

    var userNameContainer = document.getElementsByClassName("agent-name")[0];
    var userNameField = userNameContainer.getElementsByTagName("input")[0];

    var lastnameContainer = document.getElementsByClassName("agent-surname")[0];
    var lastNameField = lastnameContainer.getElementsByTagName("input")[0];

    var directionContainer = document.getElementsByClassName("agent-direction")[0];
    var directionField = directionContainer.getElementsByTagName("input")[0];

    var cityContainer = document.getElementsByClassName("agent-city")[0];
    var cityField = cityContainer.getElementsByTagName("input")[0];

    var stateContainer = document.getElementsByClassName("agent-state")[0];
    var stateField = stateContainer.getElementsByTagName("input")[0];

    var pinContainer = document.getElementsByClassName("agent-pin")[0];
    var pinField = pinContainer.getElementsByTagName("input")[0];

    isValid = validate(isValid, emailField, emailContainer, emailIdFormat);
    isValid = validate(isValid, passwordField, passwordContainer, passwordFormat);
    isValid = validate(isValid, userNameField, userNameContainer);
    isValid = validate(isValid, lastNameField, lastnameContainer);
    isValid = validate(isValid, directionField, directionContainer);
    isValid = validate(isValid, cityField, cityContainer);
    isValid = validate(isValid, stateField, stateContainer);
    isValid = validate(isValid, pinField, pinContainer, pinFormat);

    if (!isValid) {
        event.preventDefault();
        event.stopPropagation();

    }


}

function register_agent_cancel(event, form) {
    document.getElementById('lean-register-agent-page-recover-popup').classList.add('hidden');
    window.location.href = "./lean-register-page.php";

}

function scroll_to_top() {
    window.scrollTo(0, 0);
}

function scroll_to_left() {
    window.scrollBy(500, 500);

}

function homepage_mobile_menu() {

    var menuClasslist = document.getElementsByClassName("menu")[0].classList;
    var isMobileClassAvailable = menuClasslist.value.indexOf('drawer');
    if (isMobileClassAvailable === -1) {
        document.getElementsByClassName("menu")[0].classList.add('drawer');
    } else {
        document.getElementsByClassName("menu")[0].classList.remove('drawer');
    }
}


function addNewEvent() {
    document.getElementById('add-event-page').classList.remove('hidden');
}


function add_event(data, form) {
    return true;
}

function showTab(event, tabId) {
    document.getElementsByClassName('tab-content active desktop')[0].classList.remove("active");
    document.getElementsByClassName('tab-content active mobile')[0].classList.remove("active");
    document.getElementsByClassName('desktop tab-content-' + tabId)[0].classList.add("active");
    document.getElementsByClassName('mobile tab-content-' + tabId)[0].classList.add("active");

    document.getElementsByClassName('tab-header active')[0].classList.remove("active");
    document.getElementsByClassName('tab-header tab-' + tabId)[0].classList.add("active");
}

function add_event_validation(event, form) {
    var isValid = true;
    var placeContainer = document.getElementsByClassName("event-place")[0];
    var placeField = placeContainer.getElementsByTagName("input")[0];

    var dateContainer = document.getElementsByClassName("event-date")[0];
    var dateField = dateContainer.getElementsByTagName("input")[0];

    var userNameContainer = document.getElementsByClassName("event-name")[0];
    var userNameField = userNameContainer.getElementsByTagName("input")[0];

    var timeContainer = document.getElementsByClassName("event-time")[0];
    var timeField = timeContainer.getElementsByTagName("input")[0];

    var costContainer = document.getElementsByClassName("event-cost")[0];
    var costField = costContainer.getElementsByTagName("input")[0];

    var messageFieldContainer = document.getElementsByClassName("eventDescription")[0];
    var messageField = messageFieldContainer.getElementsByTagName("textarea")[0];


    isValid = validate(isValid, placeField, placeContainer);
    isValid = validate(isValid, dateField, dateContainer);
    isValid = validate(isValid, userNameField, userNameContainer);
    isValid = validate(isValid, timeField, timeContainer);
    isValid = validate(isValid, costField, costContainer);
    isValid = validate(isValid, messageField, messageFieldContainer);


    if (!isValid) {
        event.preventDefault();
        event.stopPropagation();

    }

}

function validate_profile(event, form) {
    var isValid = true;
    var phoneContainer = document.getElementsByClassName("phone")[0];
    var phoneField = phoneContainer.getElementsByTagName("input")[0];

    var passwordContainer = document.getElementsByClassName("password")[0];
    var passwordField = passwordContainer.getElementsByTagName("input")[0];


    isValid = validate(isValid, phoneField, phoneContainer, phoneFormat);
    isValid = validate(isValid, passwordField, passwordContainer, passwordFormat);

    if (!isValid) {
        event.preventDefault();
        event.stopPropagation();
    }
}

function decreaseQuantity() {
    var currentValue = parseInt(document.getElementById('quantity').value);
    if (currentValue > 0) {
        document.getElementById('quantity').value = currentValue - 1;
    }

}

function increaseQuantity() {
    var currentValue = parseInt(document.getElementById('quantity').value);
    if (currentValue < 10) {
        document.getElementById('quantity').value = currentValue + 1;
    }
}

function showNextPage(event, quantity){
    var maxElements = 3;

    var minIndex = (quantity-1) * maxElements;
    var maxIndex = (quantity * maxElements);
    var rows = document.getElementsByClassName("events-row");
    for(var i=0;i<rows.length;i++){
        if(i >= minIndex && i < maxIndex){
            rows[i].classList.remove("hidden");
        }
        else{
            rows[i].classList.add("hidden");
        }
        document.getElementsByClassName("page-navigation-item active")[0].classList.remove('active');
        document.getElementsByClassName("page-"+quantity)[0].classList.add('active');

    }

}
