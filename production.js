document.getElementById('reminderForm2').addEventListener('submit', function (event) {
    event.preventDefault();

    const message = document.getElementById('message').value;
    const date = document.getElementById('reminderDate').value;
    const time = document.getElementById('reminderTime').value;

    fetch('add_reminder2.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ message, date, time })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // alert('Reminder Added!');
                swal("Lezafarming", "Reminder Added!");
                loadReminders();
            } else {
                alert('Not added');
            }
        });
});


function loadReminders1() {
    fetch('get_reminders2.php')
        .then(response => response.json())
        .then(data => {
            const remindersList23 = document.getElementById('remindersList23');
            remindersList23.innerHTML = '';
            data.production_reminder.forEach(reminder => {
                const reminderTime = new Date(`${reminder.reminder_date}T${reminder.reminder_time}`);
                const currentTime = new Date();

                // Check if the reminder time is in the future
                if (reminderTime > currentTime) {
                    const div = document.createElement('div');
                    div.textContent = `${reminder.message} - ${reminder.reminder_date} ${reminder.reminder_time}`;

                    // Set an interval to check when to display the reminder
                    const interval = setInterval(() => {
                        const now = new Date();
                        if (now >= reminderTime) {
                            // alert(`Message: ${reminder.message}`);
                            swal("Lezafarming", `Message: ${reminder.message}`);
                            document.getElementById("msga").innerHTML = reminder.message;
                            document.getElementById("msgDiva").className = "d-block";
                            div.textContent += " (Reminder Seened)";
                            clearInterval(interval);
                        }
                    }, 1000); // Check every second

                    remindersList23.appendChild(div);
                }
            });
        });
}

document.addEventListener('DOMContentLoaded', loadReminders1);