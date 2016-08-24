#!/usr/bin/env python
import requests 
import json
userinput = raw_input('Enter a keyword: ')
userinputq = raw_input('Enter page: ')
userinputr = raw_input('Enter secret: ')
userinputs = raw_input('Full path to generator.php: ')
getparams = {'page':userinputq, 'pagesize':'100', 'order':'desc', 'sort':'votes', 'intitle':userinput, 'site':'stackoverflow', 'filter': '!5-HwXhXgkSnzI0yfp0WqsC_-6BehEi(fRTZ7eg'}
r = requests.get('https://api.stackexchange.com/2.2/search', params=getparams)
result = json.loads(r.text)

if result['has_more'] == False:
   print 'Error given.'
else:
     for looping in result['items']:
         if looping['is_answered'] == True:
           try:
              newparams = {'order':'desc', 'sort':'votes', 'site':'stackoverflow', 'filter': '!4(Yrwr)RRK6oy2JSD'}
              newr = requests.get('https://api.stackexchange.com/2.2/answers/'+str(looping['accepted_answer_id']), params=newparams) 
              newresult = json.loads(newr.text)
              titletopost = 'Title:', looping['title']
              bodytopost = '<h1>Question:</h1><br>'+(looping['body'])+'<br>'+'Link to Question: '+(looping['link'])+'<br><br><br>'+'<h1>Answer:</h1><br>'+(newresult['items'][0]['body'])
              enterremove = bodytopost.replace('\n', '').replace('\r', '')
              userdata = {"secret":userinputr, "topic_title":titletopost, "body":enterremove}
              requests.post(userinputs, data=userdata)
              print 'Posted.'
           except KeyError: print 'No answer ID found.'
