<?php

/*

Thank you for purchasing FormToEmail-Pro by FormToEmail.com

Version 2.4 April 14th 2008

COPYRIGHT FormToEmail.com 2006 - 2008 - All rights reserved.

You may not distribute the script.  You are not permitted to post this code in a public place, such as a forum for example.  A single license entitles you to use this script on one website only.  A multiple license entitles you to use this script on any number of sites owned or maintained by you.

For support, please visit: http://formtoemail.com/support/

DESCRIPTION
-----------

FormToEmail-Pro is a form processing script written in PHP. It allows you to place a form on your website which your visitors can fill out and send to you.  The contents of the form are sent to the email address (or addresses) which you specify below.  The form (code supplied below) allows your visitors to enter their name, email address and comments.  You can add additional fields to the form or use the script to process any other form, see below.

The script is very secure.  Your visitors (and spambots) cannot see your email address.  The script cannot be hijacked by spammers for using as a relay to send spam from.  It has a number of features to combat contact-form spam.

When the form is sent, your visitor will get a confirmation of this on the screen, and will be given a link to continue to your homepage (or other page if you specify it).  Alternatively they can be automatically redirected to a "thank you" page, or any page of your choosing.  You can also configure the script to send an autoresponse email to the enquirer.

You can make required fields.  This is optional and you can choose which fields on your form you would like to require, if any.

You can choose to have the sender's IP address shown in the email you receive.  You can also ban specific IP addresses (or classes) from using your form.  You can also have the script check for the existence of a cookie, along with other features that you can enable below.

You can add additional fields to your form, which this script will also process without making any additional changes to the script.  You can also use it to process your own forms, if doing so, make sure your form action is correct, like so: <form action="formtoemailpro.php" etc>.  The script will handle the "POST" or "GET" methods.  It will also handle multiple select inputs and multiple check box inputs.  If using these, you must name the field as an array using square brackets, like so: <select name="fruit[]" multiple>.  The same goes for check boxes if you are using more than one with the same name, like so: <input type="checkbox" name="fruit[]" value="apple">Apple<input type="checkbox" name="fruit[]" value="orange">Orange<input type="checkbox" name="fruit[]" value="banana">Banana

** PLEASE NOTE **  If you are using the script to process your own forms (or older FormToEmail forms) you must ensure that the email field is named correctly in your form, thus: <input type="text" name="email" etc>.  Note the lower case "email".  If you don't do this, you won't be able to see who the email is from and the script won't be able to check the validity of the email.  If you are using the form code below, you don't need to check for this.

The script will handle file uploads of any file type and send them as attachments to the email that is sent to you or upload them to your server.  There is no limit to the number of files you can upload.  To allow your form to uploaded files, you must put this enctype="multipart/form-data" in the form action and use the "post" method, like so: <form action="formtoemailpro.php" method="post" enctype="multipart/form-data">.  You must also use a file input <input type="file" name="whatever"> on your form, one for each file you wish the visitor to upload.  Give each one a different name.  You do not need to make any configuration changes to the script to allow file uploads, they will be detected automatically.  If you wish to save the uploaded files to your server instead of sending them as attachments then you must enable this in the configuration options below.

You have the option of enabling the identiPIC photo CAPTCHA system.  To use this, you must have the correct code on your form, which you can get below.  You must also upload the correct images to your webspace in the same directory(folder) as the webpage containing your form.  The images supplied with this download will work with the code shown below.  See http://identipic.com for more information on this system.

You can have the script output the email in HTML format, see the configuration options below.  This displays the output in a table with different colored columns and bold fonts, all of which can be customized below.  This is very easy on the eye and makes the output easier to read.

You also have the option of writing the submitted form data to a CSV file.  See the configuration options below for more information.

This is a PHP script.  In order for it to run, you must have PHP (version 4.1.0 or later) on your webhosting account, and have the PHP mail() function enabled and working.  If you are not sure about this, please ask your webhost about it.

SETUP INSTRUCTIONS
------------------

Step 1: Put the form on your webpage
Step 2: Enter your email address
Step 3: Configure the script (optional)
Step 4: Upload the files to your webspace

Step 1:
-------

Put the form on your webpage (if not using your own form).

Copy the appropriate form code below and paste it into your webpage.  You have three code options here:

1. Code for the standard form
2. Code for the standard form with the identiPIC photo CAPTCHA system enabled
3. Code for the identiPIC photo CAPTCHA system alone for pasting into your own form

1. Code for the standard form

Copy the code below as it is, and paste it into your webpage:

<form action="formtoemailpro.php" method="post">
<table border="0" bgcolor="#ececec" cellspacing="5">
<tr><td>Name</td><td><input type="text" size="30" name="name"></td></tr>
<tr><td>Email</td><td><input type="text" size="30" name="email"></td></tr>
<tr><td valign="top">Comments</td><td><textarea name="comments" rows="6" cols="30"></textarea></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" value="Send"></td></tr>
</table>
</form>

2. Code for the standard form with the identiPIC photo CAPTCHA system enabled

Copy the code below as it is, and paste it into your webpage:

<form action="formtoemailpro.php" method="post">
<table border="0" bgcolor="#ececec" cellspacing="5">
<tr><td>Name</td><td><input type="text" size="30" name="name"></td></tr>
<tr><td>Email</td><td><input type="text" size="30" name="email"></td></tr>
<tr><td valign="top">Comments</td><td><textarea name="comments" rows="6" cols="30"></textarea></td></tr>
<tr><td>&nbsp;</td><td>
<table border="0">
<tr><td colspan="3">Security test.  Please identify the pictures:</td></tr>
<tr><td><img src="identiPIC_1.jpg" alt=""></td><td><img src="identiPIC_2.jpg" alt=""></td><td><img src="identiPIC_3.jpg" alt=""></td></tr>
<tr><td>
<select name="identiPIC_selected[1]">
<option value="">Click to identify</option>
<option>Apple</option>
<option>Cat</option>
<option>Clock</option>
<option>Dog</option>
<option>Flower</option>
<option>Fork</option>
<option>Hammer</option>
<option>Key</option>
<option>Ship</option>
<option>Tree</option>
</select></td><td>

<select name="identiPIC_selected[2]">
<option value="">Click to identify</option>
<option>Apple</option>
<option>Cat</option>
<option>Clock</option>
<option>Dog</option>
<option>Flower</option>
<option>Fork</option>
<option>Hammer</option>
<option>Key</option>
<option>Ship</option>
<option>Tree</option>
</select></td><td>

<select name="identiPIC_selected[3]">
<option value="">Click to identify</option>
<option>Apple</option>
<option>Cat</option>
<option>Clock</option>
<option>Dog</option>
<option>Flower</option>
<option>Fork</option>
<option>Hammer</option>
<option>Key</option>
<option>Ship</option>
<option>Tree</option>
</select></td></tr></table></td></tr>

<tr><td>&nbsp;</td><td><input type="submit" value="Send"></td></tr>
</table>
</form>

3. Code for the identiPIC photo CAPTCHA system alone for pasting into your own form

Copy the code below as it is, and paste it into your webpage:

<table border="0">
<tr><td colspan="3">Security test.  Please identify the pictures:</td></tr>
<tr><td><img src="identiPIC_1.jpg" alt=""></td><td><img src="identiPIC_2.jpg" alt=""></td><td><img src="identiPIC_3.jpg" alt=""></td></tr>
<tr><td>
<select name="identiPIC_selected[1]">
<option value="">Click to identify</option>
<option>Apple</option>
<option>Cat</option>
<option>Clock</option>
<option>Dog</option>
<option>Flower</option>
<option>Fork</option>
<option>Hammer</option>
<option>Key</option>
<option>Ship</option>
<option>Tree</option>
</select></td><td>

<select name="identiPIC_selected[2]">
<option value="">Click to identify</option>
<option>Apple</option>
<option>Cat</option>
<option>Clock</option>
<option>Dog</option>
<option>Flower</option>
<option>Fork</option>
<option>Hammer</option>
<option>Key</option>
<option>Ship</option>
<option>Tree</option>
</select></td><td>

<select name="identiPIC_selected[3]">
<option value="">Click to identify</option>
<option>Apple</option>
<option>Cat</option>
<option>Clock</option>
<option>Dog</option>
<option>Flower</option>
<option>Fork</option>
<option>Hammer</option>
<option>Key</option>
<option>Ship</option>
<option>Tree</option>
</select></td></tr></table>

Step 2:
-------

Enter your email address.

Enter the email address below to send the contents of the form to.  If desired, you can enter more than one email address separated by commas, like so: $my_email = "bob@example.com,sales@example.co.uk,jane@example.com";

*/

