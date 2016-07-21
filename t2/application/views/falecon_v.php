 <style type="text/css">
     .topspace{margin-top: 100px;}
 </style>
 <div class="container topspace">
 <h2>Fale Conosco</h2>
    <div class="row">
        <div class="col-md-6">
            <?php 
                if (validation_errors() != NULL) { //Validation
            ?>
                <div class="alert alert-danger">
                    <?=validation_errors()?>
                </div>
                <?php }else{
                    if($this->session->flashdata('success_msg')) {?>
                <div class="alert alert-success">
                    <?=$this->session->flashdata('success_msg')?>
                </div>
            <?php } 
                } ///close else
            ?>
            <form class="form-horizontal" method="POST" action="<?=base_url('fale-conosco')?>">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input id="nome" name="nome" placeholder="Nome" class="form-control input-md" required="" type="text" value="<?=set_value('nome')?>"> 
                </div>
  

                
                <div class="form-group">
                    <label for="email">Email</label>
                    <div>
                        <input id="email" name="email" placeholder="Email" class="form-control input-md" 
                            required="" type="text" value="<?=set_value('email')?>">
                        <span class="help-block">Ex.: email@example.com</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="assunto">Assunto</label>
                    <div>
                        <input id="assunto" name="assunto" placeholder="Assunto" class="form-control input-md" 
                        required="" type="text" value="<?=set_value('assunto')?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="mensagem">Mensagem</label>
                    <div>
                        <textarea class="form-control" id="mensagem" name="mensagem" rows="10"><?=set_value('mensagem')?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10 pull-right text-right">
                        <input type="submit" value="Enviar" class="btn btn-success"/>
                    </div>
                </div>
        </form>

        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <h5>Telefones</h5>
            <p>+55 99 9999-9999 | +55 88 8888-8888</p>
            <hr/>
            <h5>E-mail</h5>
            <p>contato@empresa.com.br</p>
            <hr/>
            <h5>Endereço</h5>
            <p>R. Quinze de Novembro - Praia da Costa, Vila Velha - ES </p>
            <hr/>
            <div class="embed-responsive embed-responsive-4by3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3741.1532158870327!2d-40.286650485399!3d-20.335288186378026!2m3!1f0!2f0!3f0!3m2!11024!2i768!4f13.1!3m3!1m2!1s0xb8163812c6b305%3A0xe71db7e3d9c94285!2sR.+Quinze+de+Novembro+-+Praia+da+Costa%2C+Vila+Velha+-+ES!5e0!3m2!1spt-BR!2sbr!4v1449523768427" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>















</div>


