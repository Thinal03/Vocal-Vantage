<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient-Child Home Page</title>

    <style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Body styling */
    body {
        font-family: Arial, sans-serif;
        display: flex;
        margin: 0;
        background-color: #E9EDF4;
    }

    /* Container (Sidebar) */
    .container {
        width: 200px;
        background-color: white;
        height: 110vh;
        /* Full viewport height */
        position: fixed;
        left: 0;
        top: 0;
        overflow-y: auto;
        /* Add scroll if content exceeds height */
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        padding: 10px;
        z-index: 1000;
    }

    .sidebar .toggle-btn {
        background-color: white;
        color: #028355;
        border: none;
        font-size: 18px;
        font-weight: bold;
        cursor: pointer;
        margin-top: 10px;
        text-align: center;
        border-radius: 5px;
        width: 100%;
    }

    .sidebar-menu {
        margin-top: 10px;
    }


    .sidebar-menu a {
        display: block;
        width: 100%;
        margin: 25px 0;
        padding: 4px;
        text-align: left;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: white;
        color: #666;
        text-decoration: none;
        cursor: pointer;
    }

    .sidebar-menu select {
        display: block;
        width: 100%;
        margin: 10px 0;
        padding: 10px;
        text-align: left;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        background-color: white;
        color: #666;
        text-decoration: none;
        cursor: pointer;
    }


    .sidebar-menu a:hover,
    .sidebar-menu select:hover {
        background-color: #0283561d;
        color: #028355;
        border: 1px solid #028355;
        animation: buttonHover 0.3s forwards;
    }

    /* Main content area */
    main {
        margin-left: 210px;
        /* Offset for fixed sidebar */
        width: calc(100% - 200px);
        display: flex;
        flex-direction: column;
        background-color: white;
    }

    header {
        width: 100%;
        height: 50px;
        display: flex;
        background-color: white;
    }

    /* Navbar */
    .navbar {
        display: flex;
        align-items: center;
        height: 80px;
    }
    .navbar .logo-image{
            width: 90px;
            height: 90px;
            margin-left: 50px;
        }
    .navbar .logo {
        font-size: 1.6rem;
        font-weight: bold;
        color: #028355;
        background-color: white;
        padding: 0.5rem 0.8rem;
        border-radius: 35px;
        animation: slideIn 4s ease forwards;
    }

    .navbar .header-icons {
        margin-left: 580px;
        padding: 0.01rem 0.8rem;
        border-radius: 35px;
        display: flex;
    }

    .header-icons .icon {
        padding: 0.6rem 1.0rem;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        font-size: 1rem;
        margin-right: 10px;

    }

    .header-icons .icon a {
        font-size: 16px;
        border: none;
        border-radius: 5px;
        color: #028355;
        text-decoration: none;
        cursor: pointer;
    }

    .header-icons .icon a:hover {
        font-weight: bold;
        font-size: 18px;
    }

    

/* Styling for the popup container */
.messages-container {
    display: none; /* Initially hidden */
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.8);
    background-color: white;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    width: 90%;
    max-width: 400px;
    padding: 20px;
    z-index: 1000;
    opacity: 0;
    animation: popupAppear 0.4s forwards;
    color: #fff;
    text-align: center;
    overflow: hidden;
}

