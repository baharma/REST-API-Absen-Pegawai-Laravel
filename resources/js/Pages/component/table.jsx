import { useEffect, useState } from "react";

export default function table() {
    const [employee, setEmployee] = useState([]);

    useEffect(() => {
        const fetchEmployee = async () => {
            const headers = {
                Authorization:
                    "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL3JlZ2lzdGVyIiwiaWF0IjoxNzEzODI0NTk4LCJleHAiOjE3MTM4MjgxOTgsIm5iZiI6MTcxMzgyNDU5OCwianRpIjoiYXU0T3RTUjFYcE5jeWdpViIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3IiwiZW1haWwiOiJoYWl5YUBnbWFpbC5jb20iLCJuYW1lIjoiaGFpeWEifQ.armFt07VAEytb8KbkCCqZgrYYXJIp8r4PLueGKxlpp4",
            };
            const data = await fetch(
                "http://localhost:8000/api/data-employee",
                { headers },
            );
            const json = await data.json();
            setEmployee(json);
        };
        fetchEmployee();
    }, []);

    return (
        <>
            <div className="overflow-x-auto">
                <table className="table table-zebra">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Job</th>
                            <th>Favorite Color</th>
                        </tr>
                    </thead>
                    <tbody>
                        {employee.data && employee.data.map((event) => (
                            <tr key={event.id_pegawai}>
                                <td>{event.name}</td>
                                <td>Quality Control Specialist</td>
                                <td>Blue</td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </>
    );
}
