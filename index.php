---
layout: post
title: RSS FEED
---

<?php
include('rssclass.php');
$feedlist = new rss('https://www.sophiainstitute.id/feeds/posts/default?alt=rss&redirect=false'); /* Ubah link feed disini dengan link feed Anda */
echo $feedlist->display(7,"ePlusGo"); /* Angka 7 digunakan untuk menampilkan jumlah artikel */
?>
