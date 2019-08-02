jQuery( function ( $ ) {
    'use strict';

    // Menu dropdown
    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).parent().siblings().removeClass('open');
        $(this).parent().toggleClass('open');
    });


    $( 'select' ).addClass( 'form-control' );

    // The WordPress Default Widgets
    // Now we'll add some classes for the WordPress default widgets - let's go
    $( ".widget").wrapInner("<div class='card-body'></div>");
    $( 'table#wp-calendar' ).addClass( 'table table-striped');

    // Comment Form
    $( '.comment-form-author > input' ).addClass( 'form-control' );
    $( '.comment-form-email > input' ).addClass( 'form-control' );
    $( '.comment-form-url > input' ).addClass( 'form-control' );
    $('.comment-reply-link').addClass('btn btn-primary');
    $('#commentsubmit').addClass('btn btn-primary');

    // Password Form
    $( '.post-password-form > p > label > input' ).addClass( 'form-control' );
    $( '.post-password-form > p >  input' ).addClass( 'btn btn-primary' );



});