'use strict';

let doc = document
let win = window

const date = () => {

	let prev = doc.querySelector('#prev-month');
	let next = doc.querySelector('#next-month');

	let month = doc.querySelector('#month');
	let year = doc.querySelector('#year');

	let closure_ = (ev) => {
		if(parseInt(month.value) === 1){
			month.value = 12
			year.value = parseInt(year.value) - 1
		}
		else {
			month.value = parseInt(month.value) - 1;
		}
	}

	prev.addEventListener('click', closure_, false);

	closure_ = (ev) => {
		if(parseInt(month.value) === 12){
			month.value = 1
			year.value = parseInt(year.value) + 1
		}
		else {
			month.value = parseInt(month.value) + 1;
		}
	}

	next.addEventListener('click', closure_, false);
}


const event = () => {

	let ul = doc.querySelectorAll('.calendar--center > form div > ul');

	
	let closure_ = (ev) => {

		let day = ev.target.innerText
		let wday = ev.target.parentElement.dataset.day
		let month = doc.querySelector('.calendar--center > form > span label').dataset.month
		let year = doc.querySelector('#year').value
		let month_num = doc.querySelector('#month').value

		let html = `<h4>${wday}</h4><p>${month} ${day}</p>`

		doc.querySelector('#event-day').value = day
		doc.querySelector('#event-month').value = month_num
		doc.querySelector('#event-year').value = year


		//get events
		let events = ''
		for(let x = 0; true; x++) {
			if(ev.target.dataset['event'+x] === undefined){
				break;
			}
			let event = ev.target.dataset['event'+x]
			events += `<li>${event}
							<a href="/event/remove/${day}-${month_num}-${year}">
								<img src="../assets/imgs/close.svg"/>
							</a>
						</li>`
		}

		doc.querySelector('#events')
			.innerHTML = events.length ? events : '<li>No events for this day</li>'

		doc.querySelector('.event > span:first-of-type')
			.innerHTML = html;

		doc.querySelectorAll('form div li')
			.forEach( el => el.classList.remove('is--active') )

		ev.target.classList.add('is--active')
	}


	ul.forEach( el => {
		let days = el.querySelectorAll('li');

		for(let x = 1; x < days.length; x++) {
			days[x].addEventListener('click', closure_, false);
		}
	})

	try{
		doc.querySelector('li.is--active')
			.click();
	}catch(e) {
		var col = doc.querySelectorAll('.calendar--center form ul li.no--active').length
		doc.querySelectorAll('.calendar--center form ul')[col].querySelector('li+li')
			.click();
	}
}

const open = () => {
	let button = doc.querySelector('.event > button')
	let overlay = doc.querySelector('.calendar--event')

	let closure_ = () => {
		overlay.classList.add('is--active')
	}

	button.addEventListener('click', closure_, false)
}

const close = () => {
	let button = doc.querySelector('#close')
	let overlay = doc.querySelector('.calendar--event')

	let closure_ = () => {
		overlay.classList.remove('is--active')
	}

	button.addEventListener('click', closure_, false)

	closure_ = (ev) => {
		if(ev.target.classList.contains('calendar--event')) {
			overlay.classList.remove('is--active')
		}
	}

	overlay.addEventListener('click', closure_, false)
}







date();
event();
open();
close();
