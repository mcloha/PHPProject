// DOM Content Loaded [Admin][User]
$(function(){

    getWeekMessage();
    // Load the schedule main table
    $("#tableDiv").load('userSchedule.php');
    // Load users from db [User]
    loadDates();
    // Load shifts per day from db [User]
    loadShiftsPerDay();
})
function getWeekMessage(){
    $.ajax({
        url: "userControler.php",
        type: "POST",
        dataType: "json"
    })
    .done(function(response){
        if(response.weekMessage[0].weekMessage){
            swal(response.weekMessage[0].weekMessage);
        }
    })
}
// Load dates function [User]
function loadDates(){
    $.ajax({
        url: "userControler.php",
        type: "POST"
    })
    .done(function(response){
        $("#userName").html(response["username"]);
        $("#sundayDate").html(response["sunday"]);
        $("#mondayDate").html(response["monday"]);
        $("#tuesdayDate").html(response["tuesday"]);
        $("#wednesdayDate").html(response["wednesday"]);
        $("#thursdayDate").html(response["thursday"]);
        $("#fridayDate").html(response["friday"]);
        $("#saturdayDate").html(response["saturday"]);
    })
}
// Load shifts per day [User]
function loadShiftsPerDay(){
    $.ajax({
        url: "userControler.php"
    })
    .done(function(response){
        if(response["shifts"]){
            $("#defaultSunday").html(response["shifts"][0]["sunday"]);
            $("#defaultSunday").val(response["shifts"][0]["sunday"]);
            $("#defaultMonday").html(response["shifts"][0]["monday"]);
            $("#defaultMonday").val(response["shifts"][0]["monday"]);
            $("#defaultTuesday").html(response["shifts"][0]["tuesday"]);
            $("#defaultTuesday").val(response["shifts"][0]["tuesday"]);
            $("#defaultWednesday").html(response["shifts"][0]["wednesday"]);
            $("#defaultWednesday").val(response["shifts"][0]["wednesday"]);
            $("#defaultThursday").html(response["shifts"][0]["thursday"]);
            $("#defaultThursday").val(response["shifts"][0]["thursday"]);
            $("#defaultFriday").html(response["shifts"][0]["friday"]);
            $("#defaultFriday").val(response["shifts"][0]["friday"]);
            $("#defaultSaturday").html(response["shifts"][0]["saturday"]);
            $("#defaultSaturday").val(response["shifts"][0]["saturday"]);
            $("#comment").html(response["shifts"][0]["comment"]);
        }
        jQuery.each(response["hours"], function(i){
            if(response["shifts"][0] != null){
                if(response["shifts"][0]["sunday"] != response["hours"][i]["shiftHours"]){
                    $("#sunday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
                }
                if(response["shifts"][0]["monday"] != response["hours"][i]["shiftHours"]){
                    $("#monday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
                }
                if(response["shifts"][0]["tuesday"] != response["hours"][i]["shiftHours"]){
                    $("#tuesday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
                }
                if(response["shifts"][0]["wednesday"] != response["hours"][i]["shiftHours"]){
                    $("#wednesday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
                }
                if(response["shifts"][0]["thursday"] != response["hours"][i]["shiftHours"]){
                    $("#thursday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
                }
                if(response["shifts"][0]["friday"] != response["hours"][i]["shiftHours"]){
                    $("#friday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
                }
                if(response["shifts"][0]["saturday"] != response["hours"][i]["shiftHours"]){
                    $("#saturday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
                }
            }else{
                $("#sunday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
                $("#monday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
                $("#tuesday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
                $("#wednesday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
                $("#thursday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
                $("#friday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
                $("#saturday").append("<option value=" + response["hours"][i]["shiftHours"] + ">" + response["hours"][i]["shiftHours"] + "</option>");
            }
        })
    })
}
// Submit shift event [User]
$("#submitShift").on("click", function(){
    let inputs = $("#shiftForm").find("select,textarea");
    let data = {sunday:inputs[0].value, monday:inputs[1].value, tuesday:inputs[2].value, wednesday:inputs[3].value, thursday:inputs[4].value, friday:inputs[5].value, saturday:inputs[6].value, comment:inputs[7].value};
    $.ajax({
        url: "userControler.php",
        type: "POST",
        data: { "shifts": data }
    })
    .done(function(response){
        $("#goodMessage").html(response["goodMessage"]);
        $("#badMessage").html(response["badMessage"]);
        $("#tableDiv").load('userSchedule.php');
        setTimeout(function(){
            $('#goodMessage').html("");
            $('#badMessage').html("");
        }, 4000)
        $.ajax({
            url: "updateSiduration.php"
        })
    })
    
})
// Logout function
$("#logOut").on("click", function(){
    $.ajax({
        url: "userControler.php",
        type: "POST",
        data: { "logout": true }
    })
    .done(function(){
        $(location).attr("href", "index.php");
    }) 
})
// Login redirect [Index]
$("#login").on("click", function(e){
    e.preventDefault();
    let data = $("#loginForm").serialize();
    $.ajax({
        url: "indexControler.php",
        type: "POST",
        data: data
    })
    .done(function(response){
        $("#badMessage").html(response.badMessage);
        $(location).attr("href", response.redirect);
        setTimeout(function(){
            $('#badMessage').html("");
        }, 4000)
    })
})