$my_email = "axnewton@callsynergy.com";

/*

The script will now work.  Everything below this line is optional.  If you wish, you can now proceed to Step 4 (Upload the files to your webspace).

Step 3:
-------

Configure the script (optional).

You can edit these options at any time.  If you do so, remember to save the file and upload it to your webspace.

Bcc email addresses.  The script can send a Blind Carbon Copy (BCC) of the email to the address(es) specified below.  Enter the address(es) between the quotes below, like this for example: $bcc = "support@example.com,mail@example.com";

*/

$bcc = "";

/*

Subject line.  The default subject line for the email that is sent to you, is shown below.  To change this, enter your own subject between the quotes.  Make sure that you use a subject that will get past any spam filters you might use.

*/

$subject = "Comments from contact form";

/*

Continue link.  You have the option of presenting your visitor with a standard "thank you" message or automatically redirecting them to a "thank you" page (or any page of your choosing) after they have submitted the form.  The default is the standard "thank you" message.  If you are using the standard "thank you" message, they will be provided with a "continue" link to your homepage (or any page of your choosing) after submitting the form, which they can click on to continue.  Enter the continue link to offer the user.  If you do not change this, your visitor will be given a continue link to your homepage.  If you are using the automatic redirect option below, the $continue value is ignored.

If you do change it, remove the "/" symbol below and replace it with the address of the page to link to, eg: "mypage.htm" or "http://www.elsewhere.com/page.htm"

*/

$continue = "/";

/*

Automatic redirect.  If you would like the visitor to be automatically redirected to another page (or site) when they submit the form (as opposed to getting the standard "thank you" message) change the value below to 1, like so: $auto_redirect = 1;

*/

$auto_redirect = 0;

/*

Enter the web address of the page that you would like the visitor to be automatically redirected to (between the quotes below).  You only need to do this if you have enabled the auto redirect above.  You can redirect them to any page on any site, it doesn't have to be a page on your own site.  It is advisable to write the full URL like so: $redirect_url = "http://example.com/thankyou.htm";

*/

$redirect_url = "";

/*

Required fields.  You can choose to require specific fields on your form.  If these are empty when the form is submitted the user will be issued with a message to go back and enter a value.  The form will not be sent until the required fields are filled out.  If you do not enable required fields, the script will still issue an error if all fields are blank, and will not send an email.  To enable checking for required fields, change the value below to 1, like so: $required_fields_check = 1;

*/

$required_fields_check = 0;

/*

Specify which fields to require.  You only need to do this if you have enabled the checking for required fields above.  Enter the name of the field in quotes.  If you wish to require more than one field, separate them with commas.  Like this for example: $required_fields = array('name','comments');  The field name must be exactly as it appears on the form.  For example if you have this on your form: <input type="text" name="Zip_Code"> and you want to require the name and zip code you would do this: $required_fields = array('name','Zip_Code');  Please note, if you are using an array for an input name (e.g name="product[]") and you wish to make this a required field, enter the name below without the square brackets like so ('product').  The standard form has the three fields shown below.  If you have not enabled checking for required fields you can leave the line below as it is, as it will be ignored.

*/

$required_fields = array('name','email','comments');

/*

IP address display.  If you enable this, the email sent to you will have the sender's IP address shown at the bottom.  To enable it, change the value to 1, like so: $show_ip = 1;

*/

$show_ip = 0;

/*

Check for banned IPs.  You can ban specific IP addresses or IP address classes from using your form.  To enable checking for these, change the value below to 1, like so: $banned_ips_check = 1;

*/

$banned_ips_check = 0;

