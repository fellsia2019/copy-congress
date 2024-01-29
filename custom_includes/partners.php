<section class="excursions-page-wrapper__section">
    <div class="u-g-container">

        <initiatives-partners
    :initial-items="[
        {
            'url' : '/rosatom',
            'image' : 'frontend/assets/img/partner-logo-01.png',
            'title' : 'Росатом'
        },
        {
            'url' : '/rzd',
            'image' : 'frontend/assets/img/partner-logo-02.png',
            'title' : 'Российские железные дороги'
        },
        {
            'url' : '/russian-post',
            'image' : 'frontend/assets/img/partner-logo-03.png',
            'title' : 'Почта России'
        },
        {
            'url' : '/msu',
            'image' : 'frontend/assets/img/partner-logo-04.png',
            'title' : 'МГУ имени М.В. Ломоносова'
        },
        {
            'url' : '/rosatom',
            'image' : 'frontend/assets/img/partner-logo-01.png',
            'title' : 'Росатом'
        },
        {
            'url' : '/rzd',
            'image' : 'frontend/assets/img/partner-logo-02.png',
            'title' : 'Российские железные дороги'
        },
        {
            'url' : '/russian-post',
            'image' : 'frontend/assets/img/partner-logo-03.png',
            'title' : 'Почта России'
        },
        {
            'url' : '/msu',
            'image' : 'frontend/assets/img/partner-logo-04.png',
            'title' : 'МГУ имени М.В. Ломоносова'
        },
        {
            'url' : '/rosatom',
            'image' : 'frontend/assets/img/partner-logo-01.png',
            'title' : 'Росатом'
        },
        {
            'url' : '/rzd',
            'image' : 'frontend/assets/img/partner-logo-02.png',
            'title' : 'Российские железные дороги'
        },
        {
            'url' : '/russian-post',
            'image' : 'frontend/assets/img/partner-logo-03.png',
            'title' : 'Почта России'
        },
        {
            'url' : '/msu',
            'image' : 'frontend/assets/img/partner-logo-04.png',
            'title' : 'МГУ имени М.В. Ломоносова'
        }
    ]"
>
    <template #header>
        <div class="initiatives-partners__header partners__header">
        <h2 class="initiatives-partners__title tt-uppercase title-xl">
            Партнеры
        </h2>
        <div class="initiatives-partners__swiper-controls">
            <div class="u-swiper-controls">
            <button
                ref="btnPrev"
                class="u-swiper-controls__btn u-swiper-controls__btn--prev">
            </button>
            <div
                ref="paginationFraction"
                class="u-swiper-controls__count"
            >
            </div>
            <button
                ref="btnNext"
                class="u-swiper-controls__btn u-swiper-controls__btn--next">
            </button>
            </div>
        </div>
        </div>
    </template>
    <template #card="{ card }">
        <partners-card
                class="initiatives-partners__partner-card"
                :card="card"
            />
    </template>
</initiatives-partners>


    </div>
</section>
