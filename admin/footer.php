

                </div>
            </div>



<script src="assets/backend/js/app.min.js"></script>
<!-- third party js -->
<script src="assets/backend/js/vendor/Chart.bundle.min.js"></script>
<script src="assets/backend/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/backend/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/backend/js/vendor/jquery.dataTables.min.js"></script>
<script src="assets/backend/js/vendor/dataTables.bootstrap4.js"></script>
<script src="assets/backend/js/vendor/dataTables.responsive.min.js"></script>
<script src="assets/backend/js/vendor/responsive.bootstrap4.min.js"></script>
<script src="assets/backend/js/vendor/dataTables.buttons.min.js"></script>
<script src="assets/backend/js/vendor/buttons.bootstrap4.min.js"></script>
<script src="assets/backend/js/vendor/buttons.html5.min.js"></script>
<script src="assets/backend/js/vendor/buttons.flash.min.js"></script>
<script src="assets/backend/js/vendor/buttons.print.min.js"></script>
<script src="assets/backend/js/vendor/dataTables.keyTable.min.js"></script>
<script src="assets/backend/js/vendor/dataTables.select.min.js"></script>
<script src="assets/backend/js/vendor/summernote-bs4.min.js"></script>
<script src="assets/backend/js/vendor/fullcalendar.min.js"></script>
<script src="assets/backend/js/pages/demo.summernote.js"></script>
<script src="assets/backend/js/vendor/dropzone.js"></script>
<script src="assets/backend/js/pages/demo.dashboard.js"></script>
<script src="assets/backend/js/pages/datatable-initializer.js"></script>
<script src="assets/backend/js/font-awesome-icon-picker/fontawesome-iconpicker.min.js" charset="utf-8"></script>
<script src="assets/backend/js/vendor/bootstrap-tagsinput.min.js" charset="utf-8"></script>
<script src="assets/backend/js/bootstrap-tagsinput.min.js"></script>
<script src="assets/backend/js/vendor/dropzone.min.js" charset="utf-8"></script>
<script src="assets/backend/js/ui/component.fileupload.js" charset="utf-8"></script>
<script src="assets/backend/js/pages/demo.form-wizard.js"></script>
<!-- dragula js-->
<script src="assets/backend/js/vendor/dragula.min.js"></script>
<!-- component js -->
<script src="assets/backend/js/ui/component.dragula.js"></script>

<script src="assets/backend/js/custom.js"></script>

<!-- Dashboard chart's data is coming from this file -->
<script>
$(document).ready(function () {

   $('#gen-loading').remove();
   $(".form_submit").submit(function(e) {

   e.preventDefault(); // avoid to execute the actual submit of the form.

   var form = $(this);
   var url = form.attr('name') + ".php";
 //  alert(url);
   $.ajax({
         type: "POST",
         url: url,
         data: new FormData(this),
         contentType: false,
         cache: false,
         processData:false, // serializes the form's elements.
 //       data: form.serialize(), // serializes the form's elements.
         success: function(data)
         {
            
            if(data == 'admin' && form.attr('name') == 'login_user')
            {
               window.location.href = "index";
            }
            
            else
            {
               alert(data);
            }
           //alert(data); // show response from the php script.
         }
      });
   });
});
</script>


 <script type="text/javascript">
 ! function(o) {
     "use strict";
     var t = function() {
         this.$body = o("body"), this.charts = []
     };
     t.prototype.respChart = function(r, a, n, e) {
         Chart.defaults.global.defaultFontColor = "#8391a2", Chart.defaults.scale.gridLines.color = "#8391a2";
         var i = r.get(0).getContext("2d"),
             s = o(r).parent();
         return function() {
             var t;
             switch (r.attr("width", o(s).width()), a) {
                 case "Line":
                     t = new Chart(i, {
                         type: "line",
                         data: n,
                         options: e
                     });
                     break;
                 case "Doughnut":
                     t = new Chart(i, {
                         type: "doughnut",
                         data: n,
                         options: e
                     })
             }
             return t
         }()
     }, t.prototype.initCharts = function() {
         var t = [];
         if (0 < o("#task-area-chart").length) {
             t.push(this.respChart(o("#task-area-chart"), "Line", {
                 labels: [
                                          "January",
                                        "February",
                                        "March",
                                        "April",
                                        "May",
                                        "June",
                                        "July",
                                        "August",
                                        "September",
                                        "October",
                                        "November",
                                        "December",
                                     ],
                 datasets: [{
                     label: "This year",
                     backgroundColor: "rgba(114, 124, 245, 0.3)",
                     borderColor: "#727cf5",
                     data: [
                                                 "0",
                                                "0",
                                                "0",
                                                "0",
                                                "1271",
                                                "0",
                                                "0",
                                                "0",
                                                "0",
                                                "0",
                                                "0",
                                                "0",
                                             ]
                 }]
             }, {
                 maintainAspectRatio: !1,
                 legend: {
                     display: !1
                 },
                 tooltips: {
                     intersect: !1
                 },
                 hover: {
                     intersect: !0
                 },
                 plugins: {
                     filler: {
                         propagate: !1
                     }
                 },
                 scales: {
                     xAxes: [{
                         reverse: !0,
                         gridLines: {
                             color: "rgba(0,0,0,0.05)"
                         }
                     }],
                     yAxes: [{
                         ticks: {
                             stepSize: 10,
                             display: !1
                         },
                         min: 10,
                         max: 100,
                         display: !0,
                         borderDash: [5, 5],
                         gridLines: {
                             color: "rgba(0,0,0,0)",
                             fontColor: "#fff"
                         }
                     }]
                 }
             }))
         }
         if (0 < o("#project-status-chart").length) {
             t.push(this.respChart(o("#project-status-chart"), "Doughnut", {
                 labels: ["Active Video", "Inactive Video", "Pending Video"],
                 datasets: [{
                     data: [<?=$max?>, <?=$min?>, <?=$none?>],
                     backgroundColor: ["#0acf97", "#FFC107", "#6c757d"],
                     borderColor: "transparent",
                     borderWidth: "2"
                 }]
             }, {
                 maintainAspectRatio: !1,
                 cutoutPercentage: 80,
                 legend: {
                     display: !1
                 }
             }))
         }
         return t
     }, t.prototype.init = function() {
         var r = this;
         Chart.defaults.global.defaultFontFamily = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif', r.charts = this.initCharts(), o(window).on("resize", function(t) {
             o.each(r.charts, function(t, r) {
                 try {
                     r.destroy()
                 } catch (t) {}
             }), r.charts = r.initCharts()
         })
     }, o.ChartJs = new t, o.ChartJs.Constructor = t
 }(window.jQuery),
 function(t) {
     "use strict";
     window.jQuery.ChartJs.init()
 }();

 </script>

