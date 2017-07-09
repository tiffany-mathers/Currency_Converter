<!doctype html>
<html lan="en">
<head>
    <!-- required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-e">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- title -->
    <title>Currency Converter</title>
    
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="../public/js/bootstrap/bootstrap.min.js">
    
    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">
    
</head>
    
<body>
    <?php 
    
        /* function to convert currencies
        * @param $amount The amount of money to be converted
        * @param $from The start currency
        * @param $to The currency to be converted to
        *
        * @return converted amount rounded to nearest hundredth
        */
        function convertCurrency($amount, $from, $to){
            $url = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
            $data = file_get_contents($url);
            preg_match("/<span class=bld>(.*)<\/span>/",$data, $converted);
            $converted = preg_replace("/[^0-9.]/", "", $converted[1]);
            return round($converted, 2);
        }
    ?>

    <h1></h1>
    <section id="header">
        <div id="header-box" class="center">
            <h1>Daily Finance Blog</h1>
        </div>
    </section>
    
    <section id="selection">
        <div id="selection-title">
            <h2>Currency Converter</h2>
        </div>
        <div id="selection-form">
            <form name="main" method="post" action="">
                <table style="width:50%">
                    <tr>
                        <td><h3>From</h3></td>
                        <td><h3>Amount</h3></td>
                        <td><h3>To</h3></td>
                        <td> </td>
                        <td><h3>Amount</h3></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="inital_currency">
                                <option value="USD">US Dollar</option>
                                <option value="EUR">Euro</option>
                                <option value="GBP">GB Pound</option>
                                <option value="AUD">Australian Dollar</option>
                                <option value="JPY">Japan Yen</option>
                                <option value="CHF">Swiss Franc</option>
                                <option value="CAD">Canada Dollar</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" name="amount" step="0.01">
                        </td>
                        <td>
                            <select name="desired_currency">
                                <option value="USD">US Dollar</option>
                                <option value="EUR">Euro</option>
                                <option value="GBP">GB Pound</option>
                                <option value="AUD">Australian Dollar</option>
                                <option value="JPY">Japan Yen</option>
                                <option value="CHF">Swiss Franc</option>
                                <option value="CAD">Canada Dollar</option>
                            </select>
                        </td>
                        <td><input type="submit" name="submitButton" value="Calculate"></td>
                        <td> <?php 
                                if(isset($_POST['submitButton'])) {
                                    // retrieve field data
                                    $from   = $_POST['inital_currency'];
                                    $to     = $_POST['desired_currency'];
                                    $amount = $_POST['amount'];
                                    // calculate conversion
                                    $result = convertCurrency($amount, $from, $to);
                                    //display results
                                    echo "<h4>".$result."</h4>";
                                } 
                             ?>
                        </td>
                    </tr>
                </table>
                
            </form>
        </div>
        
    </section>
    <section id="footer">
        <img class="display" src="pictures/bg2.jpg">
    </section>
</body>

</html>