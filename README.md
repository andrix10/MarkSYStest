MarkSYS Test Project 002
========================

### Installation Steps:
1. fork the repository
2. checkout forked repository to your local machine
3. run `composer install` (Composer must be installed. More details [here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx))
4. set database parameters in `app/config/parameters.yml`
5. run application. Details [here](http://symfony.com/doc/current/setup.html#running-your-symfony-application)
6. more info on installing and running Symfony application [here](http://symfony.com/doc/current/setup.html)

### Application Details:
This application is a simple CSV files database. CSV files can be uploaded and viewed.
Access the index page at `/` path. Once a CSV file is submitted, it is being persisted
into MySQL database. Access files at the main page. Content of individual CSV file is
accessible at this path - `/view/{uuid}`, where `{uuid}` is the UUID of the file. At
this time there is no pagination, the whole file will be rendered. Large files will
cause request timeout error. Use relatively small CSV files for this assignment.

### Assignment
Dummy headers and content are displayed for each file. Implement logic to display the
actual file content.

### Extra
1. As the added value, you could add pagination to the file display page (not required).
2. Another potential improvement is to support large files upload (not required).

### Submission
Once done, send us a link to your repository containing the completed assignment. Specify
branch, if different from master. Describe what you have done with the assignment.