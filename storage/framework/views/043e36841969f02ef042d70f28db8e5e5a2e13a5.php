<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>

<style>
* {
  margin: 0;
  box-sizing: border-box;
  font-family: system-ui
}
.header {
  background: #604bcb;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 8px 2px;
}

.details {
  flex: 1;
  display: flex;
  gap: 8px;
  align-items: center;
}

.return, .menu {
  color: white;
  font-weight: bold;
  padding: 0px 8px;
}

.details img {border-radius: 50%;height: 48px;border: 2px solid white;box-shadow: 0px 2px 2px 0px #0000002e;}

.contacto {
  color: white;
  font-size: 18px;
}

.contacto .name {
  font-weight: bold;
}

.contacto .status {font-size: 0.75em;}

.root {
  background-color: #02e5f3;
  height: 100vh;
  display: flex;
  flex-direction: column;
}

.content {
  background-color: beige;
  flex: 1;
}

.entry {
  background-color: #c8c8b2;
  display: flex;
  padding: 8px;
  align-items: center;
  height: 58px;
}

#msg {
  transition: all 0.3s;
  flex: 1;
  margin-right: 10px;
  border-radius: 8px;
  border: none;
  resize: none;
  padding: 4px 6px;
  border: 2px solid white;
  color: gray;
  height: min-content;
}

#msg:focus {
  border: 2px solid gray;
  outline: none;
  color: black;
}
.send {
  height: 46px;
  width: 46px;
  border:none;
  border-radius: 10px;
  transition:all 0.3s;
  font-size: 16px;
  cursor:pointer;
}
.send:hover{
  color: #604bcb;
  background-color: white;
}

div.sticky {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  background-color: yellow;
  padding: 50px;
  font-size: 20px;
}
</style>

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

    <br>  <br>  <br>  <br>

    <div id="sectionId">

    </div>




 <br>

 <div class="container ">
 <div class="container">
    <div class="row">
            <div class="row">
              <div class="col">
                <div class="card card-footer">
                  <form id="addForm">
                    <div class="form-group">
                      <input type="text" class="form-control" id="message" placeholder="Enter message...">
                    </div>
                    <br>
                    <input type="hidden" value="<?php echo e($material_id); ?>" id="material_id">
                    <input type="hidden" value="<?php echo e($store_id); ?>" id="store_id">
                    <input type="hidden" value="<?php echo e(auth()->user()->id); ?>" id="customer_id">
                    <input type="submit"  class="btn btn-primary " value="Send">
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<br><br>

<script>
$(document).ready(function(){

  $("#addForm").submit(function(e){
    e.preventDefault();
    var message = $("#message").val();
    var material_id = $("#material_id").val();
    var store_id = $("#store_id").val();
    var customer_id = $("#customer_id").val();


    $.ajax({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: '/customer/chat',
      method: 'POST',
      data: {message: message,material_id: material_id,store_id: store_id,customer_id: customer_id},
      success: function(data) {
        // handle the response from the server
        console.log(data);

      },
      error: function(data) {
        // handle errors
      }
    });

    $("#message").val("");
  });


        // $.ajax({
        //     type: 'GET',
        //     url: '/routeName',
        //     success: function(data) {
        //         $('#sectionId').html(data);
        //     }
        // });

});
    </script>

    <script>
 
    $(document).ready(function(){
    // ...

    setInterval(function(){
        var message = $("#message").val();
        var material_id = $("#material_id").val();
        var store_id = $("#store_id").val();
        var customer_id = $("#customer_id").val();
        
        $.ajax({
            type: 'GET',
            url: '/routeName/'+material_id+'/'+store_id+'/'+customer_id,
            success: function(data) {
                var $section = $('#sectionId');
                var previousHeight = $section[0].scrollHeight;
                
                $section.html(data);
                
                // Scroll to the bottom only if new data has been added
                if ($section[0].scrollHeight > previousHeight) {
                    window.scrollTo(0, document.body.scrollHeight);
                }
            }
        });
    }, 10000);

    // ...
});
    </script>

</body>





             <script>
  // select the chat container element

    <?php $__env->stopSection(); ?>




<?php echo $__env->make('justnpot.customer-main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\artisanhub\resources\views/justnpot/customer/chat.blade.php ENDPATH**/ ?>