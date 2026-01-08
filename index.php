<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StudyNest - Notes</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    /* BASIC RESET */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #f8f9fa;
      line-height: 1.6;
    }

    /* NAVBAR */
    nav {
      background-color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      position: fixed;
      top: 0;
      width: 100%;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      z-index: 1000;
    }

    nav a {
      text-decoration: none;
      color: #333;
      margin: 0 15px;
      font-weight: bold;
    }

    nav a:hover {
      color: #f4b400;
    }

    .brand {
      font-size: 22px;
    }

    .brand span {
      color: #f4b400;
    }

    /* MAIN CONTENT */
    #about {
      margin-top: 120px;
      padding: 40px;
      text-align: center;
    }

    #about h2 {
      color: #f4b400;
      text-transform: uppercase;
      margin-bottom: 20px;
    }

    #about p {
      max-width: 700px;
      margin: 10px auto;
      color: #555;
      text-align: justify;
    }

    #about img {
      margin-top: 20px;
      width: 80%;
      max-width: 500px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    /* FOOTER */
    footer {
      background-color: #222;
      color: #fff;
      text-align: center;
      padding: 15px;
      margin-top: 40px;
    }

    /* MODALS */
    .modal {
      display: none;
      position: fixed;
      z-index: 1001;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      width: 90%;
      max-width: 400px;
      text-align: left;
    }

    .modal-content h2 {
      margin-bottom: 15px;
      text-align: center;
    }

    .modal-content input {
      width: 100%;
      padding: 8px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .modal-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .btn {
      padding: 8px 15px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      color: white;
    }

    .btn-success { background: #28a745; }
    .btn-warning { background: #f4b400; }
    .btn-danger { background: #dc3545; }
    .btn-secondary { background: #6c757d; }

    .btn:hover {
      opacity: 0.9;
    }

    .show { display: flex; }
  </style>
</head>

<body>
    <nav>
     <img src="Logo.png" alt="StudyNest Logo" style="width: 80px;height: 80px;flex-shrink: 0;"> 
    <div class="brand">Study<span>Nest</span></div>
    <div>
      <a href="home.html">Home</a>
      <a href="#about">About</a>
      <a href="#login" onclick="openModal('facultyModal')">Faculty Login</a>
      <a href="#login" onclick="openModal('studentModal')">Student Login</a>
      <a href="#login" onclick="openModal('adminModal')">Admin</a>
      <a href="privacy.html">Privacy</a>
      <a href="contact.html">Contact</a>
    </div>
  </nav>

  <section id="about">
    <h2>About StudyNest</h2>
    <p>
      Welcome to <strong>StudyNest</strong> – your go-to platform for learning web development, multimedia, and animation.
      Our mission is to provide easy-to-understand resources and tutorials for students and beginners who want to build
      strong foundations in modern technologies.
    </p>
    <p>
      Whether you're learning HTML, CSS, JavaScript, or want to dive into multimedia content, StudyNest is here to help.
      Stay tuned for regular updates and new learning modules!
    </p>
    <img src="images/Jan-Business_team_8.jpg" alt="About StudyNest">
  </section>

  <footer>
    <p>&copy; 2025 StudyNest. All rights reserved.</p>
  </footer>

  <div class="modal" id="facultyModal">
    <div class="modal-content">
      <h2>Faculty Login</h2>
      <form action="Admin/adminlogin.php" method="POST">
        <label>Username</label>
        <input type="text" name="fac_username" required>
        <label>Password</label>
        <input type="password" name="fac_password" required>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="closeModal('facultyModal')">Close</button>
          <button type="submit" class="btn btn-success" name="faculty_login">Login</button>
        </div>
      </form>
    </div>
  </div>


  <div class="modal" id="studentModal">
    <div class="modal-content">
      <h2>Student Login</h2>
      <form action="Admin/adminlogin.php" method="POST">
        <label>Username</label>
        <input type="text" name="student_username" required>
        <label>Password</label>
        <input type="password" name="student_password" required>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="closeModal('studentModal')">Close</button>
          <button type="submit" class="btn btn-warning" name="student_login">Login</button>
        </div>
      </form>
    </div>
  </div>

  <!-- ADMIN MODAL -->
  <div class="modal" id="adminModal">
    <div class="modal-content">
      <h2>Admin Login</h2>
      <form action="Admin/adminlogin.php" method="POST">
        <label>Username</label>
        <input type="text" name="admin_username" required>
        <label>Password</label>
        <input type="password" name="admin_password" required>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" onclick="closeModal('adminModal')">Close</button>
          <button type="submit" class="btn btn-danger" name="admin_login">Login</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function openModal(id) {
      document.getElementById(id).classList.add("show");
    }
    function closeModal(id) {
      document.getElementById(id).classList.remove("show");
    }
  </script>
</body>
</html>
