<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fare Quote</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        .input-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .quote {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .quote img {
            max-width: 100px;
            float: left;
            margin-right: 20px;
        }
        .quote-details {
            overflow: hidden;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Get Fare Quote</h1>
    <form method="POST">
        <div class="input-group">
            <label for="origin">Origin</label>
            <select id="origin" name="origin" class="js-example-basic-single" required>
                <option value="" disabled selected>Select origin</option>
                <?php foreach ($locations as $location): ?>
                    <option value='<?php echo json_encode($location); ?>'><?php echo $location['display_address']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="input-group">
            <label for="destination">Destination</label>
            <select id="destination" name="destination" class="js-example-basic-single" required>
                <option value="" disabled selected>Select destination</option>
                <?php foreach ($locations as $location): ?>
                    <option value='<?php echo json_encode($location); ?>'><?php echo $location['display_address']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit">Get Quote</button>
    </form>

    <?php if (isset($error)): ?>
        <p><?php echo htmlspecialchars($error); ?></p>
    <?php elseif (isset($quotes)): ?>
        <div class="result">
            <h2>Fare Quotes</h2>
            <?php foreach ($quotes as $quote): ?>
                <div class="quote">
                    <img src="<?php echo htmlspecialchars($quote['vehicle']['image']); ?>" alt="Vehicle Image">
                    <div class="quote-details">
                        <p>Class: <?php echo htmlspecialchars($quote['vehicle']['class']); ?></p>
                        <p>Capacity: <?php echo htmlspecialchars($quote['vehicle']['capacity']); ?></p>
                        <p>Max Luggage: <?php echo htmlspecialchars($quote['vehicle']['maxLuggage']); ?></p>
                        <p>Tags: <?php echo htmlspecialchars($quote['vehicle']['tags']); ?></p>
                        <p>Fare: <?php echo htmlspecialchars($quote['currency_symbol'] . $quote['fare']); ?> <?php echo htmlspecialchars($quote['currency']); ?></p>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
</body>
</html>
