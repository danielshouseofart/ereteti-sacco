const litres = document.querySelector('#litres');
const litresMessage = document.querySelector('#litres-message');

console.log(litres);
console.log(litresMessage);
console.log(document);

function checkLitres() {
    let amount = Number(litres.value);
    if(litres.value === "") {
        litresMessage.textContext = "";
        litres.classList.remove('invalid');
    }
    else if (amount > 60) {
        litresMessage.textContent ='Over 60 litres in one session. Check the reading.';
        litres.classList.add('invalid');
}
    else if(amount <= 0) { 
        litresMessage.textContent = "Please enter a valid amount.";
        litres.classList.add('invalid');
    }
    else {
        litresMessage.textContent = "";
        litres.classList.remove('invalid');
    }
}
if (litres) {
    litres.addEventListener('input', checkLitres);
}

const member = document.querySelector('#member');
const memberMessage = document.querySelector('#member-message');
let memberRegex = /^ER-[0-9]{4}$/;

function checkMember() {
    let typed = member.value.trim().toUpperCase();
    if(memberRegex.test(typed) ) {
        memberMessage.textContent = "";
        member.classList.remove('invalid');
    
    }
    else {
        memberMessage.textContent = "Please enter a valid member ID.";
        member.classList.add('invalid');
    }
}
if (member) {
    member.addEventListener('input', checkMember);
}

const deliveryForm = document.querySelector('#delivery-form');
const formMessage = document.querySelector('#form-message');
function recordDelivery(event) {
event.preventDefault();
checkMember();
checkLitres();
if (member.classList.contains('invalid')) {
member.focus();
} else if (litres.classList.contains('invalid')) {
litres.focus();
} else {
formMessage.textContent = 'Checked: ' + member.value + ', ' +
litres.value + ' litres. Nothing is sent yet: ' +
'that needs a server.';
}
}
if (deliveryForm) {
deliveryForm.addEventListener('submit', recordDelivery);
}

const search = document.querySelector('#route-search');
const routeCount = document.querySelector('#route-count');
const routeSections = document.querySelectorAll('main section');
function filterRoutes() {
const wanted = search.value.trim().toLowerCase();
let shown = 0;
for (const section of routeSections) {
const words = section.textContent.toLowerCase();
if (words.includes(wanted)) {
section.hidden = false;
shown = shown + 1;
} else {
section.hidden = true;
}
}
routeCount.textContent =
shown + ' of ' + routeSections.length + ' routes';
}
if (search) {
search.addEventListener('input', filterRoutes);
}

const totalCell = document.querySelector('#accepted-total');
if (totalCell) {
const rows = document.querySelectorAll('tbody tr');
let total = 0;
for (const row of rows) {
const cells = row.querySelectorAll('td');
if (cells[2].textContent === 'Yes') {
total = total + Number(cells[4].textContent);
}
}
totalCell.textContent = total.toFixed (2);
}