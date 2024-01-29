<?php
  require 'local/template/header.php';

  /*
  global $TITLE_META;
  setMetaTitle('III Конгресс молодых ученых 2024 | Наука.рф'); 
  // TODO: не работает
  */
?>


<div class="section top-block">
    <div class="section__inner top-block__inner slider__banner">
        <top-slider>
            <swiper-slide class="top-block__banner" id="12345">
                <div class="top-block__banner-text">
                    <h2>
                        III YOUNG SCIENTISTS CONGRESS                         
                    </h2>
                    <p>
                        Sirius Park of Science and Art
                    </p>
                    <p>
                        28-30 November 2023
                    </p>
                    <div class="top-block__actions">
                        <div class="top-block__actions-list">
                            <div class="top-block__actions-item">
                                <custom-button
                                    size="md"
                                    theme="outline-light"
                                    class="top-block__actions-link"
                                    tag="a"
                                    href="/program/"
                                >Business program
                                </custom-button>
                            </div>
                            <div class="top-block__actions-item">
                                <custom-button
                                    size="md"
                                    theme="outline-light"
                                    class="top-block__actions-link"
                                    tag="a"
                                    href="https://vk.com/video-215364149_456239344"
                                    target="_blank"
                                >Live Stream
                                </custom-button>
                            </div>
                            <div class="top-block__actions-item">
                                <custom-button
                                    size="md"
                                    theme="outline-light"
                                    class="top-block__actions-link"
                                    tag="a"
                                    href="https://youngscientists.roscongress.org/en"
                                    target="_blank"
                                    @click="ymHandler({code: 90561506, type: 'reachGoal', operation: 'click_LKAuthTop', participateUrl: 'URL_LKAuthTopGoal'})"
                                >Personal web office
                                </custom-button>
                            </div>
                        </div>
                    </div>
                </div>
            </swiper-slide>
        </top-slider>
    </div>
</div>

<div id="about" class="section section_overflow about">
    <div class="section__inner about__inner">
        <div id="1234">
            <h2 class="section__title">
                Outcomes of the III Young Scientists Congress
            </h2>
            <div class="about-advantages">
                <responsive-slider
                    id="about-advantages_slider"
                    :items="{
                        desktop: 5,
                        low: 4,
                        tablet: 2.4,
                        mobile: 1.2
                    }"
                    init-on="low"
                    :is-pagination="true"
                >
                    <swiper-slide>
                        <div class="about-advantage">
                            <div class="about-advantage__num">
                                &gt;5000
                            </div>
                            <div class="about-advantage__title">
                                participants from 85&nbsp;regions of&nbsp;Russia and 36&nbsp;countries
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="about-advantage">
                            <div class="about-advantage__num">
                                &gt;730
                            </div>
                            <div class="about-advantage__title">
                                speakers and&nbsp;moderators
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="about-advantage">
                            <div class="about-advantage__num">
                                &gt;150
                            </div>
                            <div class="about-advantage__title">
                                business programme events
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="about-advantage">
                            <div class="about-advantage__num">
                                &lt;30
                            </div>
                            <div class="about-advantage__title">
                                years average age of&nbsp;participants
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="about-advantage">
                            <div class="about-advantage__num">
                                &gt;410
                            </div>
                            <div class="about-advantage__title">
                                universities (24&nbsp;foreign) were represented at&nbsp;the event
                            </div>
                        </div>
                    </swiper-slide>
                </responsive-slider>
            </div>
            <h2 class="section__title">
                ABOUT THE CONGRESS
            </h2>
            <p>
                The Young Scientists Congress is an important part of the Decade of Science and Technology announced by Decree of the Russian President to cement the role played by science and technology in the resolution of tasks essential to ensuring the development of the nation and society. </p>
            <p>
                The Congress is a major platform for dialogue between basic and frontier science, government authorities, and the real economy, and it informs Russia’s scientific and technological development.
            </p>
        </div>
        <div class="about-participants">
            <responsive-slider
                id="about-participant_slider"
                :items="{
                    desktop: 5,
                    low: 4,
                    tablet: 2.4,
                    mobile: 1.2
                }"
                init-on="low"
                :is-pagination="true"
            >
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-03.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Young scientists (recipients of grants and scholarships from the Russian president and government)
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-04.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Representatives of leading scientific and educational centres
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-02.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Postgraduate students working in priority areas of scientific and technological development
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-05.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Tech entrepreneurs
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-01.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Schoolchildren and students who have achieved significant results in their research
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-06.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Representatives of state companies and the technology business
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-07.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Representatives of Russia’s regions
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-08.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Representatives of the Russian government
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-09.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Media representatives
                        </div>
                    </div>
                </swiper-slide>
            </responsive-slider>
        </div>
    </div>
