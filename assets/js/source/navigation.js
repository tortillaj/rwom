var RWOM = {};

(function ($, RWOM) {
  RWOM.navigation = RWOM.navigation || {};

  $.extend(RWOM.navigation, {

    initMenu: function () {
      var self = this
        , context = document
        , settings = {};

      $.extend(settings, {
        menuActive: false,
        menuBarSelector: '.site-header',
        toggleSelector: '#toggleMenu',
        transitionSpeed: 50,
        hiddenMenuClass: 'hide-main-menu',
        solidMenuClass: 'solid-main-menu'
      });

      $(settings.toggleSelector).on('click touchstart', function (e) {
        e.preventDefault();
        self.toggleMenu(context, settings)
      });


      var scrollY = $(window).scrollTop()
        , headerHeight = $(settings.menuBarSelector, context).height();
      if (scrollY > headerHeight * 0.5) {
        self.solidifyMenuBar(context, settings);
      }

      $(window).on('scroll', debounce(function (e) {
        scrollY = $(window).scrollTop();

        // solidify the main menu when it is half scrolled past
        if (scrollY > headerHeight * 0.5) {
          self.solidifyMenuBar(context, settings);
        } else if (scrollY < headerHeight) {
          self.setDefaultMainMenu(context, settings);
        }
      }));

    },

    toggleMenu: function (context, settings) {
      var self = this
        , $menuBar = $(settings.menuBarSelector, context);

      if (!settings.menuActive) {
        $menuBar.addClass('is-opening');
        window.setTimeout(self.openMenu, settings.transitionSpeed, context, settings);
      } else {
        $menuBar.addClass('is-closing');
        window.setTimeout(self.closeMenu, settings.transitionSpeed, context, settings);
      }

      settings.menuActive = !settings.menuActive;
    },

    openMenu: function (context, settings) {
      var $menuBar = $(settings.menuBarSelector, context);

      $menuBar.removeClass('is-opening');
      $menuBar.addClass('open');
    },

    closeMenu: function (context, settings) {
      var $menuBar = $(settings.menuBarSelector, context);

      $menuBar.removeClass('open');
      $menuBar.removeClass('is-closing');
    },

    hideMenuBar: function (context, settings) {
      var $body = $('body');
      $body.removeClass(settings.solidMenuClass);
      $body.addClass(settings.hiddenMenuClass);
    },

    solidifyMenuBar: function (context, settings) {
      var $body = $('body');
      $body.addClass(settings.solidMenuClass);
      $body.removeClass(settings.hiddenMenuClass);
    },

    setDefaultMainMenu: function (context, settings) {
      var $body = $('body');
      $body.removeClass(settings.solidMenuClass);
      $body.removeClass(settings.hiddenMenuClass);
    }
  });

  RWOM.navigation.initMenu();

})(jQuery, RWOM || {});

(function($) {
  $(document).ready(function() {
    var pattern = Trianglify({
      width: window.innerWidth,
      height: window.outerHeight,
      x_colors: 'PuBu'
    });
    $('body').append(pattern.canvas());

    $(window).on('resize', debounce(function(e) {
      var pattern = Trianglify({
        width: window.innerWidth,
        height: window.outerHeight,
        x_colors: 'PuBu'
      });
      $('canvas').remove();
      $('body').append(pattern.canvas());
      $('.module-slides').isotope({ layoutMode: 'packery' });
    }));
  });

  $(window).load(function(e) {
    $('.module-slides').isotope({ layoutMode: 'packery' });
    $('.module-filters li').on('click', function(e) {
      var $group = $(this).attr('data-group');
      $group = ($group === 'all') ? '*' : '.' + $group;
      $('.module-slides').isotope({ filter: $group, layoutMode: 'packery' });
    });
  });
})(jQuery);
