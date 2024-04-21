
## About This Api Laravel 


## How to install 

First of all, we need to create an .env file based on the env.example file, how to run the command

```
    cp .env.example .env
```

Next, we install the packages installed in composer where the packages will be stored in the vendor folder. Run the following command in the command prompt or terminal:

```
    composer install
```

After successfully creating the .env file, next run the following command:

```
    php artisan key:generate
```

This command will generate a key to be entered into APP_KEY in the .env file

Then, if the Laravel application has a database, create a new database name. Then adjust the database name, username, and database password in the .env file.

Next run the following command:


```
    php artisan migrate

```

This command will generate a table owned by the application database, but first make sure that the application provides migration files in the database/migrations folder.

Usually, ready-made applications not only provide migrations files but also seeder files for table data in the database/seeds folder so we need to insert them into the table with the command:

```
    php artisan db:seed

```
Run the following command to publish the package config file jwt

```
  php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"

```
I have included a helper command to generate a key for you generate key jwt:

```
  php artisan jwt:secret

```
Finally, to run the API, run the command:

```
    php artisan serve

```

when you need to see database desain https://drawsql.app/teams/team-up-1/diagrams/shift-pegawai-database
this all end point when use this api:

# Login & Register 

- (POST) ['/register']

 name as string
 
 email as email
 
 password as string
 
 birthday as date
 
 Example
```bash
     {
    "data": {
        "status": "success",
        "message": "User created successfully",
        "user": {
            "name": "haiya",
            "email": "haiya@gmail.com"
        },
        "authorisation": {
            "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL3JlZ2lzdGVyIiwiaWF0IjoxNzEzNTMwNDQ5LCJleHAiOjE3MTM1MzQwNDksIm5iZiI6MTcxMzUzMDQ0OSwianRpIjoiSWp0cjU1ckRzWEVPTnUzcSIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3IiwiZW1haWwiOiJoYWl5YUBnbWFpbC5jb20iLCJuYW1lIjoiaGFpeWEifQ.omaVQ8BCXm_9Yb59IGNdM1WofXPSWbNeRsLnj0OyJE8",
            "type": "bearer"
        }
    }
}
```

- (POST) ['/login']

 email as email
 password as string

Example

```bash
    {
    "data": {
        "status": "success",
        "message": "User created successfully",
        "user": {
            "name": "haiya",
            "email": "haiya@gmail.com"
        },
        "authorisation": {
            "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzEzNTUxODAzLCJleHAiOjE3MTM1NTU0MDMsIm5iZiI6MTcxMzU1MTgwMywianRpIjoiNHlGQVV1WmoweEF1bXJJRSIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3IiwiZW1haWwiOiJoYWl5YUBnbWFpbC5jb20iLCJuYW1lIjoiaGFpeWEifQ.OFUzJe7bPhpoFGu820Rr1y5FDZLwD8kk0yLLp0TZPfI",
            "type": "bearer"
        }
    }
}
```
- (POST) ['/refresh']

Headers

Authorization: Bearer <token>
- (POST) ['/logout']

Headers

Authorization: Bearer <token>



# Shift  

- (GET) ['/data-employee']

this data to show all employee

Headers

Authorization: Bearer <token>
```bash
{
    "data": [
        {
            "name": "haiya",
            "birthday": "2024-09-25",
            "id_pegawai": "777020",
            "shifts": [
                {
                    "date": "2024-04-19",
                    "status-absen": "late",
                    "clock_in": "20:53:42",
                    "clock_out": "20:53:54",
                    "shift-status": [
                        {
                            "status": "pagi",
                            "nasional_holiday": null
                        }
                    ]
                }
            ]
        }
    ]
}
```

- (POST) ['/save-shift']

Parameters


id_pegawai as interger 

date as date 


Headers

Authorization: Bearer <token>

```bash
{
    "data": {
        "status": {
            "name": "haiya",
            "shift-date": "2024-01-06"
        },
        "message": "Created Shift successfully"
    }
}
```


- (POST) ['/delete-shift']

Headers

Authorization: Bearer <token>

```bash
{
    "status": "Shift deleted",
    "message": [
        true
    ]
}
```

- (POST) ['/cuti']
to request cuti

id_pegawai as interger

date as date

description as string

Headers

Authorization: Bearer <token>

```bash
{
    "data": {
        "status": {
            "name": "haiya",
            "shift-date": "2024-01-06",
            "description": "cuti"
        },
        "message": "Created Shift successfully"
    }
}

```



- (POST) ['/absensi']

id_pegawai as interger


Headers

Authorization: Bearer <token>


```bash
{
    "status": "Successfully",
    "message": "Successfully save attenden"
}
```
