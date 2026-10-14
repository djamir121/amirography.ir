<?php post;
if ( in_category('') ) {
include(TEMPLATEPATH . '/page/category-media.php'); } /*------------ رسانه ویدئو ------------*/
elseif ( in_category('') ) {
include(TEMPLATEPATH . '/page/category-media.php'); } /*------------ رسانه عکس ------------*/
elseif ( in_category('') ) {
include(TEMPLATEPATH . '/page/category-media.php'); } /*------------رسانه صوتی ------------*/
elseif ( in_category('') ) {
include(TEMPLATEPATH . '/page/category-media.php'); } /*------------ رسانه گرافیک ------------*/
elseif ( in_category('') ) {
include(TEMPLATEPATH . '/page/category-media.php'); } /*------------ رسانه روزنامه ------------*/
else { include(TEMPLATEPATH . '/page/category-default.php'); } ?>