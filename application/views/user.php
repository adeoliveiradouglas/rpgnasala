<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    use Restserver\Libraries\RestMethods;
    
    require_once APPPATH . 'resources/Constants.php';
    require_once APPPATH . 'resources/PageConstants.php';
    require_once APPPATH . 'resources/NavigationConstants.php';
    require_once APPPATH . 'resources/RestApiUrlConstants.php';
    require_once APPPATH . 'libraries/RestMethods.php';
?>

<html>
<head>
    <?php require_once 'components/header.php';?>
</head>
<body ng-app="ngUserRpgNaSalaApp">
		
	<?php require_once 'components/menu.php';?>
	<div class="container" style="margin-top: 50px; background: #FFF;">
		<hr/>
		<div id="alert-message" role="alert" style="margin-top: 1rem;">
			<strong><span id="errorValue" /> </strong> <span id="detailMessage" />
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
        
		<div id="top" class="row">
			<div class="col-md-3" style="margin-top: 50px;">
				<h2>Usuários</h2>
			</div>

			<div class="col-md-6"style="margin-top: 50px;">
				<div class="input-group h2"></div>
			</div>

			<div class="col-md-3" style="margin-top: 50px;">
				<button type="button" class="btn btn-primary pull-right h2"
					data-toggle="modal" data-target="#new-user-modal">Novo usuário</button>
			</div>

		</div>
		<!-- /#top -->

		<hr />
		<div id="list" class="row">
			<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th>e-mail</th>
							<!-- <th>Cadastro</th>  -->
							<th class="actions">Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($users as $user){
						    $identifier = $user->id;
						    ?>
    						<tr>
    							<td><?php echo $user->id;?></td>
    							<td><?php echo $user->nome;?></td>
    							<td><?php echo $user->email;?></td>    							
    							<td class="actions">
    							    <!-- Edicao -->
    								<a class="btn btn-warning btn-xs" href="#" data-toggle="modal" data-target="#edit-modal<?php echo $identifier;?>">Editar</a>
    								<div ng-controller="updateUserController" class="modal fade modal-update" id="edit-modal<?php echo $identifier;?>" tabindex="-1"
                            			role="dialog" aria-labelledby="edit-modal<?php echo $identifier;?>"
                            			aria-hidden="true">
                                			<div class="modal-dialog modal-dialog-centered" role="document">
                                				<div class="modal-content">
                                					<div class="modal-header">
                                						<h5 class="modal-title">Editar usuário</h5>
                                						<button type="button" class="close" data-dismiss="modal"
                                							aria-label="Close">
                                							<span aria-hidden="true">&times;</span>
                                						</button>
                                					</div>
                                					<div class="modal-body">
                                						<!-- Nome completo -->
                                						<input id="name<?php echo $identifier;?>" type="text" name="nome" required="required"
                                							class="form-control mb-4" placeholder="Nome completo" value="<?php echo $user->nome;?>">
                                						<!-- E-mail -->
                                						<input id="email<?php echo $identifier;?>" type="email" name="email" required="required"
                                							class="form-control mb-4" placeholder="E-mail" value="<?php echo $user->email;?>">
                                						
                                						<div id="edit-alert-message<?php echo $identifier;?>" class="alert alert-danger alert-dismissible fade show alert-update" role="alert">
                                                          <strong>Erro </strong> <span id="editDetailMessage<?php echo $identifier;?>"/>
                                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                					</div>
                                					<div class="modal-footer">
                                						<button type="button" class="btn btn-secondary"
                                							data-dismiss="modal"><?php echo Constants::CANCEL;?></button>
                                						<button ng-click="updateUser(<?php echo $identifier;?>)" type="button" class="btn btn-primary"><?php echo Constants::SAVE;?></button>
                                					</div>
                                				</div>
                                			</div>
                    				</div>
    								
    								<!-- Exclusao -->
    								<a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#delete-modal<?php echo $identifier;?>">Excluir</a>
    								<div ng-controller="deleteUserController" class="modal fade modal-delete" id="delete-modal<?php echo $identifier;?>" 
    										tabindex="-1" role="dialog" aria-labelledby="delete-modal<?php echo $identifier;?>" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title">Exclusão</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            Deseja excluir o usuário <?php echo $user->nome;?> (<?php echo $user->email;?>)?
                                          </div>
                                          <div id="delete-alert-message<?php echo $identifier;?>" class="alert alert-danger alert-dismissible fade show alert-delete" role="alert">
                                              <strong>Erro </strong> <span id="deleteDetailMessage<?php echo $identifier;?>"/>
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo Constants::CANCEL;?></button>
                                            <button ng-click="deleteUser(<?php echo $identifier;?>)" type="button" class="btn btn-primary"><?php echo Constants::DELETE;?></button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
    							</td>
    						</tr>
						<?php }?>
					</tbody>
				</table>

			</div>

		</div>
		<!-- /#list -->

		<div id="bottom" class="row"></div>
		<!-- /#bottom -->

		<!-- Modal -->
		<div ng-controller="newUserController" class="modal fade" id="new-user-modal" tabindex="-1"
			role="dialog" aria-labelledby="new-user-modal"
			aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="new-user-modal-title">Novo usuário</h5>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Nome completo -->
						<input type="text" name="nome" required="required" ng-model="nome"
							class="form-control mb-4" placeholder="Nome completo">
						<!-- E-mail -->
						<input type="email" name="email" required="required" ng-model="email"
							class="form-control mb-4" placeholder="E-mail">
							
						<div id="new-alert-message<?php echo $identifier;?>" class="alert alert-danger alert-dismissible fade show alert-new" role="alert">
                          <strong>Erro </strong> <span id="newDetailMessage<?php echo $identifier;?>"/>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary"
							data-dismiss="modal"><?php echo Constants::CANCEL;?></button>
						<button ng-click="createUser()" type="button" class="btn btn-primary"><?php echo Constants::SAVE;?></button>
					</div>
				</div>
			</div>
		</div>

	</div>
