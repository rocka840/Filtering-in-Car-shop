$(start);

function start(){
    $("table").load("carList.php");
    $("button").on("click",filtered);
}

function filtered(){
    
    if($("#ChoiceOfPrice").val()==0){
        $("table").load("carList.php?MaxPrice="+$("#givenPrice").val());
    } else {
        $("table").load("carList.php?MinPrice="+$("#givenPrice").val());
    }
    
   
}
