<?php //require('Traitements/DBconnect.php'); ?> 


<div class="modal-header">
  			  
 <!-- -->
</div>
	  <div class="modal-body">					
			<form class="form-horizontal" id="regForm" role="form" method="post" action=""> 
				<div class="form-group">
					<label  class="col-sm-2 control-label" for="mail">Email</label>					  
					<div class="col-sm-10">
						<input type="email" class="form-control" id="mail" placeholder="Email" name="mail" autofocus/>						
					</div>
				</div>
				 <div class="form-group">
					<label class="col-sm-2 control-label"
						  for="password" >Password</label>
				<div class="col-sm-10">
						<input type="password" class="form-control" id="passwordReg" placeholder="Password" name="password"/>
							
				</div>					
				</div>
			    <div class="form-group">
					<div class="col-sm-2">
						<label class="radio-inline"><input type="radio" name="gender" value="h">Homme</label>
						<label class="radio-inline"><input type="radio" name="gender" value="f">Femme</label>
					</div>                           
				</div>
			<div class="modal-footer">
				<div class="form-group">                 
							 
						<button type="submit" name="register" class="btn btn-warning"> Register <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>                          					
						<button type="button" name="closeBtn" class="btn btn-danger" data-dismiss="modal">Close <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></button>
						
			
				</div>
				</form>
				<div id = "failReg" class = "alert alert-warning collapse">
					<a href = "#" class = "close" data-dismiss = "alert">&times;</a>
					<center><strong>Warning!</strong> Ce compte existe déjà!</center>
				</div>
				<div id = "sexNull" class = "alert alert-warning collapse">
					<a href = "#" class = "close" data-dismiss = "alert">&times;</a>
					<center><strong>Warning!</strong>Vous avez oubliez votre gendre </center>
				</div>
				<div id = "empty" class = "alert alert-warning collapse">
					<a href = "#" class = "close" data-dismiss = "alert">&times;</a>
					<center><strong>Warning!</strong> Veuillez remplir tous les champs!</center>
				</div>
				
			</div>
		  </div> 
	 
		 
		 <script>
		$('.modal').on('shown.bs.modal', function() {
		
		$(this).find('[autofocus]').focus();
		});
		$("#regForm").submit(function(event){
			console.log("submit");
			event.preventDefault();
			submitFormReg();
		});
		
		function submitFormReg(){
			console.log("submitFormReg");
			var mail = $("#mail").val();
			var password = $("#passwordReg").val();
			var gender = $("input:radio[name=gender]:checked").val();
			var register = $("register").val();
			
			
 
			$.ajax({
				type: "POST",
				url: "Traitements/traitementReg.php",
				data: "mail=" + mail + "&password=" + password + "&gender=" + gender + "&register=jj",
				success: function(text){
					console.log(text);
					if (text == "success"){
						formSuccess();
						
												
							
						
						
						
						
					}
					if(text=="fail")
					{
						
						formFail();
					}
					if(text=="sexe")
					{
						
						formSexe();
					}
					if(text=="empty")
					{
						formEmpty();
					}
				},
				error: function(text)
				{
					if(text=="pas register")
					{
						console.log('formfail');
						
					}
					
				}
			});
}
function formEmpty(){
	$("#empty").show();
}
	
function formSuccess(){
	$('#register').modal('hide');
	
	
	
	
}
function formFail(){
	console.log("formFail");
	$("#failReg").show();
	
    
	
}
function formSexe(){
	console.log("sexNull");
	$("#sexNull").show();
	
    
	
}


		</script>
			
		  