/* Heading */
.messages-container h2 {
    margin-bottom: 30px;
    margin-top: 15px;
    font-size: 2.1rem;
    font-weight: bold;
    color: #028355;
    text-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

/* Message Items */
.message-item {
    display: flex;
    align-items: center;
    gap: 40px;
    margin: 15px 0;
    background: linear-gradient(135deg, #0283565b, #E9EDF4);
    border-radius: 10px;
    padding: 10px;
    width: 250px;
    margin-left: 50px;
    transition: transform 0.2s, background 0.3s;
}

.message-item:hover {
    transform: scale(1.05);
    background-color: #028355;
}

.message-item img {
    width: 60px;
    height: 60px;
    border-radius: 30%;
    border: 2px solid white;
}

.message-item a {
    
    border: none;
    text-decoration: none;
    padding: 8px 12px;
    cursor: pointer;
    color: #028355;
    font-size: 1.3rem;
    font-weight: bold;
    transition: background 0.3s, transform 0.3s;
}

.message-item a:hover{
    color: white;
}



/* Overlay for dimming the background */
.overlay {
    display: none; /* Initially hidden */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    z-index: 999;
}

/* Show popup and overlay when active */
.overlay.active,
.messages-container.active {
    display: block;
}

.messages-container.active {
    transform: translate(-50%, -50%) scale(1);
    opacity: 1;
}

/* Keyframes for smooth popup appearance */
@keyframes popupAppear {
    from {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.8);
    }
    to {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
    }
}

/* Mobile Responsive Design */
@media (max-width: 768px) {
    .messages-container {
        width: 95%;
        padding: 15px;
    }

    .message-item img {
        width: 40px;
        height: 40px;
    }

    .message-item button {
        font-size: 12px;
        padding: 6px 10px;
    }
}

@media (max-width: 480px) {
    h2 {
        font-size: 20px;
    }

    .message-item {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .message-item button {
        margin-top: 10px;
    }
}


    /*who-we-are*/
    .who-we-are-intro {
        background: linear-gradient( #02835640, #b3cce6);
    }

    .who-we-are {
        margin-top: 15px;
        border-radius: 50px 0 50px 0;
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .who-we-are img {
        width: 40%;
        height: auto;
        border-radius: 50px 0 50px 0;
    }

    .who-we-are-text h2 {
        font-size: 1.1rem;
        color: #0283569d;
        margin-left: 15px;
    }

    .who-we-are-text h1 {
        text-align: center;
        font-size: 2.5rem;
        color: #000E00;
        margin-bottom: 25px;
    }

    .who-we-are-text p {
        text-align: center;
        font-size: 1rem;
        color: #666;
    }

    .who-we-are-text p:hover {
        color: #333;
    }

    .who-we-are-text b {
        width: 100%;
        padding: 15px;
        margin-top: 35px;
        background: linear-gradient(135deg, #E9EDF4, #0283565b);
        color: #028355;
        border: none;
        border: 1px solid #0283568c;
        border-radius: 50px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        transition: 0.3s ease;
    }

    .who-we-are-text b:hover {
        font-size: 20px;
    }

    /* Section Styling */
    section {
        background-color: white;
        padding: 20px;
    }

    /* General styling */


    /* General Section Styling */
    #Doctor-Detail-Profile {
        background-color: white;
        padding: 20px;
        margin-bottom: 50px;
    }

    .section3 h3 {
        color: #028355;
        font-size: 1.3rem;
        text-align: center;
        margin-bottom: 5px;
    }

    .section3 p {
        text-align: center;
        font-size: 2rem;
        color: #000E00;
        font-weight: bold;
        margin-bottom: 50px;
    }

    /* Carousel Container */
    .container-doc {
    overflow: hidden;
    width: 100%;
    position: relative;
}

    .carousel-container {
        display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
    }

    .slide-track {
        display: flex;
        gap: 20px;
        animation: scroll 95s linear infinite;
    }

    @keyframes scroll {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-100%);
        }
    }

    /* Pause animation on hover */
    .carousel-container:hover .slide-track {
        animation-play-state: paused;
    }

    /* Individual Slide */
    .slide {
        background: linear-gradient(135deg, #E9EDF4,#E9EDF4);
        width: 200px;
    border: 1px solid #ccc;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.3s ease;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .slide:hover {
        transform: scale(1.1);
    }

    .slide img {
        width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .caption {
        margin-top: 10px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        color: #2c3e50;
         text-align: center;
    }
.caption h3{
    color: #204060;
    font-size: 1.2rem;
    margin-bottom: 10px;
}

/* Popup Styles */
.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.popup {
    background: #fff;
    padding: 5px;
    border-radius: 50px 50px 50px 50px;
    width: 90%;
    max-width: 400px;
    text-align: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.popup img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 50px 50px 50px 50px;
    margin-bottom: 10px;
}

.popup h3 {
    font-size: 2rem;
    color: #204060;
    margin-bottom: 10px;
}

.popup p {
    color: #555;
    margin-bottom: 20px;
}

.popup-close {
    background: #ff5e57;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 12px;
}

.popup-close:hover {
    background: #e04e4b;
    font-weight: bold;
}

/* Responsive Design */
@media (max-width: 768px) {
    .carousel-container {
        flex-direction: column;
        gap: 10px;
    }

    .slide {
        width: 90%;
        margin: 0 auto;
    }
}


    /* General Styling */

    .calendar {
        width: 90%;
        margin: 20px auto;
        padding: 10px;
        border: 1px solid #ddd;
        background: linear-gradient( #02835640, #b3cce6);
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        color: #fff;
    }

    .section-title {
        font-size: 1.2rem;
        text-align: center;
        color: #028355;
        letter-spacing: 1px;
        margin-bottom: 10px;
        margin-top: 50px;
        text-transform: uppercase;
    }

    .section-subtitle {
        font-size: 2.5rem;
        text-align: center;
        color: #000E00;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .header-calender {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .header-calender h2 {
        font-size: 20px;
        text-align: center;
        flex-grow: 1;
        color: #000E00;
        font-weight: bold;
    }

    .header-calender button {
        background-color: white;
        color: #028355;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .header-calender button:hover {
        background-color: #028355;
        color: white;
        font-weight: bold;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 5px;
        overflow: hidden;
    }

    th {
        background: linear-gradient(135deg, #b3cce6, #02835640);
        color: #204060;
        padding: 12px;
        text-transform: uppercase;
        font-size: 14px;
    }

    td {
        text-align: center;
        padding: 10px;
        border: 2px solid #02835641;
        font-size: 17px;
        cursor: pointer;
        color: #000E00;
    }

    td.day:hover {
        background-color: #ffecb3;
        color: #000E00;
        font-weight: bold;
        font-size: 20px;
        border-radius: 5px;
        transition: 0.3s ease;
    }

    .today {
        background-color: #dce4f3;
        color: #028355;
        font-weight: bold;
    }

    .has-appointment {
        background-color: #ffcc80;
        font-weight: bold;
        border-radius: 5px;
    }

    .selected {
        background-color: #8e24aa;
        color: white;
        border-radius: 5px;
    }

    /* Popup and Overlay Styling */
    #appointmentPopup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 30px;
        border: 1px solid #ddd;
        border-radius: 10px;
        z-index: 999;
        width: 90%;
        max-width: 400px;
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
    }

    #appointmentPopup h2 {
        font-size: 2rem;
        margin-top: 10px;
        margin-bottom: 30px;
        text-align: center;
        color: #028355;
    }

    #appintmentPopup label {
        color: #666;
    }

    #appointmentPopup input,
    #appointmentPopup select {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: 0.5px solid #0283562f;
        border-radius: 5px;
        font-size: 1rem;
    }

    #appointmentPopup button {
        width: 100%;
        padding: 10px;
        margin-top: 15px;
        background: linear-gradient(135deg, #0283565b, #E9EDF4);
        color: #028355;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        transition: 0.3s ease;
    }

    #appointmentPopup button:hover {
        background-color: #E9EDF4;
        color: #0283569e;
        border: 0.5px solid #028355;
    }

    #overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 998;
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {

        th,
        td {
            padding: 8px;
            font-size: 12px;
        }

        .header h2 {
            font-size: 16px;
        }

        .header button {
            padding: 6px 10px;
            font-size: 14px;
        }
    }

    @media screen and (max-width: 480px) {

        th,
        td {
            padding: 6px;
            font-size: 10px;
        }

        .header h2 {
            font-size: 14px;
        }

        .header button {
            padding: 5px 8px;
            font-size: 12px;
        }

        #appointmentPopup {
            padding: 15px;
        }

        #appointmentPopup h2 {
            font-size: 18px;
        }

        #appointmentPopup button {
            font-size: 14px;
        }
    }



    /* General Styles */


    .header-service {
        margin-top: 20px;
        text-align: center;
        display: flex;
        margin-left: 200px;
    }

    .header-service h2 {
        color: #0283569b;
        font-size: 1.2rem;
    }

    .header-service h1 {
        font-size: 2rem;
        color: #000E00;
        margin-top: 20px;
        margin-bottom: 30px;
    }

    .see-more {
        color: #f26322;
        text-decoration: none;
        font-size: 0.9rem;
        text-align: right;
    }


    /* Service Cards */
    .services {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin: 20px;
        padding: 0 10px;
    }

    .service-card {
        background: white;
        border-radius: 10px;
        text-align: center;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .service-card .icon {
        height: 50px;
        width: 50px;
        border-radius: 50%;
        margin: 0 auto 10px auto;
    }

    .service-card p {
        font-size: 1rem;
        color: #333;
    }

    /* Modal Styles */
/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    justify-content: center;
    align-items: center;
    z-index: 1000;
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.modal-content {
    background-color:  #E9EDF4;
    padding: 30px 20px;
    border-radius: 15px;
    max-width: 600px;
    width: 90%;
    text-align: center;
    position: relative;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    transform: translateY(-20px);
    animation: slideIn 0.4s ease-out forwards;
}

@keyframes slideIn {
    from {
        transform: translateY(-50px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.modal-content img {
    max-width: 350px;
    height: 250px;
    margin: 20px 0;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

.modal-content h2 {
    font-size: 1.8rem;
    color: #000E00;
    margin-bottom: 10px;
}

.modal-content p {
    color: #333;
    font-size: 1rem;
    margin-bottom: 20px;
    line-height: 1.6;
}

.modal-content h3 {
    font-size: 1.3rem;
    color: #444;
    text-align: left;
    margin-left: 60px;
    margin-bottom: 10px;
}

.modal-content ul {
    list-style-type: disc;
    padding-left: 20px;
    text-align: left;
    color: #333;
    margin-left: 180px;
    font-size: 1rem;
    line-height: 1.5;
}

.modal-content li {
    margin-bottom: 10px;
}

/* Close Button Styles */
.close {
    position: absolute;
    top: 15px;
    right: 20px;
    font-size: 1.5rem;
    font-weight: bold;
    color: #888;
    cursor: pointer;
    transition: color 0.3s;
}

.close:hover {
    color: #333;
}

/* Add a subtle glow to the modal when it opens */
.modal-content:after {
    content: '';
    position: absolute;
    top: -15px;
    left: -15px;
    right: -15px;
    bottom: -15px;
    border-radius: 20px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(0, 0, 0, 0));
    z-index: -1;
    animation: glow 1.5s infinite alternate;
}

@keyframes glow {
    from {
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
    }
    to {
        box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .modal-content {
        padding: 20px 15px;
        width: 95%;
    }

    .modal-content h2 {
        font-size: 1.5rem;
    }

    .modal-content h3 {
        font-size: 1.2rem;
    }

    .modal-content p,
    .modal-content ul {
        font-size: 0.9rem;
    }
}



/*offline video*/
/* General Styling */
.offline-video {
    padding: 20px;
    background-color: #f9f9f9;
    font-family: Arial, sans-serif;
}
/* Search Bar */
.search-bar {
    text-align: center;
    margin-bottom: 40px;
}

.search-bar input[type="text"] {
    width: 90%;
    max-width: 500px;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #666;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Video Section */
.video-row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 60px;
}

.video-card {
    background-color: #000E00;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
    border-radius: 8px;
    overflow: hidden;
    width: 50%;
    max-width: 300px;
    display: flex;
    flex-direction: column;
    margin-bottom: 30px;
    text-align: center;
}

.video-card video {
    width: 100%;
    height: 200px;
}

.video-details {
    background-color:  #E9EDF4;
    padding: 10px;
}

.video-title {
    font-size: 1.3rem;
    font-weight: bold;
    margin-bottom: 5px;
    color: #204060;
}

.video-description {
    font-size: 1.1rem;
    text-align: center;
    margin-left: 5px;
    margin-right: 5px;
    margin-bottom: 10px;
    color: #666;
}

.video-meta {
    font-size: 1rem;
    color: #888;
}

/* Button */
button {
    padding: 10px 20px;
    background-color: #02835640;
    border: none;
    border-radius: 4px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button a {
    color: #028355;
    text-decoration: none;
}

button:hover {
    background-color: #0283565b;
    font-weight: bold;
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
    .section-title {
        font-size: 20px;
    }

    .section-subtitle {
        font-size: 16px;
    }

    .video-card {
        max-width: 90%;
    }

    .video-meta {
        font-size: 10px;
    }
}

@media (max-width: 480px) {
    .search-bar input[type="text"] {
        width: 95%;
    }

    .video-title {
        font-size: 14px;
    }

    .video-description {
        font-size: 12px;
    }

    .video-meta {
        font-size: 10px;
    }
}

/* General Styling */
.Activities-detail {
    padding: 20px;
    background-color: #f9f9f9;
    font-family: Arial, sans-serif;
}
/* Activity Section */
.activity {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 40px;
}
.video-cards {
    background-color: #E9EDF4;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
    border-radius: 8px;
    overflow: hidden;
    width: 50%;
    max-width: 300px;
    display: flex;
    flex-direction: column;
    text-align: center;
}

.video-cards video {
    background-color: #000E00;
    width: 100%;
    height: 200px;
}


    /* Footer Section */
    footer {
        background-color: #E9EDF4;
        /* Dark background for contrast */
        color: #000E00;
        /* White text for readability */
        padding: 20px 10%;
        text-align: center;
        font-family: Arial, sans-serif;
    }

    footer p {
        font-size: 14px;
        margin: 10px 0;
        color: #000E00;
    }

    /* Footer Links Container */
    .footer-links {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    .footer-links div {
        flex: 1;
        /* Distribute space evenly */
        min-width: 200px;
        text-align: left;
    }

    /* Footer Headings */
    .footer-links h4 {
        font-size: 18px;
        color: #fff;
        margin-bottom: 10px;
    }

    /* Footer Lists */

    .footer {
        background-color: #E9EDF4;
        color: #666;
        padding: 40px 20px;
    }

    .footer-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        max-width: 1200px;
        margin: 0 auto;
    }

    .footer-about {
        flex: 1;
        min-width: 250px;
        margin: 10px;
        margin-right: 30px;
    }

    .footer-about h2 {
        font-size: 2rem;
        margin-bottom: 15px;
        color: #000E00;
    }

    .footer-about p {
        margin: 10px 0;
        line-height: 1.5;
    }

    .btn-get-started {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background-color: #0283560c;
        color: #028355;
        text-decoration: none;
        border-radius: 50px;
        font-weight: bold;
    }

    .social-icons a {
        display: inline-block;
        margin-right: 10px;
    }

    .social-icons img {
        height: 30px;
        gap: 10px;
        width: 30px;
    }

    .footer-links {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        min-width: 250px;
        margin: 10px;
    }

    .footer-links h3 {
        font-size: 18px;
        margin-bottom: 15px;
    }

    .footer-links ul {
        list-style: none;
        padding: 0;
    }

    .footer-links ul li {
        margin-bottom: 10px;
    }

    .footer-links ul li a {
        color: #333;
        text-decoration: none;
    }

    .footer-contact {
        flex: 1;
        min-width: 250px;
        margin: 10px;
        text-align: center;
    }

    .footer-contact h3 {
        font-size: 18px;
        margin-bottom: 15px;
    }

    .footer-contact p {
        margin: 10px 0;
    }

    .footer-contact a {
        color: #009688;
        text-decoration: none;
        font-weight: bold;
    }

    .footer-contact img {
        margin-top: 20px;
        max-width: 100px;
    }

    /* Mobile Responsiveness */
    @media (max-width: 768px) {
        .footer-container {
            flex-direction: column;
            align-items: center;
        }

        .footer-links {
            flex-direction: column;
        }

        .footer-links>div {
            margin-bottom: 20px;
        }

        .footer-contact {
            margin-top: 20px;
        }
    }
    </style>
</head>

<body>


    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <button class="toggle-btn">☰ Menu ☰</button>
            <div class="sidebar-menu">
                <a href="">Home</a>
                <a href="patient_child note entry .html">Patient Entry Form</a>
                <a href="#WHAT WE TREAT">What We Treat</a>
                <a href="#Doctor-Detail-Profile">Therapists</a>
                <a href="Appoinments_calender_child.php">Appointments</a>
                <a href="zoom_child.php">Attend Live Session</a>
                <a href="#offline-video">Offline Videos</a>
                <a href="#Activities-detail">Exercises</a>
                <a href="Payment.html">Payments</a>

                <select id="report" name="report_type" required onchange="window.location.href=this.value;">
                    <option value="">Select a Report</option>
                    <option value="patient report_child.php">Patient Report</option>
                    <option value="platform report_child.php">Platform Report</option>
                </select>

                <a href="feedback.html">Feedback</a>
                <a href="../login.html">Logout</a>
            </div>
        </div>
    </div>


    <main>
        <!-- Main Content -->
        <header class="navbar">
        <img class="logo-image" src="../Resourses/index/logo 01.png">
            <div class="logo">Vocal Vantage</div>

            <div class="header-icons">
                <div class="icon"><a href="patient message.html"><img src="../Resourses/index/msg.png" width="35px"
                            height="35px"> Message</a></div>
                <div class="icon"><a href="personal detail.php"><img src="../Resourses/index/persInfo.png"
                            width="35px" height="35px"> Personal Info</a></div>
            </div>
        </header>

       <!--the messagepopup container -->
       <div class="messages-container" id="popupMessages">
    <h2>Messages</h2>
    <div class="message-item">
        <img src="../Resourses/index/inbox01.gif" alt="Inbox Icon">
        <a href="inbox_child.php">Inbox</a>
    </div>
    <div class="message-item">
        <img src="../Resourses/index/send msg01.gif" alt="Sent Icon">
        <a href="paitent_message.html">Sent</a>
    </div>
</div>
<script>
    // JavaScript to handle popup
document.addEventListener("DOMContentLoaded", () => {
    const icon = document.querySelector(".icon");
    const popupMessages = document.getElementById("popupMessages");
    const overlay = document.createElement("div");
    overlay.className = "overlay";
    document.body.appendChild(overlay);

    // Show popup on click
    icon.addEventListener("click", (e) => {
        e.preventDefault();
        popupMessages.classList.add("active");
        overlay.classList.add("active");
    });

    // Close popup when clicking outside
    overlay.addEventListener("click", () => {
        popupMessages.classList.remove("active");
        overlay.classList.remove("active");
    });
});
</script>


        <section class="who-we-are-intro">
            <div class="who-we-are">
                <img src="../Resourses/Child/child02.jpeg" alt="Who we are">

                <div class="who-we-are-text">
                    <h2>ONLINE SPEECH THERAPY</h2><br>
                    <h1>Child Speech Therapy</h1>
                    <p>We’re thrilled to support you on your journey toward <br>improved communication and confidence.
                        At Vocal Vantage, we believe every voice is unique and deserves to be heard. <br><br>Our
                        dedicated therapists are here to guide you <br> personalized
                        care and effective techniques designed to meet your specific needs. <br>Together, we’ll work
                        toward achieving your goals in a comfortable and supportive environment.<br><br> Thank you for
                        choosing us as your partner in this important journey.
                        <br><br><br><b href="Appoinments_calender.php">Let’s get started!</b>
                    </p><br>
                </div>
            </div>
        </section>


        <section class="Calender">
            <h3 class="section-title">MAKE YOUR</h3>
            <p class="section-subtitle">Appointment Now</p><br>

            <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vocal_vantage";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Patient_name = $_POST['patient_name'];
    $role = $_POST['role'];
    $Age = $_POST['age'];
    $Therapist = $_POST['therapist'];
    $Date = $_POST['date'];
    $Time = $_POST['time'];

    // Insert appointment into the database
    $sql = "INSERT INTO appoinments (patient_name,  role, age, therapist, date, time) VALUES ('$Patient_name' , '$Age' , '$Therapist', '$Date', '$Time')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch appointments from the database for calendar
$appointments = [];
$sql = "SELECT date FROM appoinments WHERE role = 'patient_child'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row['date'];
    }
}

$conn->close();
?>
            <div class="calendar">
                <div class="header-calender">
                    <button id="prev">❮</button>
                    <h2 id="monthYear"></h2>
                    <button id="next">❯</button>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                        </tr>
                    </thead>
                    <tbody id="calendarBody">
                        <!-- Dates will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>

            <!-- Overlay for Popup -->
            <div id="overlay"></div>

            <!-- Modal Popup for Appointment Form -->
            <div id="appointmentPopup">
                <div class="form-container">
                    <h2>Appointment</h2>
                    <form action="Appoinments.php" method="POST">
                        <label for="patient_name">Patient's Name</label>
                        <input type="text" id="patient_name" name="patient_name" required>

                        <label for="role">Patient Type </label>
                        <select id="role" name="role" required>
                        <option value="patient_child">Patient - Child </option>
                        </select>
                        
                        <label for="age">Age</label>
                        <input type="number" id="age" name="age" min="1" max="100" required>

                        <label for="therapist">Therapist</label>
                        <select id="therapist" name="therapist" required>
                            <option value="doctor 1">Doctor 1</option>
                            <option value="doctor 2">Doctor 2</option>
                            <option value="doctor 3">Doctor 3</option>
                        </select>

                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" required>

                        <label for="time">Time</label>
                        <select id="time" name="time" required>
                            <option value="9.00 - 10.00 A.M">9.00 - 10.00 A.M</option>
                            <option value="11.00 A.M - 12.00 P.M">11.00 A.M - 12.00 P.M</option>
                            <option value="1.00 - 2.00 P.M">1.00 - 2.00 P.M</option>
                            <option value="3.00 - 4.00 P.M">3.00 - 4.00 P.M</option>
                            <option value="5.00 - 6.00 P.M">5.00 - 6.00 P.M</option>
                            <option value="7.00 - 8.00 P.M">7.00 - 8.00 P.M</option>
                            <option value="9.00 - 10.00 P.M">9.00 - 10.00 P.M</option>
                        </select>

                        <button type="submit">Make Appointment</button>
                    </form>
                </div>
                <button id="closePopup">Close</button>
            </div>

            <script>
            const calendarBody = document.getElementById('calendarBody');
            const monthYear = document.getElementById('monthYear');
            const prev = document.getElementById('prev');
            const next = document.getElementById('next');
            const overlay = document.getElementById('overlay');
            const appointmentPopup = document.getElementById('appointmentPopup');
            const closePopup = document.getElementById('closePopup');
            const dateInput = document.getElementById('date');

            // Appointments from PHP
            const appointments = <?php echo json_encode($appointments); ?>;

            // Function to generate calendar
            function generateCalendar(month, year) {
                calendarBody.innerHTML = '';
                const firstDay = new Date(year, month, 1).getDay();
                const lastDate = new Date(year, month + 1, 0).getDate();
                let date = 1;

                // Fill the first week
                let row = document.createElement('tr');
                for (let i = 0; i < firstDay; i++) {
                    row.appendChild(document.createElement('td'));
                }

                // Fill the rest of the calendar
                for (let i = firstDay; date <= lastDate; i++) {
                    if (i % 7 === 0) {
                        calendarBody.appendChild(row);
                        row = document.createElement('tr');
                    }

                    const cell = document.createElement('td');
                    const cellDate = new Date(year, month, date);

                    // Format cellDate as YYYY-MM-DD
                    const cellDateString =
                        `${cellDate.getFullYear()}-${String(cellDate.getMonth() + 1).padStart(2, '0')}-${String(cellDate.getDate()).padStart(2, '0')}`;
                    cell.textContent = date;

                    // Highlight cells with appointments
                    if (appointments.includes(cellDateString)) {
                        cell.classList.add('has-appointment');
                    }

                    // Highlight today's date
                    const today = new Date();
                    if (cellDate.toDateString() === today.toDateString()) {
                        cell.classList.add('today');
                    }

                    cell.addEventListener('click', () => openPopup(cellDateString));
                    row.appendChild(cell);
                    date++;
                }

                calendarBody.appendChild(row);
                monthYear.textContent = `${month + 1}/${year}`;
            }


            // Open appointment popup
            function openPopup(date) {
                dateInput.value = date;
                overlay.style.display = 'block';
                appointmentPopup.style.display = 'block';
            }

            closePopup.addEventListener('click', () => {
                overlay.style.display = 'none';
                appointmentPopup.style.display = 'none';
            });

            prev.addEventListener('click', () => {
                currentMonth--;
                if (currentMonth < 0) {
                    currentMonth = 11;
                    currentYear--;
                }
                generateCalendar(currentMonth, currentYear);
            });

            next.addEventListener('click', () => {
                currentMonth++;
                if (currentMonth > 11) {
                    currentMonth = 0;
                    currentYear++;
                }
                generateCalendar(currentMonth, currentYear);
            });

            // Set initial date and load calendar
            const currentDate = new Date();
            let currentMonth = currentDate.getMonth();
            let currentYear = currentDate.getFullYear();

            generateCalendar(currentMonth, currentYear);
            </script>

        </section>


        <section id="Doctor-Detail-Profile">
            <div class="section3"><br><br>
                <h3>MEET OUR TEAM</h3><br>
                <p>Below are some of our best therapists</p>
                <center>
                    <div class="container-doc">
                        <div class="slide-track-doc">
                            <?php
$connect = mysqli_connect("localhost", "root", "", "vocal_vantage");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the personal_info table
$query = "SELECT * FROM personal_info";
$result = mysqli_query($connect, $query);
?>

                            <div class="section">
                                <center>
                                    <div class="carousel-container">
                                        <div class="slide-track">
                                            <?php if (mysqli_num_rows($result) > 0): ?>
                                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                            <div class="slide">
                                                <img src="../therapist/files/<?php echo htmlspecialchars($row['filename']); ?>"
                                                    alt="<?php echo htmlspecialchars($row['name']); ?>">
                                                <div class="caption">
                                                    <h3> <b> <?php echo htmlspecialchars($row['name']); ?></b></h3> 
                                                    <?php echo htmlspecialchars($row['speaciality']); ?><br><br>
                                                </div>
                                            </div>
                                            <?php endwhile; ?>
                                            <?php else: ?>
                                            <p>No therapists found.</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </center>
                            </div>
                            <?php mysqli_close($connect); ?>

                            </section><br><br>


                            <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vocal_vantage";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Patient_name = $_POST['patient_name'];
    $Age = $_POST['age'];
    $Therapist = $_POST['therapist'];
    $Date = $_POST['date'];
    $Time = $_POST['time'];

    // Insert appointment into the database
    $sql = "INSERT INTO appoinments (patient_name, age, therapist, date, time) VALUES ('$Patient_name' , '$Age' , '$Therapist', '$Date', '$Time')";

    if ($conn->query($sql) === TRUE) {
        echo "Appointment successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch appointments from the database for calendar
$appointments = [];
$sql = "SELECT date FROM appoinments";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $appointments[] = $row['date'];
    }
}
?>
    


        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleBtn = document.querySelector('.toggle-btn');
            const sidebarMenu = document.querySelector('.sidebar-menu');

            // Toggle Sidebar Menu
            toggleBtn.addEventListener('click', function() {
                sidebarMenu.classList.toggle('open');
            });
        });

//doctor profile pop up

        document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".slide");
    const popupOverlay = document.createElement("div");
    popupOverlay.className = "popup-overlay";

    const popup = document.createElement("div");
    popup.className = "popup";

    const popupClose = document.createElement("button");
    popupClose.className = "popup-close";
    popupClose.textContent = "Close";

    popupClose.addEventListener("click", () => {
        popupOverlay.style.display = "none";
    });

    popupOverlay.appendChild(popup);
    document.body.appendChild(popupOverlay);

    slides.forEach(slide => {
        slide.addEventListener("click", () => {
            const img = slide.querySelector("img").src;
            const name = slide.querySelector("h3").textContent.trim();
            const speciality = slide.querySelector(".caption").textContent.trim();

            popup.innerHTML = `
                <img src="${img}" alt="${name}">
                <h3>${name}</h3>
                <p>${speciality}</p>
            `;
            popup.appendChild(popupClose);
            popupOverlay.style.display = "flex";
        });
    });
});

        </script>







        <section class="service-header" id="WHAT WE TREAT">
            <div class="header-service">
                <h2>WHAT WE TREAT</h2><br>
                <h1>We're here to help with your <br>communication needs</h1>
                <a href="#" class="see-more">See all that we treat &rarr;</a>
            </div>

            <div class="services">

                <div>
                    <div class="service-card" data-service="speech-delay">
                        <div class="icon" style="background-color: #77C9D4;"></div>
                        <p>Speech Delay</p>
                    </div><br><br>
                    <div class="service-card" data-service="voice-disorder">
                        <div class="icon" style="background-color: #FEC601;"></div>
                        <p>Voice Disorder</p>
                    </div><br><br>
                    <div class="service-card" data-service="aphasia">
                        <div class="icon" style="background-color: #FA7268;"></div>
                        <p>Aphasia</p>
                    </div>
                </div>

                <div>
                    <div class="service-card" data-service="autism">
                        <div class="icon" style="background-color: #FF5722;"></div>
                        <p>Autism Spectrum Disorder</p>
                    </div><br><br>
                    <div class="service-card" data-service="lisp">
                        <div class="icon" style="background-color: #264653;"></div>
                        <p>Lisp</p>
                    </div><br><br>
                    <div class="service-card" data-service="stuttering">
                        <div class="icon" style="background-color: #87CEEB;"></div>
                        <p>Stuttering</p>
                    </div>
                </div>

                <div>
                    <div class="service-card" data-service="apraxia">
                        <div class="icon" style="background-color: #ff562274;"></div>
                        <p>Apraxia Speech Therapy</p>
                    </div><br><br>
                    <div class="service-card" data-service="sound">
                        <div class="icon" style="background-color: #198156;"></div>
                        <p>Speech Sound Disorders</p>
                    </div><br><br>
                    <div class="service-card" data-service="accent">
                        <div class="icon" style="background-color: #477e94;"></div>
                        <p>Accent Modification</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
