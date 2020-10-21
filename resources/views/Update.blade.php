<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<title>To Do List</title>
</head>
<body>


	<div class="container">
		<div class="row d-flex justify-content-center mt-5">
			
			@php
				$task->tasks;
				$task->id;
			@endphp		
			
			<div class="col-md-6 shadow p-3 mb-5 bg-white rounded">
				<!-- For showing success msg -->
				@if(session()->has('success'))
					<div class="text-center alert alert-success">{{session('success')}}</div>
				@endif
				<form action="/updateTask/{{$task->id}}" method="post">
					@csrf
				  <div class="form-group">

					<label for="Task Input"><strong>Update Task</strong></label>
					<input type="hidden" name="id" value="{{$task->id}}">
				    <input type="text" name="tasks" class="form-control" id="tasks" value="{{$task->tasks}}">
				    <small id="textError" class="form-text text-danger">
						@error('tasks')
							{{$message}}
						@enderror	
					</small>
				  </div>
				  <button type="submit" class="btn btn-success btn-sm">Update</button>
				</form>
			</div>
			
		</div>
	</div>


	


	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>