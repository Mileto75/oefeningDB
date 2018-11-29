$(document).ready(function(){
    $("#logOut").click(function(){
        if(confirm("Log out?"))
        {
            window.location.replace('movies.php?action=logout');
        }
    });
});