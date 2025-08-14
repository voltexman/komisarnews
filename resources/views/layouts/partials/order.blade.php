<!-- Stepper -->
<div class="bg-max-light h-[520px] p-5 rounded-lg shadow-lg" data-hs-stepper='{
    "currentIndex": 2
  }'>
    <div class="text-lg text-center text-max-soft uppercase font-semibold mb-5">Оцінка та продаж волосся</div>
    <!-- Stepper Nav -->
    <ul class="relative flex flex-row gap-x-2 mx-auto max-w-sm">

        <!-- Item -->
        <li class="md:shrink md:basis-0 flex-1 group flex gap-x-2 md:block"
            data-hs-stepper-nav-item='{
            "index": 1
          }'>
            <div
                class="min-w-[28px] min-h-[28px] flex flex-col items-center md:w-full md:inline-flex md:flex-wrap md:flex-row text-xs align-middle">
                <span
                    class="w-8 h-8 flex justify-center items-center shrink-0 bg-white font-medium text-gray-800 rounded-full">
                    <i data-lucide="user" class="h-4 w-4 text-max-soft"></i>
                </span>
                <div class="mt-2 w-px h-full md:mt-0 md:ms-2 md:w-full md:h-px md:flex-1 bg-gray-200 group-last:hidden">
                </div>
            </div>
            <div class="grow md:grow-0 mt-1">
                <span class="block text-sm font-semibold text-gray-600">
                    Заявка
                </span>
            </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="md:shrink md:basis-0 flex-1 group flex gap-x-2 md:block active"
            data-hs-stepper-nav-item='{
            "index": 2
          }'>
            <div
                class="min-w-[28px] min-h-[28px] flex flex-col items-center md:w-full md:inline-flex md:flex-wrap md:flex-row text-xs align-middl">
                <span
                    class="w-8 h-8 flex justify-center items-center shrink-0 bg-white font-medium text-gray-800 rounded-full hs-stepper-active:bg-max-soft/70 hs-stepper-active:animate-bounce hs-stepper-success:bg-max-soft">
                    <x-lucide-camera
                        class="h-4 w-4 text-max-soft hs-stepper-active:text-max-light hs-stepper-success:hidden"/>
                    <x-lucide-check class="h-4 w-4 hidden text-max-light hs-stepper-success:block"/>
                </span>
                <div class="mt-2 w-px h-full md:mt-0 md:ms-2 md:w-full md:h-px md:flex-1 bg-gray-200 group-last:hidden">
                </div>
            </div>
            <div class="grow md:grow-0 mt-1">
                <span class="block text-sm font-semibold text-gray-600">
                    Фото
                </span>
            </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="md:shrink md:basis-0 flex-1 group flex gap-x-2 md:block"
            data-hs-stepper-nav-item='{
            "index": 3
          }'>
            <div
                class="min-w-[28px] min-h-[28px] flex flex-col items-center md:w-full md:inline-flex md:flex-wrap md:flex-row text-xs align-middle">
                <span
                    class="w-8 h-8 flex justify-center items-center shrink-0 bg-white font-medium text-gray-800 rounded-full">
                    <x-lucide-message-circle class="h-4 w-4 text-max-soft"/>
                </span>
                <div class="mt-2 w-px h-full md:mt-0 md:ms-2 md:w-full md:h-px md:flex-1 bg-gray-200 group-last:hidden">
                </div>
            </div>
            <div class="grow md:grow-0 mt-1">
                <span class="block text-sm font-semibold text-gray-600">
                    Опис
                </span>
            </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="shrink basis-0 group flex gap-x-2 md:block"
            data-hs-stepper-nav-item='{
            "index": 4
          }'>
            <div
                class="min-w-[28px] min-h-[28px] flex flex-col items-center md:w-full md:inline-flex md:flex-wrap md:flex-row text-xs align-middle">
                <span
                    class="w-8 h-8 flex justify-center items-center shrink-0 bg-white font-medium text-gray-800 rounded-full">
                    <x-lucide-file-text class="h-4 w-4 text-max-soft"/>
                </span>
                <div class="mt-2 w-px h-full md:mt-0 md:ms-2 md:w-full md:h-px md:flex-1 bg-gray-200 group-last:hidden">
                </div>
            </div>
            <div class="grow md:grow-0 mt-1">
                <span class="block text-sm font-semibold text-gray-600">
                    Дані
                </span>
            </div>
        </li>
        <!-- End Item -->

    </ul>
    <!-- End Stepper Nav -->

    <!-- Stepper Content -->
    <div class="mt-5">
        <!-- First Content -->
        <div data-hs-stepper-content-item='{
        "index": 1,
        "isCompleted": true
      }' class="success"
             style="display: none;">
            <div class="flex justify-center items-center">
                <!-- Floating Input -->
                <div class="flex flex-col gap-y-4 w-full">
                    <!-- Select -->
                    <div class="relative">
                        <select
                            data-hs-select='{
        "placeholder": "Select option...",
        "toggleTag": "<button type=\"button\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800\" data-title></span></button>",
        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex items-center text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-1",
        "dropdownClasses": "mt-2 z-50 w-full max-h-[300px] p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto",
        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100",
        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"font-semibold text-gray-800\" data-title></div></div><div class=\"mt-1.5 text-sm text-gray-500\" data-description></div></div>"
      }' class="hidden">
                            <option value="">Choose</option>
                            <option value="Хочу оцінити вартість" selected
                                    data-hs-select-option='{
          "description": "Майстер оцінить та повідомить вартість.",
          "icon": "<img class=\"inline-block w-6 h-6 rounded-full\" src=\"/img/icons/order-money.svg\" />"
        }'>
                                Хочу оцінити вартість
                            </option>

                            <option value="Хочу продати волосся"
                                    data-hs-select-option='{
          "description": "Надішліть волосся та отримайте гроші.",
          "icon": "<img class=\"inline-block w-6 h-6 rounded-full\" src=\"/img/icons/order.svg\" />"
        }'>
                                Хочу продати волосся
                            </option>
                        </select>

                        <div class="absolute top-1/2 end-3 -translate-y-1/2">
                            <svg class="shrink-0 w-3.5 h-3.5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                 width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m7 15 5 5 5-5"/>
                                <path d="m7 9 5-5 5 5"/>
                            </svg>
                        </div>
                    </div>
                    <!-- End Select -->

                    <div class="flex flex-row w-full gap-4">
                        <div class="relative w-1/2">
                            <input type="text" id="hs-floating-input-name"
                                   class="peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:pt-6 focus:pb-2 not-placeholder-shown:pt-6 not-placeholder-shown:pb-2 autofill:pt-6 autofill:pb-2"
                                   placeholder="Інеса">
                            <label for="hs-floating-input-name"
                                   class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none peer-focus:text-xs peer-focus:-translate-y-1.5 peer-focus:text-gray-500 peer-not-placeholder-shown:text-xs peer-not-placeholder-shown:-translate-y-1.5 peer-not-placeholder-shown:text-gray-500">
                                Ваше ім`я
                            </label>
                        </div>
                        <div class="relative w-1/2">
                            <input type="text" id="hs-floating-input-city"
                                   class="peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:pt-6 focus:pb-2 not-placeholder-shown:pt-6 not-placeholder-shown:pb-2 autofill:pt-6 autofill:pb-2"
                                   placeholder="Київ">
                            <label for="hs-floating-input-city"
                                   class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none peer-focus:text-xs peer-focus:-translate-y-1.5 peer-focus:text-gray-500 peer-not-placeholder-shown:text-xs peer-not-placeholder-shown:-translate-y-1.5 peer-not-placeholder-shown:text-gray-500">
                                Місто
                            </label>
                        </div>
                    </div>
                    <div class="flex flex-row w-full gap-4">
                        <div class="relative w-1/2">
                            <input type="text" id="hs-floating-input-email"
                                   class="peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:pt-6 focus:pb-2 not-placeholder-shown:pt-6 not-placeholder-shown:pb-2 autofill:pt-6 autofill:pb-2"
                                   placeholder="example@gmail.com">
                            <label for="hs-floating-input-email"
                                   class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none peer-focus:text-xs peer-focus:-translate-y-1.5 peer-focus:text-gray-500 peer-not-placeholder-shown:text-xs peer-not-placeholder-shown:-translate-y-1.5 peer-not-placeholder-shown:text-gray-500">
                                Електронна пошта
                            </label>
                        </div>
                        <div class="relative w-1/2">
                            <input type="text" id="hs-floating-input-phone"
                                   class="peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:pt-6 focus:pb-2 not-placeholder-shown:pt-6 not-placeholder-shown:pb-2 autofill:pt-6 autofill:pb-2"
                                   placeholder="+380 (12) 345 67 89">
                            <label for="hs-floating-input-phone"
                                   class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none peer-focus:text-xs peer-focus:-translate-y-1.5 peer-focus:text-gray-500 peer-not-placeholder-shown:text-xs peer-not-placeholder-shown:-translate-y-1.5 peer-not-placeholder-shown:text-gray-500">
                                Номер телефону
                            </label>
                        </div>
                    </div>
                    <!-- Select -->
                    <div class="relative">
                        <select
                            data-hs-select='{
        "placeholder": "Вкажіть колір",
        "toggleTag": "<button type=\"button\"></button>",
        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-1",
        "dropdownClasses": "mt-2 z-50 w-full max-h-[300px] p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto",
        "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100",
        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 w-3.5 h-3.5 text-blue-600\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"
      }'
                            class="hidden">
                            <option value="">Choose</option>
                            <option value="Блонд">Блонд</option>
                            <option value="Світло-русий">Світло-русий</option>
                            <option value="Русий">Русий</option>
                            <option value="Світло-коричневий">Світло-коричневий</option>
                            <option value="Темно-коричневий">Темно-коричневий</option>
                            <option value="Чорний">Чорний</option>
                        </select>

                        <div class="absolute top-1/2 end-3 -translate-y-1/2">
                            <svg class="shrink-0 w-3.5 h-3.5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                 width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="m7 15 5 5 5-5"/>
                                <path d="m7 9 5-5 5 5"/>
                            </svg>
                        </div>
                    </div>
                    <!-- End Select -->
                    <div class="flex justify-between gap-x-4">
                        <!-- Input Number -->
                        <div class="bg-white border border-gray-200 rounded-lg" data-hs-input-number>
                            <div class="w-full flex justify-between items-center gap-x-1">
                                <div class="grow py-2 px-3">
                                    <span class="block text-xs text-gray-500">
                                        Вага
                                    </span>
                                    <input class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0"
                                           type="text" value="1" data-hs-input-number-input>
                                </div>
                                <div class="flex flex-col -gap-y-px divide-y divide-gray-200 border-s border-gray-200">
                                    <button type="button"
                                            class="w-7 h-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-se-lg bg-gray-50 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                            data-hs-input-number-decrement>
                                        <svg class="shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path d="M5 12h14"/>
                                        </svg>
                                    </button>
                                    <button type="button"
                                            class="w-7 h-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-lg bg-gray-50 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                            data-hs-input-number-increment>
                                        <svg class="shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path d="M5 12h14"/>
                                            <path d="M12 5v14"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Input Number -->
                        <!-- Input Number -->
                        <div class="bg-white border border-gray-200 rounded-lg" data-hs-input-number>
                            <div class="w-full flex justify-between items-center gap-x-1">
                                <div class="grow py-2 px-3">
                                    <span class="block text-xs text-gray-500">
                                        Довжина
                                    </span>
                                    <input class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0"
                                           type="text" value="1" data-hs-input-number-input>
                                </div>
                                <div class="flex flex-col -gap-y-px divide-y divide-gray-200 border-s border-gray-200">
                                    <button type="button"
                                            class="w-7 h-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-se-lg bg-gray-50 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                            data-hs-input-number-decrement>
                                        <svg class="shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path d="M5 12h14"/>
                                        </svg>
                                    </button>
                                    <button type="button"
                                            class="w-7 h-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-lg bg-gray-50 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                            data-hs-input-number-increment>
                                        <svg class="shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path d="M5 12h14"/>
                                            <path d="M12 5v14"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Input Number -->
                        <!-- Input Number -->
                        <div class="bg-white border border-gray-200 rounded-lg" data-hs-input-number>
                            <div class="w-full flex justify-between items-center gap-x-1">
                                <div class="grow py-2 px-3">
                                    <span class="block text-xs text-gray-500">
                                        Вік
                                    </span>
                                    <input class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0"
                                           type="text" value="1" data-hs-input-number-input>
                                </div>
                                <div class="flex flex-col -gap-y-px divide-y divide-gray-200 border-s border-gray-200">
                                    <button type="button"
                                            class="w-7 h-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-se-lg bg-gray-50 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                            data-hs-input-number-decrement>
                                        <svg class="shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path d="M5 12h14"/>
                                        </svg>
                                    </button>
                                    <button type="button"
                                            class="w-7 h-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-lg bg-gray-50 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                            data-hs-input-number-increment>
                                        <svg class="shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg"
                                             width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <path d="M5 12h14"/>
                                            <path d="M12 5v14"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- End Input Number -->
                    </div>
                </div>
                <!-- End Floating Input -->
            </div>
        </div>
        <!-- End First Content -->

        <!-- First Content -->
        <div data-hs-stepper-content-item='{
        "index": 2
      }'>
            <div
                class="p-4 h-46 bg-gray-50 flex justify-center items-center border border-dashed border-gray-300 rounded-xl relative overflow-hidden">
                <x-lucide-image-plus
                    class="h-20 w-20 absolute opacity-10 text-sky-400 -top-3 -left-3 rotate-35"/>
                <x-lucide-image class="h-16 w-16 absolute opacity-10 text-purple-500 -top-3 right-3 rotate-15"/>
                <div class="w-full flex flex-col">
                    <div class="w1/3 items-center flex justify-center">
                        <div class="relative border-2 border-max-soft p-3 rounded-full">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-max-soft"></span>
                            <x-lucide-upload-cloud class="h-8 w-8"/>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-gray-600 border p-2 rounded-lg bg-max-soft/30 block">
                            Додайти зображеня
                        </span>
                        <span class="text-sm text-gray-500">або перетягніть сюди</span>
                    </div>
                </div>
            </div>
            {{-- <span class="text-xs text-gray-500 flex justify-between w-full">
                <x-lucide-scaling class="h-3.5 w-3.5" />1920x1080
                <x-lucide-image class="h-3.5 w-3.5 ms-2" />JPG, PNG
            </span> --}}
            <div class="text-xs text-center mt-3 text-max-dark/70">
                <p class="mb-2">Додайте фотографії вашого волосся для<br>
                    подальшої оцінки нашим спеціалістом</p>

                <p class="mb-2">Намагайтесь обирати найвдаліші фото,<br>
                    які краще відображають реальний стан волосся</p>

                <p>Ви можете відредагувати фото натиснувши<br>
                    На мініатюрах фото можуть виглядати інакше</p>
            </div>
        </div>
        <!-- End First Content -->

        <!-- First Content -->
        <div data-hs-stepper-content-item='{
        "index": 3
      }' style="display: none;">
            <div class="w-full flex justify-center items-center border border-dashed border-gray-200 rounded-xl">
                <!-- Floating Textarea -->
                <div class="relative">
                    <textarea id="hs-floating-textarea"
                              class="peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:pt-6 focus:pb-2 not-placeholder-shown:pt-6 not-placeholder-shown:pb-2 autofill:pt-6 autofill:pb-2"
                              placeholder="This is a textarea placeholder"></textarea>
                    <label for="hs-floating-textarea"
                           class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent peer-disabled:opacity-50 peer-disabled:pointer-events-none peer-focus:text-xs peer-focus:-translate-y-1.5 peer-focus:text-gray-500 peer-not-placeholder-shown:text-xs peer-not-placeholder-shown:-translate-y-1.5 peer-not-placeholder-shown:text-gray-500">
                        Додатковий опис
                    </label>
                </div>
                <!-- End Floating Textarea -->
            </div>
        </div>
        <!-- End First Content -->

        <!-- Final Content -->
        <div data-hs-stepper-content-item='{
        "isFinal": true
      }' style="display: none;">
            <div
                class="p-4 h-48 bg-gray-50 flex justify-center items-center border border-dashed border-gray-200 rounded-xl">
                <h3 class="text-gray-500">
                    Final content
                </h3>
            </div>
        </div>
        <!-- End Final Content -->

        <!-- Button Group -->
        <div class="mt-5 flex justify-between items-center gap-x-2">
            <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-stepper-back-btn>
                <x-lucide-chevron-left class="h-4 w-4 me-1"/>
                Назад
            </button>
            <button type="button"
                    class="py-2 px-3 inline-flex items-center me-auto gap-x-1 text-sm font-medium rounded-lg bg-max-soft text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-overlay="#hs-modal-upgrade-to-pro">
                <x-lucide-info class="h-5 w-5 text-max-light"/>
            </button>
            <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent bg-max-soft text-max-light hover:bg-max-dark disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-stepper-next-btn>
                Далі
                <x-lucide-chevron-right class="h-4 w-4 ms-1"/>
            </button>
            <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent bg-max-soft text-max-light hover:bg-max-dark disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-stepper-finish-btn style="display: none;">
                Відправити
                <x-lucide-send class="h-4 w-4 ms-1"/>
            </button>
            <button type="reset"
                    class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent bg-max-soft text-max-light hover:bg-max-dark disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-stepper-reset-btn style="display: none;">
                Нова заявка
                <x-lucide-undo-2 class="h-4 w-4 ms-1"/>
            </button>
        </div>
        <!-- End Button Group -->
    </div>
    <!-- End Stepper Content -->
</div>
<!-- End Stepper -->
