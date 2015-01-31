<?php
// **********************************************************************************
// **                                                                              **
// ** zebratable.inc                                (c) Wolfram Plettscher 01/2015 **
// **                                                                              **
// **********************************************************************************

echo ("
	<sript src='jquery.js'></script>
	<script>
	$(function(){
		$('.sqltable tr:first-child').addClass('sqltableone');
		$('.sqltable tr:nth-child(even)').addClass('sqltableeven');
		$('.sqltable tr:nth-child(2n+3)').addClass('sqltableodd');
		$('.sqltable2 tr:first-child').addClass('sqltableone');
		});
	</script>

      "); 
?>