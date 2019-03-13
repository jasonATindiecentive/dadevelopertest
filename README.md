# dadevelopertest
## Developer Test for D &amp; A Technologies

### Jason Ruddock
### bjruddock@gmail.com
### (973) 714-7249

Included in this repository is the my solution for the “Backend Developer Test”. No frameworks or any libraries were used.

My steps were as follows:

- Design Database Diagram
- Set up AWS VPC, Dev instance with Apache, PHP71, and VSFPT, set up Aurora Server-less Instance
- Create tables using command console
- Write code using PHP Storm and FTPing into my Dev Instance
- Set up git repository, deployment keys


I spent about 3 hours writing the code with the remainder of the time setting up the DEV environment.



Some issues with structure and security that I came across are as follows:


#### Use a framework such as CI or Laravel

These either have built in REST servers or libraries are readily available. Even if a framework is not used then there are also available straight PHP libraries that could be utilized.


#### The API lacks security.

I usually have a method like a “POST /auth” that would accept credentials and then return some kind of token which can be used on subsequent calls. The subsequent calls can limit access to data based on the credentials supplied. Alternatively Basic Auth, Digest Auth, or OAuth could be used, etc.

For example, on the current version of this API one could simply call “list_all_users.php” and be able to easily retrieve a list of all other users. Revealing even someone’s email address and name would be considered a security issue, plus anyone can spam users with unsolicited messages via the API.

 If access to the API were restricted to only authorized users who were issued credentials then this could be avoided.


#### Use UUIDs for “user_id”

... rather than simply a auto incrementing number that is easy for someone to guess.

#### If I were designing this API I would:

- lock down the API so only those who were issued credentials could use it
- remove “.php” from all endpoints
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
Body:
{ “email”: “info@datatechnologies.com”,”password”:”Test123”}
```

Even without using a framework some improvement can be made to this codebase to add basic routing controllers that would make it much easier to add additional methods.


#### Consider DynamoDB 

Considuer using DynamoDB (or other non-SQL database) rather than MySQL. This seems like a good fit for this because even if there are millions of users, each User would generally have a limited number of messages sent to and from other users. This would vertically scale nicely and could support a virtually unlimited amount of traffic.

