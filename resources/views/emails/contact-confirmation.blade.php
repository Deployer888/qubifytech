<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for contacting Qubify</title>
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
            padding: 40px 30px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 600;
        }
        .header p {
            margin: 10px 0 0 0;
            opacity: 0.9;
            font-size: 16px;
        }
        .content {
            padding: 40px 30px;
        }
        .greeting {
            font-size: 18px;
            color: #495057;
            margin-bottom: 25px;
        }
        .message {
            font-size: 16px;
            color: #6c757d;
            margin-bottom: 25px;
        }
        .info-box {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            border-left: 4px solid #28a745;
        }
        .info-box h3 {
            margin: 0 0 10px 0;
            color: #495057;
            font-size: 16px;
        }
        .info-box p {
            margin: 0;
            color: #6c757d;
        }
        .next-steps {
            background: #fff3cd;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            border-left: 4px solid #ffc107;
        }
        .next-steps h3 {
            margin: 0 0 15px 0;
            color: #856404;
            font-size: 16px;
        }
        .next-steps ul {
            margin: 0;
            padding-left: 20px;
            color: #856404;
        }
        .next-steps li {
            margin-bottom: 8px;
        }
        .contact-info {
            background: #e7f3ff;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            border-left: 4px solid #007bff;
        }
        .contact-info h3 {
            margin: 0 0 15px 0;
            color: #084298;
            font-size: 16px;
        }
        .contact-detail {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            color: #084298;
        }
        .contact-detail:last-child {
            margin-bottom: 0;
        }
        .contact-detail strong {
            min-width: 80px;
            margin-right: 10px;
        }
        .footer {
            background: #f8f9fa;
            padding: 30px;
            text-align: center;
            color: #6c757d;
        }
        .footer p {
            margin: 5px 0;
        }
        .social-links {
            margin-top: 20px;
        }
        .social-links a {
            display: inline-block;
            margin: 0 10px;
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 style="color:#000">🎉 Thank You, {{ $formData['fullName'] }}!</h1>
            <p style="color:#000">Your message has been received successfully</p>
        </div>
        
        <div class="content">
            <div class="greeting">
                Hello {{ $formData['fullName'] }},
            </div>

            <div class="message">
                Thank you for reaching out to <strong>Qubify</strong>! We've received your inquiry and appreciate your interest in our solutions. 
                Our team is excited to help you achieve your goals with our innovative technology solutions.
            </div>

            <div class="info-box">
                <h3>✅ What happens next?</h3>
                <p>Our team will review your requirements and get back to you within <strong>24 hours</strong> with a personalized response tailored to your needs.</p>
            </div>

            <div class="next-steps">
                <h3>🚀 Here's what you can expect:</h3>
                <ul>
                    <li><strong>Initial Response:</strong> Within 24 hours</li>
                    <li><strong>Requirements Analysis:</strong> We'll discuss your specific needs</li>
                    @if(!empty($formData['solution']))
                    <li><strong>Solution Demo:</strong> Customized demo of our {{ ucfirst($formData['solution']) }} solution</li>
                    @else
                    <li><strong>Solution Consultation:</strong> Free consultation to identify the best solution for you</li>
                    @endif
                    <li><strong>Proposal:</strong> Detailed proposal with timeline and pricing</li>
                </ul>
            </div>

            <div class="contact-info">
                <h3>📞 Need immediate assistance?</h3>
                <div class="contact-detail">
                    <strong>Email:</strong> info@qubifytech.com
                </div>
                <div class="contact-detail">
                    <strong>Phone:</strong> +91 98745 66547
                </div>
                <div class="contact-detail">
                    <strong>Address:</strong> Office no: 242, Tricity Plaza, Panchkula, Haryana
                </div>
                <div class="contact-detail">
                    <strong>Hours:</strong> Monday - Friday: 9:00 AM - 6:00 PM
                </div>
            </div>

            <div class="message">
                We're committed to providing you with the best possible service and look forward to the opportunity to work with you.
            </div>
        </div>

        <div class="footer">
            <p><strong>Best regards,</strong><br>The Qubify Team</p>
            <p style="font-size: 14px; margin-top: 20px;">
                This is an automated confirmation email. Please do not reply to this email.
            </p>
            <div class="social-links">
                <a href="mailto:info@qubifytech.com">Email Us</a>
                <a href="tel:+919874566547">Call Us</a>
            </div>
        </div>
    </div>
</body>
</html>