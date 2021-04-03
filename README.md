# Imaginelabs
## Points Completed

- Contact us, containing the contact us form. All emails
via that form will have to be redirected to the following email address: christophe@imaginelabs.me. The form will ask the user to input the following data:
  First Name
Last Name
Phone Number
Email Address
Description
- A user has the ability to register, log in and log out. Upon registration, a user can specify their country of residence.
- An administrator of this website has the ability to change any user’s country of origin.

## Database
- Database is included in Database folder. We need to create database into the hosting or local setup mentioned same as the wp-config.php file


## Login / Registration Page
- Login & Registration page templates are created to show these 2 pages
- User can't access these pages if user is logged in
- I have used basic design to make it look minimal same as production site

## Contact Page
- [con_form] short code is used to create the form

## Admin Login Details  
http://mydemoserver.site/imaginelabs/wp-admin
Username : admin@login  
Password : admin@login


## Steps to Transfer the website from one domain to another domain
1. Copy the whole directory to the destination location
2. Export the database from the current Hosting and import the database into the new hosting
3. Install the Search and Replace plugin into the root directoty of the new hosting ( Don't put the plugin in the "plugins" directory  )
4. The plugin will provide 2 input fields, Old URL and New URL. We need to update both URL and then need to run DRY run to test the effect on the database. Once the DRY run done successfully we can press the LIVE run. It will update the site URL in the site