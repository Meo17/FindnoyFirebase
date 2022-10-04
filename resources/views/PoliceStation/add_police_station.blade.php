@extends('layouts.master')
@section('title','Police Station')
@section('content')

<main id="main" class="main">
<section class="section">
  <div class="row">
	<div class="col-lg-12">


	   <div class="card">
		<div class="card-body">
		  <h5 class="card-title">Add Police Station</h5>

		  <!-- Floating Labels Form -->
		  <form class="row g-3" action="{{url('save_police_station')}}" method="post">
	<!-- 	  	<div class="col-md-2">
			  <div class="form-floating">
				<input type="text" class="form-control" id="floatingName" name="id_num" placeholder="ID Number" required>
				<label for="floatingName">ID Number</label>
			  </div>
			  

			</div>
			<div class="col-md-3">
			  <div class="form-floating">
				<input type="text" class="form-control" id="floatingName" name="id_fname" placeholder="First Name" required>
				<label for="floatingName">First Name</label>
				</div>
			</div> 


			<div class="col-md-2">
			  <div class="form-floating">
				<input type="text" class="form-control" id="floatingName" name="id_mname" placeholder="Middle Name">
				<label for="floatingName">Middle Name</label>
				</div>
			</div>

			<div class="col-md-3">
			  <div class="form-floating">
				<input type="text" class="form-control" id="floatingName" name="id_lname"placeholder="Last Name" required>
				<label for="floatingName">Last Name</label>
				</div>
			</div>


			<div class="col-md-2">
			  	<div class="form-floating">
				<input type="text" class="form-control" id="floatingName" name="id_suffix"placeholder="Suffix" required>
				<label for="floatingName">Suffix</label>
				</div>
			</div>


			<div class="col-md-2">
			  <div class="form-floating">
				<input type="email" class="form-control" id="floatingEmail" name="id_email" placeholder="Email Address">
				<label for="floatingEmail">Email Address </label>
			  </div>
			</div>


			<div class="col-md-2">
			  <div class="form-floating">
				<input type="date" class="form-control" id="floatingEmail" name="id_dob"placeholder="Date of Birth">
				<label for="floatingEmail">Date of Birth</label>
			  </div>
			</div>


			<div class="col-md-2">
			  <div class="form-floating">
				<select class ="form-select" id="select_rank" name="id_rank"aria-label="officer_rank">
					<option>PGEN</option>
					<option>PLTGEN</option>
					<option>PMGEN</option>
					<option>PBGEN</option>
					<option>PCOL</option>
					<option>PLTCOL</option>
					<option>PMAJ</option>
					<option>PCPT</option>
					<option>PLT</option>
					<option>PEMS</option>
					<option>PCMS</option>
					<option>PSMS</option>
					<option>PMSg</option>
					<option>PSSg</option>
					<option>PCpl</option>
					<option>Pat</option>

				</select>
				<label for="floatingrank">Officer's Rank</label>
			  </div>
			</div>


			<div class="col-md-12">
			  <div class="form-floating">
				<textarea class="form-control" placeholder="Address" id="floatingTextarea" name="id_address"style="height: 100px;" required></textarea>
				<label for="floatingTextarea">Address</label>
			  </div>
			</div>	-->
		

			<div class="col-md-2">
				<div class="form-floating">
					<input type="text" class="form-control" id="floatingCity" name="id_region" placeholder="Region" required>
					<label for="floatingCity">Region</label>
				</div>
			</div>  
			<div class="col-md-4">
				<div class="form-floating">
					<select class="form-select" id="select_prov"  name="id_province" aria-label="Province"
					>
						<option selected>-</option>
						<option value="0">Tagbilaran City</option>
						<option value="1">Bogo City</option>
						<option value="2">Carcar City</option>
						<option value="3">Cebu City</option>
						<option value="4">Danao City</option>
						<option value="5">Lapu-Lapu City</option>
						<option value="6">Mandaue City</option>
						<option value="7">Naga City</option>
						<option value="8">Talisay City</option>
						<option value="9">Bais City</option>
						<option value="10">Bayawan City</option>
						<option value="11">Canlaon City</option>
						<option value="12">Dumaguete City</option>
						<option value="13">Guihulngan City</option>
						<option value="14">Tanjay City</option>
						<option value="15">Toledo City</option>

					</select>
					<label for="floatingCity">Province</label>
				</div>
			</div>  
			<div class="col-md-4"> 
			  <div class="form-floating mb-3">
				<select class="form-select " id="select_city" name="id_city" aria-label="City" disabled>
				</select>
				<label for="floatingSelect">City</label>
			  </div>
			</div>
			<div class="col-md-2">
			  <div class="form-floating">
				<input type="text" class="form-control" id="floatingZip" placeholder="Zip" disabled>
				<label for="floatingZip">Zip</label>
			  </div>
			</div> 

			<div class="col-md-4"> 
			  <div class="form-floating mb-3">
				<select class="form-select " id="select_station_name" name="id_station_name" aria-label="Sname">
				</select>
				<label for="floatingSelect">Station Name</label>
			  </div>
			</div>


			<div class="col-md-4"> 
			  <div class="form-floating mb-3">
				<select class="form-select " id="select_station_num" name="id_station_num" aria-label="Snum" disabled>
					    <option >-</option>
						<option value="0">Station 1</option>
						<option value="1">Station 2</option>
						<option value="2">Station 3</option>
						<option value="3">Station 4</option>
						<option value="4">Station 5</option>
						<option value="5">Station 6</option>
						<option value="6">Station 7</option>
						<option value="7">Station 8</option>
						<option value="8">Station 9</option>
						<option value="9">Station 10</option>
						<option value="10">Station 11</option>
				</select>
				<label for="floatingSelect">Station Number</label>
			  </div>
			</div>

			<div class="col-md-4">
			  <div class="form-floating">
				<input type="email" class="form-control" id="floatingEmail" name="id_email" placeholder="Email Address">
				<label for="floatingEmail">Email Address </label>
			  </div>
			</div>


			<!--Buttons-->
			<div class="text-center">
			  <button type="submit" class="btn btn-primary">Submit</button>
			  <button type="reset" class="btn btn-secondary">Reset</button>
			</div>
		  </form>
		  

		  <!-- End Form -->

		</div>
	   </div>

	</div>
  </div>
</section>

</main>
<!-- End #main -->
<script src="{{asset('assets/js/add_police_station/add_police_station.js')}}"></script>
@endsection
