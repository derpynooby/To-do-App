<!-- Button trigger modal -->

  {{ $buttonOpen }}
  
  <!-- Modal -->
  <div class="modal fade" {{$attributes}} tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="ModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{ $slot }}
        </div>
        <div class="modal-footer">
            {{ $buttonClose }}
            {{ $buttonSave }}
        </div>
      </div>
    </div>
  </div>