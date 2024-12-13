const calendarBody = document.getElementById('calendarBody');
const monthYear = document.getElementById('monthYear');
const prev = document.getElementById('prev');
const next = document.getElementById('next');

let date = new Date();
let currentMonth = date.getMonth();
let currentYear = date.getFullYear();
let selectedDateCell = null;

const months = [
    "January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];

function showCalendar(month, year) {
    calendarBody.innerHTML = "";
    monthYear.textContent = `${months[month]} ${year}`;

    const firstDay = new Date(year, month, 1).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    let date = 1;
    for (let i = 0; i < 6; i++) {
        let row = document.createElement("tr");

        for (let j = 0; j < 7; j++) {
            let cell = document.createElement("td");

            if (i === 0 && j < firstDay) {
                row.appendChild(cell);
            } else if (date > daysInMonth) {
                break;
            } else {
                cell.textContent = date;

                if (
                    date === new Date().getDate() &&
                    year === new Date().getFullYear() &&
                    month === new Date().getMonth()
                ) {
                    cell.classList.add("today");
                }

                // Add click event for date selection
                cell.addEventListener("click", function() {
                    if (selectedDateCell) {
                        selectedDateCell.classList.remove("selected");
                    }
                    cell.classList.add("selected");
                    selectedDateCell = cell;
                });

                row.appendChild(cell);
                date++;
            }
        }
        calendarBody.appendChild(row);
    }
}

prev.addEventListener('click', () => {
    currentMonth--;
    if (currentMonth < 0) {
        currentMonth = 11;
        currentYear--;
    }
    showCalendar(currentMonth, currentYear);
});

next.addEventListener('click', () => {
    currentMonth++;
    if (currentMonth > 11) {
        currentMonth = 0;
        currentYear++;
    }
    showCalendar(currentMonth, currentYear);
});

showCalendar(currentMonth, currentYear);
