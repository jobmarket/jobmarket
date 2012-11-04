<div aria-hidden="true" aria-labelledby="registerModalLabel" role="dialog" tabindex="-1" class="modal hide grey" id="register-modal" style="display: none;"><!--End Register Modals-->
    <div class="modal-header">
      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      <h3 id="loginModalLabel">Register New Account</h3>
    </div>
    <div id="register-form-container" class="modal-body">
        <?php $user = new User;?>
        <?= $this->renderPartial('../user/_form',array('model'=>$user));?>
    </div>
</div> <!--End Register Modals-->

<script type="text/javascript">
$(document).ready(function(){
    $('#signup-btn').click(function(event){
        event.preventDefault();
        var url = '/user/createa';
        $.post( url, $('#register-form').serialize(),
            function(data) {
                console.log(data);
                $('#register-form-container').html(data);
            });
    });
});
</script>
