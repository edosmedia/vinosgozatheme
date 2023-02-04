<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vinosgoza
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
          <meta charset="<?php bloginfo( 'charset' ); ?>">
          <meta http-equiv="cache-control" content="max-age=0" />
          <meta http-equiv="cache-control" content="no-cache" />
          <meta http-equiv="expires" content="0" />
          <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
          <meta http-equiv="pragma" content="no-cache" />
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="profile" href="https://gmpg.org/xfn/11">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
          <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
          <?php wp_body_open(); ?>
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                              <a class="navbar-brand" href="#">Navbar</a>
                              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                              </button>
                              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                        <ul class="navbar-nav">
                                                  <li class="nav-item">
                                                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                                                  </li>
                                                  <li class="nav-item">
                                                            <a class="nav-link" href="#">Features</a>
                                                  </li>
                                                  <li class="nav-item">
                                                            <a class="nav-link" href="#">Pricing</a>
                                                  </li>
                                                  <li class="nav-item dropdown">
                                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                      Dropdown link
                                                            </a>
                                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                                      <li><a class="dropdown-item" href="#">Action</a></li>
                                                                      <li><a class="dropdown-item" href="#">Another action</a></li>
                                                                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                            </ul>
                                                  </li>
                                        </ul>
                              </div>
                    </div>
          </nav>
