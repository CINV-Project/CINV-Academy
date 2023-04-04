
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
    <link href="student.css" rel="stylesheet">
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
</head>

<body>
    <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="student.php">
            CINV ACADEMY
          </a>
          <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
            <span class="sr-only">
              Toggle navigation
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
            <span class="icon-bar">
            </span>
          </button>
      </div>
      <div class="navbar-collapse collapse" id="navbarCollapse">
        <ul class="nav navbar-nav">
          <li >
            <a href="student.php">
            <span class="glyphicon glyphicon-home"> </span> Home</a>
          </li>
            <li class="active">
            <a href="#fullcalendar.php">
              Calendar
            </a>
          </li>
          <li>
            <a href="#">
              Connection
            </a>
          </li>
            <li>
            <a href="#">
              Discussion
            </a>
          </li>
          <li>
              <a class="dropdown-toggle" type="button" data-toggle="dropdown">Department
                <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Computer Science</a></li>
                <li><a href="#">English</a></li>
                <li><a href="#">Math</a></li>
            </ul>
          </li>
            <li >
            <a href="profile.php">
              Profile
            </a>
          </li>
        </ul>
   
<!-- drop-down for user -->       
    <form class="navbar-form navbar-right">
            <a class="btn btn-success" type="button" data-toggle="dropdown">User Name Here!
                <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
    </form>
      
<!-- Searching bar -->        
          
        <form class="navbar-form navbar-right" role="search">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-info">
                Go
              </button>
            </span>
            <label for="search" class="sr-only">
              Search
            </label>
            <input type="text" id="search" class="form-control" placeholder="Search">
            <span class="glyphicon glyphicon-search form-control-feedback">
            </span>
          </div>
        </form>
<!-- end of searching bar -->
                     
     </div>
  </div>
  </nav>
    
<!-- end of nav-bar -->       


<div class="container">
    <div class=" wrapper">
        <!--calendar class-->
        <div id="calendar"></div>
    </div> 
    
</div>
    
    
</body>
</html>