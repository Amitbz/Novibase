//In the following lines is set a two-dimentional array of medication, each cell in the array holds another array, that holds the lines of 
//the medication's details as existing in the text file
var medCabinet = new Array();
jQuery.get('/personareport-content/medication.txt', function (Medication) {
    var meds = Medication.split("\r\n<-->");
    var arr = new Array();
    for (i = 0; i < meds.length; i++) {
        lines = meds[i].split("\r\n");
        arr = $.grep(lines, function (value) {
            return value != "";
        })
        medCabinet[i] = arr;
    }
})

//In the following lines and object and an array are being set. The object (docOrg) is a key-value object, representing the name of the doctor as
//key and his description as value. The array (docCabinet) is a two-dimentional array, where each cell holds and array of doctor arrays of a certain
//category. doctor arrays are composed of two cells: name and description.
var docOrg = {};
var docCabinet = new Array();
jQuery.get('/personareport-content/doctors.txt', function (Data) {
    docCabinet[0] = Data.substring(Data.indexOf("Conventional:") + 15, Data.indexOf("Practitioner:") - 2);
    docCabinet[1] = Data.substring(Data.indexOf("Practitioner:") + 15, Data.length);
    for (i = 0; i < docCabinet.length; i++) {
        docCabinet[i] = docCabinet[i].split("\r\n");
        for (j = 0; j < docCabinet[i].length; j++) {
            var parts = docCabinet[i][j].split("; ");
            parts[0] = parts[0].replace("\n", "");
            docOrg['"' + parts[0] + '"'] = parts[1];
        }
    }
})

//-------------------------------------------------------------------------------------------------------------------------------------------------

//Once the window is finished loading, we fire up the function that will create and inject our report page's HTML
window.onLoad = create_report_content()


//This function opens the report as a string, divides it into sections (also strings), prints the summary section into the page and calls
//4 other functions to set all the other sections.
function create_report_content() {
    var sPageURL = String(window.location);
    var idu = sPageURL.substring((sPageURL.indexOf("id=")+3), sPageURL.length);
    jQuery.get('/personareport-content/'+idu+'.txt', function (Report) {
        var sections = Report.split("<-->"),
            overview = sections[0].substring(11, sections[0].length - 2),
            currmedic = sections[1].substring(23, sections[1].length - 2),
            consul = sections[2].substring(27, sections[2].length - 2),
            nutalt = sections[3].substring(30, sections[3].length - 2),
            clintrials = sections[4].substring(20, sections[4].length - 2),
            team = sections[5].substring(20, sections[4].length);

        $("#summary div:first-child").append('<p>' + overview + '</p>');
        set_Currmedic(currmedic, $("#treatHolder"), "myChart", "p");
        set_Currmedic(consul, $("#convHolder"), "myChart2", "p.col-md-8.pull-left");
        set_Doctor_team(team);
        set_Altboxes(nutalt);
        set_Cliniboxes(clintrials);
    })
};


//This function receives 3 parameters: the medication section string, the object into which the HTML will be injected, and the class of
//the canvas objects. it parses the medicines that need to be displayed, creates an HTML format string and injects it to the object.
function set_Currmedic(txt, obj, clss, whr) {
    var text = txt.substring(6, txt.indexOf("\r\nMedication")),
        meds = txt.substring(txt.indexOf("\r\nMedication: ") + 14, txt.length).split(", "),
	rating = new Array(),
	injectHTML = "";
    obj.find(whr).append(text);
    for (i = 0; i < meds.length; i++) {
        medInfo = get_med_info(meds[i]);
        var medSE = medInfo[3].split(",");
        var sideEffects = '<ul class="med-ul">';
        for (j = 0; j < medSE.length; j++) {
            sideEffects += '<li>' + medSE[j] + '</li>';
            (j === 3) ? sideEffects += '</ul><ul class = "medbox-hide-text med-ul">' : sideEffects += "";

        }
        sideEffects += '</ul>';
        var url = "http://www.wikipedia.org/wiki/" + medInfo[0],
            aka = medInfo[1];
        if (aka.length > 120) {aka = aka.substring(0, 120) + '...';}
        injectHTML += '<div class="col-md-6 col-sm-12 col-xs-12 medbox"><div class="nqbox" style="background-color: RGB(100,100,100)"><div class="row"><div class="col-md-8 col-sm-8">';
        injectHTML += '<h2>' + medInfo[0] + '</h2><p class="med-aka"><strong>Also Known as</strong>: ' + aka + '</p><p class="med-desc">     ' + medInfo[2].substring(0, 140) + '<a href="' + url + '" target="_blank"> ...Read on Wikipedia</a></p>';
        injectHTML += '</div>';

        injectHTML += '<div class="col-md-4 col-sm-4"><a class ="pull-right nqinfo"';
        injectHTML += ' href="' + url + '" target="_black"><img src="img/info-icon.png"></a><p class = "col-md-12 col-sm-12" style="text-align: center;">';
        injectHTML += '<span style="font-size:medium;">Patient Satisfaction</span><canvas class="' + clss + ' col-md-10 col-sm-12" height="16%" width="7%" style="left:0px;"></canvas>';
        injectHTML += '<p style="text-align:center"></p></p></div></div>';

        injectHTML += '<div class="row"><div class="col-md-8 col-sm-8"><p><strong>Side effects reported by users</strong>:</p>';
        injectHTML += sideEffects + '</div><div class="col-md-4 col-sm-4 pull-right text-center" style="font-size: large; font-weight: 700;">' + medInfo[4] + '/10</div></div></div></div>';

        rating.push(medInfo[4]);
    }
    obj.append(injectHTML);
    setCharts(rating, clss);
}


