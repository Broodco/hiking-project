document.addEventListener('alpine:init', () => {
    Alpine.data('creationForm', (initialTags) => ({
        selectedColor: 'slate',
        selectedHex: 'f1f5f9',
        tagName: '',
        color_open: false,
        tags: initialTags,

        toggle() {
            this.color_open = ! this.color_open
        },


        addTagToForm() {
            this.tags.push({
                id: this.tags.length,
                name: this.tagName,
                color: this.selectedHex
            });
            console.log(this.tags);
        }
    }))
})