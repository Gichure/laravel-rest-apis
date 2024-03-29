## TASK SYSTEM 
#### General Background
The tasks and follow up system will be used by staff to assign tasks and follow up if the tasks are completed in time. This will help streamline tasks’ follow ups.
#### Scope
This isa detailed requirements for the Tasks and follow up system which will act as a platform where supervisors and juniors can assign tasks and follow up on the same. The tasks and follow up system simply should involve creating of tasks/issues that are not related with specific projects as we have in Project Management but they will be categorized. 
These tasks will have added functionality such as: 
-	Tagging another employee in a task
-	Indicating a task is private or public
-	Creation user groups per task with employees who should be constantly notified on task updates
#### Objectives
##### Main Objective
To provide a means of coordination and management of tasks and follow ups.
##### Specific Objectives
1.	To provide a platform where the employees can assign tasks or have tasks assigned to them.
2.	To provide a platform where the employees can be updating daily on the status of their tasks
3.	To provide a platform where employees can select if a task is private or public when assigning.
4.	To provide a platform where employees can track their assigned tasks and view their past tasks
5.	To provide a platform where employees can view the daily summaries of other employees. i.e. tasks received, tasks completed, tasks pending.
6.	To enhance and improve the follow up process as the supervisors can follow up on all their juniors in the system and generate reports on all tasks overdue or completed in time.
#### Business Process
The current assignment of tasks process is done via emails and/or word of mouth and tracked by use of excel sheets. This assignment and tracking process is tedious and hectic as may lead to key tasks slipping away un-attended to. These leads to the need of a system that will streamline this process of assignment of tasks and follow up so that the employees can easily update on tasks progress and generate a report on follow up items.
The system will also check employee performance, e.g. track employees’ open tasks vs closed tasks, and how often the employees exceeds tasks deadlines 
#### User Stories
User Roles and Responsibilities
The users of the task and follow-up module include: 
-	Employees  
-	Departmental Managers/Supervisors  
-	Departmental Members/Juniors  
##### All Users  
All users should be able to:  
-	Create a new task.
-	Assign a new task to another employee.
-	Specify task category, priority and due date
-	Select the department(s) and/or employee(s) who will receive notifications once the task is created. (user group)
-	Attach document files while creating/assigning a task.
-	Specify if a task is private or public.
-	 the task is private, users should be able to specify who has access to it.
-	Edit tasks if:
-	They created the task or the one who created the task is their junior
-	Receive notification when: 
-	Added to a task user groups.
-	Filter by department and View all:
-	Public tasks in the selected departments 
-	Set reminders of their tasks.
-	Re-assign a closed task
-	The supervisor/assignee should be able to re-assign a given closed or ongoing task.
##### Departmental Managers
They should be able to:
Private tasks
-	View tasks and add comments on private tasks listed under their departments.
-	View all private tasks listed under their departments each with the following details: title, description, who created, who was assigned, priority, due date, and the current progress status of the tasks.
-	Generate a report of all private tasks listed under their departments within a specified period 
Inter-departmental tasks
-	View all inter-relating asks between their departments and other departments 
-	Generate a report of all inter-relating tasks between their departments and other departments within a specified period.
 
#### REQUIREMENTS
##### Task Category
Given an authorized employee is logged in   
             Then they should be able to add unique categories for their department   
             In which tasks, will fall   
Constraint:  
Default category  
This category will include all those tasks that:  
-	Do not fall under any of the categories
-	Are generated from a standard email
Though later they can be edited and grouped under a new category or an existing category.

#####   Create a New Task  
Given that a user is logged in, then they should be able to access the tasks and follow-  
                   Up page from the dashboard from which they can click a link for creating a new task.
-	On the create task page, the user can specify the task category, due dates, priority, description access level (public or private), the person to whom the task is assigned to, and the department(s) and/or users who should receive a notification regarding task creation and progress.
-	On specifying task details, the user should be able to save the task after which the system notifies specified members and displays it on the users’ board for public view.
-	For tasks with private access, only persons to whom the task is assigned and the manager of the concerned department(s) will receive a task creation and progress notifications.
##### Schedule - Repeating Tasks
Given an employee is logged in
Then they should be able to specify repetitive tasks and which days they recur
They should also be able to specify repetitive tasks that are dynamic i.e. have no set day of 
Recurrence and set reminders i.e. daily reminders
##### Task Reminders
Given an employee is logged in
Then they should be able to set reminders on each task
e.g. after how long will the system send an email reminder to the employee
##### Task Progress
Desc: Once a task is pinned to have an “on-going” status, the person to whom the task was 
             assigned should be able to add a progress message.
##### View Tasks  
Given that a user is logged in, then they should be able to view all tasks created within   
                   all departments and having a public access level.   
-	Users should also be able to view private tasks in which they created or were added as task members.
-	Departmental managers should be able to view all private and public tasks ongoing between their departments and other departments.
-	However, private tasks originated and destined to a given department shall be visible only to the task creator, task assignee, and the department manager or any other specified party.

##### Follow Tasks
Given the employee is logged in  
then they should be able to follow a task and receive email notifications on the email.
##### Follow Employees
Given the employee is logged in  
Then they should be able to follow employee and receive email notifications  
When the employee is assigned a task and when they complete a task
 
#####  Daily Reports  
Employees Daily reports should include the following:
-	The number of tasks assigned, completed, pending and overdue tasks
-	Detail on each of the tasks e.g. task name, description, status update and due date
#####  Weekly Reports
Employee weekly reports should include the following:
-	The number of tasks assigned, completed, pending and over-due in the given week.
-	A high-level summary of each task e.g. Just the task name  

Departmental weekly report should include the following:
-  The number of tasks assigned, completed, pending and over-due on each category.
 
#####  User Management  
Users records which includes: job level, employee names, and employee department shall be linked form the HR system using an API. This means an inactive user account for all employees shall exist and which shall be verified and activated once a user makes a first login-trial using Google’s OAuth API. (Since the HR system is not available to you, use mocked values) 

