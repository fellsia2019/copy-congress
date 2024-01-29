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
                        III Конгресс молодых ученых                         
                    </h2>
                    <p>
                        Парк науки и искусства «Сириус»
                    </p>
                    <p>
                        28-30 ноября 2023
                    </p>
                    <div class="top-block__actions">
                        <div class="top-block__actions-list">
                            <?php /*
                            <? if ($arParams['EN']):?>
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
                            <? else:?>
                            */ ?>

                            <div class="top-block__actions-item">
                                <custom-button
                                    size="md"
                                    theme="outline-light"
                                    class="top-block__actions-link"
                                    tag="a"
                                    href="/program/"
                                >Деловая программа
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
                                >Онлайн-трансляция
                                </custom-button>
                            </div>
                            <div class="top-block__actions-item">
                                <custom-button
                                    size="md"
                                    theme="outline-light"
                                    class="top-block__actions-link"
                                    tag="a"
                                    href="https://youngscientists.roscongress.org/ru"
                                    target="_blank"
                                    @click="ymHandler({code: 90561506, type: 'reachGoal', operation: 'click_LKAuthTop', participateUrl: 'URL_LKAuthTopGoal'})"
                                >Личный кабинет
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
                Итоги III Конгресса молодых ученых
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
                                участников из&nbsp;85 регионов России и&nbsp;более чем&nbsp;36 стран мира
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="about-advantage">
                            <div class="about-advantage__num">
                                &gt;730
                            </div>
                            <div class="about-advantage__title">
                                докладчиков и&nbsp;модераторов
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="about-advantage">
                            <div class="about-advantage__num">
                                &gt;150
                            </div>
                            <div class="about-advantage__title">
                                мероприятий деловой программы
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="about-advantage">
                            <div class="about-advantage__num">
                                &lt;30
                            </div>
                            <div class="about-advantage__title">
                                лет средний возраст участников
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="about-advantage">
                            <div class="about-advantage__num">
                                &gt;410
                            </div>
                            <div class="about-advantage__title">
                                вузов (24&nbsp;&#8209;&nbsp;иностранных) было представлено на&nbsp;мероприятии
                            </div>
                        </div>
                    </swiper-slide>
                </responsive-slider>
            </div>
            <h2 class="section__title">
                О КОНГРЕССЕ
            </h2>
            <p>
                Конгресс молодых ученых — ключевое событие Десятилетия&nbsp;науки&nbsp;и&nbsp;технологий, объявленного Указом Президента Российской Федерации в&nbsp;целях усиления роли науки и технологий в&nbsp;решении важнейших задач развития общества и страны.<br><br>Конгресс выступает крупнейшей площадкой для диалога передовой и&nbsp;фундаментальной науки, государственной власти и&nbsp;реального сектора экономики и задает основные векторы научно-технологического развития России.
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
                            Молодые ученые (получатели грантов и&nbsp;стипендий Президента и&nbsp;Правительства Российской Федерации)
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-04.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Представители ведущих научных и образовательных центров
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-02.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Аспиранты, работающие по&nbsp;приоритетам научно-технологического развития
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-05.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Технологические предприниматели
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-01.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Школьники и&nbsp;студенты, которые добились значимых результатов в&nbsp;своих исследованиях
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-06.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Представители государственных компаний и&nbsp;технологического бизнеса
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-07.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Представители субъектов Российской Федерации
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-08.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Представители органов власти Российской Федерации
                        </div>
                    </div>
                </swiper-slide>
                <swiper-slide>
                    <div class="about-participant">
                        <div class="about-participant__icon">
                            <img src="<?= getLocalPath('/frontend-krd/assets/img/about/about-participant-09.svg') ?>">
                        </div>
                        <div class="about-participant__title">
                            Представители СМИ
                        </div>
                    </div>
                </swiper-slide>
            </responsive-slider>
        </div>
    </div>
</div>

<div id="program" class="section program">
    <div class="section__inner program__inner">
        <h2 class="section__title">Программа</h2>
        <div class="program__text">
            <div id="bx_1373509569_5988">
                <p>
                    Деловая программа Конгресса была насыщенной и&nbsp;разнообразной: 157 мероприятий за&nbsp;три дня. В&nbsp;программу Конгресса вошли деловая, выставочная, спортивная и&nbsp;культурная (вечерняя) программы. Деловая программа традиционно состояла из&nbsp;круглых столов, экспертных сессий, панельных дискуссий, а&nbsp;также в&nbsp;нее вошли новые неформальные и&nbsp;интерактивные форматы мероприятий.
                </p>
                <p>
                    На&nbsp;Конгрессе состоялась выставка научно-технологического развития субъектов Российской Федерации, в&nbsp;том числе были представлены результаты реализации региональных планов по&nbsp;инициативам Десятилетия науки и&nbsp;технологий.
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
                        Деловая программа
                    </custom-button>
                </div>
                <div class="program__actions-item">
                    <custom-button
                        class="program__actions-btn"
                        size="ml"
                        tag="a"
                        href="/upload/documents/Программа_пресс-мероприятий.pdf?v=<?= date('YmdHi'); ?>"
                        target="_blank"
                    >
                        Пресс-мероприятия
                    </custom-button>
                </div>
                <div class="program__actions-item">
                    <custom-button
                        class="program__actions-btn"
                        size="ml"
                        tag="a"
                        href="/upload/documents/Научная_гостиная_программа.pdf?v=<?= date('YmdHi'); ?>"
                        target="_blank"
                    >
                        Научная гостиная
                    </custom-button>
                </div>
                <div class="program__actions-item">
                    <custom-button
                        class="program__actions-btn"
                        size="ml"
                        tag="a"
                        href="/upload/documents/Культурная_программа.pdf?v=<?= date('YmdHi'); ?>"
                        target="_blank"
                    >
                        Культурная программа
                    </custom-button>
                </div>
                 <div class="program__actions-item">
                    <custom-button
                        class="program__actions-btn"
                        size="ml"
                        tag="a"
                        href="/upload/documents/Спортивная_программа_Конгресс_молодых_ученых_2023.pdf?v=<?= date('YmdHi'); ?>"
                        target="_blank"
                    >
                        Спортивная программа
                    </custom-button>
                </div>
                <div class="program__actions-item">
                    <custom-button
                        class="program__actions-btn"
                        size="ml"
                        tag="a"
                        href="/upload/documents/Evening_programme_ru.pdf?v=<?= date('YmdHi'); ?>"
                        target="_blank"
                    >
                        Вечерняя программа
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
                Участникам
            </h2>
        </div>
        <div class="info__cols">
            <div class="info__col">
                <div class="info__left-text">
                    <p>
                        В&nbsp;III Конгрессе молодых ученых приняли участие более 5000&nbsp;участников. Около 1900 человек&nbsp;&mdash; представители высших учебных заведений: университетов, институтов, академий, более 1300 человек&nbsp;&mdash; сотрудники научно-исследовательских институтов.
                    </p>
                    <p>
                        Впечатляющей была и&nbsp;география представительства участников: 85&nbsp;регионов Российской Федерации и&nbsp;36&nbsp;иностранных государств, таких как Армения, Иран, Казахстан, Китай, Киргизия, Республика Беларусь, Республика Куба, ЮАР и&nbsp;другие.
                    </p>
                    <p>
                        Среди участников Конгресса более 1100 человек имеют ученую степень кандидата наук,зарубежные степени или PhD&nbsp;&mdash; более 50&nbsp;человек, степень доктора наук&nbsp;&mdash; более 240&nbsp;человек.
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
                        href="https://youngscientists.roscongress.org/ru"
                        target="_blank"
                        @click="ymHandler({code: 90561506, type: 'reachGoal', operation: 'click_LKAuthMiddle', participateUrl: 'URL_LKAuthMiddleGoal'})"
                    >Личный кабинет</custom-button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="section__inner">
        <u-news-slider
            :initial-news-items="[{&quot;id&quot;:&quot;100992&quot;,&quot;title&quot;:&quot;Опубликован перечень поручений Президента России по итогам встречи с молодыми учеными&quot;,&quot;date&quot;:&quot;26 января&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/opublikovan-perechen-porucheniy-prezidenta-rossii-po-itogam-vstrechi-s-molodymi-uchenymi\/&quot;},{&quot;id&quot;:&quot;100658&quot;,&quot;title&quot;:&quot;Конгресс молодых ученых получил приз зрительских симпатий премии EFEA Awards&quot;,&quot;date&quot;:&quot;19 января&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/kongress-molodykh-uchenykh-poluchil-priz-zritelskikh-simpatiy-professionalnoy-premii-v-oblasti-ivent\/&quot;},{&quot;id&quot;:&quot;98873&quot;,&quot;title&quot;:&quot;Участки сезонных автодорог с модифицированным ледовым покрытием откроют на Ямале&quot;,&quot;date&quot;:&quot;26 декабря&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/uchastki-sezonnykh-avtodorog-s-modifitsirovannym-ledovym-pokrytiem-otkroyut-na-yamale\/&quot;},{&quot;id&quot;:&quot;97890&quot;,&quot;title&quot;:&quot;Книгу о советском опыте управления представили на III Конгрессе молодых ученых&quot;,&quot;date&quot;:&quot;10 декабря&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/knigu-o-sovetskom-opyte-upravleniya-predstavili-na-iii-kongresse-molodykh-uchenykh\/&quot;},{&quot;id&quot;:&quot;97701&quot;,&quot;title&quot;:&quot;Более 9 млн просмотров собрали интервью с гостями медиастудии на III Конгрессе молодых ученых   &quot;,&quot;date&quot;:&quot;6 декабря&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/bolee-9-mln-prosmotrov-sobrali-intervyu-s-gostyami-mediastudii-na-iii-kongresse-molodykh-uchenykh-\/&quot;},{&quot;id&quot;:&quot;97588&quot;,&quot;title&quot;:&quot;Пленарное заседание о возможностях в науке завершило III Конгресс молодых ученых&quot;,&quot;date&quot;:&quot;4 декабря&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/nauka-prostranstvo-vozmozhnostey\/&quot;},{&quot;id&quot;:&quot;97530&quot;,&quot;title&quot;:&quot;Финал соревнований роботов прошел на III Конгрессе молодых ученых&quot;,&quot;date&quot;:&quot;4 декабря&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/final-sorevnovaniy-robotov-proshel-na-iii-kongresse-molodykh-uchenykh\/&quot;},{&quot;id&quot;:&quot;97486&quot;,&quot;title&quot;:&quot;«Росатом» открыл в Университете «Сириус» Центр робототехники проектного направления «Прорыв»&quot;,&quot;date&quot;:&quot;1 декабря&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/rosatom-otkryl-v-universitete-sirius-tsentr-robototekhniki-proektnogo-napravleniya-proryv\/&quot;},{&quot;id&quot;:&quot;97463&quot;,&quot;title&quot;:&quot;Больше 3,8 тысяч студентов хотят отправиться в экспедицию на «Плавучем университете»&quot;,&quot;date&quot;:&quot;1 декабря&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/bolshe-3-8-tysyach-studentov-khotyat-otpravitsya-v-ekspeditsiyu-na-plavuchem-universitete\/&quot;},{&quot;id&quot;:&quot;97437&quot;,&quot;title&quot;:&quot;Мотивацию для исследователей и интерес к открытиям обсудили на III Конгрессе молодых ученых&quot;,&quot;date&quot;:&quot;30 ноября&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/motivatsiyu-dlya-issledovateley-i-interes-k-otkrytiyam-obsudili-na-iii-kongresse-molodykh-uchenykh\/&quot;},{&quot;id&quot;:&quot;97433&quot;,&quot;title&quot;:&quot;Дмитрий Чернышенко: Мероприятия Десятилетия привлекли в этом году 20 миллионов человек&quot;,&quot;date&quot;:&quot;30 ноября&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/dmitriy-chernyshenko-meropriyatiya-desyatiletiya-privlekli-v-etom-godu-20-millionov-chelovek\/&quot;},{&quot;id&quot;:&quot;97427&quot;,&quot;title&quot;:&quot;Этико-правовые вопросы исследовательской деятельности разобрали на III Конгрессе молодых ученых&quot;,&quot;date&quot;:&quot;30 ноября&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/etiko-pravovye-voprosy-issledovatelskoy-deyatelnosti-razobrali-na-iii-kongresse-molodykh-uchenykh\/&quot;},{&quot;id&quot;:&quot;97425&quot;,&quot;title&quot;:&quot;Механизмы поддержки науки обсудили на III Конгрессе молодых ученых&quot;,&quot;date&quot;:&quot;30 ноября&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/mekhanizmy-podderzhki-nauki-obsudili-na-iii-kongresse-molodykh-uchenykh\/&quot;},{&quot;id&quot;:&quot;97419&quot;,&quot;title&quot;:&quot;«Бухгалтерский» подход к учету результатов проектов-«стомиллионников» предложили изменить на III Конгрессе молодых ученых&quot;,&quot;date&quot;:&quot;30 ноября&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/bukhgalterskiy-podkhod-k-uchetu-rezultatov-proektov-stomillionnikov-predlozhili-izmenit-na-iii-kongr\/&quot;},{&quot;id&quot;:&quot;97398&quot;,&quot;title&quot;:&quot;Научно-техническое сотрудничество России и Ирана рассмотрели на III Конгрессе молодых ученых&quot;,&quot;date&quot;:&quot;30 ноября&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/nauchno-tekhnicheskoe-sotrudnichestvo-rossii-i-irana-obsudili-na-iii-kongresse-molodykh-uchenykh\/&quot;},{&quot;id&quot;:&quot;97394&quot;,&quot;title&quot;:&quot;Председательство России в БРИКС в 2024 году обсудили на III Конгрессе молодых ученых&quot;,&quot;date&quot;:&quot;30 ноября&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/predsedatelstvo-rossii-v-briks-v-2024-godu-obsudili-na-iii-kongresse-molodykh-uchenykh\/&quot;},{&quot;id&quot;:&quot;97383&quot;,&quot;title&quot;:&quot;Студенты и аспиранты МГУ Саров рассказали о трансфере технологий в НЦФМ на III Конгрессе молодых ученых&quot;,&quot;date&quot;:&quot;30 ноября&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/studenty-i-aspiranty-mgu-sarov-rasskazali-o-transfere-tekhnologiy-v-ntsfm-na-iii-kongresse-molodykh-\/&quot;},{&quot;id&quot;:&quot;97353&quot;,&quot;title&quot;:&quot;Молодые ученые встретились с Владимиром Путиным в «Сириусе»&quot;,&quot;date&quot;:&quot;29 ноября&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/molodye-uchenye-vstretilis-s-vladimirom-putinym-v-siriuse\/&quot;},{&quot;id&quot;:&quot;97314&quot;,&quot;title&quot;:&quot;Новые возможности для профессионального научного сообщества обсудили на III Конгрессе молодых ученых&quot;,&quot;date&quot;:&quot;29 ноября&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/novye-vozmozhnosti-dlya-professionalnogo-nauchnogo-soobshchestva-obsudili-na-iii-kongresse-molodykh-\/&quot;},{&quot;id&quot;:&quot;97289&quot;,&quot;title&quot;:&quot;Почти 70% мегагрант-лабораторий признаны успешными&quot;,&quot;date&quot;:&quot;29 ноября&quot;,&quot;url&quot;:&quot;https:\/\/xn--80aa3ak5a.xn--p1ai\/news\/pochti-70-megagrant-laboratoriy-priznany-uspeshnymi\/&quot;}]"
            initial-news-title="Новости"
            btn-text="Все новости"
            all-news-link="https://xn--80aa3ak5a.xn--p1ai/news/"
        ></u-news-slider>
    </div>
</div>

<div id="press" class="section press">
    <div class="press__inner section__inner">
        <div class="press__content">
            <div id="bx_3099439860_5993">
                <h2 class="section__title press__title">Для СМИ</h2>
                <div class="program__text">
                    <div class="press__text" style="margin-bottom: 0px;">
                        <p>
                            РИА Новости обеспечило информационную поддержку и&nbsp;выступило Официальным фотохост‑агентством III Конгресса молодых ученых.
                        </p>
                        <p>
                            Фонд Росконгресс провел фотосъемку всех событий в&nbsp;рамках III Конгресса молодых ученых.
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
                    Медиабанк РИА Новости
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
                    Фотобанк Росконгресс
                </custom-button>
            </div>
        </div>
    </div>
</div>

<div id="partners" class="section partners partners-section partners-section-main">
    <div class="section__inner">
        <div id="bx_565502798_5992"><h2 class="section__title partners__title">Организаторы</h2></div>

        <div class="partners-slider">
            <slider
                id="organizers"
                :is-desktop-disabled="true"
                :items="4"
                is-multiple
            >
                <swiper-slide id="1">
                    <a
                        href="https://minobrnauki.gov.ru/"
                        target="_blank"
                        rel="noopener"
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/58b/min.svg" alt="Минобрнауки России">
                        </div>
                        <span class="partners-slide__name">Минобрнауки России</span>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_1454625752_6002">
                    <a
                        href="http://youngscience.gov.ru/"
                        target="_blank" rel="noopener"               
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/d0a/KC_LOGO.svg"
                                alt="Координационный совет по&nbsp;делам молодежи в&nbsp;научной и&nbsp;образовательной сферах">
                        </div>
                        <span
                            class="partners-slide__name">Координационный совет по&nbsp;делам молодежи в&nbsp;научной и&nbsp;образовательной сферах</span>
                    </a>
                    </swiper-slide>
                    <swiper-slide id="bx_1454625752_6003">
                    <a
                        href="https://nationalpriority.ru/"
                        target="_blank" rel="noopener"               
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/af6/ano-logo.svg"
                                alt="Оператор Десятилетия науки и&nbsp;технологий в&nbsp;России">
                        </div>
                        <span
                            class="partners-slide__name">Оператор Десятилетия науки и&nbsp;технологий в&nbsp;России</span>
                    </a>
                    </swiper-slide>
                    <swiper-slide id="bx_1454625752_6005">
                    <a
                        href="https://roscongress.org/"
                        target="_blank" rel="noopener"               
                        class="partners-slide"
                    >
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/0da/roscongress.svg"
                                alt="Фонд Росконгресс">
                        </div>
                        <span
                            class="partners-slide__name">Фонд Росконгресс</span>
                    </a>
                </swiper-slide>
            </slider>
        </div>

        <div class="partners-slider">
            <div class="partners-slider__title-flex">
                <h2 class="partners-slider__title">Партнеры</h2>
                <h3 class="section__subtitle partners-slider__subtitle">Стать партнером Конгресса — <a href="mailto:partners@roscongress.org">partners@roscongress.org</a></h3>
            </div>
            <slider id="partners" :is-desktop-disabled="true" :items="8" is-multiple>
                <swiper-slide id="bx_3322728009_6044">
                    <a href="https://www.rosatom.ru/" target="_blank" rel="noopener" class="partners-slide">
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/bd8/y4b9726kkntyjkkz2673z531p6wu0vfc/Rosatom.svg" alt="Госкорпорация&nbsp;«Росатом»" />
                        </div>
                        <span class="partners-slide__name">Госкорпорация&nbsp;«Росатом»</span>
                        <div class="partners-slide__status">Титульный партнер</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_3322728009_6045">
                    <a href="http://www.sberbank.ru/" target="_blank" rel="noopener" class="partners-slide">
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/bf6/u0fx978xho9wgo98pfup9b68frh250w3/SBER_LOGO_RUS_V_WHT_RGB (1).svg" alt="ПАО&nbsp;Сбербанк" />
                        </div>
                        <span class="partners-slide__name">ПАО&nbsp;Сбербанк</span>
                        <div class="partners-slide__status">Официальный партнер</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_3322728009_89380">
                    <a href="https://science52.ru/" target="_blank" rel="noopener" class="partners-slide">
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/d52/cvji5fvcvqooxo3a59yqr4sj0a1jhvxg/NOC_Rus_logo-01.svg" alt="АНО &laquo;Нижегородский НОЦ&raquo;" />
                        </div>
                        <span class="partners-slide__name">АНО &laquo;Нижегородский НОЦ&raquo;</span>
                        <div class="partners-slide__status">Официальный партнер</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_3322728009_90553">
                    <a href="http://nrcki.ru/" target="_blank" rel="noopener" class="partners-slide">
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/95f/mon8gkeccm31ujqyctak08qb8nnm21yk/NIC-rus-01.svg" alt="НИЦ «Курчатовский институт»" />
                        </div>
                        <span class="partners-slide__name">НИЦ «Курчатовский институт»</span>
                        <div class="partners-slide__status">Стратегический научный партнер</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_3322728009_95544">
                    <a href="https://greatbook.ru/" target="_blank" rel="noopener" class="partners-slide">
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/3ba/4nii0biy9vps8lsmz8b40yhamm0tvrjn/bre_rus-01-01.svg" alt="АНО БРЭ" />
                        </div>
                        <span class="partners-slide__name">АНО БРЭ</span>
                        <div class="partners-slide__status">Партнер деловой программы</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_3322728009_90595">
                    <a href="https://univertechpred.ru/" target="_blank" rel="noopener" class="partners-slide">
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/27d/waue64v6rk69zj2ho46t9pqduaj3ker3/putp_rus-01.svg" alt="Платформа университетского технологического предпринимательства" />
                        </div>
                        <span class="partners-slide__name">Платформа университетского технологического предпринимательства</span>
                        <div class="partners-slide__status">Инновационный партнер</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_3322728009_89381">
                    <a class="partners-slide">
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/698/umain0hcxov09ypq3qb2osvktqxwa1ra/RA_rus-01.svg" alt="«Совместное предприятие «Квантовые технологии»" />
                        </div>
                        <span class="partners-slide__name">«Совместное предприятие «Квантовые технологии»</span>
                        <div class="partners-slide__status">Инновационный партнер</div>
                    </a>
                </swiper-slide>
                <swiper-slide id="bx_3322728009_92165">
                    <a href="https://nocrb.ru/news" target="_blank" rel="noopener" class="partners-slide">
                        <div class="partners-slide__image">
                            <img src="/upload/iblock/3e9/ydyulhskkss5odp0j7yvun42quaba0ji/noc-01.svg" alt="АНО «Управляющая компания НОЦ Республики Башкортостан»" />
                        </div>
                        <span class="partners-slide__name">АНО «Управляющая компания НОЦ Республики Башкортостан»</span>
                        <div class="partners-slide__status">Инновационный партнер</div>
                    </a>
                </swiper-slide>
            </slider>
            <div class="partners-slider__actions">
                <div class="partners-slider__actions-item">
                    <custom-button size="md" theme="primary" href="/partners/" tag="a" class="partners-slider__actions-btn"> Стать партнером </custom-button>
                </div>
                <div class="partners-slider__actions-item">
                    <custom-button size="md" theme="primary" href="/partners/#partners" tag="a" class="partners-slider__actions-btn"> Все партнеры </custom-button>
                </div>
                <div class="partners-slider__actions-item">
                    <custom-button size="md" theme="primary" href="/upload/documents/Справочник_экспонента.pdf?v=202401291035" tag="a" class="partners-slider__actions-btn" target="_blank" rel="noopener"> Справочник экспонента </custom-button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="location" class="section location">
    <div class="section__inner location__inner">
        <div class="location__text location__fix-ux-wrapper">
            <h2 class="section__title location__title location__fix-ux">место проведения</h2>
            <div class="location__info">
                <div class="location__label location__fix-ux">название</div>
                <div class="location__info-text location__fix-ux">Парк науки и искусства «Сириус»</div>
                <div class="location__footnote location__fix-ux-action">
                    <custom-tooltip :width="454" direction="left-top" :content="false">
                        <a slot="target" href="/upload/documents/Venue_map.pdf" class="location__link" target="_blank" rel="noopener">Карта площадки</a>
                    </custom-tooltip>
                </div>
            </div>
            <div class="location__info">
                <div class="location__label location__fix-ux">адрес</div>
                <div class="location__info-text location__fix-ux">Федеральная территория «Сириус» Олимпийский пр., д. 1</div>
                <div class="location__footnote location__fix-ux-action">
                    <custom-tooltip :width="454" direction="left-top">
                        <span slot="target" class="location__help-link">Как добраться</span>
                        <div slot="content">
                            <p>
                                Время в&nbsp;пути на&nbsp;автомобиле от&nbsp;международного аэропорта Сочи и&nbsp;ж/д вокзала Адлер до&nbsp;Парка науки и&nbsp;искусства &laquo;Сириус&raquo; составит 10&ndash;15&nbsp;минут, от&nbsp;центра
                                Сочи и&nbsp;пос. Красная Поляна&nbsp;&mdash; около часа.
                            </p>
                        </div>
                    </custom-tooltip>
                </div>
            </div>
            <div class="location__fix-ux">
                <div class="location__cols" id="bx_2970353375_5989"></div>
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