//This function receives a string as a parameter. The string represents the name of the medicine, and the function returns an array from
//the two dimentional array medCabinet, matching the required medicine. If not found, returns null. 
function get_med_info(name) {
    for (k = 0; k < medCabinet.length; k++) {
        if (name == medCabinet[k][0]) {
            return medCabinet[k];
        }
    }
    return null;
}


//This function receives an array of ratings of all the medicines of class cls (string). It returns no value. The function finds the 
//Canvases of the matching class, sets the data and displays a bar chart in the canvas.
function setCharts(rateArray, cls) {
    charts = $("." + "" + cls + "");                        //An array of objects - Canvases in the Divs which hold the boxes
    for (i = 0; i < charts.length; i++) {                   //For every entery:
        var ctx = charts[i].getContext("2d");               //A context of a single Canvas
        line = rateArray[i].replace("\r", "");
        //Next we dump the data into an object accordingly
        var chartData = {
            labels: [""],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(68,223,115,0.5)",
                    strokeColor: "rgba(68,223,115,0.8)",
                    highlightFill: "rgba(68,223,115,0.75)",
                    highlightStroke: "rgba(68,223,115,1)",
                    data: [rateArray[i], 10]
                }
            ]
            }
        var opts = { scaleShowHorizontalLines: false, scaleShowVerticalLines: false}
        var myPieChart = new Chart(ctx).Bar(chartData, opts);     //displaying the data on the Canvas
    }
}



//This function  receives a string as a parameter. The string represents a team of doctors suggested to the patient. The function creates an HTML 
//format string, that contains the suggested team part in the "schedule an appointment" popups. It returns no value.
function set_Doctor_team(docstring) {
    var imgs = { "Revital Kariv, MD": "http://noviqr.eu/doctor-imgs/Revital-Kariv.png", "Prof. Ran Oren": "http://noviqr.eu/doctor-imgs/Ran-Oren.png", "Adi Lahat, MD": "http://noviqr.eu/doctor-imgs/Adi-Lahat.png", "Mira Niazov, MD": "http://noviqr.eu/doctor-imgs/Mira-Niazov.png", "Ravit Guri": "http://noviqr.eu/doctor-imgs/Ravit-Guri.png", "Adi Zusman": "http://noviqr.eu/doctor-imgs/Adi-Zusman.png", "Nir Salomon": "http://noviqr.eu/doctor-imgs/Nir-Salomon.png" };
    var docs = docstring.split("; ");
    var injectHTML = '<div class="nqbox">',
        ifleader = '';
    for (i = 0; i < 4; i++) {
        injectHTML += '<div class="row">';
        for (j = 0; j < docs.length; j++) {
            var name = docs[j];
            ifleader = '';
            if (name.indexOf(" (leader)") != -1) {
                name = name.substring(0, name.indexOf(" (leader)"));
                ifleader = '<div class="col-md-8 col-md-offset-2 col-sm-12" style="text-align: center"><p><button id="doc-btn-' + name + '" type="button" class="btn btn-success btn-lg btn-block" onclick="return contswitch();">Schedule an Appointment with the Team Leader</button></p></div>';
            }
            if (i == 0) {
                injectHTML += '<div class="col-md-4 col-sm-4"><div class="row"><p class = "text-center"><img src="' + imgs[name] + '" /></p></div></div>';
            }
            if (i == 1) {
                injectHTML += '<div class="col-md-4 col-sm-4 doctor-thumbnails-names"><div class="row"><p class="lead text-center text-primary">';
                injectHTML += docs[j] + '</p></div></div>';
            }
            if (i == 2) {
                injectHTML += '<div class="col-md-4 col-sm-4 doctor-thumbnails-desc"><div class="row"><p>    ' + docOrg['"' + name + '"'] + '</p></div></div>';
            }
            if (i == 3) {
                injectHTML += ifleader;
            }
        }
        injectHTML += '</div>';
    }
    injectHTML += '></div><div class = "row doctor-thumbnails-title"><p class="text-center">OR:</p></div>';
    $("#convPopup div.nqbox").append(injectHTML);
    $("#altPopup div.nqbox").append(injectHTML);
    set_Other_Doctors(imgs);
}


//This function receives an object as a parameter. The object is key-value format, holding the names of doctors (string) as keys for urls to
//the corresponding image of the doctor (string). It creates an HTML format string holding the second part of the "schedule an appointment"
//popups, with the rest of the available doctors.
function set_Other_Doctors(imgs) {
    var convHTML = '<div class="row doctor-thumbnails-title"><div class="col-md-8 col-md-offset-2 text-center">',
        altHTML = '',
        isdivisible = '';
    convHTML += '<p class="lead text-center" style="display:inline;" onclick="contswitch()">Schedule an Appointment With a <span style="color: #63a3c5">Conventional';
    convHTML += '</span> Practitioner Below:</p></div></div><div class="nqbox">';
    for (i = 0; i < 2; i++) {
        var discList = [""];
        var remain = docCabinet[i].length % 3,
            wholes = Math.floor(docCabinet[i].length / 3),
            nutOnly = "";
        if (i > 0) {
            totLen = docCabinet[1].length
            remain = totLen % 3;
            wholes = Math.floor(totLen / 3);
            
        }
        for (j = 0; j < wholes * 3; j += 3) {
            var pair1 = docCabinet[i][j].split("; "),
                pair2 = docCabinet[i][j + 1].split("; "),
                pair3 = docCabinet[i][j + 2].split("; ");
            if (i > 0) {
                nutOnly = '<span class = "doc-discipline">Alternative Practitioner</span>';
            }
            convHTML += '<div class="nqbox"><div class="row"><div class="col-md-4"><div class="row"><p class = "text-center">';
            convHTML += '<img src=' + imgs[pair1[0]] + ' /></p></div></div><div class="col-md-4"><div class="row"><p class = "text-center">';
            convHTML += '<img src=' + imgs[pair2[0]] + ' /></p></div></div><div class="col-md-4"><div class="row">';
            convHTML += '<p class = "text-center"><img src=' + imgs[pair3[0]] + ' /></p></div></div></div><div class="row">';
            convHTML += '<div class="col-md-4 doctor-thumbnails-names"><div class="row"><p class="lead text-center text-primary">';
            convHTML += pair1[0] + '<br />' + nutOnly + '</p></div></div><div class="col-md-4 doctor-thumbnails-names">';
            convHTML += '<div class="row"><p class="lead text-center">' + pair2[0] + '<br />' + nutOnly;
            convHTML += '</p></div></div><div class="col-md-4 doctor-thumbnails-names"><div class="row"><p class="lead text-center">';
            convHTML += pair3[0] + '<br />' + nutOnly + '</p></div></div></div><div class="row">';
            convHTML += '<div class="col-md-4 doctor-thumbnails-desc"><div class="row"> <p>    ' + pair1[1] + '</p></div></div>';
            convHTML += '<div class="col-md-4 doctor-thumbnails-desc"><div class="row"><p>    ' + pair2[1] + '</p></div></div>';
            convHTML += '<div class="col-md-4 doctor-thumbnails-desc"><div class="row"><p>    ' + pair3[1] + '</p></div></div>';
            convHTML += '</div><div class="row"><div class="col-md-4" style="text-align: center"><button id="doc-btn-' + pair1[0] + '"';
            convHTML += 'type="button" class="btn btn-success btn-lg btn-block" onclick="contswitch()">Schedule an Appointment</button> </div>';
            convHTML += '<div class="col-md-4" style="text-align: center"><button id="doc-btn-' + pair2[0] + '" type="button"';
            convHTML += 'class="btn btn-success btn-lg btn-block" onclick="contswitch()">Schedule an Appointment</button></div>';
            convHTML += '<div class="col-md-4" style="text-align: center"><button id="doc-btn-' + pair3[0] + '" type="button"';
	    convHTML += 'class="btn btn-success btn-lg btn-block" onclick="contswitch()">Schedule an Appointment</button></div></div>';
        }
        if (remain != 0) {
            convHTML += '<div class="nqbox"><div class="row">';
            for (j = 1; j <= 4; j++) {
                convHTML += '<div class="row">';
                for (k = 0; k < remain; k++) {
                    var pair = docCabinet[i][wholes * 3 + k].split("; ");
                    if (j == 1) {
                        convHTML += '<div class="col-md-4"><div class="row"><p class = "text-center"><img src="' + imgs[pair[0]] + '" /></p></div></div>';
                    }
                    if (j == 2) {
                        if (i > 0) {
                            convHTML += '<div class="col-md-4 doctor-thumbnails-names"><div class="row"><p class="lead text-center text-primary">';
                            convHTML += pair[0] + '<br />';
                            convHTML += '<span class = "doc-discipline">' + nutOnly + '</span></p></div></div>';
                        }
                        else {
                            convHTML += '<div class="col-md-4 doctor-thumbnails-names"><div class="row"><p class="lead text-center text-primary">';
                            convHTML += pair[0] + '</p></div></div>';
                        }
                    }
                    if (j == 3) {
                        convHTML += '<div class="col-md-4 doctor-thumbnails-desc"><div class="row"> <p>    ' + pair[1] + '</p></div></div>';
                    }
                    if (j == 4) {
                        convHTML += '<div class="col-md-4" style="text-align: center"><button id="doc-btn-' + pair[0] + '" type="button"';
                        convHTML += 'class="btn btn-success btn-lg btn-block" onclick="contswitch()">Schedule an Appointment</button></div>';

                    }
                }
                convHTML += '</div>';
            }
            convHTML += '</div></div>';
        }
        if (i == 0) {
            convHTML += '</div>';
            $("#convPopup .nqbox:nth-of-type(1)").append(convHTML);
            convHTML = '<div class="row doctor-thumbnails-title"><div class="col-md-8 col-md-offset-2 text-center">';
            convHTML += '<p class="lead text-center" style="display:inline;">Schedule an Appointment With an <span style="color: #63a3c5">Alternative';
            convHTML += '</span> Practitioner Below:</p></div></div><div class="nqbox">';
        }
    }
    convHTML += '</div>';
    $("#altPopup .nqbox:nth-of-type(1)").append(convHTML);
}


//This function receives a string as a parameter. The string represents the data to be displayed in the "Nutritional & Alternative" boxes.
//It parses the string and appends an HTML format string to the proper Div
function set_Altboxes(nutalt) {
    var altext = nutalt.substring(6, nutalt.indexOf("\r\nOption: ")),
        altboxes = "";
    if (altext) {
        altboxes = nutalt.substring(nutalt.indexOf("\r\nOption: ")+10, nutalt.length).split("\r\nOption: ");
    }
    var injectHTML = '';
    for (i = 0; i < altboxes.length; i++) {
        var title = altboxes[i].substring(0, altboxes[i].indexOf(";")),
            text = altboxes[i].substring(altboxes[i].indexOf(";") + 2, altboxes[i].length);
        injectHTML += '<div class="row"><div class="nqhbox altbox"><div class="col-md-1"><span class="fa-stack fa-lg pull-left fa-2x">';
        injectHTML += '<i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-stack-1x fa-inverse">' + (i + 1) + '</i></span></div>';
        injectHTML += '<div class="col-md-11 altbox"><p style="padding-top: 10px;"><strong>' + title + '</strong>:</p>';
        injectHTML += '<p>' + text + '</p></div><div class="col-md-3" style="text-align: center; padding-top: 20px;" "=""></div>';
        injectHTML += '<div class="clearfix"></div></div><!-- /.nqhbox --></div>';
    }
    $("#alternative p.col-md-8").append(altext);
    $("#alternative > div.container > div.row").append(injectHTML);
}


//This function receives a string as a parameter. The string represents the data to be displayed in the "Clinical Trials" boxes.
//It parses the string and appends an HTML format string to the proper Div
function set_Cliniboxes(clintrials) {
    var trials = clintrials.split("\r\n--\r\n"),
        injectHTML = '';
    if (trials[0].indexOf("Option: ") != -1) {
        for (i = 0; i < trials.length; i++) {
            var fields = trials[i].split("\r\n");
            injectHTML += '<div class="row"><div class="nqhbox"><div class="col-md-1"><span class="fa-stack fa-lg pull-left fa-2x">';
            injectHTML += '<i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-stack-1x fa-inverse">' + (i + 1) + '</i></span></div><div class="col-md-8">';
            injectHTML += '<p style="padding-top: 10px;"><strong>' + fields[0] + '</strong>:</p>';
            injectHTML += '<p><span style="color: #63a3c5">Condition: </span>' + fields[1] + '</p><p><span style="color: #63a3c5">';
            injectHTML += 'Interventions</span><br>' + fields[2] + '<br>   THIS IS ONE MORE INTERVENTION';
            injectHTML += '</p></div><div class="col-md-3" style="text-align: center; padding-top: 20px;" "="">';
            injectHTML += '<button type="button" class="btn btn-info btn-lg  btn-block">APPLY</button></div><div class="clearfix"></div>';
            injectHTML += '</div><!-- /.nqhbox --></div>';
        }
    }
    else {
        injectHTML += '<p> ' + clintrials + ' </p>';
    }
    $("#clinical > div.container > div.row").append(injectHTML);
}