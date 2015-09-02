QUnit.test("hexAnimMutex", test_animMutex);
QUnit.test("hexVertexPos", test_hexVertexPos);
QUnit.test("btnInitPos", test_btnInitPos);
QUnit.test("mousePos", test_mousePos);
QUnit.test("mousePosButton", test_mouseButton);
QUnit.test("mousePosSubButton", test_mouseSubButton);
QUnit.test("pushPullAnim", test_pushPullAnim);

function test_animMutex(assert)
{
	var testedWidget = new Widget(0);
	assert.equal(testedWidget.animMutexState(), MutexState.Free);
	testedWidget.lockAnimMutex();
	assert.equal(testedWidget.animMutexState(), MutexState.Busy);
	testedWidget.unlockAnimMutex();
	assert.equal(testedWidget.animMutexState(), MutexState.Free);
}

function test_pushPullAnim(assert)
{
	$("body").append('<div id="widget_ent"></div>');
	var testedWidget = new Widget(0);
	var controlNum = 0;
	testedWidget.pushAnim(function() {controlNum = 10;});
	testedWidget.pushAnim(function() {assert.equal(controlNum, 10, "pushAnim");});
	testedWidget.pullAnim();
}

function test_getButtonsRadius() //TODO
{
	for(btnId = 1; btnId < 7; btnId++) {
	}
}

function setButtonsWidth(newWidth) //TODO
{
}

function test_hexVertexPos(assert)
{
	var radius = 100.;
	var semiRoot3 = Math.sqrt(3) / 2.;
	var expectedPos = [[-radius * semiRoot3, radius / 2.],
			[0., radius]];
	expectedPos.push([-expectedPos[0][0], expectedPos[0][1]],
			[-expectedPos[0][0], -expectedPos[0][1]],
			[expectedPos[1][0], -expectedPos[1][1]],
			[expectedPos[0][0], -expectedPos[0][1]]);

	var acceptedError = 1.;
	var isGoodPosition = true;
	var vertId;
	for (vertId = 0; vertId < 6; vertId++) {
		var testedPos = hexVertexPos(radius, vertId + 1);
		var actualError = [Math.abs(testedPos[0] - expectedPos[vertId][0]),
			    Math.abs(testedPos[1] - expectedPos[vertId][1])]
		var isPointOk = actualError[0] <= acceptedError &&
				actualError[1] <= acceptedError;

		isGoodPosition = isGoodPosition && isPointOk;
	}

	assert.ok(isGoodPosition, "Test hexagon");
}

function test_btnInitPos(assert)
{
	var buttonRadius = 2.;
	var widgetWidth = 5.;
	var testedButton = new Button(2, buttonRadius, new Widget(widgetWidth));
	btnInitPos(widgetWidth, testedButton);
	var hexRadius = (widgetWidth - 2 * buttonRadius) / Math.sqrt(3)
	assert.equal(testedButton.top, -hexRadius, "Top");
	assert.ok(Math.abs(testedButton.left) < 1e-10, "Left");
}

function test_mousePos(assert)
{
	setMousePos(1, 0);
	setMousePos(6, 2);
	setMousePos(5, 3);
	assert.equal(getMousePos()[0], 5);
	assert.equal(getMousePos()[1], 3);
}

function test_mouseButton(assert)
{
	setMouseButton(1);
	setMouseButton(6);
	setMouseButton(5);
	assert.equal(getMousePos()[0], 5);
}

function test_mouseSubButton(assert)
{
	setMouseSubButton(0);
	setMouseSubButton(2);
	setMouseSubButton(3);
	assert.equal(getMousePos()[1], 3);
}
