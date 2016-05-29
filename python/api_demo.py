#!/usr/bin/python
# -*- coding: utf-8 -*-

#python3
import httplib2, urllib
params = urllib.urlencode({'ip': '8.8.8.8', 'datatype': 'jsonp', 'callback':'find'})
url = 'http://api.ip138.com/query/'
headers = {"token": "00d5cb1fac5dc5cbfe2eff218292a2a45"}#token为示例
http = httplib2.Http()
response, content = http.request(url, 'GET', headers=headers, body=params)
print(content)




