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

date();
