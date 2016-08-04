        <li class="footer">
            <div class="main">
              <span class="title"><?= $footer_title ?></span>
              <span> - <?= $footer_msg ?></span></div>
        </li>
         
        <li class="footer-content">
            <div class="main">
                <h2>John 3:16</h2>
                <p>For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life.</p>   
                <?php var_dump($this->session->userdata()); ?>       
            </div>
        </li>
    </ul>
      
</body>
</html>

<!-- End Contact Section -->


<?php  if(($this->router->fetch_class()) != 'resource'){  ?>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<?php   } ?>


<?php 
//var_dump($this->router->fetch_class());
if(($this->router->fetch_class()) == 'dashboard'){
 ?>
        <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js'></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script>
        <script src='<?php echo base_url();?>assets/js/bootstrap-colorpicker.min.js'></script>
        <script src='<?php echo base_url();?>assets/js/fullcalendar-main.js'></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/plugins/jcalendar/lang/pt-br.js' ?>"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.4/jquery.timepicker.min.js"></script> <!-- TimePicker -->
        <script type="text/javascript">
            $('.timepicker').timepicker({
                timeFormat: 'H:mm',
                interval: 60,
                minTime: '10',
                maxTime: '6:00pm',
                defaultTime: '11',
                startTime: '10:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        </script>
<?php 
  }
?>







<!-- JS Global Compulsory -->

<script type="text/javascript" src="<?php echo base_url().'assets/plugins/jquery/jquery-migrate.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.min.js' ?>"></script> 
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/back-to-top.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/smoothScroll.js' ?>"></script>

<script type="text/javascript">//SUBMIT CADASTRA CLIENTE
  $("#btn_submit").click(function(){
   // alert('Ricacom');
    $("#msg_process").show();

  });
</script>

<script type="text/javascript">
  $(".bt_pessoa").click(function(){
      $(".msg_pessoa").hide('slow');
  });
</script>
  
<script language="javascript">// UNIVERSAL MODAL 
  var options = {"backdrop" : "static"}
  $('#basicModal').modal(options);
</script>

<script language="javascript">// TOOLTIP
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

<?php $url = base_url() .'cadastro_completo/vercidades/'; ?>
<script type="text/javascript">
var url = '<?php echo $url; ?>';
//var estadoVal = 0;

</script>


<script type="text/javascript" src="<?php echo base_url().'assets/js/plugins/jquery-scrolltofixed.js' ?>"></script>
<script>
    $(document).ready(function() {
        // Dock the header to the top of the window when scrolled past the banner.
        // This is the default behavior.
        $('.header').scrollToFixed();
        // Dock the footer to the bottom of the page, but scroll up to reveal more
        // content if the page is scrolled far enough.
        $('.footer').scrollToFixed( {
            bottom: 0,
            limit: $('.footer').offset().top
        });
        // Dock each summary as it arrives just below the docked header, pushing the
        // previous summary up the page.
        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];
            summary.scrollToFixed({
                marginTop: $('.header').outerHeight(true) + 10,
                limit: function() {
                    var limit = 0;
                    if (next) {
                        limit = $(next).offset().top - $(this).outerHeight(true) - 10;
                    } else {
                        limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
                    }
                    return limit;
                },
                zIndex: 999
            });
        });
    });
</script>














</body>

</html>
