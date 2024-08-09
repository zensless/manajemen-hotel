<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <title>Login</title>

    <link rel="icon" type="image/x-icon" href="../assets/image/logo.svg">

    <link rel="stylesheet" href="assets/css/global.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="m-5 ">
        <form action="views/loginController.php" method="POST" class="m-0 w-full h-[593px] relative bg-white overflow-hidden leading-[normal] tracking-[normal]">
            <img class="absolute h-full top-[0px] bottom-[0px] left-[690px] max-h-full w-[670px] object-cover" loading="lazy" alt="" src="assets/image/Login.svg" />

            <h1 class="m-0  absolute top-[45px] left-[44px] button-[50px] text-[45px] font-bold font-poppins text-firebrick text-left inline-block w-[522px] mq450:text-[27px] mq750:text-[36px]">
                Selamat Datang, <br> di Sistem Data Penunjangan Hotel!!
            </h1>
            <h2 class="m-0 absolute top-[240px] left-[44px] text-[18px] font-normal font-poppins text-black text-left inline-block w-[690px] z-[1] mq450:text-[20px]">
                Masuk untuk mengelola reservasi kamar hotel dengan mudah
            </h2>
            <input class="absolute top-[325px] left-[44px] rounded-8xs bg-white box-border w-[345px] flex flex-row items-start justify-start p-2.5 border-[1px] border-solid border-black" placeholder="Username" type="text" name="username" />

            <input class="absolute top-[425px] left-[44px] rounded-8xs bg-white box-border w-[345px] flex flex-row items-start justify-start p-2.5 border-[1px] border-solid border-black" placeholder="Password" type="password" name="password" />

            <div class="absolute top-[300px] left-[44px] text-mini font-poppins text-black text-left inline-block min-w-[78px]">
                Username
            </div>
            <div class="absolute top-[400px] left-[44px] text-mini font-poppins text-black text-left inline-block min-w-[73px]">
                Password
            </div>
            <button type="submit" value="submit" class="[border:none] py-2.5 px-10 bg-red-200 absolute top-[529px] left-[44px] rounded-8xs flex flex-row items-start justify-start hover:bg-red-100">
                <div class="relative text-mini font-poppins text-black text-left inline-block min-w-[53px]">
                    LOG-IN
                </div>
            </button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>