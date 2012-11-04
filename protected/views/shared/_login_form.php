<div aria-hidden="true" aria-labelledby="loginModalLabel" role="dialog" tabindex="-1" class="modal hide grey" id="login-modal" style="display: none;"><!--End Login Modals-->
    <div class="modal-header">
      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      <h3 id="loginModalLabel">Login</h3>
    </div>
    <div class="modal-body">  
        <div class="container-facebook">
            <a href="#" class="btn-facebook">Login with Facebook</a>                
        </div>        
    </div>
	<div id = "login-form-container">
        <?php $login_form = new LoginForm;?>
        <?= $this->renderPartial('../site/_login', array('model'=>$login_form));?>
	</div>      
</div> <!--End Login Modals-->

<script type="text/javascript">
$(document).ready(function(){
    $('#login-btn').click(function(event){
        event.preventDefault();
        var url = '/site/loginAjax';
        $.post( url, $('#login-form').serialize(),
            function(data) {
                console.log(data);
                $('#login-form-container').html(data);
            });
    });
});
</script>
