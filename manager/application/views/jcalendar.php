<?php
	echo link_tag(base_url().'assets/plugins/jcalendar/fullcalendar.css') . "\n";
?>
<link href='<?php echo base_url()?>assets/plugins/jcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />

<script type="text/javascript" src="<?php echo base_url().'assets/plugins/jcalendar/lib/moment.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/jcalendar/lang/pt-br.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/jcalendar/fullcalendar.min.js' ?>"></script>

<script>

	$(document).ready(function() {
		$('#calendar').fullCalendar({
			 lang: 'pt-br',
			defaultDate: '2016-06-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
					start: '2016-06-01'
				},
				{
					title: 'Long Event',
					start: '2016-06-07',
					end: '2016-06-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2016-06-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2016-06-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2016-06-11',
					end: '2016-06-13'
				},
				{
					title: 'Meeting',
					start: '2016-06-12T10:30:00',
					end: '2016-06-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2016-06-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2016-06-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2016-06-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2016-06-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2016-06-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2016-06-28'
				}
			]
		});
		
	});

</script>

</head>
<body>

	<div id='calendar'></div>

</body>