</div>

<div id="program" class="section program">
    <div class="section__inner program__inner">
        <h2 class="section__title">PROGRAMME</h2>
        <div class="program__text">
            <div id="bx_1373509569_5988">
                <p>The business program of&nbsp;the Congress was intense and varied: 157 events over three days. The Congress programme includes business, exhibition, and cultural (evening) programmes. As&nbsp;in&nbsp;the past, the business programme will consist of&nbsp;round tables, expert sessions, and panel discussions, to&nbsp;be&nbsp;joined this year by&nbsp;new informal, interactive event formats.</p>
                <p>
                    The Congress will exhibit scientific and technological developments made by&nbsp;the constituent entities of&nbsp;the Russian Federation and the results of&nbsp;regional initiatives for the Decade of&nbsp;Science and Technology. Sports and cultural events have been planned for Congress participants when they are not busy with round tables and sessions.
                </p>
            </div>
        </div>
        <div class="program__actions">
            <div class="program__actions-list">
                <div class="program__actions-item">
                    <custom-button
                        class="program__actions-btn"
                        size="ml"
                        tag="a"
                        href="/program/"
                    >
                        Business program
                    </custom-button>
                </div>
                <div class="program__actions-item">
                    <custom-button
                        class="program__actions-btn"
                        size="ml"
                        tag="a"
                        href="/upload/documents/Cultural_programme.pdf?v=<?= date('YmdHi'); ?>"
                        target="_blank"
                    >
                        Cultural programme
                    </custom-button>
                </div>
                <div class="program__actions-item">
                    <custom-button
                        class="program__actions-btn"
                        size="ml"
                        tag="a"
                        href="/upload/documents/Evening_programme_en.pdf?v=<?= date('YmdHi'); ?>"
                        target="_blank"
                    >
                        Evening programme
                    </custom-button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="info" class="section info">
    <div class="section__inner">
        <div class="section__title_flex">
            <h2 class="section__title info__title">
                PARTICIPANTS
            </h2>
        </div>
        <div class="info__cols">
            <div class="info__col">
                <div class="info__left-text">
                    <p>
                        More than 5,000 participants took part in&nbsp;the III Young Scientists Congress. About&nbsp;1,900 people are representatives of&nbsp;higher educational institutions: universities, institutes, academies, more than 1,300 people are employees of&nbsp;research institutes.
                    </p>
                    <p>
                        The geography of&nbsp;representation of&nbsp;the participants was also impressive: 85&nbsp;regions of&nbsp;the Russian Federation and 36&nbsp;foreign countries, such as&nbsp;Armenia, Iran, Kazakhstan, China, Kyrgyzstan, the Republic of&nbsp;Belarus, the Republic of&nbsp;Cuba, South Africa and others.
                    </p>  
                </div>
            </div>
            <div class="info__col">
                <div class="info__right-text">
                   <custom-button
                        size="md"
                        theme="primary"
                        class="info__col-btn"
                        tag="a"
                        href="https://youngscientists.roscongress.org/en"
                        target="_blank" rel="noopener"                   
                        @click="ymHandler({code: 90561506, type: 'reachGoal', operation: 'click_LKAuthMiddle', participateUrl: 'URL_LKAuthMiddleGoal'})"
                    >Personal web office</custom-button
                </div>
            </div>
        </div>
    </div>
</div>

<div id="press" class="section press">
    <div class="press__inner section__inner">
        <div class="press__content">
            <div id="bx_3099439860_5993">
                <h2 class="section__title press__title">MEDIA</h2>
                <div class="program__text">
                    <div class="press__text" style="margin-bottom: 0px;">
                        <p>
                            RIA Novosti became the official photo host agency of&nbsp;the Young Scientists Congress that provided information support and photographing all official, cultural and sporting events of&nbsp;the Congress.
                        </p>
                        <p>
                            The Roscongress Foundation provided photography for all events at&nbsp;the Young Scientists Congress.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="press__actions">
            <div class="press__actions-item">
                <custom-button
                    size="md"
                    class="press__actions-btn"
                    tag="a"
                    href="https://youngscientists2023.riamediabank.ru"
                    target="_blank"
                >
                    RIA Novosti media bank
                </custom-button>
            </div>
            <div class="press__actions-item">
                <custom-button
                    size="md"
                    class="press__actions-btn"
                    tag="a"
                    href="https://photo.roscongress.org/ru/projects/209"
                    target="_blank"
                >
                    Roscongress photo bank
                </custom-button>
            </div>
        </div>
    </div>