<div id="serviceModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2 id="modal-title"></h2>
        <img id="modal-image" alt="">
        <p id="modal-description"></p>
        <h3>Symptoms:</h3>
        <ul id="modal-symptoms"></ul>
    </div>
</div>
<script>const services = {
    "speech-delay": {
        title: "Speech Delay",
        description: "Speech delay refers to a delay in the development or use of speech.",
        symptoms: ["Limited vocabulary", "Difficulty forming sentences", "Pronunciation issues"],
        image: "../Resourses/Child/deay-child.jpeg"
    },
    "voice-disorder": {
        title: "Voice Disorder",
        description: "Voice disorders involve issues with pitch, volume, or tone.",
        symptoms: ["Hoarseness", "Loss of voice", "Difficulty projecting"],
        image: "../Resourses/Child/Voice Disorder-child.png"
    },
    "aphasia": {
        title: "Aphasia",
        description: "Aphasia is a language disorder affecting communication abilities.",
        symptoms: ["Difficulty speaking", "Trouble understanding language", "Struggles with reading or writing"],
        image: "../Resourses/Child/Aphasia-child.jpg"
    },
    "autism": {
        title: "Autism Spectrum Disorder",
        description: "ASD affects social, communication, and behavioral skills.",
        symptoms: ["Difficulty in social interactions", "Repetitive behaviors", "Sensory sensitivities"],
        image: "../Resourses/Child/Autism-child.jpg"
    },
    "lisp": {
        title: "Lisp",
        description: "A lisp is a speech impairment affecting pronunciation of certain sounds.",
        symptoms: ["Pronouncing 's' as 'th'", "Difficulty with 'z' sounds", "Articulation issues"],
        image: "../Resourses/Child/Lisp-child.jpg"
    },
    "stuttering": {
        title: "Stuttering",
        description: "Stuttering disrupts the normal flow of speech.",
        symptoms: ["Repetition of sounds", "Prolonged speech sounds", "Pauses while speaking"],
        image: "../Resourses/Child/Stuttering-child.jpg"
    },
    "apraxia": {
        title: "Apraxia Speech Therapy",
        description: "Apraxia is a motor speech disorder affecting speech coordination.",
        symptoms: ["Inconsistent errors", "Groping for sounds", "Difficulty with complex words"],
        image: "../Resourses/Child/Apraxia-child.jpg"
    },
    "sound": {
        title: "Speech Sound Disorders",
        description: "Speech sound disorders involve difficulty articulating specific sounds.",
        symptoms: ["Omissions", "Substitutions", "Distortions"],
        image: "../Resourses/Child/Speech-child.png"
    },
    "accent": {
        title: "Accent Modification",
        description: "Accent modification focuses on adjusting speech for clear communication.",
        symptoms: ["Difficulty with pronunciation", "Misunderstood phrases", "Strong regional accent"],
        image: "../Resourses/Child/Accent-child.jpg"
    }
};

