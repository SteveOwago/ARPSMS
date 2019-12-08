<?php

include_once __DIR__ . '/db.php';


try
{
    //Set the response content type to application/json

    header("Content-Type:application/json");
    $resp = '{"ResultCode":0,"ResultDesc":"Confirmation recieved successfully"}';
    //read incoming request

    $postData = file_get_contents('php://input');

    //log file
    $filePath = "messagessssss.log";
    //error log
    $errorLog = "errors.log";
    //Parse payload to json
    $jdata = json_decode($postData,true);
    //perform business operations on $jdata here

    $jdata=json_decode($postData,true);
    echo json_encode($jdata['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'], JSON_PRETTY_PRINT);
    echo "\r\n";
//perform business operations on $jdata here

    $ResultCode= $jdata['Body']['stkCallback']['ResultCode'];
    $ResultMessage= $jdata['Body']['stkCallback']['ResultDesc'];
    $Amount = $jdata['Body']['stkCallback']['CallbackMetadata']['Item'][0]['Value'];
    $MpesaReciept = $jdata['Body']['stkCallback']['CallbackMetadata']['Item'][1]['Value'];
    $TransactionDate = $jdata['Body']['stkCallback']['CallbackMetadata']['Item'][3]['Value'];
    $PhoneNumber = $jdata['Body']['stkCallback']['CallbackMetadata']['Item'][4]['Value'];


    echo("This is the response code: ".$ResultCode. "\r\n");
     echo("This is the response mesaage: ".$ResultMessage. "\r\n");

     echo("This is the amount paid : ".$Amount. "\r\n");
     echo("This is the MpesaReciept Number : ".$MpesaReciept. "\r\n");
     echo("This is the Transaction timestamp: ".$TransactionDate. "\r\n");
     echo("This is the Phone number: ".$PhoneNumber. "\r\n");
       $com = new DbConnect();

        $sqli = "select  count(*) AS num from transaction";
        $sql4 = mysqli_query($com->getDb(),   $sqli );
        $row = mysqli_fetch_assoc($sql4);

        $numUsers = $row['num'];
        echo($numUsers);


        $numUserCount = $numUsers + 1;

        $com = new DbConnect();
        $sql = "insert into transaction(id,ResultCode,ResultMessage,Amount,MpesaReciept, TransactionDate, PhoneNumber) values ('$numUserCount', '$ResultCode','$ResultMessage','$Amount','$MpesaReciept', '$TransactionDate', '$PhoneNumber' ) ";
        $success = mysqli_query($com->getDb(), $sql);

        if($success){
            echo json_encode(array('token'=>1), JSON_PRETTY_PRINT);
        }else{
            echo json_encode(array('token'=>2), JSON_PRETTY_PRINT);
        }

// 	$com = new DbConnect();

// 	$sqli = "select  count(*) AS num from faretransaction";
// 	$sql4 = mysqli_query($com->getDb(),   $sqli );
// 	$row = mysqli_fetch_assoc($sql4);

// 	$numUsers = $row['num'];


// 	$numUserCount = $numUsers + 1;

// 	$com = new DbConnect();
// 	$sql = "insert into faretransaction(id, amount,transactioncode,timestamp, phonenumber , seatnumber, busname) values ('$numUserCount',' $TransAmount', '$uid','$token' ) on duplicate key update token = '$token',id = id ";
// 	$success = mysqli_query($com->getDb(), $sql);

// 	if($success){
// 		echo json_encode(array('token'=>1), JSON_PRETTY_PRINT);
// 	}else{
// 		echo json_encode(array('token'=>2), JSON_PRETTY_PRINT);
// 	}



// capture the phone number, the transaction code and the amount on the transaction table
// the table should have  a field named processed.


    //open text file for logging messages by appending
    $file = fopen($filePath,"a");
    //log incoming request
    $string = json_encode($postData);
    $str = str_replace('\\', '', $string);
    fwrite($file,$str);
    //	echo json_encode(array('token'=>2), JSON_PRETTY_PRINT);
    fwrite($file, $jdata);
    fwrite($file,"\r\n");
    //log response and close file
   // fwrite($file,$resp);
    fclose($file);

// }
} catch (Exception $ex){
    //append exception to errorLog
    $logErr = fopen($errorLog,"a");
    fwrite($logErr, $ex->getMessage());
    fwrite($logErr,"\r\n");
    fclose($logErr);
}
    //echo response
    // echo $resp;
    // echo $ks;
    // echo $ph;
?>
