
$(function(){

    var currentDate; // Holds the day clicked when adding a new event
    var currentEvent; // Holds the event object when editing an event

    $('#color').colorpicker(); // Colopicker
    $('#time').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true,
        showMeridian: false
    });  // Timepicker

    //var base_url='http://dev.local/fullcalendar/'; // Here i define the base_url
    //var base_url='http://dev.local/agath/manager/'; // Here i define the base_url
    //var base_url = '<?php echo $urlsite; ?>';
    var currentLocation = window.location.origin;
   //console.log(currentLocation);
    var base_url = currentLocation + '/agath/manager/';


    // Fullcalendar
    $('#calendar').fullCalendar({
   // var noTZ = $.fullCalendar.moment.parseZone('2016-07-01T12:00:00');
       timeFormat: 'H(:mm)',
        header: {
            left: 'prev, next, today',
            center: 'title',
             //right: 'month, basicWeek, basicDay'
             right: 'month,agendaWeek,agendaDay'
        },
        // Get all events stored in database
        slotDuration: '00:15:00',
        eventLimit: true, // allow "more" link when too many events
        editable: false,
        droppable: false,
        events: base_url+'Calendar/getEvents',
        
        // Handle Day Click
        dayClick: function(date, event, view) {
            currentDate = date.format();
            // Open modal to add event
            modal({
                // Available buttons when adding
                buttons: {
                    add: {
                        id: 'add-event', // Buttons id
                        css: 'btn-success', // Buttons class
                        label: 'Novo' // Buttons label
                    }
                },
                title: 'Novo Evento (' + date.format() + ')' // Modal title
            });
        },

   
          editable: false, // Make the event draggable true 
         eventDrop: function(event, delta, revertFunc) {

               $.post(base_url+'Calendar/dragUpdateEvent',{
                id:event.id,
                date: event.start.format()
            }, function(result){
                if(result)
                {
                alert('Atualizado');
                }
                else
                {
                    alert('Tente novamente mais tarde!')
                }

            });



          },
        // Event Mouseover
        eventMouseover: function(calEvent, jsEvent, view){

            var tooltip = '<div class="event-tooltip">' + calEvent.description + '</div>';
            $("body").append(tooltip);

            $(this).mouseover(function(e) {
                $(this).css('z-index', 10000);
                $('.event-tooltip').fadeIn('500');
                $('.event-tooltip').fadeTo('10', 1.9);
            }).mousemove(function(e) {
                $('.event-tooltip').css('top', e.pageY + 10);
                $('.event-tooltip').css('left', e.pageX + 20);
            });
        },
        eventMouseout: function(calEvent, jsEvent) {
            $(this).css('z-index', 8);
            $('.event-tooltip').remove();
        },
        // Handle Existing Event Click
        eventClick: function(calEvent, jsEvent, view) {
            // Set currentEvent variable according to the event clicked in the calendar
            currentEvent = calEvent;

            // Open modal to edit or delete event
            modal({
                // Available buttons when editing
                buttons: {
                    delete: {
                        id: 'delete-event',
                        css: 'btn-danger',
                        label: 'Excluir'
                    },
                    update: {
                        id: 'update-event',
                        css: 'btn-success',
                        label: 'Atualizar'
                    }
                },
                title: 'Editar Evento "' + calEvent.title + '"',
                event: calEvent
            });
        }

    });

function splitString(string){
    var str = string.split(" ")[1].slice(0, -3);
  
  // var hora = str.split(":").slice(0)+ ":" + str.split(":").slice(1);
  // var h = hora.split(":").slice(0) ;
   return str;

}

    // Prepares the modal window according to data passed
    function modal(data) {
        // Set modal title
        $('.modal-title').html(data.title);
        // Clear buttons except Cancel
        $('.modal-footer button:not(".btn-default")').remove();
        // Set input values
        $('#title').val(data.event ? data.event.title : '');
        if( ! data.event) {
            // When adding set timepicker to current time
            var now = new Date();
            var time = now.getHours() + ':' + (now.getMinutes() < 10 ? '0' + now.getMinutes() : now.getMinutes());
            // var start = now.getHours() + ':' + (now.getMinutes() < 10 ? '0' + now.getMinutes() : now.getMinutes());
            // var end = now.getHours() + ':' + (now.getMinutes() < 10 ? '0' + now.getMinutes() : now.getMinutes());
        } else {
            // When editing set timepicker to event's time
          //  console.log(data.event.start);
          //  console.log(data.event.start._locale._longDateFormat.LT);
            var time = data.event.date.split(' ')[1].slice(0, -3);
            var start = splitString(data.event.start._i);
            var end = splitString(data.event.end._i);

            time = time.charAt(0) === '0' ? time.slice(1) : time;
           
        }
       // $('#time').val(time);
        //$('#starttime').val(data.event.start._i);
        $('#starttime').val(start);
        $('#endtime').val(end);
        $('#description').val(data.event ? data.event.description : '');
        $('#color').val(data.event ? data.event.color : '#3a87ad');
        // Create Butttons
        $.each(data.buttons, function(index, button){
            $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
        })
        //Show Modal
        $('.modal').modal('show');
    }

    // Handle Click on Add Button
    $('.modal').on('click', '#add-event',  function(e){
        if(validator(['title', 'description'])) {
            $.post(base_url+'calendar/addEvent', {
                title: $('#title').val(),
                description: $('#description').val(),
                color: $('#color').val(),
                date: currentDate + ' ' + getTime(),
                starttime: currentDate + ' ' + getTime(),
                endtime: currentDate + ' ' + $('#endtime').val() + ':00',
            }, function(result){
                $('.modal').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
            });
        }
    });


    // Handle click on Update Button
    $('.modal').on('click', '#update-event',  function(e){
        if(validator(['title', 'description'])) {
            $.post(base_url+'Calendar/updateEvent', {
                id: currentEvent._id,
                title: $('#title').val(),
                description: $('#description').val(),
                start: currentEvent.date.split(' ')[0]  + ' ' + $('#starttime').val() + ':00',
                end: currentEvent.date.split(' ')[0]  + ' ' + $('#endtime').val() + ':00',
                color: $('#color').val(),
                date: currentEvent.date.split(' ')[0]  + ' ' +  getTime()
            }, function(result){
                $('.modal').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
            });
        }
    });



    // Handle Click on Delete Button
    $('.modal').on('click', '#delete-event',  function(e){
        $.get(base_url+'calendar/deleteEvent?id=' + currentEvent._id, function(result){
            $('.modal').modal('hide');
            $('#calendar').fullCalendar("refetchEvents");
        });
    });


    // Get Formated Time From Timepicker
    function getTime() {
        var time = $('#starttime').val();
        return (time.indexOf(':') == 1 ? '0' + time : time) + ':00';
    }

    // Dead Basic Validation For Inputs
    function validator(elements) {
        var errors = 0;
        $.each(elements, function(index, element){
            if($.trim($('#' + element).val()) == '') errors++;
        });
        if(errors) {
            $('.error').html('Por favor insira um titulo e uma descrição');
            return false;
        }
        return true;
    }
});


