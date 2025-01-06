<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vocal Vantage - Welcome Page</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #E9EDF4;
            color: #000E00;
            animation: fadeIn 1s ease-in-out;
        }
        /* Keyframes for animations */
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        @keyframes slideIn {
            from {
                transform: translateX(-20px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        @keyframes buttonHover {
            from {
                transform: scale(1);
            }
            to {
                transform: scale(1.1);
            }
        }
        
        header {
            position: relative;
        }
        /* Navbar */
        
        .navbar {
            display: flex;
            align-items: center;
            padding: 0.3rem 1rem;
            background-color: #E9EDF4;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar .logo-image{
            width: 90px;
            height: 90px;
            margin-left: 50px;
        }
        .navbar .logo {
            font-size: 1.3rem;
            font-weight: bold;
            color: #028355;
            background-color: #FFFFFF;
            padding: 0.5rem 0.8rem;
            border-radius: 35px;
            margin-right: 80px;
            animation: slideIn 4s ease forwards;
        }
        
        .navbar nav {
            background-color: #FFFFFF;
            padding: 0.5rem 0.5rem;
            border-radius: 35px;
            margin-right: 100px;
        }
        
        .navbar nav a {
            margin: 0 1.0rem;
            text-decoration: none;
            color: #000E00;
            font-size: 1.1rem;
            transition: color 0.3s;
        }
        
        .navbar nav a:hover {
            padding: 0.2rem 1.0rem;
            background-color: #028355;
            border-radius: 35px;
            color: #FFFFFF;
        }
        
        .navbar .auth-buttons {
            background-color: #FFFFFF;
            padding: 0.01rem 0.5rem;
            border-radius: 35px;
        }
        
        .auth-buttons .login,
        .auth-buttons .signup {
            padding: 0.6rem 1.0rem;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s, color 0.3s;
        }
        
        .auth-buttons .signup {
            background-color: transparent;
            color: #000E00;
        }
        
        .auth-buttons .signup:hover {
            font-weight: bold;
            font-size: 1.1rem;
            color: #028355;
            animation: buttonHover 0.3s forwards;
        }
        
        .auth-buttons .login {
            padding: 0.3rem 1.0rem;
            background-color: #028355;
            color: white;
        }
        
        .auth-buttons .login:hover {
            border: 1px solid #028355;
            background-color: #E9EDF4;
            color: #028355;
            animation: buttonHover 0.3s forwards;
        }
        /*Main Content*/
        
        .main-content {
            margin-left: 10px;
            display: flex;
            padding: 2rem;
            gap: 1rem;
            animation: fadeIn 1.2s ease-in-out;
        }
        
        .main-content-overlay {
            background-color: rgba(0, 0, 0, 0.3);
            position: absolute;
        }
        
        .intro {
            display: flex;
            align-items: center;
        }
        
        .text-content h1 {
            font-size: 4rem;
            line-height: 1.2;
            color: #2E2E2E;
            animation: slideIn 8s ease forwards;
            ;
        }
        
        .text-content h1 span {
            margin-left: 50px;
            color: #028355;
            animation: slideIn 9s ease forwards;
        }
        
        .text-content p {
            margin: 1.5rem 0;
            color: #666;
            font-size: 1.2rem;
            line-height: 1.6;
            animation: slideIn 9s ease forwards;
            ;
        }
        
        .buttons .get-started,
        .buttons .explore {
            padding: 0.8rem 1.8rem;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1.1rem;
            transition: transform 0.3s;
        }
        
        .buttons .get-started:hover,
        .buttons .explore:hover {
            animation: buttonHover 0.3s forwards;
        }
        
        .buttons .get-started {
            background-color: #028355;
            color: white;
            margin-right: 1rem;
            border: 1px solid #028355;
        }
        
        .buttons .get-started:hover {
            background-color: white;
            color: #028355;
            font-weight: bold;
            margin-right: 1rem;
        }
        
        .buttons .explore {
            background-color: transparent;
            color: #028355;
            border: 1px solid #028355;
        }
        
        .buttons .explore:hover {
            color: #028355;
            font-weight: bold;
            background-color: white;
            border: 1px solid #028355;
        }
        /* Image Content */
        
        .image-content {
            margin-left: 15px;
            position: relative;
            width: 40%;
        }
        
        .image-content img {
            width: 190%;
            height: auto;
            border-radius: 15px;
            animation: slideIn 5s ease forwards;
            ;
        }
        
        .image-content .overlay {
            bottom: 13%;
            width: 60%;
            margin-left: 385px;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 1.2rem;
            border-radius: 12px;
            text-align: center;
            font-size: 1.4rem;
            opacity: 0;
            animation: slideIn 5.5s ease forwards;
        }
        
        .image-content .overlay span {
            font-size: 0.9rem;
            display: block;
            margin-top: 0.3rem;
        }
        
        .image-content .tags {
            align-items: end;
            position: absolute;
            bottom: 5%;
            left: 110%;
            display: flex;
            gap: 0.6rem;
            animation: slideIn 6.5s ease forwards;
        }
        
        .image-content .tags span {
            background-color: white;
            color: #028355;
            padding: 0.5rem 1.3rem;
            border-radius: 20px;
            font-size: 0.9rem;
        }
        /* Offerings Section */
        
        .offerings {
            margin-top: 60px;
            margin-left: 200px;
            width: 35%;
            text-align: left;
        }
        
        .offerings h2 {
            font-size: 2.0rem;
            color: #000E00;
            margin-bottom: 1rem;
            animation: slideIn 8s ease forwards;
            ;
        }
        
        .offerings p {
            color: #666;
            font-size: 1rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
            animation: slideIn 9s ease forwards;
        }
        
        .community-card {
            position: relative;
        }
        
        .community-card img {
            width: 97%;
            height: auto;
            border-radius: 15px;
            animation: slideIn 5s ease forwards;
        }
        
        .community-card .overlay {
            position: absolute;
            bottom: 3%;
            left: 51%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            width: 40%;
            height: 30%;
            border-radius: 12px;
            text-align: center;
            animation: slideIn 7s ease forwards;
        }
        
        .community-card .overlay p {
            color: #E9EDF4;
            font-size: 1.8rem;
        }
        
        .community-card .overlay span {
            font-size: 0.9rem;
            display: block;
        }
        /* Main Who We Are Section */
        
        .who-we-are-section {
            padding: 3rem 1rem;
            text-align: center;
            background: linear-gradient(#0283560a, #0283560a);
        }
        
        .who-we-are-section h3 {
            font-size: 2rem;
            color: #028355;
            margin-bottom: 1.5rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            animation: fadeIn 1s ease forwards;
        }
        
        .who-we-are {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            animation: fadeIn 1.2s ease-in-out forwards;
        }
        /* Image Styling */
        
        .who-we-are img {
            width: 400px;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.5s ease-in-out;
        }
        /* Text Styling */
        
        .who-we-are-text {
            max-width: 500px;
            color: #333;
            font-size: 1.1rem;
            line-height: 1.6;
        }
        /* Centered Button */
        
        .open-button {
            padding: 0.8rem 1.5rem;
            border: 1px solid #028355;
            background-color: #E9EDF4;
            color: #028355;
            cursor: pointer;
            border-radius: 50px;
            font-size: 1rem;
            transition: transform 0.3s, background-color 0.3s;
        }
        
        .open-button:hover {
            transform: scale(1.1);
            border: 1px solid #028355;
            background-color: white;
            color: #028355;
            font-weight: bold;
        }
        /* Popup Styles */
        
        .popup1 {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
            animation: fadeIn 0.5s ease-in-out forwards;
            z-index: 100;
        }
        
        .popup1-content {
            background-color: #E9EDF4;
            padding: 2rem;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            animation: scaleUp 0.5s ease-in-out forwards;
        }
        
        .popup1-content h4 {
            font-size: 1.5rem;
            color: #028355;
            margin-bottom: 1rem;
        }
        
        .popup1-content p {
            color: #333;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1rem;
        }
        
        .popup1-content button {
            padding: 0.7rem 1.2rem;
            border: 1px solid #028355;
            background-color: #E9EDF4;
            color: #028355;
            border-radius: 50px;
            cursor: pointer;
            font-size: 1rem;
            transition: transform 0.3s;
        }
        
        .popup1-content button:hover {
            transform: scale(1.1);
            border: 1px solid #028355;
            background-color: white;
            color: #028355;
            font-weight: bold;
        }
        /* Animations */
        
        @keyframes scaleUp {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
        /* Responsive Design */
        
        @media (max-width: 768px) {
            .who-we-are {
                flex-direction: column;
                text-align: center;
            }
            .who-we-are img {
                width: 80%;
                max-width: 250px;
            }
            .who-we-are-section h3 {
                font-size: 1.5rem;
            }
            .who-we-are-text {
                font-size: 1rem;
                padding: 1rem;
            }
            .popup1-content h4 {
                font-size: 1.2rem;
            }
            .popup1-content p {
                font-size: 0.9rem;
            }
        }
        
        @media (max-width: 480px) {
            .who-we-are img {
                width: 90%;
                max-width: 200px;
            }
            .who-we-are-section h3 {
                font-size: 1.3rem;
            }
            .who-we-are-text {
                font-size: 0.9rem;
            }
            .popup1-content {
                padding: 1.5rem;
            }
            .popup1-content h4 {
                font-size: 1.1rem;
            }
            .popup1-content p {
                font-size: 0.85rem;
            }
        }


/* General Section Styling */
section#What\ we\ offer {
    padding: 20px;
    background-color: #E9EDF4;
    text-align: center;
}

/* Carousel Container Styling */
.carousel-container-offer {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: #E9EDF4;
}
.carousel-container-offer h3{
    font-size: 1.5rem;
            color: #028355;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin-right: 30px;
}
.carousel-container-offer h4{
    font-size: 2rem;
            margin-right: 30px;
            color: #000E00;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.carousel-container-offer p{
    color: #666;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
/* Slide Track Styling */
.slide-track-offer {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    margin-top: 20px;
}

/* Slide Offer Styling */
.slide-offer {
    background-color: #E9EDF4;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 15px;
    text-align: center;
    transition: transform 0.3s ease;
}

.slide-offer:hover {
    transform: scale(1.05);
}

/* Slide Image Styling */
.slide-offer img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 10px;
}

/* Slide Caption Styling */
.caption-offer h3 {
    margin: 10px 0 5px;
    font-size: 1.2rem;
    color: #333;
}

.caption-offer {
    font-size: 0.95rem;
    color: #666;
    line-height: 1.5;
}




        /* Quick Website Tour Section Styling */
        
        #Quick\ Website\ Tour {
            padding: 5rem 2rem;
            background-color: white;
            text-align: center;
        }
        
        #Quick\ Website\ Tour h3 {
            font-size: 1.5rem;
            color: #028355;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin-right: 30px;
        }
        
        #Quick\ Website\ Tour h4 {
            font-size: 2rem;
            margin-right: 30px;
            color: #000E00;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        /* Container for Horizontal Layout */
        
        .section {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        /* Video Styling */
        
        .website-tour video {
            width: 620px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        /* Text Content Styling */
        
        .website-tour-text p {
            max-width: 400px;
            text-align: center;
            font-size: 1rem;
            color: #333;
            margin-top: 30px;
            margin-right: 30px;
            line-height: 1.6;
        }
        
        .vedieo-button {
            padding: 0.8rem 1.5rem;
            border: 1px solid white;
            background-color: #b5625b;
            color: white;
            cursor: pointer;
            border-radius: 50px;
            font-size: 1rem;
            transition: transform 0.3s, background-color 0.3s;
            margin-right: 30px;
        }
        
        .vedieo-button:hover {
            transform: scale(1.1);
            border: 1px solid #b5625b;
            background-color: white;
            color: #b5625b;
            font-weight: bold;
        }
        /* Responsive Design */
        
        @media (max-width: 768px) {
            #Quick\ Website\ Tour h3 {
                font-size: 1.8rem;
            }
            .section {
                flex-direction: column;
                align-items: center;
            }
            .website-tour video {
                width: 100%;
                max-width: 500px;
            }
            .website-tour-text {
                text-align: center;
                font-size: 0.95rem;
                max-width: 100%;
            }
        }
        
        @media (max-width: 480px) {
            #Quick\ Website\ Tour h3 {
                font-size: 1.5rem;
            }
            .website-tour-text {
                font-size: 0.9rem;
            }
        }
        /* In Session What We Do Section */
        
        #In\ Session\ what\ we\ do {
            padding: 3rem 1rem;
            background: linear-gradient(#E9EDF4, white);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
        }
        
        #In\ Session\ what\ we\ do h3 {
            color: #000E00;
            font-weight: bold;
            font-size: 2.4rem;
            margin-bottom: 1rem;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        
        #In\ Session\ what\ we\ do h4 {
            font-size: 1.5rem;
            color: #028355;
            text-align: center;
            margin-bottom: 1rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        
        #In\ Session\ what\ we\ do p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 2rem;
        }
        
        .session2-container {
            display: flex;
            justify-content: space-around;
            max-width: 1200px;
            gap: 2rem;
            flex-wrap: wrap;
        }
        
        .section2 {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2rem;
            width: 100%;
            max-width: 45%;
        }
        
        .image-container {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 2rem;
            background-color: #02835611;
            border-radius: 50px 0 50px 0;
            transition: transform 0.3s ease;
        }
        
        .image-container:hover {
            transform: translateY(-5px);
        }
        
        .image-container img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 10px;
        }
        
        .description {
            flex: 1;
        }
        
        .description h2 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #028355;
        }
        
        .description b {
            font-size: 1rem;
            font-weight: 500;
            color: #000E00;
        }
        /* Responsive Design */
        
        @media (max-width: 1024px) {
            .section2 {
                max-width: 100%;
            }
        }
        
        @media (max-width: 768px) {
            #In\ Session\ what\ we\ do h3 {
                font-size: 1.8rem;
            }
            .session2-container {
                flex-direction: column;
                gap: 1.5rem;
            }
            .image-container img {
                width: 50px;
                height: 50px;
            }
            .description h3 {
                font-size: 1.5rem;
            }
            .description b {
                font-size: 1rem;
            }
            .description p {
                font-size: 0.9rem;
            }
        }
        
        @media (max-width: 480px) {
            #In\ Session\ what\ we\ do h3 {
                font-size: 1.5rem;
            }
            .description h3 {
                font-size: 1.3rem;
            }
            .description b {
                font-size: 0.9rem;
            }
            .description p {
                font-size: 0.8rem;
            }
            .image-container {
                padding: 1.5rem;
            }
        }

    /* General Section Styling */
    #Doctor-Detail-Profile {
        background-color: white;
        padding: 60px;
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
        gap: 40px;
        animation: scroll 60s linear infinite;
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
    padding: 15px;
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
        /* General Styling for Booking Section */
        
        .booking {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
            padding: 2rem;
            margin: 2rem auto;
            max-width: 1200px;
            background: linear-gradient( white, #E9EDF4);
            /* Soft gradient background */
            border-radius: 0 80px 0 80px;
            position: relative;
            /* For animations */
            overflow: hidden;
        }
        
        .booking::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.5), transparent 70%);
            z-index: 0;
            animation: pulse 8s infinite;
            /* Subtle glow animation */
        }
        
        @keyframes pulse {
            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }
        
        .booking img {
            flex: 1;
            max-width: 90%;
            height: 350px;
            border-radius: 0 80px 0 80px;
            object-fit: cover;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Smooth hover effects */
            z-index: 1;
        }
        
        .booking img:hover {
            transform: scale(1.05);
            /* Slight zoom on hover */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            /* Add shadow on hover */
        }
        
        .booking-text {
            flex: 2;
            text-align: left;
            padding: 1rem;
            z-index: 1;
            /* Ensure it's above the background effects */
        }
        
        .booking-text h3 {
            font-size: 1.6rem;
            font-weight: bold;
            color: #007a5e;
            margin-bottom: 1rem;
            text-align: center;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            /* Text shadow for depth */
        }
        
        .booking-text p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #555;
            text-align: center;
            background: linear-gradient(145deg, #ffffff, #E9EDF4);
            /* Semi-transparent background */
            padding: 0.5rem 1rem;
            border-radius: 0 80px 0 80px;
            transition: background 0.3s ease;
        }
        /* Header Styling */
        
        h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #000E00;
            margin-bottom: 1rem;
            margin-top: 3rem;
            letter-spacing: 2px;
            /* Unique spacing for a bold title */
            position: relative;
            z-index: 1;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        
        p {
            font-size: 1.3rem;
            color: #666;
        }
        /* Responsive Design */
        
        @media (max-width: 768px) {
            .booking {
                flex-direction: column;
                text-align: center;
                padding: 1.5rem;
            }
            .booking img {
                width: 100%;
                height: auto;
            }
            .booking-text {
                padding: 1rem 0;
            }
            .booking-text h3 {
                font-size: 1.8rem;
            }
            .booking-text p {
                font-size: 0.9rem;
            }
            h2 {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            .booking {
                padding: 1rem;
                margin: 1rem;
            }
            .booking-text h3 {
                font-size: 1.4rem;
            }
            .booking-text p {
                font-size: 0.85rem;
            }
            h2 {
                font-size: 1.6rem;
            }
        }
        
        .Offline-Video {
            padding: 20px;
            background: linear-gradient(#E9EDF4, white);
            font-family: Arial, sans-serif;
        }
        
        .Offline-Video h2 {
            font-size: 2rem;
            color: #000E00;
            margin-bottom: 10px;
        }
        
        .Offline-Video p {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.5;
        }
        
        .video {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
        }
        
        .video img {
            max-width: 100%;
            height: 320px;
            margin-bottom: 50px;
            border-radius: 80px 0 80px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .video-text {
            text-align: center;
            margin-left: 200px;
            margin-right: 20px;
        }
        
        .video-text h3 {
            font-size: 1.6rem;
            color: #028355;
            margin-bottom: 10px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        
        .video-text p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.5;
        }
        /* Mobile Responsiveness */
        
        @media (max-width: 768px) {
            .video {
                flex-direction: column;
                text-align: center;
            }
            .video img {
                max-width: 80%;
                margin: 0 auto;
            }
            .video-text {
                max-width: 100%;
                margin-top: 20px;
            }
            .Offline-Video h2 {
                font-size: 24px;
            }
            .Offline-Video p,
            .video-text p {
                font-size: 14px;
            }
            .video-text h3 {
                font-size: 20px;
            }
        }
        /*Secue the Securuty*/
        
        .secure-section {
            padding: 20px;
            background: linear-gradient(#E9EDF4, white);
            font-family: Arial, sans-serif;
        }
        
        .secure-section h2 {
            font-size: 2rem;
            color: #000E00;
            margin-bottom: 10px;
            text-align: center;
        }
        
        .secure-section p {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.5;
            margin-bottom: 3rem;
        }
        
        .secure,
        .documentation {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-top: 20px;
            margin-bottom: 50px;
            margin-left: 180px;
            margin-right: 180px;
            border: 1px solid #ddd;
            border-radius: 0 80px 0 80px;
            background: linear-gradient(#E9EDF4, white);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }
        
        .secure img {
            max-width: 40%;
            height: auto;
            border-radius: 0 80px 0 80px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .documentation img {
            max-width: 100%;
            height: auto;
            border-radius: 0 80px 0 80px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .secure-text,
        .documentation-text {
            max-width: 60%;
            text-align: center;
            margin-left: 50px;
        }
        
        .secure-text h3,
        .documentation-text h3 {
            font-size: 1.6rem;
            color: #028355;
            text-align: center;
            margin-bottom: 20px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        
        .secure-text p,
        .documentation-text p {
            font-size: 1.1rem;
            text-align: center;
            color: #666;
            line-height: 1.6;
        }
        /* Mobile Responsiveness */
        
        @media (max-width: 768px) {
            .secure,
            .documentation {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .secure img,
            .documentation img {
                max-width: 80%;
                margin-bottom: 15px;
            }
            .secure-text,
            .documentation-text {
                max-width: 100%;
                text-align: center;
            }
            .secure-section h2 {
                font-size: 2rem;
                color: #000E00;
            }
            .secure-text h3,
            .documentation-text h3 {
                font-size: 1.6rem;
                color: #028355;
                margin-bottom: 10px;
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            }
            .secure-text p,
            .documentation-text p {
                font-size: 14px;
                color: #666;
            }
        }
        /* Customer Review */
        
        .testimonials {
            padding: 50px 5%;
            background-color: #f9f9f9;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        
        .section-title {
            font-size: 1.2rem;
            color: #028355;
            letter-spacing: 1px;
            margin-bottom: 10px;
            text-transform: uppercase;
        }
        
        .section-subtitle {
            font-size: 2.5rem;
            color: #000E00;
            margin-bottom: 40px;
            font-weight: bold;
        }
        /* Testimonial Cards */
        
        .testimonial-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .testimonial-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            overflow: hidden;
            text-align: left;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        /* Video Thumbnail Styles */
        
        .video-thumbnail {
            position: relative;
            width: 100%;
            height: 180px;
            background: #000;
        }
        
        .video-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }
        
        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #333;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        
        .play-button:hover {
            background: rgba(255, 255, 255, 1);
        }
        /*Feddback section*/ 

        .feedback-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .feedback-card {
            width: 300px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            border: 1px solid #e0e0e0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feedback-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .feedback-card h3 {
            font-size: 1.2rem;
            color: #028355;
        }

        .feedback-card p {
            color: #333;
            margin: 10px 0;
        }

        .star-rating {
            color: #f5a623;
            margin-bottom: 10px;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .feedback-card {
                width: 90%; /* Make cards wider for smaller screens */
            }

            h1 {
                font-size: 1.5rem; /* Adjust title size */
            }
        }

        @media (max-width: 480px) {
            .feedback-container {
                flex-direction: column; /* Stack cards vertically on very small screens */
                align-items: center;
            }
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

    <!-- Navbar -->
    <header class="navbar">
    <img class="logo-image" src="Resourses/index/logo 01.png">
        <div class="logo">Vocal Vantage</div>
        <nav>
            <a href="#">Home</a>
            <a href="#who we are">Who we are</a>
            <a href="#What we offer">What we offer</a>
            <a href="#Quick Website Tour">Website Tour</a>
            <a href="#In Session what we do">Features</a>
            <a href="#Doctor-Detail-Profile">Team</a>
        </nav>
        <div class="auth-buttons">
            <a href="register.html"><button class="signup" >Sign up</button></a>
            <a href="login.html"> <button class="login">Log in</button></a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="main-content-overlay"></div>
        <!-- Welcome Note -->
        <section class="intro">
            <div class="text-content">
                <h1>Mindfulness<br><span>More Calm</span><br>Meaningful</h1>
                <p>-------- We offer a holistic approach to<br> speech therapy. Blending traditional <br>practices with modern techniques to help<br> you achieve harmony and inner peace.</p>
                <div class="buttons">
                <a href="login.html"><button class="get-started">Get started</button>
                <a href="#"></a><button class="explore">Explore</button>
                </div>
            </div>
            <div class="image-content">
                <img src="Resourses/index/project-image-new.png" alt="Meditation Image">
                <div class="overlay">
                    <p><b>> 5</b></p>
                    <span>people improve their speaking ability here</span>
                </div>
                <div class="tags">
                    <span><b>Happiness</b></span>
                    <span><b>Mindfulness</b></span>
                </div>
            </div>
        </section>
        <section class="offerings">
            <h2>Explore Our Offerings</h2>
            <p>Whether you're a beginner or an experienced<br> practitioner, our community is here to <br> support your journey.</p>
            <div class="community-card">
                <img src="Resourses/index/project-image-new.png" alt="Community Image">
                <div class="overlay">
                    <p> <b>> 5</b></p>
                    <span>Join our team now<br>and start with us</span>
                </div>
            </div>
        </section>
    </main>


    <!-- Who We Are Section -->
    <section class="who-we-are-section" id="who we are">
        <center>
            <h3>WHO WE ARE</h3>
        </center>

        <div class="who-we-are">
            <img src="Resourses/index/project-image-new.png" alt="Who we are">

            <div class="who-we-are-text">
                <p>At Vocal Vantage, we are dedicated to transforming speech therapy with a tailored, secure, and interactive approach. Designed with both therapists and patients in mind, our platform empowers individuals of all ages to connect, learn, and
                    progress in their therapeutic journeys.</p><br>
                <center><button class="open-button" onclick="openPopup()">See More</button></center>
            </div>
        </div>

        <!-- Popup for more information -->
        <div class="popup1" id="popup1">
            <div class="popup1-content">
                <h4>More About Us</h4>
                <p>At Vocal Vantage, we are dedicated to transforming speech therapy with a tailored, secure, and interactive approach. Designed with both therapists and patients in mind, our platform empowers individuals of all ages to connect, learn, and
                    progress in their therapeutic journeys.</p><br>
                <p>Vocal Vantage connects patients with skilled therapists to provide effective and engaging speech therapy. Through secure live sessions and personalized exercises, our platform is dedicated to each individual's progress.</p>
                <button onclick="closePopup()">Close</button>
            </div>
        </div>

        <script>
            // Function to open the popup
            function openPopup() {
                document.getElementById("popup1").style.display = "flex";
            }

            // Function to close the popup
            function closePopup() {
                document.getElementById("popup1").style.display = "none";
            }
        </script>
    </section>


    <!-- What we offer -->
    <section id="What we offer">

        <center>

            <!-- Carousel Container -->
            <div class="carousel-container-offer">
                <h3>WHAT WE OFFER</h3><br>
                <h4>Everything you need to manage your practice in one convenient location</h4><br><br>
                
                <div class="slide-track-offer">
                    <!-- Slide 1 -->
                    <div class="slide-offer">
                        <img src="Resourses/index/scheduling.png" alt="Image 1">
                        <div class="caption-offer">
                            <h3>Scheduling</h3>
                            Calendar, availability sharing, self-serve scheduling, reminders and to-dos.</div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="slide-offer">
                        <img src="Resourses/index/billing.jpg" alt="Image 2">
                        <div class="caption-offer">
                            <h3>Billing and Invoicing</h3>
                            Full billing suite,<br> payment tracking, reporting and automation.</div>
                    </div>
                    <!-- Slide 4 -->
                    <div class="slide-offer">
                        <img src="Resourses/index/client-portal.jpg" alt="Image 4">
                        <div class="caption-offer">
                            <h3>Client Portal</h3>
                            Secure communication, digital forms, <br>resource management, payment processing and more.</div>
                    </div>
                    <!-- Slide 5 -->
                    <div class="slide-offer">
                        <img src="Resourses/index/security.jpg" alt="Image 5">
                        <div class="caption-offer">
                            <h3>Security</h3>Secure client chat, HIPAA compliant video,<br> encryption, database backups, and 24 hour monitoring.</div>
                    </div>
            </div>
<br><br>
        </center>
    </section>






    <!-- In Session what we do -->
    <section id="In Session what we do">
        <div class="section2">
            <center>
                <h3>In Session</h3>
                <h4>WHAT WE DO</h4>
                <p>When you join, our therapist will listen to your speech,<br> evaluate your needs and create a customized program that will achieve your goals in the most effective and enjoyable way!</p>
                <div class="session2-container">
                    <!-- Left Section -->
                    <div class="section2">
                        <div class="image-container">
                            <img src="Resourses/index/ISS1.png" alt="Image 1">
                            <div class="description">
                                <h2>01</h2>
                                <b>Your First Session Sets You on the Path</b>
                            </div>
                        </div>
                        <div class="image-container">
                            <img src="Resourses/index/ISS3.png" alt="Image 1">
                            <div class="description">
                                <h2>03</h2>
                                <b>Practices Between Sessions Help You Accelerate</b>
                            </div>
                        </div>
                        <div class="image-container">
                            <img src="Resourses/index/ISS5.png" alt="Image 2">
                            <div class="description">
                                <h2>05</h2>
                                <b>Tracking progress on member dashboard</b>
                            </div>
                        </div>
                    </div>


                    <!-- Right Section -->
                    <div class="section2">
                        <div class="image-container">
                            <img src="Resourses/index/IS2.png" alt="Image 3">
                            <div class="description">
                                <h2>02</h2>
                                <b>Regular Zoom Sessions Keep You Progressing </b>
                            </div>
                        </div>
                        <div class="image-container">
                            <img src="Resourses/index/IS4.png" alt="Image 3">
                            <div class="description">
                                <h2>04</h2>
                                <b>Your Success Chart Maps<br> Your <br>Journey</b>
                            </div>
                        </div>
                        <div class="image-container">
                            <img src="Resourses/index/IS6.png" alt="Image 3">
                            <div class="description">
                                <h2>06</h2>
                                <b>Celebrate Reaching <br>Your Speech Goal!</b>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
        </div>
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
                                                <img src="therapist/files/<?php echo htmlspecialchars($row['filename']); ?>"
                                                    alt="<?php echo htmlspecialchars($row['name']); ?>">
                                                <div class="caption">
                                                    <h3> <b> <?php echo htmlspecialchars($row['name']); ?></b></h3> <br>
                                                    <?php echo htmlspecialchars($row['speaciality']); ?>
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


        </div><br><br><br><br><br><br>
    </section>


    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const carousel = document.querySelector(".slide-track-doc");
            const slides = document.querySelectorAll(".slide-doc");
            let isDragging = false;
            let startX, scrollLeft, animationPaused = false;

            // Pause animation on hover
            slides.forEach(slide => {
                slide.addEventListener("mouseenter", () => {
                    carousel.style.animationPlayState = "paused"; // Stop the animation
                });

                slide.addEventListener("mouseleave", () => {
                    if (!animationPaused) carousel.style.animationPlayState = "running"; // Resume the animation
                });
            });

            // Drag functionality
            const carouselContainer = document.querySelector(".carousel-container-doc");

            carouselContainer.addEventListener("mousedown", (e) => {
                isDragging = true;
                startX = e.pageX - carouselContainer.offsetLeft;
                scrollLeft = carousel.scrollLeft;
                carousel.style.cursor = "grabbing";
                animationPaused = true;
                carousel.style.animationPlayState = "paused";
            });

            carouselContainer.addEventListener("mouseleave", () => {
                isDragging = false;
                carousel.style.cursor = "grab";
                animationPaused = false;
                carousel.style.animationPlayState = "running";
            });

            carouselContainer.addEventListener("mouseup", () => {
                isDragging = false;
                carousel.style.cursor = "grab";
                animationPaused = false;
                carousel.style.animationPlayState = "running";
            });

            carouselContainer.addEventListener("mousemove", (e) => {
                if (!isDragging) return;
                e.preventDefault();
                const x = e.pageX - carouselContainer.offsetLeft;
                const walk = (x - startX) * 1.5; // Increase drag sensitivity
                carousel.scrollLeft = scrollLeft - walk;
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

    <!-- Scheduling Booking -->
    <center>
        <h2>Simplify scheduling and minimize no-shows</h2>
        <p>Give our clients the attention they deserve and improve outcomes.</p>
    </center>
    <div class="booking">
        <img src="Resourses/index/Scheduling Booking.png" alt="Booking">

        <div class="booking-text">
            <h3>Gain and retain more clients</h3>
            <p>
                Self-Scheduling is a 24-hour service available to help your patients find and set appointments quickly from their phone or your website. <br><br>Just set your availability and you'll only see sessions scheduled when it's most convenient
                for you. Kick off each day reviewing new appointments set the night before...</p>
        </div>
    </div><br>


    <section class="Offline-Video">
        <!-- Offline Video -->
        <center>
            <h2>Offline Video</h2>
            <p>Virtual therapy that feels natural, that keeps both the clinician and the client engaged.</p>
        </center>
        <div class="video">

            <div class="video-text">
                <h3>Suggest the best video</h3>
                <p>When you enter your disease sysmptoms on our web page, <br>we suggest you watch the best video related to your disease among <br>the videos we have...</p>
            </div>
            <img src="Resourses/index/Offline.jpg" alt="Video">
        </div><br>
    </section>

    <section class="secure-section">
        <!-- Secure the Section -->
        <center>
            <h2>Video conferencing, Secure chat and built-in therapy aids</h2>
            <p>Virtual therapy that feels natural, that keeps both the clinician and the client engaged.</p>
        </center>
        <div class="secure">
            <img src="Resourses/index/Secure.png" alt="secure">

            <div class="secure-text">
                <h3>A better speechtherapy experience</h3>
                <p>
                    Zoom API video conferencing is more than just video and screen sharing; it's <br> a suite of tools and resources developed to support therapists and<br> behavioral health professionals.</p>
            </div>
        </div><br>

        <!-- Documents Report -->
        <center>
            <h2>Documentation</h2>
            <p>Spend less time on documentation</p>
        </center>
        <div class="documentation">
            <img src="Resourses/index/Documente.jpg" alt="Documentation">

            <div class="documentation-text">
                <h3>Note-taking that’s fast and flexible</h3>
                <p>
                    Vocal Vantage paperless notes makes it routine to track and record patient's<br> progress over the entire duration of their care.</p>
            </div>
        </div><br>
    

    <!--Customer Review-->
    <?php
// Database connection
$host = "localhost";
$username = "root";
$password = ""; 
$dbname = "vocal_vantage";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch feedback data
$sql = "SELECT name, description, rating FROM feedback";
$result = $conn->query($sql);

// Close the connection
$conn->close();
?>
<center>
        <h3 class="section-title">WHY PEOPLE LOVE US</h3>
        <p class="section-subtitle">Our Shining Testimonials</p>
</center>

<div class="feedback-container">
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="feedback-card">
                <div class="star-rating">
                    <?php
                    // Display star ratings
                    for ($i = 1; $i <= $row['rating']; $i++) {
                        echo '&#9733;'; // Filled star
                    }
                    for ($i = $row['rating'] + 1; $i <= 5; $i++) {
                        echo '&#9734;'; // Empty star
                    }
                    ?>
                </div>
                <p>"<?php echo htmlspecialchars($row['description']); ?>"</p>
                <h3>— <?php echo htmlspecialchars($row['name']); ?></h3>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p style="text-align: center; color: #666;">No feedback available.</p>
    <?php endif; ?>
</div>
</section>
    
   
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-about">
                <h2>Vocal Vantage</h2>
                <p>Vocal Vantage is a convenient, effective, and affordable online speech therapy for children and adults. We'll help you communicate at your best!</p>
                <p>Join now and get matched to a licensed speech therapist to improve your future.</p>
                <a href="#" class="btn-get-started">Get Vocal Vantage</a><br><br>
                <div class="social-icons">
                    <a href="#"><img src="Resourses/index/facebook.png" alt="Facebook"></a>
                    <a href="#"><img src="Resourses/index/youtube.png" alt="YouTube"></a>
                    <a href="#"><img src="Resourses/index/instagram.png" alt="Instagram"></a>
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


</body>

</html>
