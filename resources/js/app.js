/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(function () {

    /**
     *　記事一覧画面から削除対象をcheckboxで選択
     */
    $('input.delete_post').on('change', function(){
        $('.sticky_delete_block').addClass('is-show');

        // checkedを配列に格納
        let delete_array = $('input.delete_post:checked').map(function () {
        return $(this).data('id');
        }).get();

        // 選択中の項目数を表示
        let count = delete_array.length;
        $('#js_calc_delete_posts').text(count);

        // チェックが外れたらdelete_blockを非表示
        if (count == 0) {
            $('.sticky_delete_block').removeClass('is-show');
        }
    });

    // 一括でチェックを外す（一括チェックは実装しない）
    $('#js_reset_checkbox').on('click',function() {
        $('input.delete_post:checked').prop('checked', false);
        $('.sticky_delete_block').removeClass('is-show');
    });

    $('#ajax_post_delete').on('click', function () {
        if(confirm("削除してもよろしいですか？")) {

            let delete_array = $('input.delete_post:checked').map(function () {
                return $(this).data('id');
                }).get();
            let user = $('.navbar-nav .nav-item #username').data('name');
            let user_id = $('.navbar-nav .nav-item #username').data('id');
            $.ajax({
                type: 'POST',
                url: `/${user}/${user_id}/posts`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    delete_post:delete_array,
                },
                dataType: 'html'
            }).done(function (res) {
                $('body').html(res);

            }).fail(function (XMLHttpRequest, textStatus, error) {
                alert(error);
            });
        }
    })

});
