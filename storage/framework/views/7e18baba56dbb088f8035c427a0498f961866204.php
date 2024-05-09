
<a href="/member/chat" class="nav-link alert-modal-link printBtn">

    <div class="alert-modal-header">

        <i class="fas fa-user-check" aria-hidden="true" ></i> <p style="color:black">Messages</p>


            <?php
            $con = new mysqli('localhost','root','','art');
            $query = $con->query(
            "SELECT COUNT(*) as count FROM (SELECT store_id, customer_id FROM chats WHERE is_read = 0 AND store_id = '".auth()->user()->id."' AND customer_reply != 0 GROUP BY store_id, customer_id) as unread_chats");


            foreach($query as $data)
            {
              ?>
                        <span class="badge badge-danger" style="background-color:red"><?php echo $data['count'] ?></span>

                        <?php

            }

            ?>
    </div>
  </a>

<?php /**PATH C:\xampp\htdocs\Art march 15 remake v3.51-uPDATED-latest\resources\views/pages/admin/notification/alert.blade.php ENDPATH**/ ?>