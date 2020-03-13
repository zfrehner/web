//Zach Frehner
//Guestbook form validation

document.getElementById("guestBook").addEventListener("submit", validate);

function validate(e) {
    let validFirst = validateInputField("firstName", "err-fName");
    let validLast = validateInputField("lastName", "err-lName");
    let validMeet = validateSelectList("meet", "err-meet");
    let validEmail= validateEmail("email", "err-email");
    let validList = validateCheckBox("list", "err-list");
    let validLinkedIn = validateURL("linked-in", "err-link");

    let validInput = validFirst && validLast && validMeet && validEmail && validList && validLinkedIn;

    if(validInput === false) {
        e.preventDefault();
    }
}

//Validates Name and "how did we meet" Fields to make sure they are not empty
function validateInputField(id, errorId) {

    let txtField = document.getElementById(id).value;
    let errField = document.getElementById(errorId);
    if(txtField === "") {
        errField.className = "err";
        return false;
    }
    errField.className = "hidden";
    return true;
}

//Validates Email contains @ and .
function validateEmail(id, errorId) {

    let txtField = document.getElementById(id).value;
    let errField = document.getElementById(errorId);
    if(txtField === "") {
        errField.className = "hidden";
        return true;
    }
    else if(txtField.includes("@") === false || (txtField.includes(".") === false ))  {
        errField.className = "err";
        return false;
    }
}

function validateSelectList(id, errorId) {
    let index = document.getElementById(id).selectedIndex;
    let errField = document.getElementById(errorId);
    if(index === 0) {
        errField.className = "err";
        return false;
    }
    errField.className = "hidden";
    return true;
}

function validateCheckBox(id, errorId) {
    let checkBox = document.getElementById(id).checked;
    let errField = document.getElementById(errorId);
    if(checkBox === true && validateEmail("email", "err-email") === true) {
        errField.className = "err";
        return false;
    }
    errField.className = "hidden";
    return true;
}

function validateURL(id, errorId) {
    let url = document.getElementById(id).value;
    let errField = document.getElementById(errorId);
    if(url !== "" && (url.startsWith("http") === true && url.endsWith(".com") === true)) {
        errField.className = "hidden";
        return true;
    }
    else if(url === "") {
            errField.className = "hidden";
            return true;
        }
    else {
        errField.className = "err";
        return false;
    }

}


//trying to use reg expressions-almost there
/*let str = document.getElementById("linked-in").value;
function validateURL(str) {
    let pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
        '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
    if(str !== pattern) {
        let errField = document.getElementById("err-linked-in");
        errField.classname = "err";
        return false;
    }*/
    //return !!pattern.test(str);

//siting source https://stackoverflow.com/questions/5717093/check-if-a-javascript-string-is-a-url