
## About This Api Laravel 

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