// Modal Handling
const modal = document.getElementById("serviceModal");
const modalTitle = document.getElementById("modal-title");
const modalImage = document.getElementById("modal-image");
const modalDescription = document.getElementById("modal-description");
const modalSymptoms = document.getElementById("modal-symptoms");
const closeModal = document.querySelector(".close");

document.querySelectorAll(".service-card").forEach(card => {
    card.addEventListener("click", () => {
        const service = services[card.dataset.service];
        modalTitle.innerText = service.title;
        modalDescription.innerText = service.description;
        modalImage.src = service.image;
        modalSymptoms.innerHTML = service.symptoms.map(symptom => `<li>${symptom}</li>`).join("");
        modal.style.display = "flex";
    });
});

closeModal.addEventListener("click", () => {
    modal.style.display = "none";
});

window.addEventListener("click", (e) => {
    if (e.target === modal) modal.style.display = "none";
});
</script>


        <section class="offline-video" id="offline-video">
            <h3 class="section-title">GRAB YOUR OFFLINE VIDEOS NOW</h3>
            <p class="section-subtitle">Disease Video Suggestions</p><br>
            <div class="video">
            <?php
// Connect to the database
$connect = mysqli_connect("localhost", "root", "", "vocal_vantage");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get search query if it exists
$search = '';
if (isset($_POST['search'])) {
    $search = mysqli_real_escape_string($connect, $_POST['search']);
}

