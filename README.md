# dadevelopertest
Developer Test for D &amp; A Technologies

Jason Ruddock

This is a developer test solution for D&A Technologies. The file Backend Developer Test.pdf can be found in the /documents folder which details the requirements for this solution.

Normally I would recommend using a framework such as CodeIgniter or Laravel as these either have RESTful API functionality built in or readily available libraries that will get you started very quickly. However, of course, for the purposes of a developer test it is quite understandable that these frameworks are not be used.

I would also normally recommend some kind of authentication / key be used. I might, say,  add an endpoint such as “/authenticate” where one would provide credentials that would return a token to be used on all subsequent calls. Depending on the credentials provided it would allow or deny access to other API endpoints, etc. This kind of a thing would become more important as more endpoints are added and the project becomes more mature.

I did, however add one small requirement to your test this that all endpoints require HTTPS to be used. Hopefully this is acceptable.

As my solution is deployed on AWS I have also supplied CloudFormation templates and appropriate bootstrap scripts so that the solution can be launched simply by creating a Stack. Just note that this was also a “quick” solution. There are many possible improvements to this such as Puppet rather than my BASH scripting. However, I needed a quick solution that would launch with a few clicks and one that did not rely on any previous infrastructure or workflow.

Because I’m a cheapskate, my hosted database uses Aurora Server-less. Just note that the first time you “hit” an API endpoint it can take about 15-30 seconds to warm up. This wouldn't be the case in a live environemtn where we either wouldn't use Serverless or the application would receve enough traffic such that it remains warm.

