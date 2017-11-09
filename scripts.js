var myCmiWindow;
var cmiCanvas;
var imageCanvas;

function cmiWindowStart() {

    cmiCanvas = document.getElementById("CmiCanvas");
    imageCanvas = document.getElementById("imageCanvas");

    myCmiWindow = new CmiWindow(cmiCanvas);


    if (myCmiWindow.isUsable) {
        if (myCmiWindow.checkWebGlUsage() < 0) {
            SetStatusText(myCmiWindow.getLastError().message);
            return;
        }

        myCmiWindow.setBgColorRGB(0, 0, 0);
        myCmiWindow.setBgText("");
        myCmiWindow.colGradient = false;
        if (myCmiWindow.initWebGlWindow() < 0) {
            SetStatusText(myCmiWindow.getLastError().message);
            return;
        }
        myCmiWindow.handleArrowKeys = true;
        ResizeWindow();
    }

}

/*
change the whole carpentry page according to the file and its' attributes
*/
function changeModel(filename, is3D, angle) {

    if (is3D) {
        cmiCanvas.style.display = "unset";
        imageCanvas.style.display = "none";
        //      reset3dCanvas();
        myCmiWindow.loadModelFromUrl(filename);
        myCmiWindow.switchToPerspective(true);
        myCmiWindow.setMouseModeToRotation();
        enableControls();


    } else {
        cmiCanvas.style.display = "none";
        imageCanvas.style.display = "unset";
        var ctx = imageCanvas.getContext('2d');
        var drawing = new Image();
        drawing.src = filename;

        // spread the picture on the height dimention
        drawing.onload = function() {

            ctx.drawImage(drawing, 150, 0.75, 50, 100);
        }

    }
}
/*
resize the canvas to take all the screen and its' content to spread allover it
*/
function ResizeWindow() {
    var xSize = window.innerWidth;
    var ySize = window.innerHeight;
    var tbHeight = document.getElementById("CmiToolbar").offsetHeight;
    cmiCanvas.width = xSize;
    cmiCanvas.height = ySize;
    if ((myCmiWindow) && (myCmiWindow.isUsable)) {
        var canvas = myCmiWindow.getCanvas();
        myCmiWindow.resizeContext(canvas.width, canvas.height);
    }
}

function setView(angle) {
    if (angle >= 0) {
        angle -= 1000000000;
        angle_z = angle % 1000;
        angle = (angle - angle_z) / 1000;
        angle_y = angle % 1000;
        angle_x = (angle - angle_y) / 1000;
        myCmiWindow.rotateSceneAbsolut(angle_x, angle_y, angle_z, true);
    }
    myCmiWindow.zoomAll();
    ResizeWindow();
}

/*
turn on the move,zoom,rotate,home keys
*/
function enableControls() {;

    document.getElementById('MouseZoom').checked = false;
    document.getElementById('MouseMove').checked = false;
    document.getElementById('MouseRotate').checked = true;
}