$(document).ready(function(){

	/* datepicker */
	
	$(".datepicker").on("click", function(){
		$("input.datepicker").datepicker();
	});

	/* Plan of Care */
	/* add objective */
	
	var counter = 0;
	var romNum = 1;
	
	$('.addObjectiveRow').on('click', function(){ 
		counter++;
		var newRow = $('<tr height="25"><td width="25%" valign="top" align="center"><textarea name="txtResidentialGoals" id="txtResidentialGoals '+ counter +'" class="NL_formInputExpand" style="width:97%;"></textarea></td><td width="20%" valign="top" align="center"><textarea name="txtResidentialWork" id="txtResidentialWork '+ counter +'" class="NL_formInputExpand" style="width:97%;"></textarea></td><td width="20%" valign="top" align="center"><textarea name="txtResidentialPersons" id="txtResidentialPersons '+ counter +'" class="NL_formInputExpand" style="width:97%;"></textarea></td><td width="15%" valign="top" align="center"><input name="txtResidentialTarget" type="text" id="txtResidentialTarget '+ counter +'" class="formInput datepicker" size="8" /></td><td width="20%" valign="top" align="center"><textarea name="txtResidentialDecisions" id="txtResidentialDecisions '+ counter +'" class="NL_formInputExpand" style="width:97%;"></textarea></td></tr>');
		event.preventDefault(); 
		$(newRow).insertBefore($(this).parent().parent());
		return counter;
	});

	
	/* remove objective */
	
	$('.btnRmvObjective').click(function(){ 
		if ( $(this).closest("tbody").find("tr").length > 3) {
			$(this).parent().parent().prev().remove();
		}
	});

	
	/* Permanency Planning Meeting  */
	
	$('.addtaskrow').on('click', function(){
		counter++
		var taskRow = $('<tr><td width="50%"><table width="100%"><tr><td>Task:</td></tr><tr><td><textarea id="txtTask ' + counter + '" name="txtTask ' + counter + '" class="formInput" runat="server" style="width:99%"></textarea></td></tr></table></td><td><table width="100%"><tr><td>Person:</td></tr><tr><td><input type="text" id="txtP ' + counter + '" name="txtP' + counter + '" class="formInput" runat="server" style="width:99%;" /></td></tr></table></td><td><table width="100%"><tr><td>Timeline:</td></tr><tr><td><input type="text" id="txtT ' + counter + '" name="txtT ' + counter + '" class="formInput" runat="server" style="width:99%;" /></td></tr></table></td></tr> ');
		event.preventDefault();
		$(taskRow).insertBefore($(this).parent().parent());
		return counter;
	});
	
	$('.rmvtaskrow').click(function(){
		if ( $(this).closest("tbody").find("tr").length > 8) {
			$(this).parent().parent().prev().remove();
		}
	});
	
	/* Social History of a Child */
	$('.addfamilymember').click(function(){
		counter++
		var familymember = $('<tr><td><input type="text" id="txtFamilyMemberName '+counter+'" name="txtFamilyMemberName" class="formInput" runat="server" /></td><td><input type="text" id="txtFamilyMemberRelation'+counter+'" name="txtFamilyMemberRelation" class="formInput" runat="server" /></td><td><input type="text" id="txtFamilyMemberDOB'+counter+'" name="txtFamilyMemberDOB" class="formInput datepicker" runat="server" /></td></tr>');
		event.preventDefault();
		$(familymember).insertBefore($(this).parent().parent());
		return counter;
	});
	
	$('.rmvfamilymember').click(function(){
		if ( $(this).closest("tbody").find("tr").length > 3) {
			$(this).parent().parent().prev().remove();
		}
	});
	
	/* Plan of Care */
	/* age 1 */
	$('#Age1').click(function(){
	
		$("#Panel1,#Panel3,#Panel7,#PanelAge1,#Panel11,#Panel14,#Panel17,#Panel19").each(function(){
			$(this).css("display","block");
		});
		
		
		$("#Panel1b,#Panel2,#Panel4,#Panel5,#Panel5b,#Panel6,#Panel8,#Panel9,#Panel9b,#Panel10,#PanelAge2,#PanelAge3,#PanelAge4,#PanelAge5,#PanelAge6,#PanelAge7,#Panel11b,#Panel12,#Panel12b,#Panel13,#Panel15,#Panel15b,#Panel16,#Panel18,#Panel20,#Panel24,#Panel21,#Panel21b,#Panel122,#Panel123").each(function(){
			$(this).css("display","none");
		});
		
		
	});
	
	/* age 2 */
	$('#Age2').click(function(){
	
		$("#Panel1,#Panel4,#Panel8,#PanelAge2,#Panel11b,#Panel14,#Panel17,#Panel20").each(function(){
			$(this).css("display","block");
		});
		
		
		$("#Panel1b,#Panel2,#Panel3,#Panel5,#Panel5b,#Panel6,#Panel7,#Panel9,#Panel9b,#Panel10,#PanelAge1,#PanelAge3,#PanelAge4,#PanelAge5,#PanelAge6,#PanelAge7,#Panel11,#Panel12,#Panel12b,#Panel13,#Panel15,#Panel15b,#Panel16,#Panel18,#Panel19,#Panel24,#Panel21,#Panel21b,#Panel122,#Panel123").each(function(){
			$(this).css("display","none");
		});
		
		
	});
	
	/* age 3 */
	$('#Age3').click(function(){
	
		$("#Panel1,#Panel5,#Panel9,#PanelAge3,#Panel12,#Panel15,#Panel18,#Panel21").each(function(){
			$(this).css("display","block");
		});
		
		
		$("#Panel1b,#Panel2,#Panel3,#Panel4,#Panel5b,#Panel6,#Panel7,#Panel8,#Panel9b,#Panel10,#PanelAge1,#PanelAge2,#PanelAge4,#PanelAge5,#PanelAge6,#PanelAge7,#Panel11b,#Panel11,#Panel12b,#Panel13,#Panel14,#Panel15b,#Panel16,#Panel17,#Panel20,#Panel24,#Panel20,#Panel21b,#Panel122,#Panel123").each(function(){
			$(this).css("display","none");
		});
		
	});
		
	/* age 4 */
	$('#Age4').click(function(){
	
		$("#Panel1b,#Panel5b,#Panel9b,#PanelAge4,#Panel12b,#Panel15b,#Panel18,#Panel21b").each(function(){
			$(this).css("display","block");
		});
		
		
		$("#Panel1,#Panel2,#Panel4,#Panel5,#Panel6,#Panel8,#Panel7,#Panel9,#Panel10,#PanelAge1,#PanelAge2,#PanelAge3,#PanelAge5,#PanelAge6,#PanelAge7,#Panel11,#Panel11b,#Panel12,#Panel13,#Panel14,#Panel15,#Panel16,#Panel17,#Panel20,#Panel24,#Panel21,#Panel122,#Panel123").each(function(){
			$(this).css("display","none");
		});
		
	});
		
	/* age 5 */
	$('#Age5').click(function(){
	
		$("#Panel2,#Panel6,#Panel10,#PanelAge5,#Panel13,#Panel16,#Panel18,#Panel22").each(function(){
			$(this).css("display","block");
		});
		
		
		$("#Panel1,#Panel1b,#Panel3,#Panel4,#Panel5,#Panel5b,#Panel7,#Panel8,#Panel9,#Panel9b,#Panel10,#PanelAge1,#PanelAge2,#PanelAge3,#PanelAge4,#PanelAge6,#PanelAge7,#Panel11,#Panel11b,#Panel12,#Panel12b,#Panel15,#Panel15b,#Panel17,#Panel19,#Panel20,#Panel24,#Panel21,#Panel21b,#Panel123").each(function(){
			$(this).css("display","none");
		});
		
	});

	/* age 6 */
	$('#Age6').click(function(){
	
		$("#Panel2,#Panel6,#Panel10,#PanelAge6,#Panel13,#Panel16,#Panel18,#Panel124,#Panel22").each(function(){
			$(this).css("display","block");
		});
		
		
		$("#Panel1,#Panel1b,#Panel3,#Panel4,#Panel5,#Panel5b,#Panel7,#Panel8,#Panel9,#Panel9b,#PanelAge1,#PanelAge2,#PanelAge3,#PanelAge4,#PanelAge5,#PanelAge7,#Panel11,#Panel11b,#Panel12,#Panel12b,#Panel14,#Panel15,#Panel15b,#Panel17,#Panel19,#Panel20,#Panel21,#Panel21b,#Panel23").each(function(){
			$(this).css("display","none");
		});
	});
	
	/* age 7 */
	$('#Age7').click(function(){
	
		$("#Panel2,#Panel6,#Panel10,#PanelAge7,#Panel13,#Panel16,#Panel18,#Panel24,#Panel23").each(function(){
			$(this).css("display","block");
		});
		
		
		$("#Panel1,#Panel1b,#Panel3,#Panel4,#Panel5,#Panel5b,#Panel7,#Panel8,#Panel9,#Panel9b,#PanelAge1,#PanelAge2,#PanelAge3,#PanelAge4,#PanelAge5,#PanelAge6,#Panel11,#Panel11b,#Panel12,#Panel12b,#Panel14,#Panel15,#Panel15b,#Panel17,#Panel19,#Panel20,#Panel21,#Panel21b,#Panel122").each(function(){
			$(this).css("display","none");
		});
	});
});