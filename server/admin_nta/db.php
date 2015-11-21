 <?php 
  function lacz_bd()
  {
     $wynik = new mysqli("localhost", "hostpidivn_itiv2", "5y12yzJd", "hostpidivn_itiv2");
     if (!$wynik)
        throw new Exception("Error...Please try again later...");
     else
        return $wynik;
  }
  $base_url = "http://i-tivi.com";
      $table_prefix = "wp_";
   