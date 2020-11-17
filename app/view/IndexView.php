<main>
<div class="calendar">

	<div class="calendar--center">
		<?= $this->renderCalendar();?>
	</div>


	<div class="calendar--event">

		<form action="/event/add" method="POST">
			<span id="close">
				<img src="../assets/imgs/close.svg" />
			</span>
			<label>Would you like to add an event?</label>
			<input type="text" name="event" required placeholder="go to the market"/>
			<input type="hidden" id="event-day" name="day" value="<?=$this->getDay()?>" />
			<input type="hidden" id="event-month" name="month" value="<?=$this->getMonth()?>" />
			<input type="hidden" id="event-year" name="year" value="<?=$this->getYear()?>" />
			<input type="submit" value="Add this" />
		</form>
	</div>

</div>

</main>
