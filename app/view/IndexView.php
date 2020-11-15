<main>
<div class="calendar">

	<div class="calendar--center">
		<?= $this->renderCalendar();?>
	</div>


	<div class="calendar--event">

		<form action="" method="">
			<span id="close">
				<svg id="Group" xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 34 34">
  					<path id="Path" d="M0,0H34V34H0Z" fill="none"/>
					<path id="Path-2" data-name="Path" d="M17,0,0,17" 
						transform="translate(8.5 8.5)" fill="none" 
						stroke="#807cae" stroke-linecap="round" 
						stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2.125"/>
					<path id="Path-3" data-name="Path" d="M0,0,17,17" 
						transform="translate(8.5 8.5)" fill="none" 
						stroke="#807cae" stroke-linecap="round" stroke-linejoin="round" 
						stroke-miterlimit="10" stroke-width="2.125"/>
				</svg>
			</span>
			<label>Would you like to add an event?</label>
			<input type="text" name="event" placeholder="go to the market"/>
			<input type="submit" value="Add this" />
		</form>
	</div>

</div>

</main>
