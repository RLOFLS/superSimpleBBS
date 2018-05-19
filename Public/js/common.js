function show(obj){
	//var targrtName=$(obj).attr('name');
	//alert(targrtName);
	//$('iframe[src]').attr('src',targrtName+'.html');
	var url=$(obj).attr('date-src');
		//alert(targrtName);
	$('iframe[src]').attr('src',url);
}

function showManage(obj){
		$("div[class*='active_live']").removeClass('active_live');
		obj.className='nav_one active_live';
		//var targrtName=$(obj).attr('name');
		//alert(targrtName);
		//$('iframe[src]').attr('src',targrtName+'.html');
		//
		var url=$(obj).attr('date-src');
		//alert(targrtName);
		$('iframe[src]').attr('src',url);
	}
	