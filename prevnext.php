<div id="prev_next" class="clearfix">  
					<?php
					$prevpost = get_adjacent_post(false, '12', true); //前の記事
					$nextpost = get_adjacent_post(false, '12', false); //次の記事
					if( $prevpost or $nextpost ){ //前の記事、次の記事いずれか存在しているとき
					?>
					<?php
					if ( $prevpost ) { //前の記事が存在しているとき
					echo '<a href="' . get_permalink($prevpost->ID) . '" title="' . get_the_title($prevpost->ID) . '" id="prev" class="clearfix">
					<div id="prev_title">PREV</div>
					' . get_the_post_thumbnail($prevpost->ID, array(100,100)) . '
					<p>' . get_the_title($prevpost->ID) . '</p></a>';
					} else { //前の記事が存在しないとき
					echo  '<div id="prev_no"></div>';
					}
					if ( $nextpost ) { //次の記事が存在しているとき
					echo '<a href="' . get_permalink($nextpost->ID) . '" title="'. get_the_title($nextpost->ID) . '" id="next" class="clearfix">  
					<div id="next_title">NEXT</div>
					' . get_the_post_thumbnail($nextpost->ID, array(100,100)) . '
					<p>'. get_the_title($nextpost->ID) . '</p></a>';
					} else { //次の記事が存在しないとき
					echo '<div id="next_no"></div>';
					}
					?>
					<?php } ?>
				</div><!-- /#prev_next -->
