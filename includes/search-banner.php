<div class="container search-banner" style="margin-top: 16%;">
		<form class="row" method="POST" action="search-results">
			<div class="col-md-4 form-group">
				<input type="text" class="form-control" placeholder="Hostel Name" name="hostel_name">
			</div>
			<div class="col-md-2 form-group">
				<select class="form-control" name="hostel_type" style="border:none">
					<option>Any Type</option>
					<option>1 in a room</option>
					<option>2 in a room</option>
					<option>3 in a room</option>
					<option>Self-Contained</option>
					<option>Shared Facilities</option>
				</select>
			</div>
			<div class="col-md-2 form-group">
				<input type="number" class="form-control" placeholder="Min Price" min="0" name="hostel_min_price">
			</div>
			<div class="col-md-2 form-group" style="border-right: none;">
				<input type="number" name="hostel_max_price" class="form-control" max="0" placeholder="Max Price">
			</div>
			<div class="col-md-2">
			<button type="submit" name="search_hostel_btn" class="btn btn-primary">Search <span class="fa fa-search"></span></button>
		</div>
		</form>
		</div>