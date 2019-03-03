{!! form_start($form) !!}
<div class="row">
    <div class="col-sm-8">
        {!! form_row($form->name) !!}
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        {!! form_row($form->birthday) !!}
    </div>
    <div class="col-sm-4">
        {!! form_row($form->genre) !!}
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        {!! form_row($form->postal_code) !!}
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        {!! form_row($form->address) !!}
    </div>
    <div class="col-sm-2">
        {!! form_row($form->number) !!}
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        {!! form_row($form->complement) !!}
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        {!! form_row($form->district) !!}
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        {!! form_row($form->city) !!}
    </div>
    <div class="col-sm-2">
        {!! form_row($form->state) !!}
    </div>
</div>
<div class="row">
    <div class="col-sm-6"></div>
    <div class="col-sm-2">
        <div class="form-group">
            {!! form_row($form->send) !!}
        </div>
    </div>
</div>
{!! form_end($form) !!}













