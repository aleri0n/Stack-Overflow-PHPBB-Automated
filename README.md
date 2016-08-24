# Stack-Overflow-PHPBB-Automated

This is a python script for automatically getting topics from Stack Overflow and posting it on PHPBB forum. 

# Ussage
The script first attempts to get a question from Stack Overflow using API provided by "api.stackexchange.com/2
.2/search" and then tries to find answer by using "api.stackexchange.com/2.2/answers/" API, puts it all in one 
string and makes a POST request to "generator.php" that is on your website. The "generator.php" then automatic
ally posts a topic using the provided information. 

# Installation

Python Script:
    $ git clone https://github.com/aleri0n/Stack-Overflow-PHPBB-Automated.git
    $ cd Stack-Overflow-PHPBB-Automated
    $ gedit phpbb.py
    
    # Configure the values in the phpbb.py script.
    
    $ python phpbb.py (OR ./phpbb.py)

PHP Script:
1. Upload the script on your website server.
2. Configure the connection to database.
3. Replace 'YOUR SECRET' with random alphabets and integers, replace $forum_id value, $topic_poster, $topic_first_poster_name, $topic_last_poster_id and $topic_last_poster_name to make it work properly.
