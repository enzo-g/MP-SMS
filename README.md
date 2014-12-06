MPsms
=========

MPsms is an add-on that I created to use with MailPoet.

MailPoet is fantastic plugin for Wordpress with which you can manage your newsletter campaigns.

I manage the swimming club website of my hometown and they asked me one day for a tool, that could help us to quickly
reach the adherent of the swimming club when the swimming pool is closed because of an unexpected problem.

So I had the following idea:
* Ask to the adherent for their mobile phone numbers in more of their emails by adding a field in MailPoet list registration.
* Create a list per day of the week, ask to the adherent to register themselves in the list which corresponding to the day of their activities.

So this add-on will use the mobile phone saved in MailPoet table and send a text through an android mobile phone where the android app "sms gateway" is installed.
https://play.google.com/store/apps/details?id=eu.apksoft.android.smsgateway

Current bugs:

* I have to cron the sms sending operation, because I have a timeout problem if a text has to be send to a large number of contacts.
* Line break not supported in sms redaction page.

Detailed Instructions in French to install the add-on available there: http://blog.egautier.net/mailpoet-sms/