</div>

<div id="partners" class="section partners partners-section partners-section-main">
    <div class="section__inner">
        <div id="bx_3099439860_64977">
            <h2 class="section__title partners__title">ORGANIZERS</h2>
        </div>
        <div class="partners-slider ">
            <slider
                id="organizers"
                :is-desktop-disabled="true"
                :items="4"
                is-multiple
            >
                <swiper-slide id="bx_565502798_5996">
                    <a
                        href="https://minobrnauki.gov.ru/"
                        target="_blank" rel="noopener"                   
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/58b/min.svg"
                                alt="Ministry of Science and Higher Education of the Russian Federation">
                        </div>
                        <span
                            class="partners-slide__name">Ministry of Science and Higher Education of the Russian Federation</span>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_565502798_6002">
                    <a
                        href="http://youngscience.gov.ru/"
                        target="_blank" rel="noopener"                   
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/378/e2af78txyafm7e37pee1erw680md63y4/logo (1).svg"
                                alt="Coordinating Council for Youth Affairs in Science and Education of the Council for Science and Education under the auspices of the President of Russia">
                        </div>
                        <span
                            class="partners-slide__name">Coordinating Council for Youth Affairs in Science and Education of the Council for Science and Education under the auspices of the President of Russia</span>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_565502798_6003">
                    <a
                        href="https://nationalpriority.ru/"
                        target="_blank" rel="noopener"                   
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/30c/g2syrqmoyy34ofx09sl2lshsb38asv74/logo НП (1).svg"
                                alt="Operator of the Decade of Science and Technology">
                        </div>
                        <span
                            class="partners-slide__name">Operator of the Decade of Science and Technology</span>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_565502798_6005">
                    <a
                        href="https://roscongress.org/"
                        target="_blank" rel="noopener"                   
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/2d1/5ashgzx75d374vdgi8ufdlummb3egt2x/logo_roscongress_Time_to_Act_eng_white (1).png"
                                alt="Roscongress Foundation">
                        </div>
                        <span
                            class="partners-slide__name">Roscongress Foundation</span>
                    </a>
                </swiper-slide>
            </slider>
        </div>
        <div class="partners-slider">
            <div class="partners-slider__title-flex">
                <h2 class="partners-slider__title">PARTNERS</h2>
                <h3 class="section__subtitle partners-slider__subtitle">
                    If you are interested in becoming a partner of the Congress, please email us at  — 
                    <a href="mailto:partners@roscongress.org">partners@roscongress.org</a>
                </h3>
            </div>
            <slider
                id="partners"
                :is-desktop-disabled="true"
                :items="8"
                is-multiple
            >
                <swiper-slide id="bx_1454625752_6044">
                    <a
                        href="https://www.rosatom.ru/"
                        target="_blank" rel="noopener"                   
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/d95/mkajybim1hy599mwy1666flqreim7ese/Rosatom_eng-01.svg"
                                alt="ROSATOM">
                        </div>
                        <span
                            class="partners-slide__name">ROSATOM</span>
                        <div class="partners-slide__status">Title Partner</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_1454625752_6045">
                    <a
                        href="http://www.sberbank.ru/"
                        target="_blank" rel="noopener"                   
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/1ea/4uqsf3z1xu0c55u3pmlzk1ifzz82dpuo/SBER_eng-01.svg"
                                alt="Sberbank">
                        </div>
                        <span
                            class="partners-slide__name">Sberbank</span>
                        <div class="partners-slide__status">Official Partner</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_1454625752_89380">
                    <a
                        href="https://science52.ru/"
                        target="_blank" rel="noopener"                   
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/9f0/3fmn8sqq4cso35hdkhxo2xeyj37f8df2/NOC_Eng_logo-01.svg"
                                alt="REC of the Nizhny Novgorod region">
                        </div>
                        <span
                            class="partners-slide__name">REC of the Nizhny Novgorod region</span>
                        <div class="partners-slide__status">Official Partner</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_1454625752_90553">
                    <a
                        href="http://nrcki.ru/"
                        target="_blank" rel="noopener"                   
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/70f/orylgdbosb3tqgwf1nyqfhp36o2rf2ri/NIC-01.svg"
                                alt="National Research «Kurchatov Institute»">
                        </div>
                        <span
                            class="partners-slide__name">National Research «Kurchatov Institute»</span>
                        <div class="partners-slide__status">Strategic Research Partner</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_1454625752_95544">
                    <a
                        href="https://greatbook.ru/"
                        target="_blank" rel="noopener"                   
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/2bd/xsek5ctqha63dl7srodnxby58kefusxz/bre_eng-01.svg"
                                alt="National Scientific and Educational Centre «Great Russian Encyclopedia» (NSEC GRE)">
                        </div>
                        <span
                            class="partners-slide__name">National Scientific and Educational Centre «Great Russian Encyclopedia» (NSEC GRE)</span>
                        <div class="partners-slide__status">Business Programme Partner</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_1454625752_90595">
                    <a
                        href="https://univertechpred.ru/"
                        target="_blank" rel="noopener"                   
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/27d/waue64v6rk69zj2ho46t9pqduaj3ker3/putp_rus-01.svg"
                                alt="Platform for University Technological Entrepreneurship">
                        </div>
                        <span
                            class="partners-slide__name">Platform for University Technological Entrepreneurship</span>
                        <div class="partners-slide__status">Innovation Partner</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_1454625752_89381">
                    <a class="partners-slide">
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/f1e/kg55mdphvn49o6bwo63chdqdcs5ljm55/RA_eng-01.svg"
                                alt="Rosatom Quantum">
                        </div>
                        <span
                            class="partners-slide__name">Rosatom Quantum</span>
                        <div class="partners-slide__status">Innovation Partner</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_1454625752_92165">
                    <a
                        href="https://nocrb.ru/news"
                        target="_blank" rel="noopener"                   
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/084/hmk1hh1nhdg0pi509s1f5q42gtjk6cap/erc2-01.svg"
                                alt=" Autonomous non-profit organization «Management company of scientific and educational center of the Republic of Bashkortostan»">
                        </div>
                        <span
                            class="partners-slide__name"> Autonomous non-profit organization «Management company of scientific and educational center of the Republic of Bashkortostan»</span>
                        <div class="partners-slide__status">Innovation Partner</div>
                    </a>
                </swiper-slide>
            </slider>
            <div class="partners-slider__actions">
                <div class="partners-slider__actions-item">
                    <custom-button
                        size="md"
                        theme="primary"
                        href="/partners/"
                        tag="a"
                        class="partners-slider__actions-btn"
                    >
                        Become partner                
                    </custom-button>
                </div>
                <div class="partners-slider__actions-item">
                    <custom-button
                        size="md"
                        theme="primary"
                        href="/partners/#partners"
                        tag="a"
                        class="partners-slider__actions-btn"
                    >
                        All partners                
                    </custom-button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="location" class="section location">
    <div class="section__inner location__inner">
        <div class="location__text location__fix-ux-wrapper">
            <h2 class="section__title location__title location__fix-ux">Congress Venue</h2>
            <div class="location__info">
                <div class="location__label location__fix-ux">venue name</div>
                <div class="location__info-text location__fix-ux">Sirius Park of Science and Art</div>
                <div class="location__footnote location__fix-ux-action">
                    <custom-tooltip :width="454" direction="left-top" :content="false">
                        <a slot="target" href="/upload/documents/Venue_map.pdf" class="location__link" target="_blank" rel="noopener">Venue map</a>
                    </custom-tooltip>
                </div>
            </div>
            <div class="location__info">
                <div class="location__label location__fix-ux">address</div>
                <div class="location__info-text location__fix-ux">Sirius Park of Science and Art (1, Olimpiysky Prospekt, Sirius Federal Territory)</div>
                <div class="location__footnote location__fix-ux-action">
                    <custom-tooltip :width="454" direction="left-top">
                        <span slot="target" class="location__help-link">How to get there?</span>
                        <div slot="content">
                            <p>It takes 10–15 minutes by car to get from Sochi International Airport and Adler Railway Station to Sirius Park of Science and Art, and around an hour from downtown Sochi or Krasnaya Polyana.</p>
                        </div>
                    </custom-tooltip>
                </div>
            </div>
            <div class="location__fix-ux">
                <div class="location__cols" id="bx_3322728009_64981">
                </div>
            </div>
        </div>
    </div>
    <div class="location__map">
        <location-map></location-map>
    </div>
</div>


<?php
  require 'local/template/footer.php';
?>