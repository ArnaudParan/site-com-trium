//Before reading anything, you must know that here every graphical object is identified by the
//position of its center and not the top left corner. Furthermore, the coords system's origin is
//the center of the widget


function createWidget()
{
	var htmlWidget = $("#widget_ent");
	var width = parseInt(htmlWidget.css("width"));
	var createdWidget = new Widget(width);
	return createdWidget;
}

var MutexState = {
	Busy: 0,
	Free: 1
};

var Widget = function(width) {
	this.animMutex = MutexState.Free;
	this.width = width;
	var btnRadius = getButtonsRadius();
	this.height = 2 * (this.width - 2 * btnRadius) / Math.sqrt(3) + 2 * btnRadius;//TODO
	this.xCenter = this.width / 2.;
	this.yCenter = this.height / 2;
	this.htmlWidget = $("#widget_ent");
	this.buttons = new Array();

	var buttons = this.buttons;
	var btnId;
	for (btnId = 1; btnId < 7; btnId++) {
		var newButton = new Button(btnId, 
				btnRadius,
				this);
		buttons.push(newButton);
	}

	this.updateStyle = function()
	{
		var btnId;
		for (btnId = 1; btnId < 7; btnId++) {
			this.buttons[btnId - 1].updateStyle();
		}
		this.htmlWidget.css({"height" : parseInt(this.height) + "px"});
	}

	this.updateStyle();

	this.animMutexState = function()
	{
		return this.animMutex;
	}

	this.lockAnimMutex = function()
	{
		this.animMutex = MutexState.Busy;
	}

	this.unlockAnimMutex = function()
	{
		this.animMutex = MutexState.Free;
	}

	this.pushAnim = function(animFunction)
	{
		this.htmlWidget.queue(animFunction);
	}

	this.pullAnim = function()
	{
		this.htmlWidget.dequeue();
	}
}

var Button = function(Id, radius, widget)
{
	this.Id = Id;
	this.DOMbtn = $('#btn' + this.Id);
	this.radius = radius;
	this.widget = widget;

	var sbtnRadius = getSubButtonsRadius();
	this.sbtn = new Array();
	var sbtnId;
	for (sbtnId = 1; sbtnId < 3; sbtnId++) {
		var newSubButton = new SubButton(sbtnId, 
				this.Id,
				sbtnRadius,
				this.left,
				this.top,
				this);
		this.sbtn.push(newSubButton);
	}

	this.initPos = function ()
	{
		btnInitPos(this.widget.width, this);
	}


	this.initPos();
	this.DOMbtn.css({'visibility': 'visible'});

	this.updateStyle = function()
	{
		var sbtnId;
		for (sbtnId = 1; sbtnId < 3; sbtnId++) {
			this.sbtn[sbtnId - 1].updateStyle();
		}
		this.DOMbtn.css({'left': parseInt(this.left) + parseInt(this.widget.xCenter) - parseInt(this.radius) + 'px',
				'top': parseInt(this.top) + parseInt(this.widget.yCenter) - parseInt(this.radius) + 'px'});
	}

	this.toCenter = function(callback) {
		this.left = 0;
		this.top = 0;
		this.animate(500, callback);
	}

	this.toOriginal = function(callback) {
		this.initPos();
		this.animate(500, callback);
	}

	this.openSBtns = function(callback) {
		this.sbtn[0].left -= this.sbtn[0].radius;
		this.sbtn[1].left += this.sbtn[0].radius;
		this.sbtn[0].animate(500);
		this.sbtn[1].animate(500, callback);
	}

	this.closeSBtns = function(callback) {
		this.sbtn[0].initPos();
		this.sbtn[1].initPos();
		this.sbtn[0].animate(500);
		this.sbtn[1].animate(500, callback);
	}

	this.openButton = function(callback) {
		this.DOMbtn.queue(this.toCenter());
		this.DOMbtn.queue(this.openSBtns(callback));
	}

	this.closeButton = function(callback) {
		this.DOMbtn.queue(this.toOriginal());
		this.DOMbtn.queue(this.closeSBtns(callback));
	}

	this.animate = function(time, callback) 
	{
		this.DOMbtn.animate({'left': parseInt(this.left) + parseInt(this.widget.xCenter) - parseInt(this.radius) + 'px',
				'top': parseInt(this.top) + parseInt(this.widget.yCenter) - parseInt(this.radius) + 'px'}, time, callback);
	}
}

function btnInitPos (widgetWidth, button)
{
	var btnWidth = 2 * button.radius;
	var hexWidth = widgetWidth - btnWidth;
	var hexRadius = hexWidth / Math.sqrt(3);
	var centerPos = hexVertexPos(hexRadius, button.Id);
	button.left = centerPos[0];
	button.top = -centerPos[1];
}

function subBtnInitPos (widgetWidth, button)
{
	var btnWidth = 2 * getButtonsRadius();
	var hexWidth = widgetWidth - btnWidth;
	var hexRadius = hexWidth / Math.sqrt(3);
	var centerPos = hexVertexPos(hexRadius, button.PId);
	button.left = centerPos[0];
	button.top = -centerPos[1];
}

var SubButton = function(Id, PId, radius, left, top, parentButton)
{
	this.Id = Id;
	this.PId = PId;
	this.DOMsbtn = $('#sbtn' + this.PId + '' + this.Id);
	this.radius = radius;
	this. left = left;
	this.top = top;
	this.parentButton = parentButton;

	this.initPos = function ()
	{
		var widget = this.parentButton.widget;
		subBtnInitPos(widget.width, this);
	}

	this.initPos();
	this.DOMsbtn.css({'visibility': 'visible'});


	this.updateStyle = function()
	{
		this.DOMsbtn.css({'left': parseInt(this.left) + parseInt(this.parentButton.widget.xCenter) - parseInt(this.radius) + 'px',
				'top': parseInt(this.top) + parseInt(this.parentButton.widget.yCenter) - parseInt(this.radius) + 'px'});
	}

	this.toOriginal = function(callback) {
		this.initPos();
		this.animate(500);
	}

	this.animate = function(time, callback)
	{
		this.DOMsbtn.animate({'left': parseInt(this.left) + parseInt(this.parentButton.widget.xCenter) - parseInt(this.radius) + 'px',
				'top': parseInt(this.top) + parseInt(this.parentButton.widget.yCenter) - parseInt(this.radius) + 'px'}, time, callback);
	}
}

function hexVertexPos(hexRadius, vertexId)
{
	var firstVertexAngle = 5. * Math.PI / 6.;
	//minus because clockwise
	var angle = -Math.PI * (vertexId - 1.) / 3. + firstVertexAngle;
	var position = [hexRadius * Math.cos(angle), hexRadius * Math.sin(angle)];

	return position;
}

function getButtonsRadius()
{
	var buttonWidth = parseInt(jQuery('#btn1').css('width'));
	return buttonWidth / 2;
}

function getSubButtonsRadius()
{
	var subButtonWidth = parseInt(jQuery('#sbtn11').css('width'));
	return subButtonWidth / 2;
}

var mousePos = [0, 0];

function setMouseButton(btnId)
{
	mousePos[0] = btnId;
}

function setMouseSubButton(sbtnId)
{
	mousePos[1] = sbtnId;
}

function setMousePos(btnId, sbtnId)
{
	mousePos = [btnId, sbtnId];
}

function getMousePos()
{
	return mousePos;
}

var widget = createWidget();
widget.pushAnim(widget.buttons[0].openButton());
widget.pushAnim(widget.buttons[0].closeButton());