/*

Banned IPs.  Make a list of the IP addresses (or classes) you would like to ban.  You must enable checking for banned IPs above, for this to work.  Enter the IP address in quotes.  For more than one address, separate them with commas as in this example: $banned_ips = array('44.22.233.21','82.24.56.1','224.130.87.113');

To ban an IP address class, enter the class like so (remembering to put a period at the end): $banned_ips = array('44.','82.24.','224.130.87.');  So looking at the last class in this example, any IP address in the range 224.130.87.0 to 224.130.87.255 will be banned.  In other words, any IP address beginning with 224.130.87. will be banned.

Here's an example of individual IP addresses and an IP class (they all go in the same array): $banned_ips = array('44.22.233.21','224.130.87.113','82.24.');

Please note, the IP addresses and classes shown in the above examples are fictitious.  There is virtually no limit to the number of IP addresses you can list here but the more you have the slower the script will run (as with any script) but you would need to have quite a large list to notice any difference.

*/

$banned_ips = array();

/*

Banned IP message.  If the form is submitted from a banned IP address, the (contents of the form) email will not be sent to you.  The script will issue an error to the user.  You can edit the error message by changing the message between the quotes below.  If you don't want to reveal that the IP address is banned, you could have a message like "An error has occurred.  The form was not sent.".

*/

$banned_ip_message = "Your IP address is banned.  The form was not sent.";

/*

Cookie requirement.  If you enable this the script will first check for the existence of a cookie.  If the cookie does not exist, the script will exit, an error message will be issued and the email will not be sent.  This is a very useful feature as it will block some spam bots.  If this is enabled, the user (your website visitor) must have cookies enabled on their browser.  To use this feature you must set a cookie on the page that the form is on.  If it is on an HTML page you can set the cookie by putting this line in the <head></head> section: <meta http-equiv="Set-Cookie" content="formtoemailpro=1">

If the form is on a PHP page, you can set the cookie by entering this code on the page (before any output - usually near the top): setcookie('formtoemailpro',1);

To require a cookie, change the value to 1, like so: $require_cookie = 1;

*/

$require_cookie = 0;

/*

Referrer check.  By default the script will check for a referrer (referer) header to establish that the form is being submitted from your site.  To disable this, change the value to 0, like so: $check_referrer = 0;

*/

$check_referrer = 1;

/*

Word block.  You can block any word (rude or otherwise) character, string or phrase from being submitted.  If such an instance is detected the script will issue an error and the email will not be sent.  The script performs this check by default and checks all fields for these words.  To disable it, change the value below to 0, like so: $word_block = 0;

*/

$word_block = 1;

/*

Blocked words.  This is a list of words or characters that will be checked for if word block is enabled above.  You can add or remove words from the array below.  You can enter a single character or a string of characters or words (it is not case-sensitive).  Place each word (or phrase) in quotes and separate them with commas.  By default the script will not allow web addresses (URLs beginning with http:// or https://) to be posted.  If someone is trying to spam you, you can be fairly certain that they will include a web address in the comments or elsewhere.  If you expect your visitors to enter web addresses, then you should remove 'http://','https://' from the array (or disable word block above).  The line below is only used if word block is enabled, otherwise it is ignored.

*/

$blocked_words = array('http://','https://','viagra');

/*

Gobbledegook check.  You sometimes get spam consisting of gobbledegook characters (Å ð ç etc).  This check will prevent any messages getting through if gobbledegook is found.  This check is done by default.  To disable it, change the value to 0, like so: $gobbledegook_check = 0;

*/

$gobbledegook_check = 1;

/*

identiPIC photo CAPTCHA system.  This is a system whereby the visitor has to identify a picture or pictures on your form to proceed.  This is to stop spam bots.  To use this you need to have the correct code on your form (which you can get above) and you need to upload the images supplied with this download to your webspace in the same directory(folder) as the webpage containing your form.  If enabled, the script will check the input and issue an error if the options selected do not match the solutions (below).  It is advisable to customize this to be unique to you.  See http://identipic.com for more information.  To enable this option, change the value below to 1, like so: $identiPIC_photo_CAPTCHA = 1;

*/

$identiPIC_photo_CAPTCHA = 0;

/*

identiPIC photo CAPTCHA solutions.  If you change a picture on your form and it has a new solution, enter the correct selection option for the picture below.  The option must be written below exactly as it appears on the select option drop-down list for the appropriate picture on the web form.  Use alphanumeric characters (letters and/or numbers) you might get an error otherwise.  Spaces are ok but don't have any at the beginning or end of your words.  Suppose your first picture is a picture of a bicycle, the lines below would look like this:

$identiPIC[1] = "Bicycle";
$identiPIC[2] = "Flower";
$identiPIC[3] = "Fork";

IMPORTANT.  The number of lines must equal the number of identiPIC pictures on your form, otherwise the script will exit.  This is a security measure.  You can have as many pictures as you wish but there must be an accompanying solution for each one below and an accompanying drop-down list on your form, containing the correct solution.  So if (for example) you were to add an identiPIC picture of a ship to your form, making four pictures on your form, the lines would look like this:

$identiPIC[1] = "Apple";
$identiPIC[2] = "Flower";
$identiPIC[3] = "Fork";
$identiPIC[4] = "Ship";

The lines to edit are the lines below here:

*/

$identiPIC[1] = "Apple";
$identiPIC[2] = "Flower";
$identiPIC[3] = "Fork";

/*

HTML formatting.  By default the script will send you an email in plain text but you can choose to have the output sent to you in HTML format.  This presents the output in a table with different colors and bold fonts which makes it very neat and easy to read.  You can customize it below.  Enabling this option also means that the autoresponder email (if enabled) will also be in HTML format.  To enable HTML formatting change the value below to 1, like so: $html_format = 1;

*/

$html_format = 0;

/*

HTML output customizing.  Change the values below, as required, to customize the HTML output.  These values are only used if HTML formatting is enabled above, otherwise they are ignored.  You can use words (red, green) hexidecimal or RGB values for the colors.  The table outputs two columns.  The left one contains the keys (variables from your form fields) and the right one contains the values entered by your visitor.  Try it with the default settings first so you can see what it looks like.  The HTML format uses "old-fashioned" HTML (bgcolor, <font>) because some email readers have difficulty with CSS.

You can also change the font settings for the autoresponder message below (if enabled).

*/

