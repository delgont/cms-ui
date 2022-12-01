
(function ($){
	
	$('[data-toggle="tooltip"]').tooltip();

    //Window scroll effect --> Effect on navbar
    $(window).scroll(function(){
        if($(this).scrollTop() > 150){
            $('#mainNavBar').addClass('fixed-top');
            $('#simpleFooter').addClass('fixed-bottom');
        }else{
            $('#mainNavBar').removeClass('fixed-top');
            $('#simpleFooter').removeClass('fixed-bottom');

        }
    });

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
          $('.sidebar .collapse').collapse('hide');
          $('#sidebarToggle').html('<i class="fa fa-angle-right"></i>');
        }else{
            $('#sidebarToggle').html('<i class="fa fa-angle-left"></i>');
        }
      });


    $('#changePasswordButton').on('click', function(){
        $('#changePasswordForm').toggleClass('d-none');
    });

    

    function renderImageOnSelect(targetInputId, imageHolderId){
        targetInputId.on('change', function() {

          if(typeof (FileReader) != undefined){
            imageHolderId.attr('src', '');
            var reader = new FileReader();

            reader.onload = function(e) {
              var image = e.target.result;
              imageHolderId.attr('src', image);
            }
            reader.readAsDataURL($(this)[0].files[0]);
          }else{

          }
        });
      }

      renderImageOnSelect($('#profileImage'), $('#profileImageHolder'));
      renderImageOnSelect($('#ladLogo'), $('#ladLogoHolder'));

      $('#changeAdminType').on('change', function(){
          alert('not yet implemeted');
      });


      //select all permissions for admin 
      $('#superUser').change(function(){
         $('.permission-checkbox').not(this).prop('checked', this.checked);
     });

     (function ($){
	
	$('[data-toggle="tooltip"]').tooltip();

    //Window scroll effect --> Effect on navbar
    $(window).scroll(function(){
        if($(this).scrollTop() > 150){
            $('#mainNavBar').addClass('fixed-top');
            $('#simpleFooter').addClass('fixed-bottom');
        }else{
            $('#mainNavBar').removeClass('fixed-top');
            $('#simpleFooter').removeClass('fixed-bottom');

        }
    });

    // Toggle the side navigation
    $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
          $('.sidebar .collapse').collapse('hide');
          $('#sidebarToggle').html('<i class="fa fa-angle-right"></i>');
        }else{
            $('#sidebarToggle').html('<i class="fa fa-angle-left"></i>');
        }
      });


    $('#changePasswordButton').on('click', function(){
        $('#changePasswordForm').toggleClass('d-none');
    });



    //Future cope alert
    $('.fs').click(function(e){
        e.preventDefault();
        alert('This is future functionality, not implemented yet .... WAIT FOR IT IN THE NEXT VERSION #LAD v1.1.0');
    });

    function renderImageOnSelect(targetInputId, imageHolderId){
        targetInputId.on('change', function() {

          if(typeof (FileReader) != undefined){
            imageHolderId.attr('src', '');
            var reader = new FileReader();

            reader.onload = function(e) {
              var image = e.target.result;
              imageHolderId.attr('src', image);
            }
            reader.readAsDataURL($(this)[0].files[0]);
          }else{

          }
        });
      }

      $.fn.renderImageOnInputFileChange = function(options){
        let plugin = this;
        let defaults = {};

        plugin.settings = {}

        plugin.init = function(){
          plugin.settings = $.extend(plugin.settings, defaults, options);
          plugin.each(function(){
            plugin.on('change', function(){
              let holder = plugin.data('imgholder');
              if(typeof (FileReader) != undefined){
                $(holder).attr('src', '');
                let reader = new FileReader();
    
                reader.onload = function(e) {
                  let image = e.target.result;
                  $(holder).attr('src', image);
                }
                reader.readAsDataURL($(this)[0].files[0]);
              }
            })
          });
        }

        this.init();
        return this;
      }

    
      

      $('.render-image-on-input-file-change').renderImageOnInputFileChange();

      renderImageOnSelect($('#profileImage'), $('#profileImageHolder'));
      renderImageOnSelect($('#ladLogo'), $('#ladLogoHolder'));


      //select all permissions for admin 
      $('#superUser').change(function(){
         $('.permission-checkbox').not(this).prop('checked', this.checked);
     });

     function hello(){
      alert("hello uganda")
     }

     $.fn.renderImageOnInputFileChange = function(options){
      let plugin = this;
      let defaults = {};

      plugin.settings = {}

      plugin.init = function(){
        plugin.settings = $.extend(plugin.settings, defaults, options);
        plugin.each(function(){
          plugin.on('change', function(){
            let holder = plugin.data('imgholder');
            if(typeof (FileReader) != undefined){
              $(holder).attr('src', '');
              let reader = new FileReader();
  
              reader.onload = function(e) {
                let image = e.target.result;
                $(holder).attr('src', image);
              }
              reader.readAsDataURL($(this)[0].files[0]);
            }
          })
        });
      }

      this.init();
      return this;
    }

    $('.render-image-on-input-file-change').renderImageOnInputFileChange();
    $('.choose-icon-image').renderImageOnInputFileChange();



      ///window.open('http://127.0.0.1:8000/dashboard/mailer', 'hello', []);

})(jQuery);



      ///window.open('http://127.0.0.1:8000/dashboard/mailer', 'hello', []);

})(jQuery);
