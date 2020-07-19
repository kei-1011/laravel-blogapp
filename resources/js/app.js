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
        if (confirm("削除してもよろしいですか？")) {

            let delete_array = $('input.delete_post:checked').map(function () {
                return $(this).data('id');
            }).get();
            let user = $('.navbar-nav .nav-item #username').data('name');
            $.ajax({
                type: 'POST',
                url: `/${user}/posts/`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    delete_post: delete_array,
                },
                dataType: 'html'
            }).done(function (res) {
                $('body').html(res);

            }).fail(function (XMLHttpRequest, textStatus, error) {
                alert(error);
            });
        }
    });


    /**
     * アカウントメニューの展開
     */
    $('#account_menu').on('click', function () {
            $('ul.account_menu').toggleClass('is-open');
    });

    /**
     * いいね機能
     */
    $(document).on('click', '.add_like', function () {
        var post_id = $(this).attr("data-post");
        var user_id = $(this).attr("data-user");
        let icon = $(this).find('i');
        let count = $(this).next('.like_count');

        $(this).removeClass('add_like');
        $(this).addClass('remove_like');
        icon.removeClass('far');
        icon.addClass('fas');
        icon.addClass('liked');

        $.ajax({
            type: 'POST',
            url: `/${post_id}/likes/`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                user_id: user_id,
                post_id: post_id,
            },
            dataType: 'json'
        }).done(function (res) {
            count.text(res.count);
            $('#like-id_' + post_id).text(res.like_id);
            // $(this).attr("data-like",res.like_id);
        }).fail(function (XMLHttpRequest, textStatus, error) {
            alert(error);
        });
    });

    /**
     * いいね削除機能
     */
    $(document).on('click', '.remove_like', function () {
        var post_id = $(this).attr("data-post");
        var user_id = $(this).attr("data-user");
        var like_id = $('#like-id_' + post_id).text();

        let icon = $(this).find('i');
        let count = $(this).next('.like_count');

        $(this).removeClass('remove_like');
        $(this).addClass('add_like');
        icon.removeClass('fas');
        icon.removeClass('liked');
        icon.addClass('far');
        icon.addClass('like-icon');

        $.ajax({
            type: 'POST',
            url: `/likes/${like_id}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                like_id: like_id,
                user_id: user_id,
                post_id: post_id,
            },
            dataType: 'json'
        }).done(function (res) {
            $('#like-id_' + post_id).text("");
            count.text(res);
        }).fail(function (XMLHttpRequest, textStatus, error) {
            alert(error);
        });
    });


});
