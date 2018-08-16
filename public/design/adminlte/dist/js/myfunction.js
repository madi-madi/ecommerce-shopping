    function check_all(){
      $('input[class="item_checkbox"]:checkbox').each(function(){
        if ($('input[class="check_all"]:checkbox:checked').length == 0){
        
                $(this).prop('checked', false);
                
        }else{

                $(this).prop('checked', true);
        }
      });
    };


    function delete_all(){
      $(document).on('click','.delete-all',function(){
          $('#form_data').submit();
      });
      $(document).on('click','.del-btn',function(){
        var item_cheched = $('input[class="item_checkbox"]:checkbox').filter(':checked').length;
        if (item_cheched > 0) {
          $('.record-count').text(item_cheched);
          $('.not-empty-record').removeClass('hidden');
          $('.empty-record').addClass('hidden');

        }else{
          $('.record-count').text('');
          $('.empty-record').removeClass('hidden');


        }



          $('#multipleDelete').modal('show');
      });

    };