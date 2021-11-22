$(start);

function start(){
    $("table").load("carList.php");
    $("button").on("click",filtered);
}

function filtered(){
   $("table").load("carList.php?MaxPrice="+$("#maxPrice").val());
}