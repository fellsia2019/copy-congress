<template>
  <BusinessModalFilter
    :lang="lang"
    :caption="modalTitleLang[lang]"
    :isVisible="isVisible"
    size="md"
    @search="onFilterSearch"
    @close="$emit('close')"
    @accept="$emit('accept')"
    @clear="onClear"
  >
    <BusinessThemes
      :items="filterThemes"
      :notFoundCaption="notFoundCaption"
      :lang="lang"
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
    initialFilterThemes: {
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
      themesIds: [],
      filterThemes: JSON.parse(JSON.stringify(this.initialFilterThemes)),
      modalTitleLang: {
        ru: 'Темы',
        en: 'Themes'
      }
    }
  },
  methods: {
    onChange(checkbox, id) {
      if (checkbox) {
        this.themesIds = [...this.themesIds, id]
      } else {
        this.themesIds = this.themesIds.filter(item => item !== id)
      }

      this.$emit('change', this.themesIds)
    },
    onClear() {
      this.themesIds = []
      this.$emit('change', this.themesIds)
    },
    onFilterSearch(searchValue) {
      const value = searchValue.toLowerCase().trim()
      this.filterThemes = this.initialFilterThemes.map(item => {
        const themes = item.themes.map(theme => {
          const isHidden = !theme.name.toLowerCase().trim().includes(value)
          return {
            ...theme,
            isHidden
          }
        })

        return {
          ...item,
          themes,
          isHidden: themes.filter(item => item.isHidden).length === item.themes.length,
        }
      })
    }
  }
}
</script>
