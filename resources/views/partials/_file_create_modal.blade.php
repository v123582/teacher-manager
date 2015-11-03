{{-- #file_create_modal --}}
<div class="modal fade" id="file_create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">上傳檔案</h4>
            </div>
            <div class="modal-body">
                
                <div class="row row-file">
                    <div class="col-xs-12">
                        <form>
                            <input type="file" class="input-file" />
                            <div class="progress" style="margin: 10px 0px;">
                                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;">
                                    <span class="progress-num">0%</span>
                                </div>
                            </div>
                            <button type="button" class="btn-file btn btn-primary btn-sm">開始上傳</button>
                        </form>    
                    </div>  
                </div>  
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
            </div>
        </div>
    </div>
</div>