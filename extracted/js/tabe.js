//tabbed menue
$(document).ready(function() {$(".tab").slideUp();$(".tab:first").slideDown();$("div.tabs a").click(function() {$("div.tabs a").removeClass("active");$(this).addClass("active");$(".tab").slideUp();var activeTab = $(this).attr("rel");$("#"+activeTab).slideToggle();});});

//tabbed menue
$(document).ready(function() {$(".tab-sid").slideUp();$(".tab-sid:first").slideDown();$("div.tabs-sid a").click(function() {$("div.tabs-sid a").removeClass("active-sid");$(this).addClass("active-sid");$(".tab-sid").slideUp();var activeTab = $(this).attr("rel");$("#"+activeTab).slideToggle();});});

//tabbed menue
$(document).ready(function() {$(".tab-gallery").slideUp();$(".tab-gallery:first").slideDown();$("div.tabs-gallery a").click(function() {$("div.tabs-gallery a").removeClass("active-gallery");$(this).addClass("active-gallery");$(".tab-gallery").slideUp();var activeTab = $(this).attr("rel");$("#"+activeTab).slideToggle();});});
