@extends('layouts.main-layout')
@section('content')
<link rel="stylesheet" type="text/css" href="../../asset/css/main.css">
<script type="text/javascript" src="../../asset/js/main.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            // initialDate: '2021-02-12', // กำหนดวัน
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectMirror: true,
            // select: function (arg) {
            //     var title = prompt('Event Title:');
            //     if (title) {
            //         calendar.addEvent({
            //             title: title,
            //             start: arg.start,
            //             end: arg.end,
            //             allDay: arg.allDay
            //         })
            //     }
            //     calendar.unselect()
            // },
            eventClick: function (arg) {
                $('#exampleModalLong').modal('show')
                // console.log(arg.event);
                $('#exampleModalLongTitle').html(arg.event.title)
                $('#exampleModalLongbody').html(arg.event.extendedProps.detail)


                var dateStartRaw = arg.event.startStr
                var resStart = dateStartRaw.split("-");
                var dateStart = resStart[2] + "/" + resStart[1] + "/" + resStart[0]

                $('#exampleModalStart').html(dateStart)
                console.log(dateStart)

                var dateEndRaw = arg.event.endStr
                var resEnd = dateEndRaw.split("-");
                var dateEnd = resEnd[2] + "/" + resEnd[1] + "/" + resEnd[0]

                $('#exampleModalend').html(dateEnd)

            },
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: [
                @foreach($tasks as $item) {
                    title: '{{$item->assign_name}}',
                    start: '{{$item->assign_date_start}}',
                    end: '{{$item->assign_date_end}}',
                    detail: '{{$item->assign_detail}}'
                },
                @endforeach
                // {
                // title: 'Click for Google',
                // url: 'http://google.com/',
                // start: '2021-02-25',
                // end: '2021-02-28'
                // }
            ]

        });

        calendar.render();
    });

    // $('body').on('click','.fc-event-title-container',function(){
    //     // var a = $('.fc-event-title fc-sticky').text();
    //     var a = $(this).text();
    //     $('#ee').text(a);



    //     $('#exampleModalLong').modal('show')

    // })

    // document.addEventListener('DOMContentLoaded', function () {
    //     var calendarEl = document.getElementById('calendar2');

    //     var calendar2 = new FullCalendar.Calendar(calendarEl, {

    //         headerToolbar: {
    //             left: 'prev,next today',
    //             center: 'title',
    //             right: 'dayGridMonth,listYear'
    //         },

    //         displayEventTime: false, // don't show the time column in list view

    //         // THIS KEY WON'T WORK IN PRODUCTION!!!
    //         // To make your own Google API key, follow the directions here:
    //         // http://fullcalendar.io/docs/google_calendar/
    //         googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',

    //         // US Holidays
    //         events: 'th.th#holiday@group.v.calendar.google.com',

    //         eventClick: function (arg) {
    //             // opens events in a popup window
    //             window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');

    //             arg.jsEvent.preventDefault() // don't navigate in main tab
    //         },

    //         loading: function (bool) {
    //             document.getElementById('loading').style.display =
    //                 bool ? 'block' : 'none';
    //         }

    //     });

    //     calendar2.render();
    // });

</script>

<div class="container">
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-sticky-note-o bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>ตารางการทำงาน</h5>
                        <span>System Work Schedule Information</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>ข้อมูลตารางการทำงาน / Work Schedule Information</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i
                                                    class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i>
                                            </li>
                                            <li><i class="feather icon-refresh-cw reload-card"></i>
                                            </li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i class="feather icon-chevron-left open-card-option"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="dt-responsive table-responsive">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <div class="page-aside">
                                                <section class="page-aside-section">
                                                    <h5 class="page-aside-title">เหตุการณ์</h5>
                                                </section>
                                                <div class="list-group">
                                                    <a class="list-group-item" data-color="red-600">
                                                        <li class="wb-medium-point red-600 mr-10" aria-hidden="true">
                                                            <span style="color:#526069">มอบหมายงาน</span></li>
                                                    </a>
                                                    <a class="list-group-item" data-color="green-600">
                                                        <li class="wb-medium-point green-600 mr-10" aria-hidden="true">
                                                            <span style="color:#526069">วันลา</span></li>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="page-main">
                                                {{-- <div id='loading'>loading...</div> --}}
                                                <div id='calendar'></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="exampleModalLongbody" class="modal-body">

                </div>
                <div class="modal-body">
                    วันเริ่ม
                    <span id="exampleModalStart"></span>
                </div>
                <div class="modal-body">
                    วันสิ้นสุด
                    <span id="exampleModalend"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