// Fetch videos from the database with search filter
$sql = "SELECT * FROM therapist_upload_video WHERE 
        videotitle LIKE '%$search%' OR 
        agegroup LIKE '%$search%' OR 
        therapycategory LIKE '%$search%'";

$result = mysqli_query($connect, $sql);
?>
<!-- Search Bar -->
<div class="search-bar">
            <form method="POST" action="">
                <input type="text" name="search" placeholder="Search by title, age group, or category" value="<?php echo htmlspecialchars($search); ?>" />
            </form>
        </div>

        <div class="video-row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="video-card">';
                    echo '<video controls>
                            <source src="../therapist/videos/' . htmlspecialchars($row['filename']) . '" type="video/mp4">
                            Your browser does not support the video tag.
                          </video>';
                    echo '<div class="video-details">';
                    echo '<div class="video-title">' . htmlspecialchars($row['videotitle']) . '</div>';
                    echo '<div class="video-description">' . htmlspecialchars($row['videodescription']) . '</div>';
                    echo '<div class="video-meta">
                            Age Group: ' . htmlspecialchars($row['agegroup']) . ' | 
                            Therapy Category: ' . htmlspecialchars($row['therapycategory']) . '
                          </div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No videos found matching your search.</p>";
            }

            // Close the connection
            mysqli_close($connect);
            ?>
            
        </div><br><br><center>
            <button><a href="video_list.php">See More Videos</a></button>
            </center> <br><br><br>
    </div>

        </section>


        <section class="Activities-detail" id="Activities-detail">
            <h3 class="section-title">MAKE YOUR SPEECH BETTER with VOCAL VANTAGE</h3>
            <p class="section-subtitle">Activities</p><br>
            <div class="activity">
            <?php
