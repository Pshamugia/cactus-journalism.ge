/*--------------------------------
			Progressbank JS stuff
			    (c) omedia
----------------------------------*/



$(document).ready(function(){
	
		
		
		//
		// block story
		//
	
		// make blocks draggable
		var ratesHandle = $("#ratesblock .b_top");
		$("#ratesblock").draggable({handle:ratesHandle});
		//
		var calcsHandle = $("#calcsblock .b_top");
		$("#calcsblock").draggable({handle:calcsHandle});
		
		
		// handling depth
		var zindex = 1200;
		//
		ratesHandle.mousedown(function(){
			zindex++;
			$("#ratesblock").css("z-index", zindex);
			return false;
		});
		//
		calcsHandle.mousedown(function(){
			zindex++;
			$("#calcsblock").css("z-index", zindex);
			return false;
		});
		//


		//
		// resizing
		//
		
    if(!($.browser.msie)) {
      // only if not IE and if not homepage    
      if($("#main").is(".dontresize")) {
	
				//		
			
			} else {
      
	  		// resizable testing
	  		$("#main").resizable({handles:"e", animate:false, containment:$(".content"), minWidth:700, stop:function(){
																																																					$(this).resizable("destroy");
																																																					// demo //
																																																					$(this).css("height", "auto");
																																																					}});
	  		
				// handle on hover
	  		$("#main").mouseover(function(){
	  			$(".ui-resizable-e", this).addClass("handle-hovered");
	  		});
	  		$("#main").mouseout(function(){
	  			$(".ui-resizable-e", this).removeClass("handle-hovered");
	  		});
  		
  		}
		
    }
    //
		
		
		//
		// tabbing
		//
		
		// initialize currency tabs
		//$("#ratesTabs > ul").tabs();
		
		
		
		//
		// currency dynamics
		//
		
		// hover on infoblock effect
		$(".infoblock").hover(
			function(){
				$(this).addClass("infoblock_hovered");
			},
			function(){
				$(this).removeClass("infoblock_hovered");
			}
		);
		
		
		
		//
		// fancy tables
		//
		
		// hover on content tr effect
		$(".text_content tr").hover(
			function(){
			  if(!$(this).parent().is(".nohover")) {
				  $(this).addClass("hovered");
				}
			},
			function(){
				$(this).removeClass("hovered");
			}
		);
		
		
		//
		// biography page interactivity
		//
		
		// biography open/close
		$(".bio_item .bio_link").click(function(){
			id = $(this).attr("rel");
			th = $(this);
			if($("#bio_"+id+" .bio_full").is(":visible")) {
				$("#bio_"+id+" .bio_full").hide("normal", function(){
					swap = $("span", th).text();
					$("span", th).text( $("span", th).attr("class") );
					$("span", th).attr("class", swap );
				});
			} else {
				$("#bio_"+id+" .bio_full").show("normal", function(){
					swap = $("span", th).text();
					$("span", th).text( $("span", th).attr("class") );
					$("span", th).attr("class", swap );
				});
			}
			$(this).blur();
			return false;
		});
		
		
		
		//
		// isNumeric function for JS
		//		
	
		function isNumeric(sText) {
			var ValidChars = "0123456789";
			var IsNumber = true;
			var Char;
		
			for (i = 0; i < sText.length && IsNumber == true; i++) { 
				Char = sText.charAt(i); 
				if (ValidChars.indexOf(Char) == -1) {
					IsNumber = false;
				}
			}
			return IsNumber;
		}
		
		
		
		
		
		//
		// modal window calculator
		//
		
		// init modal window & assign trigger
		$('#termCalc').jqm({modal:true});
		$('#termCalc').jqmAddTrigger('.openscreen');
		$('#termCalc').jqmAddClose('#termCalc .close');
		
		// term deposit calculator calculate function
		function termDepositCalculate() {
			
			// determine currency and array
			if( $("#td_currency").attr("value") == "GEL" ) {
				var td_data = td_gel;
			}
			if( $("#td_currency").attr("value") == "USD" ) {
				var td_data = td_usd;
			}
			if( $("#td_currency").attr("value") == "EUR" ) {
				var td_data = td_eur;
			}
			
			// determine money
			var money = $("#td_money").attr("value");
			if( !isNumeric(money) ) {
				money = 0;
			}
			
			// get the number of months
			var months = $("#td_months").attr("value");
			
			// get the percent
			var percent = td_data[months];
			if( $("#td_withd_monthly").is(":checked") ) {
				percent = percent - 0.5;
			}
			
			// get final percent
			var finalPercent = percent / 12 * months;
			
			// get total
			var total = money * (100 + finalPercent) / 100;
			
			// get grand total
			//var Gtotal = total - ( ( total - money ) * 0.1 );
			var Gtotal = total;
			
			// rounding
			total        = Math.round( total * 100) / 100;
			Gtotal       = Math.round(Gtotal * 100) / 100;
			
			// printing currency
			$("#termCalc .result_currency").text( $("#td_currency").attr("value") );
			// printing sargebel
			$("#td_percent").text(percent+"%");
			// printing total
			$("#td_total").text(total);
			// printing grand total
			$("#td_grand_total").text(Gtotal);
			
		}
		// 
		
		// trigging term deposits on events
		$("#termCalc input").keydown(function(){
			setTimeout(termDepositCalculate, 500);
		});
		$("#termCalc input").click(termDepositCalculate);
		$("#termCalc select").change(termDepositCalculate);

		
		
		
	
});
// end document.ready



//
// initialize main menu
//

$(function() {
  $('#nav').droppy();
});
  
  
  
  // http://progressbank.org/includes/currencies/currencyAjax.php?startDate=2008-12-29&endDate=2009-02-02&currency_id=6&currency_type=national