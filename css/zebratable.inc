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
		$('.sqltable3 tr:first-child').addClass('sqltable3_1');
		$('.sqltable3 tr:nth-child(6n+2)').addClass('sqltable3_2');
		$('.sqltable3 tr:nth-child(6n+3)').addClass('sqltable3_3');
		$('.sqltable3 tr:nth-child(6n+4)').addClass('sqltable3_4');
		$('.sqltable3 tr:nth-child(6n+5)').addClass('sqltable3_5');
		$('.sqltable3 tr:nth-child(6n+6)').addClass('sqltable3_6');
		$('.sqltable3 tr:nth-child(6n+7)').addClass('sqltable3_7');
		});
	</script>

      "); 
?>