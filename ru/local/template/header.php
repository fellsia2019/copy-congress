<?php
$LOCAL_DOMAIN = 'http://localhost/sites/copy-congress/ru';
$TITLE_META = 'Заголовок страницы';

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
                                <img src="<?= getLocalPath('/frontend-krd/assets/img/logo-22-31.svg') ?>"
                                     alt="Год науки и технологий">
                            </a>
                        </div>
                        <div class="header__logo-row">
                            <a class="header__logo_min header__logo_min-1" href="https://minobrnauki.gov.ru/"
                               target="_blank">
                                <img src="<?= getLocalPath('/frontend-krd/assets/img/min-logo-1.svg') ?>"
                                     alt="Минобр науки">
                            </a>
                            <a class="header__logo_min header__logo_min-2" href="http://youngscience.gov.ru/"
                               target="_blank">
                                <img src="<?= getLocalPath('/frontend-krd/assets/img/logos/council.svg') ?>"
                                     alt="Совет при Президенте Российской Федерации по науке и образованию">
                            </a>
                            <a class="header__logo_min header__logo_min-3"
                                href="https://xn--80aapamcavoccigmpc9ab4d0fkj.xn--p1ai/ " target="_blank">
                                <img src="<?= getLocalPath('/frontend-krd/assets/img/min-logo-3.svg') ?>"
                                     alt="Национальные приоритеты">
                            </a>
                            <a class="header__logo_min header__logo_min-4" href="https://roscongress.org/ "
                                target="_blank">
                                <img src="<?= getLocalPath('/frontend-krd/assets/img/min-logo-4.svg') ?>" alt="РосКонгресс">
                            </a>
                        </div>
                    </div>
                    <div class="header__actions">
                        <custom-button
                            size="md"
                            theme="outline-light"
                            tag="a"
                            href="https://xn--80aacf4bwnk3a.xn--80aa3ak5a.xn--p1ai/"
                            target="_blank"
                            class="header__actions-btn"
                        >
                            Хабаровск
                        </custom-button>
                        <custom-button
                            size="md"
                            theme="outline-light"
                            tag="a"
                            href="https://xn--e1aohf5d.xn--80aa3ak5a.xn--p1ai/"
                            target="_blank"
                            class="header__actions-btn"
                        >
                            Пермь
                        </custom-button>
                        <custom-button
                            size="md"
                            theme="outline-light"
                            tag="a"
                            href="https://xn--80aaa6cmfh0a9d.xn--80aa3ak5a.xn--p1ai/"
                            target="_blank"
                            class="header__actions-btn"
                        >
                            Астрахань
                        </custom-button>
                        <custom-button
                            size="md"
                            theme="outline-light"
                            tag="a"
                            href="https://skmu.kamgu.ru/"
                            target="_blank"
                            class="header__actions-btn"
                        >
                            Камчатка
                        </custom-button>
                        <custom-button
                            size="md"
                            theme="outline-light"
                            tag="a"
                            href="https://xn--80awb9e.xn--80aa3ak5a.xn--p1ai/"
                            target="_blank"
                            class="header__actions-btn"
                        >
                            Ямал
                        </custom-button>
                        <custom-button
                            size="md"
                            theme="outline-light"
                            tag="a"
                            href="https://xn--80aajizflwo8a1f.xn--80aa3ak5a.xn--p1ai/"
                            target="_blank"
                            class="header__actions-btn"
                        >
                            Архангельск
                        </custom-button>

                        <div class="header__lang-group lang-group">
                            <a
                                href="/en/"
                                class="lang-group__item"
                            >
                                En
                            </a>
                            <a
                                href="/"
                                class="lang-group__item lang-group__item--is-active"
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
                        <li>
                            <a href="/#about">
                                О&nbsp;Конгрессе
                            </a>
                        </li>
                        <li>
                            <a href="/#program">
                                Программа
                            </a>
                        </li>
                        <li>
                            <a href="/#press">
                                СМИ
                            </a>
                        </li>
                        <li>
                            <a href="/#info">
                                Участникам
                            </a>
                        </li>
                        <li>
                            <a href="/contacts/">
                                Контакты
                            </a>
                        </li>
                        <li>
                            <a href="/partners/">
                                Организаторы и партнеры
                            </a>
                        </li>
                        <li>
                            <dropdown-links
                                :links="[
                                    {
                                        name: 'Конгресс молодых ученых 2021',
                                        url: 'https://конгресс2021.наука.рф/',
                                        target: '_blank',
                                    },
                                    {
                                        name: 'Конгресс молодых ученых 2022',
                                        url: 'https://конгресс2022.наука.рф/',
                                        target: '_blank',
                                    },
                                    {
                                        name: 'Спутник 2022 на Камчатке',
                                        url: 'https://камчатка2022.наука.рф/',
                                        target: '_blank',
                                    },
                                    {
                                        name: 'Спутник 2022 в ЯНАО',
                                        url: 'https://янао2022.наука.рф/',
                                        target: '_blank',
                                    },
                                ]"
                                caption="Архив"
                            >
                            </dropdown-links>
                        </li>
                    </ul>
                </div>
            </transition>
        </div>
    </div>

    <!-- #WORKAREA# ---------------------------------------------------------------------------------------------------- -->
