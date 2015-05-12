labour.org.uk - nice design

STAGE 1 DEVELOPMENT:

Voting: Yes/ No links on proposal
- show links for Y/N
- VotesController::create (create a vote for this user, update if already exists)
- show status of users vote

Diff: On update
- on updating proposal, extract patch - store in update_history table
- send notification email with changes and link to proposal (html email :)

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