$table_cellpadding = "5";
$table_cellspacing = "1";
$table_background_color = "#000000";
$table_left_column_color = "#ececec";
$table_left_column_font = "arial";
$table_left_column_font_size = "2";
$table_left_column_font_color = "#000000";
$table_right_column_color = "#ffffff";
$table_right_column_font = "arial";
$table_right_column_font_size = "2";
$table_right_column_font_color = "#000000";

$autoresponder_font = "arial";
$autoresponder_font_size = "2";
$autoresponder_font_color = "#000000";

/*

CSV attachment.  You can choose to have the form data included in a CSV (Comma Separated Value) file that is sent as an attachment to the email the script sends (you still get the form data in the email).  The file contains the field names as the header row and the form data as the second row.  The file only contains data from the submitted form and does not accumulate data from all form submissions (see below if you want a CSV file containing all form submissions).  The CSV file can be opened in Excel, for example.  You do not need to make any changes to your form.  To enable this, change the value below to 1, like so: $csv_attachment = 1;

*/

$csv_attachment = 0;

/*

CSV file on server.  If you enable this, all data from submitted forms will be accumulated in a CSV file on your server.  You can then download the file and open it in Excel (for example) and search/sort/manipulate/print the data to suit.  By default the CSV file is kept in the same directory/folder as the script and is named "form_data.csv".  The first line of the file is a header row made up of the field names from your form.  The subsequent rows show the data submitted from your form, one line of data for each form submitted.

*** IMPORTANT ***

For this to work, PHP must have permission to write to the directory where the CSV file will be created and kept (the script creates the file automatically if it does not already exist).  For Unix/Linux type operating systems, set the permissions for the directory to CHMOD 770.  This allows you (the owner) and PHP to write to the directory but does not allow the rest of the world to do so.  You do not need to change permissions for the CSV file itself.

To enable this option, change the value below to 1, like so: $csv_file_on_server = 1;

*/

$csv_file_on_server = 0;

/*

CSV filename.  Enter a filename below for the CSV file or keep the default name as it is.  This name is used for the file that is sent as an attachment and/or the file that is kept on your server.  If you enter a name, put it in quotes like this: $csv_filename = "sales_enquiry.csv";

*/

$csv_filename = "form_data.csv";

/*

Autoresponder.  You can configure the script to send an automated email response to the enquirer.  The message will contain a subject line, a header message, the data from the form submitted and a footer message (signature).  You can also attach a file to it, see below.  Configure the various options in the lines below.

If HTML output is enabled above, then the autoresponse email will also be in HTML format.  It is advisable not to enable HTML output as it can be unpredictable at times with different email applications/readers, and your visitor might not have their system configured to display HTML emails.

By default the script will not issue an autoresponse.  To enable the autoresponder, change the value below to 1, like so: $autoresponder = 1;

*/

$autoresponder = 0;

/*

By default the From: address shown in the autoresponse email will be the email address that is used to send the contents of the form to, and is configured in the $my_email variable above.  You can enter a different From: email address below.  Like this for example: $autoresponder_from = "support@example.com";

*/

$autoresponder_from = "";

/*

Enter a subject line for the autoresponse email below.  Keep it between the quotes.

*/

$autoresponder_subject = "Your enquiry";

/*

Enter a message below, between the quotes, that will be shown at the top of the autoresponse email.

*/

$autoresponder_header_message = "Thank you for your enquiry.  We will get back to you shortly.  The data you submitted is shown below.";

/*

Enter a message (or signature) below, between the quotes, that will be shown at the bottom of the autoresponse email.

*/

$autoresponder_footer_message = "";

/*

Send an attachment with the autoresponder.  You can attach a file to the autoresponse message.  To do so, you need to enable it then enter the information about the file, its name, its location and the filetype in the configuration options below.  To enable a file to be attached to the autoresponse email, change the 0 to 1 below, like this: $autoresponder_attachment = 1; 


*/

$autoresponder_attachment = 0;

/*

Autoresponder attachment file name.  Between the quotes below, enter the name of the file you are attaching, like this for example: $autoresponder_attachment_file = "brochure.doc";


*/

$autoresponder_attachment_file = "";

/*

Autoresponder attachment location.  In the quotes below, enter the location (path) of the file you would like to attach.  It must be the full server path to the file and must have a trailing slash, like this for example: $autoresponder_attachment_path = "/home/username/files/";


*/

$autoresponder_attachment_path = "";

/*

Autoresponder attachment content (MIME) type.  Between the quotes below, enter the file content type.  PHP cannot tell what the content type is, so you must enter it yourself.  These examples are for common content types:

$autoresponder_attachment_content_type = "application/msword";  (Word document .doc)
$autoresponder_attachment_content_type = "application/ms-excel";  (Excel spreadsheet .xls)
$autoresponder_attachment_content_type = "application/pdf";  (Adobe PDF document .pdf)
$autoresponder_attachment_content_type = "image/jpeg";  (JPEG image .jpg .jpeg)

You can get a list of MIME content types here: http://www.utoronto.ca/webdocs/HTMLdocs/Book/Book-3ed/appb/mimetype.html

*/

$autoresponder_attachment_content_type = "";

/*

Ignoring fields.  You might have fields/inputs on your form that you want to ignore, i.e you do not want them sent in the email you receive from the script.  Typically this might be a "submit" input.  If you wish to ignore certain fields, you must enable this option.  To enable it, change the 0 below to 1, like so: $ignore_fields = 1;

*/

$ignore_fields = 0;

/*

In the array below, list the field names that you want to be ignored.  Enter the names EXACTLY as they appear on your form.  An example is shown below.  You can edit it as required but remember to put the values in quotes and separate them with commas.  The array below is ignored if you have not enabled $ignore_fields above.

*/

$fields_to_ignore = array('Submit','submit');

/*

Sort fields.  You can specify the order that your form fields are displayed in the email sent from the script.  To use this option you must enable it then enter the form fields order in the next section below.  To enable it, change the 0 below to 1, like so: $sort_fields = 1;

*/

$sort_fields = 0;

