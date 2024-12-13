<?php
// PHP for chatbot responses
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Content-Type: application/json");
    $data = json_decode(file_get_contents("php://input"), true);
    $userMessage = strtolower(trim($data['message']));

    // Default response if no keywords are found
    $response = "I'm sorry, I couldn't understand your question. Can you please provide more details or try rephrasing?";

    // General Questions
    if (strpos($userMessage, "hello") !== false) {
        $response = "Hello! How can I assist you ?";
    } elseif (strpos($userMessage, "hi") !== false) {
        $response = "Hi! How can I assist you / ";   
    } elseif(strpos($userMessage, "register") !== false || strpos($userMessage, "sign up") !== false) {
        $response = "To register as a user, please visit the registration page. You can sign up as a therapist, patient, or parent/guardian. Once registered, you'll receive an email confirmation.";
    } elseif (strpos($userMessage, "reset password") !== false || strpos($userMessage, "forgot password") !== false) {
        $response = "To reset your password, click on the 'Forgot Password' link on the login page. Enter your registered email, and you'll receive instructions to reset your password.";
    } elseif (strpos($userMessage, "edit profile") !== false || strpos($userMessage, "update profile") !== false) {
        $response = "To edit your profile, log in to your account and go to your profile page. From there, you can update your personal information, qualifications, specialization, and availability.";
    } elseif (strpos($userMessage, "change picture") !== false || strpos($userMessage, "update picture") !== false) {
        $response = "You can update your profile picture by navigating to your profile page and clicking on the 'Change Picture' option.";
    }

    // Therapist-Related Questions
    elseif (strpos($userMessage, "schedule ") !== false || strpos($userMessage, "book session") !== false) {
        $response = "As a therapist, you can schedule sessions by accessing your calendar and selecting available time slots. Patients will be able to book those slots directly.";
    } elseif (strpos($userMessage, "upload therapy plans") !== false || strpos($userMessage, "upload exercises") !== false) {
        $response = "You can create and upload therapy plans for patients from your therapy plan management section. You can also upload exercises for your patients to follow.";
    } elseif (strpos($userMessage, "live therapy session") !== false || strpos($userMessage, "start session") !== false) {
        $response = "To start a live therapy session, go to the patient’s appointment details and click on 'Start Session.' You can choose between video/audio options and share documents/screens during the session.";
    } elseif (strpos($userMessage, "secure communication") !== false || strpos($userMessage, "secure message") !== false) {
        $response = "Yes, you can send and receive secure messages with patients and their parents/guardians through the platform’s messaging system.";
    } elseif (strpos($userMessage, "generate invoice") !== false || strpos($userMessage, "create invoice") !== false) {
        $response = "You can generate invoices by going to your billing section. Select the services provided, and the platform will create an invoice for you, which can be downloaded or emailed.";
    }

    // Patient-Related Questions
    elseif (strpos($userMessage, "book appointment") !== false || strpos($userMessage, "schedule appointment") !== false) {
        $response = "To book an appointment, go to the 'Book Appointment' section, choose your therapist, and select an available time slot that works for you.";
    } elseif (strpos($userMessage, "reschedule appointment") !== false || strpos($userMessage, "cancel appointment") !== false) {
        $response = "Yes, you can reschedule or cancel your appointment by visiting your appointment history and selecting the appointment you wish to modify.";
    } elseif (strpos($userMessage, "join live session") !== false || strpos($userMessage, "attend session") !== false) {
        $response = "To join a live therapy session, go to your scheduled appointment and click on 'Join Session' when it's time for your appointment. You will be directed to the video/audio session.";
    } elseif (strpos($userMessage, "view therapy plan") !== false || strpos($userMessage, "see therapy plan") !== false) {
        $response = "To view your therapy plan, go to the 'My Therapy Plan' section. You’ll see your personalized exercises and treatment protocol there.";
    } elseif (strpos($userMessage, "track progress") !== false || strpos($userMessage, "view progress") !== false) {
        $response = "You can track your therapy progress by accessing your session history and reviewing the progress notes provided by your therapist.";
    }

    // Parent/Guardian-Related Questions
    elseif (strpos($userMessage, "book appointment for my child") !== false || strpos($userMessage, "schedule child appointment") !== false) {
        $response = "To book an appointment for your child, log into your account, go to the 'Book Appointment' section, and select a therapist and available time slot for your child.";
    } elseif (strpos($userMessage, "reschedule child's appointment") !== false || strpos($userMessage, "cancel child's appointment") !== false) {
        $response = "Yes, you can manage your child’s appointments by navigating to your 'Appointments' section and selecting the appointment to reschedule or cancel.";
    } elseif (strpos($userMessage, "track child's progress") !== false || strpos($userMessage, "view child's progress") !== false) {
        $response = "You can track your child's therapy progress by going to the 'My Child’s Therapy' section, where you will find updates and session history shared by the therapist.";
    } elseif (strpos($userMessage, "communicate with therapist") !== false || strpos($userMessage, "talk to therapist") !== false) {
        $response = "Yes, you can securely communicate with the therapist through the platform’s messaging system to discuss your child’s therapy progress.";
    } elseif (strpos($userMessage, "view child's therapy plan") !== false || strpos($userMessage, "see child's therapy plan") !== false) {
        $response = "To view your child’s therapy plan, go to the 'My Child’s Therapy Plan' section. You will find the therapy plan, exercises, and feedback provided by the therapist.";
    }

    // Billing and Payment Questions
    elseif (strpos($userMessage, "make payment") !== false || strpos($userMessage, "pay for therapy") !== false) {
        $response = "Payments can be made through the platform’s integrated payment gateway. Choose your preferred payment method (credit/debit card) and complete the transaction.";
    } elseif (strpos($userMessage, "view invoice") !== false || strpos($userMessage, "download invoice") !== false) {
        $response = "Yes, you can view and download your invoices from the billing section of your profile.";
    } elseif (strpos($userMessage, "accepted payment methods") !== false || strpos($userMessage, "payment methods") !== false) {
        $response = "The platform accepts various payment methods, including credit cards, debit cards, and online banking.";
    }

    // Chatbot Assistance Questions
    elseif (strpos($userMessage, "help") !== false || strpos($userMessage, "assistance") !== false) {
        $response = "Simply ask your question in the chat box, and the chatbot will provide assistance. If it’s unable to answer, it will guide you to human support.";
    } elseif (strpos($userMessage, "chatbot not understand") !== false || strpos($userMessage, "not working") !== false) {
        $response = "If the chatbot doesn’t understand your query, you can either rephrase your question or click on the 'Contact Support' option for further assistance.";
    } elseif (strpos($userMessage, "book appointment chatbot") !== false || strpos($userMessage, "appointment guide") !== false) {
        $response = "The chatbot can guide you on how to book an appointment, but actual bookings will need to be made through the platform's appointment section.";
    }

    echo json_encode(["reply" => $response]);
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Popup</title>
    <style>
