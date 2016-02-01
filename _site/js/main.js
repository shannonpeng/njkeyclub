$(function() {
    var search = function(dataPath, pageSelector, parseFunction) {
        var searchData = [];
        var field = $(pageSelector + ' .search-form input');
        var results = $(pageSelector + ' .search-results ol');

        field.val('');

        $.getJSON(dataPath, function(data) {
            searchData = data;
        });

        var parse = function(text) {
            var found = false;

            results.empty();
            results.css('list-style', 'decimal');
            results.parent().show();

            $.each(searchData, function(i, v) {
                found = parseFunction(i, v, text, results);
                if (found) return false;
            });

            if (!found) {
                results.css({
                    "list-style": "none",
                    "margin": 0
                });
                results.empty().append('<li>Sorry, but what you were looking for was not found!</li>');
            }
        };

        field.on('input', function() {
            if (field.val() !== '') {
                parse(field.val().toLowerCase());
            }
            else {
                results.empty();
                results.parent().hide();
            }
        });
    };

    search('/search.json', '.blog', function(i, v, text, results) {
        if (v.title.toLowerCase().search(text) !== -1) {
            results.css({
                "list-style": "decimal",
                "margin-left": "4rem !important"
            });
            results.append('<li><a href="' + v.url + '">' + v.title + '</a> by ' + v.authors + '</li>');
            return true;
        }
        else return false;
    });

    search('/board.json', '.board-search', function(i, v, text, results) {
        if (v.name.toLowerCase().search(text) !== -1) {
            results.css({
                "list-style": "decimal",
                "margin-left": "4rem !important"
            });
            results.append('<li><p><a href="/board/' + i + '.html">' + v.name + '</a></p><img src="' + v.image + '" alt="' + v.name + '" /></li>');
            return true;
        }

        if (v.clubs) {
            for (var j = 0; j < v.clubs.length; j++) {
                if (v.clubs[j].toLowerCase().search(text) !== -1) {
                    results.css({
                        "list-style": "decimal",
                        "margin-left": "4rem !important"
                    });
                    results.append('<li><p><a href="/board/' + i + '.html">' + v.name + '</a></p><img src="' + v.image + '" alt="' + v.name + '" /></li>');
                    return true;
                }
            }
            return false;
        }

        return false;
    });

    $('.mobile-nav .menu-icon').on('click', function(e) {
        e.preventDefault();
        $('.mobile-nav ul li').not('.menu-icon').toggle();
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 400)
            $('.top').fadeIn(200);
        else
            $('.top').fadeOut(200);
    });

    $(document).on('click', '.smooth-scroll', function(e) {
        e.preventDefault();
        var target = this.hash, $target = $(target);
        if (target == '') {
            target = '';
            $target = $('body');
        }
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top
        }, 900, 'swing', function() {
            window.location.hash = target;
        });
    });

    $('.accordion dt').on('click', function() {
        var element = $(this);
        if (element.next().hasClass('is-open')) {
            element.parent().find('dd').removeClass('is-open').slideUp(600);
        }
        else {
            element.parent().find('dd.is-open').removeClass('is-open').slideUp(600);
            element.next().addClass('is-open').slideDown(600, function() {
                $('html, body').stop(true, true).animate({
                    scrollTop: element.offset().top
                }, 1000);
            });
        }
    });
});
