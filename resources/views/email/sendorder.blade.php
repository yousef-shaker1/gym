<x-mail::message>
# أهلاً بك

مرحباً {{ $customer_name }}،

{{ $section_name }} الان انت مشترك في 
نشكرك على اشتراكك في الجيم الخاص بنا.

<table class="details-table" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
    <tr>
        <td style="padding: 10px; border: 1px solid #ddd;">تاريخ بداية الاشتراك:</td>
        <td style="padding: 10px; border: 1px solid #ddd;">{{ $price }} </td>
    </tr>
    <tr>
        <td style="padding: 10px; border: 1px solid #ddd;">تاريخ نهاية الاشتراك:</td>
        <td style="padding: 10px; border: 1px solid #ddd;">{{ $endDate }}</td>
    </tr>
    <tr>
        <td style="padding: 10px; border: 1px solid #ddd;">السعر:</td>
        <td style="padding: 10px; border: 1px solid #ddd;">{{ $date }} $</td>
    </tr>
</table>

<p style="margin-top: 20px;">
نتطلع لرؤيتك قريباً!
</p>

شكراً,<br>
{{ config('app.name') }}
</x-mail::message>
