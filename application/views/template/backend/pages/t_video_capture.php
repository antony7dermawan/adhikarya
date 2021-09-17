<div class="card">
  <div class="card-header">
    <h5>Transaksi Pengambilan Video</h5>
  </div>
  <div class="card-block">
    <!-- Menampilkan notif !-->
    <?= $this->session->flashdata('notif') ?>
    <!-- Tombol untuk menambah data akun !-->
    <button data-toggle="modal" data-target="#addModal" class="btn btn-success waves-effect waves-light">New Data</button>

    <div class="table-responsive dt-responsive">
      <table id="dom-jqry" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Date</th>
            <th>D. Pipa</th>
            <th>Location</th>
            <th>Upstream</th>
            <th>Downstream</th>

            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($c_t_video_capture as $key => $value) 
          {
            if($value->MARK_FOR_DELETE == 'false')
            {
              echo "<tr>";
              echo "<td>".($key + 1)."</td>";
              echo "<td>".$value->DATE." / ".$value->TIME."</td>";
              echo "<td>".$value->D_PIPE."</td>";
              echo "<td>".$value->LOCATION."</td>";
              echo "<td>".$value->UPSTREAM."</td>";
              echo "<td>".$value->DOWNSTREAM."</td>";
            
              echo "<td>";
              

              echo "<a href='".site_url('c_t_video_capture/start/' . $value->ID)."' ";
              ?>
              onclick="return confirm('Apakah kamu ingin memulai video ini?')"
              <?php
              echo "> <i class='fa fa-mail-forward f-w-600 f-16 m-r-15 text-c-black'></i></a>";



              echo "<a href='javascript:void(0);' data-toggle='modal' data-target='#Modal_Edit' class='btn-edit' data-id='".$value->ID."'>";
                echo "<i class='icon feather icon-edit f-w-600 f-16 m-r-15 text-c-green'></i>";
              echo "</a>";

              echo "<a href='".site_url('c_t_video_capture/delete/' . $value->ID)."' ";
              ?>
              onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')"
              <?php
              echo "> <i class='feather icon-trash-2 f-w-600 f-16 text-c-red'></i></a>";

              echo "</td>";


              echo "</tr>";
            }

            if($value->MARK_FOR_DELETE == 'true')
            {
              echo "<tr>";
              echo "<td><s>".($key + 1)."</s></td>";
              echo "<td><s>".$value->DATE." / ".$value->TIME."</s></td>";
              echo "<td><s>".$value->D_PIPE."</s></td>";
              echo "<td><s>".$value->LOCATION."</s></td>";
              echo "<td><s>".$value->UPSTREAM."</s></td>";
              echo "<td><s>".$value->DOWNSTREAM."</s></td>";
            
              echo "<td>";
               
              

              echo "<a href='".site_url('c_t_video_capture/undo_delete/' . $value->ID)."' ";
              ?>
              onclick="return confirm('Apakah kamu yakin ingin mengembalikan data ini?')"
              <?php
              echo "> <i class='fa fa-refresh f-w-600 f-16 text-c-red'></i></a>";

              echo ' '.$value->UPDATED_BY;
              echo "</td>";


              echo "</tr>";
            }
            

          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>




<!-- MODAL TAMBAH Beban! !-->
<form action="<?php echo base_url('c_t_video_capture/tambah') ?>" method="post">
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="">


            
            <div class="form-group">
              <label>Diameter Pipa</label>
              <input type='text' class='form-control' placeholder='Max 32 Char' maxlength="32" name='d_pipe'>
            </div>

            <div class="form-group">
              <label>Location</label>
              <input type='text' class='form-control' placeholder='Max 32 Char' maxlength="32" name='location'>
            </div>

            <div class="form-group">
              <label>Upstream</label>
              <input type='text' class='form-control' placeholder='Max 32 Char' maxlength="32" name='upstream'>
            </div>

            <div class="form-group">
              <label>Downstream</label>
              <input type='text' class='form-control' placeholder='Max 32 Char' maxlength="32" name='downstream'>
            </div>

            

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- MODAL TAMBAH AKUN! SELESAI !-->


<!-- MODAL EDIT AKUN !-->
<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form action="<?php echo base_url('c_t_video_capture/edit_action') ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="">

            <input type="hidden" name="id" value="" class="form-control">


            <div class="form-group">
              <label>Diameter Pipa</label>
              <input type='text' class='form-control' placeholder='Max 32 Char' maxlength="32" name='d_pipe'>
            </div>

            <div class="form-group">
              <label>Location</label>
              <input type='text' class='form-control' placeholder='Max 32 Char' maxlength="32" name='location'>
            </div>

            <div class="form-group">
              <label>Upstream</label>
              <input type='text' class='form-control' placeholder='Max 32 Char' maxlength="32" name='upstream'>
            </div>

            <div class="form-group">
              <label>Downstream</label>
              <input type='text' class='form-control' placeholder='Max 32 Char' maxlength="32" name='downstream'>
            </div>



          </div>
          <div class="modal-footer">
            <div class="created_form">
              Created By : <a name='created_by'></a>
              <br>
              Updated By : <a name='updated_by'></a>
            </div>
            <style type="text/css">
              .created_form
              {
                float: left;
                margin right: : 20px;
                font-size: 10px;
              }
            </style>
            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
          </div>

        </div>


<script>
  const users = <?= json_encode($c_t_video_capture) ?>;
  console.log(users);
  let elModalEdit = document.querySelector("#Modal_Edit");
  console.log(elModalEdit);
  let elBtnEdits = document.querySelectorAll(".btn-edit");
  [...elBtnEdits].forEach(edit => {
    edit.addEventListener("click", (e) => {
      let id = edit.getAttribute("data-id");
      let User = users.filter(user => {
        if (user.ID == id)
          return user;
      });
      const {
        ID,
        D_PIPE : d_pipe,
        LOCATION : location,
        UPSTREAM : upstream,
        DOWNSTREAM : downstream,

        CREATED_BY : created_by,
        UPDATED_BY : updated_by
      } = User[0];

      elModalEdit.querySelector("[name=id]").value = ID;

      elModalEdit.querySelector("[name=d_pipe]").value = d_pipe;
      elModalEdit.querySelector("[name=location]").value = location;
      elModalEdit.querySelector("[name=upstream]").value = upstream;
      elModalEdit.querySelector("[name=downstream]").value = downstream;


      elModalEdit.querySelector("[name=created_by]").text = created_by;
      elModalEdit.querySelector("[name=updated_by]").text = updated_by;

    })
  })
</script>

    </form>
  </div>
</div>
<!-- MODAL EDIT AKUN! SELESAI !-->