/* General Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

/* Chatbot Icon */
.chatbot-icon {
  position: fixed;
  bottom: 20px;
  right: 20px;
  background-color: #204060;
  color: #fff;
  border: none;
  border-radius: 50%;
  width: 70px;
  height: 70px;
  font-size: 30px;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
  animation: pulse 2s infinite;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.chatbot-icon:hover {
  transform: scale(1.2);
  box-shadow: 0 12px 25px rgba(0, 0, 0, 0.4);
}

@keyframes pulse {
  0%, 100% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1);
  }
}

/* Chat Container */
.chat-container {
  position: fixed;
  bottom: 100px;
  right: 20px;
  width: 400px;
  height: 600px;
  background: linear-gradient(135deg, #ffffff, #f8f9fa);
  border-radius: 20px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  display: none;
  flex-direction: column;
  animation: popUp 0.5s ease-in-out;
}

@keyframes popUp {
  from {
    opacity: 0;
    transform: translateY(50px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Chat Header */
.chat-header {
  background: linear-gradient(135deg, #02835640, #b3cce6);
  color: #fff;
  text-align: center;
  padding: 15px;
  font-size: 20px;
  font-weight: bold;
  letter-spacing: 1px;
  position: relative;
}

.chat-header:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 3px;
  background: linear-gradient(90deg, #02835640, #b3cce6, #02835640);
  animation: gradientMove 3s infinite linear;
}

@keyframes gradientMove {
  0% {
    background-position: 0% 50%;
  }
  100% {
    background-position: 100% 50%;
  }
}

/* Chat Box */
.chat-box {
  flex: 1;
  padding: 15px;
  background: #f4f6f9;
  overflow-y: auto;
  scroll-behavior: smooth;
}

.chat-message {
  margin: 10px 0;
  padding: 12px 18px;
  border-radius: 25px;
  max-width: 80%;
  word-wrap: break-word;
  font-size: 16px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  animation: fadeIn 0.3s ease;
}

.user-message {
  background: linear-gradient(135deg, #b3cce6, #0056b3);
  color: white;
  align-self: flex-end;
}

.bot-message {
  background: #ffffff;
  color: black;
  align-self: flex-start;
  border: 1px solid #e0e0e0;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Chat Input */
.chat-input {
  display: flex;
  padding: 10px;
  background: #fff;
  border-top: 1px solid #e0e0e0;
}

.chat-input input {
  flex: 1;
  padding: 12px 15px;
  border: 1px solid #ddd;
  border-radius: 25px;
  font-size: 16px;
  outline: none;
  transition: all 0.3s ease;
}

.chat-input input:focus {
  border-color: #007bff;
  box-shadow: 0 4px 10px rgba(0, 123, 255, 0.2);
}

.chat-input button {
  background: linear-gradient(135deg, #007bff, #0056b3);
  color: #fff;
  border: none;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  margin-left: 10px;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 18px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  transition: transform 0.3s ease;
}

.chat-input button:hover {
  transform: scale(1.1);
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
  .chat-container {
    width: 90%;
    height: 80%;
    bottom: 20px;
    right: 5%;
  }

  .chatbot-icon {
    bottom: 15px;
    right: 15px;
    width: 60px;
    height: 60px;
    font-size: 24px;
  }

  .chat-header {
    font-size: 18px;
  }

  .chat-box {
    padding: 10px;
  }

  .chat-message {
    font-size: 14px;
    padding: 10px 14px;
  }

  .chat-input input {
    padding: 10px;
    font-size: 14px;
  }

  .chat-input button {
    width: 40px;
    height: 40px;
    font-size: 16px;
  }
}

    </style>
</head>
<body>
    <!-- Chatbot Icon -->
    <button class="chatbot-icon" id="chatbot-icon">💬</button>

    <!-- Chatbot Container -->
    <div class="chat-container" id="chat-container">
        <div class="chat-header">Speech Therapy Assistant</div>
        <div id="chat-box" class="chat-box"></div>
        <div class="chat-input">
            <input type="text" id="user-input" placeholder="Type your message..." />
            <button id="send-btn">Send</button>
        </div>
    </div>

    <script>
        const chatbotIcon = document.getElementById("chatbot-icon");
        const chatContainer = document.getElementById("chat-container");
        const sendButton = document.getElementById("send-btn");
        const chatBox = document.getElementById("chat-box");
        const userInput = document.getElementById("user-input");

        // Toggle Chat Popup
        chatbotIcon.addEventListener("click", () => {
            chatContainer.style.display =
                chatContainer.style.display === "flex" ? "none" : "flex";
        });

        // Send Message
        sendButton.addEventListener("click", sendMessage);
        function sendMessage() {
            const message = userInput.value.trim();
            if (message === "") return;

            displayMessage(message, "user-message");
            userInput.value = "";

            fetch("chatbot.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ message }),
            })
                .then((response) => response.json())
                .then((data) => displayMessage(data.reply, "bot-message"))
                .catch(() =>
                    displayMessage("Sorry, an error occurred.", "bot-message")
                );
        }

        // Display Messages
        function displayMessage(message, className) {
            const messageElement = document.createElement("div");
            messageElement.textContent = message;
            messageElement.className = `chat-message ${className}`;
            chatBox.appendChild(messageElement);
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>
</body>
</html>
