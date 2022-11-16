<x-app-layout>

    <x-slot name="title">
        Yönetim Paneli
    </x-slot>

    <x-slot name="header">
        Yönetim Paneli
    </x-slot>

    <div class="m-4">

        <div class="row">
            <!--Kitaplar-->
            <div class="col-lg-4 col-md-12"><a href="{{ route('books.index') }}" class="card-link">
                    <div class="admin-card hover:shadow">
                        <div
                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <!-- Icon-Start -->
                            <div class="icon offset-2 mb-2">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 473.931 473.931" style="enable-background:new 0 0 473.931 473.931;"
                                    xml:space="preserve" width="200">
                                    <circle style="fill:#357180;" cx="236.966" cy="236.966" r="236.966" />
                                    <path style="fill:#036A7B;"
                                        d="M139.942,330.659c0,17.65-14.301,31.947-31.947,31.947l0,0c-17.642,0-17.586-14.297-17.586-31.947
                   v-0.673c0-17.642-0.056-31.943,17.586-31.943l0,0c17.646,0,31.947,14.301,31.947,31.943L139.942,330.659L139.942,330.659z" />
                                    <rect x="114.457" y="306.637" style="fill:#CDCDCE;" width="251.11"
                                        height="46.308" />
                                    <g>
                                        <rect x="114.457" y="306.226" style="fill:#D7D7D7;" width="251.11"
                                            height="6.26" />
                                        <rect x="114.457" y="319.958" style="fill:#D7D7D7;" width="251.11"
                                            height="6.256" />
                                        <rect x="114.457" y="333.129" style="fill:#D7D7D7;" width="251.11"
                                            height="6.26" />
                                        <rect x="114.457" y="346.412" style="fill:#D7D7D7;" width="251.11"
                                            height="6.26" />
                                    </g>
                                    <g>
                                        <path style="fill:#028CA3;"
                                            d="M378.835,303.06c0,2.724-1.609,4.932-3.585,4.932H110.513c-1.983,0-3.592-2.211-3.592-4.932l0,0
                       c0-2.728,1.609-4.932,3.592-4.932H375.25C377.226,298.128,378.835,300.336,378.835,303.06L378.835,303.06z" />
                                        <path style="fill:#028CA3;"
                                            d="M378.835,357.626c0,2.728-1.609,4.932-3.585,4.932H110.513c-1.983,0-3.592-2.208-3.592-4.932l0,0
                       c0-2.724,1.609-4.932,3.592-4.932H375.25C377.226,352.691,378.835,354.902,378.835,357.626L378.835,357.626z" />
                                        <rect x="106.921" y="302.693" style="fill:#028CA3;" width="10.769"
                                            height="55.277" />
                                    </g>
                                    <path style="fill:#1D8D45;"
                                        d="M323.067,268.486c0,16.303,13.216,29.508,29.511,29.508l0,0c16.295,0,16.247-13.201,16.247-29.508
                   v-0.625c0-16.292,0.052-29.508-16.247-29.508l0,0c-16.292,0-29.511,13.212-29.511,29.508V268.486z" />
                                    <rect x="117.764" y="246.301" style="fill:#CDCDCE;" width="228.846"
                                        height="42.772" />
                                    <g>
                                        <rect x="117.764" y="245.912" style="fill:#D7D7D7;" width="228.846"
                                            height="5.781" />
                                        <rect x="117.764" y="258.593" style="fill:#D7D7D7;" width="228.846"
                                            height="5.781" />
                                        <rect x="117.764" y="270.791" style="fill:#D7D7D7;" width="228.846"
                                            height="5.781" />
                                        <rect x="117.764" y="283.064" style="fill:#D7D7D7;" width="228.846"
                                            height="5.781" />
                                    </g>
                                    <g>
                                        <path style="fill:#21AC4B;"
                                            d="M105.495,242.99c0,2.518,1.482,4.557,3.315,4.557h241.445c1.826,0,3.315-2.039,3.315-4.557l0,0
                       c0-2.511-1.485-4.55-3.315-4.55H108.81C106.981,238.44,105.495,240.479,105.495,242.99L105.495,242.99z" />
                                        <path style="fill:#21AC4B;"
                                            d="M105.495,293.391c0,2.518,1.482,4.557,3.315,4.557h241.445c1.826,0,3.315-2.039,3.315-4.557l0,0
                       c0-2.514-1.485-4.557-3.315-4.557H108.81C106.981,288.838,105.495,290.881,105.495,293.391L105.495,293.391z" />
                                        <rect x="343.643" y="242.649" style="fill:#21AC4B;" width="9.942"
                                            height="51.06" />
                                    </g>
                                    <path style="fill:#8C402B;"
                                        d="M310.48,213.561c0,13.732,11.117,24.845,24.845,24.845l0,0c13.721,0,13.68-11.113,13.68-24.845
                   v-0.528c0-13.721,0.041-24.853-13.68-24.853l0,0c-13.729,0-24.845,11.132-24.845,24.853V213.561z" />
                                    <rect x="133.701" y="194.871" style="fill:#CDCDCE;" width="196.592"
                                        height="36.018" />
                                    <g>
                                        <rect x="133.701" y="194.534" style="fill:#D7D7D7;" width="196.592"
                                            height="4.864" />
                                        <rect x="133.701" y="205.224" style="fill:#D7D7D7;" width="196.592"
                                            height="4.868" />
                                        <rect x="133.701" y="215.488" style="fill:#D7D7D7;" width="196.592"
                                            height="4.864" />
                                        <rect x="133.701" y="225.815" style="fill:#D7D7D7;" width="196.592"
                                            height="4.864" />
                                    </g>
                                    <g>
                                        <path style="fill:#BB5538;"
                                            d="M123.373,192.087c0,2.118,1.253,3.839,2.788,3.839h207.211c1.542,0,2.788-1.721,2.788-3.839l0,0
                       c0-2.114-1.246-3.828-2.788-3.828H126.161C124.623,188.259,123.373,189.973,123.373,192.087L123.373,192.087z" />
                                        <path style="fill:#BB5538;"
                                            d="M123.373,234.534c0,2.114,1.253,3.828,2.788,3.828h207.211c1.542,0,2.788-1.714,2.788-3.828l0,0
                       c0-2.118-1.246-3.839-2.788-3.839H126.161C124.623,230.695,123.373,232.416,123.373,234.534L123.373,234.534z" />
                                        <rect x="327.778" y="191.803" style="fill:#BB5538;" width="8.37"
                                            height="42.989" />
                                    </g>
                                    <path style="fill:#036A7B;"
                                        d="M148.638,163.212c0,13.732-11.117,24.845-24.845,24.845l0,0c-13.721,0-13.676-11.113-13.676-24.845
                   v-0.528c0-13.721-0.045-24.849,13.676-24.849l0,0c13.729,0,24.845,11.128,24.845,24.849V163.212z" />
                                    <rect x="128.825" y="144.533" style="fill:#CDCDCE;" width="221.063"
                                        height="36.018" />
                                    <g>
                                        <rect x="128.825" y="144.204" style="fill:#D7D7D7;" width="221.063"
                                            height="4.868" />
                                        <rect x="128.825" y="154.871" style="fill:#D7D7D7;" width="221.063"
                                            height="4.864" />
                                        <rect x="128.825" y="165.161" style="fill:#D7D7D7;" width="221.063"
                                            height="4.872" />
                                        <rect x="128.825" y="175.474" style="fill:#D7D7D7;" width="221.063"
                                            height="4.868" />
                                    </g>
                                    <g>
                                        <path style="fill:#028CA3;"
                                            d="M360.212,141.742c0,2.122-1.253,3.839-2.788,3.839H125.749c-1.542,0-2.788-1.717-2.788-3.839l0,0
                       c0-2.114,1.246-3.832,2.788-3.832h231.675C358.958,137.91,360.212,139.628,360.212,141.742L360.212,141.742z" />
                                        <path style="fill:#028CA3;"
                                            d="M360.212,184.188c0,2.114-1.253,3.832-2.788,3.832H125.749c-1.542,0-2.788-1.717-2.788-3.832l0,0
                       c0-2.118,1.246-3.839,2.788-3.839h231.675C358.958,180.349,360.212,182.07,360.212,184.188L360.212,184.188z" />
                                        <rect x="122.962" y="141.461" style="fill:#028CA3;" width="8.37"
                                            height="42.989" />
                                    </g>
                                    <path style="fill:#8C402B;"
                                        d="M172.798,118.644c0,10.589-8.572,19.162-19.162,19.162l0,0c-10.582,0-10.556-8.572-10.556-19.162
                   v-0.408c0-10.585-0.026-19.165,10.556-19.165l0,0c10.589,0,19.162,8.58,19.162,19.165V118.644z" />
                                    <rect x="157.528" y="104.234" style="fill:#CDCDCE;" width="154.759"
                                        height="27.779" />
                                    <g>
                                        <rect x="157.528" y="103.976" style="fill:#D7D7D7;" width="154.759"
                                            height="3.742" />
                                        <rect x="157.528" y="112.215" style="fill:#D7D7D7;" width="154.759"
                                            height="3.742" />
                                        <rect x="157.528" y="120.148" style="fill:#D7D7D7;" width="154.759"
                                            height="3.742" />
                                        <rect x="157.528" y="128.08" style="fill:#D7D7D7;" width="154.759"
                                            height="3.742" />
                                    </g>
                                    <g>
                                        <path style="fill:#BB5538;"
                                            d="M320.239,102.086c0,1.635-0.969,2.96-2.151,2.96H155.145c-1.19,0-2.152-1.325-2.152-2.96l0,0
                       c0-1.635,0.962-2.96,2.152-2.96h162.942C319.269,99.127,320.239,100.451,320.239,102.086L320.239,102.086z" />
                                        <path style="fill:#BB5538;"
                                            d="M320.239,134.823c0,1.631-0.969,2.952-2.151,2.952H155.145c-1.19,0-2.152-1.325-2.152-2.952l0,0
                       c0-1.639,0.962-2.963,2.152-2.963h162.942C319.269,131.86,320.239,133.184,320.239,134.823L320.239,134.823z" />
                                        <rect x="152.993" y="101.851" style="fill:#BB5538;" width="6.458"
                                            height="33.159" />
                                    </g>
                            </div>
                            <!-- Icon-End -->

                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                Kitaplar
                            </h5>

                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Kitap ekleme ve düzenleme
                                işlemlerinizi
                                burada
                                gerçekleştirebilirsiniz.</p>

                        </div>
                    </div>
                </a></div>

            <!--Yazarlar-->
            <div class="col-lg-4 col-md-12">
                <a href="{{ route('authors.index') }}" class="card-link">
                    <div class="admin-card hover:shadow">
                        <div
                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <!-- Icon-Start -->
                            <div class="icon offset-2 mb-2">
                                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 496.8 496.8" style="enable-background:new 0 0 496.8 496.8;"
                                    width="200" height="200" xml:space="preserve">
                                    <path style="fill:#F48516;"
                                        d="M496.4,0h-88.8l-148,165.6c-9.6,9.6-9.6,24.8,0,34.4l39.2,39.2c9.6,9.6,24.8,9.6,34.4,0L496.4,93.6V0z" />
                                    <path style="fill:#DB6309;"
                                        d="M260.4,206.4l39.2,32.8c9.6,9.6,24.8,9.6,34.4,0L496.4,93.6V0h-88" />
                                    <path style="fill:#BC5006;" d="M298.8,240c9.6,9.6,24.8,9.6,34.4,0L496.4,93.6V0" />
                                    <path style="fill:#FCE95E;"
                                        d="M258.8,252l-55.2,55.2c5.6,11.2,4,24.8-5.6,33.6c-11.2,11.2-29.6,11.2-40.8,0s-11.2-29.6,0-40.8
	c8.8-8.8,22.4-10.4,33.6-4.8L246,240l-28-28l-106.4,46.4l-83.2,212l212.8-83.2l46.4-106.4L258.8,252z" />
                                    <rect x="231.477" y="183.117"
                                        transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 337.6093 565.2748)"
                                        style="fill:#045A89;" width="108.799" height="59.199" />
                                    <rect x="251.797" y="191.006"
                                        transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 346.2336 584.6263)"
                                        style="fill:#074568;" width="84.799" height="59.199" />
                                    <path style="fill:#F4CD27;"
                                        d="M258.8,252l-55.2,55.2c5.6,11.2,4,24.8-5.6,33.6c-11.2,11.2-29.6,11.2-40.8,0s-11.2-29.6,0-40.8
	c8.8-8.8,22.4-10.4,33.6-4.8L246,240l-28-28L28.4,470.4l212.8-83.2l46.4-106.4L258.8,252z" />
                                    <g>
                                        <polyline style="fill:#EDB811;"
                                            points="28.4,470.4 241.2,387.2 287.6,280.8 	" />
                                        <path style="fill:#EDB811;"
                                            d="M158,340.8c-11.2-11.2-11.2-29.6,0-40.8c-11.2,11.2-17.6,36-6.4,47.2s36,4.8,47.2-6.4
		C187.6,352,169.2,352,158,340.8z" />
                                    </g>
                                    <g>
                                        <path style="fill:#E2D498;"
                                            d="M202,336.8L202,336.8C202,336,202,336.8,202,336.8z" />
                                        <path style="fill:#E2D498;" d="M162,296.8L162,296.8L162,296.8z" />
                                    </g>
                                    <g>
                                        <path style="fill:#FCE95E;"
                                            d="M190.8,295.2l8.8-8.8c-13.6-3.2-33.6,5.6-42.4,14.4C166.8,291.2,180.4,289.6,190.8,295.2z" />
                                        <path style="fill:#FCE95E;"
                                            d="M203.6,307.2c5.6,11.2,4,24.8-5.6,33.6c8.8-8.8,17.6-29.6,14.4-42.4L203.6,307.2z" />
                                    </g>
                                    <circle style="fill:#DB6309;" cx="11.6" cy="485.6" r="11.2" />
                                    <path style="fill:#C9D6D6;"
                                        d="M40.4,488h267.2c0,0,180,4.8,103.2-36c-80-42.4,18.4-80,18.4-80" />
                            </div>
                            <!-- Icon-End -->

                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                Yazarlar
                            </h5>

                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Yazar ekleme ve düzenleme
                                işlemlerinizi
                                burada
                                gerçekleştirebilirsiniz.</p>

                        </div>
                    </div>
                </a>
            </div>

            <!--Yayınevleri-->
            <div class="col-lg-4 col-md-12">
                <a href="{{ route('publishers.index') }}" class="card-link">
                    <div class="admin-card hover:shadow">
                        <div
                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <!-- Icon-Start -->
                            <div class="icon offset-2 mb-2">
                                <img src="{{asset('/').'storage/publishers/default.jpg'}}"
                                    style="width: 240px;" alt="" srcset="">
                            </div>
                            <!-- Icon-End -->

                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                Yayınevleri
                            </h5>

                            <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Yayınevi ekleme ve düzenleme
                                işlemlerinizi
                                burada
                                gerçekleştirebilirsiniz.</p>

                        </div>
                    </div>
                </a>
            </div>
        </div>


    </div>

</x-app-layout>
