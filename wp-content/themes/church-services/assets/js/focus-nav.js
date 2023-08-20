( function( window, document ) {
  function church_services_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const church_services_nav = document.querySelector( '.sidenav' );
      if ( ! church_services_nav || ! church_services_nav.classList.contains( 'open' ) ) {
        return;
      }
      const elements = [...church_services_nav.querySelectorAll( 'input, a, button' )],
        church_services_lastEl = elements[ elements.length - 1 ],
        church_services_firstEl = elements[0],
        church_services_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;
      if ( ! shiftKey && tabKey && church_services_lastEl === church_services_activeEl ) {
        e.preventDefault();
        church_services_firstEl.focus();
      }
      if ( shiftKey && tabKey && church_services_firstEl === church_services_activeEl ) {
        e.preventDefault();
        church_services_lastEl.focus();
      }
    } );
  }
  church_services_keepFocusInMenu();
} )( window, document );