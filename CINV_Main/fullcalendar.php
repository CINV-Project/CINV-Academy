<?php

	require('config.inc.php');
	require('functions.php');

	if(!logged_in()){
		header("Location: student.php");
		die;
	}

	$user_id = $_GET['id'] ?? $_SESSION['USER']['id'];

	$query = "select * from users where id = '$user_id' limit 1";
	$row = query($query);

	if($row)
	{
		$row = $row[0];
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>

    <!--Include sources-->
    <script src="js/sweetalert2.all.min.js"></script>

    <link href="js/fullcalendar/lib/main.css" rel="stylesheet" />
    <script src="js/fullcalendar/lib/main.js"></script>

    <!-- Boostrap template -->
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="Styling.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
    </script>
    <script src="js/bootstrap.min.js">
    </script>
             
    <!-- create background cover -->     
    <style>
    body {
    background-image: url('images/background2%20(1).jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    }
    </style>





 
    <!--main script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 650,
                events: 'fetchEvents.php',
                
                selectable: true,
                select: async function (start, end, allDay) {
                const { value: formValues } = await Swal.fire({
                    title: 'Add Event',
                    confirmButtonText: 'Submit',
                    showCloseButton: true,
                    showCancelButton: true,
                    html:
                    '<input id="swalEvtTitle" class="swal2-input" placeholder="Enter title">' +
                    '<textarea id="swalEvtDesc" class="swal2-input" placeholder="Enter description"></textarea>' +
                    '<input id="swalEvtURL" class="swal2-input" placeholder="Enter URL">',
                    focusConfirm: false,
                    preConfirm: () => {
                    return [
                        document.getElementById('swalEvtTitle').value,
                        document.getElementById('swalEvtDesc').value,
                        document.getElementById('swalEvtURL').value
                    ]
                    }
                });

                if (formValues) {
                    // Add event
                    fetch("eventHandler.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ request_type:'addEvent', start:start.startStr, end:start.endStr, event_data: formValues}),
                    })
                    .then(response => response.json())
                    .then(data => {
                    if (data.status == 1) {
                        Swal.fire('Event added successfully!', '', 'success');
                    } else {
                        Swal.fire(data.error, '', 'error');
                    }

                    // Refetch events from all sources and rerender
                    calendar.refetchEvents();
                    })
                    .catch(console.error);
                }
                },

                eventClick: function(info) {
                info.jsEvent.preventDefault();
                
                // change the border color
                info.el.style.borderColor = 'pink';
                
                Swal.fire({
                    title: info.event.title,
                    icon: 'info',
                    html:'<p>'+info.event.extendedProps.description+'</p><a href="'+info.event.url+'">Visit event page</a>',
                    showCloseButton: true,
                    showCancelButton: true,
                    showDenyButton: true,
                    cancelButtonText: 'Close',
                    confirmButtonText: 'Delete',
                    denyButtonText: 'Edit',
                }).then((result) => {
                    if (result.isConfirmed) {
                    // Delete event
                    fetch("eventHandler.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({ request_type:'deleteEvent', event_id: info.event.id}),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status == 1) {
                        Swal.fire('Event deleted successfully!', '', 'success');
                        } else {
                        Swal.fire(data.error, '', 'error');
                        }

                        // Refetch events from all sources and rerender
                        calendar.refetchEvents();
                    })
                    .catch(console.error);
                    } else if (result.isDenied) {
                    // Edit and update event
                    Swal.fire({
                        title: 'Edit Event',
                        html:
                        '<input id="swalEvtTitle_edit" class="swal2-input" placeholder="Enter title" value="'+info.event.title+'">' +
                        '<textarea id="swalEvtDesc_edit" class="swal2-input" placeholder="Enter description">'+info.event.extendedProps.description+'</textarea>' +
                        '<input id="swalEvtURL_edit" class="swal2-input" placeholder="Enter URL" value="'+info.event.url+'">',
                        focusConfirm: false,
                        confirmButtonText: 'Submit',
                        preConfirm: () => {
                        return [
                        document.getElementById('swalEvtTitle_edit').value,
                        document.getElementById('swalEvtDesc_edit').value,
                        document.getElementById('swalEvtURL_edit').value
                        ]
                        }
                    }).then((result) => {
                        if (result.value) {
                        // Edit event
                        fetch("eventHandler.php", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify({ request_type:'editEvent', start:info.event.startStr, end:info.event.endStr, event_id: info.event.id, event_data: result.value})
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status == 1) {
                            Swal.fire('Event updated successfully!', '', 'success');
                            } else {
                            Swal.fire(data.error, '', 'error');
                            }

                            // Refetch events from all sources and rerender
                            calendar.refetchEvents();
                        })
                        .catch(console.error);
                        }
                    });
                    } else {
                    Swal.close();
                    }
                });
                }
            });

            calendar.render();
        });
    </script>

</head>




      
<!-- Navigation bar-->
<?php 
include "header.inc.php";
?>      


<div class="class_1" style="padding:5%;max-width:auto; margin-top:10%">
    <div class=" wrapper">
        <!--calendar class-->
        <div id="calendar"></div>
    </div> 
    
</div>
    
<?php 
include "footer.php";
?>
</body>
</html>