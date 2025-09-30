<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style>
        body {
            /* Gradient galaxy: dark purple (#2d0036), dark blue (#0f2027), navy (#1a1a2e) */
            background: linear-gradient(135deg, #2d0036 0%, #0f2027 60%, #1a1a2e 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .profile-container {
            width: 400px;
            text-align: center;
            font-family: Arial, sans-serif;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.3);
            padding: 30px 20px;
        }
        .profile-img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 1px solid #ccc;
            background: #eee;
            margin-bottom: 75px;
            display: inline-block;
        }
        .profile-label {
            background: rgba(255,255,255,0.15);
            color: #fff;
            margin: 20px 0;
            padding: 20px;
            font-size: 20px;
            font-family: poppins, sans-serif;
            border-radius: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-img">
            <img src="https://i.pinimg.com/736x/97/bf/ed/97bfed7103737e138151931607f16a20.jpg" alt="Profile" style="width:200px; height:200px; border-radius:50%;">
        </div>
        <div class="profile-label">{{ $nama }}</div>
        <div class="profile-label">{{ $kelas }}</div>
        <div class="profile-label">{{ $npm }}</div>
    </div>
</body>
</html>
