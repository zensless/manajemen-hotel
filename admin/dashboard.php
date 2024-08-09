<div class="flex flex-col items-start justify-start gap-[7px]">
    <h1
        class="m-0 h-[57px] relative text-inherit font-bold font-inherit inline-block z-[1] mq1050:text-[30px] mq450:text-[23px]">
        Dashboard
    </h1>
    <h3 class="m-0 relative text-xl font-normal font-inherit text-gray-100 z-[1] mq450:text-[16px]">
        Welcome <?php echo $sesi['username']; ?>
    </h3>
</div>
<div class="w-[1066px] flex flex-col items-start justify-start gap-[18px] max-w-full text-2xl font-inter">
    <div
        class="self-stretch flex flex-row items-end justify-start gap-[116px] max-w-full mq750:gap-[29px] mq1050:flex-wrap mq1050:gap-[58px]">
        <div
            class="flex-1 rounded-xl bg-white flex flex-row items-start justify-between pt-[18px] pb-[27px] pr-[76px] pl-[61px] box-border max-w-full gap-[20px] z-[1] mq750:flex-wrap mq750:pl-[30px] mq750:pr-[38px] mq750:box-border mq750:min-w-full">
            <div class="h-[311px] w-[639px] relative rounded-xl bg-white hidden max-w-full"></div>
            <div class="w-52 flex flex-col items-start justify-start gap-[37px]">
                <h2
                    class="m-0 h-[30px] relative text-inherit font-normal font-inherit inline-block z-[2] mq450:text-xl">
                    Room reservation
                </h2>
                <div class="self-stretch flex flex-row items-start justify-start py-0 pr-[5px] pl-1">
                    <canvas id="chart-1"></canvas>
                </div>
            </div>
            <div class="flex flex-col items-start justify-start gap-[25px] text-mini text-gray-200">
                <div class="flex flex-row items-start justify-start pt-0 px-0 pb-[18px] text-2xl text-black">
                    <h5
                        class="m-0 h-[30px] relative text-inherit font-normal font-inherit inline-block z-[2] mq450:text-xl">
                        This month
                    </h5>
                </div>
                <div class="flex flex-row items-start justify-start py-0 pr-0 pl-2">
                    <div class="flex flex-col items-start justify-start">
                        <div class="flex flex-row items-start justify-start gap-[5px] text-black">
                            <div class="flex flex-col items-start justify-start pt-[3px] px-0 pb-0">
                                <div class="w-3 h-3 relative rounded-[50%] bg-red z-[2]"></div>
                            </div>
                            <p class="relative z-[2]">Superior rooms</p>
                        </div>
                        <div
                            class="flex flex-row items-start justify-start py-0 px-[17px] mt-[-3px] text-sm text-black">
                            <div class="relative z-[3]">16 Rooms <br> -> 12 reservation</div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-start justify-start py-0 pr-3 pl-2">
                    <div class="flex flex-col items-start justify-start">
                        <div class="flex flex-row items-start justify-start gap-[5px] text-black">
                            <div class="flex flex-col items-start justify-start pt-[3px] px-0 pb-0">
                                <div class="w-3 h-3 relative rounded-[50%] bg-lime z-[2]"></div>
                            </div>
                            <div class="relative z-[3]">Deluxe rooms</div>
                        </div>
                        <div
                            class="flex flex-row items-start justify-start py-0 px-[17px] mt-[-3px] text-sm text-black">
                            <div class="relative z-[2]">9 Rooms <br> -> 7 reservation</div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row items-start justify-start py-0 px-2">
                    <div class="flex flex-col items-start justify-start">
                        <div class="flex flex-row items-start justify-start gap-[5px] text-black">
                            <div class="flex flex-col items-start justify-start pt-[3px] px-0 pb-0">
                                <div class="w-3 h-3 relative rounded-[50%] bg-gold z-[2]"></div>
                            </div>
                            <div class="relative z-[3]">Suite rooms</div>
                        </div>
                        <div
                            class="flex flex-row items-start justify-start py-0 px-[17px] mt-[-3px] text-sm text-black">
                            <div class="relative z-[2]">1 Rooms <br> -> 1 reservation</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="w-[371px] rounded-xl bg-white flex flex-row items-start justify-start pt-5 px-4 pb-1 box-border min-w-[371px] z-[1] text-center text-sm font-roboto mq1050:flex-1">

            <div id="caleandar">

            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.js"></script>

<script>
    // Chart doughnut 
    const ctx1 = document.getElementById("chart-1");

    new Chart(ctx1, {
        type: "doughnut",
        data: {
            datasets: [
                {
                    label: "# of Votes",
                    data: [16, 9, 1],
                    backgroundColor: [
                        "#ff6b00",
                        "#42ff00",
                        "#ffe601",
                    ],
                    hoverOffset: 4,
                },
            ],
        },
        Options: {
            Responseive: true,
        },
    });
</script>


<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<link rel="stylesheet" href="../assets/calender/css/theme1.css" />
<script type="text/javascript" src="../assets/calender/js/caleandar.min.js"></script>
<script type="text/javascript" src="../assets/calender/js/demo.js"></script>