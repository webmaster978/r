    <?php

    require_once('../personnel/bdd.php');
    date_default_timezone_set("Asia/Manila");

    $sql = "SELECT id, title, start, end, color FROM events_demo ";

    $req = $bdd->prepare($sql);
    $req->execute();

    $events = $req->fetchAll();


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--<meta http-equiv="refresh" content="60"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
       <!--  <link rel="shortcut icon" href="../personnel/img/favicon.png"> -->

        <title>Calendar Generic</title>

        <!-- Bootstrap Core CSS -->
        <!-- <link href="../personnel/css/bootstrap.min.css" rel="stylesheet"> -->
        <?php include '../partials/_linka.php'; ?>

        <!-- FullCalendar -->
        <!-- <link href='css/fullcalendar.css' rel='stylesheet' /> -->
       <link href='../personnel/css/fullcalendarxx.min.css' rel='stylesheet' />
        <!-- <link href='../personnel/css/sweetalert.css' rel='stylesheet' /> -->
       



        <!-- Custom CSS -->
      



    </head>

    <body  style="background: #ECF0F5;">

        <!-- Navigation -->
      <div class="top-bar primary-top-bar">
            <?php include 'part/_side.php'; ?>
        </div>
        <?php include 'part/_menu.php'; ?>

        <div class="row page-header">
                <div class="col-lg-6 align-self-center ">
                  <h2>Dashboard</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                
        </div>
         <section class="main-content">


        <!-- Page Content -->

        <div class="row"><section class="content">
            <div class="col-md-12">
                <div class="box box-success">

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="example1" class="table table-bordered table-hover">




                                    <div id="calendar" class="col-centered">
                                    </div>


                                </table>

                            </div><!--col end -->

                        </div><!--row end-->

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (right) -->


         
</section>
            <!-- /.row -->



    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="../personnel/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../personnel/js/bootstrap.min.js"></script>

    <!-- FullCalendar -->
    <script src='../personnel/js/moment.min.js'></script>
    <!-- <script src='js/fullcalendar.min.js'></script> -->
            <script src='../personnel/js/fullcalendarxx.min.js'></script>
    <script src='../personnel/js/sweetalert.min.js'></script>


                <script src='../personnel/packages/list/main.js'> </script>


    <script>



        $(document).ready(function() {


            $('#calendar').fullCalendar({
            plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
            header: {
                left: 'prev,next',
                center: 'title',
                //right: 'month,agendaWeek,agendaDay,listDay,listWeek,listMonth',
                right: 'today,month,listWeek,listMonth',
            },
            views: {
                listDay: { buttonText: 'List day' },
                listWeek: { buttonText: 'Liste semaine' },
                listMonth: { buttonText: 'Liste mois' },
                month: { buttonText: 'Mois' },
                today: { buttonText: 'Today' },
                agendaWeek: { buttonText: 'Week' },
            },
            editable: true,
        eventLimit: true, // allow "more" link when too many events
        selectable: true,
        selectHelper: true,
        timeFormat:"h:mma",
        defaultView:'month',
        scrollTime: '08:00', // undo default 6am scrollTime
        eventOverlap:false,
        allDaySlot: false,



                select: function(start, end) {

                    //$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd').modal('show');
                },
                eventRender: function(event, element) {
                    element.bind('dblclick', function() { //gawin mong CLICK yung parameter para maging single
                        $('#ModalEdit #id').val(event.id);
                        $('#ModalEdit #title').val(event.title);
                        $('#ModalEdit #color').val(event.color);
                        //$('#ModalEdit #start').val(event.start);
                        $('#ModalEdit #start').val(moment(event.start).format('YYYY-MM-DD HH:mm:ss'));
                        $('#ModalEdit #end').val(moment(event.end).format('YYYY-MM-DD HH:mm:ss'));
                    //	$('#ModalEdit #end').val(event.end);
                        $('#ModalEdit').modal('show');
                          //var formattedTime = $.fullCalendar.formatDates(event.start, event.end, "HH:mm { - HH:mm}");

                        });

                },

                eventDrop: function(event, delta, revertFunc) { // si changement de position

                    edit(event);

                },
                eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

                    edit(event);

                },

                eventMouseover: function(Event, jsEvent) {
                    /*var tooltip = '<div class="tooltip" >' +'<b>ACTIVITY :</b>&nbsp;'+ Event.title + '<br><b>TIME :</b>&nbsp;'+(moment(Event.start).format('HH:mma'))+'</div>';*/

                    var tooltip = '<div class="tooltip" >' +'<b>WHAT :</b>&nbsp;'+ Event.title + '<br><b>DURATION :</b>&nbsp;'+(moment(Event.start).format('HH:mma'))+'&nbsp;-&nbsp;'+(moment(Event.end).format('HH:mma'))+'</div>';

                    var $tooltip = $(tooltip).appendTo('body');

                    $(this).mouseover(function(e) {
                        $(this).css('z-index', 10000);
                        $tooltip.fadeIn('500');
                        $tooltip.fadeTo('10', 1.9);
                    }).mousemove(function(e) {
                        $tooltip.css('top', e.pageY + 10);
                        $tooltip.css('left', e.pageX + 20);
                    });
                },

                eventMouseout: function(Event, jsEvent) {
                    $(this).css('z-index', 8);
                    $('.tooltip').remove();
                },


                events: [
                <?php foreach($events as $event):


                    $start = explode(" ", $event['start']);
                    $end = explode(" ", $event['end']);
                    if($start[1] == '00:00:00'){
                        $start = $start[0];
                    }else{
                        $start = $event['start'];
                    }
                    if($end[1] == '00:00:00'){
                        $end = $end[0];
                    }else{
                        $end = $event['end'];
                    }
                    ?>
                    {
                        id: '<?php echo $event['id']; ?>',
                        title: '<?php echo $event['title']; ?>',
                        start: '<?php echo $start; ?>',
                        end: '<?php echo $end; ?>',
                        color: '<?php echo $event['color']; ?>',
                    },
                <?php endforeach; ?>
                ]
            });


            function edit(event){
                start = event.start.format('YYYY-MM-DD HH:mm:ss');
                if(event.end){
                    end = event.end.format('YYYY-MM-DD HH:mm:ss');
                }else{
                    end = start;
                }

                id =  event.id;

                Event = [];
                Event[0] = id;
                Event[1] = start;
                Event[2] = end;

                $.ajax({
                    url: 'editEventDate.php',
                    type: "POST",
                    data: {Event:Event},
                    success: function(rep) {
                        if(rep == 'OK'){
                            //alert('Saved');
                            swal("Done!","Successfully MOVED!","success");
                        }else{
                            //alert('Could not be saved. try again.');
                            swal("Cancelled", "Could not be saved. Please try again", "error");
                        }
                    }
                });
            }


            /*function add(event){

              title = event.title;
              start = event.start;
              end = event.end;
              color = event.color;
               /* if(event.end){
                    end = event.end.format('YYYY-MM-DD HH:mm:ss');
                }else{
                    end = start;
                }

                id =  event.id;

                Event = [];
                Event[0] = id;
                Event[1] = title;
                Event[2] = start;
                Event[3] = end;
                Event[4] = color;

                $.ajax({
                    url: 'addEvent.php',
                    type: "POST",
                    data: {Event:Event},
                    success: function(repp) {
                        if(repp == 'OK'){
                            //alert('Saved');
                            swal("Done!","Successfully saved!","success");
                        }else{
                            //alert('Could not be saved. try again.');
                            swal("Cancelled", "Could not be saved. Please try again", "error");
                        }
                    }
                });
            }*/


        });

    </script>

    </body>

    </html>