<script type="text/javascript">

$(".alert").hide();

clearAlertOnModalShow('.modal-update', ".alert-update");

clearAlertOnModalShow('.modal-delete', ".alert-delete");

clearAlertOnModalShow('.modal-delete', ".alert-delete");
	  
var userComponent = angular.module('ngUserRpgNaSalaApp', []);
var uri = "<?php echo site_url(RestApiUrlConstants::USER); ?>";

userComponent.controller('newUserController', function($scope, $http) {
	$scope.createUser = function() {
        var data = {email: $scope.email, name: $scope.name }
		$http.post(uri, data).then(function(response) {
			modalHide('#new-user-modal');
			showSuccess(response.data);
		}, function(response) {
			showError("#new-alert-message", "#newDetailMessage", response.data);
		});
	};
}).controller('deleteUserController', function($scope, $http){	
	$scope.deleteUser = function(id) {
		var url = uri + "/" + id;
    	$http.delete(url).then(
	       function(response){
	    	   modalHide('#delete-modal'+id);
	    	   showSuccess(response.data);
	       }, 
	       function(response){
	    	   showError("#delete-alert-message"+id, "#deleteDetailMessage"+id, response.data);
	       }
	    );
    };
}).controller('updateUserController', function($scope, $http) {
    $scope.updateUser = function(id) {
    	var url = uri + "/" + id;
        var data = {email: $('#email'+id).val(), name: $('#name'+id).val() }
    	$http.post(url, data)
    	.then(function(response) {
    		modalHide('#edit-modal'+id);
    		showSuccess(response.data);
    	}, function(response) {
    		console.log(response.data);
    		showError("#edit-alert-message"+id, "#editDetailMessage"+id, response.data);
    	});
    };
});

function showSuccess(detailMessage){
	$("#errorValue").html('Sucesso');
	$("#detailMessage").html(detailMessage);
	$("#alert-message").removeClass().addClass("alert alert-success alert-dismissible fade show").show();
}

function showError(idAlert, idDetailMessage, detailMessage){	
	$(idDetailMessage).html(detailMessage);
	$(idAlert).show();
}

function clearAlertOnModalShow(modalId, alertId){
	$(modalId).on('show.bs.modal', function (e) {
		$(alertId).hide();
		$("#alert-message").hide();
		  })
}

function modalHide(modalId){
	$(modalId).modal('hide')
}

</script>
</body>
</html>