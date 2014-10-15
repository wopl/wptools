<?php
// **********************************************************************************
// **                                                                              **
// ** zebratable.inc                                (c) Wolfram Plettscher 10/2014 **
// **                                                                              **
// **********************************************************************************

echo ("
	<sript src='jquery.js'></script>
	<script>
	$(function(){
		$('.sqltable tr:first-child').addClass('sqltableone');
		$('.sqltable tr:nth-child(even)').addClass('sqltableeven');
		$('.sqltable tr:nth-child(2n+3)').addClass('sqltableodd');
		});
	</script>

      "); 
?>