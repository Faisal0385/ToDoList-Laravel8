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
			<div class="col-md-6">
				<div class="shadow p-3 mb-5 bg-white rounded">

					<!-- For showing success msg -->
					@if(session()->has('success'))
						<div class="text-center alert alert-success">{{session('success')}}</div>
					@endif

					<form action="insertTask" method="post">
						@csrf
						<div class="form-group">
							<label for="Task Input"><strong>Add Task</strong></label>
							<input type="text" name="tasks" class="form-control" id="tasks" placeholder="Enter Task Here.">
							<small id="textError" class="form-text text-danger">
								
								@error('tasks')
								{{$message}}
								@enderror	

							</small>
						</div>
						<button type="submit" class="btn btn-danger btn-sm">Submit</button>
					</form>
				</div>

				
				<!-- For showing delete msg -->
				@if(session()->has('deleted'))
					<div class="text-center alert alert-warning">{{session('deleted')}}</div>
				@endif

				<table class="table table-striped mt-5 table-bordered">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col" width="500px">Tasks</th>
							<th scope="col">Done</th>
							<th scope="col">Edit</th>
							<th scope="col">Delete</th>
						</tr>
					</thead>
					<tbody>
						@php 
							$count = 0;
						@endphp
						@foreach($data as $item)
						@php
							$count++;
						@endphp
							<tr>
								<th scope="row">{{$count}}</th>
								<td width="500px">{{$item->tasks}}</td>
								<td><a href="/doneTask/{{$item->id}}" class="btn btn-success btn-sm">Done</a></td>
								<td><a href="/editTask/{{$item->id}}" class="btn btn-info btn-sm">Edit</a></td>
								<td><a href="/deleteTask/{{$item->id}}" class="btn btn-warning btn-sm">Delete</a></td>
							</tr>
						@endforeach
						
						@if(count($data) == 0)
						<tr>
							<th scope="row"></th>
							<td width="500px" class="text-center"><strong>No Data Found</strong></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						@endif

					</tbody>
				</table>
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