/*

Form fields order.  In the array below ($field_order_keys) you can set the order of your form fields so that they will show in the email in the order that they appear in the array.  You must enable $sort_fields above for this to take effect, otherwise it is ignored.  The array shown below is an example.  Enter your form field names in the array.  Put them in quotes and separate them with commas as in the example below.  You must name the fields EXACTLY as they are named in your form.  ONLY the fields in the array will be shown in the email sent from the script and in the order entered in the array.  If you have an array input field on your form, like fruit[], then enter the name without the square brackets, like so: 'fruit'.

*/

$field_order_keys = array('email','comments','name');

/*

Line spacing.  If you receive your email in plain text, the form data will be shown on separate lines with a space in between them.  This is to make it easy to read.  This is default.  You can change the output so that the data is shown on new lines but without spaces.  To do so, change the value below to 0, like so: $line_spacing = 0;

*/

$line_spacing = 1;

/*

Show blank fields.  By default the script will only return form fields where a value has been entered.  If you would like the script to return all form fields including blanks, then enable $show_blank_fields below.  To enable it, change the 0 to 1 like so:  $show_blank_fields = 1;

*/

$show_blank_fields = 0;

/*

Block file types.  If you are uploading files from your form, you can block certain file types.  To do so, enable this feature then enter the blocked file types in the next option.  To enable this feature, change the 0 below to 1, like so: $block_file_types = 1;

*/

$block_file_types = 0;

/*

File types to block.  List in the array below, the file extensions that you want to block.  If the script detects a file with one of these extensions, it will issue an error and stop processing the form.  Enter file types in lower case, in quotes and separated by commas, like this default setting: $file_types_to_block = array('.com','.bat','.exe');  Note that you must include the dot (period).  You can add or remove file extensions to suit.  This array is ignored if you have not enabled $block_file_types above so it is safe to leave it as it is.  Enter the file type extensions in lower case, ".exe" will block "file.EXE" and "file.exe" for example.

*/

$file_types_to_block = array('.com','.bat','.exe');

/*

Set a maximum file upload size.  You can check the size of uploaded files and reject those that exceed a maximum file size set below.  This feature is Independent of $block_file_types above.  It only requires a value to be set for it to be enabled, otherwise the check is not carried out.  By default the value is empty and the check is not carried out, this is the default setting: $max_file_size = "";  To enable this feature, enter a value between the quotes.  The value is the maximum permitted file size in bytes. 1 Megabyte (MB) = 1048576 Bytes.  Do not enter punctuation in the value.  Here is an example: $max_file_size = "1048576";  This check is independent of the check that PHP makes on your server for the size of uploaded files.

*/

$max_file_size = "";

/*

Upload files to the server.  By default, any files uploaded from your form will be sent as attachments to the email the script sends you.  Alternatively you can upload these files to your server.  Uploaded files will overwrite any existing files of the same name in the same location.  See the section in the description at the top of this script for information about handling file uploads.  To enable uploads to your server, change the 0 to 1 in the line below, like so: $upload_files_to_server = 1;

*/

$upload_files_to_server = 0;

/*

Upload files directory.  By default the uploaded files will go in the same directory/folder that the script is in.  You can instead name a directory on your server where you would like the files to go.  PHP must have permission to write to the directory.  Permissions are down to your server setup but CHMOD 777 will work in every case.  If the directory is above the web root, you will get the file-names-only shown in the email from the script.  If the directory is web-accessable you will get a link to the uploaded file(s) in the email from the script which you can click on to download them.  If using the latter option it is better to enable the HTML output option in the script as it makes displaying the links more predictable (it handles spaces in the file names better).   If you specify a directory below, put it in quotes and include a trailing slash (you must use the full server path), as in this example: $path_to_uploaded_file = "/home/username/uploads/";

*/

$path_to_uploaded_file = dirname(__FILE__) . "/";

/*

Prefix for uploaded file names.  You can specify a prefix for the uploaded files, this is optional.  This will only be applied to files uploaded to your server, not to files sent as attachments.  You can hard-code a prefix or you can use a value from your form.  To hard-code a prefix, put it in quotes like so: $uploaded_file_prefix = "user_file_";  This prefix name will be applied to EVERY file uploaded.  You might find it useful to prefix the file name with the user's name.  You can do so like this: $uploaded_file_prefix = $_REQUEST['name'];  This assumes that the name input on your form is "name", otherwise change it to suit.  You can prefix it with any value from your form, just change 'name' in this example with the name of the field from your form.  To make the file name more readable, you can put an underscore after the prefix like so: $uploaded_file_prefix = $_REQUEST['name'] . "_";  You can use more than one form value and separate them with underscores like so: $uploaded_file_prefix = $_REQUEST['firstname'] . "_" . $_REQUEST['lastname'];  (The example assumes you have the inputs "firstname" and "lastname" on your form).

*/

$uploaded_file_prefix = "";

/*

End of configuration options.

Step 4:
-------

Upload the files to your webspace.

Save this file (formtoemailpro.php) and upload it together with your webpage (containing the form) to your webspace.  If you are using your own form, remember to change the form action to formtoemailpro.php - <form action="formtoemailpro.php" etc>.  Put the files in the same directory (folder).  You do not need to set permissions for the script.  IMPORTANT - The file name is case sensitive!  You must save it exactly as it is named above.

THAT'S IT, FINISHED!

You do not need to make any changes below this line.

*/

$errors = array();

// Remove $_COOKIE elements from $_REQUEST.

if(count($_COOKIE)){foreach(array_keys($_COOKIE) as $value){unset($_REQUEST[$value]);}}

// Remove ignored fields from $_REQUEST.

if($ignore_fields)
{
	
foreach($fields_to_ignore as $value){if(isset($_REQUEST[$value])){unset($_REQUEST[$value]);}}

}

// Check all fields for an email header.

function recursive_array_check_header($element_value)
{

global $set;

if(!is_array($element_value)){if(preg_match("/(%0A|%0D|\n+|\r+)(content-type:|to:|cc:|bcc:)/i",$element_value)){$set = 1;}}
else
{

foreach($element_value as $value){if($set){break;} recursive_array_check_header($value);}

}

}

