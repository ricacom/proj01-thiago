        <li class="footer">
            <div class="main">
              <span class="title"><?= $footer_title ?></span>
              <span> - <?= $footer_msg ?></span></div>
        </li>
         
        <li class="footer-content">
            <div class="main">
                <h2>John 3:16</h2>
                <p>For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life.</p>           
            </div>
        </li>
    </ul>
      
</body>
</html>

<!-- End Contact Section -->

<!-- JS Global Compulsory -->

<script type="text/javascript" src="<?php echo base_url().'assets/plugins/jquery/jquery-migrate.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.min.js' ?>"></script> 
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/back-to-top.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/smoothScroll.js' ?>"></script>



<!-- <script type="text/javascript" src="<?php echo base_url().'assets/plugins/jcalendar/config/config-calendar.js' ?>"></script>
 -->

<script type="text/javascript">//SUBMIT CADASTRA CLIENTE
      $("#btn_submit").click(function(){
       // alert('Ricacom');
        $("#msg_process").show();

      });
    </script>
  
    <script type="text/javascript" src="<?php echo base_url() . 'assets/js/plugins/jquery.mask.min.js' ?>"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      $('.date').mask('11/11/1111');
      //$('.time').mask('00:00:00');
      //$('.date_time').mask('99/99/9999 00:00:00');
      $('.cep').mask('99999-999');
      $('.cpf').mask('999.999.999-99');
      $('.cnpj').mask('99.999.999/9999-99');
      $('.phone').mask('(99) 9999-9999');
      $('.phone_ddd').mask('(99) 9999-9999');
      $('.phone_m').mask('(99) 9 9999-9999');
     // $('.phone_us').mask('(999) 999-9999');
     // $('.mixed').mask('AAA 000-S0S');
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


<script type="text/javascript">
jQuery(function($){
        $.datepicker.regional['pt-BR'] = {
                closeText: 'Fechar',
                prevText: '&#x3c;Anterior',
                nextText: 'Pr&oacute;ximo&#x3e;',
                currentText: 'Hoje',
                monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
                'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
                'Jul','Ago','Set','Out','Nov','Dez'],
                dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                weekHeader: 'Sm',
                dateFormat: 'dd/mm/yy',
                firstDay: 0,
                isRTL: false,
                showMonthAfterYear: false,
                yearSuffix: ''};
        $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
});


$(function() {
  $( ".data_br" ).datepicker();
});

</script>
<?php $url = base_url() .'cadastro_completo/vercidades/'; ?>
<script type="text/javascript">
var url = '<?php echo $url; ?>';
//var estadoVal = 0;

$(function(){
  $('.cod_estados').change(function(){
    var estadoVal = $(".cod_estados" ).val();
    if( $(this).val() ) {
      $('.cod_cidades').hide();
      $('.carregando').show();
      $.getJSON(url+estadoVal, function(j){
        //console.log(estadoVal);
        var options = '<option value=""> Selecione a cidade </option>'; 
        for (var i = 0; i < j.length; i++) {
          options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';
        } 
        $('.cod_cidades').html(options).show();
        $('.carregando').hide();
      });
    } else {
      $('.cod_cidades').html('<option value="">-- Escolha um estado --</option>');
    }
  });
});

$(function(){
  $('.cod_estados_pj').change(function(){
    var estadoVal = $(".cod_estados_pj" ).val();
    if( $(this).val() ) {
      $('.cod_cidades_pj').hide();
      $('.carregando').show();
      $.getJSON(url+estadoVal, function(j){
       // console.log(estadoVal);
        var options = '<option value=""> Selecione a cidade </option>'; 
        for (var i = 0; i < j.length; i++) {
          options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';
        } 
        $('.cod_cidades_pj').html(options).show();
        $('.carregando').hide();
      });
    } else {
      $('.cod_cidades_pj').html('<option value="">-- Escolha um estado --</option>');
    }
  });
});
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











</body>

</html>
