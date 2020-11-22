window.onload=function(){
	let subArrow = document.querySelector('#subArr');
	let monArrow = document.querySelector('#monArr');
	let hiddenSub = document.querySelectorAll('.hiddenSub');
	let hiddenMon = document.querySelectorAll('.hiddenMon');
	let subject = document.querySelector('#subject');
	let month = document.querySelector('#month');
	let counter1 = 0;
	let counter2 = 0;
	let flag = 0;
	let choosenSub = '';
	let choosenMon = '';

	subArrow.addEventListener('click', function(){
		counter1++;
		for(let i=0; i < hiddenSub.length; i++){
			if (hiddenSub[i].classList.contains('hideActive')){
				hiddenSub[i].classList.remove('hideActive');
			}
			else {
				hiddenSub[i].classList.add('hideActive');
			}
		}
		rotate(subArrow, counter1);
	})
	monArrow.addEventListener('click', function(){
		counter2++;
		for(let i=0; i < hiddenMon.length; i++){
			if (hiddenMon[i].classList.contains('hideActive')){
				hiddenMon[i].classList.remove('hideActive');
			}
			else {
				hiddenMon[i].classList.add('hideActive');
			}
		}
		rotate(monArrow, counter2);
	})
	function rotate(arrow, counter){
		if (counter%2 == 1){	
			arrow.style.transform = 'rotate(+135deg)';
		}
		else {
			arrow.style.transform = 'rotate(-45deg)'
		}
	}
	for (let i=0; i < hiddenSub.length; i++){
		hiddenSub[i].addEventListener('click', function(){
			choosenSub = hiddenSub[i].innerHTML;
			flag++;
			subject.innerHTML = choosenSub;
			for(let j=0; j<hiddenSub.length; j++){
				hiddenSub[j].classList.remove('hideActive');
			}
			send(choosenSub, choosenMon, flag);
			counter1++;
			rotate(subArrow, counter1);
		})
	}
	for (let i=0; i < hiddenMon.length; i++){
		hiddenMon[i].addEventListener('click', function(){
			choosenMon = hiddenMon[i].innerHTML;
			flag++;
			month.innerHTML = choosenMon;
			for(let j=0; j<hiddenMon.length; j++){
				hiddenMon[j].classList.remove('hideActive');
			}
			send(choosenSub, choosenMon, flag);
			counter2++;
			rotate(monArrow, counter2);
		})
	}
	function send(choosenSub, choosenMon, flag){
		if (flag >= 2){
			$.ajax({
				url: 'index.php',
				type: "POST",
				dataType: "json",
				data: {mon: choosenMon, sub: choosenSub},
				success: function(response){
					alert(response.status);
				},
				error: function(response){
					alert(response.status, "err");
				}
			});
		}
	}
}