recursive_array_check_header($_REQUEST);

if($set){$errors[] = "You cannot send an email header";}

unset($set);

// Validate email field.

if(isset($_REQUEST['email']) && !empty($_REQUEST['email']))
{

if(preg_match("/(%0A|%0D|\n+|\r+|:)/i",$_REQUEST['email'])){$errors[] = "Email address may not contain a new line or a colon";}

$_REQUEST['email'] = trim($_REQUEST['email']);

if(substr_count($_REQUEST['email'],"@") != 1 || stristr($_REQUEST['email']," ")){$errors[] = "Email address is invalid";}else{$exploded_email = explode("@",$_REQUEST['email']);if(empty($exploded_email[0]) || strlen($exploded_email[0]) > 64 || empty($exploded_email[1])){$errors[] = "Email address is invalid";}else{if(substr_count($exploded_email[1],".") == 0){$errors[] = "Email address is invalid";}else{$exploded_domain = explode(".",$exploded_email[1]);if(in_array("",$exploded_domain)){$errors[] = "Email address is invalid";}else{foreach($exploded_domain as $value){if(strlen($value) > 63 || !preg_match('/^[a-z0-9-]+$/i',$value)){$errors[] = "Email address is invalid"; break;}}}}}}

}

// Test for cookie.

if($require_cookie)
{

if(!isset($_COOKIE['formtoemailpro'])){$errors[] = "You must enable cookies to use the form";}

}

// Check referrer.

