<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        @page { size: A4 portrait; margin: 0; }
        body { 
            font-family: 'Helvetica', 'Arial', sans-serif; 
            margin: 0; padding: 0; color: #1a1a1a;
            background-color: #ffffff;
        }
        
        .receipt-container {
            width: 175mm;
            margin: auto;
            padding: 12mm;
            min-height: 110mm;
            position: relative;
        }

        /* Header Section */
        .header-table { width: 100%; padding-bottom: 10px; }
        .idab-logo { font-size: 34pt; font-weight: bold; margin: 0; line-height: 0.9; }
        .idab-sub { font-size: 8.5pt; text-transform: uppercase; letter-spacing: 0.5px; }
        .address-box { text-align: right; font-size: 9pt; color: #444; }

        .title { 
            text-align: center; 
            font-size: 24pt; 
            font-weight: bold; 
            margin: 20px 0; 
            text-decoration: underline; 
        }

        /* Form Fields */
        .content { margin-top: 10px; }
        .field-row { margin-bottom: 12px; width: 100%; font-size: 13pt; }
        .label { display: inline-block; padding-right: 5px; }
        .value { 
            border-bottom: 1px dotted #000; 
            font-weight: bold; 
            display: inline-block;
            padding: 0 10px;
        }

        /* Total Box & Footer Area */
        .footer-grid { 
            margin-top: 10px; 
            width: 100%; 
            display: table;
        }
        .footer-col { display: table-cell; vertical-align: middle; }

        /* THE TOTAL BOX (As requested) */
        .total-box-container { width: 45%; }
        .total-label { font-size: 16pt; font-weight: bold; display: inline-block; vertical-align: middle; }
        .amount-box { 
            display: inline-block;
            border: 2px solid #000; 
            padding: 8px 20px; 
            font-size: 20pt; 
            font-weight: bold; 
            min-width: 120px;
            text-align: center;
            vertical-align: middle;
            margin-left: 10px;
        }

        .qr-section { width: 20%; text-align: center; }
        .signature-section { width: 35%; text-align: center; }
        .sig-line { border-top: 1px solid #000; width: 100%; margin-top: 40px; padding-top: 5px; font-weight: bold; }
    </style>
</head>
<body>
    @php
        $image_path = public_path('images/logo.png');
        $image_data = base64_encode(file_get_contents($image_path));
    @endphp
<div class="receipt-container">
    <table class="header-table">
        <tr>
            <td style="width:30%">
                <div class="idab-logo"><img src="data:image/jpeg;base64,{{ $image_data }}" width="95"></div>
            </td>
            <td style="width:40%">
                <div class="title">Payment Receipt</div>
            </td>
            <td class="address-box" style="width:30%">
                <strong>RAZZAK PLAZA</strong><br>
                Shahid Tazzuddin Soroni<br>
                Moghbazar Circle, Dhaka-1217
            </td>
        </tr>
    </table>

    <div class="content">
        <div class="field-row">
            <span class="label">Date:</span>
            <span class="value" style="width: 180px;">{{ $payment_date }}</span>
            <span class="label" style="margin-left: 40px;">No.</span>
            <span class="value" style="width: 180px;">{{ $payment_number }}</span>
        </div>

        <div class="field-row">
            <span class="label">Received with thanks from:</span>
            <span class="value" style="width: 380px;">{{ $member_name }}</span>
        </div>

        <div class="field-row">
            <span class="label">Member Name/ID:</span>
            <span class="value" style="width: 425px;">{{ $member_id }}</span>
        </div>

        <div class="field-row">
            <span class="label">For the purpose of:</span>
            <span class="value" style="width: 433px;">{{ $purpose }}</span>
        </div>

        <div class="field-row">
            <span class="label">By Cash/Bank:</span>
            <span class="value" style="width: 200px;">{{ $payment_method }}</span>
            <span class="label" style="margin-left: 20px;">Bank Name:</span>
            <span class="value" style="width: 165px;">IDAB Bank</span>
        </div>

        <div class="field-row">
            <span class="label">Amount in words:</span>
            <span class="value" style="width: 430px; font-size: 11pt;">{{ $amount_words }}</span>
        </div>
    </div>

    <div class="footer-grid">
        <div class="footer-col total-box-container">
            <span class="total-label">Total</span>
            <div class="amount-box">{{ $amount_numeric }}/-</div>
        </div>

        <div class="footer-col qr-section">
            <img src="data:image/png;base64,{{ $qrcode }}" width="85">
            <div class="footer">
                Scan to Verify
            </div>
        </div>

        <!--<div class="footer-col signature-section">-->
        <!--    <div class="sig-line">Director Signature</div>-->
        <!--</div>-->
    </div>

    <div style="margin-top: 30px; text-align: center; font-size: 8pt; color: #777;">
        Transaction ID: {{ $transaction_id }} | Computer Generated Electronic Receipt
    </div>
</div>

</body>
</html>