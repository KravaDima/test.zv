//
(function($){
	var viewUL = $("div.view")
					.css("overflow", "hidden")
					.children("ul"),
		imgs = viewUL.find("img"),
		i = 1;
		if (window.innerWidth >= 1200) {
			i = 3;
		} else if(window.innerWidth >= 768) {
			i = 2;
		} else if(window.innerWidth < 768) {
			i = 1;
		}
	var	imgW = window.innerWidth/i,
		imgsLen = imgs.length,
		totalImgsW = imgsLen * imgW,
		ww = window.innerWidth/i;
		current = 1; 	// текущая позиция
		
		imgs.css("width", ww);

	$("div#show")
		.show()			// делаем видимые кнопки
		.find("button")	// находим buttons
		.on("click", function(){	// вешаем клик на кнопки
			var direction = $(this).attr("id"),	// получаем prev или next
				position = imgW;
			(direction == "next") ? ++current:--current;
			if(current == 0){		// если current равен 0
				current = imgsLen; 	// то current устанавлием последней картинкой
				direction = "next";
				position = totalImgsW - imgW; // меняем на последнюю позицию
			}else if(current-1 == imgsLen){
				current = 1; 	// переводим на первую картинку
				position = 0; 	// устанавливаем первую позицию
			}
			// console.log(current);
			doIt(viewUL, position, direction);
		});
	function doIt(container, position, direction){
		var sign; 	// "+=" или "-="
		if(direction && position != 0){
			sign = (direction == "next") ? "-=" : "+=";
		}
		var shift = {"margin-left": sign ? (sign+position) : position};
		var duration = {};
		if(position == 0 || position == imgW*(imgsLen-1)){
			duration = {duration:0};
		}
		container.animate(shift, duration);
	}
})(jQuery);