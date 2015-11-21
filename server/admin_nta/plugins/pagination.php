<?
function print_pagination($elements){

         $total_pages = $elements['posts'] / $elements['limit'];
         $total_pages = ceil($total_pages);
         
         if($elements['page'] == ''){

            $a_page = 1;

         }else $a_page = $elements['page'];
         
         $last_pg_button = '<a href="'.$elements['separator'].'page='.$total_pages.'" class="'.$elements['url_class'].'"><img src="images/next_2.png" width="15" height="13" style="margin-left:5px;" /></a>';

         $first_pg_button = '<a href="'.$elements['separator'].'page=1" class="'.$elements['url_class'].'"><img src="images/prev_2.png" width="15" height="13" style="margin-right:5px;" /></a> ';
         
         $pp = $a_page - 1;
         $prev_pg_button = '<a href="'.$elements['separator'].'page='.$pp.'" class="'.$elements['url_class'].'"><img src="images/prev_1.png" width="28" height="13" style="margin-right:10px;" /></a>';

         $np = $a_page + 1;
         $next_pg_button = '<a href="'.$elements['separator'].'page='.$np.'" class="'.$elements['url_class'].'"><img src="images/next_1.png" width="28" height="13" style="margin-left:10px;" /></a> ';
         

         $active_pg_lbl = '<a class="'.$elements['a_pg_class'].'"><span class="pages_bg">'.$a_page.'</span></a>';
         $first_pg_lbl = '<a href="'.$elements['separator'].'page=1" class="'.$elements['url_class'].'">1</a>';
         $last_pg_lbl = '<a href="'.$elements['separator'].'page='.$total_pages.'" class="'.$elements['url_class'].'">'.$total_pages.'</a>';
         
                      if($a_page == 1 && $total_pages < 2){

                          $pagination_str = $elements['page_label'].' 1/1';
                          
                      }else
                      
                      //if user is on page 1 and there aren't more than 5 pages, but more than 1
                      if($a_page == 1 && $total_pages > 1 && $total_pages <= 5){

                          for($link_page = 2; $link_page <= $total_pages; $link_page++){
                          
                              $segment_link = '<a href="'.$elements['separator'].'page='.$link_page.'" class="'.$elements['url_class'].'">'.$link_page.'</a> ';
                              $segment_a = $segment_a.$segment_link;
                              
                          }
						
                          $pagination_str = $active_pg_lbl.$segment_a.' '.$next_pg_button.$last_pg_button;

                      }else
                      
                      //if user is on page greater than 1 and there aren't more pages than 5
                      if($a_page > 1 && $total_pages > 1 && $total_pages <= 5 && $a_page < $total_pages){

                          for($link_page = 1; $link_page <= $a_page - 1; $link_page++){

                              $segment_link = '<a href="'.$elements['separator'].'page='.$link_page.'" class="'.$elements['url_class'].'">'.$link_page.'</a> ';
                              $segment_a = $segment_a.$segment_link;

                          }

                          for($link_page = $link_page + 1; $link_page <= $total_pages; $link_page++){

                              $segment_link = '<a href="'.$elements['separator'].'page='.$link_page.'" class="'.$elements['url_class'].'">'.$link_page.'</a> ';
                              $segment_b = $segment_b.$segment_link;

                          }

                          $pagination_str = $first_pg_button.$prev_pg_button.' '.$segment_a.$active_pg_lbl.$segment_b.' '.$next_pg_button.$last_pg_button;

                      }else
                      
                      //if user is on last page and number of pages is greater than 1 but is lower than 6
                      if($a_page == $total_pages && $total_pages > 1 && $total_pages <= 5){

                          for($link_page = 1; $link_page <= $total_pages - 1; $link_page++){

                              $segment_link = '<a href="'.$elements['separator'].'page='.$link_page.'" class="'.$elements['url_class'].'">'.$link_page.'</a> ';
                              $segment_a = $segment_a.$segment_link;

                          }

                          $pagination_str = $first_pg_button.$prev_pg_button.' '.$segment_a.$active_pg_lbl;

                      }else

                      //if user is on first page and number of pages is greater than 5
                      if($a_page == 1 && $total_pages > 5){

                          for($link_page = 2; $link_page <= 4; $link_page++){

                              $segment_link = '<a href="'.$elements['separator'].'page='.$link_page.'" class="'.$elements['url_class'].'">'.$link_page.'</a> ';
                              $segment_a = $segment_a.$segment_link;

                          }

                          $pagination_str = $active_pg_lbl.$segment_a.'...'.$last_pg_lbl.' '.$next_pg_button.$last_pg_button;

                      }else
                      
                      //if user is on page greater than 1 and number of pages is greater than 5 but page is lower than 4
                      if($a_page > 1 && $total_pages > 5 && $a_page <= 5){

                          for($link_page = 1; $link_page <= $a_page - 1; $link_page++){

                              $segment_link = '<a href="'.$elements['separator'].'page='.$link_page.'" class="'.$elements['url_class'].'">'.$link_page.'</a> ';
                              $segment_a = $segment_a.$segment_link;

                          }
                          
                          for($link_page = $link_page + 1; $link_page <= $a_page + 1; $link_page++){

                              $segment_link = '<a href="'.$elements['separator'].'page='.$link_page.'" class="'.$elements['url_class'].'">'.$link_page.'</a> ';
                              $segment_b = $segment_b.$segment_link;

                          }

                          $pagination_str = $first_pg_button.$prev_pg_button.' '.$segment_a.$active_pg_lbl.$segment_b.'...'.$last_pg_lbl.' '.$next_pg_button.$last_pg_button;

                      }else
                      
                      //if user is on page greater than 1 and number of pages is greater than 5 and page is greater than 4 but page is lower tahn last page - 3 pages
                      if($a_page > 1 && $total_pages > 5 && $a_page > 4 && $a_page <= $total_pages - 4){

                          for($link_page = $a_page - 3; $link_page <= $a_page - 1; $link_page++){

                              $segment_link = '<a href="'.$elements['separator'].'page='.$link_page.'" class="'.$elements['url_class'].'">'.$link_page.'</a> ';
                              $segment_a = $segment_a.$segment_link;

                          }

                          for($link_page = $a_page + 1; $link_page <= $a_page + 3; $link_page++){

                              $segment_link = '<a href="'.$elements['separator'].'page='.$link_page.'" class="'.$elements['url_class'].'">'.$link_page.'</a> ';
                              $segment_b = $segment_b.$segment_link;

                          }

                          $pagination_str = $first_pg_button.$prev_pg_button.' '.$first_pg_lbl.'...'.$segment_a.$active_pg_lbl.$segment_b.'...'.$last_pg_lbl.' '.$next_pg_button.$last_pg_button;

                      }else
                      
                      //if user is on page greater than 1 and number of pages is greater than 5 and page is greater than 4 but page is greater tahn last page - 3 pages
                      if($a_page > 1 && $total_pages > 5 && $a_page > 4 && $a_page >= $total_pages - 3 && $a_page < $total_pages){

                          for($link_page = $a_page - 3; $link_page <= $a_page - 1; $link_page++){

                              $segment_link = '<a href="'.$elements['separator'].'page='.$link_page.'" class="'.$elements['url_class'].'">'.$link_page.'</a> ';
                              $segment_a = $segment_a.$segment_link;

                          }

                          for($link_page = $a_page + 1; $link_page <= $total_pages; $link_page++){

                              $segment_link = '<a href="'.$elements['separator'].'page='.$link_page.'" class="'.$elements['url_class'].'">'.$link_page.'</a> ';
                              $segment_b = $segment_b.$segment_link;

                          }

                          $pagination_str = $first_pg_button.$prev_pg_button.' '.$first_pg_lbl.'...'.$segment_a.$active_pg_lbl.$segment_b.' '.$next_pg_button.$last_pg_button;

                      }else
                      
                      //if user is on last and number of pages is greater than 5
                      if($a_page == $total_pages && $total_pages > 5){

                          for($link_page = $a_page - 3; $link_page <= $total_pages - 1; $link_page++){

                              $segment_link = '<a href="'.$elements['separator'].'page='.$link_page.'" class="'.$elements['url_class'].'">'.$link_page.'</a> ';
                              $segment_a = $segment_a.$segment_link;

                          }

                          $pagination_str = $first_pg_button.$prev_pg_button.' '.$first_pg_lbl.'...'.$segment_a.$active_pg_lbl;

                      }
                      
        return $pagination_str;

}

?>
