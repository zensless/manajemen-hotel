<?php

error_reporting(0);

$model =  new travel();
$data_travel = $model->dataTravel();
$idedit = $_REQUEST['idedit'];

if (!empty($idedit)) {
    $travel = $model->getTravel($idedit);
} else {
    $travel = array();
}

if ($sesi['role'] == 'admin' || $sesi['role'] == 'manajer') {

?>
    <div class="flex flex-col items-start justify-start gap-[7px]">
        <h1 class="mt-4 h-[47px] relative text-inherit font-bold font-inherit inline-block z-[1] mq1050:text-[30px] mq450:text-[23px]">
            Form Input Data Travel Online
        </h1>
        <h3 class="m-0 relative text-xl font-normal font-inherit text-gray-100 z-[1] mq450:text-[16px]">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="index.php?url=pages/travel/dtTravel" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Data Travel</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Form Data Travel</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </h3>

    </div>
    <div class="w-[1066px] max-w-full flex flex-col items-start gap-4  font-inter mr-4">
        <div class="w-full rounded-xl mr-10 bg-white p-6 mq750:p-4">

            <form action="app/controllers/travelController.php" method="POST">
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Travel Online</label>
                        <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Traveloka" value="<?= $travel['nama_travel'] ?>" required />
                    </div>
                    <div>
                        <label for="komisi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Komisi Travel</label>
                        <input type="number" id="komisi" name="komisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1234567" value="<?= $travel['komisi'] ?>" required />
                    </div>
                </div>
                <?php if (empty($idedit)) { ?>
                    <button type="submit" value="save" name="proses" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                <?php } else { ?>
                    <button type="submit" value="ubah" name="proses" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</button>
                <?php } ?>
                <input type="hidden" name="idx" value="<?= $idedit ?>">
            </form>


        </div>
    </div>

<?php
} else {
    echo '<script> alert("Anda Tidak boleh Masuk!!!"); history.back(); </script>';
}
?>