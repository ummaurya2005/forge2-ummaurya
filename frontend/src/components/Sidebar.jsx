import { Link } from "react-router-dom";

export default function Sidebar() {

    return (

        <div className="sidebar">

            <h3>Forge2</h3>

            <Link to="/dashboard">Dashboard</Link>

            <Link to="/organizations">Organizations</Link>

            <Link to="/tickets">Tickets</Link>

            <Link to="/comments">Comments</Link>

        </div>

    );

}