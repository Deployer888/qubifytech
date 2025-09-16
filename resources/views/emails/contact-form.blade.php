<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        .content {
            padding: 30px;
        }
        .field {
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }
        .field-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 5px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .field-value {
            color: #212529;
            font-size: 16px;
        }
        .message-field {
            background: #fff3cd;
            border-left-color: #ffc107;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }
        .timestamp {
            background: #e9ecef;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 14px;
            color: #495057;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="color:#000">🚀 New Contact Form Submission</h1>
            <p style="margin: 10px 0 0 0; opacity: 0.9; color:#000">Someone is interested in Qubify's services!</p>
        </div>
        
        <div class="content">
            <div class="timestamp">
                <strong>Received:</strong> {{ now()->format('F j, Y \a\t g:i A') }}
            </div>

            <div class="field">
                <div class="field-label">👤 Full Name</div>
                <div class="field-value">{{ $formData['fullName'] }}</div>
            </div>

            <div class="field">
                <div class="field-label">✉️ Email Address</div>
                <div class="field-value">
                    <a href="mailto:{{ $formData['email'] }}" style="color: #667eea; text-decoration: none;">
                        {{ $formData['email'] }}
                    </a>
                </div>
            </div>

            @if(!empty($formData['phone']))
            <div class="field">
                <div class="field-label">📞 Phone Number</div>
                <div class="field-value">
                    <a href="tel:{{ $formData['phone'] }}" style="color: #667eea; text-decoration: none;">
                        {{ $formData['phone'] }}
                    </a>
                </div>
            </div>
            @endif

            @if(!empty($formData['solution']))
            <div class="field">
                <div class="field-label">🛠️ Interested Solution</div>
                <div class="field-value">
                    @switch($formData['solution'])
                        @case('hrms')
                            Human Resource Management System
                            @break
                        @case('vms')
                            Visitor Management System
                            @break
                        @case('crm')
                            Customer Relationship Management
                            @break
                        @case('vts')
                            Vehicle Tracking System
                            @break
                        @case('vps')
                            Vehicle Parking System
                            @break
                        @case('his')
                            Hospital Information System
                            @break
                        @case('pos')
                            Point of Sale
                            @break
                        @case('custom')
                            Custom Solutions
                            @break
                        @default
                            {{ $formData['solution'] }}
                    @endswitch
                </div>
            </div>
            @endif

            @if(!empty($formData['budget']))
            <div class="field">
                <div class="field-label">💰 Budget Range</div>
                <div class="field-value">
                    @switch($formData['budget'])
                        @case('under-50k')
                            Less than Rs. 50,000
                            @break
                        @case('50k-2.5l')
                            Rs. 50,000 - Rs. 2.5 lakh
                            @break
                        @case('2.5l-5l')
                            Rs. 2.5 lakh - Rs. 5 lakh
                            @break
                        @case('above-5l')
                            Rs. 5 lakh +
                            @break
                        @default
                            {{ $formData['budget'] }}
                    @endswitch
                </div>
            </div>
            @endif

            <div class="field message-field">
                <div class="field-label">💬 Message</div>
                <div class="field-value">{{ nl2br(e($formData['message'])) }}</div>
            </div>
        </div>

        <div class="footer">
            <p><strong>Action Required:</strong> Please respond to this inquiry within 24 hours.</p>
            <p style="margin: 5px 0 0 0;">This email was sent from the Qubify contact form.</p>
        </div>
    </div>
</body>
</html>