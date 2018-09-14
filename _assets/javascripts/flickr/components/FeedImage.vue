<template lang='pug'>
  div
    .item__wrap
      .item__header.is-button-in.popup-gallerys
        .item__img--bkg(:data-flickity-bg-lazyload="`https://farm${data.farm}.staticflickr.com/${data.server}/${data.primary}_${data.secret}_n.jpg`")
        //.item__img--bkg(:style="`background-image:url(https://farm${data.farm}.staticflickr.com/${data.server}/${data.primary}_${data.secret}_n.jpg)`")
        a.item__popup__btn(:href='`https://farm${data.farm}.staticflickr.com/${data.server}/${data.primary}_${data.secret}_b.jpg`', :data-source='`https://farm${data.farm}.staticflickr.com/${data.server}/${data.primary}_${data.secret}_b.jpg`', :data-title='data.title._content')
          .item__btn__inner.is-button-hidden
            .btn.btn--primary
              i.icon-search
    .item__body
      h6.item__title {{data.title._content}}
</template>

<script type="text/babel">
  export default {
    props: ['data'],
  };
</script>
