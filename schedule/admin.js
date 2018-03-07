// DOM Content Loaded [Admin][User]
$(function(){
    // Load the schedule main table [Admin]
    $("#scheduleDivAdmin").load('adminSchedule.php');
    // Load shifts from db [Admin]
    loadShifts();
    // Load users from db [Admin]
    loadUsers();
    // Load current week message from db [Admin]
    getWeekMessage();
    // Load current week message from db [Admin]
    $("#sidurationDivAdmin").load('sidurationAdmin.php');
     // Hide siduration on DOM loaded
    $("#sidurationDivAdmin").css("display", "none");
})
// Load shifts from DB [Admin]
function loadShifts(){
    
    $.ajax({
        url: "adminControler.php",
        type: "POST",
        dataType: "json",
    })
    .done(function(response){
        console.log("DSJASDJKA");
        $("#removeShiftSelect").html("<option>בחר משמרת</option>");
        for(i = 0; i < response.hours.length; i++){
            $("#removeShiftSelect").append("<option value=" + response.hours[i].shiftHours + ">" + response.hours[i].shiftHours + "</option>");
        }
    })
}
// Load users from DB [Admin]
function loadUsers(){
    $.ajax({
        url: "adminControler.php",
        type: "POST",
        dataType: "json",
    })
    .done(function(response){
        $("#removeUserSelect").html("<option>בחר נציג</option>");
        for(i = 0; i < response.users.length; i++){
            $("#removeUserSelect").append("<option value=" + response.users[i].userName + ">" + response.users[i].userName + "</option>");
        }
    })
}
// Remove users event [Admin]
$("#removeUserBtn").on("click", function(){
    let user = $("#removeUserSelect").val();
    $.ajax({
        url: "adminControler.php",
        type: "POST",
        data: { "user":user } 
    })
    .done(function(response){
        $('#removeUserMessageGood').html(response["goodMessage"]);
        $('#removeUserMessageBad').html(response["badMessage"]);
        setTimeout(function(){
            $('#removeUserMessageGood').html("");
            $('#removeUserMessageBad').html("");
        }, 4000)
        loadUsers();
    })
})
// Remove shift hour event [Admin]
$("#removeShiftBtn").on("click", function(){
    let hour = $("#removeShiftSelect").val();
    $.ajax({
        url: "adminControler.php",
        type: "POST",
        data: { "hour":hour } 
    })
    .done(function(response){
        $('#removeShiftMessageGood').html(response["goodMessage"]);
        $('#removeShiftMessageBad').html(response["badMessage"]);
        $("#sidurationDivAdmin").html("<img class='img-fluid rounded mx-auto d-block' src='loading.gif'>");
        setTimeout(function(){
            $('#removeShiftMessageGood').html("");
            $('#removeShiftMessageBad').html("");
            $("#sidurationDivAdmin").load('sidurationAdmin.php');
        }, 4000)
        loadShifts();
        $.ajax({
            url: "updateSiduration.php"
        })
    })
})
// Add shift event [Admin]
$('#addShift').on('submit', function(e){
    e.preventDefault();
    let data = $('#addShift').serialize();
    $.ajax({
        url: "adminControler.php",
        type: "POST",
        dataType: "json",
        data: data
    })
    // Response if shift added or not [Admin]
    .done(function(response){
        $('#addShiftMessageGood').html(response["goodMessage"]);
        $('#addShiftMessageBad').html(response["badMessage"]);
        $("#sidurationDivAdmin").html("<img class='img-fluid rounded mx-auto d-block' src='loading.gif'>");
        setTimeout(function(){
            $('#addShiftMessageGood').html("");
            $('#addShiftMessageBad').html("");
            $("#sidurationDivAdmin").load('sidurationAdmin.php');
        }, 4000)
        loadShifts();
        $.ajax({
            url: "updateSiduration.php"
        })
    })
    $("input[type=text]").val("");
})
// Add user event [Admin]
$('#addUser').on('submit', function(e){
    e.preventDefault();
    let data = $('#addUser').serialize();
    $.ajax({
        url: "adminControler.php",
        type: "POST",
        dataType: "json",
        data: data
    })
    // Response if shift added or not [Admin]
    .done(function(response){
        $('#addUserMessageGood').html(response["goodMessage"]);
        $('#addUserMessageBad').html(response["badMessage"]);
        setTimeout(function(){
            $('#addUserMessageGood').html("");
            $('#addUserMessageBad').html("");
        }, 4000)
        loadShifts();
        loadUsers();
    })
    $("input[type=text]").val("");
})
// Logout function
$("#logOut").on("click", function(){
    $.ajax({
        url: "adminControler.php",
        type: "POST",
        data: {
            "logout": true
        }
    })
    .done(function(){
        $(location).attr("href", "index.php");
    }) 
})
// Get week message
function getWeekMessage(){
    $.ajax({
        url: "adminControler.php",
        type: "POST",
        dataType: "json"
    })
    .done(function(response){
        console.log(response.weekMessage[0].weekMessage)
        $("#weekMessage").text(response.weekMessage[0].weekMessage);
    })
}
// Update week message
$("#addWeekMessage").on("click", function(){
    let weekMessage = $("#weekMessage").val();
    $.ajax({
        url: "adminControler.php",
        type: "POST",
        dataType: "json",
        data: { addWeekMessage: weekMessage }
    })
    .done(function(response){
        $("#weekMessageGood").html(response.goodMessage);
        $("#weekMessageBad").html(response.badMessage);
        setTimeout(function(){
            $("#weekMessageGood").html("");
            $("#weekMessageBad").html("");
        }, 4000)
        getWeekMessage();
    })
})
$("#view").on("click", function(){
    if($("#sidurationDivAdmin").css("display") == "none"){
        $("#scheduleDivAdmin").hide("slow");
        $("#sidurationDivAdmin").show("slow");
    }else{
        $("#sidurationDivAdmin").hide("slow");
        $("#scheduleDivAdmin").show("slow");
    }
})