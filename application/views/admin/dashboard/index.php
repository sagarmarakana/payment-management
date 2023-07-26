<script>
document.addEventListener('DOMContentLoaded', function() {
   var calendarEl = document.getElementById('calendar');
   var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
         left: 'prev,next today',
         center: 'title',
         right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      // eventContent: function(arg, createElement) {
      //   console.log(arg.event.title);
      //     return createElement('i', {}, arg.event.title)
      //   },
      eventRender: function(info) {
      var tooltip = new Tooltip(info.el, {
         title: info.event.extendedProps.title,
         placement: 'top',
         trigger: 'hover',
         container: 'body'
      });
      console.log(tooltip);
      },
      dayMaxEvents: true,
      eventSources: [
         'dashboard/get_events',
      ],
   });
   calendar.render();
});
</script>
<div class="app-content icon-content">
    <div class="p-5"></div>
    <div class="section">
        <!-- Row opened -->
         <div class="row">
            <div class="card">
                <div class="box-header">
                    <h3 class="card-title">Today's Counts</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Products -->
                        <div class="col-sm-2 mt-4">
                           <div class="card box-shadow-0 overflow-hidden mb-0 quick-links bg-products">
                            <a href="<?= base_url('admin/users'); ?>">
                                <div class="card-body p-4">
                                   <div class="text-center">
                                      <img src="<?=base_url('assets/images/menu/customers.svg')?>" alt="image">
                                      <h3 class="mt-3 mb-0 ">5</h3>
                                      <small class="text-muted">Users</small>
                                   </div>
                                </div>
                            </a>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Row closed -->
    </div>
</div>