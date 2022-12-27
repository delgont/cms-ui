require('./bootstrap');

(function ($){


  let snackbar = $('#snackbar');

  //Account Avator Upload
  $('#editAccountAvator #fileUpload').on('change', function(){
    $('#editAccountAvator').find('#avatorChangeBtn').removeClass('d-none');
  });
  $('#editAccountAvator').submit(function(e){
    e.preventDefault();
    let data = new FormData(this);


    $.ajax({
      type : $(this).attr('method'),
      url : $(this).attr('action'),
      data : data,
      contentType: false,
       processData: false,
      cache: false,
      success : function(response){
        if(response.success != undefined && response.success == true){
          $('#editAccountAvator #success').html('Avator updated successfully ....!');
        }
      },
      statusCode : {

      }
    });
  });

  $('.dev').on('click', function(e){
    e.preventDefault();
    alert('The functionality or page you are trying to access is till under development .... this may be fixed in the next version of the system... Thank You.')
  });

	
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
          $('#sidebarToggle').html('<i class="bx bx-expand-horizontal"></i>');
        }else{
            $('#sidebarToggle').html('<i class="bx bx-collapse-horizontal"></i>');
        }
      });

    $('[data-toggle="readImageAsDataURL"]').on('change', function(e){
      let img = $(this).data('target');
      if(typeof (FileReader) != undefined){
        let reader = new FileReader();
        reader.onload = function(e){
          let image = e.target.result;
          $(img).attr('src', image);
        }
        reader.readAsDataURL($(this)[0].files[0]);
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

      $('#changeAdminType').on('change', function(){
          alert('not yet implemeted');
      });


      //select all permissions for admin 
      $('#superUser').change(function(){
         $('.permission-checkbox').not(this).prop('checked', this.checked);
     });

     //Account Notifications
     function countNotifications(){
      let notificationsCounter = $('#notificationsCounter');
      $.ajax({
        type : 'GET',
        url : notificationsCounter.data('url'),
        cache : false,
        success : function(response){
          if(response.notificationsCount != undefined && response.notificationsCount > 0){
            notificationsCounter.html(response.notificationsCount);
          }
        }

      });
     }

     setInterval(function(){
      countNotifications()
     }, 30000);

     $('#copyLinkUrl').on('click', function(e){
      e.preventDefault();
      navigator.clipboard.writeText($(this).attr('href'));
      snackbar.text('Link copied to clipboard....');
      snackbar.addClass('show');
      setTimeout(function(){
        snackbar.removeClass('show');
      },3000);

     });

     //Choosing the post template
     $('a#selectPostTemplate').on('click', function(e){
      e.preventDefault();
      let templateId = $(this).attr('data-templateId');
      $('#templateIdInput').val(templateId);
     });

     //Choosing the post parent
     $('a#selectPostParent').on('click', function(e){
      e.preventDefault();
      let parentId = $(this).attr('data-parentId');
      let parent = $(this).attr('data-parent');
      $('#parentIdInput').val(parentId);
      $('#postParentHolder').val(parent);
     });

     //Choosing the post parent
     $('a#selectPostMenu').on('click', function(e){
      e.preventDefault();
      let menuId = $(this).attr('data-menuId');
      let menuName = $(this).attr('data-menuName');
      $('#menuIdInput').val(menuId);
      $('#menuNameHolder').html(menuName);
     });

     //Choosing the post post Type
     $('a#selectPostPostType').on('click', function(e){
      e.preventDefault();
      let postTypeId = $(this).attr('data-postTypeId');
      $('#postPostTypeIdInput').val(postTypeId);
     });

     $('a.add-menuitem-to-menu').on('click', function(e){
      e.preventDefault();
      let form = $(this).data('form');
      $(form).submit();
     });

     CKEDITOR.replace('editor');

})(jQuery);

