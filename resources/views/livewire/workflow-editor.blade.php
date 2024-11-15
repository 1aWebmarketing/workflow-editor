<div x-data="{ elementSettingsVisible: @entangle('elementSettingsVisible'), sidebarVisible: @entangle('sidebarVisible') }">
    <div id="workspace" class="py-[100px] workspace flex-1 max-w-full min-h-screen border-dashed border-4 relative flex flex-col gap-y-2 items-center overflow-scroll justify-center scrollbar">

        @foreach($elements as $element)
            @php
            switch($element['type']):
                case('TRIGGER'):
                    $bgColor = 'bg-red-100';
                    $color = '#ED2A2A';
                    break;
                case('ACTION'):
                    $bgColor = 'bg-teal-100';
                    $color = '#28BFA4';
                    break;
            endswitch;
            @endphp

            <div wire:key="element-{{ $element['id'] }}" wire:click="openActionSettings({{ $element['id'] }})" class="border rounded-xl shadow p-2 bg-white border-gray-200
                border-2 hover:border-gray-300 hover:cursor-pointer">
                <div class="{{ $bgColor }} flex gap-2 items-center rounded mb-2 p-1 min-w-[{{ $element['width'] }}]">
                    <svg width="1.5em" height="1.5em" viewBox="0 0 71 71" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="35.5" cy="35.5" r="35.5" fill="{{ $color }}"/>
                    <path d="M53.5 24.8462C53.3462 24.3846 52.8077 24.3077 52.4231 24.6154L46.1923 30.8462C45.7308 31.3077 44.9615 31.3077 44.5 30.8462L40.1154 26.4615C39.6538 26 39.6538 25.2308 40.1154 24.7692L46.4231 18.5385C46.7308 18.2308 46.5769 17.6923 46.1923 17.4615C45.1154 17.1538 43.9615 17 42.8846 17C36.3461 17 31.1154 22.6154 31.8846 29.3077C32.0385 30.3846 32.2692 31.3077 32.6538 32.2308L18.2692 46.5385C16.5769 48.2308 16.5769 51 18.2692 52.6154C19.1154 53.4615 20.2692 53.9231 21.3462 53.9231C22.4231 53.9231 23.5769 53.4615 24.4231 52.6154L38.7308 38.3077C39.6538 38.6923 40.6538 38.9231 41.6538 39.0769C48.3462 39.8462 53.9615 34.6154 53.9615 28.0769C53.9615 26.9231 53.8077 25.8462 53.5 24.8462Z" fill="white"/>
                    </svg>
                    <p class="font-bold">{{ $element['name'] }}</p>
                    <div class="flex-grow"></div>
                    <p class="text-black opacity-40">{{ $element['type'] }}</p>
                </div>

                <ul>
                    <li class="text-gray-500">Betreff <span class="text-black font-bold">Subject sowieso</span></li>
                    <li class="text-gray-500">Betreff <span class="text-black font-bold">Subject sowieso</span></li>
                    <li class="text-gray-500">Betreff <span class="text-black font-bold">Subject sowieso</span></li>
                </ul>
            </div>

            <svg width="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                <g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 3.25C12.4142 3.25 12.75 3.58579 12.75 4L12.75 18.1893L17.4697 13.4697C17.7626 13.1768 18.2374 13.1768 18.5303 13.4697C18.8232 13.7626 18.8232 14.2374 18.5303 14.5303L12.5303 20.5303C12.3897 20.671 12.1989 20.75 12 20.75C11.8011 20.75 11.6103 20.671 11.4697 20.5303L5.46967 14.5303C5.17678 14.2374 5.17678 13.7626 5.46967 13.4697C5.76256 13.1768 6.23744 13.1768 6.53033 13.4697L11.25 18.1893L11.25 4C11.25 3.58579 11.5858 3.25 12 3.25Z" fill="#000000"/> </g>
            </svg>
        @endforeach

        <button wire:click="toggleSidebar" class="rounded-full w-15 h-15 border-2 p-4 text-gray-200 border-black opacity-50 hover:opacity-100 duration-200 flex items-center justify-center font-bold">
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M6 12H18M12 6V18" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

    </div>

    <div :class="sidebarVisible ? 'right-0' : 'right-[-400px]'" class="fixed top-0 bottom-0 bg-[#f1fffe] shadow w-[400px] transition-all duration-700">
        <h2 class="text-xl pl-2 pt-3">Add element</h2>

        <ul class="flex flex-col p-2 gap-y-2">
            <li class="font-bold flex gap-2 items-center">
                <svg width="1em" height="1em" viewBox="0 0 87 87" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.16249 85.9125L1.08749 80.8375L9.78749 72.1375C1.08749 61.9875 1.81249 46.7625 11.2375 37.3375L17.4 31.175L56.1875 69.9625L50.3875 75.7625C45.3125 80.8375 38.7875 83.375 31.9 83.375C25.7375 83.375 19.9375 81.2 15.225 77.2125L6.16249 85.9125ZM18.125 70.325C21.75 73.95 26.4625 75.7625 31.5375 75.7625C36.6125 75.7625 41.325 73.95 44.95 70.325L45.675 69.6L17.4 40.9625L16.3125 42.05C9.06249 49.3 9.06249 60.9 16.3125 68.15L18.125 70.325ZM69.6 55.4625L60.5375 46.4L52.2 54.7375L47.125 50.025L55.4625 41.6875L45.3125 31.5375L36.975 39.875L31.9 34.8L40.2375 26.4625L31.175 17.4L36.975 11.6C42.05 6.525 48.575 3.9875 55.4625 3.9875C61.625 3.9875 67.425 6.1625 72.1375 10.15L80.8375 1.45L85.9125 6.525L77.2125 15.225C85.9125 25.375 85.1875 40.6 75.7625 50.025L69.6 55.4625ZM41.325 16.675L69.6 45.3125L70.6875 44.225C77.9375 36.975 77.9375 25.375 70.6875 18.125L68.875 15.95C65.25 12.325 60.5375 10.5125 55.4625 10.5125C50.3875 10.5125 45.675 12.325 42.05 15.95L41.325 16.675Z" fill="black"/>
                </svg>
                Trigger
            </li>

            @foreach($availableElements as $element)
                @if($element['type'] !== 'TRIGGER')
                    @continue
                @endif

                <li wire:click="addElement('{{ $element['slug'] }}')" class="border px-2 py-3 flex gap-2 bg-white rounded-xl items-center font-bold shadow hover:cursor-pointer hover:border-gray-400 transition-all duration-200">
                    {!! $element['svg'] !!}
                    {{ $element['name'] }}
                </li>
            @endforeach

            <li class="font-bold flex gap-2 items-center">
                <svg width="1em" height="1em" viewBox="0 0 87 87" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.16249 85.9125L1.08749 80.8375L9.78749 72.1375C1.08749 61.9875 1.81249 46.7625 11.2375 37.3375L17.4 31.175L56.1875 69.9625L50.3875 75.7625C45.3125 80.8375 38.7875 83.375 31.9 83.375C25.7375 83.375 19.9375 81.2 15.225 77.2125L6.16249 85.9125ZM18.125 70.325C21.75 73.95 26.4625 75.7625 31.5375 75.7625C36.6125 75.7625 41.325 73.95 44.95 70.325L45.675 69.6L17.4 40.9625L16.3125 42.05C9.06249 49.3 9.06249 60.9 16.3125 68.15L18.125 70.325ZM69.6 55.4625L60.5375 46.4L52.2 54.7375L47.125 50.025L55.4625 41.6875L45.3125 31.5375L36.975 39.875L31.9 34.8L40.2375 26.4625L31.175 17.4L36.975 11.6C42.05 6.525 48.575 3.9875 55.4625 3.9875C61.625 3.9875 67.425 6.1625 72.1375 10.15L80.8375 1.45L85.9125 6.525L77.2125 15.225C85.9125 25.375 85.1875 40.6 75.7625 50.025L69.6 55.4625ZM41.325 16.675L69.6 45.3125L70.6875 44.225C77.9375 36.975 77.9375 25.375 70.6875 18.125L68.875 15.95C65.25 12.325 60.5375 10.5125 55.4625 10.5125C50.3875 10.5125 45.675 12.325 42.05 15.95L41.325 16.675Z" fill="black"/>
                </svg>
                Actions
            </li>

            @foreach($availableElements as $element)
                @if($element['type'] !== 'ACTION')
                    @continue
                @endif

                <li wire:click="addElement('{{ $element['slug'] }}')" class="border px-2 py-3 flex gap-2 bg-white rounded-xl items-center font-bold shadow hover:cursor-pointer hover:border-gray-400 transition-all duration-200">
                    {!! $element['svg'] !!}
                    {{ $element['name'] }}
                </li>
            @endforeach
        </ul>
    </div>

    <div :class="elementSettingsVisible ? 'left-0' : 'left-[-400px]'" class="fixed top-0 bottom-0 bg-[#f1fffe] shadow w-[400px] transition-all duration-700">
        <p class="text pl-2 pt-3 text-gray-500 font-bold">Element properties</p>
        <h2 class="text-xl pl-2">{{ $currentElementSetting['name'] ?? '' }}</h2>

        <div class="px-2">
            <label class="w-full font-bold block uppercase pt-2">Filter</label>
            <input class="bg-white w-full rounded p-2 shadow">

            <label class="w-full font-bold block uppercase pt-2">Einstellung X</label>
            <input class="bg-white w-full rounded p-2 shadow">

            <button class="bg-gray-800 px-3 py-2 mt-2 uppercase text-white font-bold text-sm rounded">Speichern</button>
        </div>
    </div>

    <style>
        .workspace {
            background-color: #e0f2f1; /* Adjust color to mimic blueprint paper */
            background-image: radial-gradient(circle, #b6c9ea 1px, transparent 1px);
            background-size: 15px 15px; /* Adjust the spacing between dots */
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
</div>
