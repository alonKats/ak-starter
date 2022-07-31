<?php
/**
 * @Author: Timi Wahalahti
 * @Date:   2019-12-03 11:03:31
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2022-06-09 12:04:05
 *
 * @package ak-starter
 */

namespace Air_Light;

add_filter( 'air_helper_pll_register_strings', function() {
  $strings = [
    // 'Key: String' => 'String',
  ];

  /**
   * Uncomment if you need to have default ak-starter accessibility strings
   * translatable via Polylang string translations.
   */
  // foreach ( get_default_localization_strings() as $key => $value ) {
  // $strings[ "Accessibility: {$key}" ] = $value;
  // }

  return $strings;
} );

function get_default_localization_strings( $language = 'en' ) {
  $strings = [
    'en'  => [
      'Add a menu'                                   => __( 'Add a menu', 'ak-starter' ),
      'Open main menu'                               => __( 'Open main menu', 'ak-starter' ),
      'Close main menu'                              => __( 'Close main menu', 'ak-starter' ),
      'Main navigation'                              => __( 'Main navigation', 'ak-starter' ),
      'Back to top'                                  => __( 'Back to top', 'ak-starter' ),
      'Open child menu'                              => __( 'Open child menu', 'ak-starter' ),
      'Open child menu for'                          => __( 'Open child menu for', 'ak-starter' ),
      'Close child menu'                             => __( 'Close child menu', 'ak-starter' ),
      'Close child menu for'                         => __( 'Close child menu for', 'ak-starter' ),
      'Skip to content'                              => __( 'Skip to content', 'ak-starter' ),
      'Skip over the carousel element'               => __( 'Skip over the carousel element', 'ak-starter' ),
      'External site'                                => __( 'External site', 'ak-starter' ),
      'opens in a new window'                        => __( 'opens in a new window', 'ak-starter' ),
      'Page not found.'                              => __( 'Page not found.', 'ak-starter' ),
      'The reason might be mistyped or expired URL.' => __( 'The reason might be mistyped or expired URL.', 'ak-starter' ),
      'Search'                                       => __( 'Search', 'ak-starter' ),
      'Block missing required data'                  => __( 'Block missing required data', 'ak-starter' ),
      'This error is shown only for logged in users' => __( 'This error is shown only for logged in users', 'ak-starter' ),
      'No results found for your search'             => __( 'No results found for your search', 'ak-starter' ),
      'Edit'                                         => __( 'Edit', 'ak-starter' ),
      'Previous slide'                               => __( 'Previous slide', 'ak-starter' ),
      'Next slide'                                   => __( 'Next slide', 'ak-starter' ),
      'Last slide'                                   => __( 'Last slide', 'ak-starter' ),
    ],
    'fi'  => [
      'Add a menu'                                   => 'Luo uusi valikko',
      'Open main menu'                               => 'Avaa päävalikko',
      'Close main menu'                              => 'Sulje päävalikko',
      'Main navigation'                              => 'Päävalikko',
      'Back to top'                                  => 'Takaisin ylös',
      'Open child menu'                              => 'Avaa alavalikko',
      'Open child menu for'                          => 'Avaa alavalikko kohteelle',
      'Close child menu'                             => 'Sulje alavalikko',
      'Close child menu for'                         => 'Sulje alavalikko kohteelle',
      'Skip to content'                              => 'Siirry suoraan sisältöön',
      'Skip over the carousel element'               => 'Hyppää karusellisisällön yli seuraavaan sisältöön',
      'External site'                                => 'Ulkoinen sivusto',
      'opens in a new window'                        => 'avautuu uuteen ikkunaan',
      'Page not found.'                              => 'Hups. Näyttää, ettei sivua löydy.',
      'The reason might be mistyped or expired URL.' => 'Syynä voi olla virheellisesti kirjoitettu tai vanhentunut linkki.',
      'Search'                                       => 'Haku',
      'Block missing required data'                  => 'Lohkon pakollisia tietoja puuttuu',
      'This error is shown only for logged in users' => 'Tämä virhe näytetään vain kirjautuneille käyttäjille',
      'No results for your search'                   => 'Haullasi ei löytynyt tuloksia',
      'Edit'                                         => 'Muokkaa',
      'Previous slide'                               => 'Edellinen dia',
      'Next slide'                                   => 'Seuraava dia',
      'Last slide'                                   => 'Viimeinen dia',
    ],
  ];

  return ( array_key_exists( $language, $strings ) ) ? $strings[ $language ] : $strings['en'];
} // end get_default_localization_strings

function get_default_localization( $string ) {
  if ( function_exists( 'ask__' ) && array_key_exists( "Accessibility: {$string}", apply_filters( 'air_helper_pll_register_strings', [] ) ) ) {
    return ask__( "Accessibility: {$string}" );
  }

  return esc_html( get_default_localization_translation( $string ) );
} // end get_default_localization

function get_default_localization_translation( $string ) {
  $language = get_bloginfo( 'language' );
  if ( function_exists( 'pll_the_languages' ) ) {
    $language = pll_current_language();
  }

  $translations = get_default_localization_strings( $language );

  return ( array_key_exists( $string, $translations ) ) ? $translations[ $string ] : '';
} // end get_default_localization_translation
