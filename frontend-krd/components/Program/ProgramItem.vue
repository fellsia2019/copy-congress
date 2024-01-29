<template>
  <div class="program-item">
    <ul v-if="isExsistsTags" class="program-item__tags">
      <li v-for="(tag, i) in program.tags" :key="`program_tag_${i}`">
        <span class="program-item__tag" v-html="tag" />
      </li>
    </ul>
    <div class="program-item__title" v-html="program.title"></div>
    <div class="program-item__info">
      <div
        v-if="isExsistsInfoData"
        class="program-item__info-data"
      >
        <span
          v-if="Boolean(program.data.date.start)"
          class="program-item__info-date"
        >
          {{ formatDate({ date: program.data.date.start }) }}
        </span>
        <span
          v-if="Boolean(program.data.date.start)"
          class="program-item__info-divider"
        >/</span>
        <span
          v-if="isExsistsInfoTime"
          class="program-item__info-time"
        >
          {{ formatTime({ time: program.data.time.from }) }}
          <span v-if="Boolean(program.data.time.from) && Boolean(program.data.time.to)">—</span>
          {{ formatTime({ time: program.data.time.to }) }}
        </span>
      </div>
      <div
        v-if="program.address"
        v-html="program.address"
        class="program-item__info-address"
      />
    </div>
    <div class="program-item__description">
      <div
        class="program-item__description-text"
        :class="{'program-item__description-text--is-short-text': isShortDescription}"
        v-html="program.description"
        ref="description"
      />
      <div class="program-item__description-btns">
        <div
          v-if="program.link"
          class="program-item__description-show"
          @click="onWatchVideo"
        >
          Смотреть трансляцию
        </div>
        <a
          v-if="program.description"
          class="program-item__description-detail"
          @click.prevent="toggleDescriptionView"
        >
          <span v-show="isShortDescription">Подробнее</span>
          <span v-show="!isShortDescription">Скрыть описание</span>
        </a>
      </div>
    </div>
    <div
      v-for="(persons, i) in program.persons"
      :key="`program_persons_${i}`"
      class="program-item__persons"
    >
      <program-person
        :title="persons.title"
        :persons="persons.items"
      ></program-person>
    </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  name: "ProgramItem",
  props: {
    program: { type: Object, default: () => ({}) },
  },
  data() {
    return {
      isShortDescription: true,
    }
  },
  methods: {
    formatDate({ date, from = "DD.MM.YYYY", to = "DD MMMM" } = {}) {
      return moment(date, from).locale("ru").format(to);
    },
    formatTime({ time, from = "HH:mm:ss", to = "HH:mm" } = {}) {
      return moment(time, from).locale("ru").format(to);
    },
    toggleDescriptionView() {
      this.isShortDescription = !this.isShortDescription
    },
    onWatchVideo() {
      this.$root.$emit('openVideo', this.program.link)
    }
  },
  computed: {
    isExsistsTags() {
      return this.program.tags && this.program.tags.length
    },
    isExsistsInfoData() {
      return this.program.data.date.start || this.isExsistsInfoTime
    },
    isExsistsInfoTime() {
      return this.program.data.time.from || this.program.data.time.to
    },
  },
};
</script>
