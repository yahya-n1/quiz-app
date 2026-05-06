# Quiz App

## Features
- User login/signup system
- 10-question quiz with timer
- Answer feedback (correct/wrong)
- Score saving using MySQL
- Profile page with history
- Leaderboard (top 10 users)
- Modern UI with animations

## How to Run
1. Upload files to a PHP hosting service (InfinityFree)
2. Create MySQL database
3. Update db.php with credentials
4. Run the app via browser

## Live Demo
https://quiz-app.page.gd

## Database Schema
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    score INT,
    total_questions INT
);
