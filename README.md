# dadevelopertest
## Developer Test for D &amp; A Technologies

### Jason Ruddock
### bjruddock@gmail.com
### (973) 714-7249

Included in this repository is the my solution for the “Backend Developer Test”.  No frameworks or any external libraries were used.

The only minor change I made was to *require* an HTTPS connection. Trying to access the endpoint using HTTP will result in a 301 redirect to HTTPS.

The endpoints can be found live at:
https://datechdev.jasonruddock.com/api/

For example, https://datechdev.jasonruddock.com/api/list_all_users.php?requester_user_id=1

All errors return HTTP 500 plus an code and description. Possible errors are:
- 000 Internal Server Error
- 100 Method not allowed
- 200 Email Address is not Valid
- 201 Password is empty
- 202 First Name is required
- 203 Last Name is required
- 204 User Already Exists
- 102 Invalid Login
- 103 user_id_X was not found
- 105 sender_user_id was not found
- 106 receiver_user_id was not found
- 107 requester_user_id was not found


My steps were as follows:

- Design Database Diagram
- Set up AWS VPC, Dev instance with Apache, PHP71, and VSFPT, set up Aurora Server-less Instance
- Create tables using command console
- Write code using PHP Storm and FTPing into my Dev Instance
- Test using browser and PostMan
- Set up git repository, deployment keys

The whole thing took about 5 hours over Monday and Tuesday night of this week.

I spent about 3 hours writing the code and testing with the remainder of the time setting up the DEV environment, documenting everything, and writing this readme.

Some issues with structure and security that I came across are as follows:


#### Use HTTPS instead of HTTP

Well, actually I already did this. All requests my my urls redirect to https.


#### Use a pre-existing library or framework such as CI or Laravel

These either have built in REST servers or libraries are readily available. Even if a framework is not used then there are also available straight PHP libraries that could be utilized.

When you try to add functionality such as more integrations, emails, jobs, etc. then a framework or at least libraries may come in quite useful.


#### Timezones are ignored

The API has no concept of which timezone the user may be in. All times are returned in GMT. Perhaps a user signing up should supply their timezone or location so times can be converted in the reply.

... or, perhaps this is a non-issue and would be handled on the client side.


#### Add logging

Each API request should be logged. You could simply insert rows into some `Log` table cooresponding to each request. However perhaps a better option is CloudWatch because IAM policies can be set up so that the log is 'write-only'. Requests can be written but not updated or deleted. Alerts can be set up against the log metrics for things such as high error rates, high invalid logins, high volume of messages sent to/from a single user, etc.


#### The API lacks security

Anyone can view everyone else's messages as well as a list of all other users. Anyone can send a message from and to any user because "POST send_messages.php" does not authenticate whether someone has actually logged in.

There are a number of options here. Each endpoint could be sucured using Basic Auth, Digest Auth, or OAuth. Or perhaps the "POST /login" response should include a token that can be used on subsequent calls to ensure the user can only see messages and send using their own account.

Finally all calls should require HTTPS (but this was already mentiond above.)


#### Use UUIDs for “user_id”

... rather than simply a auto incrementing number that is easy for someone to guess.


#### If I were designing this API I would:

- lock down the API so only those who were issued credentials could use it
- remove “.php” from all endpoints
- add API request logging via CloudWatch
- replace GET parameters with paths, for example:
```
GET /api/view_messages/{user_id_a}/{user_id_b}
GET /api/list_all_users/{requestor_user_id}
```

- all POST would accept raw JSON rather than form-data, for example:
```
POST /api/login
Header: Content-Type: application/json
Header: Authorization Bearer {token from /auth}
Raw Body:
{ “email”: “info@datatechnologies.com”,”password”:”Test123”}
```
- Use off the shelf libraries or a framework


#### Consider DynamoDB 

Considuer using DynamoDB (or other non-SQL database) rather than MySQL. This seems like a good fit for this because even if there are millions of users, each User would generally have a limited number of other Users they message to and from. This creates a large key space and would vertically scale nicely. The downside is that once DynamoDB is chosen you become locked into using AWS and it is difficult to move to another provider.


#### Conclusion

There are many other things that are probably missing from this API such as the ability to group users together (friends, channels, etc.), the ability to upload avatar images, profile bios, current status, etc.

Microservices such as this could also be implemented serverless using AWS API Gateway and Lamba, but then using PHP may not be an option and, again, you become locked to AWS.

If I were to put more time into this there are some improvements I might make even using the current requirements. Perhaps adding a basic routing framework to make it easier to add and modify api endpoints, defining the list of errors in one place, and adding logging. However, sometimes there is value in getting something completed rather than getting it absolutely perfect.

This was quite an interesting test. It was fun setting this up and quite interesting to do without any framework or libraries.

Thanks!

Jason

