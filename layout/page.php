<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php echo isset($page_title) ? $page_title : 'Welcome to CINV Academy' ?>
  </title>
  <link href="/static/css/bootstrap.min.css" rel="stylesheet">
  <link href="/static/css/Styling.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Vollkorn+SC&display=swap" rel="stylesheet">

   <!--Include sources for calendar-->
   <script src="js/sweetalert2.all.min.js"></script>
  <link href="js/fullcalendar/lib/main.css" rel="stylesheet" />
  <script src="js/fullcalendar/lib/main.js"></script>

  <style>

  </style>
  


<body>
  <?php include 'chunks/navbar.php' ?>

  <!-- Boostrap template -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
  </script>
  <script src="/static/js/bootstrap.min.js">
  </script>

  <!-- Preact entrypoint -->
  <script src="/static/js/frontend_build.js" defer></script>
  <script>
    new EventSource('/esbuild').addEventListener('change', () => location.reload())
  </script>
  
  <!-- input bacground image-->
  <style>
    body {
      background-image: url('/static/images/background2%20(1).jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
    }
  </style>

<!--main script for calendar-->
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




  <?php echo isset($body_content) ? $body_content : '' ?>

  <?php include 'chunks/footer.php' ?>

</body>

</html>