$connect = mysqli_connect("localhost", "root", "", "vocal_vantage");

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch uploaded activities from the database
$sql = "SELECT * FROM activities_upload";
$result = mysqli_query($connect, $sql);
?>
<?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $videoPath = "../therapist/activities/" . htmlspecialchars($row['filename']);
                $title = htmlspecialchars($row['activitytitle']);
                $description = htmlspecialchars($row['activitydscription']);
                echo '
                <div class="video-cards">
                    <video controls>
                        <source src="' . $videoPath . '" type="video/mp4">
                        Your browser does not support the video tag.
                    </video><br>
                    
                    <div class="video-title"> '. $title . ' </div><br>
                    <div class="video-description">' . $description . '</div><br>
                </div>
                ';
            }
        } else {
            echo '<p style="text-align:center; font-size:16px;">No activities available at the moment.</p>';
        }
        ?>
                
            </div>
            <br><br>
            <center>
            <button><a href="activity_list.php">See More Videos</a></button>
            </center> <br><br><br>
        </section>

        <?php include './chatbot.php'; ?>


        <!-- Footer -->
        <footer class="footer">
            <div class="footer-container">
                <div class="footer-about">
                    <h2>Vocal Vantage</h2>
                    <p>Vocal Vantage is a convenient, effective, and affordable online speech therapy for children and
                        adults. We'll help you communicate at your best!</p>
                    <p>Join now and get matched to a licensed speech therapist to improve your future.</p>
                    <a href="#" class="btn-get-started">Get Vocal Vantage</a><br><br>
                    <div class="social-icons">
                        <a href="#"><img src="../Resourses/index/facebook.png" alt="Facebook"></a>
                        <a href="#"><img src="../Resourses/index/youtube.png" alt="YouTube"></a>
                        <a href="#"><img src="../Resourses/index/instagram.png" alt="Instagram"></a>
                    </div>
                </div>
                <div class="footer-links">
                    <div>
                        <h3>Company</h3>
                        <ul>
                            <li><a href="#who we are">Who we are</a></li>
                            <li><a href="#What we offer">What we offer</a></li>
                            <li><a href="#Quick Website Tour">Website Tour</a></li>
                            <li><a href="#In Session what we do">Features</a></li>
                            <li><a href="#Doctor-Detail-Profile">Team</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3>We Treat</h3>
                        <ul>
                            <li><a href="#">Child/Toddler Speech Disorders</a></li>
                            <li><a href="#">Adult Speech Disorders</a></li>
                            <li><a href="#">Language Disorder/Delay</a></li>
                            <li><a href="#">Early Childhood Development</a></li>
                            <li><a href="#">Speech Sound Disorders</a></li>
                            <li><a href="#">Stuttering and Fluency</a></li>
                            <li><a href="#">And More...</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-contact">
                    <h3>Contact Us</h3>
                    <p>+1-919-589-7941</p>
                    <p>(9am-5pm ) M-F</p>
                    <p><a href="mailto:info@vocalvantage.com">info@vocalvantage.com</a></p>
                </div>
            </div>
        </footer>
    </main>

</body>

</html>