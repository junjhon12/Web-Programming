import React from "react";
import "./Navbar.css";
import "./Navbar.js";

const Navbar = () => {
    return (
        <div className="nav">
            <div className="nav_container">
                <div className="nav_logo">
                    <img src="https://cdn.dribbble.com/users/935928/screenshots/3021157/media/21ca90510427b6276423b8a629b38c9b.png?compress=1&resize=800x600&vertical=top" alt="" />
                </div>
                <div className="nav_links">
                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Music/Tracks</a>
                    <a href="#">Artists</a>
                    <a href="#">Events</a>
                    <a href="#">Contact</a>
                    <a href="#">Shop</a>
                    <a href="#">FAQ</a>
                    <a href="#">Blog/News</a>
                </div>
            </div>
        </div>
    );
};

export default Navbar;