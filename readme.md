labour.org.uk - nice design


actually, could this be simply an open source proposal tool?


diff rewrite:
- use ...
- protected/public function
- e.g. Text_Diff_Mapped is a __construct, parent::Text_Diff
- MartynBiz to \MartynBiz


STAGE 1 DEVELOPMENT:

homepage - most popular, no votes, newest, 

testing

Voting: Yes/ No links on proposal
- show links for Y/N
- VotesController::create (create a vote for this user, update if already exists)
- show status of users vote

Updates:
- send notification html email with changes
- link to view history log

MartynBiz\Diff
- this needs to be tidied up, also patch function (but that can wait as we have snapshots for now)

proposals > create
- category (see labours mani)
- tags
slug in url

Make it look good

About page
Contact page

cache

bug: gulp watch

Categories:
    Better politics
    Businesses
    Economy
    Education
    Employment
    Environment
    Foreign policy
    Housing
    Immigration
    Military
    Quality of life
    Public services
    Religion
    Safer communities
    Society
    Young people


STAGE 2 DEV
    
votes history - fluctuation
create groups - can be a member of various groups (is this group, or encourage tribal nature?)
Use this tool to suggest site enhancements