/**
 * VANTI Theme - Admin JavaScript
 * 
 * @package VANTI
 */

(function($) {
  'use strict';

  const VANTIAdmin = {
    /**
     * Initialize admin
     */
    init: function() {
      this.setupEvents();
      this.ready();
    },

    /**
     * Setup event listeners
     */
    setupEvents: function() {
      // Add admin event listeners here
    },

    /**
     * Runs when DOM is ready
     */
    ready: function() {
      // Admin initialization code
      console.log('VANTI Admin Loaded');
    }
  };

  // Initialize on document ready
  $(document).ready(function() {
    VANTIAdmin.init();
  });

  // Expose to window
  window.VANTIAdmin = VANTIAdmin;

})(jQuery);
