<?php

include_once __DIR__ . '/db.php';


try
{
    //Set the response content type to application/json

    header("Content-Type:application/json");
    $resp = '{"ResultCode":0,"ResultDesc":"Confirmation recieved successfully"}';
    //read incoming request
//$data = json_decode(file_get_contents('php://input'), true);
    $postData ="{\"Body\":{\"stkCallback\":{\"MerchantRequestID\":\"19693-8512052-1\",\"CheckoutRequestID\":\"ws_CO_DMZ_153627626_18112018205323694\",\"ResultCode\":0,\"ResultDesc\":\"The service request is processed successfully.\",\"CallbackMetadata\":{\"Item\":[{\"Name\":\"Amount\",\"Value\":1.00},{\"Name\":\"MpesaReceiptNumber\",\"Value\":\"MKI8YO9JOI\"},{\"Name\":\"Balance\"},{\"Name\":\"TransactionDate\",\"Value\":20181118205334},{\"Name\":\"PhoneNumber\",\"Value\":254712761593}]}}}}";





    //log file
    $filePath = "messages.log";
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


        //API URL
        $url = 'http://www.birichi.xyz/mpesa_test/mpesas.php';

        //create a new cURL resource

        //create a new cURL resource
        $ch = curl_init($url);

        //setup request to send json via POST
        $data = array(
            'ResultCodessssssssssss' =>$ResultCode ,
            'ResultMessage' => $ResultMessage,
            'Amount' => $Amount,
            'MpesaReciept' =>$MpesaReciept ,
            'TransactionDatesssssssss' => $TransactionDate,
            'PhoneNumber' => $PhoneNumber
        );
        $payload = json_encode(array("user" => $data), JSON_PRETTY_PRINT);

        //attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        //set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        //return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //execute the POST request
        $result = curl_exec($ch);

        //close cURL resource
        curl_close($ch);


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
   //  $file = fopen($filePath,"a");
   //  //log incoming request
   //  $string = json_encode($postData);
   //  $str = str_replace('\\', '', $string);
   //  fwrite($file,$str);
   //  //	echo json_encode(array('token'=>2), JSON_PRETTY_PRINT);
   //  fwrite($file, $jdata);
   //  fwrite($file,"\r\n");
   //  //log response and close file
   // // fwrite($file,$resp);
   //  fclose($file);
//     if($curl_response){
//     header('Location:http://www.birichi.xyz/form/');
//     exit;
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
