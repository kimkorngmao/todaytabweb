<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', $siteSettings->where('key', 'site-title')->first()->value ?? 'Today Tab'); ?><?php if (! empty(trim($__env->yieldContent('title')))): ?> - <?php echo e($siteSettings->where('key', 'site-title')->first()->value ?? 'Today Tab'); ?> <?php endif; ?></title>

    <!-- Styles / Scripts -->
    <?php if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'))): ?>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php endif; ?>

    <?php echo $__env->yieldContent('head'); ?>
</head>

<body class="flex flex-col md:flex-row overflow-x-hidden min-h-screen">
    <!-- Mobile Header -->
    <header class="md:hidden bg-white sticky top-0 h-14 w-full px-4 flex justify-between items-center border-b border-gray-100 z-50">
        <button id="mobile-menu-button" class="text-gray-600 hover:text-gray-800">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
        <div class="flex items-center gap-3">
            <a href="<?php echo e(route('home')); ?>" target="_blank" class="text-gray-600 hover:text-gray-800 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 14 14"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M7 13.5a6.5 6.5 0 1 0 0-13a6.5 6.5 0 0 0 0 13M.5 7h13"/><path d="M9.5 7A11.22 11.22 0 0 1 7 13.5A11.22 11.22 0 0 1 4.5 7A11.22 11.22 0 0 1 7 .5A11.22 11.22 0 0 1 9.5 7"/></g></svg>
            </a>
            <button id="mobile-profile-button" class="flex items-center gap-2 focus:outline-none cursor-pointer">
                <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode(auth()->user()->username)); ?>&background=random&color=fff&size=28"
                    alt="<?php echo e(auth()->user()->name); ?>" class="rounded-full w-7 h-7">
            </button>
        </div>
    </header>

    <!-- Sidebar - Hidden on mobile by default (completely removed from layout) -->
    <aside id="sidebar" class="hidden md:block w-64 flex-shrink-0 h-screen bg-white fixed md:sticky top-0 left-0 flex flex-col justify-between border-r border-gray-100 z-40">
        <div class="text-gray-900 w-full">
            <div class="h-14 flex items-center px-4 md:px-8 border-b border-gray-100">
                <a href="<?php echo e(route('admin.dashboard')); ?>">
                    <svg width="140" height="19" viewBox="0 0 140 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.0777 18.4329V5.35325H0.835938V1.12523H16.3881V5.35325H10.9733V18.4329H6.0777Z" fill="black"/>
                        <path d="M26.6277 18.6802C25.2925 18.6802 24.0645 18.4576 22.9436 18.0126C21.8227 17.5675 20.8502 16.9412 20.026 16.1335C19.2019 15.3258 18.559 14.378 18.0975 13.2901C17.6524 12.1857 17.4299 10.9824 17.4299 9.68018C17.4299 8.3615 17.6524 7.1582 18.0975 6.07029C18.559 4.98237 19.2019 4.03457 20.026 3.22688C20.8502 2.41919 21.8227 1.79281 22.9436 1.34776C24.0645 0.902703 25.2925 0.680176 26.6277 0.680176C27.9628 0.680176 29.1826 0.902703 30.287 1.34776C31.4079 1.79281 32.3804 2.41919 33.2046 3.22688C34.0453 4.03457 34.6881 4.98237 35.1332 6.07029C35.5782 7.1582 35.8008 8.35325 35.8008 9.65545C35.8008 10.9741 35.5782 12.1857 35.1332 13.2901C34.6881 14.378 34.0453 15.3258 33.2046 16.1335C32.3804 16.9412 31.4079 17.5675 30.287 18.0126C29.1826 18.4576 27.9628 18.6802 26.6277 18.6802ZM26.6277 14.1307C27.2211 14.1307 27.7733 14.0236 28.2843 13.8093C28.7953 13.595 29.2403 13.2901 29.6194 12.8945C29.9986 12.4824 30.287 12.0044 30.4848 11.4604C30.6991 10.9164 30.8063 10.323 30.8063 9.68018C30.8063 9.03732 30.6991 8.44391 30.4848 7.89996C30.287 7.356 29.9986 6.88622 29.6194 6.49062C29.2403 6.07853 28.7953 5.76534 28.2843 5.55105C27.7733 5.33677 27.2211 5.22963 26.6277 5.22963C26.0178 5.22963 25.4574 5.33677 24.9464 5.55105C24.4354 5.76534 23.9903 6.07853 23.6112 6.49062C23.2321 6.88622 22.9354 7.356 22.7211 7.89996C22.5233 8.42743 22.4244 9.02084 22.4244 9.68018C22.4244 10.323 22.5233 10.9164 22.7211 11.4604C22.9354 12.0044 23.2321 12.4824 23.6112 12.8945C23.9903 13.2901 24.4354 13.595 24.9464 13.8093C25.4574 14.0236 26.0178 14.1307 26.6277 14.1307Z" fill="black"/>
                        <path d="M38.8715 18.4329V1.12523H46.3386C47.6408 1.12523 48.8276 1.33952 49.899 1.76809C50.9704 2.19666 51.9017 2.79831 52.6929 3.57303C53.4842 4.33128 54.094 5.23787 54.5226 6.29281C54.9512 7.34776 55.1655 8.50985 55.1655 9.77908C55.1655 11.0318 54.9512 12.1939 54.5226 13.2653C54.094 14.3203 53.4842 15.2351 52.6929 16.0098C51.9017 16.7681 50.9704 17.3615 49.899 17.7901C48.8276 18.2186 47.6408 18.4329 46.3386 18.4329H38.8715ZM43.7671 15.3175L43.0006 14.2049H46.2149C46.8248 14.2049 47.3688 14.0978 47.8468 13.8835C48.3413 13.6692 48.7616 13.3725 49.1078 12.9934C49.4539 12.5978 49.7259 12.128 49.9237 11.584C50.1215 11.0401 50.2204 10.4384 50.2204 9.77908C50.2204 9.11974 50.1215 8.51809 49.9237 7.97413C49.7259 7.43018 49.4457 6.96864 49.0831 6.58952C48.7369 6.19391 48.3248 5.88897 47.8468 5.67468C47.3688 5.4604 46.8248 5.35325 46.2149 5.35325H42.9265L43.7671 4.29007V15.3175Z" fill="black"/>
                        <path d="M55.4046 18.4329L62.303 1.12523H66.259L73.1079 18.4329H68.237L65.27 10.3972C65.1052 9.95215 64.9568 9.54007 64.8249 9.16094C64.6931 8.78182 64.5695 8.41094 64.4541 8.04831C64.3387 7.68567 64.2233 7.31479 64.1079 6.93567C64.009 6.55655 63.9184 6.14446 63.8359 5.69941L64.6271 5.67468C64.5282 6.1527 64.4211 6.58128 64.3057 6.9604C64.2068 7.33952 64.0997 7.70215 63.9843 8.04831C63.8689 8.39446 63.737 8.7571 63.5887 9.13622C63.4568 9.51534 63.3085 9.93567 63.1436 10.3972L60.1766 18.4329H55.4046ZM58.7673 15.5648L60.226 12.1033H68.237L69.5969 15.5648H58.7673Z" fill="black"/>
                        <path d="M77.294 18.4329V9.8038L77.4671 11.0153L70.4698 1.12523H75.9589L81.2995 8.79007L78.4067 8.71589L83.2281 1.12523H89.4687L81.8682 11.2873L82.2391 9.606V18.4329H77.294Z" fill="black"/>
                        <path d="M96.2512 18.4329V5.35325H91.0095V1.12523H106.562V5.35325H101.147V18.4329H96.2512Z" fill="#FE4342"/>
                        <path d="M105.81 18.4329L112.708 1.12523H116.664L123.513 18.4329H118.642L115.675 10.3972C115.511 9.95215 115.362 9.54007 115.23 9.16094C115.099 8.78182 114.975 8.41094 114.86 8.04831C114.744 7.68567 114.629 7.31479 114.513 6.93567C114.414 6.55655 114.324 6.14446 114.241 5.69941L115.033 5.67468C114.934 6.1527 114.827 6.58128 114.711 6.9604C114.612 7.33952 114.505 7.70215 114.39 8.04831C114.274 8.39446 114.142 8.7571 113.994 9.13622C113.862 9.51534 113.714 9.93567 113.549 10.3972L110.582 18.4329H105.81ZM109.173 15.5648L110.631 12.1033H118.642L120.002 15.5648H109.173Z" fill="#FE4342"/>
                        <path d="M125.278 18.4329V1.12523H133.116C134.336 1.12523 135.366 1.29831 136.207 1.64446C137.064 1.99062 137.715 2.47688 138.16 3.10325C138.605 3.72963 138.828 4.47139 138.828 5.32853C138.828 6.35051 138.589 7.19941 138.111 7.87523C137.633 8.55105 136.94 9.00435 136.034 9.23512L135.96 8.76534C136.718 8.94666 137.377 9.24336 137.938 9.65545C138.515 10.0511 138.96 10.5456 139.273 11.139C139.586 11.7159 139.743 12.3835 139.743 13.1417C139.743 14.0318 139.578 14.8065 139.248 15.4659C138.935 16.1252 138.482 16.6774 137.888 17.1225C137.311 17.5675 136.635 17.8972 135.861 18.1115C135.102 18.3258 134.27 18.4329 133.363 18.4329H125.278ZM129.852 14.5016H133.215C133.594 14.5016 133.907 14.4439 134.155 14.3285C134.418 14.1967 134.616 14.0071 134.748 13.7598C134.896 13.5126 134.971 13.2159 134.971 12.8697C134.971 12.5401 134.896 12.2681 134.748 12.0538C134.6 11.8395 134.385 11.6747 134.105 11.5593C133.825 11.4274 133.487 11.3615 133.092 11.3615H129.852V14.5016ZM129.852 7.97413H132.325C132.721 7.97413 133.05 7.91644 133.314 7.80106C133.578 7.68567 133.776 7.52084 133.907 7.30655C134.039 7.07578 134.105 6.81204 134.105 6.51534C134.105 6.07029 133.957 5.71589 133.66 5.45215C133.363 5.18842 132.894 5.05655 132.251 5.05655H129.852V7.97413Z" fill="#FE4342"/>
                    </svg>
                </a>
            </div>
            <ul class="mt-5 p-4 flex flex-col gap-2">
                <?php if(auth()->user()->hasPermission('admin.dashboard')): ?>
                    <li>
                        <a href="<?php echo e(route('admin.dashboard')); ?>"
                            class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-50 duration-200 <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-blue-50 font-medium' : ''); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-width="1.5">
                                    <circle cx="19" cy="5" r="2.5" />
                                    <path stroke-linecap="round"
                                        d="M21.25 10v5.25a6 6 0 0 1-6 6h-6.5a6 6 0 0 1-6-6v-6.5a6 6 0 0 1 6-6H14" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m7.27 15.045l2.205-2.934a.9.9 0 0 1 1.197-.225l2.151 1.359a.9.9 0 0 0 1.233-.261l2.214-3.34" />
                                </g>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->hasPermission('admin.articles.index')): ?>
                    <li>
                        <a href="<?php echo e(route('admin.articles.index')); ?>"
                            class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-50 duration-200 <?php echo e(request()->routeIs('admin.articles.*') ? 'bg-blue-50 font-medium' : ''); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M216 40H40a16 16 0 0 0-16 16v160a8 8 0 0 0 11.58 7.15L64 208.94l28.42 14.21a8 8 0 0 0 7.16 0L128 208.94l28.42 14.21a8 8 0 0 0 7.16 0L192 208.94l28.42 14.21A8 8 0 0 0 232 216V56a16 16 0 0 0-16-16Zm0 163.06l-20.42-10.22a8 8 0 0 0-7.16 0L160 207.06l-28.42-14.22a8 8 0 0 0-7.16 0L96 207.06l-28.42-14.22a8 8 0 0 0-7.16 0L40 203.06V56h176ZM136 112a8 8 0 0 1 8-8h48a8 8 0 0 1 0 16h-48a8 8 0 0 1-8-8Zm0 32a8 8 0 0 1 8-8h48a8 8 0 0 1 0 16h-48a8 8 0 0 1-8-8Zm-72 24h48a8 8 0 0 0 8-8V96a8 8 0 0 0-8-8H64a8 8 0 0 0-8 8v64a8 8 0 0 0 8 8Zm8-64h32v48H72Z" />
                            </svg>
                            <span>Articles</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->hasPermission('admin.categories.index')): ?>
                    <li>
                        <a href="<?php echo e(route('admin.categories.index')); ?>"
                            class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-50 duration-200 <?php echo e(request()->routeIs('admin.categories.*') ? 'bg-blue-50 font-medium' : ''); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5">
                                    <circle cx="17" cy="7" r="3" />
                                    <circle cx="7" cy="17" r="3" />
                                    <path
                                        d="M14 14h6v5a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-5ZM4 4h6v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V4Z" />
                                </g>
                            </svg>
                            <span>Categories</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->hasPermission('admin.users.index')): ?>
                    <li>
                        <a href="<?php echo e(route('admin.users.index')); ?>"
                            class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-50 duration-200 <?php echo e(request()->routeIs('admin.users.*') ? 'bg-blue-50 font-medium' : ''); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-width="1.5">
                                    <circle cx="9" cy="9" r="2" />
                                    <path d="M13 15c0 1.105 0 2-4 2s-4-.895-4-2s1.79-2 4-2s4 .895 4 2Z" />
                                    <path stroke-linecap="round"
                                        d="M22 12c0 3.771 0 5.657-1.172 6.828C19.657 20 17.771 20 14 20h-4c-3.771 0-5.657 0-6.828-1.172C2 17.657 2 15.771 2 12c0-3.771 0-5.657 1.172-6.828C4.343 4 6.229 4 10 4h4c3.771 0 5.657 0 6.828 1.172c.47.47.751 1.054.92 1.828M19 12h-4m4-3h-5m5 6h-3" />
                                </g>
                            </svg>
                            <span>Users</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->hasPermission('admin.roles.index')): ?>
                    <li>
                        <a href="<?php echo e(route('admin.roles.index')); ?>"
                            class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-50 duration-200 <?php echo e(request()->routeIs('admin.roles.*') ? 'bg-blue-50 font-medium' : ''); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="m318.458 50.945l-39.323-16.557l-17.44 41.42l-5.246-1.141l-171.115 37.281V236.22l.273 11.328c4.7 96.674 69.051 154.562 117.399 184.636l2.524 1.503l-11.675 27.243l39.217 16.807L341.816 224h-96.223zm-95.94 343.103l54.592-127.381h-95.777l61.178-145.296L128 146.32v89.385l.248 10.264c3.812 74.235 51.889 120.97 94.27 148.079m62.472 52.062l7.42-3.863l15.418-8.92l11.037-7.124c48.792-32.968 108.311-93.445 107.75-192.113l-.119-22.879l-.05-83.956l.221-15.532l-87.553-19.06l-16.842 39.999l61.519 13.393l.037 65.181l.011 2.097h.913l-.902 2.104l.099 18.896c.377 66.311-32.759 111.562-68.818 141.448z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span>Roles</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->hasPermission('admin.site-settings.index')): ?>
                    <li>
                        <a href="<?php echo e(route('admin.site-settings.index')); ?>"
                            class="flex items-center gap-2 px-4 py-3 rounded-md hover:bg-gray-50 duration-200 <?php echo e(request()->routeIs('admin.site-settings.*') ? 'bg-blue-50 font-medium' : ''); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98Zm-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4Zm0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2Z" />
                            </svg>
                            <span>Site Settings</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </aside>

    <main class="flex-1 min-w-0 overflow-x-auto">
        <!-- Desktop Header - Hidden on mobile -->
        <header class="hidden md:flex bg-white sticky top-0 h-14 w-full px-8 justify-between items-center border-b border-gray-100 z-40">
            <div>Dashboard</div>
            <div class="flex items-center gap-5">
                <a href="<?php echo e(route('home')); ?>" target="_blank" class="text-gray-600 hover:text-gray-800 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 14 14"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M7 13.5a6.5 6.5 0 1 0 0-13a6.5 6.5 0 0 0 0 13M.5 7h13"/><path d="M9.5 7A11.22 11.22 0 0 1 7 13.5A11.22 11.22 0 0 1 4.5 7A11.22 11.22 0 0 1 7 .5A11.22 11.22 0 0 1 9.5 7"/></g></svg>
                </a>

                <div class="relative">
                    <button id="profile-button" class="flex items-center gap-2 focus:outline-none cursor-pointer">
                        <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode(auth()->user()->username)); ?>&background=random&color=fff&size=28"
                            alt="<?php echo e(auth()->user()->name); ?>" class="rounded-full w-7 h-7">
                    </button>

                    <div id="profile-dropdown"
                        class="absolute hidden right-0 mt-2 w-56 bg-white rounded shadow-sm ring-1 ring-gray-100 ring-opacity-5 z-50">
                        <div class="px-4 py-3 border-b border-gray-100">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode(auth()->user()->username)); ?>&background=random&color=fff&size=40"
                                    alt="<?php echo e(auth()->user()->name); ?>" class="rounded-full w-9 h-9">
                                <div>
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        <?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?></p>
                                    <p class="text-xs text-gray-500 truncate"><?php echo e(auth()->user()->email); ?></p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your
                            Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <form action="<?php echo e(route('auth.logout')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <button type="submit"
                                class="cursor-pointer block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                Sign out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Mobile Profile Dropdown - Hidden by default -->
        <div id="mobile-profile-dropdown" class="hidden md:hidden bg-white shadow-md rounded-b-lg z-40">
            <div class="px-4 py-3 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode(auth()->user()->username)); ?>&background=random&color=fff&size=40"
                        alt="<?php echo e(auth()->user()->name); ?>" class="rounded-full w-9 h-9">
                    <div>
                        <p class="text-sm font-medium text-gray-900 truncate">
                            <?php echo e(auth()->user()->first_name); ?> <?php echo e(auth()->user()->last_name); ?></p>
                        <p class="text-xs text-gray-500 truncate"><?php echo e(auth()->user()->email); ?></p>
                    </div>
                </div>
            </div>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
            <form action="<?php echo e(route('auth.logout')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <button type="submit"
                    class="cursor-pointer block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                    Sign out
                </button>
            </form>
        </div>
        
        <div class="p-4">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Desktop profile dropdown
            const profileButton = document.getElementById('profile-button');
            const profileDropdown = document.getElementById('profile-dropdown');
            
            // Mobile elements
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileProfileButton = document.getElementById('mobile-profile-button');
            const mobileProfileDropdown = document.getElementById('mobile-profile-dropdown');
            const sidebar = document.getElementById('sidebar');
            
            // Toggle desktop dropdown on button click
            if (profileButton && profileDropdown) {
                profileButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    profileDropdown.classList.toggle('hidden');
                });
            }
            
            // Toggle mobile sidebar
            if (mobileMenuButton && sidebar) {
                mobileMenuButton.addEventListener('click', function() {
                    sidebar.classList.toggle('hidden');
                    sidebar.classList.toggle('block');
                });
            }
            
            // Toggle mobile profile dropdown
            if (mobileProfileButton && mobileProfileDropdown) {
                mobileProfileButton.addEventListener('click', function(e) {
                    e.stopPropagation();
                    mobileProfileDropdown.classList.toggle('hidden');
                });
            }
            
            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (profileDropdown && !profileDropdown.contains(e.target) && !profileButton.contains(e.target)) {
                    profileDropdown.classList.add('hidden');
                }
                
                if (mobileProfileDropdown && !mobileProfileDropdown.contains(e.target) && !mobileProfileButton.contains(e.target)) {
                    mobileProfileDropdown.classList.add('hidden');
                }
            });
            
            // Close dropdowns when pressing Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    if (profileDropdown) profileDropdown.classList.add('hidden');
                    if (mobileProfileDropdown) mobileProfileDropdown.classList.add('hidden');
                }
            });
            
            // Close sidebar when clicking on a link (for mobile)
            const sidebarLinks = document.querySelectorAll('#sidebar a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 768) {
                        sidebar.classList.add('hidden');
                        sidebar.classList.remove('block');
                    }
                });
            });
        });
    </script>

    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html><?php /**PATH D:\00Others\todaytab\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>