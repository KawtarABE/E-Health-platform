<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add doctor</title>
        <link rel="stylesheet" href="../view_user/style1.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'> 
    </head>
    <body>
        <header class="header">
            <a href="" class="logo"><i class='bx bx-pulse'></i>E-health</a>
        <nav class="list">
            <a href="../../index.html">Home</a>
        </nav>
        </header>
        <div class="register">
            <form action="../../controlleur/controlleur_admin.php?action=add_doctor" method="post">
                <h3>New doctor</h3>
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First name</span>
                        <input type="text" name="first_name" class="box" placeholder="Enter your first name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Last name</span>
                        <input type="text" name="last_name" class="box" placeholder="Enter your last name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" class="box" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Category</span>
                        <select class="box" name="cathegory" placeholder="Enter your cathegory" required>
                            <option>Addiction_medicine</option>
                            <option>Cardiology </option>
                            <option>Dentistry</option>
                            <option>Obstetrics</option>
                            <option>Neurology</option>
                            <option>Psychiatry</option>
                            <option>general</option>
                            <option>Allergist</option>
                            <option>eyes</option>
                            <option>ears</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" class="box" placeholder="Enter your password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm password</span>
                        <input type="password" name="password1" class="box" placeholder="Confirm password" required>
                    </div>
                </div>
                <div class="gender-details">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                            <div class="male">
                            <input type="radio" class="sex" name="sex" value="male">
                            <label>Male</label>
                            </div>
                            <div class="female">
                            <input type="radio" class="sex" name="sex" value="female">
                            <label>Female</label>
                            </div>               
                    </div>
                </div>
                <input type="submit" name="submit" value="Add" class="btn">
            </form>
        </div>
    </body>
</html>
    </body>