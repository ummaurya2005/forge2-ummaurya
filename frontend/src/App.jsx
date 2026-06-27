import { BrowserRouter, Routes, Route } from "react-router-dom";

import Login from "./pages/Login";
import Dashboard from "./pages/Dashboard";
import Organizations from "./pages/Organizations";
import Tickets from "./pages/Tickets";
import Comments from "./pages/Comments";

function App() {
  return (
    <BrowserRouter>

      <Routes>

        <Route path="/" element={<Login />} />

        <Route path="/dashboard" element={<Dashboard />} />

        <Route path="/organizations" element={<Organizations />} />

        <Route path="/tickets" element={<Tickets />} />

        <Route path="/comments" element={<Comments />} />

      </Routes>

    </BrowserRouter>
  );
}

export default App;