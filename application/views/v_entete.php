<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
       "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <title><?php echo $title;?> </title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <?php 
    $this->load->helper('html');
    $this->load->helper('form');
    $this->load->helper('url');
    
    echo link_tag('styles/styles.css');?>
    <link rel="shortcut icon" type="image/x-icon" href="./images/favicon.ico" />
  </head>
  <body>
  <?php 
  
  echo '<div id="page">';
  echo '<div id="entete">';
  $image_properties = array(
  		'src' => 'images/logo.jpg',
  		'alt' => 'Laboratoire Galaxy-Swiss Bourdin',
  		'id' => 'logoGSB',
		'width' => '200',
		'height' => '200',
  		'title' => 'Laboratoire Galaxy-Swiss Bourdin',
  );
  echo img($image_properties);
  echo '<h1>Suivi du remboursement des frais</h1>';
  echo '</div>';
  ?>  
      