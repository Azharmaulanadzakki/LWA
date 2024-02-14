<body class="hidden md:flex">

    <style>
        @keyframes slideRight {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        @keyframes slideLeft {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .marquee-container {
            animation: slideRight 10s linear infinite;
        }

        .marquee {
            animation: slideLeft 10s linear infinite;
        }
    </style>


    <div class="w-full overflow-x-hidden hidden md:flex md:mt-6" >
        <div id="marquee-container" class="marquee-container overflow-x-hidden">
            <div id="marquee-content" class="marquee-content inline-block py-2 justify-between">

                <div class="w-60 h-28 bg-white p-3 inline-flex items-center rounded-xl ml-2">
                    <img src="{{ asset('img/figma.png') }}" alt="" class="w-12">
                    <p class="ml-2 text-[#121212] font-semibold text-xl flex-col">Figma
                        <span class="flex text-[#121212] font-medium text-base">UI/UX Designer</span>
                    </p>
                </div>
                <div class="w-60 h-28 bg-white p-3 inline-flex items-center rounded-xl ml-2">
                    <img src="{{ asset('img/figma.png') }}" alt="" class="w-12">
                    <p class="ml-2 text-[#121212] font-semibold text-xl flex-col">Figma
                        <span class="flex text-[#121212] font-medium text-base">UI/UX Designer</span>
                    </p>
                </div>
                <div class="w-60 h-28 bg-white p-3 inline-flex items-center rounded-xl ml-2">
                    <img src="{{ asset('img/figma.png') }}" alt="" class="w-12">
                    <p class="ml-2 text-[#121212] font-semibold text-xl flex-col">Figma
                        <span class="flex text-[#121212] font-medium text-base">UI/UX Designer</span>
                    </p>
                </div>
                <div class="w-60 h-28 bg-white p-3 inline-flex items-center rounded-xl ml-2">
                    <img src="{{ asset('img/figma.png') }}" alt="" class="w-12">
                    <p class="ml-2 text-[#121212] font-semibold text-xl flex-col">Figma
                        <span class="flex text-[#121212] font-medium text-base">UI/UX Designer</span>
                    </p>
                </div>
                <div class="w-60 h-28 bg-white p-3 inline-flex items-center rounded-xl ml-2">
                    <img src="{{ asset('img/figma.png') }}" alt="" class="w-12">
                    <p class="ml-2 text-[#121212] font-semibold text-xl flex-col">Figma
                        <span class="flex text-[#121212] font-medium text-base">UI/UX Designer</span>
                    </p>
                </div>
            
               
            </div>
        </div>
    </div>

    <div class="w-full overflow-x-hidden hidden md:flex md:my-6" >
        <div id="marquee" class="marquee overflow-x-hidden">
            <div id="marquee-content" class="marquee-content inline-block py-2 justify-between">

                <div class="w-60 h-28 bg-white p-3 inline-flex items-center rounded-xl ml-2">
                    <img src="{{ asset('img/figma.png') }}" alt="" class="w-12">
                    <p class="ml-2 text-[#121212] font-semibold text-xl flex-col">Figma
                        <span class="flex text-[#121212] font-medium text-base">UI/UX Designer</span>
                    </p>
                </div>
                <div class="w-60 h-28 bg-white p-3 inline-flex items-center rounded-xl ml-2">
                    <img src="{{ asset('img/figma.png') }}" alt="" class="w-12">
                    <p class="ml-2 text-[#121212] font-semibold text-xl flex-col">Figma
                        <span class="flex text-[#121212] font-medium text-base">UI/UX Designer</span>
                    </p>
                </div>
                <div class="w-60 h-28 bg-white p-3 inline-flex items-center rounded-xl ml-2">
                    <img src="{{ asset('img/figma.png') }}" alt="" class="w-12">
                    <p class="ml-2 text-[#121212] font-semibold text-xl flex-col">Figma
                        <span class="flex text-[#121212] font-medium text-base">UI/UX Designer</span>
                    </p>
                </div>
                <div class="w-60 h-28 bg-white p-3 inline-flex items-center rounded-xl ml-2">
                    <img src="{{ asset('img/figma.png') }}" alt="" class="w-12">
                    <p class="ml-2 text-[#121212] font-semibold text-xl flex-col">Figma
                        <span class="flex text-[#121212] font-medium text-base">UI/UX Designer</span>
                    </p>
                </div>
                <div class="w-60 h-28 bg-white p-3 inline-flex items-center rounded-xl ml-2">
                    <img src="{{ asset('img/figma.png') }}" alt="" class="w-12">
                    <p class="ml-2 text-[#121212] font-semibold text-xl flex-col">Figma
                        <span class="flex text-[#121212] font-medium text-base">UI/UX Designer</span>
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</body>
