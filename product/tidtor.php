<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>I DON'T HAVE CPU</title>
<style>

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url('images/1.jpg'); /* เปลี่ยนเป็นที่อยู่ของไฟล์รูปภาพ */
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        height: 100vh;
        background-color: #f4f4f4;
    }

    h1 {
        font-weight: lighter;
        color: #333;
        text-align: center;
        font-size: 3rem;
        margin-top: 100px;
        animation: blink 1s step-start infinite; /* ใช้เฉพาะ animation กระพริบ */
    }

    @keyframes blink {
        0%, 100% { opacity: 1; } /* แสดงข้อความ */
        50% { opacity: 0; } /* ซ่อนไป */
    }

    h2 {
        font-size: 1.5rem;
        color: #555;
        text-align: center;
        margin-top: 20px;
    }

    .highlight {
        color: red;
    }

    .logo {
        display: block;
        margin: 0 auto 20px auto;
        max-width: 200px;
    }

</style>
</head>

<body>

  <!-- แทรกรูปโลโก้ -->
  <img src="images/7.jpg" alt="Logo" class="logo">

  <!-- ข้อความที่กระพริบ -->
  <h1 class="highlight">I DON'T HAVE CPU</h1>
  <h2>Email: <span class="highlight">idon'thavecpu@gmail.com</span></h2>
  <h2>Phone: <span class="highlight">0658707819</span></h2>

</body>
</html>