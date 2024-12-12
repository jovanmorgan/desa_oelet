<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="../images/logo_dinas.png" type="" />
    <style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        font-family: Georgia, serif;
        background: linear-gradient(to right, #ffffff 50%, #FF00FF 50%);
    }

    .login-container {
        display: flex;
        background-color: #f5f5f5;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }

    .login-logo {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .login-logo img {
        width: 100px;
        height: 100px;
    }

    .login-logo h2 {
        color: #333;
    }

    .login-form {
        flex: 1;
        background-color: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }

    .login-form h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .login-form input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin: 20px 0;
        border: none;
        background-color: #FF00FF;
        color: black;
        border-radius: 10px;
        cursor: pointer;
    }

    .login-form input[type="submit"]:hover {
        background-color: #FF00FF;
    }

    .login-form .extra-button {
        width: 30%;
        padding: 3px;
        margin-top: 3px;
        border: none;
        background-color: #FFEBCD;
        color: black;
        border-radius: 3px;
        cursor: pointer;
        text-align: center;
        display: inline-block;
        text-decoration: none;
    }

    .login-form .extra-button:hover {
        background-color: #cccccc;
    }

    .captcha {
        margin: 10px 0;
    }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-logo">
            <img src="../images/logo_dinas.png" alt="Pengelolaan Dana Desa">
            <h2>Pengelolaan Dana Desa</h2>
            <p>Desa Oelet</p>
        </div>
        <div class="login-form">
            <h2>Login</h2>
            <form id="login" action="../keamanan/proses_login" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <div class="captcha">
                    <input type="checkbox" required> I'm not a robot
                </div>
                <input type="submit" value="Login">
            </form>
            <a href="../homepage.php" class="extra-button">Home</a>

        </div>
    </div>

    </style>
    <!-- End footer -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function togglePasswordVisibility(inputId) {
        var passwordInput = document.getElementById(inputId);
        var passwordIcon = document.querySelector(
            "#" + inputId + " + .show-password"
        );

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordIcon.classList.remove("fa-eye-slash");
            passwordIcon.classList.add("fa-eye");
        } else {
            passwordInput.type = "password";
            passwordIcon.classList.remove("fa-eye");
            passwordIcon.classList.add("fa-eye-slash");
        }
    }
    document.getElementById("login").addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../keamanan/proses_login", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = xhr.responseText;
                    var responseArray = response.split(':');
                    if (responseArray[0].trim() === "success") {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login berhasil!',
                            text: 'Selamat datang ' + responseArray[1],
                            timer: 1000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        }).then((result) => {
                            switch (responseArray[2].trim()) {
                                case "admin":
                                    window.location.href = "../pengguna/admin/";
                                    break;
                                case "sekretaris":
                                    window.location.href = "../pengguna/sekretaris/";
                                    break;
                                case "kepala_desa":
                                    window.location.href = "../pengguna/kepala_desa/";
                                    break;
                                case "masyarakat":
                                    window.location.href = "../pengguna/masyarakat/";
                                    break;
                                default:
                                    window.location.href = "login_pegunah";
                                    break;
                            }
                        });

                        if (rememberMe) {
                            var username = formData.get('username');
                            var password = formData.get('password');
                            document.cookie = "username=" + encodeURIComponent(
                                username) + "; path=/";
                            document.cookie = "password=" + encodeURIComponent(password) + "; path=/";
                        }
                    } else if (responseArray[0].trim() === "error_password") {
                        Swal.fire("Error", "Password yang dimasukkan salah", "error");
                    } else if (responseArray[0].trim() === "error_username") {
                        Swal.fire("Error", "Username tidak ditemukan", "error");
                    } else if (responseArray[0].trim() === "username_tidak_ada") {
                        Swal.fire("Info", "Username belum diisi", "info");
                    } else if (responseArray[0].trim() === "password_tidak_ada") {
                        Swal.fire("Info", "Password belum diisi", "info");
                    } else if (responseArray[0].trim() === "tidak_ada_data") {
                        Swal.fire("Info", "Username dan Password belum diisi", "info");
                    } else {
                        Swal.fire("Error", "Terjadi kesalahan saat proses login", "error");
                    }
                } else {
                    Swal.fire("Error", "Gagal", "error");
                }
            }
        };
        xhr.onerror = function() {
            Swal.fire("Error", "Gagal melakukan request", "error");
        };
        xhr.send(formData);
    });
    </script>
</body>

</html>