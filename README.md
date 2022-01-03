# LaravelDemo
This is a little sample Demo App for a Laravel Demo  project. Which simply selects some local images and displays those with a little caption which can be edited.

Current this project is work in progress and is really an experimental project for testing/trying ideas.

This is a Laravel web-app, which the App/Resources folder used for the sample code. https://laravel.com/

To run a localized database needs to be setup and established with matching for the corresponding SQL in the App folder.

The describe for the tables looks like this:
# Field, Type, Null, Key, Default, Extra
'id', 'int', 'NO', 'PRI', NULL, 'auto_increment'
'name', 'varchar(50)', 'YES', '', NULL, ''


# Field, Type, Null, Key, Default, Extra
'item_key', 'varchar(50)', 'NO', 'PRI', NULL, ''
'item_heading', 'varchar(500)', 'YES', '', NULL, ''
'item_desc', 'text', 'YES', '', NULL, ''
'update_time', 'datetime', 'YES', '', NULL, ''