<x-layout>
<div class="container-fulid pt-0 mt-0">
		<div class="main-body">
					<div class="card">
						<div class="card-body">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$user->name}}" disabled>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$user->email}}" disabled>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Gender</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$user->gender}}" disabled>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Age</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" value="{{$user->age}}" disabled>
								</div>
							</div>


						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</x-layout>

