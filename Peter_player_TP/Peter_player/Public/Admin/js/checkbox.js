function uncheckAll(form1,status)
{
	var elements = form1.getElementsByTagName('input');
	for(var i=0; i<elements.length; i++){
		if(elements[i].type == 'checkbox')
		{
		  if(elements[i].checked==true){
			elements[i].checked=false;
		  }
		}
	}	
}

function checkAll(form1,status)
{

	var elements = form1.getElementsByTagName('input');
	for(var i=0; i<elements.length; i++)
	{
		if(elements[i].type == 'checkbox')
		{
		  if(elements[i].checked==false){
			elements[i].checked=true;
		  }


		}
	}	
}
function switchAll(form1,status)
{
	var elements = form1.getElementsByTagName('input');
	for(var i=0; i<elements.length; i++)
	{
		if(elements[i].type == 'checkbox')
		{
		  if(elements[i].checked==true){
			elements[i].checked=false;
		  }else if(elements[i].checked==false){
			elements[i].checked=true;

			}
		}
	}	
}
function uncheckAll2(form2,status)
{
	var elements = form2.getElementsByTagName('input');
	for(var i=0; i<elements.length; i++){
		if(elements[i].type == 'checkbox')
		{
		  if(elements[i].checked==true){
			elements[i].checked=false;
		  }
		}
	}	
}

function checkAll2(form2,status)
{

	var elements = form2.getElementsByTagName('input');
	for(var i=0; i<elements.length; i++)
	{
		if(elements[i].type == 'checkbox')
		{
		  if(elements[i].checked==false){
			elements[i].checked=true;
		  }


		}
	}	
}
function switchAll2(form2,status)
{
	var elements = form2.getElementsByTagName('input');
	for(var i=0; i<elements.length; i++)
	{
		if(elements[i].type == 'checkbox')
		{
		  if(elements[i].checked==true){
			elements[i].checked=false;
		  }else if(elements[i].checked==false){
			elements[i].checked=true;

			}
		}
	}	
}