<script type="text/javascript">
  $(document).ready(function() {
    $(function() {
       $('.icon-picker').iconpicker();
     });
  });
</script>

<!-- Toastr and alert notifications scripts -->
<script type="text/javascript">
function notify(message) {
  $.NotificationApp.send("Heads up!", message ,"top-right","rgba(0,0,0,0.2)","info");
}

function success_notify(message) {
  $.NotificationApp.send("Congratulations!", message ,"top-right","rgba(0,0,0,0.2)","success");
}

function error_notify(message) {
  $.NotificationApp.send("Oh snap!", message ,"top-right","rgba(0,0,0,0.2)","error");
}

function error_required_field() {
  $.NotificationApp.send("Oh snap!", "Please fill all the required fields" ,"top-right","rgba(0,0,0,0.2)","error");
}
</script>



    <script type="text/javascript">
function showAjaxModal(url, header)
{
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#scrollable-modal .modal-body').html('<div style="text-align:center;"><img src="assets/global/bg-pattern-light.svg" /></div>');
    jQuery('#scrollable-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#scrollable-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response)
        {
            jQuery('#scrollable-modal .modal-body').html(response);
            jQuery('#scrollable-modal .modal-title').html(header);
        }
    });
}
function showLargeModal(url, header)
{
    // SHOWING AJAX PRELOADER IMAGE
    jQuery('#large-modal .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/global/bg-pattern-light.svg" height = "50px" /></div>');
    jQuery('#large-modal .modal-title').html('...');
    // LOADING THE AJAX MODAL
    jQuery('#large-modal').modal('show', {backdrop: 'true'});

    // SHOW AJAX RESPONSE ON REQUEST SUCCESS
    $.ajax({
        url: url,
        success: function(response)
        {
            jQuery('#large-modal .modal-body').html(response);
            jQuery('#large-modal .modal-title').html(header);
        }
    });
}
</script>

<!-- (Large Modal)-->
<div class="modal fade" id="large-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Scrollable modal -->
<div class="modal fade" id="scrollable-modal" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body ml-2 mr-2">

        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
function confirm_modal(delete_url)
{
    jQuery('#alert-modal').modal('show', {backdrop: 'static'});
    document.getElementById('update_link').setAttribute('href' , delete_url);
}
</script>

<!-- Info Alert Modal -->
<div id="alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Heads up!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-info my-2" data-dismiss="modal">Cancel</button>
                    <a href="#" id="update_link" class="btn btn-danger my-2">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <script type="text/javascript">
  function togglePriceFields(elem) {
    if($("#"+elem).is(':checked')){
      $('.paid-course-stuffs').slideUp();
    }else
      $('.paid-course-stuffs').slideDown();
    }
</script>


<script>
$(document).ready(function() {
/*     $('table').DataTable( {
        orderCellsTop: true;
    } );*/

    var table = $('table').DataTable( {
    destroy: true,
    orderCellsTop: true,
    searching: true,
    dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
} );




} );
</script>

    

</body></html>