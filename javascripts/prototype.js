var dolphintabs={
	subcontainers:[], last_accessed_tab:null,

	revealsubmenu:function(curtabref,css_change){
		
	this.hideallsubs()
	if (this.last_accessed_tab!=null)
		this.last_accessed_tab.className=""
	if (curtabref.getAttribute("rel")) //If there's a sub menu defined for this tab item, show it
	document.getElementById(curtabref.getAttribute("rel")).style.display="block"
	if(css_change=="Red"){
		curtabref.className="change"
	}
	else if(css_change=="Gray"){
		curtabref.className="current"
	}
	this.last_accessed_tab=curtabref
	},

	hideallsubs:function(){
	for (var i=0; i<this.subcontainers.length; i++)
		document.getElementById(this.subcontainers[i]).style.display="none"
	},


	init:function(menuId, selectedIndex, change_css){
		//alert(change_css);
	var tabItems=document.getElementById(menuId).getElementsByTagName("a")
		for (var i=0; i<tabItems.length; i++){
			if (tabItems[i].getAttribute("rel"))
				this.subcontainers[this.subcontainers.length]=tabItems[i].getAttribute("rel") //store id of submenu div of tab menu item
			if (i==selectedIndex){ //if this tab item should be selected by default
				if(change_css=="Red"){
					tabItems[i].className="change"
				}
				else if(change_css=="Gray"){
					tabItems[i].className="current"	
				}
				
				this.revealsubmenu(tabItems[i])
			}
		tabItems[i].onclick=function(){
		dolphintabs.revealsubmenu(this,change_css)
		}
		} //END FOR LOOP
	}

}