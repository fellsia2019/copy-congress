<template>
  <div class="program-filter">
    <div class="program-filter-dates">
      <ul class="program-filter-dates__list">
        <li v-for="(item, i) in dates" :key="`program_filter_date${i}`">
          <div
            :class="[
              { 'is-active': item.date === currentDate },
              'program-filter-dates__item',
            ]"
            @click.prevent="changeDate(item.date)"
          >
            {{ item.title }}
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: "ProgramFilter",
  props: {
    dates: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {
      currentDate: "",
    };
  },
  methods: {
    changeDate(date) {
      this.currentDate = date;
      this.$emit("change-date", this.currentDate);
    },
  },
};
</script>
