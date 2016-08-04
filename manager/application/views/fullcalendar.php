
        <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css' rel='stylesheet' />
        <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css' rel='stylesheet' media='print' />
        <link href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>assets/css/bootstrap-colorpicker.min.css" rel="stylesheet" />







        <style>
/*
            body {
                margin: 40px 10px;
                padding: 0;
                font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;


                font-size: 14px;
            }*/
            .fc th {
                padding: 10px 0px;
                vertical-align: middle;
                background:#F2F2F2;
            }
            .fc-day-grid-event>.fc-content {
                padding: 4px;
            }
            #calendar {
                max-width: 90%;
                margin: 0 auto;
            }
            .error {
                color: #ac2925;
                margin-bottom: 15px;
            }
            .event-tooltip {
                width:150px;
                background: rgba(0, 0, 0, 0.85);
                color:#FFF;
                padding:10px;
                position:absolute;
                z-index:10001;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 11px;

            }
           
            .modal-header
            {
                background-color: #3A87AD;
                color: #fff;
            }
            .spaceleft{margin-left: 37px;}
           
        </style>

         
            <div class="row clearfix">
                <div class="col-md-12 column">
                <div class='col-xs-3 col-md-3 spaceleft'>
                    <select class="form-control">
                      <option>Clínica Reviva</option>
                      <option>Dr.Roberto</option>
                      <option>Dra.Kátia</option>
                      <option>Dr.Manoel</option>
                      <option>Dra.Cristina</option>
                    </select>

                </div>
                        <div id='calendar'></div>
                </div>
            </div>
       
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Fechar</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body">
                        <div class="error"></div>
                        <form class="form-horizontal" id="crud-form">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="title">Título</label>
                                <div class="col-md-4">
                                    <input id="title" name="title" type="text" class="form-control input-md" />
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-md-4 control-label" for="time">Time</label>
                                <div class="col-md-4 input-append bootstrap-timepicker">
                                    <input id="time" name="time" type="text" class="form-control input-md" />
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="starttime">Hora Inicial</label>
                                <div class="col-md-4">
                                    <input id="starttime"  name="starttime" type="text" class="form-control input-md timepicker" />
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="endtime">Hora Final</label>
                                <div class="col-md-4">
                                    <input id="endtime"  name="endtime" type="text" class="form-control input-md timepicker" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label" for="description">Descrição</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="color">Cor</label>
                                <div class="col-md-4">
                                    <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly" />
                                    <span class="help-block">Escolha um cor</span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

