<template>
    <div class="modal fade in" id="modal-default" style="display: block;" v-if="openModal" >
          <div class="modal-dialog" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close">
                  <span aria-hidden="true" @click="close">×</span></button>
                <h4 class="modal-title">trans.create_new_role</h4>
              </div>
              <div class="modal-body">
                          <form method="post" enctype="multipart/form-data" 
                           id="role">

                            <div class="form-group">
                            <label for="role_name">role_name</label>
                            <input 
                            type="text" 
                            title="role_name" 
                            id="role_name" 
                            name="role_name" 
                            class="form-control" 
                             >

                      
                          </div>
                    
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" @click="close">trans.close</button>
                <button type="submit" class="btn btn-primary">trans.add</button>
              </div>
              </form>

              </div>


            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
