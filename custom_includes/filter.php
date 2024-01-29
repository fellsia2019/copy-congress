
<u-excursions-wrapper
    submit-tour-form-url="/action/"
    :category-options="[
        {
          id: '1',
          name: 'школьники'
        },
        {
          id: '2',
          name: 'не школьники'
        },
        {
          id: '3',
          name: 'студенты'
        },
        {
          id: '4',
          name: 'не студенты'
        },
    ]"
    class="excursions-page-wrapper__section"
>
    <div class="u-g-container">
        <u-filtered-cards
            url="/events/"
            init-next-url="/custom_includes/api_placeholder.php"
            :init-paginator="{
                'NavNum': 1,
                'NavPageNomer': 1,
                'NavPageCount': 94,
                'NavRecordCount': 561,
                'NavPageSize': 6
            }"
            :init-params="{
                    'region': [{
                    'id': '',
                    'name': 'Все регионы'
                    }, {
                    'id': '9832',
                    'name': 'Другая страна'
                    }, {
                    'id': '1290',
                    'name': 'Забайкальский край'
                    }, {
                    'id': '1297',
                    'name': 'Севастополь'
                    }, {
                    'id': '855',
                    'name': 'Белгородская область'
                    }, {
                    'id': '692',
                    'name': 'Москва'
                    }, {
                    'id': '1225',
                    'name': 'Кабардино-Балкарская Республика'
                    }, {
                    'id': '1238',
                    'name': 'Алтайский край '
                    }, {
                    'id': '1243',
                    'name': 'Астраханская область'
                    }, {
                    'id': '1245',
                    'name': 'Владимирская область'
                    }, {
                    'id': '1246',
                    'name': 'Волгоградская область'
                    }, {
                    'id': '1248',
                    'name': 'Воронежская область'
                    }, {
                    'id': '1252',
                    'name': 'Калужская область'
                    }, {
                    'id': '9702',
                    'name': 'Донецкая народная республика'
                    }, {
                    'id': '1258',
                    'name': 'Курская область'
                    }, {
                    'id': '1262',
                    'name': 'Московская область'
                    }, {
                    'id': '991262',
                    'name': 'Ленинградская область'
                    }, {
                    'id': '991263',
                    'name': 'Республика Татарстан'
                    }, {
                    'id': '991264',
                    'name': 'Мурманская область'
                    }],


                    'type': [{
                    'id': '',
                    'name': 'Экскурсии и лекции'
                    }, {
                    'id': '1',
                    'name': 'Экскурсии'
                    }, {
                    'id': '2',
                    'name': 'Лекции'
                    }],

                    'initialFilters': [{
                    'name': 'Ближайшие',
                    'filter': 'upcoming',
                    'isActive': true
                    }, {
                    'name': 'Прошедшие',
                    'filter': 'past',
                    'isActive': false
                    }],

                    'year': [{
                    'id': '',
                    'name': 'Все года'
                    }, {
                    'id': 1970,
                    'name': '1970'
                    }, {
                    'id': 2021,
                    'name': '2021'
                    }, {
                    'id': 2022,
                    'name': '2022'
                    }, {
                    'id': 2023,
                    'name': '2023'
                    }, {
                    'id': 2024,
                    'name': '2024'
                    }, {
                    'id': 2025,
                    'name': '2025'
                    }, {
                    'id': 2026,
                    'name': '2026'
                    }, {
                    'id': 2027,
                    'name': '2027'
                    }, {
                    'id': 2028,
                    'name': '2028'
                    }, {
                    'id': 2029,
                    'name': '2029'
                    }, {
                    'id': 2030,
                    'name': '2030'
                    }, {
                    'id': 2031,
                    'name': '2031'
                    }, {
                    'id': 2032,
                    'name': '2032'
                    }],

                }"
                :init-items="[
                {
                    'location': 'Мурманск',
                    'date': '13 апреля',
                    'time': '10:00-12:00',
                    'slots_left': 12,
                    'image': '/frontend/assets/img/excursions-01.jpg',
                    'partners': ['/frontend/assets/img/excursion-logo-01.png', '/frontend/assets/img/excursion-logo.svg'],
                    'title': 'Атомный ледокол Ленин',
                    'text': 'Вы подниметесь на борт первого в мире атомного ледокола «Ленин» и посетите интерактивный музейный комплекс «Атом и Арктика». Компанию вам составит профессиональный историк флота.',
                    'url': '/excursions/01',
                    'isPastEvent': false
                },
                {
                    'location': 'Санкт-Петербург',
                    'date': '25 апреля',
                    'time': '12:00-15:00',
                    'slots_left': 20,
                    'image': '/frontend/assets/img/excursions-02.jpg',
                    'partners': ['/frontend/assets/img/excursion-logo-02.png', '/frontend/assets/img/excursion-logo.svg'],
                    'title': 'Музей железных дорог России',
                    'text': 'Вы подниметесь на борт первого в мире атомного ледокола «Ленин» и посетите интерактивный музейный комплекс «Атом и Арктика». Компанию вам составит профессиональный историк флота.',
                    'url': '/excursions/02',
                    'isPastEvent': false
                },
                {
                    'location': 'Набережные Челны',
                    'date': '05 мая',
                    'time': '09:00-12:00',
                    'slots_left': 15,
                    'image': '/frontend/assets/img/excursions-03.jpg',
                    'partners': ['/frontend/assets/img/excursion-logo-03.png', '/frontend/assets/img/excursion-logo.svg'],
                    'title': 'Детский технопарк «Кванториум»',
                    'text': 'Экскурсия для детей взрослых по интерактивной научно- технической выставке и захватывающие мастер-классы.',
                    'url': '/excursions/03',
                    'isPastEvent': false
                },
                {
                    'location': 'Московская область',
                    'date': '10 июня',
                    'time': '12:00-15:00',
                    'slots_left': 2,
                    'image': '/frontend/assets/img/excursions-04.jpg',
                    'partners': ['/frontend/assets/img/excursion-logo-04.png', '/frontend/assets/img/excursion-logo.svg'],
                    'title': 'Сортировочный центр Почты&nbsp;России',
                    'text': 'Во время экскурсии вы загляните в один из крупнейших логистических центров Почты России и узнаете, что происходит с вашей посылкой, когда она поступает на сортировку',
                    'url': '/excursions/04',
                    'isPastEvent': false
                },
                {
                    'location': 'Москва',
                    'date': '12 июня',
                    'time': '10:00-12:00',
                    'slots_left': 0,
                    'image': '/frontend/assets/img/excursions-05.jpg',
                    'partners': ['/frontend/assets/img/excursion-logo-05.png', '/frontend/assets/img/excursion-logo.svg'],
                    'title': 'МГУ имени М.В. Ломоносова с посещением смотровой',
                    'text': 'Попасть в МГУ им. М.В. Ломоносова очень сложно. Но участники Десятилетия науки и технологий могут не просто побывать в одном из центров науки, но и полюбоваться видами Москвы с высоты 24 этажа.',
                    'url': '/excursions/05',
                    'isPastEvent': true
                },
                {
                    'location': 'Казань',
                    'date': '25 июня',
                    'time': '21:00-23:00',
                    'slots_left': 0,
                    'image': '/frontend/assets/img/excursions-06.jpg',
                    'partners': ['/frontend/assets/img/excursion-logo-06.png', '/frontend/assets/img/excursion-logo.svg'],
                    'title': 'Астрономическая обсерватория',
                    'text': 'Вы узнаете, как рождаются и умирают звезды и галактики, заглянете в несколько телескопов. Один из них - Рефрактор, -самый мощный действующий визуальный телескоп в России, и ему уже более 100 лет.',
                    'url': '/excursions/06',
                    'isPastEvent': true
                },
            ]"

            list-container-class="u-projects"            
        >
            <template v-slot:text>
                <div id="future" class="year-block__targets about-main__text">
                    <p>В&nbsp;Десятилетие науки и&nbsp;технологий вы&nbsp;можете отправиться на&nbsp;бесплатные экскурсии по&nbsp;научным и&nbsp;технологическим объектам, посетить лекции российских ученых.</p>
                    <p>Запишитесь на&nbsp;мероприятия, чтобы познакомиться с&nbsp;историей науки и&nbsp;с&nbsp;современными изобретениями ученых.</p>
                </div>
            </template>
            <template v-slot="{ id, card }">
                <u-excursion-card
                    :key="`u-projects__card-${id}`"
                    class="u-projects__card"
                    :data="card"
                />
            </template>
        </u-filtered-cards>
    </div>
</u-excursions-wrapper>
