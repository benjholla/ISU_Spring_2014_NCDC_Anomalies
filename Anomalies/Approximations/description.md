# Wordlists

## Background
A local bank has asked us to do some pen tests for them.  We got a dump of debit card numbers in use by customers, but we couldn't find the PIN codes.  At this bank, debit card PIN codes are assigned and cannot be changed by a user (its not a very good bank).  A guy on the team was able to social engineer some information about what constitutes a valid PIN code.  The victim bragged that they figured out a way to make the number of valid PIN codes exactly 1000.  He thought that having less PIN codes for attackers to guess was a good thing.  We want to generate a wordlist of all possible PIN codes for this bank’s debit cards.

## Known PIN Code Requirements
- PIN codes are 4 digits ranging from 0000 to 9999
- For security reasons they do not allow any 4 digit codes that match years between (inclusive) 1900 and 2020
- The first digit cannot be a 3, 5, or 7
- The last digit is a sort of parity check; it must be the sum of the first 3 digits modulus 3

## Submission Instructions
Submit the generated wordlist along with any source code or list of tools used to generate the wordlist.
