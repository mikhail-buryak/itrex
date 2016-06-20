@if ($picture == null)

    <div class="modal-dialog">
        <!-- Create new picture-->
        <div class="modal-content">
            <form id="handlePicture" action="/picture" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create new Picture</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" value="">
                    </div>
                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <input class="form-control" type="file" name="picture" id="picture" accept="image/jpeg,image/png">
                        <div class="well well-sm text-center" style="border-radius: 0;">
                            <img class="img-responsive" id="img_preview">
                        </div>
                        <input type="hidden" name="img_changed" id="img_changed" value="0">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="8" maxlength="2048" name="description" style="resize: vertical"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary submit" type="submit" >Create</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <div class="alerts" style="margin-top: 10px;"></div>
                </div>

            </form>
        </div>
    </div>

@elseif (Auth::user() && Auth::user()->can('edit-picture'))

    <div class="modal-dialog">
        <!-- Update picture -->
        <div class="modal-content">
            <form id="handlePicture" action="/picture/{{ $picture->id }}" method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ 'Edit Picture #'.$picture->id }}</h4>
                    <h6>{{ $picture->title }}</h6>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" name="title" value="{{ $picture->title }}">
                    </div>
                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <input class="form-control" type="file" name="picture" id="picture" accept="image/jpeg,image/png">
                        <div class="well well-sm text-center" style="border-radius: 0;">
                            <img class="img-responsive" id="img_preview" src="{{ $picture->origin }}" alt="{{ $picture->title }}">
                        </div>
                        <input type="hidden" name="img_changed" id="img_changed" value="0">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" rows="8" maxlength="2048" name="description" style="resize: vertical">{{ $picture->description }}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger delete-picture" type="button" data-action="/picture/{{ $picture->id }}" style="float: left;">Delete</button>
                    <button class="btn btn-primary" type="submit" >Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <div class="alerts" style="margin-top: 10px;"></div>
                </div>

            </form>
        </div>
    </div>

@else

    <div class="modal-dialog">
        <!-- View picture -->
        <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ $picture->title }}</h4>
                </div>

                <div class="modal-body">
                    <img class="img-responsive" src="{{ $picture->origin }}" alt="{{ $picture->title }}">
                    <div class="well well-lg" style="word-wrap: break-word; border-radius: 0;">
                        <p>{{ $picture->description }}</p>
                    </div>
                    <small>{{ $picture->created_at }}</small>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
        </div>
    </div>
@endif
