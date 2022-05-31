{{-- <div class="page-title-actions">
    <button type="button" class="btn-shadow mr-3 btn btn-primary modalLink" name="button">
                    <i class="fas fa-plus-circle"></i>&nbsp;Create Appointment
    </button>
</div>  --}}

<div class="card-header">
  <h3 class="card-title" style="float:none">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-8">
            <?php 
              $modalSize='';
              if(isset($headerData['modal-size']))
              {
                $modalSize=$headerData['modal-size'];
              }
            ?>
            @if(isset($headerData['pageTitle']))
            {{$headerData['pageTitle']}}
            @endif
          </div>
          @if(isset($headerData['addNew']))
          <div class="col-md-4">
            <button type="button" data-modal-size="{{$modalSize}}" title="@lang('admin.add') - {{$headerData['pageTitle']}}" href={{route($headerData['addNew'])}} class="btn btn-success btn-sm float-right modalLink" name="button">+ @lang('admin.add')</button>
          </div>
          @endif
        </div>
      </div>

  </h3>
</div>