

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="robots" content="index, follow">

    <!-- Primary Meta Tags -->
    <title>
        <?php echo $__env->yieldContent('title', $siteSettings->where('key', 'site-title')->first()->value ?? 'Today Tab'); ?><?php if (! empty(trim($__env->yieldContent('title')))): ?>
            - <?php echo e($siteSettings->where('key', 'site-title')->first()->value ?? 'Today Tab'); ?>

        <?php endif; ?>
    </title>
    <meta name="description" content="<?php echo $__env->yieldContent('meta_description', $siteSettings->where('key', 'site-description')->first()->value ?? 'Technology moves fast. We keep you faster.'); ?>">
    <meta name="keywords" content="<?php echo $__env->yieldContent('meta_keywords', 'Today Tab, Technologies, news, ai'); ?>">
    <meta name="author" content="Today Tab Team">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('apple-touch-icon.png')); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('favicon-32x32.png')); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('favicon-16x16.png')); ?>">
    <link rel="manifest" href="<?php echo e(asset('site.webmanifest')); ?>">
    <meta name="theme-color" content="#ffffff">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="<?php echo $__env->yieldContent('meta_og_type', 'website'); ?>">
    <meta property="og:url" content="<?php echo $__env->yieldContent('meta_og_url', url()->current()); ?>">
    <meta property="og:title" content="<?php echo $__env->yieldContent('title', $siteSettings->where('key', 'site-title')->first()->value ?? 'Today Tab'); ?><?php if (! empty(trim($__env->yieldContent('title')))): ?> - <?php echo e($siteSettings->where('key', 'site-title')->first()->value ?? 'Today Tab'); ?><?php endif; ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('meta_description', $siteSettings->where('key', 'site-description')->first()->value ?? 'Technology moves fast. We keep you faster.'); ?>">
    <meta property="og:image" content="<?php echo $__env->yieldContent('meta_og_image', asset('images/todaytab-og-image.png')); ?>">
    <meta property="og:site_name" content="<?php echo $__env->yieldContent('meta_og_site_name', 'Today Tab'); ?>">
    <meta property="og:locale" content="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

    <!-- Twitter -->
    <meta name="twitter:card" content="<?php echo $__env->yieldContent('meta_twitter_card', 'summary_large_image'); ?>">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('title', $siteSettings->where('key', 'site-title')->first()->value ?? 'Today Tab'); ?><?php if (! empty(trim($__env->yieldContent('title')))): ?> - <?php echo e($siteSettings->where('key', 'site-title')->first()->value ?? 'Today Tab'); ?><?php endif; ?>">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('meta_description', $siteSettings->where('key', 'site-description')->first()->value ?? 'Technology moves fast. We keep you faster.'); ?>">
    <meta name="twitter:image" content="<?php echo $__env->yieldContent('meta_og_image', asset('images/todaytab-og-image.png')); ?>">

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />

    <!-- Styles / Scripts -->
    <?php if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'))): ?>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php else: ?>
        <style>
            /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */@layer theme{:root,:host{--font-sans:'Instrument Sans',ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";--font-serif:ui-serif,Georgia,Cambria,"Times New Roman",Times,serif;--font-mono:ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;--color-red-50:oklch(.971 .013 17.38);--color-red-100:oklch(.936 .032 17.717);--color-red-200:oklch(.885 .062 18.334);--color-red-300:oklch(.808 .114 19.571);--color-red-400:oklch(.704 .191 22.216);--color-red-500:oklch(.637 .237 25.331);--color-red-600:oklch(.577 .245 27.325);--color-red-700:oklch(.505 .213 27.518);--color-red-800:oklch(.444 .177 26.899);--color-red-900:oklch(.396 .141 25.723);--color-red-950:oklch(.258 .092 26.042);--color-orange-50:oklch(.98 .016 73.684);--color-orange-100:oklch(.954 .038 75.164);--color-orange-200:oklch(.901 .076 70.697);--color-orange-300:oklch(.837 .128 66.29);--color-orange-400:oklch(.75 .183 55.934);--color-orange-500:oklch(.705 .213 47.604);--color-orange-600:oklch(.646 .222 41.116);--color-orange-700:oklch(.553 .195 38.402);--color-orange-800:oklch(.47 .157 37.304);--color-orange-900:oklch(.408 .123 38.172);--color-orange-950:oklch(.266 .079 36.259);--color-amber-50:oklch(.987 .022 95.277);--color-amber-100:oklch(.962 .059 95.617);--color-amber-200:oklch(.924 .12 95.746);--color-amber-300:oklch(.879 .169 91.605);--color-amber-400:oklch(.828 .189 84.429);--color-amber-500:oklch(.769 .188 70.08);--color-amber-600:oklch(.666 .179 58.318);--color-amber-700:oklch(.555 .163 48.998);--color-amber-800:oklch(.473 .137 46.201);--color-amber-900:oklch(.414 .112 45.904);--color-amber-950:oklch(.279 .077 45.635);--color-yellow-50:oklch(.987 .026 102.212);--color-yellow-100:oklch(.973 .071 103.193);--color-yellow-200:oklch(.945 .129 101.54);--color-yellow-300:oklch(.905 .182 98.111);--color-yellow-400:oklch(.852 .199 91.936);--color-yellow-500:oklch(.795 .184 86.047);--color-yellow-600:oklch(.681 .162 75.834);--color-yellow-700:oklch(.554 .135 66.442);--color-yellow-800:oklch(.476 .114 61.907);--color-yellow-900:oklch(.421 .095 57.708);--color-yellow-950:oklch(.286 .066 53.813);--color-lime-50:oklch(.986 .031 120.757);--color-lime-100:oklch(.967 .067 122.328);--color-lime-200:oklch(.938 .127 124.321);--color-lime-300:oklch(.897 .196 126.665);--color-lime-400:oklch(.841 .238 128.85);--color-lime-500:oklch(.768 .233 130.85);--color-lime-600:oklch(.648 .2 131.684);--color-lime-700:oklch(.532 .157 131.589);--color-lime-800:oklch(.453 .124 130.933);--color-lime-900:oklch(.405 .101 131.063);--color-lime-950:oklch(.274 .072 132.109);--color-green-50:oklch(.982 .018 155.826);--color-green-100:oklch(.962 .044 156.743);--color-green-200:oklch(.925 .084 155.995);--color-green-300:oklch(.871 .15 154.449);--color-green-400:oklch(.792 .209 151.711);--color-green-500:oklch(.723 .219 149.579);--color-green-600:oklch(.627 .194 149.214);--color-green-700:oklch(.527 .154 150.069);--color-green-800:oklch(.448 .119 151.328);--color-green-900:oklch(.393 .095 152.535);--color-green-950:oklch(.266 .065 152.934);--color-emerald-50:oklch(.979 .021 166.113);--color-emerald-100:oklch(.95 .052 163.051);--color-emerald-200:oklch(.905 .093 164.15);--color-emerald-300:oklch(.845 .143 164.978);--color-emerald-400:oklch(.765 .177 163.223);--color-emerald-500:oklch(.696 .17 162.48);--color-emerald-600:oklch(.596 .145 163.225);--color-emerald-700:oklch(.508 .118 165.612);--color-emerald-800:oklch(.432 .095 166.913);--color-emerald-900:oklch(.378 .077 168.94);--color-emerald-950:oklch(.262 .051 172.552);--color-teal-50:oklch(.984 .014 180.72);--color-teal-100:oklch(.953 .051 180.801);--color-teal-200:oklch(.91 .096 180.426);--color-teal-300:oklch(.855 .138 181.071);--color-teal-400:oklch(.777 .152 181.912);--color-teal-500:oklch(.704 .14 182.503);--color-teal-600:oklch(.6 .118 184.704);--color-teal-700:oklch(.511 .096 186.391);--color-teal-800:oklch(.437 .078 188.216);--color-teal-900:oklch(.386 .063 188.416);--color-teal-950:oklch(.277 .046 192.524);--color-cyan-50:oklch(.984 .019 200.873);--color-cyan-100:oklch(.956 .045 203.388);--color-cyan-200:oklch(.917 .08 205.041);--color-cyan-300:oklch(.865 .127 207.078);--color-cyan-400:oklch(.789 .154 211.53);--color-cyan-500:oklch(.715 .143 215.221);--color-cyan-600:oklch(.609 .126 221.723);--color-cyan-700:oklch(.52 .105 223.128);--color-cyan-800:oklch(.45 .085 224.283);--color-cyan-900:oklch(.398 .07 227.392);--color-cyan-950:oklch(.302 .056 229.695);--color-sky-50:oklch(.977 .013 236.62);--color-sky-100:oklch(.951 .026 236.824);--color-sky-200:oklch(.901 .058 230.902);--color-sky-300:oklch(.828 .111 230.318);--color-sky-400:oklch(.746 .16 232.661);--color-sky-500:oklch(.685 .169 237.323);--color-sky-600:oklch(.588 .158 241.966);--color-sky-700:oklch(.5 .134 242.749);--color-sky-800:oklch(.443 .11 240.79);--color-sky-900:oklch(.391 .09 240.876);--color-sky-950:oklch(.293 .066 243.157);--color-blue-50:oklch(.97 .014 254.604);--color-blue-100:oklch(.932 .032 255.585);--color-blue-200:oklch(.882 .059 254.128);--color-blue-300:oklch(.809 .105 251.813);--color-blue-400:oklch(.707 .165 254.624);--color-blue-500:oklch(.623 .214 259.815);--color-blue-600:oklch(.546 .245 262.881);--color-blue-700:oklch(.488 .243 264.376);--color-blue-800:oklch(.424 .199 265.638);--color-blue-900:oklch(.379 .146 265.522);--color-blue-950:oklch(.282 .091 267.935);--color-indigo-50:oklch(.962 .018 272.314);--color-indigo-100:oklch(.93 .034 272.788);--color-indigo-200:oklch(.87 .065 274.039);--color-indigo-300:oklch(.785 .115 274.713);--color-indigo-400:oklch(.673 .182 276.935);--color-indigo-500:oklch(.585 .233 277.117);--color-indigo-600:oklch(.511 .262 276.966);--color-indigo-700:oklch(.457 .24 277.023);--color-indigo-800:oklch(.398 .195 277.366);--color-indigo-900:oklch(.359 .144 278.697);--color-indigo-950:oklch(.257 .09 281.288);--color-violet-50:oklch(.969 .016 293.756);--color-violet-100:oklch(.943 .029 294.588);--color-violet-200:oklch(.894 .057 293.283);--color-violet-300:oklch(.811 .111 293.571);--color-violet-400:oklch(.702 .183 293.541);--color-violet-500:oklch(.606 .25 292.717);--color-violet-600:oklch(.541 .281 293.009);--color-violet-700:oklch(.491 .27 292.581);--color-violet-800:oklch(.432 .232 292.759);--color-violet-900:oklch(.38 .189 293.745);--color-violet-950:oklch(.283 .141 291.089);--color-purple-50:oklch(.977 .014 308.299);--color-purple-100:oklch(.946 .033 307.174);--color-purple-200:oklch(.902 .063 306.703);--color-purple-300:oklch(.827 .119 306.383);--color-purple-400:oklch(.714 .203 305.504);--color-purple-500:oklch(.627 .265 303.9);--color-purple-600:oklch(.558 .288 302.321);--color-purple-700:oklch(.496 .265 301.924);--color-purple-800:oklch(.438 .218 303.724);--color-purple-900:oklch(.381 .176 304.987);--color-purple-950:oklch(.291 .149 302.717);--color-fuchsia-50:oklch(.977 .017 320.058);--color-fuchsia-100:oklch(.952 .037 318.852);--color-fuchsia-200:oklch(.903 .076 319.62);--color-fuchsia-300:oklch(.833 .145 321.434);--color-fuchsia-400:oklch(.74 .238 322.16);--color-fuchsia-500:oklch(.667 .295 322.15);--color-fuchsia-600:oklch(.591 .293 322.896);--color-fuchsia-700:oklch(.518 .253 323.949);--color-fuchsia-800:oklch(.452 .211 324.591);--color-fuchsia-900:oklch(.401 .17 325.612);--color-fuchsia-950:oklch(.293 .136 325.661);--color-pink-50:oklch(.971 .014 343.198);--color-pink-100:oklch(.948 .028 342.258);--color-pink-200:oklch(.899 .061 343.231);--color-pink-300:oklch(.823 .12 346.018);--color-pink-400:oklch(.718 .202 349.761);--color-pink-500:oklch(.656 .241 354.308);--color-pink-600:oklch(.592 .249 .584);--color-pink-700:oklch(.525 .223 3.958);--color-pink-800:oklch(.459 .187 3.815);--color-pink-900:oklch(.408 .153 2.432);--color-pink-950:oklch(.284 .109 3.907);--color-rose-50:oklch(.969 .015 12.422);--color-rose-100:oklch(.941 .03 12.58);--color-rose-200:oklch(.892 .058 10.001);--color-rose-300:oklch(.81 .117 11.638);--color-rose-400:oklch(.712 .194 13.428);--color-rose-500:oklch(.645 .246 16.439);--color-rose-600:oklch(.586 .253 17.585);--color-rose-700:oklch(.514 .222 16.935);--color-rose-800:oklch(.455 .188 13.697);--color-rose-900:oklch(.41 .159 10.272);--color-rose-950:oklch(.271 .105 12.094);--color-slate-50:oklch(.984 .003 247.858);--color-slate-100:oklch(.968 .007 247.896);--color-slate-200:oklch(.929 .013 255.508);--color-slate-300:oklch(.869 .022 252.894);--color-slate-400:oklch(.704 .04 256.788);--color-slate-500:oklch(.554 .046 257.417);--color-slate-600:oklch(.446 .043 257.281);--color-slate-700:oklch(.372 .044 257.287);--color-slate-800:oklch(.279 .041 260.031);--color-slate-900:oklch(.208 .042 265.755);--color-slate-950:oklch(.129 .042 264.695);--color-gray-50:oklch(.985 .002 247.839);--color-gray-100:oklch(.967 .003 264.542);--color-gray-200:oklch(.928 .006 264.531);--color-gray-300:oklch(.872 .01 258.338);--color-gray-400:oklch(.707 .022 261.325);--color-gray-500:oklch(.551 .027 264.364);--color-gray-600:oklch(.446 .03 256.802);--color-gray-700:oklch(.373 .034 259.733);--color-gray-800:oklch(.278 .033 256.848);--color-gray-900:oklch(.21 .034 264.665);--color-gray-950:oklch(.13 .028 261.692);--color-zinc-50:oklch(.985 0 0);--color-zinc-100:oklch(.967 .001 286.375);--color-zinc-200:oklch(.92 .004 286.32);--color-zinc-300:oklch(.871 .006 286.286);--color-zinc-400:oklch(.705 .015 286.067);--color-zinc-500:oklch(.552 .016 285.938);--color-zinc-600:oklch(.442 .017 285.786);--color-zinc-700:oklch(.37 .013 285.805);--color-zinc-800:oklch(.274 .006 286.033);--color-zinc-900:oklch(.21 .006 285.885);--color-zinc-950:oklch(.141 .005 285.823);--color-neutral-50:oklch(.985 0 0);--color-neutral-100:oklch(.97 0 0);--color-neutral-200:oklch(.922 0 0);--color-neutral-300:oklch(.87 0 0);--color-neutral-400:oklch(.708 0 0);--color-neutral-500:oklch(.556 0 0);--color-neutral-600:oklch(.439 0 0);--color-neutral-700:oklch(.371 0 0);--color-neutral-800:oklch(.269 0 0);--color-neutral-900:oklch(.205 0 0);--color-neutral-950:oklch(.145 0 0);--color-stone-50:oklch(.985 .001 106.423);--color-stone-100:oklch(.97 .001 106.424);--color-stone-200:oklch(.923 .003 48.717);--color-stone-300:oklch(.869 .005 56.366);--color-stone-400:oklch(.709 .01 56.259);--color-stone-500:oklch(.553 .013 58.071);--color-stone-600:oklch(.444 .011 73.639);--color-stone-700:oklch(.374 .01 67.558);--color-stone-800:oklch(.268 .007 34.298);--color-stone-900:oklch(.216 .006 56.043);--color-stone-950:oklch(.147 .004 49.25);--color-black:#000;--color-white:#fff;--spacing:.25rem;--breakpoint-sm:40rem;--breakpoint-md:48rem;--breakpoint-lg:64rem;--breakpoint-xl:80rem;--breakpoint-2xl:96rem;--container-3xs:16rem;--container-2xs:18rem;--container-xs:20rem;--container-sm:24rem;--container-md:28rem;--container-lg:32rem;--container-xl:36rem;--container-2xl:42rem;--container-3xl:48rem;--container-4xl:56rem;--container-5xl:64rem;--container-6xl:72rem;--container-7xl:80rem;--text-xs:.75rem;--text-xs--line-height:calc(1/.75);--text-sm:.875rem;--text-sm--line-height:calc(1.25/.875);--text-base:1rem;--text-base--line-height: 1.5 ;--text-lg:1.125rem;--text-lg--line-height:calc(1.75/1.125);--text-xl:1.25rem;--text-xl--line-height:calc(1.75/1.25);--text-2xl:1.5rem;--text-2xl--line-height:calc(2/1.5);--text-3xl:1.875rem;--text-3xl--line-height: 1.2 ;--text-4xl:2.25rem;--text-4xl--line-height:calc(2.5/2.25);--text-5xl:3rem;--text-5xl--line-height:1;--text-6xl:3.75rem;--text-6xl--line-height:1;--text-7xl:4.5rem;--text-7xl--line-height:1;--text-8xl:6rem;--text-8xl--line-height:1;--text-9xl:8rem;--text-9xl--line-height:1;--font-weight-thin:100;--font-weight-extralight:200;--font-weight-light:300;--font-weight-normal:400;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--font-weight-extrabold:800;--font-weight-black:900;--tracking-tighter:-.05em;--tracking-tight:-.025em;--tracking-normal:0em;--tracking-wide:.025em;--tracking-wider:.05em;--tracking-widest:.1em;--leading-tight:1.25;--leading-snug:1.375;--leading-normal:1.5;--leading-relaxed:1.625;--leading-loose:2;--radius-xs:.125rem;--radius-sm:.25rem;--radius-md:.375rem;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--radius-3xl:1.5rem;--radius-4xl:2rem;--shadow-2xs:0 1px #0000000d;--shadow-xs:0 1px 2px 0 #0000000d;--shadow-sm:0 1px 3px 0 #0000001a,0 1px 2px -1px #0000001a;--shadow-md:0 4px 6px -1px #0000001a,0 2px 4px -2px #0000001a;--shadow-lg:0 10px 15px -3px #0000001a,0 4px 6px -4px #0000001a;--shadow-xl:0 20px 25px -5px #0000001a,0 8px 10px -6px #0000001a;--shadow-2xl:0 25px 50px -12px #00000040;--inset-shadow-2xs:inset 0 1px #0000000d;--inset-shadow-xs:inset 0 1px 1px #0000000d;--inset-shadow-sm:inset 0 2px 4px #0000000d;--drop-shadow-xs:0 1px 1px #0000000d;--drop-shadow-sm:0 1px 2px #00000026;--drop-shadow-md:0 3px 3px #0000001f;--drop-shadow-lg:0 4px 4px #00000026;--drop-shadow-xl:0 9px 7px #0000001a;--drop-shadow-2xl:0 25px 25px #00000026;--ease-in:cubic-bezier(.4,0,1,1);--ease-out:cubic-bezier(0,0,.2,1);--ease-in-out:cubic-bezier(.4,0,.2,1);--animate-spin:spin 1s linear infinite;--animate-ping:ping 1s cubic-bezier(0,0,.2,1)infinite;--animate-pulse:pulse 2s cubic-bezier(.4,0,.6,1)infinite;--animate-bounce:bounce 1s infinite;--blur-xs:4px;--blur-sm:8px;--blur-md:12px;--blur-lg:16px;--blur-xl:24px;--blur-2xl:40px;--blur-3xl:64px;--perspective-dramatic:100px;--perspective-near:300px;--perspective-normal:500px;--perspective-midrange:800px;--perspective-distant:1200px;--aspect-video:16/9;--default-transition-duration:.15s;--default-transition-timing-function:cubic-bezier(.4,0,.2,1);--default-font-family:var(--font-sans);--default-font-feature-settings:var(--font-sans--font-feature-settings);--default-font-variation-settings:var(--font-sans--font-variation-settings);--default-mono-font-family:var(--font-mono);--default-mono-font-feature-settings:var(--font-mono--font-feature-settings);--default-mono-font-variation-settings:var(--font-mono--font-variation-settings)}}@layer base{*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}::file-selector-button{box-sizing:border-box;border:0 solid;margin:0;padding:0}html,:host{-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;line-height:1.5;font-family:var(--default-font-family,ui-sans-serif,system-ui,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji");font-feature-settings:var(--default-font-feature-settings,normal);font-variation-settings:var(--default-font-variation-settings,normal);-webkit-tap-highlight-color:transparent}body{line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;-webkit-text-decoration:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:var(--default-mono-font-family,ui-monospace,SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace);font-feature-settings:var(--default-mono-font-feature-settings,normal);font-variation-settings:var(--default-mono-font-variation-settings,normal);font-size:1em}small{font-size:80%}sub,sup{vertical-align:baseline;font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}:-moz-focusring{outline:auto}progress{vertical-align:baseline}summary{display:list-item}ol,ul,menu{list-style:none}img,svg,video,canvas,audio,iframe,embed,object{vertical-align:middle;display:block}img,video{max-width:100%;height:auto}button,input,select,optgroup,textarea{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}::file-selector-button{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}:where(select:is([multiple],[size])) optgroup{font-weight:bolder}:where(select:is([multiple],[size])) optgroup option{padding-inline-start:20px}::file-selector-button{margin-inline-end:4px}::placeholder{opacity:1;color:color-mix(in oklab,currentColor 50%,transparent)}textarea{resize:vertical}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-date-and-time-value{min-height:1lh;text-align:inherit}::-webkit-datetime-edit{display:inline-flex}::-webkit-datetime-edit-fields-wrapper{padding:0}::-webkit-datetime-edit{padding-block:0}::-webkit-datetime-edit-year-field{padding-block:0}::-webkit-datetime-edit-month-field{padding-block:0}::-webkit-datetime-edit-day-field{padding-block:0}::-webkit-datetime-edit-hour-field{padding-block:0}::-webkit-datetime-edit-minute-field{padding-block:0}::-webkit-datetime-edit-second-field{padding-block:0}::-webkit-datetime-edit-millisecond-field{padding-block:0}::-webkit-datetime-edit-meridiem-field{padding-block:0}:-moz-ui-invalid{box-shadow:none}button,input:where([type=button],[type=reset],[type=submit]){-webkit-appearance:button;-moz-appearance:button;appearance:button}::file-selector-button{-webkit-appearance:button;-moz-appearance:button;appearance:button}::-webkit-inner-spin-button{height:auto}::-webkit-outer-spin-button{height:auto}[hidden]:where(:not([hidden=until-found])){display:none!important}}@layer components;@layer utilities{.absolute{position:absolute}.relative{position:relative}.static{position:static}.inset-0{inset:calc(var(--spacing)*0)}.-mt-\[4\.9rem\]{margin-top:-4.9rem}.-mb-px{margin-bottom:-1px}.mb-1{margin-bottom:calc(var(--spacing)*1)}.mb-2{margin-bottom:calc(var(--spacing)*2)}.mb-4{margin-bottom:calc(var(--spacing)*4)}.mb-6{margin-bottom:calc(var(--spacing)*6)}.-ml-8{margin-left:calc(var(--spacing)*-8)}.flex{display:flex}.hidden{display:none}.inline-block{display:inline-block}.inline-flex{display:inline-flex}.table{display:table}.aspect-\[335\/376\]{aspect-ratio:335/376}.h-1{height:calc(var(--spacing)*1)}.h-1\.5{height:calc(var(--spacing)*1.5)}.h-2{height:calc(var(--spacing)*2)}.h-2\.5{height:calc(var(--spacing)*2.5)}.h-3{height:calc(var(--spacing)*3)}.h-3\.5{height:calc(var(--spacing)*3.5)}.h-14{height:calc(var(--spacing)*14)}.h-14\.5{height:calc(var(--spacing)*14.5)}.min-h-screen{min-height:100vh}.w-1{width:calc(var(--spacing)*1)}.w-1\.5{width:calc(var(--spacing)*1.5)}.w-2{width:calc(var(--spacing)*2)}.w-2\.5{width:calc(var(--spacing)*2.5)}.w-3{width:calc(var(--spacing)*3)}.w-3\.5{width:calc(var(--spacing)*3.5)}.w-\[448px\]{width:448px}.w-full{width:100%}.max-w-\[335px\]{max-width:335px}.max-w-none{max-width:none}.flex-1{flex:1}.shrink-0{flex-shrink:0}.translate-y-0{--tw-translate-y:calc(var(--spacing)*0);translate:var(--tw-translate-x)var(--tw-translate-y)}.transform{transform:var(--tw-rotate-x)var(--tw-rotate-y)var(--tw-rotate-z)var(--tw-skew-x)var(--tw-skew-y)}.flex-col{flex-direction:column}.flex-col-reverse{flex-direction:column-reverse}.items-center{align-items:center}.justify-center{justify-content:center}.justify-end{justify-content:flex-end}.gap-3{gap:calc(var(--spacing)*3)}.gap-4{gap:calc(var(--spacing)*4)}:where(.space-x-1>:not(:last-child)){--tw-space-x-reverse:0;margin-inline-start:calc(calc(var(--spacing)*1)*var(--tw-space-x-reverse));margin-inline-end:calc(calc(var(--spacing)*1)*calc(1 - var(--tw-space-x-reverse)))}.overflow-hidden{overflow:hidden}.rounded-full{border-radius:3.40282e38px}.rounded-sm{border-radius:var(--radius-sm)}.rounded-t-lg{border-top-left-radius:var(--radius-lg);border-top-right-radius:var(--radius-lg)}.rounded-br-lg{border-bottom-right-radius:var(--radius-lg)}.rounded-bl-lg{border-bottom-left-radius:var(--radius-lg)}.border{border-style:var(--tw-border-style);border-width:1px}.border-\[\#19140035\]{border-color:#19140035}.border-\[\#e3e3e0\]{border-color:#e3e3e0}.border-black{border-color:var(--color-black)}.border-transparent{border-color:#0000}.bg-\[\#1b1b18\]{background-color:#1b1b18}.bg-\[\#FDFDFC\]{background-color:#fdfdfc}.bg-\[\#dbdbd7\]{background-color:#dbdbd7}.bg-\[\#fff2f2\]{background-color:#fff2f2}.bg-white{background-color:var(--color-white)}.p-6{padding:calc(var(--spacing)*6)}.px-5{padding-inline:calc(var(--spacing)*5)}.py-1{padding-block:calc(var(--spacing)*1)}.py-1\.5{padding-block:calc(var(--spacing)*1.5)}.py-2{padding-block:calc(var(--spacing)*2)}.pb-12{padding-bottom:calc(var(--spacing)*12)}.text-sm{font-size:var(--text-sm);line-height:var(--tw-leading,var(--text-sm--line-height))}.text-\[13px\]{font-size:13px}.leading-\[20px\]{--tw-leading:20px;line-height:20px}.leading-normal{--tw-leading:var(--leading-normal);line-height:var(--leading-normal)}.font-medium{--tw-font-weight:var(--font-weight-medium);font-weight:var(--font-weight-medium)}.text-\[\#1b1b18\]{color:#1b1b18}.text-\[\#706f6c\]{color:#706f6c}.text-\[\#F53003\],.text-\[\#f53003\]{color:#f53003}.text-white{color:var(--color-white)}.underline{text-decoration-line:underline}.underline-offset-4{text-underline-offset:4px}.opacity-100{opacity:1}.shadow-\[0px_0px_1px_0px_rgba\(0\,0\,0\,0\.03\)\,0px_1px_2px_0px_rgba\(0\,0\,0\,0\.06\)\]{--tw-shadow:0px 0px 1px 0px var(--tw-shadow-color,#00000008),0px 1px 2px 0px var(--tw-shadow-color,#0000000f);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-\[inset_0px_0px_0px_1px_rgba\(26\,26\,0\,0\.16\)\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#1a1a0029);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.\!filter{filter:var(--tw-blur,)var(--tw-brightness,)var(--tw-contrast,)var(--tw-grayscale,)var(--tw-hue-rotate,)var(--tw-invert,)var(--tw-saturate,)var(--tw-sepia,)var(--tw-drop-shadow,)!important}.filter{filter:var(--tw-blur,)var(--tw-brightness,)var(--tw-contrast,)var(--tw-grayscale,)var(--tw-hue-rotate,)var(--tw-invert,)var(--tw-saturate,)var(--tw-sepia,)var(--tw-drop-shadow,)}.transition-all{transition-property:all;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.transition-opacity{transition-property:opacity;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.delay-300{transition-delay:.3s}.duration-750{--tw-duration:.75s;transition-duration:.75s}.not-has-\[nav\]\:hidden:not(:has(:is(nav))){display:none}.before\:absolute:before{content:var(--tw-content);position:absolute}.before\:top-0:before{content:var(--tw-content);top:calc(var(--spacing)*0)}.before\:top-1\/2:before{content:var(--tw-content);top:50%}.before\:bottom-0:before{content:var(--tw-content);bottom:calc(var(--spacing)*0)}.before\:bottom-1\/2:before{content:var(--tw-content);bottom:50%}.before\:left-\[0\.4rem\]:before{content:var(--tw-content);left:.4rem}.before\:border-l:before{content:var(--tw-content);border-left-style:var(--tw-border-style);border-left-width:1px}.before\:border-\[\#e3e3e0\]:before{content:var(--tw-content);border-color:#e3e3e0}@media (hover:hover){.hover\:border-\[\#1915014a\]:hover{border-color:#1915014a}.hover\:border-\[\#19140035\]:hover{border-color:#19140035}.hover\:border-black:hover{border-color:var(--color-black)}.hover\:bg-black:hover{background-color:var(--color-black)}}@media (width>=64rem){.lg\:-mt-\[6\.6rem\]{margin-top:-6.6rem}.lg\:mb-0{margin-bottom:calc(var(--spacing)*0)}.lg\:mb-6{margin-bottom:calc(var(--spacing)*6)}.lg\:-ml-px{margin-left:-1px}.lg\:ml-0{margin-left:calc(var(--spacing)*0)}.lg\:block{display:block}.lg\:aspect-auto{aspect-ratio:auto}.lg\:w-\[438px\]{width:438px}.lg\:max-w-4xl{max-width:var(--container-4xl)}.lg\:grow{flex-grow:1}.lg\:flex-row{flex-direction:row}.lg\:justify-center{justify-content:center}.lg\:rounded-t-none{border-top-left-radius:0;border-top-right-radius:0}.lg\:rounded-tl-lg{border-top-left-radius:var(--radius-lg)}.lg\:rounded-r-lg{border-top-right-radius:var(--radius-lg);border-bottom-right-radius:var(--radius-lg)}.lg\:rounded-br-none{border-bottom-right-radius:0}.lg\:p-8{padding:calc(var(--spacing)*8)}.lg\:p-20{padding:calc(var(--spacing)*20)}}@media (prefers-color-scheme:dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:border-\[\#3E3E3A\]{border-color:#3e3e3a}.dark\:border-\[\#eeeeec\]{border-color:#eeeeec}.dark\:bg-\[\#0a0a0a\]{background-color:#0a0a0a}.dark\:bg-\[\#1D0002\]{background-color:#1d0002}.dark\:bg-\[\#3E3E3A\]{background-color:#3e3e3a}.dark\:bg-\[\#161615\]{background-color:#161615}.dark\:bg-\[\#eeeeec\]{background-color:#eeeeec}.dark\:text-\[\#1C1C1A\]{color:#1c1c1a}.dark\:text-\[\#A1A09A\]{color:#a1a09a}.dark\:text-\[\#EDEDEC\]{color:#ededec}.dark\:text-\[\#F61500\]{color:#f61500}.dark\:text-\[\#FF4433\]{color:#f43}.dark\:shadow-\[inset_0px_0px_0px_1px_\#fffaed2d\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#fffaed2d);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.dark\:before\:border-\[\#3E3E3A\]:before{content:var(--tw-content);border-color:#3e3e3a}@media (hover:hover){.dark\:hover\:border-\[\#3E3E3A\]:hover{border-color:#3e3e3a}.dark\:hover\:border-\[\#62605b\]:hover{border-color:#62605b}.dark\:hover\:border-white:hover{border-color:var(--color-white)}.dark\:hover\:bg-white:hover{background-color:var(--color-white)}}}@starting-style{.starting\:translate-y-4{--tw-translate-y:calc(var(--spacing)*4);translate:var(--tw-translate-x)var(--tw-translate-y)}}@starting-style{.starting\:translate-y-6{--tw-translate-y:calc(var(--spacing)*6);translate:var(--tw-translate-x)var(--tw-translate-y)}}@starting-style{.starting\:opacity-0{opacity:0}}}@keyframes spin{to{transform:rotate(360deg)}}@keyframes ping{75%,to{opacity:0;transform:scale(2)}}@keyframes pulse{50%{opacity:.5}}@keyframes bounce{0%,to{animation-timing-function:cubic-bezier(.8,0,1,1);transform:translateY(-25%)}50%{animation-timing-function:cubic-bezier(0,0,.2,1);transform:none}}@property --tw-translate-x{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-y{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-z{syntax:"*";inherits:false;initial-value:0}@property --tw-rotate-x{syntax:"*";inherits:false;initial-value:rotateX(0)}@property --tw-rotate-y{syntax:"*";inherits:false;initial-value:rotateY(0)}@property --tw-rotate-z{syntax:"*";inherits:false;initial-value:rotateZ(0)}@property --tw-skew-x{syntax:"*";inherits:false;initial-value:skewX(0)}@property --tw-skew-y{syntax:"*";inherits:false;initial-value:skewY(0)}@property --tw-space-x-reverse{syntax:"*";inherits:false;initial-value:0}@property --tw-border-style{syntax:"*";inherits:false;initial-value:solid}@property --tw-leading{syntax:"*";inherits:false}@property --tw-font-weight{syntax:"*";inherits:false}@property --tw-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-shadow-color{syntax:"*";inherits:false}@property --tw-inset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-shadow-color{syntax:"*";inherits:false}@property --tw-ring-color{syntax:"*";inherits:false}@property --tw-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-ring-color{syntax:"*";inherits:false}@property --tw-inset-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-ring-inset{syntax:"*";inherits:false}@property --tw-ring-offset-width{syntax:"<length>";inherits:false;initial-value:0}@property --tw-ring-offset-color{syntax:"*";inherits:false;initial-value:#fff}@property --tw-ring-offset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-blur{syntax:"*";inherits:false}@property --tw-brightness{syntax:"*";inherits:false}@property --tw-contrast{syntax:"*";inherits:false}@property --tw-grayscale{syntax:"*";inherits:false}@property --tw-hue-rotate{syntax:"*";inherits:false}@property --tw-invert{syntax:"*";inherits:false}@property --tw-opacity{syntax:"*";inherits:false}@property --tw-saturate{syntax:"*";inherits:false}@property --tw-sepia{syntax:"*";inherits:false}@property --tw-drop-shadow{syntax:"*";inherits:false}@property --tw-duration{syntax:"*";inherits:false}@property --tw-content{syntax:"*";inherits:false;initial-value:""}
        </style>
    <?php endif; ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GXDRQLHJNT"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-GXDRQLHJNT');
    </script>
</head>

<body class="min-h-screen flex flex-col bg-white">
    <!-- Top utility bar -->
    <div class="bg-black text-white text-xs py-1.5 border-b border-gray-800" role="marquee" aria-label="Live updates">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-2" aria-live="polite">
                    <div class="w-2 h-2 bg-green-400 rounded-full live-indicator" aria-hidden="true"></div>
                    <span class="font-medium">LIVE</span>
                </div>
                <span class="text-gray-300">Latest Tech Updates</span>
                <time class="hidden lg:inline text-gray-400" id="live-time" datetime="<?php echo e(now()->toIso8601String()); ?>"></time>
            </div>
            <nav class="flex items-center space-x-6" aria-label="Utility navigation">
                <div class="hidden md:flex items-center space-x-4 text-gray-300">
                    <?php $__currentLoopData = $siteSettings->where('key', 'nav-top'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1 = $attributes; } ?>
<?php $component = App\View\Components\SiteSettingItem::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site-setting-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SiteSettingItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item),'class' => 'font-medium text-gray-600 hover:text-gray-300 transition-colors']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1)): ?>
<?php $attributes = $__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1; ?>
<?php unset($__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1)): ?>
<?php $component = $__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1; ?>
<?php unset($__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php if(auth()->guard()->check()): ?>
                    <span class="text-gray-300">Welcome, <span class="text-white"><?php echo e(auth()->user()->username); ?></span></span>
                <?php endif; ?>
            </nav>
        </div>
    </div>

    <header class="sticky top-0 z-50 bg-white border-b border-gray-100" role="banner">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Top bar -->
            <div class="flex items-center justify-between h-16 border-b border-gray-100">
                <div class="hidden md:flex items-center space-x-3" aria-label="Current date and time">
                    <div class="grid grid-cols-4 gap-1">
                        <div class="date-box text-white px-2 py-1 text-center min-w-[48px]">
                            <div class="text-[10px] font-light opacity-80"><?php echo e(strtoupper(substr(date('l'), 0, 3))); ?></div>
                            <div class="text-xs font-bold"><?php echo e(date('j')); ?></div>
                        </div>
                        <div class="date-box text-white px-2 py-1 text-center min-w-[48px]">
                            <div class="text-[10px] font-light opacity-80"><?php echo e(strtoupper(substr(date('F'), 0, 3))); ?></div>
                            <div class="text-xs font-bold"><?php echo e(date('Y')); ?></div>
                        </div>
                        <div class="tech-accent text-white px-2 py-1 text-center min-w-[48px]">
                            <div class="text-[10px] font-light opacity-90" id="current-hour" datetime="<?php echo e(now()->toIso8601String()); ?>"><?php echo e(date('H')); ?></div>
                            <div class="text-xs font-bold" id="current-minute" datetime="<?php echo e(now()->toIso8601String()); ?>"><?php echo e(date('i')); ?></div>
                        </div>
                    </div>
                </div>

                <!-- Logo -->
                <a href="<?php echo e(route('home')); ?>" class="flex items-center" aria-label="Homepage">
                    <svg width="155" height="21" viewBox="0 0 155 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.94332 20.4054V5.87248H0.119141V1.17468H17.3994V5.87248H11.3829V20.4054H5.94332Z" fill="black"/>
                        <path d="M28.7766 20.6802C27.2931 20.6802 25.9286 20.4329 24.6832 19.9384C23.4378 19.4439 22.3572 18.7479 21.4415 17.8505C20.5257 16.9531 19.8114 15.9 19.2986 14.6912C18.8041 13.4641 18.5569 12.1271 18.5569 10.6802C18.5569 9.21498 18.8041 7.87798 19.2986 6.66919C19.8114 5.4604 20.5257 4.40728 21.4415 3.50985C22.3572 2.61241 23.4378 1.91644 24.6832 1.42193C25.9286 0.927429 27.2931 0.680176 28.7766 0.680176C30.2601 0.680176 31.6155 0.927429 32.8426 1.42193C34.088 1.91644 35.1686 2.61241 36.0843 3.50985C37.0184 4.40728 37.7327 5.4604 38.2272 6.66919C38.7217 7.87798 38.9689 9.20582 38.9689 10.6527C38.9689 12.1179 38.7217 13.4641 38.2272 14.6912C37.7327 15.9 37.0184 16.9531 36.0843 17.8505C35.1686 18.7479 34.088 19.4439 32.8426 19.9384C31.6155 20.4329 30.2601 20.6802 28.7766 20.6802ZM28.7766 15.6252C29.436 15.6252 30.0495 15.5062 30.6173 15.2681C31.1851 15.03 31.6796 14.6912 32.1008 14.2516C32.5221 13.7937 32.8426 13.2626 33.0623 12.6582C33.3004 12.0538 33.4195 11.3945 33.4195 10.6802C33.4195 9.96589 33.3004 9.30655 33.0623 8.70215C32.8426 8.09776 32.5221 7.57578 32.1008 7.13622C31.6796 6.67834 31.1851 6.33036 30.6173 6.09226C30.0495 5.85417 29.436 5.73512 28.7766 5.73512C28.099 5.73512 27.4763 5.85417 26.9085 6.09226C26.3407 6.33036 25.8462 6.67834 25.425 7.13622C25.0037 7.57578 24.6741 8.09776 24.436 8.70215C24.2162 9.28823 24.1063 9.94758 24.1063 10.6802C24.1063 11.3945 24.2162 12.0538 24.436 12.6582C24.6741 13.2626 25.0037 13.7937 25.425 14.2516C25.8462 14.6912 26.3407 15.03 26.9085 15.2681C27.4763 15.5062 28.099 15.6252 28.7766 15.6252Z" fill="black"/>
                        <path d="M42.3809 20.4054V1.17468H50.6776C52.1245 1.17468 53.4432 1.41278 54.6336 1.88897C55.8241 2.36516 56.8589 3.03366 57.738 3.89446C58.6172 4.73695 59.2948 5.74428 59.771 6.91644C60.2472 8.0886 60.4853 9.37981 60.4853 10.7901C60.4853 12.182 60.2472 13.4732 59.771 14.6637C59.2948 15.8359 58.6172 16.8523 57.738 17.7131C56.8589 18.5556 55.8241 19.215 54.6336 19.6912C53.4432 20.1674 52.1245 20.4054 50.6776 20.4054H42.3809ZM47.8205 16.9439L46.9688 15.7076H50.5402C51.2179 15.7076 51.8223 15.5886 52.3534 15.3505C52.9029 15.1124 53.3699 14.7827 53.7545 14.3615C54.1391 13.9219 54.4413 13.4 54.6611 12.7956C54.8809 12.1912 54.9908 11.5227 54.9908 10.7901C54.9908 10.0575 54.8809 9.38897 54.6611 8.78457C54.4413 8.18018 54.13 7.66736 53.7271 7.24611C53.3424 6.80655 52.8846 6.46772 52.3534 6.22963C51.8223 5.99153 51.2179 5.87248 50.5402 5.87248H46.8864L47.8205 4.69116V16.9439Z" fill="black"/>
                        <path d="M60.751 20.4054L68.4158 1.17468H72.8114L80.4213 20.4054H75.0092L71.7125 11.4769C71.5294 10.9824 71.3646 10.5245 71.218 10.1033C71.0715 9.68201 70.9342 9.26992 70.8059 8.86699C70.6777 8.46406 70.5495 8.05197 70.4213 7.63072C70.3114 7.20948 70.2107 6.7516 70.1191 6.2571L70.9983 6.22963C70.8884 6.76076 70.7693 7.23695 70.6411 7.6582C70.5312 8.07944 70.4122 8.48237 70.284 8.86699C70.1558 9.2516 70.0092 9.65453 69.8444 10.0758C69.6979 10.497 69.5331 10.9641 69.3499 11.4769L66.0532 20.4054H60.751ZM64.4873 17.2186L66.1081 13.3725H75.0092L76.5202 17.2186H64.4873Z" fill="black"/>
                        <path d="M85.0726 20.4054V10.8175L85.2649 12.1637L77.4901 1.17468H83.589L89.5231 9.69116L86.3088 9.60875L91.666 1.17468H98.6L90.155 12.4659L90.5671 10.5978V20.4054H85.0726Z" fill="black"/>
                        <path d="M106.136 20.4054V5.87248H100.312V1.17468H117.592V5.87248H111.576V20.4054H106.136Z" fill="#FE4342"/>
                        <path d="M116.757 20.4054L124.422 1.17468H128.817L136.427 20.4054H131.015L127.719 11.4769C127.535 10.9824 127.371 10.5245 127.224 10.1033C127.078 9.68201 126.94 9.26992 126.812 8.86699C126.684 8.46406 126.556 8.05197 126.427 7.63072C126.317 7.20948 126.217 6.7516 126.125 6.2571L127.004 6.22963C126.894 6.76076 126.775 7.23695 126.647 7.6582C126.537 8.07944 126.418 8.48237 126.29 8.86699C126.162 9.2516 126.015 9.65453 125.85 10.0758C125.704 10.497 125.539 10.9641 125.356 11.4769L122.059 20.4054H116.757ZM120.493 17.2186L122.114 13.3725H131.015L132.526 17.2186H120.493Z" fill="#FE4342"/>
                        <path d="M138.388 20.4054V1.17468H147.097C148.453 1.17468 149.597 1.36699 150.531 1.75161C151.484 2.13622 152.207 2.67651 152.702 3.37248C153.196 4.06845 153.443 4.89263 153.443 5.84501C153.443 6.98054 153.178 7.92377 152.647 8.67468C152.116 9.4256 151.346 9.92926 150.339 10.1857L150.257 9.66369C151.099 9.86516 151.832 10.1948 152.454 10.6527C153.095 11.0923 153.59 11.6417 153.938 12.3011C154.286 12.9421 154.46 13.6838 154.46 14.5263C154.46 15.5153 154.277 16.3761 153.91 17.1087C153.562 17.8413 153.059 18.4549 152.399 18.9494C151.758 19.4439 151.007 19.8102 150.147 20.0483C149.304 20.2864 148.379 20.4054 147.372 20.4054H138.388ZM143.471 16.0373H147.207C147.628 16.0373 147.976 15.9732 148.251 15.845C148.544 15.6985 148.764 15.4879 148.91 15.2131C149.075 14.9384 149.158 14.6087 149.158 14.2241C149.158 13.8578 149.075 13.5556 148.91 13.3175C148.746 13.0794 148.507 12.8963 148.196 12.7681C147.885 12.6216 147.509 12.5483 147.07 12.5483H143.471V16.0373ZM143.471 8.78457H146.218C146.658 8.78457 147.024 8.72047 147.317 8.59226C147.61 8.46406 147.83 8.28091 147.976 8.04281C148.123 7.7864 148.196 7.49336 148.196 7.16369C148.196 6.66919 148.031 6.27541 147.702 5.98237C147.372 5.68933 146.85 5.54281 146.136 5.54281H143.471V8.78457Z" fill="#FE4342"/>
                    </svg>
                </a>

                <!-- Search and Actions -->
                <div class="flex items-center space-x-6">
                    <form action="<?php echo e(route('search')); ?>" method="GET" class="hidden md:flex items-center" role="search">
                        <label for="search-input" class="sr-only">Search</label>
                        <input type="text" id="search-input" name="query" placeholder="Search" autocomplete="off"
                            class="w-48 h-9 border-b border-gray-200 text-sm focus:outline-none focus:border-black transition-colors pl-0">
                        <button type="submit" class="ml-2 text-gray-400 hover:text-black transition-colors" aria-label="Search">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </form>

                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->hasPermission('admin.dashboard')): ?>
                            <a href="<?php echo e(route('admin.dashboard')); ?>"
                                class="hidden lg:inline-flex text-sm border border-black px-4 py-2 hover:bg-black hover:text-white transition-colors">
                                Dashboard
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <a href="<?php echo e(route('search')); ?>" class="md:hidden text-gray-700 hover:text-black" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Main Navigation -->
            <nav class="h-12" aria-label="Main navigation">
                <ul class="flex items-end h-full space-x-8">
                    <li>
                        <a href="<?php echo e(route('home')); ?>"
                            class="<?php if(request()->routeIs('home')): ?> text-black border-black <?php else: ?> text-gray-600 border-transparent <?php endif; ?> flex items-center text-sm font-medium hover:text-black border-b-2 pb-3 transition-all">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('articles.latest')); ?>"
                            class="<?php if(request()->routeIs('articles.latest')): ?> text-black border-black <?php else: ?> text-gray-600 border-transparent <?php endif; ?> flex items-center text-sm font-medium hover:text-black border-b-2 pb-3 transition-all">
                            Latest
                        </a>
                    </li>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $isActive =
                                request()->is("categories/{$category->slug}") ||
                                $category->children
                                    ->pluck('slug')
                                    ->contains(fn($slug) => request()->is("categories/$slug"));
                        ?>
                        <li class="relative group">
                            <a href="<?php echo e(route('categories.show', $category->slug)); ?>"
                                class="<?php echo e($isActive ? 'text-black border-black' : 'text-gray-600 border-transparent'); ?> flex items-center text-sm font-medium hover:text-black border-b-2 pb-3 transition-all">
                                <?php echo e($category->name); ?>

                                <?php if($category->children->count() > 0): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-3 w-3 ml-1 transition-transform group-hover:rotate-180"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                <?php endif; ?>
                            </a>

                            <?php if($category->children->count() > 0): ?>
                                <ul class="category-dropdown absolute left-0 top-full opacity-0 invisible group-hover:opacity-100 group-hover:visible transform translate-y-2 group-hover:translate-y-0 transition-all duration-200 mt-1 bg-white border border-gray-100 shadow-md min-w-[200px] z-50"
                                    aria-label="Submenu for <?php echo e($category->name); ?>">
                                    <?php $__currentLoopData = $category->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(route('categories.show', $child->slug)); ?>"
                                                class="block font-semibold px-4 py-2 text-sm text-gray-600 hover:text-black hover:bg-gray-50 border-b border-gray-50 last:border-b-0 transition-colors">
                                                <?php echo e($child->name); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Latest news banner -->
    <?php if($latestNews): ?>
        <div class="hidden bg-gradient-to-r from-red-600 to-red-700 text-white py-3 shadow-lg" id="breaking-news">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <span
                            class="bg-white text-red-600 px-3 py-1 text-xs font-bold uppercase tracking-wide">Latest</span>
                        <a href="<?php echo e(route('articles.show', $latestNews->slug)); ?>" class="text-sm font-medium line-clamp-1 hover:underline">
                            <?php echo e($latestNews->title); ?>

                        </a>
                    </div>
                    <button onclick="closeBreakingNews()" class="text-white hover:text-gray-200 p-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <main class="flex-grow max-w-7xl mx-auto w-full px-4 py-8">
        <?php echo $__env->yieldContent('content'); ?>
    </main> 

    <footer class="bg-white border-t-1 border-gray-100 mt-16" role="contentinfo">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <!-- Main footer content -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                <div class="">
                    <div class="text-2xl font-bold text-black mb-4">
                        <a href="<?php echo e(route('home')); ?>" aria-label="Home">
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
                    <p class="text-gray-700 text-sm leading-relaxed mb-4"><?php echo $siteSettings->where('key', 'site-description')->first()->value ?? ''; ?></p>
                    <div class="text-xs text-gray-500">
                        © <?php echo e(date('Y')); ?> Today Tab. All rights reserved.
                    </div>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 w-full">
                    <nav class="md:col-span-2" aria-label="Site sections">
                        <h3 class="text-black font-semibold text-sm mb-4 uppercase tracking-wide">Sections</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="<?php echo e(route('home')); ?>"
                                    class="text-gray-700 hover:text-black hover:underline">Home</a></li>
                            <li><a href="<?php echo e(route('articles.latest')); ?>"
                                    class="text-gray-700 hover:text-black hover:underline">Latest</a></li>
                            <?php $__currentLoopData = $siteSettings->where('key', 'footer-sections'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1 = $attributes; } ?>
