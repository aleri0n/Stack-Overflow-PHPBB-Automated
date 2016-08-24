# Stack-Overflow-PHPBB-Automated

This is a python script to get topics from Stack Overflow, and to post it on your PHPBB forum. The script might be unstable, don't expect too much from it. This is only for educational purpose.

# Usage
The script first attempts to get questions from Stack Overflow using API provided by "api.stackexchange.com/2
.2/search" and then tries to find answer by using "api.stackexchange.com/2.2/answers/" API, puts it all in one 
string and makes a POST request to "generator.php". The "generator.php" then automatically posts a topic using 
the provided information. You will be required to configure some strings first, to make it work properly.

# Installation

Python Script:
1. $ git clone https://github.com/aleri0n/Stack-Overflow-PHPBB-Automated.git
2. $ cd Stack-Overflow-PHPBB-Automated
3. $ gedit phpbb.py
4. # Configure the values in the phpbb.py script.
5. $ python phpbb.py (OR ./phpbb.py)

PHP Script:
1. Upload the script on your website server.
2. Configure the connection to database.
3. Replace 'YOUR SECRET' with random alphabets and integers, replace $forum_id value, $topic_poster, $topic_first_poster_name, $topic_last_poster_id and $topic_last_poster_name to make it work properly.
