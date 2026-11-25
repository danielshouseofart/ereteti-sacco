const litres = document.querySelector('#litres');
const litresMessage = document.querySelector('#litres-message');

console.log(litres);
console.log(litresMessage);
console.log(document);

function checkLitres() {
    let amount = Number(litres.value);
    if(litres.value === "") {
        litresMessage.textContent = "";
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
    if (!member) return;
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
    checkMember();
    checkLitres();

    if (member && member.classList.contains('invalid')) {
        event.preventDefault();          // stop: the member number is wrong
        member.focus();
    } else if (litres && litres.classList.contains('invalid')) {
        event.preventDefault();          // stop: the litres are wrong
        litres.focus();
    }
    // Nothing is wrong: the form continues to process-delivery.php.
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
filterRoutes();
}

const totalCell = document.querySelector('#accepted-total');
if (totalCell) {
const rows = document.querySelectorAll('tbody tr');
if (rows.length === 1 && rows[0].cells.length === 1 && rows[0].cells[0].colSpan === 6) {
totalCell.textContent = '';
} else {
let total = 0;
for (const row of rows) {
const cells = row.querySelectorAll('td');
if (cells.length > 4 && cells[4].textContent.trim() === 'Yes') {
total = total + Number(cells[3].textContent);
}
}
totalCell.textContent = total.toFixed (2);
}
}