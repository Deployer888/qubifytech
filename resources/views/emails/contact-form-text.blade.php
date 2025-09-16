{{-- resources/views/emails/contact-form-text.blade.php --}}
NEW CONTACT FORM SUBMISSION - QUBIFY
=====================================

Received: {{ now()->format('F j, Y \a\t g:i A') }}

CONTACT DETAILS:
---------------
Full Name: {{ $formData['fullName'] }}
Email: {{ $formData['email'] }}
@if(!empty($formData['phone']))
Phone: {{ $formData['phone'] }}
@endif

@if(!empty($formData['solution']))
Interested Solution: 
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
@endif

@if(!empty($formData['budget']))
Budget Range: 
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
@endif

MESSAGE:
--------
{{ $formData['message'] }}

=====================================
Action Required: Please respond to this inquiry within 24 hours.
This email was sent from the Qubify contact form.

{{-- resources/views/emails/contact-confirmation-text.blade.php --}}
THANK YOU FOR CONTACTING QUBIFY!
================================

Hello {{ $formData['fullName'] }},

Thank you for reaching out to Qubify! We've received your inquiry and appreciate your interest in our solutions. Our team is excited to help you achieve your goals with our innovative technology solutions.

WHAT HAPPENS NEXT?
==================
Our team will review your requirements and get back to you within 24 hours with a personalized response tailored to your needs.

HERE'S WHAT YOU CAN EXPECT:
- Initial Response: Within 24 hours
- Requirements Analysis: We'll discuss your specific needs
@if(!empty($formData['solution']))
- Solution Demo: Customized demo of our {{ ucfirst($formData['solution']) }} solution
@else
- Solution Consultation: Free consultation to identify the best solution for you
@endif
- Proposal: Detailed proposal with timeline and pricing

NEED IMMEDIATE ASSISTANCE?
=========================
Email: info@qubifytech.com
Phone: +91 98745 66547
Address: Office no: 242, Tricity Plaza, Panchkula, Haryana
Hours: Monday - Friday: 9:00 AM - 6:00 PM

We're committed to providing you with the best possible service and look forward to the opportunity to work with you.

Best regards,
The Qubify Team

---
This is an automated confirmation email. Please do not reply to this email.