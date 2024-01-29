<template>
  <BusinessModalFilter
    :lang="lang"
    :caption="modalTitleLang[lang]"
    :isVisible="isVisible"
    @search="onFilterSearch"
    @close="$emit('close')"
    @accept="$emit('accept')"
    @clear="onClear"
  >
    <BusinessParticipants
      :items="filterParticipants"
      :notFoundCaption="notFoundCaption"
      @change="onChange"
    />
  </BusinessModalFilter>
</template>

<script>

export default {
  props: {
    isVisible: {
      type: Boolean,
      default: false
    },
    initialFilterParticipants: {
      type: Array,
      default: () => []
    },
    lang: {
      type: String,
      default: 'ru'
    },
    notFoundCaption: {
      type: String,
      default: ''
    }
  },
  data() {
    return {
      participantsIds: [],
      filterParticipants: JSON.parse(JSON.stringify(this.initialFilterParticipants)),
      modalTitleLang: {
        ru: 'Участники',
        en: 'Participants'
      }
    }
  },
  methods: {
    onChange(checkbox, id) {
      if (checkbox) {
        this.participantsIds = [...this.participantsIds, id]
      } else {
        this.participantsIds = this.participantsIds.filter(item => item !== id)
      }

      this.$emit('change', this.participantsIds)
    },
    onClear() {
      this.participantsIds = []
      this.$emit('change', this.participantsIds)
    },
    onFilterSearch(searchValue) {
      const value = searchValue.toLowerCase().trim()
      this.filterParticipants = this.initialFilterParticipants.map(item => {
        const items = item.items.map(participant => {
          const isHidden = !participant.name.toLowerCase().trim().includes(value)
          return {
            ...participant,
            isHidden
          }
        })

        return {
          ...item,
          items,
          isHidden: items.filter(item => item.isHidden).length === item.items.length,
        }
      })
    }
  }
}
</script>
