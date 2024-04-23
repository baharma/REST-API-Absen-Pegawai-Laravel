import React, { useEffect } from "react";
import Table from "./component/table";
import "../../css/app.css";
import Employee from './module/employee/employee'

import {
    createBrowserRouter,
    RouterProvider,
  } from "react-router-dom";

  const router = createBrowserRouter([
    {
      path: "/",
      element: <Employee />,
    },
  ]);


export default function main() {
    return (
        <React.StrictMode>
            <RouterProvider router={router} />
        </React.StrictMode>
    );
}
