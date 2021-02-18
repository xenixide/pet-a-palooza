<link rel="stylesheet" href="<?php echo base_url() ?>js/fullcalendar/fullcalendar.min.css" />
<script src="<?php echo base_url() ?>js/fullcalendar/lib/moment.min.js"></script>
<script src="<?php echo base_url() ?>js/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url() ?>js/fullcalendar/gcal.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#calendar').fullCalendar({
        height: 650,
        aspectRatio: 5,
        dayClick: function(date) {
            var base_url = window.location.origin + '/admin/events/' + date.format();
            window.location =  base_url;
        },
        eventSources: [
            {
                color: '#18b9e6',   
                textColor: '#000000',
                events: [
                    <?php foreach ($events as $event):?>
                        {
                            title: '<?=$event->title?> <?=$event->time?>',
                            start: '<?=$event->start?>',
                        },
                    <?php endforeach; ?>
                ]
            }
        ]
    });
});
</script>