<?php $component = App\View\Components\SiteSettingItem::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site-setting-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SiteSettingItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item),'class' => 'text-gray-700 hover:text-black hover:underline','wrapper' => 'li']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1)): ?>
<?php $attributes = $__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1; ?>
<?php unset($__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1)): ?>
<?php $component = $__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1; ?>
<?php unset($__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </nav>

                    <nav aria-label="Company information">
                        <h3 class="text-black font-semibold text-sm mb-4 uppercase tracking-wide">Company</h3>
                        <ul class="space-y-2 text-sm">
                            <?php $__currentLoopData = $siteSettings->where('key', 'footer-company'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1 = $attributes; } ?>
<?php $component = App\View\Components\SiteSettingItem::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site-setting-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SiteSettingItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item),'class' => 'text-gray-700 hover:text-black hover:underline','wrapper' => 'li']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1)): ?>
<?php $attributes = $__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1; ?>
<?php unset($__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1)): ?>
<?php $component = $__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1; ?>
<?php unset($__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <!-- Bottom footer -->
            <div class="border-t border-gray-200 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-gray-500">
                <nav class="flex flex-wrap space-x-4 mb-4 md:mb-0" aria-label="Legal links">
                    <?php $__currentLoopData = $siteSettings->where('key', 'footer-bottom'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1 = $attributes; } ?>
<?php $component = App\View\Components\SiteSettingItem::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('site-setting-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\SiteSettingItem::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item),'class' => 'hover:text-black hover:underline text-gray-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1)): ?>
<?php $attributes = $__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1; ?>
<?php unset($__attributesOriginaldf2f92e819bf8029e1211f98bc95b6a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1)): ?>
<?php $component = $__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1; ?>
<?php unset($__componentOriginaldf2f92e819bf8029e1211f98bc95b6a1); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </nav>
                <nav class="flex space-x-4" aria-label="Social media links">
                    <?php $__currentLoopData = $siteSettings->where('key', 'social-links')->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($item->url ?? '#'); ?>" class="text-gray-400 hover:text-black transition-colors"
                            aria-label="<?php echo e($item->description ?? $item->title ?? 'Social link'); ?>" 
                            rel="noopener noreferrer">
                            <?php echo $item->value; ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </nav>
            </div>
        </div>
    </footer>

    <?php echo $__env->yieldContent('scripts'); ?>

    <div id="cookie-banner" class="fixed bottom-0 left-0 right-0 bg-gray-900 text-white py-4 px-4 shadow-lg transform transition-transform duration-300 translate-y-full z-50">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="text-sm">
                <?php $__currentLoopData = $siteSettings->where('key', 'cookie-consent'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p><?php echo $item->value; ?></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="flex gap-3">
                <button onclick="acceptCookies()" class="bg-white text-gray-900 px-4 py-2 text-sm font-medium hover:bg-gray-100 transition-colors">
                    Accept
                </button>
                <button onclick="declineCookies()" class="border border-white px-4 py-2 text-sm font-medium hover:bg-gray-800 transition-colors">
                    Decline
                </button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Update live time
            function updateTime() {
                const now = new Date();
                const timeElement = document.getElementById('live-time');
                const hourElement = document.getElementById('current-hour');
                const minuteElement = document.getElementById('current-minute');

                if (timeElement) {
                    timeElement.textContent = now.toLocaleTimeString([], {
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                }
                if (hourElement) {
                    hourElement.textContent = now.getHours().toString().padStart(2, '0');
                }
                if (minuteElement) {
                    minuteElement.textContent = now.getMinutes().toString().padStart(2, '0');
                }
            }

            // Update time immediately and then every second
            updateTime();
            setInterval(updateTime, 1000);

            // Enhanced dropdown functionality
            const categoryItems = document.querySelectorAll('.group');
            categoryItems.forEach(item => {
                const dropdown = item.querySelector('.category-dropdown');
                if (dropdown) {
                    let hoverTimeout;

                    // Show on hover
                    item.addEventListener('mouseenter', function() {
                        clearTimeout(hoverTimeout);
                        dropdown.classList.remove('opacity-0', 'invisible');
                        dropdown.classList.add('opacity-100', 'visible');
                    });

                    // Hide when leaving
                    item.addEventListener('mouseleave', function() {
                        hoverTimeout = setTimeout(() => {
                            dropdown.classList.remove('opacity-100', 'visible');
                            dropdown.classList.add('opacity-0', 'invisible');
                        }, 150);
                    });
                }
            });

            const cookieConsent = localStorage.getItem('cookieConsent');
            if (!cookieConsent) {
                setTimeout(() => {
                    const banner = document.getElementById('cookie-banner');
                    banner.classList.remove('translate-y-full');
                }, 1000);
            }
        });

        function acceptCookies() {
            localStorage.setItem('cookieConsent', 'accepted');
            hideCookieBanner();
        }

        function declineCookies() {
            localStorage.setItem('cookieConsent', 'declined');
            hideCookieBanner();
        }

        function hideCookieBanner() {
            const banner = document.getElementById('cookie-banner');
            banner.classList.add('translate-y-full');
        }

        // Check if the banner was closed within the last 15 minutes
        function shouldShowBanner() {
            const bannerClosedAt = localStorage.getItem('bannerClosedAt');
            if (!bannerClosedAt) return true;

            const now = new Date().getTime();
            const fifteenMinutes = 15 * 60 * 1000; // 15 minutes in milliseconds

            return (now - parseInt(bannerClosedAt)) > fifteenMinutes;
        }

        // Hide banner if it was recently closed
        if (shouldShowBanner()) {
            document.getElementById('breaking-news').classList.remove('hidden');
        }

        // Function to close the breaking news banner and remember the time
        function closeBreakingNews() {
            document.getElementById('breaking-news').classList.add('hidden');
            localStorage.setItem('bannerClosedAt', new Date().getTime());
        }
    </script>
</body>

</html>
<?php /**PATH /homepages/46/d4299097096/htdocs/todaytab/resources/views/layouts/app.blade.php ENDPATH**/ ?>