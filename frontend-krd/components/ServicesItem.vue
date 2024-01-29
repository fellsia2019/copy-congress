<template>
    <div class="services-item" :class="{ '_simple': simple}">
        <h2 class="services-item__title" v-if="!simple">
            <slot name="title" />
        </h2>
        <div class="services-item__content">
            <slot name="content" />
        </div>
        <div class="services-item__footer">
          <div v-if="date" class="services-item__footer-date" v-html="'Окончание приема заявок: ' + date" />
          <div v-if="contactsEmail" class="services-item__footer-contacts">
            <div>Контакты</div>
            <div class="services-item__footer-contacts_mail">
              <div>E:</div>
              <a v-html="contactsEmail" :href="'mailto:' + contactsEmail"/>
            </div>
          </div>
          <div v-if="note" class="services-item__footer-note" v-html="note"/>
          <div v-if="fileName" class="services-item__footer-file">
            <div v-html="fileFormat" class="services-item__footer-file_format"/>
            <a :href="fileLink" v-html="fileName" target="_blank" />
          </div>
        </div>
    </div>
</template>

<script>
export default {
  name: "ServicesItem",
  props: {
    date: { type: String, default: '' },
    note: { type: String, default: '' },
    fileLink: { type: String, default: '' },
    fileName: { type: String, default: '' },
    fileFormat: { type: String, default: '' },
    contactsEmail: { type: String, default: '' },
    simple: { type: Boolean, default: false },
  }
}
</script>
