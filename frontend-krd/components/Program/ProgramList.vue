<template>
  <div class="program-list-wrapper bg-edges">
    <program-filter :dates="dates" @change-date="changeDate" />
    <ul class="program-list">
      <li v-for="(program, i) in filteredPrograms" :key="`program_${i}`">
        <program-item :program="program"></program-item>
      </li>
    </ul>
  </div>
</template>

<script>
import moment from "moment";

export default {
  name: "ProgramList",
  props: {
    initItems: {
      type: Array,
      default : () => []
    }
  },
  data() {
    return {
      currentDate: "",
      programs: this.initItems
    }
  },
  computed: {
    dates() {
      const allProgramsDates = [
        ...new Set(this.programs.map((program) => program.data.date.start)),
      ].filter(date => Boolean(date))

      const programsDates = allProgramsDates.map((date) => ({
        title: this.formatDate({ date: date }),
        date: date,
      }));

      return [{ title: "Все", date: "" }, ...programsDates];
    },
    filteredPrograms() {
      return this.currentDate
        ? this.programs.filter((program) => {
            const currentDate = moment(this.currentDate, "YYYY.MM.DD");
            const programDate = moment(program.data.date.start, "YYYY.MM.DD");

            return currentDate.isSame(programDate);
          })
        : this.programs;
    },
  },
  methods: {
    formatDate({ date, from = "DD.MM.YYYY", to = "DD MMMM" } = {}) {
      return moment(date, from).locale("ru").format(to);
    },
    getUnique(arr, uniqueValue) {
      return [...new Set(arr.map((item) => item[uniqueValue]))];
    },
    changeDate(date) {
      this.currentDate = date;
    },
  },

};
</script>

<style scoped></style>
