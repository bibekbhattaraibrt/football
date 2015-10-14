@extends ('layouts.admin_layout')

@section ('content')
<div class="row">
    <div class="col-md-4">

        <fieldset>
            <legend>Add/Edit Role</legend>

            <form action="{{ url('admin/roles') }}" class="" method="post">
                <div class="form-group">
                    <label class="control-label" for="">Name</label>
                    <input class="form-control" name="name" type="text"/>
                </div>

                <div class="form-group">
                    <label class="control-label">Description</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="8"></textarea>
                </div>


                <div class="col-md-offset-1">
                    <button class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
                </div>

            </form>
        </fieldset>
    </div>
    <div class="col-md-8">
        <table class="table">
            <thead>
                <th></th><th></th><th></th>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection