$(document).ready(function () {

  $('#save').hide();
  //console.log("Working");

  $('#get').click(function () {
    //console.log("Clicked get Data");
    $('#selcou').fadeIn();
    $('#selslo').fadeIn();
    $('#sellab').fadeIn();
    $('#timetable').hide();

    $.post("main.php", {
      request: "getcourses",
      courseid: document.getElementById('courses').value
    },
      function (data, status) {
        //alert("Data: " + data + "\nStatus: " + status);

        var courses = new Array();
        courses = jQuery.parseJSON(data);
        //console.log(courses);
        $('.dynamiccourses').remove();
        for (i = 0; i < courses.length; i++) {
          var el = document.createElement("p");
          el.textContent = " " + courses[i][0] + " - " + courses[i][1];
          el.setAttribute("class", "dynamiccourses");
          document.getElementById('cou').appendChild(el);
        }
      });

    $.post("main.php", {
      request: "getslots",
      slotid: document.getElementById('slots').value
    },
      function (data, status) {
        //alert("Data: " + data + "\nStatus: " + status);

        var slots = new Array();
        slots = jQuery.parseJSON(data);
        //console.log(slots);
        $('.dynamicslots').remove();
        for (i = 0; i < slots.length; i++) {
          for (j = 0; j < slots[i].length; j++) {
            var el = document.createElement("p");
            el.textContent = " " + slots[i][j];
            el.setAttribute("class", "dynamicslots");
            document.getElementById('slo').appendChild(el);
          }
        }
      });

    $.post("main.php", {
      request: "getlabs",
      courseid: document.getElementById('courses').value
    },
      function (data, status) {
        //alert("Data: " + data + "\nStatus: " + status);

        var courses = new Array();
        courses = jQuery.parseJSON(data);
        //console.log(courses);
        $('.dynamiclabs').remove();
        for (i = 0; i < courses.length; i++) {
          var el = document.createElement("p");
          el.textContent = " " + courses[i][0] + " - " + courses[i][1];
          el.setAttribute("class", "dynamiclabs");
          document.getElementById('lab').appendChild(el);
        }
      });

    $('#generate').attr("disabled", false);
  });

  //$('#timetable').hide();
  $('#generate').click(function () {
    //console.log("Clicked Generate TT");

    $('#selcou').fadeOut();
    $('#selslo').fadeOut();
    $('#sellab').fadeOut();
    $('#generate').html("Shuffle");
    $('#save').show();
    $('#timetable').hide();

    $.post("main.php", {
      request: "generate",
      courseid: document.getElementById('courses').value,
      slotid: document.getElementById('slots').value
    },
      function (data, status) {
        //alert("Data: " + data + "\nStatus: " + status);
        var timetable = new Array();
        timetable = jQuery.parseJSON(data);
        //Error with Session Storage
        //sessionStorage.setItem('timetable', data);
        //sessionStorage.setItem('tt','true');
        //console.log("Clicked Generate");
        $('#generate').html("Shuffle");

        $('#timetable').fadeIn();
        //timetable = JSON.parse(sessionStorage.getItem('timetable'));
        //console.log(timetable);
        //console.log(timetable[0][0]);
        //$('#D1S1').text = timetable[0][0][0];
        document.querySelector('#D1S1').innerHTML = timetable[0][0];
        document.querySelector('#D1S2').innerHTML = timetable[0][1];
        document.querySelector('#D1S3').innerHTML = timetable[0][2];
        document.querySelector('#D1S4').innerHTML = timetable[0][3];

        document.querySelector('#D2S1').innerHTML = timetable[1][0];
        document.querySelector('#D2S2').innerHTML = timetable[1][1];
        document.querySelector('#D2S3').innerHTML = timetable[1][2];
        document.querySelector('#D2S4').innerHTML = timetable[1][3];

        document.querySelector('#D3S1').innerHTML = timetable[2][0];
        document.querySelector('#D3S2').innerHTML = timetable[2][1];
        document.querySelector('#D3S3').innerHTML = timetable[2][2];
        document.querySelector('#D3S4').innerHTML = timetable[2][3];

        document.querySelector('#D4S1').innerHTML = timetable[3][0];
        document.querySelector('#D4S2').innerHTML = timetable[3][1];
        document.querySelector('#D4S3').innerHTML = timetable[3][2];
        document.querySelector('#D4S4').innerHTML = timetable[3][3];

        document.querySelector('#D5S1').innerHTML = timetable[4][0];
        document.querySelector('#D5S2').innerHTML = timetable[4][1];
        document.querySelector('#D5S3').innerHTML = timetable[4][2];
        document.querySelector('#D5S4').innerHTML = timetable[4][3];

        document.querySelector('#D6S1').innerHTML = timetable[5][0];
        document.querySelector('#D6S2').innerHTML = timetable[5][1];
        document.querySelector('#D6S3').innerHTML = timetable[5][2];
        document.querySelector('#D6S4').innerHTML = timetable[5][3];
        //shuffleTT();
        //$('#generate').html=('Shuffle');
        //window.location.href = "viewtt.php";
        // var courses = new Array();
        // courses = jQuery.parseJSON(data);
        // console.log(courses);
        // $('.dynamiccourses').remove();
        // for (i = 0; i < courses.length; i++) {
        //   var el = document.createElement("p");
        //   el.textContent = " "+courses[i][0]+" - "+courses[i][1];
        //   el.setAttribute("class", "dynamiccourses");
        //   document.getElementById('cou').appendChild(el);

      });

    $.post("main.php", {
      request: "getlabs",
      courseid: document.getElementById('courses').value
    },
      function (data, status) {
        //alert("Data: " + data + "\nStatus: " + status);
        var courses = new Array();
        courses = jQuery.parseJSON(data);
        //console.log(courses);
        $('.select').remove();

        var selectbox = document.createElement("select");
        selectbox.setAttribute("class", "select");
        selectbox.setAttribute("id", "day1");
        for (i = 0; i < courses.length; i++) {
          var option = document.createElement('option');
          option.setAttribute('value', courses[i][0]);
          option.innerHTML = courses[i][0];
          selectbox.appendChild(option);
        }
        var newoption1=document.createElement("option");
        newoption1.setAttribute('value', "FREE");
        newoption1.innerHTML = "FREE";
        selectbox.appendChild(newoption1);

        var selectbox1 = document.createElement("select");
        selectbox1.setAttribute("class", "select");
        selectbox1.setAttribute("id", "day2");
        for (i = 0; i < courses.length; i++) {
          var option = document.createElement('option');
          option.setAttribute('value', courses[i][0]);
          option.innerHTML = courses[i][0];
          selectbox1.appendChild(option);
        }
        var newoption2=document.createElement("option");
        newoption2.setAttribute('value', "FREE");
        newoption2.innerHTML = "FREE";
        selectbox1.appendChild(newoption2);

        var selectbox2 = document.createElement("select");
        selectbox2.setAttribute("class", "select");
        selectbox2.setAttribute("id", "day3");
        for (i = 0; i < courses.length; i++) {
          var option = document.createElement('option');
          option.setAttribute('value', courses[i][0]);
          option.innerHTML = courses[i][0];
          selectbox2.appendChild(option);
        }
        var newoption3=document.createElement("option");
        newoption3.setAttribute('value', "FREE");
        newoption3.innerHTML = "FREE";
        selectbox2.appendChild(newoption3);

        var selectbox3 = document.createElement("select");
        selectbox3.setAttribute("class", "select");
        selectbox3.setAttribute("id", "day4");
        for (i = 0; i < courses.length; i++) {
          var option = document.createElement('option');
          option.setAttribute('value', courses[i][0]);
          option.innerHTML = courses[i][0];
          selectbox3.appendChild(option);
        }
        var newoption4=document.createElement("option");
        newoption4.setAttribute('value', "FREE");
        newoption4.innerHTML = "FREE";
        selectbox3.appendChild(newoption4);

        var selectbox4 = document.createElement("select");
        selectbox4.setAttribute("class", "select");
        selectbox4.setAttribute("id", "day5");
        for (i = 0; i < courses.length; i++) {
          var option = document.createElement('option');
          option.setAttribute('value', courses[i][0]);
          option.innerHTML = courses[i][0];
          selectbox4.appendChild(option);
        }
        var newoption5=document.createElement("option");
        newoption5.setAttribute('value', "FREE");
        newoption5.innerHTML = "FREE";
        selectbox4.appendChild(newoption5);

        var selectbox5 = document.createElement("select");
        selectbox5.setAttribute("class", "select");
        selectbox5.setAttribute("id", "day6");
        for (i = 0; i < courses.length; i++) {
          var option = document.createElement('option');
          option.setAttribute('value', courses[i][0]);
          option.innerHTML = courses[i][0];
          selectbox5.appendChild(option);
        }
        var newoption6=document.createElement("option");
        newoption6.setAttribute('value', "FREE");
        newoption6.innerHTML = "FREE";
        selectbox5.appendChild(newoption6);

        document.getElementById('D1S5').appendChild(selectbox);
        document.getElementById('D2S5').appendChild(selectbox1);
        document.getElementById('D3S5').appendChild(selectbox2);
        document.getElementById('D4S5').appendChild(selectbox3);
        document.getElementById('D5S5').appendChild(selectbox4);
        document.getElementById('D6S5').appendChild(selectbox5);
      });

  });

  $('#save').click(function () {
    var day1 = document.getElementById('day1').value;
    var day2 = document.getElementById('day2').value;
    var day3 = document.getElementById('day3').value;
    var day4 = document.getElementById('day4').value;
    var day5 = document.getElementById('day5').value;
    var day6 = document.getElementById('day6').value;
    if (day1 == "FREE")
      day1 = "";
    if (day2 == "FREE")
      day2 = "";
    if (day3 == "FREE")
      day3 = "";
    if (day4 == "FREE")
      day4 = "";
    if (day5 == "FREE")
      day5 = "";
    if (day6 == "FREE")
      day6 = "";
    document.getElementById('D1S5').innerHTML = day1;
    document.getElementById('D2S5').innerHTML = day2;
    document.getElementById('D3S5').innerHTML = day3;
    document.getElementById('D4S5').innerHTML = day4;
    document.getElementById('D5S5').innerHTML = day5;
    document.getElementById('D6S5').innerHTML = day6;

    // var tt = document.getElementById('timetable');
    // tt.setAttribute("border", "1");
    // var caption = document.createElement("caption");
    // caption.innerHTML="Time Table - I MCA";
    // document.getElementById('timetable').appendChild(caption);

    printPageArea('timetable');

    function printPageArea(areaID){
      var printContent = document.getElementById(areaID);
      var WinPrint = window.open('', '', 'width=900,height=650');
      WinPrint.document.write(printContent.innerHTML);
      WinPrint.document.close();
      WinPrint.focus();
      WinPrint.print();
      WinPrint.close();
  }
  });

});