var MobileNav = {};

MobileNav.accordion = {
	init: function() {
		this.listeners();
	},
	listeners: function() {
		$(".js-accordion-trigger").on('click', MobileNav.accordion.toggle);
	},
	toggle: function() {
		if ($(this).hasClass('menu-item')){
			$(this).toggleClass('active');
		}else {
			$(this).parent().toggleClass('active');
		}
	}
};

MobileNav.menu = {
	init: function() {
		this.listeners();
	},
	listeners: function() {
		$(window).bind('resize', this.checkSize);
		$(window).bind('orientationchange', this.checkSize);
	},
	checkSize: function() {
		var width = window.innerWidth;
		if(width > 1100) {
			MobileNav.menu.close();
		}
	},
	close: function() {
		$('.js-off-canvas-exit').click();
	}
};

MobileNav.init = function() {
	this.menu.init();
	this.accordion.init();
};

var DesktopNav = {};

DesktopNav = {
	init: function() {
		this.listeners();
		this.headerNav.init();
	},
	listeners: function() {
		$(window).bind('scroll', this.changeSize);
	},
	changeSize: function() {
		var top = window.pageYOffset;
		var footerPosition = $('.footer-container').position().top;
		var submenuHeight = $('.submenu-mobile-target').height();
		var headerHeight = $('.main-navigation').height();
		var x = top + 60 + submenuHeight;

		if (top > 10 && x <= footerPosition ) {
			$('#site-navigation').addClass('smaller');
			$('.submenu-mobile-target').addClass('sticky-submenu');
			$('.submenu-mobile-target').removeClass('bottom-submenu');
		}else if ( x >= footerPosition ) {
			$('.submenu-mobile-target').removeClass('sticky-submenu');
			$('.submenu-mobile-target').addClass('bottom-submenu');
		}else {
			$('#site-navigation').removeClass('smaller');
			$('.submenu-mobile-target').removeClass('sticky-submenu');
			$('.submenu-mobile-target').removeClass('bottom-submenu');
		}
	}
};

DesktopNav.headerNav = {
	init: function() {
		this.listeners();
	},
	listeners: function() {
		$('.js-submenu-trigger').on('click', DesktopNav.headerNav.open);
		$('.js-submenu-exit').on('click', DesktopNav.headerNav.close);
		$('.js-submenu-mobile-trigger').on('click', DesktopNav.headerNav.toggleExpand);
	},
	open: function() {
		if ($(this).parent().hasClass('active')){
			DesktopNav.headerNav.close();
		}else {
			$('.js-menu-item').removeClass('active');
			$(this).parent().addClass('active');
			$('.menu-overlay').addClass('active');
			$('body').addClass('disable-scroll');
		}
	},
	close: function() {
		$('body').removeClass('disable-scroll');
		$('.js-menu-item, .menu-overlay').removeClass('active');
	},
	toggleExpand: function() {
		$('.js-submenu-mobile-target').toggleClass('expanded');
		$(this).parent().toggleClass('expanded');
	}
};

var Submenu = {
	init: function() {
		this.listeners();
		this.activeSubmenu();
	},
	listeners: function() {
		$(window).bind('scroll', this.maxHeight);
	},
	maxHeight: function() {
		var height = $(window).innerHeight() - $('.js-header').height();
		$('.custom-submenu').css({
			'max-height': height,
		});
	},
	activeSubmenu: function() {
		var menuString = '';
		if($('.custom-submenu .active .active a').text() === '') {
			menuString = $('.custom-submenu .active a').text();
		}else {
			menuString = $('.custom-submenu .active .active a').text();
		}
		if(menuString == ''){
			menuString = 'Menu'
		}
		$('.js-active-level-menu').text(menuString);
	}
};

$(document).ready(function(){
	$(".current-page-ancestor").addClass("active");
	$(".custom-submenu").children(".menu-item-has-children").append("<span class='plus js-accordion-trigger'>+</span><span class='minus js-accordion-trigger'>&#8211;</span>");
	MobileNav.init();
	DesktopNav.init();
	Submenu.init();
});