if($check_referrer)
{

if(!(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) && stristr($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST']))){$errors[] = "You must enable referrer logging to use the form";}

}

// Check identiPIC photo CAPTCHA.

if($identiPIC_photo_CAPTCHA)
{

// Give an error if $_REQUEST['identiPIC_selected'] is not set, a bot might not send it.  If set then give an error if it is not identical to the $identiPIC array.

if(!isset($_REQUEST['identiPIC_selected'])){$errors[] = "You have failed to identify the pictures correctly.  Please try again.";}else{if($_REQUEST['identiPIC_selected'] !== $identiPIC){$errors[] = "You have failed to identify the pictures correctly.  Please try again.";} unset($_REQUEST['identiPIC_selected']);}

}

// Check for required fields.  If none, don't allow blank form to be sent.

if($required_fields_check)
{

foreach($required_fields as $value){if((!isset($_REQUEST[$value]) || empty($_REQUEST[$value])) && (!isset($_FILES[$value]['name']) || empty($_FILES[$value]['name']))){$errors[] = "Please go back and complete the $value field";}}

}else{

// Check for a blank form.

function recursive_array_check_blank($element_value)
{

global $set;

if(!is_array($element_value)){if(!empty($element_value)){$set = 1;}}
else
{

foreach($element_value as $value){if($set){break;} recursive_array_check_blank($value);}

}

}

recursive_array_check_blank($_REQUEST);

if(!$set){$errors[] = "You cannot send a blank form";}

unset($set);

}

// Check for banned IPs.

if($banned_ips_check)
{

foreach($banned_ips as $value)
{

if($value == substr($_SERVER[REMOTE_ADDR], 0, strlen($value))){$errors[] = $banned_ip_message; break;}

}

}

// Check all fields for gobbledegook.

if($gobbledegook_check)
{

$gobbledegook_alphabet = array('¡','¢','¤','¦','§','¨','ª','«','¬','®','¯','°','±','²','³','µ','¶','·','¸','¹','º','»','¼','½','¾','¿','À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','×','Ø','Ù','Ú','Û','Ü','Ý','Þ','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ð','ñ','ó','õ','ö','÷','ø','ú','û','ü','ý','þ');

function recursive_array_check_gobbledegook($element_value,$inkey = "")
{

global $set;
global $gobbledegook_alphabet;
global $return_value;
global $return_key;

if(!is_array($element_value))
{

foreach($gobbledegook_alphabet as $value){if(stristr($element_value,$value)){$set = 1; $return_value = $value; $return_key = $inkey; break;}}

}else{

foreach($element_value as $key => $value){if($set){break;} recursive_array_check_gobbledegook($value,$key);}

}

}

recursive_array_check_gobbledegook($_REQUEST);

if($set){if(is_numeric($return_key)){$errors[] = "You have entered an invalid character ($return_value)";}else{$errors[] = "You have entered an invalid character ($return_value) in the \"$return_key\" field";}}

unset($set);
unset($return_value);
unset($return_key);

}

// Check for blocked words/web addresses.

if($word_block)
{

function recursive_array_check_word_block($element_value,$inkey = "")
{

global $set;
global $blocked_words;
global $return_value;
global $return_key;

if(!is_array($element_value))
{

foreach($blocked_words as $value){if(stristr($element_value,$value)){$set = 1; $return_value = $value; $return_key = $inkey; break;}}

}else{

foreach($element_value as $key => $value){if($set){break;} recursive_array_check_word_block($value,$key);}

}

}

recursive_array_check_word_block($_REQUEST);

if($set){if(is_numeric($return_key)){$errors[] = "You have entered an invalid string ($return_value)";}else{$errors[] = "You have entered an invalid string ($return_value) in the \"$return_key\" field";}}

unset($set);
unset($return_value);
unset($return_key);

}

// Check for blocked file types and check file size.

if(count($_FILES))
{
	
if($block_file_types)
{

foreach(array_keys($_FILES) as $value)
{
	
if(!empty($_FILES[$value]['name']))
{
	
foreach($file_types_to_block as $value2){if(strtolower(strrchr($_FILES[$value]['name'],".")) == $value2){$errors[] = "{$value2} file types are not permitted.  The file \"{$_FILES[$value]['name']}\" cannot be uploaded.";}}

}

}

}

if($max_file_size)
{

foreach(array_keys($_FILES) as $value)
{
	
if(!empty($_FILES[$value]['size'])){if($_FILES[$value]['size'] > $max_file_size){$errors[] = "File \"{$_FILES[$value]['name']}\" exceeds the maximum file size of {$max_file_size} bytes.";}}

}

}

}

// Display any errors and exit if errors exist.

if(count($errors)){foreach($errors as $value){print "$value<br>";} exit;}

if(!defined("PHP_EOL")){define("PHP_EOL", strtoupper(substr(PHP_OS,0,3) == "WIN") ? "\r\n" : "\n");}

if($line_spacing){$line_space = PHP_EOL.PHP_EOL;}else{$line_space = PHP_EOL;}

// HTML format the output.

if($html_format)
{

// Allow posted HTML code to be displayed (and not executed).  Convenient time to do nl2br.

function recursive_array_check_HTML(&$element_value)
{

if(!is_array($element_value)){$element_value = nl2br(htmlentities($element_value));}
else
{

foreach($element_value as $key => $value){$element_value[$key] = recursive_array_check_HTML($value);}

}

return $element_value;

}

recursive_array_check_HTML($_REQUEST);

$html_open = "<html><head><title>$subject</title></head><body><table cellpadding=\"".$table_cellpadding."\" cellspacing=\"".$table_cellspacing."\" bgcolor=\"".$table_background_color."\">"; $html_close = "</table></body></html>"; $content_type = "html";}else{$html_open = ""; $colon_sep = ": "; $html_close = ""; $content_type = "plain";}

function build_message($request_input)
{

global $colon_sep;
global $html_format;
global $table_left_column_color;
global $table_left_column_font;
global $table_left_column_font_size;
global $table_left_column_font_color;
global $table_right_column_color;
global $table_right_column_font;
global $table_right_column_font_size;
global $table_right_column_font_color;
global $line_space;
global $show_blank_fields;

if(!isset($message_output)){$message_output = "";}if(!is_array($request_input)){$message_output = $request_input;}else{foreach($request_input as $key => $value){if(!empty($value) || $show_blank_fields){if($html_format){if(!is_numeric($key)){$message_output .= "<tr><td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>".str_replace("_"," ",ucfirst($key))."</b></font></td><td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".build_message($value)."</font></td></tr>".PHP_EOL;}else{$message_output .= "<table><tr><td><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".build_message($value)."</font></td></tr></table>";}}else{if(!is_numeric($key)){$message_output .= str_replace("_"," ",ucfirst($key)).$colon_sep.build_message($value).$line_space;}else{$message_output .= build_message($value).", ";}}}}}return rtrim($message_output,", ");

}

if($sort_fields)
{

$ordered_request = array();

foreach($field_order_keys as $value){$ordered_request[$value] = $_REQUEST[$value];}

$_REQUEST = $ordered_request;

}

// Show uploaded files.

if(count($_FILES) && $upload_files_to_server)
{
	
if(substr_count($path_to_uploaded_file,$_SERVER['DOCUMENT_ROOT']))
{
	
$web_location = str_replace($_SERVER['DOCUMENT_ROOT'],"",$path_to_uploaded_file);
	
if($html_format)
{
	
foreach(array_keys($_FILES) as $value){if(!empty($_FILES[$value]['tmp_name'])){$_REQUEST[$value] = "<a href=\"http://".$_SERVER['HTTP_HOST'].$web_location.$uploaded_file_prefix.$_FILES[$value]['name']."\">{$uploaded_file_prefix}{$_FILES[$value]['name']}</a>";}}

}
else
{
	
foreach(array_keys($_FILES) as $value){if(!empty($_FILES[$value]['tmp_name'])){$_REQUEST[$value] = "http://".$_SERVER['HTTP_HOST'].$web_location.$uploaded_file_prefix.$_FILES[$value]['name'];}}

}

}
else
{

foreach(array_keys($_FILES) as $value){if(!empty($_FILES[$value]['tmp_name'])){$_REQUEST[$value] = $uploaded_file_prefix.$_FILES[$value]['name'];}}
	
}

}

// Show sender's IP address.

if($show_ip){$_REQUEST["Sender's IP address"] = $_SERVER[REMOTE_ADDR];}

$message = $html_open;

$message .= build_message($_REQUEST);

$message .= $html_close;

// Strip slashes.

$message = stripslashes($message);

$headers = "From: " . $_REQUEST['email'];
$headers .= PHP_EOL;
$headers .= "Return-Path: " . $_REQUEST['email'];
$headers .= PHP_EOL;
$headers .= "Reply-To: " . $_REQUEST['email'];

if($csv_attachment || $csv_file_on_server)
{

function build_file_data($data_input)
{

if(!isset($file_data)){$file_data = "";}if(!is_array($data_input)){if(stristr($data_input,'"')){$data_input = str_replace('"','""',$data_input);} if(stristr($data_input,'"') || stristr($data_input,",") || stristr($data_input,"\n") || stristr($data_input,"\r\n")){$file_data = "\"$data_input\"";}else{$file_data = $data_input;}}else{foreach($data_input as $key => $value){if(!is_numeric($key)){$file_data .= build_file_data($value).",";}else{$file_data .= build_file_data($value)." :: ";}}}return rtrim(rtrim($file_data,",")," :: ");

}

}

if(count($_FILES) || $csv_attachment)
{

if(count($_FILES))
{
	
if($upload_files_to_server)
{
	
foreach(array_keys($_FILES) as $value){if(!empty($_FILES[$value]['tmp_name'])){move_uploaded_file($_FILES[$value]['tmp_name'], $path_to_uploaded_file.$uploaded_file_prefix.$_FILES[$value]['name']);}}

}
else
{

$attachment_array = array();

foreach(array_keys($_FILES) as $value)
{

if(is_uploaded_file($_FILES[$value]['tmp_name']))
{

$file = fopen($_FILES[$value]['tmp_name'],'rb');
$data = fread($file,filesize($_FILES[$value]['tmp_name']));
fclose($file);
$data = chunk_split(base64_encode($data));

$attachment_array[] = "--boundary_sdfsfsdfs345345sfsgs".PHP_EOL."Content-Type: ".$_FILES[$value]['type'].";".PHP_EOL." name=\"".$_FILES[$value]['name']."\"".PHP_EOL."Content-Disposition: attachment;".PHP_EOL." filename=\"".$_FILES[$value]['name']."\"".PHP_EOL."Content-Transfer-Encoding: base64".PHP_EOL.PHP_EOL.$data.PHP_EOL.PHP_EOL;

}

}

}

}

if(count($attachment_array) || $csv_attachment)
{

$headers .= PHP_EOL;
$headers .= "MIME-Version: 1.0".PHP_EOL;
$headers .= "Content-Type: multipart/mixed;".PHP_EOL;
$headers .= " boundary=\"boundary_sdfsfsdfs345345sfsgs\"";

$body = "";

$body .= "--boundary_sdfsfsdfs345345sfsgs".PHP_EOL;
$body .= "Content-Type: text/".$content_type."; charset=\"iso-8859-1\"".PHP_EOL.PHP_EOL;
$body .= $message.PHP_EOL.PHP_EOL;

if(count($attachment_array)){foreach($attachment_array as $value){$body .= $value;}}

if($csv_attachment)
{

// Comma separate the keys (doesn't need to be recursive).

$data = "";

foreach(array_keys($_REQUEST) as $value){$data .= "$value,";}

// Remove trailing comma.

$data = rtrim($data,",");

$data .= PHP_EOL;

$data .= stripslashes(build_file_data($_REQUEST));

$body .= "--boundary_sdfsfsdfs345345sfsgs".PHP_EOL."Content-Type: text/plain; charset=\"iso-8859-1\"".PHP_EOL." name=\"$csv_filename\"".PHP_EOL."Content-Disposition: attachment;".PHP_EOL." filename=\"$csv_filename\"".PHP_EOL.PHP_EOL.$data.PHP_EOL.PHP_EOL;

}

$body .= "--boundary_sdfsfsdfs345345sfsgs--";

$message = $body;

}

}

if($html_format && !count($attachment_array) && !$csv_attachment)
{

$headers .= PHP_EOL;
$headers .= "MIME-Version: 1.0".PHP_EOL;
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";

}

if($bcc)
{

$headers .= PHP_EOL;
$headers .= "Bcc: " . $bcc;

}

// Send email.

mail($my_email,$subject,$message,$headers);

// Send autoresponse.

if($autoresponder)
{
	
if($autoresponder_from){$my_email = $autoresponder_from;}
	
$headers = "From: " . $my_email;
$headers .= PHP_EOL;
$headers .= "Return-Path: " . $my_email;
$headers .= PHP_EOL;
$headers .= "Reply-To: " . $my_email;

if($html_format)
{
	
$headers .= PHP_EOL;
$headers .= "MIME-Version: 1.0".PHP_EOL;
$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";

$html_open = "<html><head><title>$autoresponder_subject</title></head><body><p><font face=\"".$autoresponder_font."\" size=\"".$autoresponder_font_size."\" color=\"".$autoresponder_font_color."\">$autoresponder_header_message</font></p><table cellpadding=\"".$table_cellpadding."\" cellspacing=\"".$table_cellspacing."\" bgcolor=\"".$table_background_color."\">"; $html_close = "</table><p><font face=\"".$autoresponder_font."\" size=\"".$autoresponder_font_size."\" color=\"".$autoresponder_font_color."\">$autoresponder_footer_message</font></p></body></html>";

$message = $html_open;

$message .= build_message($_REQUEST);

$message .= $html_close;

}else{$message = $autoresponder_header_message . PHP_EOL.PHP_EOL . build_message($_REQUEST) . $autoresponder_footer_message;}

$message = stripslashes($message);

if($autoresponder_attachment)
{
	
$file = fopen($autoresponder_attachment_path.$autoresponder_attachment_file,'rb');
$data = fread($file,filesize($autoresponder_attachment_path.$autoresponder_attachment_file));
fclose($file);
$data = chunk_split(base64_encode($data));

$headers = "From: " . $my_email;
$headers .= PHP_EOL;
$headers .= "Return-Path: " . $my_email;
$headers .= PHP_EOL;
$headers .= "Reply-To: " . $my_email;

$headers .= PHP_EOL;
$headers .= "MIME-Version: 1.0".PHP_EOL;
$headers .= "Content-Type: multipart/mixed;".PHP_EOL;
$headers .= " boundary=\"boundary_sdfsfsdfs345345sfsgs\"";

$body = "";

$body .= "--boundary_sdfsfsdfs345345sfsgs".PHP_EOL;
$body .= "Content-Type: text/".$content_type."; charset=\"iso-8859-1\"".PHP_EOL.PHP_EOL;
$body .= $message.PHP_EOL.PHP_EOL;
$body .= "--boundary_sdfsfsdfs345345sfsgs".PHP_EOL."Content-Type: ".$autoresponder_attachment_content_type.";".PHP_EOL." name=\"".$autoresponder_attachment_file."\"".PHP_EOL."Content-Disposition: attachment;".PHP_EOL." filename=\"".$autoresponder_attachment_file."\"".PHP_EOL."Content-Transfer-Encoding: base64".PHP_EOL.PHP_EOL.$data.PHP_EOL.PHP_EOL;

$body .= "--boundary_sdfsfsdfs345345sfsgs--";

$message = $body;

}

mail($_REQUEST['email'],$autoresponder_subject,$message,$headers);

}

// Write to CSV file.

if($csv_file_on_server)
{

$path_to_file = dirname(__FILE__) . "/";

// If file does not exist, create it and write header row.

if(!file_exists($path_to_file.$csv_filename))
{

$data = "";

foreach(array_keys($_REQUEST) as $value){$data .= "$value,";}

// Remove trailing comma.

$data = rtrim($data,",");

$data .= "\r\n";

$handle = fopen($path_to_file.$csv_filename, "a");

fwrite($handle,$data);

fclose($handle);

}

// Write data row.

$data = "";

$data .= stripslashes(build_file_data($_REQUEST));

$data .= "\r\n";

$handle = fopen($path_to_file.$csv_filename, "a");

fwrite($handle,$data);

fclose($handle);

}

// Redirect or display "thank you" message.

if($auto_redirect){header("location: $redirect_url"); exit;}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

<head>
<title>Thank You</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#ffffff" text="#000000">

<div>
<center>
<b>Thank you <?php print stripslashes($_REQUEST['name']); ?></b>
<br>Your message has been sent
<p><a href="<?php print $continue; ?>">Click here to continue</a></p>
</center>
</div>

</body>
</html>