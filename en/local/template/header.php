<?php
$LOCAL_DOMAIN = 'http://localhost/sites/copy-congress/en/';
$TITLE_META = 'Title page';

function setGlobal() {
    global $TITLE_META;
    global $LOCAL_DOMAIN;
}

setGlobal();

function getLocalPath($path) {
    global $LOCAL_DOMAIN;
    return $LOCAL_DOMAIN . $path;
}

function setMetaTitle(&$title) {
    global $TITLE_META;
    $TITLE_META = $title;
}
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="format-detection" content="telephone=no">
    <title><?= $TITLE_META ?></title>
   
	<link rel="stylesheet" type="text/css" href="<?= getLocalPath('/frontend-krd/build/css/chunk-vendors.css') ?>">
	<script src="<?= getLocalPath('/frontend-krd/build/js/chunk-vendors.js') ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?= getLocalPath('/frontend-krd/build/css/main.css') ?>">
	<script src="<?= getLocalPath('/frontend-krd/build/js/main.js') ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?= getLocalPath('/frontend-yanao/build/css/footer.css') ?>">
    <script src="<?= getLocalPath('/frontend-yanao/build/js/footer.js') ?>"></script>
</head>

<body>
<div id="app" class="layout" :class="{'_lock': menuOpened}" v-cloak data-vue-app>
    <spinner-loading></spinner-loading>
    <div class="header" :class="{'header_menu-opened': menuOpened}">
        <div class="header__inner">
            <div class="header__topline">
                <div class="header__topline-inner">
                    <div class="header__logos">
                        <div class="header__logo header__logo_main">
                            <a href="/">
                                <img src="<?= getLocalPath('/frontend-krd/assets/img/logos/logo-22-31-en.svg') ?>"
                                     alt="Год науки и технологий">
                            </a>
                        </div>
                        <div class="header__logo-row">
                            <a class="header__logo_min header__logo_min-1" href="https://minobrnauki.gov.ru/"
                               target="_blank">
                                <img src="<?= getLocalPath('/frontend-krd/assets/img/logos/ministry-of-science-en.svg') ?>"
                                     alt="Минобр науки">
                            </a>
                            <a class="header__logo_min header__logo_min-2" href="http://youngscience.gov.ru/"
                               target="_blank">
                                <img src="<?= getLocalPath('/frontend-krd/assets/img/logos/council-en.svg') ?>"
                                     alt="Совет при Президенте Российской Федерации по науке и образованию">
                            </a>
                            <a class="header__logo_min header__logo_min-3"
                                href="https://xn--80aapamcavoccigmpc9ab4d0fkj.xn--p1ai/ " target="_blank">
                                <img src="<?= getLocalPath('/frontend-krd/assets/img/logos/np-en.svg') ?>"
                                     alt="Национальные приоритеты">
                            </a>
                            <a class="header__logo_min header__logo_min-4" href="https://roscongress.org/ "
                                target="_blank">
                                <img src="<?= getLocalPath('/frontend-krd/assets/img/logos/roscongress-en.svg') ?>" alt="РосКонгресс">
                            </a>
                        </div>
                    </div>
                    <div class="header__actions">
                        <div class="header__lang-group lang-group">
                            <a
                                href="/en/"
                                class="lang-group__item lang-group__item--is-active"
                            >
                                En
                            </a>
                            <a
                                href="/"
                                class="lang-group__item"
                            >
                                Ru
                            </a>
                        </div>
                        <a
                            href=""
                            class="button button_disk button_light header__burger-button"
                            :class="{'button_burger-active': menuOpened}"
                            @click.prevent="toggleMenu"
                        >
                            <inline-svg v-if="menuOpened" src="close"></inline-svg>
                            <inline-svg v-else src="burger"></inline-svg>
                        </a>
                    </div>
                </div>
            </div>
            <transition name="fade">
                <div class="header__drop-menu" v-if="menuOpened">
                    <ul class="header__nav">
                        <ul class="header__nav">
                            <li>
                                <a href="/#about">About the Congress</a>
                            </li>
                            <li>
                                <a href="/#program">Programme</a>
                            </li>
                            <li>
                                <a href="/#info">Participants</a>
                            </li>
                            <li>
                                <a href="/partners/">Organizers and partners</a>
                            </li>
                            <li>
                                <a href="/#press">Media</a>
                            </li>
                            <li>
                                <a href="/contacts/">Contacts</a>
                            </li>
                        </ul>
                    </ul>
                </div>
            </transition>
        </div>
    </div>

    <!-- #WORKAREA# ---------------------------------------------------------------------------------------------------- -->
